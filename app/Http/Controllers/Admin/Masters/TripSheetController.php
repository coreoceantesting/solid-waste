<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreTripSheet;
use App\Http\Requests\Admin\Masters\UpdateTripSheet;
use App\Models\TripSheet;
use App\Models\BreakUp;
use App\Models\Ward;
use App\Models\vehicles;
use App\Models\collectionCenters;
use App\Models\CapacityOfVehicle;
use App\Models\Prefix;
use App\Models\PrefixDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TripSheetController extends Controller
{
    public function index()
    {
        $TripSheet = TripSheet::whereNull('deleted_at')->get();
        $BreakUp = BreakUp::whereNull('deleted_at')->get();
        $Ward = Ward::whereNull('deleted_at')->get();
        $vehicles = vehicles::whereNull('deleted_at')->get();
        $collectionCenters = collectionCenters::whereNull('deleted_at')->get();
        $CapacityOfVehicle = CapacityOfVehicle::whereNull('deleted_at')->get();

        $Prefix = DB::table('prefixes')->where('Prefix_Name','WST')->whereNull('deleted_at')->first();
        $PrefixDetails = DB::table('prefix_details')->where('Main_Prefix',$Prefix->id)->whereNull('deleted_at')->get();

        return view('admin.masters.tripSheet')->with(['TripSheet' => $TripSheet, 'BreakUp' => $BreakUp,'Ward'=> $Ward,'vehicles'=>$vehicles,'collectionCenters'=>$collectionCenters,'CapacityOfVehicle'=>$CapacityOfVehicle,'Prefix'=>$Prefix ,'PrefixDetails'=> $PrefixDetails ]);
    }

    public function store(StoreTripSheet $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('file_upload')) {
                $Doc = $request->file('file_upload');
                $DocPath = $Doc->store('file_upload', 'public');
                $input['file_upload'] = $DocPath;
            }

            $TripSheet = TripSheet::create($input);

            if (isset($request->waste_type) && count($request->volume) > 0) {
                for ($i = 0; $i < count($request->waste_type); $i++) {
                    BreakUp::create([
                        'trip_sheet_id' => $TripSheet->id,
                        'waste_type'=> $request->waste_type[$i],
                        'volume' => $request->volume[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }


            DB::commit();
            return response()->json(['success' => 'Trip Sheet created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error creating Trip Sheet: ' . $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        try {
            // Retrieve the VehicleSchedulingInformation by ID
            $TripSheet = TripSheet::findOrFail($id);

            // Retrieve related VehicleInformation for this vehicle scheduling ID
            $BreakUp = BreakUp::with(['WasteType'])->where('trip_sheet_id', $id)
                                                    ->whereNull('deleted_at')  // Ensure deleted data is not included
                                                    ->get();

            // $BreakUp = BreakUp::join('prefix_details','break_ups.waste_type','=','prefix_details.Main_Prefix')
            //           ->where('break_ups.trip_sheet_id',$id)
            //           ->select('break_ups.*','prefix_details.value')
            //           ->get();
            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'TripSheet' => $TripSheet ,
                'BreakUp' => $BreakUp,
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving in Breakup.',
                'error' => $e->getMessage(),
            ]);
        }

    }




    public function edit(string $id)
    {
        $TripSheet = DB::table('trip_sheets')->where('id', $id)->first();
        $BreakUp = DB::table('break_ups')->whereNull('deleted_at')->where('trip_sheet_id', $id)->get();
        if ($TripSheet) {
            return response()->json([
                'result' => 1,
                'TripSheet' => $TripSheet,
                'BreakUp' => $BreakUp
            ]);
        } else {
            return response()->json(['result' => 0]);
        }
    }

    public function update(UpdateTripSheet $request, string $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            $TripSheet = TripSheet::find($id);
            if (!$TripSheet) {
                return response()->json(['error' => 'Trip Sheet not found'], 404);
            }

            if ($request->hasFile('file_upload')) {
                $Doc = $request->file('file_upload');
                $DocPath = $Doc->store('file_upload', 'public');
                $input['file_upload'] = $DocPath;

                // Delete the old file if it exists
                if ($TripSheet->file_upload && Storage::disk('public')->exists($TripSheet->file_upload)) {
                    Storage::disk('public')->delete($TripSheet->file_upload);
                }
            }

            $TripSheet->update($input);

            if (isset($request->waste_type) && count($request->volume) > 0) {
                BreakUp::where('trip_sheet_id', $TripSheet->id)->delete();
                for ($i = 0; $i < count($request->waste_type); $i++) {
                    BreakUp::create([
                        'trip_sheet_id' => $TripSheet->id,
                        'waste_type' => $request->waste_type[$i],
                        'volume' => $request->volume[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Trip Sheet updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error updating Trip Sheet: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            TripSheet::where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);
            DB::commit();
            return response()->json(['success' => 'Trip Sheet deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error deleting Trip Sheet: ' . $e->getMessage()], 500);
        }
    }
}
