<?php

namespace App\Http\Controllers;

use App\Models\current;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('currents')->get();
        $catName = DB::table('categories')->get(['name','id']);

        return view('admin.showGameeyas',[ 'all' => $all, 'catName' => $catName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.addGameeya',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = $_POST['category_id'];
        $start_date = $_POST['start_date'];

        DB::table('currents')->insert(
            [
                'category_id' => $category_id,
                'start_date' => $start_date
            ]
            );

            return redirect()->route('current.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\current  $current
     * @return \Illuminate\Http\Response
     */
    public function show(current $current)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\current  $current
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current = DB::table('currents')->where('id',$id)->get();
        $categories = DB::table('categories')->get();


        return view('admin.editGameeya',['current' => $current,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\current  $current
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category_id = $_POST['category_id'];
        $start_date = $_POST['start_date'];

        DB::table('currents')->where('id',$id)->update(
            ['category_id' => $category_id,
            'start_date' => $start_date]
        );

        return redirect()->route('current.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\current  $current
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('currents')->where('id',$id)->delete();

        return redirect()->route('current.index'); 
    }
}
