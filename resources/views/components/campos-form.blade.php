@props(["label", "name", "type" => "text"])

<div class="relative">
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="peer w-full border border-gray-300 rounded-md px-3 pt-4 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none" placeholder=" " required>
    <label for="{{ $name }}" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
        {{ $label }}
    <label>
</div>