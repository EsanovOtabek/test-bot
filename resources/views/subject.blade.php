@extends('app')

@section('content')

    <!-- Header (Banner) -->
    <div class="header">
        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
        </a>
        <span class="header-title">📘 Testlar ro‘yxati</span>
    </div>

    <div class="container mt-3">
        <div class="row">
            @foreach($tests as $test)
                <div class="col-12">
                    <div class="card test-card mb-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-book-open text-primary me-2 fa-2x"></i>
                                <span class="fw-bold">{{ $test['title'] }}</span>
                            </div>
                            <a href="{{ route('test.show', $test['id']) }}" class="btn btn-success btn-sm">Ko‘rish</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <style>
        .test-card {
            transition: 0.3s;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .test-card:hover {
            background: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
