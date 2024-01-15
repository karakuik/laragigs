<x-layout>
@include('partials._hero')
@include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless (count($listings) > 0)
            <p>No Listings found</p>
        @else
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @endunless
    </div>

    <div class="mt-6 p-4">
{{--        Adds pagination links at the bottom, i.e. < 1 2 3 4 5 >--}}
        {{$listings->links()}}
    </div>
</x-layout>
