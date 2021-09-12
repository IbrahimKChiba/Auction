<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Comment;
use DB;
class CommentController extends Controller
{
    public function storecomment (Request $request,$id)
    {
     
        $user_id= auth()->user()->id;
        $data=Array();
        $data['body'] = $request->body;
        $data['product_id'] = $id;
        $data['user_id'] = $user_id;
        Comment::insert($data);

        return redirect()->action('GestionController@show', ['id' => $id]);
    }
      
      /*  Comment::create([
          'body'=>request('body');
          'post_id'=>$id; ]);
    } */
    public function delete($id,$cid)
    {     
        $comment=DB::table('comments')->where('id',$cid); 
        $comment->delete();
        return Redirect::back();      
        
        
    }
}
