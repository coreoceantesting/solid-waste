<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function collectionSchedulingReport(Request $request)
    {
        $collections = DB::table('vehicle_scheduling_information')->select('vehicle_type', 'vehicle_number', 'schedule_form', 'schedule_to', 'recurrence')->get();;

        return view('admin.reports.collection-scheduling-report', compact('collections'));
    }

    public function TripSheetReport(Request $request)
    {
        $trips = DB::table('trip_sheets')->select('trip_date','beat_number','vehicle_number','collection_center','in_time','out_time','entry_weight','exit_weight','total_garbage','driver_name','weight_slip_number','file_upload','waste_segregated')->get();;
        return view('admin.reports.trip-sheet-report',compact('trips'));
    }

    public function WasteDetailsReport(Request $request)
    {
        $waste = DB::table('waste_details')->select('collection_center','inspector_name','total_garbage_collected','date')->get();;
        return view('admin.reports.waste-details-report',compact('waste'));
    }
    public function VehicleTargetReport(Request $request)
    {
        $vehicles = DB::table('vehicle_targets')->select('target_from_date','target_to_date')->get();
        return view('admin.reports.vehicle-target-report',compact('vehicles'));
    }
}

