<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlotRequest;
use App\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
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


    public function index()
    {
        return view('slots.index', ['slots' => Slot::with('user:id,name')->get(['id as slot_id', 'name', 'capacity', 'created_at', 'created_by'])]);
    }

    public function create()
    {
        return view('slots.create');
    }

    public function store(StoreSlotRequest $request)
    {
        Slot::updateOrCreate(['id' => $request->slot_id], $request->except('slot_id'));

        return redirect()->route('slots.index')->with('success', 'slot Created Successfully!!');
    }

    public function show(Slot $slot)
    {
        //
    }

    public function edit(Slot $slot)
    {
        return view('slots.create', compact('slot'));
    }


    public function destroy(Slot $slot)
    {
        $slot->delete();
        return redirect()->route('slots.index')->with('success', 'Slot Deleted Successfully!!');
    }
}
