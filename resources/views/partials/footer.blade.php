<footer class="blog-footer">
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>

<!-- Search Modal -->
<div class="modal fade searchModal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Posts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('search.form') }}" method="POST">
                    @csrf
                    <input class="form-control mb-2" type="text" aria-label="default input example" name="search"
                        required>
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Subscribe Modal -->
<div class="modal fade subscribeModal" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscribeModalLabel">Subscribe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subscribe.form') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="subscribeName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="subscribeName" id="subscribeName">
                    </div>
                    <div class="mb-3">
                        <label for="subscribeEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="subscribeEmail" id="subscribeEmail" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
