<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }

    public function showAboutPage() {
        return view('frontend.pages.about');
    }

    public function showProgramsPage() {
        return view('frontend.pages.programs.programs');
    }
    
    public function showServicesPage() {
        return view('frontend.pages.services.services');
    }
    
    public function showBlogsPage() {
        return view('frontend.pages.blog.blogs');
    }
    
    public function showTeamPage() {
        return view('frontend.pages.team');
    }
    
    public function showVolunteersPage() {
        return view('frontend.pages.volunteers');;
    }
    
}
