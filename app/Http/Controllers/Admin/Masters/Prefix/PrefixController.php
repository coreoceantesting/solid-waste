<?php

namespace App\Http\Controllers\Admin\Masters\Prefix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\Prefix\StorePrefixRequest;
use App\Http\Requests\Admin\Masters\Prefix\UpdatePrefixRequest;
use App\Models\Prefix;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Prefix = Prefix::whereNull('deleted_by')->get();

        return view('admin.masters.prefix')->with(['Prefix'=> $Prefix]);
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
    public function store(StorePrefixRequest $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            Prefix::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Prefix created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Prefix');
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
        $Prefix=DB::table('prefixes')->where('id', $id)->first();
        if ($Prefix)
        {
            $response = [
                'result' => 1,
                'Prefix' => $Prefix,
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
    public function update(UpdatePrefixRequest $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('prefixes')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'prefixes updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'prefixes');
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
            DB::table('prefixes')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'prefixes deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'prefixes');


    }
    }
}
