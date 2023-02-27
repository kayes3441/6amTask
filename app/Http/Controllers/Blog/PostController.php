<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use Validator;

class PostController extends BaseController
{
    public function index(){
        return view('front.post.index');
    }
    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'title'             =>'required',
            'description'       =>'required',
            'image'             =>'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        $image      = $request->file('image');
        $imageName  = $image->getClientOriginalName();
        $directory  ='PostImages/';
        $image      ->move($directory,$imageName);
        $post->image =$directory.$imageName;

        $post->post_by = Session::get('front_user_id');
        $post->save();
        return redirect()->back()->with('message','Post Successful');
    }



    public function manage(){
        $post = Post::where('post_by',Session::get('front_user_id'))->paginate(6);
        return view('front.post.manage',[
            'posts'=>$post
        ]);
    }
    public function edit($id){
        $post = Post::find($id);
        return view('front.post.edit',compact('post'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'title'             =>'required',
            'description'       =>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }

        $post               = Post::find($id);
        $post->title        = $request->title;
        $post->description  = $request->description;

        if($request->file('image')) {
            if (file_exists($post->image))
            {
                unlink($post->image);

                $image              = $request->file('image');
                $imageName          = $image->getClientOriginalName();
                $directory          ='PostImages/';
                $image              ->move($directory,$imageName);
                $post->image        =$directory.$imageName;
            }

        }

        $post->post_by      = Session::get('front_user_id');
        $post->save();
        return redirect('/post/manage')->with('message','Post updated');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        $comments =Comment::where('post_id',$id)->get();
        foreach ($comments as $comment){
            $comment->delete();
        }
        return redirect('/post/manage')->with('message','Post Deleted');
    }
}
