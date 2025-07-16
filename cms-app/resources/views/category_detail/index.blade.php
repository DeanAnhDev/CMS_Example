<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Category Details</h2>
            <a href="{{ route('category_detail.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                + Add New
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($categoryDetails as $detail)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $detail->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $detail->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $detail->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $detail->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <a href="{{ route('category_detail.edit', $detail->id) }}"
                               class="inline-flex items-center px-3 py-1 text-sm text-yellow-600 hover:underline">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('category_detail.destroy', $detail->id) }}" method="POST"
                                  class="inline-block ml-2"
                                  onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categoryDetails->links() }}
        </div>
    </div>
</x-app-layout>
