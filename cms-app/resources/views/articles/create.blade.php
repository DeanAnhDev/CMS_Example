<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Thêm bài viết</h1>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <x-form.input name="title" label="Tiêu đề" :value="old('title')" />

            <x-form.select name="category_id" label="Danh mục" :options="$categories" :selected="old('category_id')" />

            <x-form.file name="thumbnail" label="Ảnh đại diện" />

            <x-form.textarea name="content" label="Nội dung" :value="old('content')" id="content" />

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

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


        <script>
            ClassicEditor
                .create(document.querySelector('#content'), {
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload') }}',
                    }
                })
                .then(editor => {
                    // Set token in request header
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return {
                            upload: () => {
                                return loader.file.then(file => {
                                    const data = new FormData();
                                    data.append('upload', file);

                                    return fetch('{{ route('ckeditor.upload') }}', {
                                        method: 'POST',
                                        body: data,
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            return {
                                                default: data.url
                                            };
                                        })
                                        .catch(error => {
                                            console.error('Upload failed', error);
                                        });
                                });
                            }
                        };
                    };
                })
                .catch(error => console.error(error));
        </script>
    @endpush


</x-app-layout>
