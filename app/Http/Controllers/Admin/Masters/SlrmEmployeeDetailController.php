<?php

namespace App\Http\Controllers\Admin\Masters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreSlrmEmployeeDetail;
use App\Http\Requests\Admin\Masters\UpdateSlrmEmployeeDetail;
use App\Models\SlrmEmployeeDetails;
use App\Models\collectionCenters;
use App\Models\Designation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SlrmEmployeeDetailController extends Controller
{
    public function index()
    {

        $SlrmEmployeeDetails = collectionCenters::latest()->get();

        $slrmemployee=SlrmEmployeeDetails::latest()->get();

        $designations = Designation::latest()->get();

        // dd($SlrmEmployeeDetails);
        // $SlrmEmployeeDetails = SlrmEmployeeDetails::leftJoin('collection_centers', 'collection_centers.p_name', '=', 'collection_centers.id')
        // ->select('slrm_employee_details.emp_code', 'slrm_employee_details.title', 'slrm_employee_details.f_name', 'slrm_employee_details.id', 'slrm_employee_details.m_name','slrm_employee_details.l_name','slrm_employee_details.gender','slrm_employee_details.m_number','slrm_employee_details.email_id','slrm_employee_details.address','slrm_employee_details.address_one','slrm_employee_details.pin_code','collection_centers.p_name')
        // ->whereNull('slrm_employee_details.deleted_by')
        // ->orderBy('slrm_employee_details.id', 'desc')
        // ->get();


        $collectionCenters = collectionCenters::get();




        // $collectionCenters = collectionCenters::get();

        return view('admin.masters.slrmEmployeedetail')->with(['SlrmEmployeeDetails'=> $SlrmEmployeeDetails, 'designations' => $designations,'slrmemployee'=>$slrmemployee]);
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
    public function store(StoreSlrmEmployeeDetail $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            SlrmEmployeeDetails::create( $input );
            DB::commit();

            return response()->json(['success'=> 'SlrmEmployeeDetails created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Slrm Employee Details');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slrmemployee=DB::table('slrm_employee_details')->where('id', $id)->first();
        if ($slrmemployee)
        {
            $response = [
                'result' => 1,
                'slrmemployee' => $slrmemployee,
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
    public function update(UpdateSlrmEmployeeDetail $request, string $id)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            DB::table('slrm_employee_details')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'Slrm Employee Details updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'SlrmEmployeeDetails');
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
            DB::table('slrm_employee_details')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            // $CensusYears->delete();
            DB::commit();

            return response()->json(['success'=> 'slrm employee details deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'SlrmEmployeeDetails');
        }
    }
}
