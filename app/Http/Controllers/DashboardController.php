<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $courseCount = Course::count();
        $students = Student::all(); // Changed to fetch student records
        return view('dashboard', compact('studentCount', 'courseCount', 'students'));
    }
}
?>