<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
 
    public function home(){
        $blogs = Blog::all();
        return view('welcome',compact('blogs'));
    }
    public function index()
    {
        return view('blog.blog');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $blog = new Blog(); 
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author = $request->author;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('image/blog/',$filename);
            $blog->image = 'image/blog/'. $filename;
        }
        $blog->save();
        return back();
    }



    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
