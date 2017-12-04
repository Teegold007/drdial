<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    
    public function dashboard(){

        $visitorsAndPage = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        $visitors = $visitorsAndPage[0]['visitors'];
        return view('admin.dashboard.index',compact('visitors'));
    }


    public function doLogout(){
        Auth::guard('admin')->logout();
        return back()->with('info','Successfully Logout, see you another time');
    }
}
