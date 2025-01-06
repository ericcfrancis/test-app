<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my-test-app</title>
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
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

    <body>
        <main>
            @yield('content')
        </main>
    </body>

    <footer>
        <div class="text-center">
            <p class="text-center mt-2">&copy;ericdev | 2025</p>
        </div>
    </footer>
    
</body>
</html>