<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Thêm danh mục</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tên danh mục</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between mt-6">
                <a href="{{ route('categories.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black font-semibold px-6 py-2 rounded-md shadow-md transition duration-300">
                    Quay lại
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md shadow-md transition duration-300">
                    Thêm
                </button>
            </div>


        </form>
    </div>
</x-app-layout>
