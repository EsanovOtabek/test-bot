<div class="modal fade" id="createQuizModal" tabindex="-1" aria-labelledby="createQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createQuizModalLabel">Yangi Test Qo‘shish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.quizzes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Test Nomi</label>
                        <input type="text" class="form-control" name="name" placeholder="Mavzu nomi" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Fan</label>
                        <select class="form-select" name="subject_id" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Test Turi</label>
                        <select class="form-select" name="type" required>
                            <option value="topic">Mavzulashtirilgan</option>
                            <option value="exam">Sinov</option>
                            <option value="dtm">DTM</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="question_count" class="form-label">Testlar soni</label>
                        <input type="number" class="form-control" name="question_count" min="1" required value="0">
                    </div>

                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </form>
            </div>
        </div>
    </div>
</div>
