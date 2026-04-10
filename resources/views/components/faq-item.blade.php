@props([
    'question',
    'answer',
    'openDefault' => 'false',
    'class' => ''
])

<div x-data="{ open: {{ $openDefault }} }"
    class="bg-white px-4 py-3 cursor-pointer shadow-sm border border-[#C9A24A] transition-colors {{ $class }}"
    @click="open = !open">
    <div class="flex justify-between items-center text-sm font-medium">
        <span class="pr-4 text-gray-800 text-xs font-semibold leading-relaxed">
            Q. {{ ltrim(trim($question), 'Q. ') }}
        </span>
        <div class="w-5 h-5 rounded-full bg-[#C9A24A] flex items-center justify-center text-white shrink-0 transition-transform duration-300"
            :class="{'rotate-180': open}">
            <i class="fa-solid fa-chevron-down text-[0.55rem]"></i>
        </div>
    </div>
    <div x-show="open" x-cloak
        class="mt-3 text-xs text-gray-500 border-t border-gray-100 pt-3 leading-relaxed">
        {!! nl2br(e($answer)) !!}
    </div>
</div>
