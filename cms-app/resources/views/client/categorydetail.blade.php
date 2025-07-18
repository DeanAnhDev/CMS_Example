@extends('layouts.frontend')

@section('content')
    <section class="xl:w-[1024px] mx-auto mt-20 pt-5 mb-20">

        {{-- Quay lại + chuyên mục cha --}}
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('client.home') }}">
                <div class="flex items-center gap-2">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3335 13.1663L5.66683 8.49967L10.3335 3.83301"
                              stroke="#3B4144"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
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

        {{-- Danh sách chuyên mục con --}}
        @if($categoryDetails->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($categoryDetails as $detail)
                    <a href="{{ route('client.categorydetail.show', [$detail->category->slug, $detail->slug]) }}" class="block p-4 border rounded hover:shadow transition bg-white">
                        <h2 class="text-lg font-semibold text-[#3B4144] mb-2">{{ $detail->name }}</h2>
                        <p class="text-sm text-gray-600 line-clamp-3">{{ $detail->description ?? 'Không có mô tả.' }}</p>
                    </a>
                @endforeach
            </div>

        @else
            <p class="text-gray-500">Không có chuyên mục con nào trong chuyên mục này.</p>
        @endif

    </section>
@endsection
