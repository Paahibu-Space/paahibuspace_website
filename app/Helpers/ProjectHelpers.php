<?php

namespace App\Helpers;

class ProjectHelpers {
    public static function item_delete($msg = null){
        return [
            'type' => 'danger',
            'msg' => $msg ?? __('Item Delete')
        ];
    }
}
