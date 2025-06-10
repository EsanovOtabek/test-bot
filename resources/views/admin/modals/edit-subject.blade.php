@foreach($subjects as $subject)
    <!-- Edit Subject Modal -->
    <div id="edit-subject-modal-{{ $subject->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-800">Fanini Tahrirlash</h3>
                <button type="button"
                        class="text-gray-400 hover:text-gray-500"
                        data-modal-hide="edit-subject-modal-{{ $subject->id }}">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4">
                <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Fan Nomi</label>
                        <input type="text"
                               name="name"
                               value="{{ $subject->name }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (Yangi yuklash uchun)</label>
                        <div class="flex items-center space-x-4">
                            @if($subject->icon)
                                <div class="flex-shrink-0">
                                    <img src="data:image/png;base64,{{ $subject->icon }}"
                                         class="h-10 w-10 object-contain"
                                         alt="Current icon">
                                </div>
                            @endif
                            <input type="file"
                                   name="icon"
                                   accept="image/*"
                                   class="block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t">
                        <button type="button"
                                class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors"
                                data-modal-hide="edit-subject-modal-{{ $subject->id }}">
                            Bekor qilish
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                            Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
