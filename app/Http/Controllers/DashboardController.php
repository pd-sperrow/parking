<?php

namespace App\Http\Controllers;

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
        $vehicles  = new Vehicle();

        $duration = [];
        foreach ($vehicles->get() as $key => $vehicle) {
        $duration[] =  $vehicle->duration * $vehicle->packing_charge;
        }

        $total_amount = array_sum($duration);
        $total_vehicles = $vehicles->count();
        $total_vehicle_in = Vehicle::where('status', 0)->orWhere('status', 1)->whereDate('created_at', now()->format('Y-m-d'))->count();
        $total_vehicle_out = Vehicle::where('status', 1)->whereDate('created_at', now()->format('Y-m-d'))->count();
        return view('dashboard.index', ['vehicles' => $vehicles->get()] ,compact('total_amount', 'total_vehicle_in', 'total_vehicle_out','total_vehicles'));
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
