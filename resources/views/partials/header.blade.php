<div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a data-bs-toggle="modal" data-bs-target="#searchModal" class="link-secondary" href="#"
                    aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                        viewBox="0 0 24 24">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
                @if (Auth::check())
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a href="{{ route('posts.index', Auth::user()->id) }}" class="dropdown-item">
                                        Posts
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('update.form') }}">
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="d-flex gap-2">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">
                            Log in
                        </a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">
                            Sign up
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach ($all_categories as $category)
                <a class="p-2 link-secondary"
                    href="{{ route('category.index', $category->name) }}">{{ ucwords(str_replace('-', ' ', $category->name)) }}</a>
            @endforeach
        </nav>
    </div>
</div>
