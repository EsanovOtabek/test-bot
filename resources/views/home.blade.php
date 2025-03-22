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
            <div class="col-6">
                <div class="subject-card">
                    <i class="fas fa-calculator"></i>
                    <p class="h5 fw-bold mt-2">Matematika</p>
                </div>
            </div>
            <div class="col-6">
                <div class="subject-card">
                    <i class="fas fa-flask"></i>
                    <p class="h5 fw-bold mt-2">Kimyo</p>
                </div>
            </div>
            <div class="col-6">
                <div class="subject-card">
                    <i class="fas fa-atom"></i>
                    <p class="h5 fw-bold mt-2">Fizika</p>
                </div>
            </div>
            <div class="col-6">
                <div class="subject-card">
                    <i class="fas fa-book"></i>
                    <p class="h5 fw-bold mt-2">Adabiyot</p>
                </div>
            </div>
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
