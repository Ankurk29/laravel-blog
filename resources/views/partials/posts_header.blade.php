<div class="btn-group d-flex align-items-center justify-content-center my-4">
    <a href="{{ route('posts.index', auth()->id()) }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'posts.index'? 'active': '' }}">All
        Posts</a>
    <a href="{{ route('create.post') }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'create.post'? 'active': '' }}">Create
        Post</a>
    <a href="{{ route('category') }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'category'? 'active': '' }}">All
        Category</a>
    <a href="{{ route('category.create') }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'category.create'? 'active': '' }}">Create
        Category</a>
</div>
