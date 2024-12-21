<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('forgot-password') }}">Forgot Password</a>
    </form>
</body>
</html>
