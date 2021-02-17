<?php
namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('check:abc');
    }

    public function index()
    {
        echo '管理员，您好！';
    }

    public function login()
    {
        echo '登录失败，请重新登录！';
    }
}
