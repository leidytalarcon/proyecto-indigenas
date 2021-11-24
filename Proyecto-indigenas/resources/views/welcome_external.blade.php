@extends('layout_external')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>COMUNIDADES INDIGENAS</h1>
          <h2>Los pueblos indígenas son, posiblemente, uno de los grupos de personas más desfavorecidos y vulnerables en el mundo hoy en día </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="https://www.youtube.com/watch?v=6VbdqX5dJLU&ab_channel=PresidenciadelaRep%C3%BAblica-Colombia" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Ver Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset("assets/img/mapa4.png") }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->