<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Thêm bài viết</h1>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <x-form.input name="title" label="Tiêu đề" :value="old('title')" />

            {{-- CHỈNH SỬA: category_detail_id --}}
            <div class="space-y-2">
                <label for="category_detail_id" class="block font-medium text-gray-700">Danh mục chi tiết</label>
                <select name="category_detail_id" id="category_detail_id"
                        class="w-full border border-gray-300 rounded p-2">
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categoryDetails as $detail)
                        <option value="{{ $detail->id }}" {{ old('category_detail_id') == $detail->id ? 'selected' : '' }}>
                            {{ $detail->name }} ({{ $detail->category->name ?? 'Không có danh mục' }})
                        </option>
                    @endforeach
                </select>
                @error('category_detail_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-form.file name="thumbnail" label="Ảnh đại diện" />

            <div class="space-y-2">
                <label for="source_url" class="block font-medium text-gray-700">URL bài viết gốc</label>
                <div class="flex space-x-2">
                    <input type="text" id="source_url" class="w-full border border-gray-300 rounded p-2" placeholder="https://..." />
                    <button type="button" onclick="crawlArticle()" class="border border-gray-300 rounded bg-green-600 hover:bg-green-700 text-white px-4 py-2">
                        Tải từ URL
                    </button>
                </div>
            </div>

            <div class="space-y-2">
                <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                <textarea name="content" id="content" rows="10"
                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-form.select name="status" label="Trạng thái" :options="['draft'=>'Nháp','published'=>'Công khai','archived'=>'Lưu trữ']" :selected="old('status','draft')" />

            <div class="flex justify-between mt-6">
                <a href="{{ route('articles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black font-semibold px-6 py-2 rounded-md shadow-md">
                    Quay lại
                </a>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Thêm
                </button>
            </div>
        </form>
    </div>

    <script>
        function crawlArticle() {
            const url = document.getElementById('source_url').value;
            if (!url) return alert("Vui lòng nhập URL bài viết.");

            fetch(`/crawl-article?url=${encodeURIComponent(url)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.error) return alert(data.error);
                    document.getElementById('content').innerHTML = data.html || data.error || 'Không có nội dung';
                })
                .catch(err => {
                    console.error(err);
                    alert("Lỗi khi tải nội dung.");
                });
        }
    </script>
</x-app-layout>
