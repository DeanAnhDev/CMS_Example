<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

        <div class="text-gray-600 text-sm mb-4">
            <span>Danh mục: </span>
            <span class="font-medium">
                {{ $article->categoryDetail->name ?? 'Không có danh mục' }}
                ({{ $article->categoryDetail->category->name ?? '---' }})
            </span> |
            <span>Trạng thái: </span>
            <span class="capitalize">{{ $article->status }}</span> |
            <span>Ngày tạo: </span>
            {{ $article->created_at->format('d/m/Y H:i') }}
        </div>

        @if ($article->thumbnail)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                     alt="Thumbnail"
                     class="rounded-md w-full object-cover max-h-[400px]">
            </div>
        @endif

        <div class="prose max-w-none mb-6">
            {!! $article->content !!}
        </div>

        @if ($article->source_url)
            <div class="mt-6">
                <a href="{{ $article->source_url }}" target="_blank"
                   class="text-blue-600 hover:underline">
                    Xem bài viết gốc
                </a>
            </div>
        @endif

        <div class="mt-8 flex justify-between">
            <a href="{{ route('articles.index') }}"
               class="text-gray-600 hover:text-gray-900 underline">← Quay lại danh sách</a>
            <div class="flex gap-4">
                <a href="{{ route('articles.edit', $article->slug) }}"
                   class="text-blue-600 hover:underline">Sửa</a>

                <form action="{{ route('articles.destroy', $article) }}"
                      method="POST"
                      onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
