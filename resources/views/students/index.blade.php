@extends('layouts.app')
@section('title', 'Students')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <!-- Header -->
    <div style="display: flex; align-items: center; background: #007bff; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <div style="width: 50px; height: 50px; background: #ff6200; border-radius: 50%; margin-right: 15px;"></div>
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
        <table style="width: 100%; border-collapse: collapse; font-size: 15px; table-layout: fixed;">
            <thead>
                <tr style="background: #007bff; color: white; text-align: left;">
                    <th style="padding: 14px; border: 1px solid #ccc; border-radius: 4px 0 0 0; width: 10%;">ID</th>
                    <th style="padding: 14px; border: 1px solid #ccc; width: 25%;">First Name</th>
                    <th style="padding: 14px; border: 1px solid #ccc; width: 25%;">Last Name</th>
                    <th style="padding: 14px; border: 1px solid #ccc; width: 15%;">Gender</th>
                    <th style="padding: 14px; border: 1px solid #ccc; width: 15%;">DOB</th>
                    <th style="padding: 14px; border: 1px solid #ccc; border-radius: 0 4px 0 0; width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr style="background: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                        <td style="padding: 14px; border: 1px solid #ccc; overflow: hidden; text-overflow: ellipsis;">{{ $student->student_id }}</td>
                        <td style="padding: 14px; border: 1px solid #ccc; overflow: hidden; text-overflow: ellipsis;">{{ $student->first_name }}</td>
                        <td style="padding: 14px; border: 1px solid #ccc; overflow: hidden; text-overflow: ellipsis;">{{ $student->last_name }}</td>
                        <td style="padding: 14px; border: 1px solid #ccc; overflow: hidden; text-overflow: ellipsis;">{{ $student->gender }}</td>
                        <td style="padding: 14px; border: 1px solid #ccc; overflow: hidden; text-overflow: ellipsis;">{{ $student->date_of_birth }}</td>
                        <td style="padding: 14px; border: 1px solid #ccc;">
                            <button onclick="openModal('student-{{ $student->student_id }}')" style="padding: 8px 14px; background: #ff6200; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px; margin-right: 5px;">Edit</button>
                            <form method="POST" action="{{ route('students.destroy', $student) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 8px 14px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Update Modal -->
                    <div id="student-{{ $student->student_id }}" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
                        <div style="background: white; padding: 25px; border-radius: 8px; width: 450px; max-width: 90%; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                            <h3 style="margin: 0 0 20px; color: #ff6200; font-size: 18px;">Update Student</h3>
                            <form method="POST" action="{{ route('students.update', $student) }}">
                                @csrf
                                @method('PUT')
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; color: #007bff; font-size: 15px; margin-bottom: 5px;">First Name</label>
                                    <input type="text" name="first_name" value="{{ $student->first_name }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px;">
                                    @error('first_name')
                                        <span style="color: #dc3545; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; color: #007bff; font-size: 15px; margin-bottom: 5px;">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $student->last_name }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px;">
                                    @error('last_name')
                                        <span style="color: #dc3545; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; color: #007bff; font-size: 15px; margin-bottom: 5px;">Gender</label>
                                    <select name="gender" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px;">
                                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span style="color: #dc3545; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; color: #007bff; font-size: 15px; margin-bottom: 5px;">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px;">
                                    @error('date_of_birth')
                                        <span style="color: #dc3545; font-size: 13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <button type="submit" style="flex: 1; padding: 12px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 15px;">Save Changes</button>
                                    <button type="button" onclick="closeModal('student-{{ $student->student_id }}')" style="flex: 1; padding: 12px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 15px;">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 14px; border: 1px solid #ccc; text-align: center; color: #666;">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    button:hover { background: #0056b3 !important; }
    button[style*="background: #ff6200"]:hover { background: #e65a00 !important; }
    button[style*="background: #dc3545"]:hover { background: #c82333 !important; }
    div[style*="background: white; padding: 20px; border-radius: 8px; box-shadow"]:hover {
        transform: translateY(-5px);
    }
</style>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }
    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>
@endsection