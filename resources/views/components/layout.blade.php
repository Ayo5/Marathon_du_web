<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Redacted+Script:wght@400">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite(['resources/css/test-vite.css', 'resources/js/test-vite.js', 'resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>

<menu>
    <x-header>
    </x-header>
</menu>

<main class="main-container">
    {{$slot}}
</main>

<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
