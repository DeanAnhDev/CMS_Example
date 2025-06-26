@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách danh mục</h1>
            <a href="{{ route('categories.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Thêm danh mục
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full text-left text-sm border border-gray-200">
                <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-2 border-r">#</th>
                    <th class="px-4 py-2 border-r">Tên</th>
                    <th class="px-4 py-2 border-r">Slug</th>
                    <th class="px-4 py-2">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 border-r">{{ $cat->id }}</td>
                        <td class="px-4 py-2 border-r">{{ $cat->name }}</td>
                        <td class="px-4 py-2 border-r">{{ $cat->slug }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('categories.edit', $cat) }}"
                               class="text-blue-600 hover:underline">Sửa</a>
                            <form action="{{ route('categories.destroy', $cat) }}" method="POST"
                                  onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
