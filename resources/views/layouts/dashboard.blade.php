<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my-test-app</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.scss') }}" > -->
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
            </div>
        </nav>
    </header>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-info text-white" style="width: 250px; height: 100vh; position: fixed;">
        <div class="sidebar-header">
            <h3 class="text-center">testting</h3>
        </div>
        <ul class="list-unstyled">
            <li><a href="#" class="text-white d-block p-3">Home</a></li>
            <li><a href="#" class="text-white d-block p-3">About</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-white d-block p-3"style="background: none; border: none; text-decoration: none; padding: 0;">logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="content-area" style="margin-left: 250px; padding: 20px;">
        @yield('content')
    </div>
</div>

    <footer>
        <div class="text-center">
            <p class="text-center mt-2">&copy;ericdev | 2025</p>
        </div>
    </footer>
    
</body>
</html>