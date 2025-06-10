@extends('admin.layout')
@section('title', "Home")

@section('content')
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Home</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Users Card -->
            <div class="bg-blue-600 text-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-medium">Users</h5>
                            <h4 class="text-2xl font-semibold mt-1">User all</h4>
                        </div>
                        <div class="text-5xl opacity-75">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-3 bg-blue-700">
                    <a href="#" class="text-white hover:text-blue-200 transition-colors">
                        View details <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Success Card -->
            <div class="bg-gray-600 text-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-medium">Success</h5>
                            <h4 class="text-2xl font-semibold mt-1">Success all</h4>
                        </div>
                        <div class="text-5xl opacity-75">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-3 bg-gray-700">
                    <a href="#" class="text-white hover:text-gray-200 transition-colors">
                        View details <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Tasks Card -->
            <div class="bg-green-600 text-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-medium">Tasks (Levels)</h5>
                            <h4 class="text-2xl font-semibold mt-1">10 (8)</h4>
                        </div>
                        <div class="text-5xl opacity-75">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-3 bg-green-700">
                    <a href="#" class="text-white hover:text-green-200 transition-colors">
                        View details <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles') @endpush
@push('scripts') @endpush
