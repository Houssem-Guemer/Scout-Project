<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Constants\Roles;
use App\Constants\Units;
use App\Constants\Stages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $role = Auth::user()->getRole();
        if($role != Roles::GOVERNOR && $role != Roles::VICE_GOVERNOR &&
            $role != Roles::MEDIA && $role != Roles::VICE_MEDIA){

            $result = DB::select('SELECT Users.scout_id, unit FROM Users NATURAL JOIN Captains WHERE Users.scout_id = ?');

            //not sure this DB works; whether it stores NULL values from database in the results or leave
            //them undefined. NEEDS CHECKUP!
            if($result[0]->unit !== NULL)
                $posts = Post::where('posts.linked_unit', '=', $result[0]->unit)
                        ->orderBy('created_at', 'desc')->paginate(5);
            else
                $posts = Post::where('posts.posting_scout', '=', $result[0]->scout_id)
                        ->orderBy('created_at', 'desc')->paginate(5);


        }else{
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text'  => 'required'
        ]);

        $post = new Post();
        $post->title         = $request->input('title');
        $post->text          = $request->input('text');
        $post->posting_scout = Auth::user()->scout_id;

        $unit = Auth::user()->getUnit();

        if($unit !== NULL)
            $post->linked_unit = $unit;

        $post->save();
        redirect('/posts');
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
        return view('posts.post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'text'  => 'required'
        ]);

        $post = Post::find($id);
        $post->title         = $request->input('title');
        $post->text          = $request->input('text');
        $post->posting_scout = Auth::user()->scout_id;

        $unit = Auth::user()->getUnit();

        if($unit !== NULL)
            $post->linked_unit = $unit;

        $post->save();
        redirect('/posts/'.$post->post_id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        redirect('/posts');
    }
}
