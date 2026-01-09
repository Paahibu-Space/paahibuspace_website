<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_partners = Partner::all();
        return view('backend.partners.partners')->with(['all_partners' => $all_partners]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'image' => 'required|string|max:191',
            'url' => 'nullable|string|max:191',
            'status' => 'required'
        ]);

        Partner::create([
            'name' => $request->name,
            'logo' => $request->image,
            'website_url' => $request->url,
            'is_active' => $request->status === 'publish',
            'order' => 0
        ]);

        return redirect()->back()->with(['msg' => __('New Partner Added...'),'type' => 'success']);
    }

    public function update(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'url' => 'nullable|string|max:191',
            'status' => 'required'
        ]);

        Partner::find($request->id)->update([
            'name' => $request->name,
            'logo' => $request->image,
            'website_url' => $request->url,
            'is_active' => $request->status === 'publish',
        ]);

        return redirect()->back()->with(['msg' => __('Partners Updated...'),'type' => 'success']);
    }

    public function delete($id){

        Partner::find($id)->delete();
        return redirect()->back()->with(['msg' =>__( 'Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        Partner::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
