<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/icon.jpg') }}"/>

</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    @yield('content')
</div>
</body>
</html>
