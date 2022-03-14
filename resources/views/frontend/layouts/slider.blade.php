  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
      <?php $i = 0; ?>
      @foreach( $sliders as  $slider)

        <!-- Slide 1 -->
        <div class="carousel-item <?php if ($i == 1) { echo"active"; }else{ "";} ?> " style="background-image: url({{(!empty($slider->image))?url('upload/user_images/'.$slider->image):url('upload/no-image.png')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2> {{$slider->title}} </h2>
              <p> {{$slider->description}} </p>
              <div class="text-center"><a href="{{$slider->btn_link}}" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>
          <?php  $i++; ?>
      @endforeach

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section>
  <!-- End Hero -->
