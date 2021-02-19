<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
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
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('dashboard.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return Application|Factory|View|Response
     */
    public function show(Location $location)
    {
        return view('dashboard.location.show')->with('location', $location);
    }

    /**
     * Display the visitation tab
     *
     * @param Location $location
     */
    public function visitation(Location $location)
    {
        return view('dashboard.location.visitation')->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return Application|Factory|View|Response
     */
    public function edit(Location $location)
    {
        return view('dashboard.location.edit')->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Location $location
     * @return Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Location $location
     * @return Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
