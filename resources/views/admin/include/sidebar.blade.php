<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-white border-r border-gray-200">
        <div class="flex items-center justify-center h-16 px-4 bg-green-600">
            <span class="text-white font-bold text-xl">Quiz Admin</span>
        </div>
        <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
            <nav class="flex-1 space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-tachometer-alt mr-3 text-green-600"></i>
                    Dashboard
                </a>

                <!-- Quizzes -->
                <a href="{{ route('admin.quizzes.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-question-circle mr-3 text-green-600"></i>
                    Testlar
                </a>

                <!-- Categories -->
                <a href="{{ route('admin.subjects.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-folder mr-3 text-green-600"></i>
                    Fanlar
                </a>

                <!-- Questions -->
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-question mr-3 text-green-600"></i>
                    Savollar
                </a>

                <!-- Users -->
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-users mr-3 text-green-600"></i>
                    Foydalanuvchilar
                </a>

                <!-- Results -->
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-chart-bar mr-3 text-green-600"></i>
                    Natijalar
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="mt-auto pb-4">
                <hr class="my-2 border-gray-200">
                <!-- Settings -->
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 group">
                    <i class="fas fa-cog mr-3 text-green-600"></i>
                    Sozlamalar
                </a>
            </div>
        </div>
    </div>
</div>
