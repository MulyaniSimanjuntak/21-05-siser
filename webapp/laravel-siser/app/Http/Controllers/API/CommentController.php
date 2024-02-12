<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Comment;
use App\Http\Controllers\API\APIController as APIController;
use Illuminate\Support\Facades\Auth;

class CommentController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeComment(Request $request, Event $event)
    {
        $user = Auth::user();
        $comment = Comment::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'reply_to' => NULL,
            'comment' => $request->comment
        ]);
        $data = $comment;

        return $this->sendResponse($data, 'Comment created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function replyComment(Request $request, Event $event, Comment $comment)
    {
        $user = Auth::user();
        $comment = Comment::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'reply_to' => $comment->id,
            'comment' => $request->comment
        ]);
        $data = $comment;

        return $this->sendResponse($data, 'Comment created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editComment(Request $request, Comment $comment)
    {
        $comment = Comment::find($comment->id);

        if($comment == NULL){
            return $this->sendError('comment not found.', ['data' => 'comment you want to edit not found or deleted.'], 404);
        }else{
            $comment->update([
                'comment' => $request->comment
            ]);

            $comment->save();
            $data = $comment;

            return $this->sendResponse($data, 'comment successfully updated.');
        }
    }

    public function findComment(Comment $comment)
    {
        $comment = Comment::find($comment->id);

        if($comment == NULL){
            return $this->sendError('comment not found.', ['data' => 'comment you want to edit not found or deleted.'], 404);
        }else{
            $data = $comment;

            return $this->sendResponse($data, 'comment successfully updated.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function deleteComment(Comment $comment)
    {
        $comment = Comment::find($comment->id);

        if($comment == NULL){
            return $this->sendError('comment not found.', ['data' => 'comment you want to delete is not found.'], 404);
        }else{
            $comment->delete();
            $data = $comment;

            return $this->sendResponse($data, 'comment marked as deleted, you can restore it later.');
        }
    }

}
