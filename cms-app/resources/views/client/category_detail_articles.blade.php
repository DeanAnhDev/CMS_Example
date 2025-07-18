@extends('layouts.frontend')

@section('content')
    <section class="xl:w-[1024px] mx-auto mt-20 pt-5 mb-20">

        <div class="mb-6">
            <a href="{{ route('client.home') }}" class="text-[#D93C23] text-sm font-semibold">
                ← Quay lại
            </a>
            <h1 class="text-xl font-bold text-[#3B4144] mt-2">
                Chuyên mục con: {{ $categoryDetail->name }}
            </h1>
        </div>

        @if($articles->count())
            @foreach($articles as $item)
                <a href="{{ route('client.detail', $item->slug) }}" class="block mb-6">
                    <div class="grid grid-cols-12 gap-4 items-start">
                        <div class="col-span-5 lg:col-span-4">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-[150px] object-cover rounded" />
                        </div>
                        <div class="col-span-7 lg:col-span-8">
                            <h2 class="line-clamp-2 text-lg font-bold text-[#3B4144]">{{ $item->title }}</h2>
                            <div class="flex items-center gap-2 text-sm my-1 text-[#3B4144]">
                                <span>{{ $item->author->name ?? 'Admin' }}</span>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <span>{{ $item->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="line-clamp-3 text-sm text-[#3B4144]">
                                {{ Str::limit(strip_tags($item->content), 160) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        @else
            <p class="text-gray-500">Không có bài viết nào trong chuyên mục này.</p>
        @endif
    </section>
@endsection
