@foreach ($posts as $post)
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative "
        style="flex-basis: calc(100%/2 - 15px)">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Category Name</strong>
            <h3 class="mb-0">{{ $post->title }}</h3>
            <div class="mb-1 text-muted">{{ $post->created_at->format('M d') }}</div>
            <p class="card-text mb-auto">{{ \Str::words($post->content, 16, '...') }}</p>
            <a href="{{ route('post.show', $post->id) }}" class="stretched-link">Continue reading</a>
        </div>
        {{-- <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                    dy=".3em">Thumbnail</text>
            </svg>
        </div> --}}
    </div>
@endforeach
