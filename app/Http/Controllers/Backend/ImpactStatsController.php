<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImpactStat;
use Illuminate\Http\Request;

class ImpactStatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_impact_stats = ImpactStat::orderBy('order', 'asc')->get();
        return view('backend.impact-stats.index')->with(['all_impact_stats' => $all_impact_stats]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'label' => 'required|string|max:191',
            'value' => 'required|string|max:191',
            'status' => 'required'
        ]);

        ImpactStat::create([
            'label' => $request->label,
            'value' => $request->value,
            'is_active' => $request->status === 'publish',
            'order' => 0 
        ]);

        return redirect()->back()->with(['msg' => __('New Impact Stat Added...'),'type' => 'success']);
    }

    public function update(Request $request){
        $this->validate($request,[
            'label' => 'required|string|max:191',
            'value' => 'required|string|max:191',
            'status' => 'required'
        ]);

        ImpactStat::find($request->id)->update([
            'label' => $request->label,
            'value' => $request->value,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('Impact Stat Updated...'),'type' => 'success']);
    }

    public function delete($id){
        ImpactStat::find($id)->delete();
        return redirect()->back()->with(['msg' =>__( 'Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        ImpactStat::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
