<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\UserFeedback;
use Exception;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        try {
            $data = Feedback::with('userFeedback.user')->get();
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = Feedback::with('userFeedback.user', 'commentFeedback.comments.user')->findOrFail($id);
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $userId = $data['data']['user_id'];
            $data = Feedback::create($data['data']);
            UserFeedback::create(['user_id' => $userId, 'feedback_id' => $data->id]);
            return response(['status' => 'success', 'message' => $data], 201);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data =$request->all();
            $feedback = Feedback::findOrFail($id);
            $feedback = $feedback->fill($data['data'])->save();
            return response(['status' => 'success', 'message' => $feedback]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            return response(['status' => 'success', 'message' => 'Feedback deleted']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
