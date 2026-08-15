<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Mail\NewCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     */
    public function store(Request $request)
    {
        // Validate comment form
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],

            'message' => [
                'required',
                'string',
                'min:5',
                'max:2000',
            ],
        ]);


        // Save comment in database
        $comment = Comment::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rating' => $validated['rating'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);


        // Send notification email to the Association
        Mail::to('zhilaahmadi128@gmail.com')
            ->send(new NewCommentNotification($comment));


        // Return to previous page
        return back()->with(
            'comment_success',
            'Thank you for your comment. Your comment has been submitted and is awaiting approval.'
        );
    }
}