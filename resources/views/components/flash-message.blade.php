@if(session()->has('message'))
    {{--    Checks for message from ListingController to display, can be something else like 'success' it just has to match--}}
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        {{-- ^ The x data stuff from above comes from alpine that is in layout.php, it allows show, then removes it 3 seconds later by making true, false --}}
        <p class="inline-block">
            {{ session('message') }}
        </p>
    </div>
@endif
