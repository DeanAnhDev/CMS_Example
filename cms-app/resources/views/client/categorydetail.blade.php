@extends('layouts.frontend')

@section('content')
    <section class="xl:w-[1024px] mx-auto mt-20 pt-5 mb-20">

        {{-- Quay lại + chuyên mục --}}
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('client.home') }}">
                <div class="flex items-center gap-2">
                    <svg
                        width="16"
                        height="17"
                        viewBox="0 0 16 17"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M10.3335 13.1663L5.66683 8.49967L10.3335 3.83301"
                            stroke="#3B4144"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    <span class="text-sm text-[#D93C23] font-semibold">Quay lại</span>
                </div>
            </a>
            <div class="flex items-center gap-2">
                <span class="hidden md:block text-sm font-semibold text-[#3B4144]">Chuyên mục:</span>
                <div class="text-sm font-semibold px-8 py-1 border border-2 border-[#007882] rounded-full text-white bg-[#007882]">
                    {{ $category->name ?? 'Không rõ' }}
                </div>
            </div>
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
                            <p class="line-clamp-3 text-sm text-[#3B4144]">{{ Str::limit(strip_tags($item->content), 160) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="mt-6">
                {{ $articles->links() }} {{-- Hiển thị phân trang --}}
            </div>
        @else
            <p class="text-gray-500">Không có bài viết nào trong chuyên mục này.</p>
        @endif
    </section>
@endsection
