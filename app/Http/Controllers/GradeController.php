<?php
namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
        $students = Student::all();
        $courses = Course::all();
        return view('grades.index', compact('grades', 'students', 'courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'course_id' => 'required|exists:courses,course_id',
            'exam_date' => 'required|date',
            'grade' => 'required|max:5',
        ]);

        Grade::create($data);
        return redirect()->route('grades.index');
    }

    public function update(Request $request, Grade $grade)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'course_id' => 'required|exists:courses,course_id',
            'exam_date' => 'required|date',
            'grade' => 'required|max:5',
        ]);

        $grade->update($data);
        return redirect()->route('grades.index');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index');
    }
}
?>