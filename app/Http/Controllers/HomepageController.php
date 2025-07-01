<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home(Request $request)
    {
        if ($request->session()->exists("user")) {
            return redirect("/todolist");
        } else {
            return redirect("/login");
        }
    }
}
