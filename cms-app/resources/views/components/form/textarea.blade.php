@props(['name', 'label', 'value' => ''])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    <textarea name="{{ $name }}"
              id="{{ $attributes->get('id', $name) }}"
              rows="6"
          {{ $attributes->merge(['class' => 'w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500']) }}>
    {{ $value }}
</textarea>

    @error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
