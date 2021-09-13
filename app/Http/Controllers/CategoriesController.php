<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.showCategories',[ 'all' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $no_months = $_POST['no_months'];
        $no_users = $_POST['no_users'];

        // echo "$name $price $no_months $no_users";

        DB::table('categories')->insert([
            'name' => $name,
            'price' => $price,
            'no_months' => $no_months,
            'no_users' => $no_users,

        ]);

        return redirect()->route('categories.index');     
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories,$id)
    {
        $cat = DB::table('categories')->where('id',$id)->get();
        return view('admin.editCategory',['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $no_months = $_POST['no_months'];
        $no_users = $_POST['no_users'];

        DB::table('categories')->where('id',$id)->update(
            ['name' => $name,
            'price' => $price,
            'no_months' => $no_months,
            'no_users' => $no_users]
        );

        return redirect()->route('categories.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories,$id)
    {
        DB::table('categories')->where('id',$id)->delete();

        return redirect()->route('categories.index'); 

    }
}
