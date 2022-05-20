<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your
            publication,
            writers, content, or something else entirely. Totally up to you.</p>
    </div>

    <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($archives as $stats)
                <li>
                    <span>{{ '(' . $stats['published'] . ')' }}</span>
                    <a
                        href="?month={{ $stats['month'] }}&year={{ $stats['year'] }}">{{ $stats['month'] . ' ' . $stats['year'] }}</a>
                </li>
            @endforeach
        </ol>
    </div>
</div>
