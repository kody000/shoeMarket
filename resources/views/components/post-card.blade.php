@props(['shoe'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col items-center">
        <div>
            @if(!$shoe->thumbnail)
            <img src="/images/jordan_1.webp" class="rounded-xl" width=500>
            @else
            <img src="{{ asset('images/' . $shoe->thumbnail) }}" alt="Sneakers illustration" class="rounded-xl">
            @endif
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1 min-w-full">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/shoes/{{ $shoe->id }}">
                            {{ $shoe->name }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Placed <time>{{ $shoe->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-md mt-4 text-red-500 font-bold">Color</div>

            <div class="text-sm space-y-4">
                {{ $shoe->color }}
            </div>

            
            <div class="text-md mt-4 text-red-500 font-bold">Size</div>

            <div class="text-sm space-y-4">
                {{ $shoe->size }}
            </div>

            <footer class="flex justify-between mt-8">
                    <div>
                        <h5 class="font-bold text-xl text-red-500">
                            <a href="#">${{ $shoe->price }}</a>
                        </h5>
                    </div>

                <div>
                    <a href="/shoes/{{ $shoe->id }}"
                       class="transition-colors duration-300 text-xs text-white font-semibold bg-red-500 hover:bg-red-600 rounded-full py-2 px-8"
                    >See product</a>
                </div>
            </footer>
        </div>
    </div>
</article>
