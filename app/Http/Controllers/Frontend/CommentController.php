<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Konsole;
use AppRating;
use App\Models\comment_replies;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(),[
                'comment_body'=>'required|string'
            ]);
            if($validator->fails())
            {
                return redirect()->back()->with('message', 'Comment area is madetory');
            }
             $post = Konsole::where('nazwa', $request->nazwa)->first();
             if($post)
             {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' =>Auth::user()->id,
                    'comment_body' => $request->comment_body,
                    'rating' => $request->rating
                ]);
                return redirect()->back()->with('message','Commented succesfully');
             }
             else
             {
               return redirect()->back()->with('message','No such Post Found');
             }
        }
        else
        {
           return redirect('login')->with('message','Login first to comment');
        }  
        
    }

    public function storeReply(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'comment_reply_body' => 'required|string'
    ]);
    if ($validator->fails()) {
        return redirect()->back()->with('message', 'Reply area is mandatory');
    }

    // Check if the user is logged in
   
        // Retrieve the comment that the reply is being added to
        
   
            // Create a new reply
            $commentReply = new comment_replies;
            $commentReply->user_id = Auth::id();
            $commentReply->comment_id = $request->input('comment_id');
            $commentReply->comment_reply_body = $request->input('comment_reply_body');
            $commentReply->save();
        
return redirect()->back()->with('message','Commented succesfully');
         
        
    
}
public function update_reply(Request $request, $id)
{
    $validatedData = $request->validate([
        'comment_reply_body' => 'required|string'
    ]);

    $comment = comment_replies::findOrFail($id);
    $comment->comment_reply_body = $validatedData['comment_reply_body'];
    $comment->save();

    return redirect()->back()->with('success', 'Comment updated!');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'comment_body' => 'required|string'
    ]);

    $comment = Comment::findOrFail($id);
    $comment->comment_body = $validatedData['comment_body'];
    $comment->save();

    return redirect()->back()->with('success', 'Comment updated!');
}


 
public function destroy(Request $request){
    if(Auth::check())
    {
        $comment = Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
        if($comment){
            $comment ->delete();
            return response()->json([
                'status' => 200
            ]);
        }
        else{
            $reply = comment_replies::where('id',$request->reply_id)->where('user_id',Auth::user()->id)->first();
            if($reply){
                $reply ->delete();
                return response()->json([
                'status' => 200
                ]);
            }
            else{
                return response()->json([
                    'status' => 401,
                    'message' => 'Unauthorized to Delete'
                ]);
            }
        }
    }
    else
    {
        return response()->json([
            'status' => 401,
            'message' => 'Login to Delete'
        ]);
    }
}



}
