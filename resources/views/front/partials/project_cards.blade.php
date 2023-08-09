@foreach($projects as $project)
    <a href="{{ route('portfolio.detail', $project->slug) }}">
        <div class="portfolio-card">
            <div class="portfolio-image">
                <img src="{{ asset('assets/'.$project->image) }}" alt="">
            </div>
            <div class="portfolio-card-category">{{ $project->category->name }}</div>
            <div class="portfolio-title">{{ $project->name }}</div>
        </div>
    </a>
@endforeach
