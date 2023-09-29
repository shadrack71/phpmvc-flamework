<?php

namespace app\controllers;

class AuthController extends controller {


public function login(){

    return  self::render('login');
}

public function register(){

    return  self::render('register');
}


}