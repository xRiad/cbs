@foreach($projects as $project)
    <a class="portfolio-card" href="{{ route('portfolio.detail', $project->slug) }}">
      <div class="portfolio-image">
          <img src="{{ asset('storage/'.$project->image) }}" alt="">
      </div>
      <div class="portfolio-card-category">{{ $project->category?->name }}</div>
      <div class="portfolio-title">{{ $project->name }}</div>
    </a>
@endforeach
