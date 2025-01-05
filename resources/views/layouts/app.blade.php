<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my-test-app</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{route('home') }}">Hello</a>
            <a href="{{route('register.form') }}">Register</a>
            <a href="{{route('login.form') }}">Login</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy;ericdev | 2025</p>
    </footer>
    
</body>
</html>