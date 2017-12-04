<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Patient;
use App\Blacklist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class MemberController extends Controller
{
    protected  $role;
    protected  $allLists;
    protected  $user;
    protected  $relatedLists;
    protected  $sentMsgs;
    protected $inboxMsgs;
    protected $blockLists;
    protected $related;

    public function __construct()
    {
        /*$this->middleware('auth:api-patient,api-doctor',function($request,$next){
            $this->allLists = Auth::user();

            return $next($request);
        });*/
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            if($this->user->hasRole('Doctor')){
                $this->allLists = Patient::doesntHave('blacklist')->with('roles')->get();
                $this->blockLists = Patient::whereHas('blacklist', function ($query) {
                    $query->where('doctor_id', $this->user->id)
                        ->where('role', 'Doctor');
                })->with('roles')->get();
                $this->relatedLists = $this->user->patients;
                $this->sentMsgs = $this->user->myQuestions();
            }else{
                $this->role = 'Patient';
                $this->allLists = Doctor::doesntHave('blacklist')->with('roles')->get();
                $this->blockLists = Doctor::whereHas('blacklist', function ($query) {
                    $query->where('patient_id', $this->user->id)
                        ->where('role', 'Patient');
                })->with('roles')->get();
                $this->relatedLists = $this->user->doctors;
                $this->sentMsgs = $this->user->myQuestions();
            }
            return $next($request);
        });
    }

    public function members(){

        return response()->json([
            'members' => $this->allLists
        ],200);
    }

    public function myList()
    {
        return response()->json([
            'mylist' => $this->relatedLists
        ],200);
    }

    public function inbox()
    {
        return response()->json([
            'inbox' =>  $this->inboxMsgs,
            'success' => 'success'
        ],200);
    }

    public function sent()
    {
        return response()->json([
            'sent' => $this->sentMsgs,
            'success' => 'success'
        ],200);
    }

    public function submitQuestion(Request $request, $recipientId, $recipientRole)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $model = 'App\\' . $recipientRole;
        Question::create(
            ['body' => $request->body, 'author_role' => $this->role, 'author_id' => $this->user->id, 'questionable_id' => $recipientId, 'questionable_type' => $model]
        );
        return response()->json([
            'success' => 'Question posted successfully'
        ],200);
    }

    public function answerQuestion(Request $request, $questionId)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        Answer::create(
            ['body' => $request->body,'author_id' => $this->user->id,'author_role' => $this->role,'question_id' => $questionId]
        );
        return response()->json([
            'success' => 'Answer posted successfully'
        ],200);
    }

    public function getBlacklist()
    {
        return response()->json([
            'blacklists' => $this->blockLists,
            'success' => 'success'
        ],200);

    }

    public function storeBlacklist($memberId){
        $blacklist = new Blacklist();
        if ($this->role == "Doctor") {
            $blacklist->doctor_id = $this->user->id;
            $blacklist->patient_id = $memberId;
            $this->user->patients()->detach($memberId);
        } elseif ($this->role == "Patient") {
            $blacklist->doctor_id = $memberId;
            $blacklist->patient_id = $this->user->id;
            $this->user->doctors()->detach($memberId);
        }
        $blacklist->role = $this->role;
        $blacklist->save();
        return response()->json([
            'success' => 'Blacklisted successfully'
        ],200);
    }

    public function deleteBlacklist($memberId){
        if ($this->role == "Doctor") {
            $blacklist = Blacklist::where('patient_id', $memberId)->where('doctor_id', $this->user->id)->first();
            $blacklist->delete();
        } elseif ($this->role == "Patient") {
            $blacklist = Blacklist::where('doctor_id', $memberId)->where('patient_id', $this->user->id)->first();
            $blacklist->delete();
        }
        return response()->json([
            'success' => 'Removed  successful'
        ],200);
    }

    public function guard($guard){
        Auth::guard('api-'.$guard);
    }
}
