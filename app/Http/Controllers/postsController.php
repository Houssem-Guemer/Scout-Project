<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('title','desc')->paginate(5);
        return view('post.view')->with("posts",$posts);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.writePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('post_title');
        $data = $request->input('content');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post',$post);
    }

    public function view()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //this is a function for post images uplaods

    public function upload(Request $request)
    {
        $input = $request->all();
        $imagename = $input['image'];
        list($type, $imagename) = explode(';', $imagename);
        list(, $imagename)      = explode(',', $imagename);
        $imagename = base64_decode($imagename);
        $imageNamee = time().'.png';
        file_put_contents('./uploads/posts/'.$imageNamee, $imagename);
        if(!empty($imageNamee)){
            return Redirect::back()->with('msg_success', "Image Upload success!");
        }
        return Redirect::back()->with('msg_delete', "Image Upload Failed!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
