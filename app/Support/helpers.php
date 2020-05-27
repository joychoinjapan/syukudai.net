<?php
if(!function_exists('user')){
    function user($driver = null){
        //user()
        if($driver){
            return app('auth')->guard($driver)->user();
        }

        return app('auth')->guard($driver)->user();
    }
}
