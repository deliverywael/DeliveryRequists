<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use App\Http\Requests\StoreStoresRequest;
use App\Http\Requests\UpdateStoresRequest;
use Illuminate\Http\Response;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoresRequest  $request
     * @return Response
     */
    public function store(StoreStoresRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stores  $stores
     * @return Response
     */
    public function show(Stores $stores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stores  $stores
     * @return Response
     */
    public function edit(Stores $stores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoresRequest  $request
     * @param  \App\Models\Stores  $stores
     * @return Response
     */
    public function update(UpdateStoresRequest $request, Stores $stores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stores  $stores
     * @return Response
     */
    public function destroy(Stores $stores)
    {
        //
    }
}
