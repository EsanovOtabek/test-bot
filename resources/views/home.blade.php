@extends('app')

@section('content')
    <!-- Banner -->
    <div class="banner">
        📚 Telegram testlar
    </div>

    <!-- Reklama -->
    <div class="container mt-3">
        <div class="ad-banner text-center">
            <img src="{{ asset('images/img.png') }}" class="img-fluid rounded shadow" alt="Reklama">
        </div>
    </div>

    <!-- Fanlar Grid -->
    <div class="container mt-3">
        <div class="row g-3">
            @foreach($subjects as $subject)
                <div class="col-6">
                    <div class="subject-card">
                        <img src="data:image/jpg;base64,{{ $subject->icon }}" alt="" width="100%">
                        <p class="h5 fw-bold mt-2">{{ $subject->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pastki Navbar -->
    <div class="bottom-nav">
        <a href="#" class="active">
            <i class="fas fa-home"></i>
            <span>Asosiy</span>
        </a>
        <a href="#">
            <i class="fas fa-list"></i>
            <span>Testlar</span>
        </a>
        <a href="#">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
    </div>
@endsection
