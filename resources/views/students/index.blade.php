@extends('layouts.app')
@section('title', 'Students')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <!-- Header -->
    <div style="display: flex; align-items: center; background: #007bff; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <div style="width: 50px; height: 50px; background: #ff6200; border-radius: 50%; margin-right: 15px;"></div> <!-- Logo Placeholder -->
        <h1 style="margin: 0; font-size: 24px;">Manage Students</h1>
    </div>

    <!-- Add Student Form -->
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 30px; transition: transform 0.2s;">
        <h3 style="margin: 0 0 15px; color: #ff6200;">Add Student</h3>
        <form method="POST" action="{{ route('students.store') }}" style="display: flex; flex-wrap: wrap; gap: 10px;">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required style="flex: 1; min-width: 200px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            <input type="text" name="last_name" placeholder="Last Name" required style="flex: 1; min-width: 200px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            <select name="gender" required style="flex: 1; min-width: 200px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="date" name="date_of_birth" required style="flex: 1; min-width: 200px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; transition: background 0.2s;">Add Student</button>
        </form>
    </div>

    <!-- Students Table -->
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="margin: 0 0 15px; color: #ff6200;">Student List</h3>
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="background: #007bff; color: white; text-align: left;">
                    <th style="padding: 12px; border: 1px solid #ccc; border-radius: 4px 0 0 0;">ID</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">First Name</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Last Name</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Gender</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">DOB</th>
                    <th style="padding: 12px; border: 1px solid #ccc; border-radius: 0 4px 0 0;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr style="background: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->student_id }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->first_name }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->last_name }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->gender }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->date_of_birth }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">
                            <form method="POST" action="{{ route('students.update', $student) }}" style="display: inline; margin-right: 10px;">
                                @csrf
                                @method('PUT')
                                <input type="text" name="first_name" value="{{ $student->first_name }}" required style="padding: 6px; margin: 2px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px; width: 100px;">
                                <input type="text" name="last_name" value="{{ $student->last_name }}" required style="padding: 6px; margin: 2px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px; width: 100px;">
                                <select name="gender" required style="padding: 6px; margin: 2px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px;">
                                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" required style="padding: 6px; margin: 2px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px;">
                                <button type="submit" style="padding: 6px 12px; background: #ff6200; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">Update</button>
                            </form>
                            <form method="POST" action="{{ route('students.destroy', $student) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 6px 12px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 12px; border: 1px solid #ccc; text-align: center; color: #666;">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Hover effect for form card */
    div[style*="background: white; padding: 20px; border-radius: 8px; box-shadow"]:hover {
        transform: translateY(-5px);
    }
    /* Hover effect for buttons */
    button:hover {
        background: #0056b3 !important;
    }
    button[style*="background: #ff6200"]:hover {
        background: #e65a00 !important;
    }
    button[style*="background: #dc3545"]:hover {
        background: #c82333 !important;
    }
</style>
@endsection