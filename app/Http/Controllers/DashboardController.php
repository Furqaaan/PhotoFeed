<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function getDashboard() {

        Session::put("title","Dashboard");

        if(Session::get('user')->isAdmin != 1){
            Session::put("title","Gallery");
            $categories = DB::table("categories")->get();
            return view("gallery",compact("categories"));
        }

        $categories = DB::table("categories")->get();

        return view("dashboard",compact("categories"));

    }

    public function doUploadImage() {

        $image = request()->validate([
            'image' => ['required', 'mimes:jpg,bmp,png'],
        ]);

        $path = Storage::putFile('images', request()->file('image'));

        $newImage = [
            "Name" => $path,
            "CatId" => request("category")
        ];

        DB::table("images")->insert($newImage);        

        return redirect()->back();
    }

    public function getImages() {

        $category = request("category");
        $images =  DB::table("images")->where("CatId",$category)->get();

        return $images;
    }

    
}
