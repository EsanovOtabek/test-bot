@extends('admin.layout')
@section('title', "Testlar Boshqaruvi")

@section('content')
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <!-- Header and Create Button -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Testlar Ro'yxati</h1>
                <p class="text-gray-600">Fanlar bo'yicha testlarni boshqarish</p>
            </div>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center"
                    data-modal-toggle="create-quiz-modal">
                <i class="fas fa-plus mr-2"></i> Yangi Test
            </button>
        </div>

        <!-- Filters Card -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Subject Filter -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Fanlar</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="subject" name="subject_id" onchange="this.form.submit()">
                        <option value="0">Barcha fanlar</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" @selected($subject->id == $subject_id)>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quiz Type Filter -->
                <div>
                    <label for="quiz_type" class="block text-sm font-medium text-gray-700 mb-1">Test turi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="quiz_type" name="type" onchange="this.form.submit()">
                        <option value="all" @selected($quiz_type=='all')>Barcha testlar</option>
                        <option value="topic" @selected($quiz_type=='topic')>Mavzulashtirilgan</option>
                        <option value="exam" @selected($quiz_type=='exam')>Sinov testlari</option>
                        <option value="dtm" @selected($quiz_type=='dtm')>DTM testlar</option>
                    </select>
                </div>

                <!-- Difficulty Filter (New) -->
                <div>
                    <label for="difficulty" class="block text-sm font-medium text-gray-700 mb-1">Qiyinlik darajasi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="difficulty" name="difficulty" onchange="this.form.submit()">
                        <option value="all" @selected(request('difficulty') == 'all')>Barchasi</option>
                        <option value="easy" @selected(request('difficulty') == 'easy')>Oson</option>
                        <option value="medium" @selected(request('difficulty') == 'medium')>O'rta</option>
                        <option value="hard" @selected(request('difficulty') == 'hard')>Qiyin</option>
                    </select>
                </div>

                <!-- Status Filter (New) -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Holati</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="status" name="status" onchange="this.form.submit()">
                        <option value="all" @selected(request('status') == 'all')>Barchasi</option>
                        <option value="active" @selected(request('status') == 'active')>Faol</option>
                        <option value="inactive" @selected(request('status') == 'inactive')>Nofaol</option>
                        <option value="draft" @selected(request('status') == 'draft')>Qoralama</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Quizzes Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table id="quizTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mavzu</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test Turi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Savollar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Holati</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amallar</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($quizzes as $quiz)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $quiz->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    @if($quiz->subject->icon)
                                        <img src="data:image/png;base64,{{ $quiz->subject->icon }}" class="h-5 w-5 mr-2" alt="{{ $quiz->subject->name }}">
                                    @endif
                                    {{ $quiz->subject->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($quiz->type)
                                    @case('dtm')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">DTM</span>
                                        @break
                                    @case('topic')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Mavzu</span>
                                        @break
                                    @case('exam')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Sinov</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $quiz->countQuestions() }} ta
                                    </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($quiz->is_active)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Faol</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Nofaol</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.quizzes.show', $quiz->id) }}"
                                       class="text-blue-600 hover:text-blue-900 transition-colors"
                                       title="Ko'rish">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button onclick='editQuiz({{$quiz->id}}, "{{$quiz->name}}", {{$quiz->subject_id}}, "{{$quiz->type}}")'
                                            class="text-yellow-600 hover:text-yellow-900 transition-colors"
                                            title="Tahrirlash">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button onclick="confirmDelete({{ $quiz->id }})"
                                            class="text-red-600 hover:text-red-900 transition-colors"
                                            title="O'chirish">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}"
                                          method="POST"
                                          id="deleteform{{ $quiz->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        @if($quizzes->isEmpty())
            <div class="bg-white rounded-lg shadow p-6 text-center mt-6">
                <i class="fas fa-file-alt text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-600">Hozircha testlar mavjud emas</h3>
                <p class="text-gray-500 mt-2">Yangi test qo'shish uchun "Yangi Test" tugmasini bosing</p>
            </div>
        @endif
    </main>

    <!-- Create Quiz Modal -->
    @include('admin.modals.create-quiz')

    <!-- Edit Quiz Modal -->
    @include('admin.modals.edit-quiz')

    <!-- Delete Confirmation Modal -->
    <div id="delete-confirm-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Testni o'chirish</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="delete-confirm-modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p class="text-gray-600 mb-6">Ushbu testni rostdan ham o'chirmoqchimisiz? Bu amalni qaytarib bo'lmaydi.</p>
                <div class="flex justify-end space-x-3">
                    <button type="button"
                            class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors"
                            data-modal-hide="delete-confirm-modal">
                        Bekor qilish
                    </button>
                    <button type="button"
                            id="confirm-delete-button"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                        O'chirish
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#quizTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/uz.json'
                }
            });
        });

        let quizToDelete = null;

        function confirmDelete(quizId) {
            quizToDelete = quizId;
            const modal = document.getElementById('delete-confirm-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        document.getElementById('confirm-delete-button').addEventListener('click', function() {
            if (quizToDelete) {
                document.getElementById('deleteform' + quizToDelete).submit();
            }
        });

        function editQuiz(quizId, quizName, subjectId, quizType) {
            // Set the form action to the correct update route
            document.getElementById('edit-quiz-form').action = '{{ route("admin.quizzes.index") }}/' + quizId;

            // Populate form fields with existing data
            document.getElementById('quiz-name').value = quizName;
            document.getElementById('quiz-subject-id').value = subjectId;
            document.getElementById('quiz-type').value = quizType;

            // Open the modal
            const modal = document.getElementById('edit-quiz-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Modal toggle functionality
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            });
        });

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
