<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Session;
class CommentController extends Controller
{
    public function create(Request $request){
        if (Session::get('front_user_id')){
            $comment                = new Comment();
            $comment->note          =$request->note;
            $comment->post_id       = $request->post_id;
            $comment->comment_by    = Session::get('front_user_id');
            $comment->save();
            return redirect()->back();
        }
        else
            return redirect('/front/login');
    }

    public  function delete($id){

        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('message','Comment Deleted');
    }
}
