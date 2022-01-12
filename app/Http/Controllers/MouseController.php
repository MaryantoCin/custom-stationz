<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use App\Http\Requests\StoreMouseRequest;
use App\Http\Requests\UpdateMouseRequest;

class MouseController extends Controller
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
     * @param  \App\Http\Requests\StoreMouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMouseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function show(Mouse $mouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Mouse $mouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMouseRequest  $request
     * @param  \App\Models\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMouseRequest $request, Mouse $mouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mouse $mouse)
    {
        //
    }
}