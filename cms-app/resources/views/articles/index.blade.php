<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        {{-- Tiêu đề và nút thêm --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách bài viết</h1>
            <a href="{{ route('articles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Thêm bài viết
            </a>
        </div>

        {{-- Thông báo thành công --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Bảng danh sách --}}
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                <tr class="text-left text-sm text-gray-700">
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
                <tbody class="text-sm">
                @forelse ($articles as $article)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="p-4">{{ $article->id }}</td>
                        <td class="p-4">{{ $article->title }}</td>
                        <td class="p-4">{{ $article->slug }}</td>
                        <td class="p-4">
                            @if($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Ảnh" class="w-20 h-auto rounded">
                            @else
                                <span class="text-gray-400 italic">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="p-4">
                            {{ $article->categoryDetail->name ?? 'Không có danh mục' }}
                        </td>
                        <td class="p-4 capitalize">{{ $article->status }}</td>
                        <td class="p-4">{{ $article->views }}</td>
                        <td class="p-4">{{ $article->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="p-4">{{ $article->updated_at?->format('d/m/Y H:i') }}</td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-600 hover:underline">Xem</a>
                                <a href="{{ route('articles.edit', $article->slug) }}" class="text-yellow-600 hover:underline">Sửa</a>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Xóa bài viết?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline" type="submit">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="p-4 text-center text-gray-500">Không có bài viết nào.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Phân trang --}}
        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
