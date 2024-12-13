<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreShiftTimings;
use App\Http\Requests\Admin\Masters\UpdateShiftTimings;
use App\Models\ShiftTimings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ShiftTimingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ShiftTimings = ShiftTimings::whereNull('deleted_by')->get();

        return view('admin.masters.ShiftTimings')->with(['ShiftTimings'=> $ShiftTimings]);
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
    public function store(StoreShiftTimings $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            ShiftTimings::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Shift Timings created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Shift Timings');
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
        $ShiftTimings=DB::table('shift_timings')->where('id', $id)->first();
        if ($ShiftTimings)
        {
            $response = [
                'result' => 1,
                'ShiftTimings' => $ShiftTimings,
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
    public function update(UpdateShiftTimings $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('shift_timings')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'shift timings updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'shifttimings');
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
            DB::table('shift_timings')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'shift timings deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'shift timings');

    }
}
}
