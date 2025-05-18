<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $courseCount = Course::count();
        $attendance = Attendance::with(['student', 'course'])->get(); // Updated to fetch all attendance records

        return view('dashboard', compact('studentCount', 'courseCount', 'attendance'));
    }
}
?>