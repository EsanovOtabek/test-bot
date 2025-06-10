@extends('admin.layout')

@section('title', "Fanlar Boshqaruvi")

@section('content')
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <!-- Sarlavha va Tugmalar -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Fanlar Ro'yxati</h1>
            <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                    data-modal-toggle="create-subject-modal">
                <i class="fas fa-plus mr-2"></i> Yangi Fan
            </button>
        </div>

        <!-- Fanlar Kartalari -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($subjects as $subject)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                    <!-- Fan Ikonkasi -->
                    <div class="flex justify-center p-4 bg-gray-50">
                        <img src="data:image/png;base64,{{ $subject->icon }}"
                             class="h-20 w-20 object-contain"
                             alt="{{ $subject->name }}">
                    </div>

                    <!-- Fan Ma'lumotlari -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 text-center mb-2">{{ $subject->name }}</h3>

                        <!-- Amallar Tugmalari -->
                        <div class="flex flex-wrap gap-2 mt-4">
                            <a href="#" class="flex-1 px-3 py-2 bg-blue-600 text-white text-center rounded hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Testlar
                            </a>

                            <button class="flex-1 px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors"
                                    data-modal-toggle="edit-subject-modal-{{ $subject->id }}">
                                <i class="fas fa-pencil-alt mr-1"></i> Tahrirlash
                            </button>

                            <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Ushbu fanni o\'chirmoqchimisiz?')"
                                        class="w-full px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                    <i class="fas fa-trash-alt mr-1"></i> O'chirish
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bo'sh fanlar uchun -->
        @if($subjects->isEmpty())
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <i class="fas fa-book-open text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-600">Hozircha fanlar mavjud emas</h3>
                <p class="text-gray-500 mt-2">Yangi fan qo'shish uchun yuqoridagi "Yangi Fan" tugmasini bosing</p>
            </div>
        @endif
    </main>

    <!-- Yangi Fan Modal -->
    @include('admin.modals.create-subject')

    <!-- Tahrirlash Modallari -->
    @foreach ($subjects as $subject)
        @include('admin.modals.edit-subject', ['subject' => $subject])
    @endforeach
@endsection

@push('scripts')
    <!-- Modal Toggle Script -->
    <script>
        // Modal elementlari uchun toggle funktsiyasi
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            });
        });

        // Modal yopish uchun
        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });
    </script>
@endpush
