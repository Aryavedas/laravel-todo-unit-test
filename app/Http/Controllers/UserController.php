<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return response()->view('user.login', [
            'title' => 'Aplikasi TodoList'
        ]);
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('password');

        // Validasi Jika Kosong
        if (empty($username) || empty($password)) {
            return response()->view('user.login', [
                'title' => "login",
                'error' => 'username atau password masih kosong'
            ]);
        }

        // Jika User Berhasil Login maka user akan masuk aplikasi
        if ($this->userService->login($username, $password)) {
            $request->session()->put("user", $username);
            return redirect("/");
        }

        // Jika User salah username pass maka akan di peringatkan
        return response()->view('user.login', [
            'title' => 'login',
            'error' => 'user atau password salah'
        ]);
    }

    public function doLogout(Request $request)
    {
        $request->session()->forget("user");
        return redirect("/");
    }
}
