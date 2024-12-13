<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StorePumpType;
use App\Http\Requests\Admin\Masters\UpdatePumpType;
use App\Models\PumpType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PumpTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PumpType = PumpType::whereNull('deleted_by')->get();

        return view('admin.masters.PumpType')->with(['PumpType'=> $PumpType]);
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
    public function store(StorePumpType $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            PumpType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Pump Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Pump Type');
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
        $PumpType=  DB::table('pump_types')->where('id', $id)->first();
        if ($PumpType)
        {
            $response = [
                'result' => 1,
                'PumpType' => $PumpType,
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
    public function update(UpdatePumpType $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('pump_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'pump type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'pumptype');
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
            DB::table('pump_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'pump types deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'pump types');
        }

    }
}
