<?php

namespace App\Http\Controllers;

use App\Models\user_current;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        $current_id = $_GET['current_id'];
        
        $found = DB::table('user_currents')->where('user_id',$user_id)->where('current_id',$current_id)->get();


        foreach ($found as $f) {
            return redirect()->route('user.index','exists=true');
        }
        DB::table('user_currents')->insert([
            'user_id' => $user_id,
            'current_id' => $current_id
        ]);

        return redirect()->route('user.show',Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_current  $user_current
     * @return \Illuminate\Http\Response
     */
    public function show(user_current $user_current)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_current  $user_current
     * @return \Illuminate\Http\Response
     */
    public function edit(user_current $user_current)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_current  $user_current
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_current $user_current)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_current  $user_current
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_current $user_current)
    {
        //
    }
}
