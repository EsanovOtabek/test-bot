<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $subject_id = 0;
        $quiz_type = 'all';
        $quizzes = Quiz::query();

        if ($request->has('subject_id') and $request->get('subject_id')!=0) {
            $quizzes->where('subject_id', $request->subject_id);
            $subject_id = $request->subject_id;

        }

        if ($request->has('type') and $request->get('subject_id')!='all') {
            $quizzes->where('type', $request->type);
            $quiz_type = $request->type;

        }

        return view('admin.quizzes.index', [
            'quizzes' => $quizzes->get(),
            'subjects' => Subject::all(),
            'quiz_type' => $quiz_type,
            'subject_id' => $subject_id,

        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|in:topic,exam,dtm',
            'question_count' => 'required|integer|min:1'
        ]);

        // Yangi test yaratish
        $quiz = Quiz::create([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'type' => $request->type
        ]);

        // Savollarni bo‘sh holatda yaratish
        for ($i = 0; $i < $request->question_count; $i++) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => null,
                'option_1' => null,
                'option_2' => null,
                'option_3' => null,
                'option_4' => null,
                'correct_option' => '1',
            ]);
        }

        return redirect()->route('admin.quizzes.show', $quiz->id)->with('success', 'Test muvaffaqiyatli yaratildi.');
    }

    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|in:topic,exam,dtm',
//            'question_count' => 'required|integer|min:1'
        ]);

        // Update quiz details
        $quiz->update([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'type' => $request->type
        ]);

//        // Handle question count adjustments
//        $currentQuestionCount = $quiz->questions()->count();
//        $requestedQuestionCount = $request->question_count;
//
//        if ($requestedQuestionCount > $currentQuestionCount) {
//            // Add more questions if needed
//            $questionsToAdd = $requestedQuestionCount - $currentQuestionCount;
//
//            for ($i = 0; $i < $questionsToAdd; $i++) {
//                Question::create([
//                    'quiz_id' => $quiz->id,
//                    'question_text' => null,
//                    'option_1' => null,
//                    'option_2' => null,
//                    'option_3' => null,
//                    'option_4' => null,
//                    'correct_option' => '1',
//                ]);
//            }
//        } elseif ($requestedQuestionCount < $currentQuestionCount) {
//            // Remove excess questions
//            $questionsToRemove = $currentQuestionCount - $requestedQuestionCount;
//
//            // Delete the most recently created questions (highest IDs)
//            $quiz->questions()
//                ->latest('id')
//                ->limit($questionsToRemove)
//                ->delete();
//        }

        return redirect()->back()->with('success', 'Test muvaffaqiyatli yangilandi.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->questions()->delete();
        $quiz->delete();
        return back()->with('success', "Test muvaffaqiyatli o\'chirildi!");
    }
}
