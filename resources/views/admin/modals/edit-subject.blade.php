@foreach($subjects as $subject)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $subject->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $subject->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $subject->id }}">Fanini Tahrirlash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Fan Nomi</label>
                            <input type="text" class="form-control" name="name" value="{{ $subject->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (Yangi yuklash uchun)</label>
                            <input type="file" class="form-control" name="icon" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-success">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach
