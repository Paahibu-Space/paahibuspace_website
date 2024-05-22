<?php

namespace App\MenuBuilder;

use App\Models\Services;
use App\Models\Programs;

class MenuBuilderFrontendRender
{
    public function render_frontend_nav_menu()
    {
        $output = '';

        $output .= '            <ul>
        <li class="dropdown megamenu"><a href="' . route('frontend.about') . '"><span>About Us</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul class="mega-dropdown-content">
                <div class="justify-content-between d-flex dropdown-content">
                    <div class="nav-list-container">
                        <li>
                            <a href="' . route('frontend.about') . '">Who we are</a>
                            <a href="' . route('frontend.stories') . '">Stories</a>
                            <a href="' . route('frontend.team') . '">Team</a>
                        </li>
                    </div>

                    <div class="right-content">
                        <div class="right-img">
                            <img src="' . asset('assets/frontend/images/img2.jpeg') . '" alt="" width="400">
                        </div>
                    </div>
                </div>

                <div class="mega-dropdown-title">
                    <h2>Contact Us</h2>
                </div>



            </ul>
        </li>
        <li class="dropdown megamenu"><a href="' . route('frontend.programs') . '"><span>Programs</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul class="mega-dropdown-content">
                <div class="justify-content-between d-flex">
                    <div class="nav-list-container">
                        <li>';
                        $all_programs = Programs::all();
                        foreach ($all_programs as $program) {
                            $output .= '<a href="' . route('frontend.programs.single', $program->slug) . '">' . $program->title . '</a>';
                        }
                        $output .= '
                        </li>
                    </div>

                    <div class="right-content">
                        <div class="right-img">
                            <img src="' . asset('assets/frontend/images/shot2.png') . '" alt="" width="400">
                        </div>
                    </div>
                </div>

                <div class="mega-dropdown-title">
                    <h2>Programs</h2>
                </div>

            </ul>
        </li>
        <li class="dropdown megamenu"><a href="#"><span>Get Involved</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul class="mega-dropdown-content">
                <div class="justify-content-between d-flex">
                    <div class="nav-list-container">
                        <li>
                            <a href="#">Volunteer</a>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSe18AXaRl79Gbq_RP05CSgY3xbvnNldfISPriy27H0b7hpdIw/viewform">Be a mentor</a>
                        </li>
                    </div>

                    <div class="right-content">
                        <div class="right-img">
                            <img src="' . asset('assets/frontend/images/img3.jpeg') . '" alt="" width="400">
                        </div>
                    </div>
                </div>

                <div class="mega-dropdown-title">
                    <h2>Get Involved</h2>
                </div>

            </ul>
        </li>
        <li class="dropdown megamenu"><a href="' . route('frontend.service') . '"><span>Services</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul class="mega-dropdown-content">
                <div class="justify-content-between d-flex">
                    <div class="nav-list-container">
                        <li>
                        ';
        $all_services = Services::where(['status' => 'publish'])->orderBy('sr_order', 'asc')->get();
        foreach ($all_services as $service) {
            $output .= '<a href="' . route('frontend.services.single', $service->slug) . '">' . $service->title . '</a>';
        }

        $output .= '</li>
                        </div>
    
                        <div class="right-content">
                            <div class="right-img">
                                <img src="' . asset('assets/frontend/images/customers-love.jpeg') . '" alt="" width="400">
                            </div>
                        </div>
                    </div>
    
                    <div class="mega-dropdown-title">
                        <h2>Services</h2>
                    </div>
    
                </ul>
            </li>
            <li><a href="' . route('frontend.blog') . '">Blog</a></li>
        </ul>';

        return $output;
    }

    public function render_frontend_footer_services()
    {
        $output = '';

        $output .= '<ul>';

        $all_services = Services::all();
        foreach ($all_services as $service)
        {
            $output .= '<li><i class="bi bi-chevron-right"></i> <a href="' . route('frontend.service', $service->slug) . '">' . $service->title .'</a></li>';
        }

        $output .= '</ul>';

        return $output;
    }
}
