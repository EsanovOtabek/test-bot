<!-- Create Subject Modal -->
<div id="create-subject-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-lg font-semibold text-gray-800">Yangi Fan Qo'shish</h3>
            <button type="button" data-modal-hide="create-subject-modal" class="text-gray-400 hover:text-gray-500">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Modal body -->
        <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Fan Nomi</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Fan Ikonkasi</label>
                <input type="file" id="icon" name="icon" accept="image/png" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                <p class="mt-1 text-sm text-gray-500">Faqat PNG formatidagi rasmlar qabul qilinadi</p>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <button type="button" data-modal-hide="create-subject-modal"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                    Bekor qilish
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Saqlash
                </button>
            </div>
        </form>
    </div>
</div>
