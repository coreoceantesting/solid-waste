<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreWardRequest;
use App\Http\Requests\Admin\Masters\UpdateWardRequest;
use App\Models\Ward;
use App\Models\AreaType;
use App\Models\AreaDetails;
use App\Models\VehicleType;
use App\Models\Prefix;
use App\Models\PrefixDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wards = Ward::whereNull('deleted_by')->get();
        $areaDetails = AreaDetails::whereNull('deleted_by')->get();
        $areatypes = AreaType::whereNull('deleted_at')->get();
        $VehicleType = VehicleType::whereNull('deleted_at')->get();

        $Prefix = DB::table('prefixes')->where('Prefix_Name','WARD')->whereNull('deleted_at')->first();
        $PrefixDetails = DB::table('prefix_details')->where('Main_Prefix',$Prefix->id)->whereNull('deleted_at')->get();


        return view('admin.masters.wards')->with(['wards'=> $wards,'AreaDetails'=>$areaDetails,'AreaType'=>$areatypes,'VehicleType'=>$VehicleType,'Prefix'=>$Prefix,'PrefixDetails'=>$PrefixDetails]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        try
        {
            DB::beginTransaction();

            // Validate and store the ward data
            $input = $request->validated();
            $wards = Ward::create($input); // Create the ward record

            // Check if area details are provided in the request
            if (isset($request->area_type) && count($request->area_name) > 0) {
                for ($i = 0; $i < count($request->household_count); $i++) {
                    // Find the existing AreaType by its ID from the request
                    $areaType = AreaType::find($request->area_type[$i]); // Assuming area_type contains IDs

                    if ($areaType) {
                        // Create AreaDetails with the reference to the existing AreaType
                        AreaDetails::create([
                            'area_types_id' => $areaType->id,  // Use the existing AreaType ID
                            'ward_id' => $wards->id,
                            'area_type' => $request->area_type[$i], // Area type from request
                            'area_name' => $request->area_name[$i],
                            'household_count' => $request->household_count[$i],
                            'shop_count' => $request->shop_count[$i],
                            'total' => $request->total[$i],
                            'ip_address' => $request->ip(),
                        ]);
                    } else {
                        // Handle the case where the area_type ID is not found in AreaType
                        throw new \Exception('Invalid Area Type provided.');
                    }
                }
            }

            DB::commit();

            return response()->json(['success'=> 'Office created successfully!']);
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return $this->respondWithAjax($e, 'creating', 'Office');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Retrieve the Ward by ID
            $ward = Ward::findOrFail($id);

            // Retrieve related AreaDetails for this Ward
            // $areaDetails = AreaDetails::join('area_types', 'area_details.area_types_id', '=', 'area_types.id')
            //   ->where('area_details.ward_id', $id)
            //   ->select('area_details.*', 'area_types.Description')
            //   ->get();

            $areaDetails = AreaDetails::join('area_types','area_details.area_types_id','=','area_types.id')
               ->where('area_details.ward_id',$id)
               ->select('area_details.*','area_types.Description')
               ->get();

            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'ward' => $ward,
                'areaDetails' => $areaDetails,
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving ward details.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wards = DB::table('wards')->where('id', $id)->first();
        // $areaDetails = DB::table('area_details')->whereNull('deleted_by')->where('ward_id', $id)->get();
        $areaDetails = DB::table('area_details')->whereNull('deleted_at')->where('ward_id', $id)->get();

        if ($wards)
        {
            $response = [
                'result' => 1,
                'wards' => $wards,
                'areaDetails'=> $areaDetails
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $ward = Ward::find($id);  // Corrected: Use Ward model to find the ward by id
            $ward->update($input);

            if (isset($request->area_type) && count($request->household_count) > 0) {
                AreaDetails::where('ward_id', $ward->id)->delete(); // Delete existing AreaDetails
                for ($i = 0; $i < count($request->household_count); $i++) {
                    AreaDetails::create([
                        'area_types_id' => $request->area_type[$i],  // Correct reference for area_type
                        'ward_id' => $ward->id,
                        'area_name' => $request->area_name[$i],
                        'area_type' => $request->area_type[$i],
                        'household_count' => $request->household_count[$i],
                        'shop_count' => $request->shop_count[$i],
                        'total' => $request->total[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Ward updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            DB::beginTransaction();
            DB::table('wards')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);
            DB::commit();

            return response()->json(['success'=> 'wards deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'wards');
        }

}
}
