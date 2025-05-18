@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <!-- Header -->
    <div style="display: flex; align-items: center; background: #007bff; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <div style="width: 50px; height: 50px; background: #ff6200; border-radius: 50%; margin-right: 15px;"></div>
        <h1 style="margin: 0; font-size: 24px;">St. Kizito Save School Dashboard</h1>
    </div>

    <!-- Summary Cards -->
    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.2s;">
            <h3 style="margin: 0 0 10px; color: #ff6200;">Total Students</h3>
            <p style="font-size: 28px; color: #007bff; margin: 0;">{{ $studentCount }}</p>
        </div>
        <div style="flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.2s;">
            <h3 style="margin: 0 0 10px; color: #ff6200;">Total Courses</h3>
            <p style="font-size: 28px; color: #007bff; margin: 0;">{{ $courseCount }}</p>
        </div>
    </div>

    <!-- Student Report -->
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #ff6200; margin: 0 0 15px;">Student Report</h2>
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="background: #007bff; color: white; text-align: left;">
                    <th style="padding: 12px; border: 1px solid #ccc; border-radius: 4px 0 0 0;">Student Name</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Course</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Date</th>
                    <th style="padding: 12px; border: 1px solid #ccc; border-radius: 0 4px 0 0;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr style="background: {{ $loop->even ? '#f8f9fa' : 'white' }};">
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">N/A</td> <!-- Placeholder: No direct course relation -->
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->date_of_birth }}</td>
                        <td style="padding: 12px; border: 1px solid #ccc;">{{ $student->gender }}</td> <!-- Using gender as status placeholder -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 12px; border: 1px solid #ccc; text-align: center; color: #666;">No student records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    div[style*="flex: 1; background: white"]:hover {
        transform: translateY(-5px);
    }
</style>
@endsection