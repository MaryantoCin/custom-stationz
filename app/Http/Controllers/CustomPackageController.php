<?php

namespace App\Http\Controllers;

use App\Models\CustomPackage;
use App\Http\Requests\StoreCustomPackageRequest;
use App\Http\Requests\UpdateCustomPackageRequest;

class CustomPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomPackage  $customPackage
     * @return \Illuminate\Http\Response
     */
    public function show(CustomPackage $customPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomPackage  $customPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomPackage $customPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomPackageRequest  $request
     * @param  \App\Models\CustomPackage  $customPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomPackageRequest $request, CustomPackage $customPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomPackage  $customPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomPackage $customPackage)
    {
        //
    }
}
