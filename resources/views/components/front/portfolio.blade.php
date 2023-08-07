@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/portfolio.css') }}">
@endsection
<ul class="portfolio-categories">
    <li class="portfolio-category secondary-color-hover">HAMISI</li>
    @foreach($projectCategories as $projectCategory)
      <li class="portfolio-category secondary-color-hover">{{ $projectCategory->name }}</li>
    @endforeach
</ul>
<div class="portfolio-cards">
  @foreach($projects as  $project)
    <div class="portfolio-card">
        <div class="portfolio-image">
            <img src="{{ asset('assets/'.$project->image)  }}" alt="">
        </div>
        <div class="portfolio-card-category">{{ $project->category->name }}</div>
        <div class="portfolio-title">{{ $project->name }}</div>
    </div>
  @endforeach
</div>
@if($pagination)
  {{ $projects->links('front.layouts.pagination') }}
@endif