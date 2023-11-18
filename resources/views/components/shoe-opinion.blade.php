@props(['opinion'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $opinion->user_id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $opinion->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $opinion->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $opinion->body }}
            </p>
        </div>
    </article>
</x-panel>
