@extends('layouts.frontend') {{-- Kế thừa layout --}}

@section('content')
    <div class="mx-auto mt-20 pt-5">
        <section class="mx-auto">
            <x-home.banner />
        </section>
        {{-- Navbar --}}
        <section>
            <div class="flex overflow-x-auto w-[90%] mx-auto my-6 font-custom xl:w-[1024px]">

                {{-- "Tất cả" --}}
                <a
                    href="{{ route('client.home') }}"
                    class="{{ request()->routeIs('client.home') ? 'text-white bg-[#007882] border-[#007882]' : 'hover:bg-[#007882] hover:text-white hover:border hover:border-[#007882]' }}
                   text-sm/[21px] font-semibold shrink-0 px-9 py-2 border lg:text-lg rounded-full cursor-pointer mr-2"
                >
                    Tất cả
                </a>

                {{-- Các danh mục --}}
                @foreach ($categories as $category)
                    <a
                        href="{{ route('client.category.show', $category->slug) }}"
                        class="{{ request()->routeIs('client.category.show') && request()->slug == $category->slug ? 'text-white bg-[#007882] border-[#007882]' : 'hover:bg-[#007882] hover:text-white hover:border hover:border-[#007882]' }}
                       text-sm/[21px] font-semibold shrink-0 px-9 py-2 border lg:text-lg rounded-full cursor-pointer mr-2"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach

            </div>
        </section>


        {{--list post--}}
        <x-home.list-post :news="$news" />

        {{-- Video       --}}
        <x-home.video/>

        {{-- Trang home hoặc danh sách --}}
        <x-home.post :articles="$articles" />


    </div>
@endsection





