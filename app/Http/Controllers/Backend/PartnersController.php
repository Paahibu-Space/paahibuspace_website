<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_partners = Partners::all();
        return view('backend.partners.partners')->with(['all_partners' => $all_partners]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'url' => 'nullable|string|max:191',
        ]);

        Partners::create($request->all());

        return redirect()->back()->with(['msg' => __('New Partner Added...'),'type' => 'success']);
    }

    public function update(Request $request){

        $this->validate($request,[
            'title' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'url' => 'nullable|string|max:191',
        ]);

        Partners::find($request->id)->update([
            'title' => $request->title,
            'image' => $request->image,
            'url' => $request->url,
        ]);

        return redirect()->back()->with(['msg' => __('Partners Updated...'),'type' => 'success']);
    }

    public function delete($id){

        Partners::find($id)->delete();
        return redirect()->back()->with(['msg' =>__( 'Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        Partners::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
