<div class="btn-group d-flex align-items-center justify-content-center my-4">
    <a href="{{ route('posts.index') }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'posts.index'? 'active': '' }}">All
        Posts</a>
    <a href="{{ route('create.post') }}"
        class="btn btn-outline-primary flex-grow-0 {{ request()->route()->getName() == 'create.post'? 'active': '' }}">Create
        Post</a>
</div>
