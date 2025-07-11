@extends('layouts.frontend') {{-- Kế thừa layout --}}

@section('content')
    <div class="mx-auto mt-20">
        <section class="mx-auto">
            <x-home.banner />
        </section>

        {{--navbar--}}
        <section>
            <div class="flex overflow-x-auto w-[90%] mx-auto my-6 font-custom xl:w-[1024px]">
                @foreach ($categories as $index => $category)
                    <div
                        class="{{ $index == 0 ? 'text-white bg-[#007882] border-[#007882]' : 'hover:bg-[#007882] hover:text-white hover:border hover:border-[#007882]' }} text-sm/[21px] font-semibold shrink-0 px-9 py-2 border lg:text-lg rounded-full cursor-pointer mr-2"
                    >
                        {{ $category->name }}
                    </div>
                @endforeach
            </div>
        </section>

        {{--list post--}}
        <x-home.list-post :news="$news" />

        {{-- Video       --}}
        <x-home.video/>


    </div>
@endsection





