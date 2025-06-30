<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách bài viết</h1>
            <a href="{{ route('articles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Thêm bài viết
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-100">
            <tr class="text-left">
                <th class="p-4">#</th>
                <th class="p-4">Tiêu đề</th>
                <th class="p-4">Slug</th>
                <th class="p-4">Ảnh bìa</th>
                <th class="p-4">Danh mục</th>
                <th class="p-4">Trạng thái</th>
                <th class="p-4">Lượt xem</th>
                <th class="p-4">Ngày tạo</th>
                <th class="p-4">Ngày sửa</th>
                <th class="p-4">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr class="border-t">
                    <td class="p-4">{{ $article->id }}</td>
                    <td class="p-4">{{ $article->title }}</td>
                    <td class="p-4">{{ $article->slug }}</td>
                    <td class="p-4">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Ảnh" class="w-20 h-auto rounded">
                    </td>
                    <td class="p-4">
                        {{ $article->category->name ?? 'Không có danh mục' }}
                    </td>

                    <td class="p-4">{{ ucfirst($article->status) }}</td>
                    <td class="p-4">{{ $article->views }}</td>
                    <td>{{ $article->create_at ? $article->create_at->format('d/m/Y H:i') : '' }}</td>
                    <td>{{ $article->update_at ? $article->update_at->format('d/m/Y H:i') : '' }}</td>
                    <td class="p-4 flex gap-2">
                        <a href="{{ route('articles.edit', $article->slug) }}" class="text-blue-600 hover:underline">Sửa</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Xóa bài viết?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline" type="submit">Xóa</button>
                        </form>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
