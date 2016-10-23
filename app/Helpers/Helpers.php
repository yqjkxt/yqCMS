<?php
/**
 * Created by PhpStorm.
 * User: like
 * Date: 16-10-18
 * Time: 下午3:06
 */

function admin_auth(){
    return auth()->guard('admin');
}

function current_user(){
    return admin_auth()->user();
}