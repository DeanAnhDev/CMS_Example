@extends('layouts.frontend') {{-- hoặc layout bạn đang dùng --}}

@section('content')
    <div class="w-[90%] mx-auto mt-20 pt-10">
        <section class="xl:w-[1024px] mx-auto">
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
                        {{ $article->categoryDetail->name ?? 'Không rõ' }}
                    </div>
                </div>
            </div>

            {{-- Tiêu đề bài viết --}}
            <h1 class="text-3xl font-bold text-[#3B4144]">{{ $article->title }}</h1>

            {{-- Thông tin meta --}}
            <div class="md:flex justify-between items-center gap-2 my-4">
                <div class="flex items-center gap-2 my-4">
                    <h3 class="text-base font-semibold text-[#007882]">{{ $article->categoryDetail->name ?? '' }}</h3>
                    <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                    <p class="text-xs">{{ $article->author->name ?? 'Admin' }}</p>
                    <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                    <p class="text-xs">{{ $article->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="flex items-center gap-2 my-4">
                    <button class="border boder-[#CCCCCC] bg-[#CCCCCC] px-10 lg:py-1 rounded-full  md:px-4 flex items-center gap-2 cursor-pointer">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.44 3C18.781 3 20.071 3.53 21.02 4.481C21.97 5.43 22.501 6.71 22.501 8.05V15.95C22.501 18.74 20.231 21 17.44 21H7.56098C4.76998 21 2.50098 18.74 2.50098 15.95V8.05C2.50098 5.26 4.75998 3 7.56098 3H17.44ZM18.571 8.2C18.361 8.189 18.161 8.26 18.01 8.4L13.501 12C12.921 12.481 12.09 12.481 11.501 12L7.00098 8.4C6.68998 8.17 6.25998 8.2 6.00098 8.47C5.73098 8.74 5.70098 9.17 5.92998 9.47L6.06098 9.6L10.611 13.15C11.171 13.59 11.85 13.83 12.561 13.83C13.27 13.83 13.961 13.59 14.52 13.15L19.031 9.54L19.111 9.46C19.35 9.17 19.35 8.75 19.1 8.46C18.961 8.311 18.77 8.22 18.571 8.2Z" fill="white"/>
                        </svg>

                        <span class="text-[#fff] hidden lg:block">Gửi mail</span>
                    </button>
                    <button class="border boder-[#CCCCCC] bg-[#395185] px-10 lg:py-1  rounded-full md:px-4 flex items-center gap-2 cursor-pointer" >
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.501 2.00195C6.97895 2.00195 2.50195 6.47895 2.50195 12.001C2.50195 16.991 6.15795 21.127 10.939 21.88V14.892H8.39895V12.001H10.939V9.79795C10.939 7.28995 12.432 5.90695 14.715 5.90695C15.809 5.90695 16.955 6.10195 16.955 6.10195V8.56095H15.691C14.451 8.56095 14.063 9.33295 14.063 10.124V11.999H16.834L16.391 14.89H14.063V21.878C18.844 21.129 22.5 16.992 22.5 12.001C22.5 6.47895 18.023 2.00195 12.501 2.00195Z"
                                fill="white"
                            />
                        </svg>
                        <span class="hidden text-[#fff] lg:block">Chia sẻ</span>
                    </button>
                    <button class="border boder-[#CCCCCC] px-10 rounded-full lg:py-1  md:px-4 flex items-center gap-2 cursor-pointer">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.28002 2.50015C8.91002 2.51931 9.52002 2.62931 10.111 2.83031H10.17C10.21 2.84931 10.24 2.87031 10.26 2.88931C10.481 2.96031 10.69 3.04031 10.89 3.15031L11.27 3.32031C11.42 3.40031 11.6 3.54931 11.7 3.61031C11.8 3.66931 11.91 3.73031 12 3.79931C13.111 2.95031 14.46 2.49031 15.85 2.50015C16.481 2.50015 17.111 2.58931 17.71 2.79031C21.401 3.99031 22.731 8.04031 21.62 11.5803C20.99 13.3893 19.96 15.0403 18.611 16.3893C16.68 18.2593 14.561 19.9193 12.28 21.3493L12.03 21.5003L11.77 21.3393C9.48102 19.9193 7.35002 18.2593 5.40102 16.3793C4.06102 15.0303 3.03002 13.3893 2.39002 11.5803C1.26002 8.04031 2.59002 3.99031 6.32102 2.76931C6.61102 2.66931 6.91002 2.59931 7.21002 2.56031H7.33002C7.61102 2.51931 7.89002 2.50015 8.17002 2.50015H8.28002ZM17.19 5.66031C16.78 5.51931 16.33 5.74031 16.18 6.16031C16.04 6.58031 16.26 7.04031 16.68 7.18931C17.321 7.42931 17.75 8.06031 17.75 8.75931V8.79031C17.731 9.01931 17.8 9.24031 17.94 9.41031C18.08 9.58031 18.29 9.67931 18.51 9.70031C18.92 9.68931 19.27 9.36031 19.3 8.93931V8.82031C19.33 7.41931 18.481 6.15031 17.19 5.66031Z" fill="#3B4144"/>
                        </svg>
                        <span class="hidden text-[#000] lg:block">Lưu</span>
                    </button>
                </div>
            </div>

            {{-- Nội dung bài viết --}}
            <div class="text-base text-[#3B4144] leading-7">
                {!! $article->content !!}
            </div>

            {{-- Tag (giả lập) --}}
            <div class="flex items-center gap-2 my-4">
                @foreach($article->tags ?? [] as $tag)
                    <div class="text-sm text-[#3B4144] border border-[#E5E5E5] rounded-full px-6 py-1 bg-[#E5E5E5]">
                        #{{ $tag }}
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Tin cùng chuyên mục --}}
        <section class="mt-10 mb-20 xl:w-[1024px] mx-auto">
            <div class="flex justify-between items-center gap-2 my-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-sm font-semibold text-[#3B4144]">Tin cùng chuyên mục</h2>
                    <div class="text-sm font-semibold px-8 py-1 border-2 border-[#007882] rounded-full text-white bg-[#007882]">
                        {{ $article->categoryDetail->name ?? '' }}
                    </div>
                </div>
                <a href="{{ route('client.home') }}" class="text-sm font-semibold text-[#3B4144]">Xem tất cả</a>
            </div>

            {{-- Danh sách liên quan --}}
            @foreach($relatedArticles as $item)
                <a href="{{ route('client.detail', $item->slug) }}" class="block mb-5 xl:w-[1024px] mx-auto">
                    <div class="grid grid-cols-12 gap-4 items-start">
                        <div class="col-span-5 lg:col-span-4">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" />
                        </div>
                        <div class="col-span-7 lg:col-span-8 ml-2">
                            <h2 class="line-clamp-2 text-lg font-bold text-[#3B4144]">{{ $item->title }}</h2>
                            <div class="flex items-center gap-2 my-1">
                                <h3 class="text-sm font-semibold text-[#007882]">{{ $item->categoryDetail->name ?? '' }}</h3>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $item->author->name ?? 'Admin' }}</p>
                                <span class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></span>
                                <p class="text-xs">{{ $item->created_at->format('d/m/Y') }}</p>
                            </div>
                            <p class="line-clamp-4 text-sm text-[#3B4144] font-normal">
                                {{ Str::limit(strip_tags($item->content), 150) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

            {{-- Tin thịnh hành --}}
            <div class="flex justify-between items-center gap-2 my-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-sm/[21px] font-semibold text-[#3B4144]">Tin thịnh hành</h2>
                </div>
                <div>
                    <span class="hidden md:block text-sm/[21px] font-semibold text-[#3B4144] cursor-pointer">Xem tất cả</span>
                </div>
            </div>


            @foreach ($trendingArticles as $item)
                <a href="{{ route('client.detail', $item->slug) }}" class="block mx-auto mb-5 xl:w-[1024px] cursor-pointer hover:opacity-90 transition">
                    <!-- mobile -->
                    <div class="block md:hidden">
                        <h2 class="line-clamp-2 text-sm/[21px] font-bold text-[#3B4144] mt-2">
                            {{ $item->title }}
                        </h2>
                        <div class="flex items-center gap-2 my-1">
                            <h3 class="text-sm/[20px] font-semibold text-[#007882]">{{ $item->categoryDetail->name ?? 'Danh mục' }}</h3>
                            <svg width="3" height="4" viewBox="0 0 3 4" fill="none"><circle cx="1.5" cy="1.56641" r="1.5" fill="#3B4144" /></svg>
                            <p class="text-xs">{{ $item->author->name ?? 'Tác giả' }}</p>
                            <svg width="3" height="4" viewBox="0 0 3 4" fill="none"><circle cx="1.5" cy="1.56641" r="1.5" fill="#3B4144" /></svg>
                            <p class="text-xs">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <!-- desktop -->
                    <div class="w-full mb-4">
                        <div class="relative grid grid-cols-12 gap-4 items-start">
                            <div class="col-span-5 lg:col-span-4 relative">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full object-cover h-[180px]" />
                            </div>
                            <div class="col-span-7 lg:col-span-8 ml-2">
                                <div class="hidden md:block">
                                    <h2 class="line-clamp-2 text-lg/[21px] font-bold text-[#3B4144] mt-2 lg:text-lg/[27px]">
                                        {{ $item->title }}
                                    </h2>
                                    <div class="flex items-center gap-2 my-1">
                                        <h3 class="text-sm/[27px] font-semibold text-[#007882]">{{ $item->categoryDetail->name ?? 'Danh mục' }}</h3>
                                        <svg width="3" height="4" viewBox="0 0 3 4" fill="none"><circle cx="1.5" cy="1.56641" r="1.5" fill="#3B4144" /></svg>
                                        <p class="text-xs">{{ $item->author->name ?? 'Tác giả' }}</p>
                                        <svg width="3" height="4" viewBox="0 0 3 4" fill="none"><circle cx="1.5" cy="1.56641" r="1.5" fill="#3B4144" /></svg>
                                        <p class="text-xs">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="line-clamp-4 text-sm/[21px] text-[#3B4144] font-normal lg:text-base/[28px]">
                                        {{ \Str::limit(strip_tags($item->content), 180) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </section>
    </div>
@endsection
