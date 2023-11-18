<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            @if(!$shoe->thumbnail)
            <img src="/images/jordan_1.webp" class="rounded-xl" width=500>
            @else
            <img src="{{ asset('images/' . $shoe->thumbnail) }}" alt="Sneakers illustration" class="rounded-xl">
            @endif   

                <p class="mt-4 block text-gray-400 text-xs">
                    Placed
                    <time>{{ $shoe->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center mt-4">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold text-red-500 text-4xl">
                            ${{ $shoe->price }}
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-red-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to shoes
                    </a>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $shoe->name }}
                </h1>

                <div class="text-2xl mt-20 text-red-500 font-bold">Color</div>

                <div class="text-2xl space-y-4">
                    {{ $shoe->color }}
                </div>

                <div class="text-2xl mt-10 text-red-500 font-bold">Size</div>

                <div class="text-2xl space-y-4">
                    {{ $shoe->size }}
                </div>

                <div class="mt-20 flex justify-center mx-40">
                    <a href="/shoes/{{ $shoe->id }}/addToCart"
                       class="transition-colors duration-300 text-xs item-center text-white font-semibold bg-red-500 hover:bg-red-600 rounded-full py-2 px-8"
                    >Add to cart</a>
                </div>
            </div>
        </article>
    </main>
</x-layout>
