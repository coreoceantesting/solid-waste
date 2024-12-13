<?php

namespace App\Http\Controllers\Admin\Masters\Prefix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\Prefix\StoreMainPrefixRequest;
use App\Http\Requests\Admin\Masters\Prefix\UpdateMainPrefixRequest;
use App\Models\MainPrefix;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MainPrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MainPrefix = MainPrefix::whereNull('deleted_by')->get();
        $MainPrefix = MainPrefix::whereNull('deleted_by')->get();

        return view('admin.masters.prefix.MainPrefix')->with(['MainPrefix'=> $MainPrefix, 'MainPrefix' => $MainPrefix]);

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
    public function store(StoreMainPrefixRequest $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            MainPrefix::create( $request->all() );
            DB::commit();

            return response()->json(['success'=> 'MainPrefix created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'MainPrefix');
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
        $MainPrefix=DB::table('main_prefixes')->where('id', $id)->first();
        if ($MainPrefix)
        {
            $response = [
                'result' => 1,
                'MainPrefix' => $MainPrefix,
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
    public function update(UpdateMainPrefixRequest $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('main_prefixes')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'main prefixes updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'main prefixes');
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
            DB::table('main_prefixes')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'main prefixes deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'main prefixes');


    }
    }
}
