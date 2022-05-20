<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">{{ $featured->title }}</h1>
        <p class="lead my-3">{{ \Str::words($featured->content, 22, '...') }}</p>
        <p class="lead mb-0"><a href="{{ route('post.show', $featured->id) }}" class="text-white fw-bold">Continue
                reading...</a></p>
    </div>
</div>
