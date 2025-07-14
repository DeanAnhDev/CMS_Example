@php use Illuminate\Support\Facades\Auth; @endphp
<header>
    <div
            class=" flex justify-between items-center p-6 fixed top-0 left-0 right-0 bg-white z-10 shadow-md"
    >
        <div class="flex items-center space-x-4">

            <button id="menu-toggle" onclick="toggleMenu()" class="xl:hidden text-xl px-4 py-2"> <x-menu-icon class="w-6 h-6" /></button>


            <div class="hidden xl:block">
                <ul class="flex space-x-10 ml-10">
                    <li
                            class="text-gray-500 font-semibold py-2 hover:text-[#3B4144] hover:border-b-2 hover:border-[#D93C23] cursor-pointer text-lg transition duration-300 ease-in-out"
                    >
                        Mua nhà
                    </li>
                    <li
                            class="text-gray-500 font-semibold py-2 hover:text-[#3B4144] hover:border-b-2 hover:border-[#D93C23] cursor-pointer text-lg transition duration-300 ease-in-out"
                    >
                        Thuê nhà
                    </li>
                    <li
                            class="text-gray-500 font-semibold py-2 hover:text-[#3B4144] hover:border-b-2 hover:border-[#D93C23] cursor-pointer text-lg transition duration-300 ease-in-out"
                    >
                        Khám phá
                    </li>

                    <!-- Mục đang active -->
                    <li
                            class="text-[#3B4144] font-semibold py-2 border-b-2 border-[#D93C23] cursor-pointer text-lg"
                    >
                        Blog
                    </li>
                </ul>
            </div>

            <h1
                    class="text-primary-black font-header-custom font-semibold text-lg xl:hidden cursor-pointer"
            >
                ReviewNhà
            </h1>
        </div>
        <a href="{{ route('client.home') }}">
            <h1
                class="text-primary-black font-header-custom font-semibold text-2xl hidden xl:block cursor-pointer"
            >
                *ReviewNhà
            </h1>
        </a>


        <div class="flex items-center space-x-4">
            <x-notification-icon class="xl:hidden cursor-pointer" />
            <x-heart-icon class="cursor-pointer" />
            <svg
                    width="131"
                    height="32"
                    viewBox="0 0 131 32"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="hidden xl:block cursor-pointer"
            >
                <rect width="131" height="32" rx="16" fill="#D93C23" />
                <path
                        d="M33.5925 11.7H37.8765C38.9219 11.7 39.8505 11.9053 40.6625 12.316C41.4745 12.7173 42.1045 13.2913 42.5525 14.038C43.0005 14.7753 43.2245 15.6293 43.2245 16.6C43.2245 17.5707 43.0005 18.4293 42.5525 19.176C42.1045 19.9133 41.4745 20.4873 40.6625 20.898C39.8505 21.2993 38.9219 21.5 37.8765 21.5H33.5925V11.7ZM37.7925 19.96C38.5112 19.96 39.1412 19.8247 39.6825 19.554C40.2332 19.274 40.6532 18.882 40.9425 18.378C41.2412 17.8647 41.3905 17.272 41.3905 16.6C41.3905 15.928 41.2412 15.34 40.9425 14.836C40.6532 14.3227 40.2332 13.9307 39.6825 13.66C39.1412 13.38 38.5112 13.24 37.7925 13.24H35.4125V19.96H37.7925ZM32.2065 15.844H38.0305V17.188H32.2065V15.844ZM48.0186 13.94C49.12 13.94 49.96 14.206 50.5386 14.738C51.1266 15.2607 51.4206 16.054 51.4206 17.118V21.5H49.7686V20.59C49.554 20.9167 49.246 21.1687 48.8446 21.346C48.4526 21.514 47.9766 21.598 47.4166 21.598C46.8566 21.598 46.3666 21.5047 45.9466 21.318C45.5266 21.122 45.2 20.856 44.9666 20.52C44.7426 20.1747 44.6306 19.7873 44.6306 19.358C44.6306 18.686 44.878 18.1493 45.3726 17.748C45.8766 17.3373 46.6653 17.132 47.7386 17.132H49.6706V17.02C49.6706 16.4973 49.512 16.096 49.1946 15.816C48.8866 15.536 48.4246 15.396 47.8086 15.396C47.3886 15.396 46.9733 15.4613 46.5626 15.592C46.1613 15.7227 45.8206 15.9047 45.5406 16.138L44.8546 14.864C45.2466 14.5653 45.718 14.3367 46.2686 14.178C46.8193 14.0193 47.4026 13.94 48.0186 13.94ZM47.7806 20.324C48.2193 20.324 48.6066 20.226 48.9426 20.03C49.288 19.8247 49.5306 19.5353 49.6706 19.162V18.294H47.8646C46.8566 18.294 46.3526 18.6253 46.3526 19.288C46.3526 19.6053 46.4786 19.8573 46.7306 20.044C46.9826 20.2307 47.3326 20.324 47.7806 20.324ZM48.1726 13.1C47.4913 13.1 46.922 12.918 46.4646 12.554C46.0166 12.19 45.7786 11.7 45.7506 11.084H46.8986C46.908 11.4013 47.034 11.658 47.2766 11.854C47.5193 12.0407 47.818 12.134 48.1726 12.134C48.5273 12.134 48.826 12.0407 49.0686 11.854C49.3113 11.658 49.4373 11.4013 49.4466 11.084H50.5946C50.5666 11.7 50.324 12.19 49.8666 12.554C49.4186 12.918 48.854 13.1 48.1726 13.1ZM58.0836 13.94C59.0262 13.94 59.7822 14.2153 60.3516 14.766C60.9209 15.3167 61.2056 16.1333 61.2056 17.216V21.5H59.4556V17.44C59.4556 16.7867 59.3016 16.2967 58.9936 15.97C58.6856 15.634 58.2469 15.466 57.6776 15.466C57.0336 15.466 56.5249 15.662 56.1516 16.054C55.7782 16.4367 55.5916 16.992 55.5916 17.72V21.5H53.8416V14.024H55.5076V14.99C55.7969 14.6447 56.1609 14.3833 56.5996 14.206C57.0382 14.0287 57.5329 13.94 58.0836 13.94ZM71.0889 14.024V20.366C71.0889 22.998 69.7449 24.314 67.0569 24.314C66.3382 24.314 65.6569 24.2207 65.0129 24.034C64.3689 23.8567 63.8369 23.5953 63.4169 23.25L64.2009 21.934C64.5276 22.2047 64.9382 22.4193 65.4329 22.578C65.9369 22.746 66.4456 22.83 66.9589 22.83C67.7802 22.83 68.3822 22.6433 68.7649 22.27C69.1476 21.8967 69.3389 21.3273 69.3389 20.562V20.17C69.0402 20.4967 68.6762 20.744 68.2469 20.912C67.8176 21.08 67.3462 21.164 66.8329 21.164C66.1236 21.164 65.4796 21.0147 64.9009 20.716C64.3316 20.408 63.8789 19.9787 63.5429 19.428C63.2162 18.8773 63.0529 18.2473 63.0529 17.538C63.0529 16.8287 63.2162 16.2033 63.5429 15.662C63.8789 15.1113 64.3316 14.6867 64.9009 14.388C65.4796 14.0893 66.1236 13.94 66.8329 13.94C67.3742 13.94 67.8642 14.0287 68.3029 14.206C68.7509 14.3833 69.1242 14.654 69.4229 15.018V14.024H71.0889ZM67.0989 19.68C67.7616 19.68 68.3029 19.484 68.7229 19.092C69.1522 18.6907 69.3669 18.1727 69.3669 17.538C69.3669 16.9127 69.1522 16.404 68.7229 16.012C68.3029 15.62 67.7616 15.424 67.0989 15.424C66.4269 15.424 65.8762 15.62 65.4469 16.012C65.0269 16.404 64.8169 16.9127 64.8169 17.538C64.8169 18.1727 65.0269 18.6907 65.4469 19.092C65.8762 19.484 66.4269 19.68 67.0989 19.68ZM81.7527 13.94C82.4807 13.94 83.1294 14.0987 83.6987 14.416C84.2774 14.7333 84.7301 15.1813 85.0567 15.76C85.3834 16.3387 85.5467 17.006 85.5467 17.762C85.5467 18.518 85.3834 19.19 85.0567 19.778C84.7301 20.3567 84.2774 20.8047 83.6987 21.122C83.1294 21.4393 82.4807 21.598 81.7527 21.598C81.2394 21.598 80.7681 21.5093 80.3387 21.332C79.9187 21.1547 79.5641 20.8887 79.2747 20.534V21.5H77.6087V11.112H79.3587V14.934C79.6574 14.6073 80.0074 14.36 80.4087 14.192C80.8194 14.024 81.2674 13.94 81.7527 13.94ZM81.5567 20.1C82.2007 20.1 82.7281 19.8853 83.1387 19.456C83.5587 19.0267 83.7687 18.462 83.7687 17.762C83.7687 17.062 83.5587 16.4973 83.1387 16.068C82.7281 15.6387 82.2007 15.424 81.5567 15.424C81.1367 15.424 80.7587 15.522 80.4227 15.718C80.0867 15.9047 79.8207 16.1753 79.6247 16.53C79.4287 16.8847 79.3307 17.2953 79.3307 17.762C79.3307 18.2287 79.4287 18.6393 79.6247 18.994C79.8207 19.3487 80.0867 19.624 80.4227 19.82C80.7587 20.0067 81.1367 20.1 81.5567 20.1ZM90.1417 13.94C91.243 13.94 92.083 14.206 92.6617 14.738C93.2497 15.2607 93.5437 16.054 93.5437 17.118V21.5H91.8917V20.59C91.677 20.9167 91.369 21.1687 90.9677 21.346C90.5757 21.514 90.0997 21.598 89.5397 21.598C88.9797 21.598 88.4897 21.5047 88.0697 21.318C87.6497 21.122 87.323 20.856 87.0897 20.52C86.8657 20.1747 86.7537 19.7873 86.7537 19.358C86.7537 18.686 87.001 18.1493 87.4957 17.748C87.9997 17.3373 88.7884 17.132 89.8617 17.132H91.7937V17.02C91.7937 16.4973 91.635 16.096 91.3177 15.816C91.0097 15.536 90.5477 15.396 89.9317 15.396C89.5117 15.396 89.0964 15.4613 88.6857 15.592C88.2844 15.7227 87.9437 15.9047 87.6637 16.138L86.9777 14.864C87.3697 14.5653 87.841 14.3367 88.3917 14.178C88.9424 14.0193 89.5257 13.94 90.1417 13.94ZM89.9037 20.324C90.3424 20.324 90.7297 20.226 91.0657 20.03C91.411 19.8247 91.6537 19.5353 91.7937 19.162V18.294H89.9877C88.9797 18.294 88.4757 18.6253 88.4757 19.288C88.4757 19.6053 88.6017 19.8573 88.8537 20.044C89.1057 20.2307 89.4557 20.324 89.9037 20.324ZM87.5237 11.084H89.5817L91.4717 13.002H89.9597L87.5237 11.084ZM95.9646 14.024H97.7146V21.5H95.9646V14.024ZM96.8466 12.792C96.5293 12.792 96.2633 12.694 96.0486 12.498C95.8339 12.2927 95.7266 12.0407 95.7266 11.742C95.7266 11.4433 95.8339 11.196 96.0486 11C96.2633 10.7947 96.5293 10.692 96.8466 10.692C97.1639 10.692 97.4299 10.79 97.6446 10.986C97.8593 11.1727 97.9666 11.4107 97.9666 11.7C97.9666 12.008 97.8593 12.2693 97.6446 12.484C97.4393 12.6893 97.1733 12.792 96.8466 12.792Z"
                        fill="white"
                />
            </svg>

            @php
                $user = Auth::user();
            @endphp

            <div class="relative hidden lg:flex items-center gap-3" x-data="{ open: false }">
                <!-- Thông tin user -->
                <div class="flex flex-col items-end">
                    <span class="text-[#272727] font-semibold text-sm"> {{ $user->name }} </span>
                    <p class="text-[#272727] font-normal text-sm">{{ ucfirst($user->role) }}</p>
                </div>

                <!-- Icon user -->
                <button @click="open = !open" class="focus:outline-none">
                    <x-user-icon class="w-8 h-8 text-[#007882]" />
                </button>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute right-0 top-12 w-56 bg-white shadow-xl rounded-lg border border-gray-200 z-50"
                >
                    <!-- Header -->
                    <div class="px-4 py-3 border-b text-sm text-gray-800 font-semibold">
                        👋 Xin chào, {{ $user->name }}
                    </div>

                    <!-- Menu -->
                    <div class="py-2">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all duration-150">
                            📄 Thông tin tài khoản
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-150">
                                🚪 Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div id="mobile-menu" class="fixed inset-0 bg-white z-50 xl:hidden hidden">
        <!-- Nút đóng -->
        <div class="mt-5 p-3 flex items-center space-x-2">
            <button onclick="toggleMenu()" class="text-gray-800 text-4xl font-bold">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                    <rect x="1.74707" y="19.5459" width="25" height="4" rx="2"
                          transform="rotate(-45 1.74707 19.5459)" fill="#3B4144" />
                    <rect x="4.5752" y="1.62598" width="25" height="4" rx="2"
                          transform="rotate(45 4.5752 1.62598)" fill="#3B4144" />
                </svg>
            </button>
            <h1 class="text-primary-black font-header-custom font-semibold text-xl cursor-pointer">
                ReviewNhà
            </h1>
        </div>

        <!-- Menu -->
        <ul class="flex flex-col space-y-10 md:space-y-15 text-2xl font-bold text-gray-500 p-3 mt-10 md:text-5xl">
            <li onclick="toggleMenu()"
                class="relative cursor-pointer hover:text-red-500 after:content-[''] after:absolute after:top-1/2 after:right-3 after:ml-2 after:w-25 md:after:w-[50%] after:h-[5px] after:bg-gray-800 after:translate-y-[-50%]">
                Mua nhà
            </li>
            <li onclick="toggleMenu()"
                class="relative cursor-pointer hover:text-red-500 after:content-[''] after:absolute after:top-1/2 after:right-3 after:ml-2 after:w-25 md:after:w-[50%] after:h-[5px] after:bg-gray-800 after:translate-y-[-50%]">
                Thuê nhà
            </li>
            <li onclick="toggleMenu()"
                class="group relative cursor-pointer text-red-500 hover:text-red-500 after:absolute after:top-1/2 after:right-3 md:after:w-[50%] after:ml-2 after:w-25 after:h-[5px] after:bg-gray-800 after:translate-y-[-50%] group-hover:after:bg-red-500 after:bg-red-500">
                Khám phá
            </li>
            <li onclick="toggleMenu()"
                class="relative cursor-pointer hover:text-red-500 after:content-[''] after:absolute after:top-1/2 after:right-3 after:ml-2 after:w-25 md:after:w-[50%] after:h-[5px] after:bg-gray-800 after:translate-y-[-50%]">
                Blog
            </li>
        </ul>

        <!-- Buttons -->
        <div class="flex flex-col items-center mt-40 space-y-4 md:mt-80">
            <button class="md:text-lg md:w-[80%] md:p-4 w-80 px-6 py-2 rounded-full font-semibold text-white bg-[#D93C23] border-2 border-[#D93C23] hover:bg-white hover:text-[#D93C23] hover:shadow-lg transition-all duration-300 cursor-pointer">
                Đăng bài
            </button>

            <div class="flex gap-4 w-[80%] md:text-lg">
                <button class="md:w-[100%] md:p-4 w-38 px-4 py-2 rounded-full font-semibold text-[#3B4144] bg-white border-2 border-[#3B4144] hover:bg-[#3B4144] hover:text-white hover:shadow-lg transition-all duration-300 cursor-pointer">
                    Đăng nhập
                </button>
                <button class="md:p-4 md:w-[100%] w-38 px-4 py-2 rounded-full font-semibold text-white bg-[#3B4144] border-2 border-[#3B4144] hover:bg-white hover:text-[#3B4144] hover:shadow-lg transition-all duration-300 cursor-pointer">
                    Đăng ký
                </button>
            </div>
        </div>
    </div>

    </header>
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const isOpen = !menu.classList.contains('hidden');

        if (isOpen) {
            menu.classList.add('hidden');
            document.body.style.overflow = 'auto';
        } else {
            menu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
</script>



