<footer class="blog-footer">
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Posts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('search.form') }}" method="POST">
                    @csrf
                    <input class="form-control mb-2" type="text" aria-label="default input example" name="search">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>
