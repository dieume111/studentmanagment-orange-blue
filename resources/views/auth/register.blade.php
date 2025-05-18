<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - St. Kizito Save School</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 400px; max-width: 90%; text-align: center;">
        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <div style="width: 50px; height: 50px; background: #ff6200; border-radius: 50%; margin-right: 10px;"></div>
            <h2 style="margin: 0; color: #007bff; font-size: 24px;">St. Kizito Save School</h2>
        </div>
        <h3 style="color: #ff6200; font-size: 20px; margin: 0 0 10px;">Join Our Community!</h3>
        <p style="color: #666; font-size: 14px; margin: 0 0 20px;">Create an account to start managing school records.</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div style="margin-bottom: 15px; text-align: left;">
                <label style="display: block; color: #007bff; font-size: 14px; margin-bottom: 5px;">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                @error('name')
                    <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 15px; text-align: left;">
                <label style="display: block; color: #007bff; font-size: 14px; margin-bottom: 5px;">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                @error('email')
                    <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 15px; text-align: left;">
                <label style="display: block; color: #007bff; font-size: 14px; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                @error('password')
                    <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 15px; text-align: left;">
                <label style="display: block; color: #007bff; font-size: 14px; margin-bottom: 5px;">Confirm Password</label>
                <input type="password" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
            <button type="submit" style="width: 100%; padding: 12px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; transition: background 0.2s;">Register</button>
        </form>
        <p style="margin: 15px 0 0; font-size: 13px; color: #666;">
            Already have an account? <a href="{{ route('login') }}" style="color: #ff6200; text-decoration: none;">Sign in here</a>.
        </p>
    </div>
</body>
</html>
