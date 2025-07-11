<section id="video" class="lg:mx-auto mx-auto">
    <div class="flex justify-between items-center font-custom font-semibold text-sm/[21px] mb-4 w-[90%] mx-auto lg:mt-10 xl:w-[1024px]">
        <h2>Video</h2>
        <p class="font-normal text-gray-500 text-sm hidden md:block cursor-pointer">Xem tất cả</p>
        <x-arrow /> {{-- Hoặc dùng SVG nếu không dùng component --}}
    </div>

    <div class="w-[90%] mx-auto flex flex-col lg:flex-row gap-4 items-start xl:w-[1024px]">
        <!-- Video chính -->
        <div class="basis-8/12">
            <div class="relative w-full mb-4">
                <img
                    src="{{ asset('storage/img/video1.jpg') }}"
                    alt=""
                    class="w-full aspect-[16/9] object-cover rounded-4xl lg:h-[400px]"
                />
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transform">
                    <x-play-video class="w-12 h-12 text-white" />
                </div>
                <div class="absolute top-4 right-4">
                    <x-heart-post class="w-6 h-6" />
                </div>
                <div class="lg:absolute inset-0 bg-gradient-to-t from-[#00000080] to-[#00000000] rounded-4xl"></div>
                <div class="lg:absolute bottom-5 left-5 lg:text-[#fff]">
                    <h2 class="line-clamp-2 text-sm/[21px] font-bold text-[#3B4144] mt-2 lg:text-[#fff] lg:text-lg/[27px]">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit...
                    </h2>
                    <div class="flex items-center gap-2 my-1">
                        <p class="text-xs lg:text-sm/[21px]">5542 lượt xem</p>
                        <div class="w-[3px] h-[3px] bg-[#3B4144] rounded-full lg:bg-[#fff]"></div>
                        <p class="text-xs lg:text-sm/[21px] lg:text-[#FFFFFF] lg:font-normal">24/02/2020</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách video nhỏ -->
        <div class="flex lg:flex-col basis-4/12 gap-4 h-full overflow-x-auto w-full lg:overflow-y-auto mt-4 lg:mt-0 lg:h-[400px]">
            @for ($i = 1; $i <= 3; $i++)
                <div class="w-[60%] md:w-[30%] lg:w-[95%] shrink-0 relative">
                    <div class="relative w-full mb-2">
                        <img src="{{ asset("storage/img/imagevd$i.png") }}" alt="" />
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <x-play-video class="w-12 h-12 text-white" />
                        </div>
                    </div>
                    <x-heart-post class="absolute top-4 right-4 sm:hidden" />
                    <div>
                        <h2 class="line-clamp-2 text-sm/[21px] font-bold text-[#3B4144] mt-2">
                            Lorem ipsum dolor sit, amet consectetur...
                        </h2>
                        <div class="flex items-center gap-2 my-1">
                            <p class="text-xs">5542 lượt xem</p>
                            <div class="w-[3px] h-[3px] bg-[#3B4144] rounded-full"></div>
                            <p class="text-xs">24/02/2020</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
