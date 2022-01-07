<?php

namespace App\Http\Controllers;

use App\Models\MouseVariant;
use App\Http\Requests\StoreMouseVariantRequest;
use App\Http\Requests\UpdateMouseVariantRequest;

class MouseVariantController extends Controller
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
     * @param  \App\Http\Requests\StoreMouseVariantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMouseVariantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MouseVariant  $mouseVariant
     * @return \Illuminate\Http\Response
     */
    public function show(MouseVariant $mouseVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MouseVariant  $mouseVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(MouseVariant $mouseVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMouseVariantRequest  $request
     * @param  \App\Models\MouseVariant  $mouseVariant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMouseVariantRequest $request, MouseVariant $mouseVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MouseVariant  $mouseVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(MouseVariant $mouseVariant)
    {
        //
    }
}
