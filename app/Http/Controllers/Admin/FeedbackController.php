<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback.show', compact('feedback'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback berhasil dihapus.');
    }
}
