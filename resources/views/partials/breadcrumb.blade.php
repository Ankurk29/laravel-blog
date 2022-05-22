<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mb-4 fst-italic border-bottom">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
        @foreach ($categories as $category)
            <li class="breadcrumb-item"><a href="{{ route('category.index', $category->name) }}"
                    class="text-decoration-none">{{ ucwords(str_replace('-', ' ', $category->name)) }}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
</nav>
