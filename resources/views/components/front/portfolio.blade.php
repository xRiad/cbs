@section('links')
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/portfolio.css') }}">
@endsection
<ul class="portfolio-categories">
    <li class="portfolio-category secondary-color-hover" data-id="all">HAMISI</li>
    @foreach($projectCategories as $projectCategory)
      <li class="portfolio-category secondary-color-hover" data-id="{{ $projectCategory->id }}">{{ $projectCategory->name }}</li>
    @endforeach
</ul>
<div class="portfolio-cards">
  @foreach($projects as  $project)
    <a href="{{ route('portfolio.detail', $project->slug) }}">
      <div class="portfolio-card">
          <div class="portfolio-image">
              <img src="{{ asset('assets/'.$project->image)  }}" alt="">
          </div>
          <div class="portfolio-card-category">{{ $project->category?->name }}</div>
          <div class="portfolio-title">{{ $project->name }}</div>
      </div>
    </a>
  @endforeach
</div>
@if($pagination)
  {{ $projects->links('front.layouts.pagination') }}
@endif

@push('scripts')
  <script>
   let category = $('.portfolio-category');
    let portfolioCards = $('.portfolio-cards');
    
    category.on('click', function () {
        let categoryId = $(this).data("id");
        $.ajax({
            url : "{{ url('portfolio/by-category') }}",
            data : {"categoryId": categoryId},
            type : 'GET',
            dataType : 'json',
            success : function(result) {
                console.log("===== ", result, " =====");
                portfolioCards.html(result.html);
            }
        });
    });
  </script>    
@endpush