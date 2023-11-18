<x-layout>
    @include ('shoes._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($shoes->count())
            <x-shoes-grid :shoes="$shoes" />

            {{ $shoes->links() }}
        @else
            <p class="text-center">We are out of stock. Please check back later.</p>
        @endif
    </main>
</x-layout>
