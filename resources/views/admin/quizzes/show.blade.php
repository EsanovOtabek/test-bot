@extends('admin.layout')
@section('title', $quiz->name)

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-2 bg-light">
        <div class=" mb-3">
            <div class="card">
                <div class="card-header bg-warning py-2">
                    <h2>{{ $quiz->name }} ({{ $quiz->subject->name }})</h2>
                </div>
                <div class="card-body">
                    <p><strong>Test turi:</strong> {{ ucfirst($quiz->type) }}</p>
                    <p><strong>Savollar soni:</strong> {{ $quiz->questions->count() }}</p>
                </div>
            </div>
        </div>

        @foreach ($quiz->questions as $question)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><strong>Savol #{{ $loop->iteration }}</strong></span>
                    <button class="btn btn-danger btn-sm">O‘chirish</button>
                </div>
                <div class="card-body row">
                    <div class="col-md-6 mb-3">
                        <label><strong>Savol matni</strong></label>
                        <textarea class="form-control ckeditor" name="question_text_{{ $question->id }}">{{ $question->question_text }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Variantlar</strong></label>
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="mb-2">
                                <textarea class="form-control ckeditor" name="option_{{ $i }}_{{ $question->id }}">
                                    {{ $question->{'option_' . $i} }}
                                </textarea>
                            </div>
                        @endfor
                        <label class="mt-2"><strong>To‘g‘ri variant:</strong></label>
                        <select class="form-select w-50" name="correct_option_{{ $question->id }}">
                            @for ($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}" @selected($question->correct_option == $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-success btn-sm">Saqlash</button>
                </div>
            </div>
        @endforeach
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.ckeditor').forEach(function(el) {
            CKEDITOR.replace(el);
        });
    </script>
@endsection
