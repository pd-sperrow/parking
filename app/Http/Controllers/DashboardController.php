<?php

namespace App\Http\Controllers;

use App\Park;
use App\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_amount = Park::whereDate('created_at', now()->format('Y-m-d'))->sum('charge');
        $total_vehicles = Vehicle::count();

        $currently_parked = Park::where('status', 'in_parking')->count();
        $today_parked = Park::whereDate('created_at', now()->format('Y-m-d'))->count();
        $parks = Park::with(['vehicle.category', 'slot', 'reciever', 'leaved'])->where('status', 'in_parking')->get();
        return view('dashboard.index', compact('total_amount', 'currently_parked', 'today_parked', 'total_vehicles', 'parks'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
