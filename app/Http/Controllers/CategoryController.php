<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CategoryController extends Controller
{

    public function viewCategories() {
        Session::put("title","Categories");

        if(Session::get('user')->isAdmin != 1){
            Session::put("title","Gallery");
            $categories = DB::table("categories")->get();
            return view("gallery",compact("categories"));
        }

        $categories = DB::table("categories")->get();
        return view("categories",compact("categories"));
    }

    public function getCategories() {
        return DB::table("categories")->get();
    }

    public function addCategory() {
        $category = request("category");

        $newCat = DB::table("categories")->insertGetId(["Name" => $category]);

        return DB::table("categories")->where("ID",$newCat)->first();
    }

    public function deleteCategory() {
        $category = request("category");

        DB::table("categories")->where("ID",$category)->delete();
        DB::table("images")->where("CatID",$category)->delete();

        return 1;
    }
}
