<h1>
    {{ $heading }}
</h1>


@unless (count($listings) == 0)
@foreach ($listings as $listing)
    <h2>
        <a href="/listing/{{$listing['id']}}" >{{ $listing['title'] }}</a>
    </h2>
    <p> {{ $listing['description'] }} </p>
@endforeach
<p> No Listings found either, same as if above, written differently</p>
@endunless
