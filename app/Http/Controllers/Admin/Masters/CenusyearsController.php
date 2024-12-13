<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCenusyears;
use App\Http\Requests\Admin\Masters\UpdateCenusyears;
use App\Models\CensusYears;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Log;

class CenusyearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CenusYears= CensusYears::whereNull('deleted_by')->get();

        return view('admin.masters.CenusYears')->with(['CenusYears'=> $CenusYears]);
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
    public function store(StoreCenusyears $request)
    {
        try
        {
            Log::info('line execute');
            DB::beginTransaction();
            $input = $request->validated();
            CensusYears::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Cenus years created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Cenus Years');
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
       $censusYears =  DB::table('census_years')->where('id', $id)->first();
        if ($censusYears)
        {
            $response = [
                'result' => 1,
                'CensusYears' => $censusYears,
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
    public function update(UpdateCenusyears $request, string $id)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            DB::table('census_years')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'Cenusyears updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'CensusYears');
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
            DB::table('census_years')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            // $CensusYears->delete();
            DB::commit();

            return response()->json(['success'=> 'Cenusyears deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Cenusyears');
        }
    }
}
