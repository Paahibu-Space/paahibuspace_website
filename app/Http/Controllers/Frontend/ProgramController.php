<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Stories;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function wideiPage()
    {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();

        return view('frontend.pages.programs.widei')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function skills2workPage()
    {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.programs.skills2work')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function widibPage()
    {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.programs.widib')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function techsistarsPage()
    {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.programs.techsistars')->with([
            'all_stories' => $all_stories
        ]);
    }

    public function ndiara () {
        $all_stories = Stories::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.programs.ndiara')->with([
            'all_stories' => $all_stories
        ]);
    }

}
