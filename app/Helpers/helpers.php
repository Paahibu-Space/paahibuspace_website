<?php

use App\Models\StaticOption;
use Illuminate\Support\Facades\Auth;
use App\Models\MediaUpload;
use Illuminate\Support\Str;

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
        $role_id = \App\Models\Admin::where('id', $id)->first();
        $user_role = \App\Models\AdminRole::where('id', $role_id->role)->first();
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
        $role_id = \App\Models\Admin::where('id', $id)->first();
        $user_role = \App\Models\AdminRole::where('id', $role_id->role)->first();
        if ($user_role){
            $all_permission = json_decode($user_role->permission);
            if (in_array($page, $all_permission)) {
                return true;
            }
        }
    }
    return false;
}

function active_menu($url)
{
    return $url == request()->path() ? 'active' : '';
}

function get_attachment_image_by_id($id, $size = null, $default = false)
{
    $image_details = MediaUpload::find($id);
    $return_val = [];
    $image_url = '';

    if (!empty($id) && !empty($image_details)) {
        $image_url = asset('assets/uploads/media-uploader/' . $image_details->path);
        switch ($size) {
            case "large":
                if (file_exists('assets/uploads/media-uploader/large-' . $image_details->path)) {
                    $image_url = asset('assets/uploads/media-uploader/large-' . $image_details->path);
                }
                break;
            case "grid":
                if (file_exists('assets/uploads/media-uploader/grid-' . $image_details->path)) {
                    $image_url = asset('assets/uploads/media-uploader/grid-' . $image_details->path);
                }
                break;
            case "thumb":
                if (file_exists('assets/uploads/media-uploader/thumb-' . $image_details->path)) {
                    $image_url = asset('assets/uploads/media-uploader/thumb-' . $image_details->path);
                }
                break;
            default:
                if (is_numeric($id) && file_exists('assets/uploads/media-uploader/' . $image_details->path)) {
                    $image_url = asset('assets/uploads/media-uploader/' . $image_details->path);
                }
                break;
        }
    }

    if (!empty($image_details)) {
        $return_val['image_id'] = $image_details->id;
        $return_val['path'] = $image_details->path;
        $return_val['img_url'] = $image_url;
        $return_val['img_alt'] = $image_details->alt;
    } elseif (empty($image_details) && $default) {
        $return_val['img_url'] = asset('assets/uploads/no-image.png');
    }

    return $return_val;
}

function render_image_markup_by_attachment_id($id, $class = null, $size = 'full')
{
    if (empty($id)) return '';
    $output = '';

    $image_details = get_attachment_image_by_id($id, $size);
    if (!empty($image_details)) {
        $class_list = !empty($class) ? 'class="' . $class . '"' : '';
        $output = '<img src="' . $image_details['img_url'] . '" ' . $class_list . ' alt="'.$image_details['img_alt'].'"/>';
    }
    return $output;
}

function update_static_option($key, $value)
{
    $static_option = null;
    if ($static_option === null){
        $static_option = StaticOption::query();
    }
    $static_option->updateOrCreate(['option_name' => $key],[
        'option_name' => $key,
        'option_value' => $value
    ]);
    \Illuminate\Support\Facades\Cache::forget($key);
    return true;
}

function setEnvValue(array $values)
{

    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);

    if (count($values) > 0) {
        foreach ($values as $envKey => $envValue) {

            $str .= "\n"; // In case the searched variable is in the last line without \n
            $keyPosition = strpos($str, "{$envKey}=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            // If key does not exist, add it
            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                $str .= "{$envKey}={$envValue}\n";
            } else {
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }
        }
    }

    $str = substr($str, 0, -1);
    if (!file_put_contents($envFile, $str)) return false;
    return true;
}


function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function get_user_role_name_by_id($id)
{
    $name = \App\Models\AdminRole::where('id', $id)->first();
    return $name->name;
}

function get_blog_category_by_id($id,$type = '',$class = ''){
    $return_val = __('uncategorized');
    $blog_cat = \App\Models\BlogCategory::find($id);
    if (!empty($blog_cat)){
        $return_val = $blog_cat->name;
        if ($type == 'link' ){
            $return_val = '<a class="'.$class.'" href="'.route('frontend.blog.category',['id' => $blog_cat->id,'any' => Str::slug($blog_cat->name,'-',null) ]).'">'.$blog_cat->name.'</a>';
        }
    }

    return $return_val;
}

function iFrameFilterInSummernoteAndRender($content){
    return str_replace(['{iframe}','{vsrc}','{/iframe}'],['<iframe','src',' frameborder="0" height="360" width="640"></iframe>'],$content);
}