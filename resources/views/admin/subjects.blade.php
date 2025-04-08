@extends('admin.layout')
@section('title', "Subjects")

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 bg-light">
        <div class="row">
            <article class="p-3 col-12 card bg-light" id="tables">
                <div class="card-title  justify-content-between d-flex">
                    <h2>Fanlar</h2>
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#createModal">+ Fan qo'shish</button>

                </div>

                <div class="card-body row gap-0.5">
                    @foreach ($subjects as $subject)
                        <div class="card col-md-2 p-2">
                            <img src="data:image/png;base64,{{ $subject->icon }}" class="card-img-top rounded" alt="{{ $subject->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $subject->name }}</h5>
                            </div>
                            <div class="row g-2">

                                <a href="#" class="btn btn-primary col-12"> <i class="fa fa-eye"></i> Testlar</a>
                                <button class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#editModal{{ $subject->id }}"> <i class="fas fa-pencil"></i> Tahrirlash</button>
                                <button type="button" class="btn btn-danger col-6 " onclick="ConfirmDelete()" form="#deleteform"> <i class="fas fa-trash"></i> O'chirish</button>

                                <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display:none;" id="deleteform">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
    </main>

    <!-- Create Modal -->
    @include('admin.modals.create-subject')

    {{--    edit modals--}}
    @include('admin.modals.edit-subject')
@endsection

@push('scripts')
    <script>
        function ConfirmDelete()
        {
            return confirm("Ushbu fanni o'chirmoqchimisiz?");
        }
    </script>
@endpush
