<section id="news" class="mx-auto lg:mx-auto mb-10">
    <div class="font-custom font-semibold text-sm/[21px] mb-4 w-[90%] mx-auto mt-6 xl:w-[1024px]">
        <h2>Danh sách tin</h2>
    </div>

    @foreach ($articles as $article)
        <a href="{{ route('client.detail', $article->slug) }}" class="w-[90%] mx-auto mb-5 block xl:w-[1024px]">
            <!-- Mobile -->
            <div class="block md:hidden">
                <h2 class="line-clamp-2 text-sm/[21px] font-bold text-[#3B4144] mt-2">
                    {{ $article->title }}
                </h2>
                <div class="flex items-center gap-2 my-1">
                    <h3 class="text-sm/[20px] font-semibold text-[#007882]">{{ $article->categoryDetail->name ?? '' }}</h3>
                    <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                    <p class="text-xs">{{ $article->author->name ?? 'Admin' }}</p>
                    <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                    <p class="text-xs">{{ $article->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <!-- Desktop -->
            <div class="w-full mb-4">
                <div class="relative grid grid-cols-12 gap-4 items-start">
                    <div class="col-span-5 lg:col-span-4 relative">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" />
                        <div class="absolute bottom-5 left-5 md:top-5 md:right-5 md:bottom-auto md:left-auto">
                            <x-heart-post class="w-6 h-6" />
                        </div>
                    </div>

                    <div class="col-span-7 lg:col-span-8 ml-2">
                        <div class="hidden md:block">
                            <h2 class="line-clamp-2 text-lg/[21px] font-bold text-[#3B4144] mt-2 lg:text-lg/[27px]">
                                {{ $article->title }}
                            </h2>
                            <div class="flex items-center gap-2 my-1">
                                <h3 class="text-sm/[27px] font-semibold text-[#007882]">{{ $article->categoryDetail->name ?? '' }}</h3>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $article->author->name ?? 'Admin' }}</p>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $article->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <p class="line-clamp-4 text-sm/[21px] text-[#3B4144] font-normal lg:text-base/[28px]">
                            {{ Str::limit(strip_tags($article->content), 200) }}
                        </p>
                    </div>
                </div>
            </div>
        </a>
    @endforeach


    @if ($articles->hasMorePages())
        <div class="flex justify-center mt-6">
            <a
                href="{{ $articles->nextPageUrl() }}"
                class="px-10 py-2 border-2 border-[#3B4144] rounded-full text-[#3B4144] font-semibold
                   hover:bg-[#3B4144] hover:text-white hover:shadow-md transition duration-300 cursor-pointer"
            >
                Xem thêm
            </a>
        </div>
    @endif



</section>
