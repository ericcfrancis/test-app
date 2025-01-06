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
        <nav class="navbar navbar-expand-lg bg-dark-navy-blue">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{route('index') }}" class="navbar-brand text-white">Test</a>
            </div>
        </nav>
    </header>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-dark-navy-blue text-white" style="width: 250px; height: 100vh; position: fixed;">
        <div class="sidebar-header">
            <h3 class="text-start px-3">testting</h3>
        </div>
        <ul class="list-unstyled">
            <li><a href="{{route('index')}}" class="text-white d-block p-3 ">Home</a></li>
            <li><a href="{{route('income.index')}}" class="text-white d-block p-3 ">my income</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-white d-block p-3" style="background: none; border: none; text-decoration: none; padding: 0;">logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div style="margin-left: 250px; padding: 20px; width: 100%;">
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