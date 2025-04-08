<div class="modal fade" id="editQuizModal" tabindex="-1" aria-labelledby="editQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQuizModalLabel">Testni Tahrirlash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit-quiz-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="quiz-name" class="form-label">Test Nomi</label>
                        <input type="text" class="form-control" name="name" id="quiz-name" placeholder="Mavzu nomi" required>
                    </div>

                    <div class="mb-3">
                        <label for="quiz-subject-id" class="form-label">Fan</label>
                        <select class="form-select" name="subject_id" id="quiz-subject-id" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quiz-type" class="form-label">Test Turi</label>
                        <select class="form-select" name="type" id="quiz-type" required>
                            <option value="topic">Mavzulashtirilgan</option>
                            <option value="exam">Sinov</option>
                            <option value="dtm">DTM</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
