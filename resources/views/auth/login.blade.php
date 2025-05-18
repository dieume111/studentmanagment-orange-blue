@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px;">
        <h2 style="text-align: center; color: #ff6200;">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">
            @error('username')
                <p style="color: red; font-size: 12px;">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Login</button>
        </form>
        <p style="text-align: center; margin-top: 10px;">Don't have an account? <a href="{{ route('register') }}" style="color: #ff6200;">Register</a></p>
    </div>
</div>
@endsection
