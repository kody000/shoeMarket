@props(['shoe'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 flex lg:flex items-center">
        <div class="flex-1 lg:mr-8">
        @if(!$shoe->thumbnail)
            <img src="/images/jordan_1.webp" class="rounded-xl" width=500>
            @else
            <img src="{{ asset('images/' . $shoe->thumbnail) }}" alt="Sneakers illustration" class="rounded-xl">
            @endif  
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl">
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

            <footer class="flex justify-between mt-8">
                    <div>
                        <h5 class="font-bold text-xl text-red-500">
                            <a href="#">${{ $shoe->price }}</a>
                        </h5>
                    </div>

                <div class="mr-40">
                    <a href="/shoes/{{ $shoe->id }}"
                       class="transition-colors duration-300 text-xs text-white font-semibold bg-red-500 hover:bg-red-600 rounded-full py-2 px-8"
                    >See product</a>
                </div>
            </footer>
        </div>
    </div>
</article>
