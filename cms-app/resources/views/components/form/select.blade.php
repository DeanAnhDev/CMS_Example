@props(['name', 'label', 'options' => [], 'selected' => null])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500']) }}>
        <option value="">-- Chọn --</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @selected($selected == $value)>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
