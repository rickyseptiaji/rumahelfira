<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Solution;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $guest_id = $request->query('guest_id');
        
        // Mendapatkan jawaban yang salah
        $answers = Answer::where('guest_id', $guest_id)->where('correct', 0)->get(); 
        $questionIds = $answers->pluck('question_id');
        $solutions = Solution::whereIn('question_id', $questionIds)->get();
        
        // Mendapatkan jawaban yang benar
        $correctAnswers = Answer::where('guest_id', $guest_id)->where('correct', 1)->count();
        
        // Hitung persentase skor
        $totalQuestions = 10;
        $percentageScore = ($correctAnswers / $totalQuestions) * 100;
        
        // Logika peringatan konsultasi dokter
        $consultationAlert = $percentageScore <= 60 ? 'Segera konsultasi dengan dokter.' : null;

        return view('guest.result', compact('answers', 'solutions', 'percentageScore', 'consultationAlert'));
    }
    
}
