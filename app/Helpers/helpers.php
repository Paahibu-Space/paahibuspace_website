<?php

use App\Models\StaticOption;
use Illuminate\Support\Facades\Auth;

function set_static_option($key, $value)
{
    if (!StaticOption::where('option_name', $key)->first()) {
        StaticOption::create([
            'option_name' => $key,
            'option_value' => $value
        ]);
        return true;
    }
    return false;
}

function get_static_option($key,$default = null)
{
    global $option_name;
    $option_name = $key;
    $value = \Illuminate\Support\Facades\Cache::remember($option_name,6400, function () {
        global $option_name;
        return StaticOption::where('option_name', $option_name)->first();
    });

    return $value->option_value ?? $default;
}

function check_page_permission($page)
{
    if (Auth::check()) {
        $id = auth()->user()->id;
        $role_id = \App\Admin::where('id', $id)->first();
        $user_role = \App\AdminRole::where('id', $role_id->role)->first();
        if ($user_role){
            $all_permission = json_decode($user_role->permission);
            if (in_array($page, $all_permission)) {
                return true;
            }
        }

    }
    return false;
}

function check_page_permission_by_string($page)
{
    $page = strtolower(str_replace(' ','_',$page));
    if (Auth::check()) {
        $id = auth()->user()->id;
        $role_id = \App\Admin::where('id', $id)->first();
        $user_role = \App\AdminRole::where('id', $role_id->role)->first();
        if ($user_role){
            $all_permission = json_decode($user_role->permission);
            if (in_array($page, $all_permission)) {
                return true;
            }
        }
    }
    return false;
}