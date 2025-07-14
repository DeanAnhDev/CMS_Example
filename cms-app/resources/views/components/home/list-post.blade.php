<section id="list-post" class="w-[90%] mx-auto xl:w-[1024px]">
    <div class="w-fit mx-auto flex items-center gap-2 font-custom font-bold text-[21px] p-2 mb-4 lg:text-[32px]">
        <svg class="w-6 h-6 lg:w-10 h-10" fill="none" stroke="currentColor"><!-- icon --></svg>
        <h1>Tin Tức</h1>
    </div>

    <div class="grid gap-6 lg:grid-cols-12">
        <!-- bài viết đầu tiên -->
        @if($news->count())
            @php $first = $news->first(); @endphp
            <div class="relative w-full mb-4 col-span-12 lg:col-span-8 lg:col-start-1">
                <a href="{{ route('client.detail', $first->slug) }}">
                    <img src="{{ asset('storage/' . $first->thumbnail) }}" class="w-full h-auto rounded-md object-cover" />
                    <div class="absolute top-4 right-4">
                        <svg class="w-6 h-6"><!-- heart icon --></svg>
                    </div>
                    <div>
                        <h2 class="line-clamp-2 text-sm/[21px] font-bold text-[#3B4144] mt-2 lg:text-lg/[27px]">{{ $first->title }}</h2>
                        <div class="flex items-center gap-2 my-1">
                            <h3 class="text-sm font-semibold text-[#007882]">{{ $first->category->name ?? '' }}</h3>
                            <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                            <p class="text-xs">{{ $first->author->name ?? 'Admin' }}</p>
                            <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                            <p class="text-xs">{{ $first->created_at->format('d/m/Y') }}</p>
                        </div>
                        <p class="line-clamp-3 text-sm text-[#3B4144]">{{ Str::limit(strip_tags($first->content), 200) }}</p>
                    </div>
                </a>
            </div>
        @endif

        <!-- các bài còn lại -->
        <div class="col-span-12 lg:col-span-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
            @foreach($news->skip(1) as $news)
                <a href="{{ route('client.detail', $news->slug) }}">
                    <div class="relative w-full mb-4">
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="w-full h-auto rounded-md object-cover" />
                        <div class="absolute top-4 right-4">
                            <svg class="w-6 h-6"><!-- heart icon --></svg>
                        </div>
                        <div>
                            <h2 class="line-clamp-2 text-sm font-bold text-[#3B4144] mt-2 lg:text-lg">{{ $news->title }}</h2>
                            <div class="flex items-center gap-2 my-1">
                                <h3 class="text-sm font-semibold text-[#007882]">{{ $news->category->name ?? '' }}</h3>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $news->author-> name ?? 'Admin' }}</p>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $news->created_at->format('d/m/Y') }}</p>
                            </div>
                            <p class="line-clamp-3 text-sm text-[#3B4144] font-normal">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</section>
