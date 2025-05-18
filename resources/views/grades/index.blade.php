@extends('layouts.app')

@section('title', 'Grades')

@section('content')
<h1 style="color: #ff6200;">Manage Grades</h1>
<div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <h3>Add Grade</h3>
    <form method="POST" action="{{ route('grades.store') }}">
        @csrf
        <select name="student_id" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
            @foreach ($students as $student)
                <option value="{{ $student->student_id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
            @endforeach
        </select>
        <select name="course_id" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
            @foreach ($courses as $course)
                <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
        <input type="date" name="exam_date" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
        <input type="text" name="grade" placeholder="Grade (e.g., A)" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Add</button>
    </form>
</div>
<table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px;">
    <tr style="background: #007bff; color: white;">
        <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Student</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Course</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Exam Date</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Grade</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
    </tr>
    @foreach ($grades as $grade)
        <tr>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $grade->grade_id }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $grade->course->course_name }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $grade->exam_date }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $grade->grade }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">
                <form method="POST" action="{{ route('grades.update', $grade) }}" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <select name="student_id" required style="padding: 5px; margin: 2px;">
                        @foreach ($students as $student)
                            <option value="{{ $student->student_id }}" {{ $student->student_id == $grade->student_id ? 'selected' : '' }}>
                                {{ $student->first_name }} {{ $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="course_id" required style="padding: 5px; margin: 2px;">
                        @foreach ($courses as $course)
                            <option value="{{ $course->course_id }}" {{ $course->course_id == $grade->course_id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="date" name="exam_date" value="{{ $grade->exam_date }}" required style="padding: 5px; margin: 2px;">
                    <input type="text" name="grade" value="{{ $grade->grade }}" required style="padding: 5px; margin: 2px;">
                    <button type="submit" style="padding: 5px; background: #ff6200; color: white; border: none; border-radius: 4px;">Update</button>
                </form>
                <form method="POST" action="{{ route('grades.destroy', $grade) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 5px; background: #dc3545; color: white; border: none; border-radius: 4px;">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection