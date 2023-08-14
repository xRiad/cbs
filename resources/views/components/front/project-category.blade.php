<ul class="portfolio-categories">
    <li class="portfolio-category secondary-color-hover" data-id="all">HAMISI</li>
    @foreach($projectCategories as $projectCategory)
      <li class="portfolio-category secondary-color-hover" data-id="{{ $projectCategory->id }}">{{ $projectCategory->name }}</li>
    @endforeach
</ul>