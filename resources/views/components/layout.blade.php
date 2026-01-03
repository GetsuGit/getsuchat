<!DOCTYPE html>
<html lang="en" data-theme="laravelChirper">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Getsu Chat' : 'Chirper' }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('img/chat.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                    <img src="{{ asset('img/chat.png') }}" alt="Logo" width="32" height="32"
                        class="d-inline-block">
                    <span>Getsu Chat</span>
                </a>
                @auth
                    <form method="POST" action="/logout" class="inline">
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                        @csrf
                        <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                @else
                    <form class="d-flex" role="search">
                        <a href="/login" class="btn btn-dark me-2 text-decoration-none">Sign
                            In</a>
                        <a href="/register" class="btn btn-primary active text-decoration-none">Sign
                            Up</a>
                    </form>
                @endauth
            </div>
        </nav>
    </div>


    <!-- Success Toast -->
    @if (session('success'))
        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
