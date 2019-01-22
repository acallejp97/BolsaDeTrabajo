<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
 public function search(Request $request)
 {
     $posts = Post::where('name', $request->keywords)->get();

     return response()->json($posts);
 } 