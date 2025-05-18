<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required',
            'course_description' => 'nullable',
            'duration' => 'required',
        ]);

        Course::create($data);
        return redirect()->route('courses.index');
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'course_name' => 'required',
            'course_description' => 'nullable',
            'duration' => 'required',
        ]);

        $course->update($data);
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
?>
