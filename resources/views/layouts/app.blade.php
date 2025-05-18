<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - St. Kizito Student Management</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: #f4f4f4;">
    @auth
    <div style="display: flex; min-height: 100vh;">
        <!-- Sidebar -->
        <div style="width: 250px; background: #007bff; color: white; padding: 20px;">
            <h2 style="color: white;">St. Kizito School</h2>
            <ul style="list-style: none; padding: 0;">
                <li><a href="{{ route('dashboard') }}" style="color: white; text-decoration: none; display: block; padding: 10px;">Dashboard</a></li>
                <li><a href="{{ route('students.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px;">Students</a></li>
                <li><a href="{{ route('courses.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px;">Courses</a></li>
                <li><a href="{{ route('attendance.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px;">Attendance</a></li>
                <li><a href="{{ route('grades.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px;">Grades</a></li>
                <li><form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="color: white; text-decoration: none; display: block; padding: 10px; background: none; border: none; cursor: pointer;">Logout</button>
                </form></li>
            </ul>
        </div>
        <!-- Main Content -->
        <div style="flex: 1; padding: 20px;">
            @yield('content')
        </div>
    </div>
    @else
        @yield('content')
    @endauth
</body>
</html>