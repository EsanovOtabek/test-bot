@extends('admin.layout')
@section('title', "Home")

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2>Home</h2>
        <div class="row">

            <div class="col-lg-4 p-3">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Users</h5>
                                <h4 class="card-text">User all</h4>
                            </div>
                            <div class="col-md-4">
                                <p class="display-4"><i class="fas fa-users"></i></p>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer pl-5"><a class="text-white text-decoration-none" href="#">View details></a></div>
                </div>
            </div>

            <div class="col-lg-4 p-3">
                <div class="card text-white bg-secondary mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Success</h5>
                                <h4 class="card-text">Success all</h4>
                            </div>
                            <div class="col-md-4">
                                <p class="display-4"><i class="fas fa-tasks"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pl-5"><a class="text-white text-decoration-none" href="">View details></a></div>
                </div>
            </div>

            <div class="col-lg-4 p-3">
                <div class="card text-white bg-success mb-3" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Tasks (Levels)</h5>
                                <h4 class="card-text">10 (8)</h4>
                            </div>
                            <div class="col-md-4">
                                <p class="display-4"><i class="fas fa-file-alt"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pl-5"><a class="text-white text-decoration-none"  href="">View details></a></div>
                </div>
            </div>

        </div>
    </main>
@endsection


@push('styles') @endpush
@push('scripts') @endpush
