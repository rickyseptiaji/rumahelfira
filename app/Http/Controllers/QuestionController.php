<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Guest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $guest_id = $request->query('id');

        $guest = Guest::where('id', $guest_id)->first();
        if (!$guest) {
            return redirect()->back()->with('error', 'Guest tidak ditemukan.');
        }
        $questions = Question::all();
        return view('guest.question', compact('questions', 'guest'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'answers' => 'required|array',
            'answers.*' => 'required|in:0,1'
        ]);
    
        // Ambil guest berdasarkan email yang dikirim dari form
        $guestDetail = Guest::where('id', $request->id)->first();
        // Pastikan guest ditemukan
        if (!$guestDetail) {
            return redirect()->back()->with('error', 'Guest tidak ditemukan.');
        }
    
    
        // Simpan setiap jawaban
        if (is_array($request->answers)) {
            foreach ($request->answers as $question_id => $answer) {
                Answer::create([
                    'question_id' => $question_id,
                    'guest_id' => $guestDetail->id,
                    'correct' => $answer
                ]);
            }
        }
    
        return redirect()->route('result', ['guest_id' => $guestDetail->id])->with('success', 'Berhasil Kirim Data');
    }
    
}
