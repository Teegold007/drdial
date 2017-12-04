<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Question;
use App\Answer;
use App\Blacklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected  $role;
    protected  $allLists;
    protected  $blockLists;
    protected  $user;
    protected  $relatedLists;
    protected  $sentMsgs;
    protected $inboxMsgs;
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $this->inboxMsgs = $this->user->questions;
            if(Auth::user()->hasRole('Doctor')){
                $this->role = 'Doctor';
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

    public function index()
    {
        $allLists = $this->allLists;
        $relatedLists = $this->relatedLists;
        $role = $this->role;
        $sentMsgs = $this->sentMsgs;
        $inboxMsgs = $this->inboxMsgs;
        $blockLists =$this->blockLists;
        return view('home',compact('allLists','relatedLists','role','sentMsgs','inboxMsgs','blockLists'));
    }

    public function attachMember($memberId)
    {
        $user = $this->user;
        if($this->role == "Doctor"){
            $member = Patient::findOrFail($memberId);
            $user->patients()->toggle($memberId);
        }else{
            $member = Doctor::findOrFail($memberId);
            $user->doctors()->toggle($memberId);
        }
        return back()->with('success','Operation Successful');
    }

    public function submitQuestion(Request $request, $recipientId,$recipientRole)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $model = 'App\\' . $recipientRole;
        Question::create(
            ['body' => $request->body, 'author_role' => $this->role, 'author_id' => $this->user->id, 'questionable_id' => $recipientId, 'questionable_type' => $model]
        );
        return redirect(route('home'))->with('success','Question posted successfully');
    }

    public function answerQuestion(Request $request, $questionId)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        Answer::create(
            ['body' => $request->body,'author_id' => $this->user->id,'author_role' => $this->role,'question_id' => $questionId]
        );
        return redirect(route('home'))->with('success','Answer posted successfully');
    }

    public  function storeBlacklist(Request $request, $userId)
    {
        $blacklist = new Blacklist();
        if ($this->role == "Doctor") {
            $blacklist->doctor_id = $this->user->id;
            $blacklist->patient_id = $userId;
            $this->user->patients()->detach($userId);
        } elseif ($this->role == "Patient") {
            $blacklist->doctor_id = $userId;
            $blacklist->patient_id = $this->user->id;
            $this->user->doctors()->detach($userId);
        }
        $blacklist->role = $this->role;
        $blacklist->save();

        return redirect(route('home'))->with('success','User blacklisted successfully');
    }

    public  function deleteBlacklist(Request $request, $userId)
    {
        $blacklist = new Blacklist();
        if ($this->role == "Doctor") {
            $blacklist = Blacklist::where('patient_id', $userId)->where('doctor_id', $this->user->id)->first();
            $blacklist->delete();
        } elseif ($this->role == "Patient") {
            $blacklist = Blacklist::where('doctor_id', $userId)->where('patient_id', $this->user->id)->first();
            $blacklist->delete();
        }
        return redirect(route('home'))->with('success','User removed from blacklist successfully');
    }
}
