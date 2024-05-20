<?php

namespace App\MenuBuilder;
use App\Models\Services;

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
                            <a href="' . route('frontend.volunteers') . '">Volunteers</a>
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
                        <li>
                            <a href="programs.html">Women in Digital Business (WiDiB)</a>
                            <a href="programs.html">Women in Digital Economy Initiative (WiDEI)</a>
                            <a href="programs.html">Ndiara</a>
                            <a href="programs.html">Skills2Work Initiative</a>
                            <a href="programs.html">CybersiStars Initiative</a>
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
                            <a href="#">Be a mentor</a>
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
            $output .= '<a href="' . route('frontend.services.single', $service->slug) . '">'. $service->title . '</a>';
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
}
