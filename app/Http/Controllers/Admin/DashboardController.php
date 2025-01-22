<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{

    public function index()
    {
        $vehicalScheduleInformationCount = DB::table('vehicle_scheduling_information')->whereNull('deleted_at')->count();

        return view('admin.dashboard')->with([
            'vehicalScheduleInformationCount' => $vehicalScheduleInformationCount
        ]);
    }

    public function changeThemeMode()
    {
        $mode = request()->cookie('theme-mode');

        if($mode == 'dark')
            Cookie::queue('theme-mode', 'light', 43800);
        else
            Cookie::queue('theme-mode', 'dark', 43800);

        return true;
    }
}
