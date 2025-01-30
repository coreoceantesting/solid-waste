<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleTarget;
use App\Models\VehicleSchedulingInformation;
use App\Models\WasteDetails;

class ReportsController extends Controller
{
    public function collectionSchedulingReport(Request $request)
    {
        // $collections = DB::table('vehicle_scheduling_information')->select('vehicle_type', 'vehicle_number', 'schedule_form', 'schedule_to', 'recurrence')->whereNull('deleted_at')->get();;
        //  $VehicleTarget = VehicleTarget::join('vehicle_target_details', 'vehicle_targets.id', '=', 'vehicle_target_details.vehicle_target_id')
        //     ->select('vehicle_targets.target_from_date', 'vehicle_targets.target_to_date', 'vehicle_target_details.vehicle_number', 'vehicle_target_details.beat_number', 'vehicle_target_details.garbage_volumne') // Ensure correct column names
        //     ->get();

        $VehicleSchedulingInformation = VehicleSchedulingInformation::join('vehicle_information','vehicle_scheduling_information.id','=','vehicle_information.vehicle_scheduling_id')
        ->whereNull('vehicle_information.deleted_at')
        ->whereNull('vehicle_scheduling_information.deleted_at')
        ->select('vehicle_information.beat_number','vehicle_information.employee_name','vehicle_information.in_time','vehicle_information.out_time','vehicle_scheduling_information.vehicle_type','vehicle_scheduling_information.vehicle_number','vehicle_scheduling_information.schedule_form')
        ->get();




        return view('admin.reports.collection-scheduling-report', compact('VehicleSchedulingInformation'));
    }

    public function TripSheetReport(Request $request)
    {
        $trips = DB::table('trip_sheets')->select('trip_date','beat_number','vehicle_number','collection_center','in_time','out_time','entry_weight','exit_weight','total_garbage','driver_name','weight_slip_number','file_upload','waste_segregated')->whereNull('deleted_at')->get();;
        return view('admin.reports.trip-sheet-report',compact('trips'));
    }

    public function WasteDetailsReport(Request $request)
    {
        // $waste = DB::table('waste_details')->select('collection_center','inspector_name','total_garbage_collected','date')->whereNull('deleted_at')->get();;
        // $VehicleTarget = VehicleTarget::join('vehicle_target_details', 'vehicle_targets.id', '=', 'vehicle_target_details.vehicle_target_id')
        //     ->select('vehicle_targets.target_from_date', 'vehicle_targets.target_to_date', 'vehicle_target_details.vehicle_number', 'vehicle_target_details.beat_number', 'vehicle_target_details.garbage_volumne') // Ensure correct column names
        //     ->get();


        $WasteDetails = WasteDetails::join('segregations','waste_details.id','=','segregations.waste_detail_id')
        ->whereNull('waste_details.deleted_at') // Ensure to check for 'deleted_at' in waste_details table
        ->whereNull('segregations.deleted_at')
        ->select('segregations.waste_type','segregations.waste_sub_type1','segregations.waste_sub_type2','segregations.volume','waste_details.collection_center','waste_details.date')
        ->get();

        //  return $WasteDetails;
        //  'segregations.id',

        return view('admin.reports.waste-details-report',compact('WasteDetails'));
    }
    public function VehicleTargetReport(Request $request)
    {
        $VehicleTarget = VehicleTarget::join('vehicle_target_details', 'vehicle_targets.id', '=', 'vehicle_target_details.vehicle_target_id')
            ->whereNull('vehicle_target_details.deleted_at')
            ->whereNull('vehicle_targets.deleted_at')
            ->select('vehicle_targets.target_from_date', 'vehicle_targets.target_to_date', 'vehicle_target_details.vehicle_number', 'vehicle_target_details.beat_number', 'vehicle_target_details.garbage_volumne') // Ensure correct column names
            ->get();

        return view('admin.reports.vehicle-target-report', compact('VehicleTarget'));
    }

}

