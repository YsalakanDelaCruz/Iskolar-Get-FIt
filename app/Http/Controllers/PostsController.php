<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Todolist;
use App\Weightcal;
use Auth;
// use Notification;
// use App\Notifications\LikedPost;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();

        $id = Auth::user()->id;
        $weights = Weightcal::GetWeight($id);
        $lists = Todolist::GetToDoList($id);

        $weight1 = Weightcal::where('user_id','=',$id)->orderBy('created_at','desc')->skip(1)->take(1)->value('weight');
        $weight2 = Weightcal::where('user_id','=',$id)->orderBy('created_at','desc')->take(1)->value('weight');
        
        return view('posts.index', compact('lists','posts','weights','weight1','weight2') );
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
    public function storeWeight(Request $request){
        
        $weights = new Weightcal;
        $weights->weight = $request->weight;
        $weights->user_id = Auth::user()->id;
        $weights->save();
        // $obj = array();
        // $keyval = array('id' => $weights->id);

        // array_push($obj,$keyval);
        return json_encode($weights);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeList(Request $request)
    {
        $lists = new Todolist;
        $lists->content = $request->content;
        $lists->user_id = Auth::user()->id;
        $lists->save();
        $obj = array();
        $keyval = array('id' => $lists->id);

        array_push($obj,$keyval);
        return json_encode($obj);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        Post::create($request->all());
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/home');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteList(Request $request)
    {
        $lists = Todolist::findOrFail($request->id);
        $lists->delete();
        return json_encode("success");
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/home');
    }

    public function likePost(Request $request)
    {
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        $post = Post::find($request->post_id);
        $likers = array();
        foreach($post->likes as $like){
            $likers[] = array(
                'username' => $like->liker->username,
                'name' => $like->liker->name
            );
        }

        return $likers;
    }

    
}
