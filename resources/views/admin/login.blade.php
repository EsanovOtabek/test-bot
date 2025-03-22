<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="LifePC GrouP">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/login.style.css')}}" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <title>Login</title>
</head>

<body class="text-center">

<main class="form-signin">
    <form action="{{route('login.check')}}" method="POST">
        @csrf
        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="telegram_id" name="telegram_id" placeholder="Telegram ID" value="">
            <label for="telegram_id">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password"  name="password" placeholder="********">
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>

        <p class="mt-5 mb-3 text-muted">&copy; 2021. Powered by <a href="http://lifepc.uz">LifePC GrouP</a></p>
    </form>
</main>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
        toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
        toastr.error("{{ session('error') }}");
        @endif
    });
</script>


</body>
</html>
