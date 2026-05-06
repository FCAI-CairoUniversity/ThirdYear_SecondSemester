<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
    @yield('styles')
</head>
<body>
    @include('layouts.header')

    <main>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')

    @yield('scripts')
</body>
</html>
