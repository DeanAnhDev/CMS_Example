<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Sửa bài viết</h1>

        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="space-y-5">

        @csrf
            @method('PUT')


            <x-form.input name="title" label="Tiêu đề" :value="old('title',  $article->title)" />
            <x-form.select name="category_id" label="Danh mục" :options="$categories" :selected="old('category_id',  $article->category_id)" />
            <div>
                <label>Ảnh hiện tại</label>
                <img src="{{ asset('storage/' . $article->thumbnail) }}"  alt="Ảnh" class="w-100 h-auto rounded m-auto pt-4" >
            </div>

            <x-form.file name="thumbnail"  label="Chọn ảnh mới"/>

            <x-form.textarea name="content" label="Nội dung" :value="old('content', $article->content)" id="content" />

            <x-form.select name="status" label="Trạng thái" :options="['draft'=>'Nháp','published'=>'Công khai','archived'=>'Lưu trữ']" :selected="old('status', $article->status)" />

            <div class="flex justify-between mt-6">
                <a href="{{ route('articles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black font-semibold px-6 py-2 rounded-md shadow-md">
                    Quay lại
                </a>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#content'))
                .catch(error => console.error(error));
        </script>
    @endpush
</x-app-layout>
