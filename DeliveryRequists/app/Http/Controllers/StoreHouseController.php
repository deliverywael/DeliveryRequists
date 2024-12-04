<?php

namespace App\Http\Controllers;

use App\Models\StoreHouse;
use App\Http\Requests\StoreStoreHouseRequest;
use App\Http\Requests\UpdateStoreHouseRequest;
use Illuminate\Http\Response;

class StoreHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\StoreStoreHouseRequest  $request
     * @return Response
     */
    public function store(StoreStoreHouseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoreHouse  $storeHouse
     * @return Response
     */
    public function show(StoreHouse $storeHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreHouse  $storeHouse
     * @return Response
     */
    public function edit(StoreHouse $storeHouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreHouseRequest  $request
     * @param  \App\Models\StoreHouse  $storeHouse
     * @return Response
     */
    public function update(UpdateStoreHouseRequest $request, StoreHouse $storeHouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreHouse  $storeHouse
     * @return Response
     */
    public function destroy(StoreHouse $storeHouse)
    {
        //
    }
}
