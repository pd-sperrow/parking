<?php

namespace App\Http\Controllers;

use App\Park;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));
        $reports_in = $request->report_in;
        $reports_out = $request->report_out;


        if ($request->search_in != null && Str::length($request->search_in) > 2) {
            $reg = $request->search_in;
            $parks = Park::whereHas('vehicle', function($query) use ($reg) {
                $query->where('reg_no', $reg);
            })->get();
        }elseif ($from_date != null && $to_date != null) {
            $parks = Park::whereBetween(DB::raw('date(created_at)'), [$from_date, $to_date])->get();
        }
        return view('reports.index', compact('parks'));
    }
}
