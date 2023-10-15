<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\FeedbackComment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        try {
            $data = Comment::all();
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = Comment::with('user')->findOrFail($id);
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $feedbackId = $data['data']['feedback_id'];
            $data['data']['comment_at'] = date('Y-m-d');
            $data = Comment::create($data['data']);
            FeedbackComment::create(['feedback_id' => $feedbackId, 'comment_id' => $data->id]);
            return response(['status' => 'success', 'message' => $data], 201);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $comment = Comment::findOrFail($id);
            $comment = $comment->fill($data['data'])->save();
            return response(['status' => 'success', 'message' => $comment]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return response(['status' => 'success', 'message' => 'Comment deleted']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
