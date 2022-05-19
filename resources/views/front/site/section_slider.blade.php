<section class="hero hero-home">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" tabindex="-1">
    <ol class="carousel-indicators">  
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <?php $class = 'active'; ?>
      @foreach($slider as $slid)
          <div class="item {{$class}}">
              <img src="{{ asset($slid->image) }}" alt="slid">
          </div>
      <?php $class = ''; ?>
      @endforeach
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

