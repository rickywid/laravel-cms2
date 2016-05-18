<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use App\Post;
use App\Photo;

use App\Category;

use Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::pluck('name', 'id');
        return view('admin.posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
            
        $user = Auth::user();
        $input = $request->all();
        
        if($file = $request->file('filename')){
            
            //assign name for file upload
            $name = "post". $file->getClientOriginalName();
            //move file to /public/images dir
            $file->move('images', $name);
            //create new image to Photos table
            $photo = Photo::create(['filename'=>$name]);
            //assign new photo_id to photo_id of Posts table
            $input['photo_id'] = $photo->id;

        }    
        
        //insert into posts (title, $request, user_id) values (‘first’, ‘cool’, 5);
        $user->posts()->create($input);

        Session::flash('post_created', 'Post has been successfully created');

        return redirect('/admin/posts');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.posts.show');
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
        $category = Category::all()->pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'category'));
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
        $input = $request->all();

        if($file = $request->file('filename')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['filename'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        Session::flash('post_updated', 'Post has been successfully updated');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        Session::flash('post_deleted', 'Post has been successfully deleted');

        return redirect('/admin/posts');
    }
}
