<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleTarget;
use App\Models\VehicleSchedulingInformation;
use App\Models\WasteDetails;
// use App\Models\VehicleTarget;
use App\Models\TripSheet;
use App\Models\VehicleInformation;
use Barryvdh\Snappy\Facades\SnappyPdf;


class ReportsController extends Controller
{
    public function collectionSchedulingReport(Request $request)
    {

        $VehicleSchedulingInformation = VehicleSchedulingInformation::join('vehicle_information', 'vehicle_scheduling_information.id', '=', 'vehicle_information.vehicle_scheduling_id')
        ->whereNull('vehicle_information.deleted_at')
        ->whereNull('vehicle_scheduling_information.deleted_at')
        ->select(
            'vehicle_information.beat_number',
            'vehicle_information.employee_name',
            'vehicle_information.in_time',
            'vehicle_information.out_time',
            'vehicle_scheduling_information.vehicle_type',
            'vehicle_scheduling_information.vehicle_number',
            'vehicle_scheduling_information.schedule_form'
        );


        if(isset($request->from_date) && $request->from_date != ""){
            $VehicleSchedulingInformation = $VehicleSchedulingInformation->where('vehicle_scheduling_information.schedule_form', '>=', $request->from_date);
        }

        if(isset($request->to_date) && $request->to_date != ""){
            $VehicleSchedulingInformation = $VehicleSchedulingInformation->where('vehicle_scheduling_information.schedule_form', '<=', $request->to_date);
        }

        $VehicleSchedulingInformation = $VehicleSchedulingInformation->select('vehicle_information.beat_number','vehicle_information.employee_name','vehicle_information.in_time','vehicle_information.out_time','vehicle_scheduling_information.vehicle_type','vehicle_scheduling_information.vehicle_number','vehicle_scheduling_information.schedule_form')
        ->get();




        return view('admin.reports.collection-scheduling-report', compact('VehicleSchedulingInformation'));
    }


        public function collection(Request $request)
        {
         $VehicleSchedulingInformation = VehicleSchedulingInformation::join('vehicle_information', 'vehicle_scheduling_information.id', '=', 'vehicle_information.vehicle_scheduling_id')
         ->whereNull('vehicle_information.deleted_at')
         ->whereNull('vehicle_scheduling_information.deleted_at')
         ->select(
            'vehicle_information.beat_number',
            'vehicle_information.employee_name',
            'vehicle_information.in_time',
            'vehicle_information.out_time',
            'vehicle_scheduling_information.vehicle_type',
            'vehicle_scheduling_information.vehicle_number',
            'vehicle_scheduling_information.schedule_form'
         );


         if(isset($request->from_date) && $request->from_date != ""){
             $VehicleSchedulingInformation = $VehicleSchedulingInformation->where('vehicle_scheduling_information.schedule_form', '>=', $request->from_date);
         }

         if(isset($request->to_date) && $request->to_date != ""){
            $VehicleSchedulingInformation = $VehicleSchedulingInformation->where('vehicle_scheduling_information.schedule_form', '<=', $request->to_date);
         }

         $VehicleSchedulingInformation = $VehicleSchedulingInformation->select('vehicle_information.beat_number','vehicle_information.employee_name','vehicle_information.in_time','vehicle_information.out_time','vehicle_scheduling_information.vehicle_type','vehicle_scheduling_information.vehicle_number','vehicle_scheduling_information.schedule_form')
         ->get();
        // return $VehicleSchedulingInformation;
            // Initialize mPDF with the desired configuration
         $pdf = SnappyPdf::loadView('admin.reports.collection', compact('VehicleSchedulingInformation'))
         ->setPaper('a4');

        return $pdf->inline('test.pdf');
        }


        public function trip(Request $request)
        {
         $trip = TripSheet::join('break_ups', 'trip_sheets.id', '=', 'break_ups.trip_sheet_id')
         ->whereNull('break_ups.deleted_at')
         ->whereNull('trip_sheets.deleted_at')
         ->select(
            'trip_sheets.trip_date',
            'trip_sheets.beat_number',
            'trip_sheets.vehicle_number',
            'trip_sheets.collection_center',
            'trip_sheets.in_time',
            'trip_sheets.out_time',
            'trip_sheets.entry_weight'
         );


         if(isset($request->from_date) && $request->from_date != ""){
             $trip = $trip->where('trip_sheets.trip_date', '>=', $request->from_date);
         }

         if(isset($request->to_date) && $request->to_date != ""){
            $trip = $trip->where('trip_sheets.trip_date', '<=', $request->to_date);
         }


         $pdf = SnappyPdf::loadView('admin.reports.trip', compact('trip'))
         ->setPaper('a4');

        return $pdf->inline('test.pdf');
        }

         public function waste(Request $request){
            $WasteDetails = WasteDetails::join('segregations','waste_details.id','=','segregations.waste_detail_id')
            ->whereNull('waste_details.deleted_at') // Ensure to check for 'deleted_at' in waste_details table
            ->whereNull('segregations.deleted_at')
            ->select('segregations.waste_type','segregations.waste_sub_type1','segregations.waste_sub_type2','segregations.volume','waste_details.collection_center','waste_details.date')
            ->get();

            if(isset($request->from_date) && $request->from_date != ""){
                $WasteDetails = $WasteDetails->where('waste_details.date', '>=', $request->from_date);
            }

            if(isset($request->to_date) && $request->to_date != ""){
                $WasteDetails = $WasteDetails->where('waste_details.date', '<=', $request->to_date);
        }


                $pdf = SnappyPdf::loadView('admin.reports.waste', compact('WasteDetails'))
                ->setPaper('a4');

            return $pdf->inline('test.pdf');
        }

        public function vehicle(Request $request){
            $VehicleTarget = VehicleTarget::join('vehicle_target_details', 'vehicle_targets.id', '=', 'vehicle_target_details.vehicle_target_id')
            ->whereNull('vehicle_target_details.deleted_at')
            ->whereNull('vehicle_targets.deleted_at')
            ->select('vehicle_targets.target_from_date', 'vehicle_targets.target_to_date', 'vehicle_target_details.vehicle_number', 'vehicle_target_details.beat_number', 'vehicle_target_details.garbage_volumne') // Ensure correct column names
            ->get();

            if(isset($request->from_date) && $request->from_date != ""){
                $VehicleTarget = $VehicleTarget->where('vehicle_targets.target_from_date', '>=', $request->from_date);
            }

            if(isset($request->to_date) && $request->to_date != ""){
                $VehicleTarget = $VehicleTarget->where('vehicle_targets.target_from_date', '<=', $request->to_date);
            }

            $pdf = SnappyPdf::loadView('admin.reports.vehicle',compact('VehicleTarget'))
            ->setPaper('a4');

            return $pdf->inline('test.pdf');

        }

        public function TripSheetReport(Request $request)
        {
            $trips = DB::table('trip_sheets')->select('trip_date','beat_number','vehicle_number','collection_center','in_time','out_time','entry_weight','exit_weight','total_garbage','driver_name','weight_slip_number','file_upload','waste_segregated')->whereNull('deleted_at')->get();

            if(isset($request->from_date) && $request->from_date != ""){
                $trips = $trips->where('trip_sheets.trip_date', '>=', $request->from_date);
            }

            if(isset($request->to_date) && $request->to_date != ""){
                $trips = $trips->where('trip_sheets.to_date', '<=', $request->to_date);
            }


            return view('admin.reports.trip-sheet-report',compact('trips'));
        }

        public function WasteDetailsReport(Request $request)
        {

            $WasteDetails = WasteDetails::join('segregations','waste_details.id','=','segregations.waste_detail_id')
            ->whereNull('waste_details.deleted_at') // Ensure to check for 'deleted_at' in waste_details table
            ->whereNull('segregations.deleted_at')
            ->select('segregations.waste_type','segregations.waste_sub_type1','segregations.waste_sub_type2','segregations.volume','waste_details.collection_center','waste_details.date')
            ->get();

            if(isset($request->from_date) && $request->from_date !=""){
                $WasteDetails = $WasteDetails->where('waste_details.date' ,'>=',$request->from_date);
            }

            if(isset($request->to_date) && $request->to_date != ""){
                $WasteDetails = $WasteDetails->where('waste_details.date','<=',$request->to_date);
            }



            return view('admin.reports.waste-details-report',compact('WasteDetails'));
        }
        public function VehicleTargetReport(Request $request)
        {
            $VehicleTarget = VehicleTarget::join('vehicle_target_details', 'vehicle_targets.id', '=', 'vehicle_target_details.vehicle_target_id')
                ->whereNull('vehicle_target_details.deleted_at')
                ->whereNull('vehicle_targets.deleted_at')
                ->select('vehicle_targets.target_from_date', 'vehicle_targets.target_to_date', 'vehicle_target_details.vehicle_number', 'vehicle_target_details.beat_number', 'vehicle_target_details.garbage_volumne') // Ensure correct column names
                ->get();

            if(isset($request->from_date) && $request->from_date !=""){
                $VehicleTarget = $VehicleTarget->Where('vehicle_targets.target_from_date','>=',$request->from_date);
            }

            if(isset($request->to_date) && $request->to_date !=""){
                $VehicleTarget = $VehicleTarget->Where('vehicle_targets.target_from_date','<=',$request->to_date);
            }

            return view('admin.reports.vehicle-target-report', compact('VehicleTarget'));
        }

}

