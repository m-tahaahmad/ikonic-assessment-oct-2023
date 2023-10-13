<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        try {
            $data = Feedback::all();
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = Feedback::findOrFail($id);
            return response(['status' => 'success', 'message' => $data]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data = Feedback::create($data);
            return response(['status' => 'success', 'message' => $data], 201);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback = $feedback->fill($request->all())->save();
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
