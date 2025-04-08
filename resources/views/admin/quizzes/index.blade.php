@extends('admin.layout')
@section('title', "Subjects")

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 bg-light">
        <div class="row ">
            <div class="col-md-12 container card p-0">
                <div class="card-header bg-warning py-3 d-flex justify-content-between">
                    <h2>Testlar</h2>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuizModal">
                        <i class="fas fa-plus"></i> Test qo‘shish
                    </a>
                </div>

                <div class="card-body">
                    <form class="row ">
                        <div class="col-md-6">
                            <label for="subject" class="form-label">Fanlar</label>
                            <select class="form-select" id="subject" name="subject_id" onchange="this.form.submit()">
                                <option value="0">Barcha fanlar</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected($subject->id == $subject_id)>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="quiz_type" class="form-label">Test turi</label>
                            <select class="form-select" id="quiz_type" name="type" onchange="this.form.submit()">
                                <option value="all" @selected($quiz_type=='all')>Barcha testlar</option>
                                <option value="topic" @selected($quiz_type=='topic')>Mavzulashtirilgan testlar</option>
                                <option value="exam" @selected($quiz_type=='exam')>Sinov testlari</option>
                                <option value="dtm" @selected($quiz_type=='dtm')>DTM testlar</option>
                            </select>
                        </div>

                    </form>
                    <hr>

                    <table id="quizTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mavzu</th>
                            <th>Fan</th>
                            <th>Test Turi</th>
                            <th>Testlar soni</th>
                            <th>Amallar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $quiz->name }}</td>
                                <td>{{ $quiz->subject->name }}</td>
                                <td>
                                    @switch($quiz->type)
                                        @case('dtm')
                                            <span class="badge bg-danger">DTM test</span>
                                            @break
                                        @case('topic')
                                            <span class="badge bg-primary">Mavzulashtirilgan test</span>
                                            @break
                                        @case('exam')
                                            <span class="badge bg-warning">Sinov Test</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="fw-bold">{{ $quiz->countQuestions() }}</td>
                                <td>
                                    <a href="{{ route('admin.quizzes.show', $quiz->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye"></i> Ko'rish</a>

                                    <button onclick='editQuiz({{$quiz->id}}, "{{$quiz->name}}", {{$quiz->subject_id}}, "{{$quiz->type}}")' class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil"></i>Tahrirlash</button>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="ConfirmDelete({{ $quiz->id }})">
                                        <i class="fas fa-trash"></i> O'chirish
                                    </button>

                                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" style="display:none;" id="deleteform{{ $quiz->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Create Quiz Modal -->
    @include('admin.modals.create-quiz')

    <!-- Edit Quizzes Modal -->
    @include('admin.modals.edit-quiz')

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    <script>

        $(document).ready(function() {
            $('#quizTable').DataTable();

        });

        function ConfirmDelete(quizId) {
            if (confirm("Ushbu testni o'chirmoqchimisiz!?")) {
                document.getElementById('deleteform' + quizId).submit();
            }
        }

        function editQuiz(quizId, quizName, subjectId, quizType) {
            // Set the form action to the correct update route
            $('#edit-quiz-form').attr('action', '{{ route("admin.quizzes.index") }}/' + quizId);

            // Populate form fields with existing data
            $('#quiz-name').val(quizName);
            $('#quiz-subject-id').val(subjectId);
            $('#quiz-type').val(quizType);

            // Open the modal
            $('#editQuizModal').modal('show');
        }

    </script>
@endpush

