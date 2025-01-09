<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\AreaType\StoreAreaTypeRequest;
use App\Http\Requests\Admin\Masters\AreaType\UpdateAreaTypeRequest;
use App\Models\vehicles;
use App\Models\AreaType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AreaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AreaType = AreaType::whereNull('deleted_by')->get();

        return view('admin.masters.areaType')->with(['AreaType'=> $AreaType]);
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
    public function store(StoreAreaTypeRequest $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            AreaType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'AreaType created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'AreaType');
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
        $AreaType=DB::table('area_types')->where('id', $id)->first();
        if ($AreaType)
        {
            $response = [
                'result' => 1,
                'AreaType' => $AreaType,
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
    public function update(UpdateAreaTypeRequest $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('area_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'AreaType updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'AreaType');
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
            DB::table('area_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'AreaType deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'AreaType');


    }
}
}
