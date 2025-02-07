<?php

namespace App\Http\Controllers\Admin\Masters\Prefix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\Prefix\StorePrefixDetailsRequest;
use App\Http\Requests\Admin\Masters\Prefix\UpdatePrefixDetailsRequest;
use App\Models\PrefixDetails;
use App\Models\Prefix;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PrefixDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $PrefixDetails = PrefixDetails::latest()->get();
        $prefixDetails = PrefixDetails::leftJoin('prefixes', 'prefix_details.Main_Prefix', '=', 'prefixes.id')
                       ->select('prefix_details.Description', 'prefix_details.Description_regional', 'prefix_details.other_value', 'prefix_details.id', 'prefix_details.value', 'prefixes.Prefix_Name')
                       ->whereNull('prefix_details.deleted_by')
                       ->orderBy('prefix_details.id', 'desc')
                       ->get();

        $prefixs = Prefix::get();

        return view('admin.masters.prefix.prefixDetails')->with(['prefixDetails'=> $prefixDetails, 'prefixs' => $prefixs]);
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
    public function store(StorePrefixDetailsRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            PrefixDetails::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Prefix Details created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Prefix Details');
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
        $PrefixDetails = DB::table('prefix_details')->where('id', $id)->first();
        if ($PrefixDetails)
        {
            $response = [
                'result' => 1,
                'PrefixDetails' => $PrefixDetails,
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
    public function update(UpdatePrefixDetailsRequest $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('prefix_details')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'prefix details updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'prefix details');
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
            DB::table('prefix_details')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);
            DB::commit();

            return response()->json(['success'=> 'prefix details deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'prefix details');
        }
    }
}
