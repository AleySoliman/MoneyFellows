<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {


        try {
            $role = Auth::user()->role;
    
            if($role == 1)
            {
                $catCount = DB::table('categories')->get()->count();
                $currentCount = DB::table('currents')->get()->count();
                $userCount = DB::table('users')->where('role',0)->get()->count();
                return view('admin.stat',['catCount' => $catCount,'currentCount' => $currentCount,'userCount' => $userCount]);
            }
            else
            {
                return redirect()->route('user.index');
            }
        } catch (Throwable $e) {
            abort(403, 'Unauthorized.');
        }
    }
}
