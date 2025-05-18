@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<h1 style="color: #ff6200;">Manage Courses</h1>
<div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <h3>Add Course</h3>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <input type="text" name="course_name" placeholder="Course Name" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
        <textarea name="course_description" placeholder="Course Description" style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></textarea>
        <input type="text" name="duration" placeholder="Duration (e.g., 3 months)" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Add</button>
    </form>
</div>
<table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px;">
    <tr style="background: #007bff; color: white;">
        <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Course Name</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Description</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Duration</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
    </tr>
    @foreach ($courses as $course)
        <tr>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $course->course_id }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $course->course_name }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $course->course_description }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $course->duration }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">
                <form method="POST" action="{{ route('courses.update', $course) }}" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="course_name" value="{{ $course->course_name }}" required style="padding: 5px; margin: 2px;">
                    <textarea name="course_description" style="padding: 5px; margin: 2px;">{{ $course->course_description }}</textarea>
                    <input type="text" name="duration" value="{{ $course->duration }}" required style="padding: 5px; margin: 2px;">
                    <button type="submit" style="padding: 5px; background: #ff6200; color: white; border: none; border-radius: 4px;">Update</button>
                </form>
                <form method="POST" action="{{ route('courses.destroy', $course) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 5px; background: #dc3545; color: white; border: none; border-radius: 4px;">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
