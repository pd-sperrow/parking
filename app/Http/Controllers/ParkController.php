<?php

namespace App\Http\Controllers;

use App\Category;
use App\Park;
use App\Slot;
use App\Vehicle;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $parks = Park::with(['vehicle.category', 'slot', 'reciever', 'leaved'])->where('status', 'in_parking')->get();
        return view('parks.index', compact(['parks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slots = Slot::with(['parks' => function($query){
            $query->where('status', 'in_parking');
        }])->get();
        $categories = Category::all();
        return view('parks.create', compact([
            'slots',
            'categories'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Vehicle::where('reg_no', $request->reg_no)->first()) {
            $request->validate([
                'reg_no' => 'required|string|max:191|unique:vehicles',
            ]);
        }
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'slot_id' => 'required|integer|exists:slots,id',
            'name' => 'required|string|max:191',

            'customer_name' => 'required|string|max:191',
            'customer_phone' => 'nullable|string|max:191',
        ]);

        $vehicle_id = $request->vehicle_id;
        if(! $vehicle_id) {
            $dd = Vehicle::where('reg_no', $request->reg_no)->first();
            $vehicle_id = optional($dd)->id;
        }
        $vehicle = Vehicle::updateOrCreate(['id' => $vehicle_id], [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'reg_no' => $request->reg_no,
        ]);

        $category = Category::findOrFail($request->category_id);

        $park = Park::updateOrCreate(['id' => $request->park_id], [
            'vehicle_id' => $vehicle->id,
            'slot_id' => $request->slot_id,
            'customer_name' => $request->customer_name,
            'charge' => $category->price,
        ]);

        $park->customer_phone = $request->customer_phone;
        if($request->has('leaved') && $request->leaved == 'leaved') {
            $park->status = 'leaved';
            $park->leave_time = now();
            $park->leaved_by = auth()->user()->id;
        }
        $park->save();

        return redirect()->route('parks.show', [$park->id])->with('success', 'Parked Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Park $park)
    {
        $park->load(['vehicle.category', 'slot', 'reciever', 'leaved']);
        return view('parks.show', compact('park'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Park $park)
    {
        $slots = Slot::all();
        $categories = Category::all();
        $park->load(['vehicle.category', 'slot', 'reciever', 'leaved']);
        return view('parks.edit', compact(['park', 'slots', 'categories']));
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
