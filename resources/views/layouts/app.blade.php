<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my-test-app</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.scss') }}" > -->
     @vite(['resources/sass/app.scss'])
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{route('home') }}" class="navbar-brand">Test</a>
            <div class="collapse navbar-collapse" id="navBarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register.form') }}">register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login.form') }}">login</a>
                    </li>
                </ul>

            </div>
            </div>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy;ericdev | 2025</p>
    </footer>
    
</body>
</html>