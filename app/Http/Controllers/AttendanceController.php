<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['student', 'course'])->get();
        $students = Student::all();
        $courses = Course::all();
        return view('attendance.index', compact('attendances', 'students', 'courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'course_id' => 'required|exists:courses,course_id',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|in:Present,Absent',
        ]);

        Attendance::create($data);
        return redirect()->route('attendance.index');
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'course_id' => 'required|exists:courses,course_id',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|in:Present,Absent',
        ]);

        $attendance->update($data);
        return redirect()->route('attendance.index');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index');
    }
}
?>
