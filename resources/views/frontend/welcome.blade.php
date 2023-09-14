@extends('frontend.layouts.master')
@section('content')
@include('frontend.sliders')


<svg id="clouds" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 85 100" preserveAspectRatio="none">
      <path d="M-5 100 Q 0 20 5 100 Z
          M0 100 Q 5 0 10 100
          M5 100 Q 10 30 15 100
          M10 100 Q 15 10 20 100
          M15 100 Q 20 30 25 100
          M20 100 Q 25 -10 30 100
          M25 100 Q 30 10 35 100
          M30 100 Q 35 30 40 100
          M35 100 Q 40 10 45 100
          M40 100 Q 45 50 50 100
          M45 100 Q 50 20 55 100
          M50 100 Q 55 40 60 100
          M55 100 Q 60 60 65 100
          M60 100 Q 65 50 70 100
          M65 100 Q 70 20 75 100
          M70 100 Q 75 45 80 100
          M75 100 Q 80 30 85 100
          M80 100 Q 85 20 90 100
          M85 100 Q 90 50 95 100
          M90 100 Q 95 25 100 100
          M95 100 Q 100 15 105 100 Z">
      </path>
  </svg>

  <div id="about" class="section wb">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="message-box">                        
                      <h2>About {{ $data['profile']->name }}.</h2>
                      <p>{{ $data['profile']->description }}</p>
                      <a href="#" class="sim-btn btn-hover-new" data-text="Download CV"><span>Download CV</span></a>
                  </div><!-- end messagebox -->
              </div><!-- end col -->

              <div class="col-md-6">
                  <div class="right-box-pro wow fadeIn">
                      <img src="{{ asset('backend/img/profiles/'.$data['profile']->image) }}" alt="" class="img-fluid img-rounded">
                  </div><!-- end media -->
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end section -->

  <div id="services" class="section lb">
      <div class="container">
          <div class="section-title text-left">
              <h3>Services</h3>
              <p>Services i provide & you might be love it.</p>
          </div><!-- end title -->

          <div class="row">
            @foreach($data['categories'] as $key => $value)
            <div class="col-md-4">
              <div class="services-inner-box">
              <div class="ser-icon">  
                <i class="{{ $value->icon }}"></i>
              </div>
              <h2>{{ $value->title }}</h2>
              <p>{!! $value->description !!}</p>
              </div>
            </div>
            @endforeach
          
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end section -->

<div id="portfolio" class="section lb">
  <div class="container">
    <div class="section-title text-left">
              <h3>Portfolio</h3>
              <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
          </div><!-- end title -->
    
    <div class="gallery-menu row">
      <div class="col-md-12">
        <div class="button-group filter-button-group text-left">
          <button class="active" data-filter="*">All</button>
          <button data-filter=".gal_a">Web Development</button>
          <button data-filter=".gal_b">Creative Design</button>
          <button data-filter=".gal_c">Graphic Design</button>
        </div>
      </div>
    </div>
    
    <div class="gallery-list row">
      <div class="col-md-4 col-sm-6 gallery-grid gal_a gal_b">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-01.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 gallery-grid gal_c gal_b">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-02.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-02.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 gallery-grid gal_a gal_c">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-03.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-03.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 gallery-grid gal_b gal_a">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-04.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-04.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 gallery-grid gal_a gal_c">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-05.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-05.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 gallery-grid gal_c gal_a">
        <div class="gallery-single fix">
          <img src="frontend/uploads/gallery_img-06.jpg" class="img-fluid" alt="Image">
          <div class="img-overlay">
            <a href="frontend/uploads/gallery_img-06.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

 <div id="testimonials" class="section wb">
      <div class="container">
          <div class="section-title text-left">
              <h3>Testimonials</h3>
              <p>We thanks for all our awesome testimonials! There are hundreds of our happy customers! </p>
          </div><!-- end title -->

          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="testi-carousel owl-carousel owl-theme">
                    @foreach($data['testimonials'] as $value)
                    <div class="testimonial clearfix">
                      <div class="desc">
                          <h3><i class="fa fa-quote-left"></i> {{ $value->title }}</h3>
                          <p class="lead">{{ $value->message }}</p>
                      </div>
                      <div class="testi-meta">
                          <img src="backend/img/testimonials/{{ $value->image }}" alt="" class="img-fluid alignleft">
                          <h4>{{ $value->name }} <small>- {{ $value->designation }}</small></h4>
                      </div>
                      <!-- end testi-meta -->
                  </div>
                    @endforeach
                      
                     
                      <!-- end testimonial -->
                  </div><!-- end carousel -->
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end section -->

<div id="blog" class="section lb">
  <div class="container">
    <div class="section-title text-left">
              <h3>Blog</h3>
              <p>Latest Blogs.</p>
          </div><!-- end title -->
    
    <div class="row">
      @foreach ($data['blogs'] as $blog)
<div class="col-md-4 col-sm-6 col-lg-4">
    <div class="post-box">
        <div class="post-thumb">
            <img src="backend/img/blogs/{{ $blog->image }}" class="img-fluid" alt="post-img" />
            <div class="date">
                <span>{{ $blog->created_at->format('d M') }}</span>
            </div>
        </div>
        <div class="post-info">
            <h4>{{ $blog->title }}</h4>
            <ul>
                <li>by admin</li>
                <li>-{{ $blog->created_at->format('D M Y') }}</li>
                <li><a href="#"><b> Comments</b></a></li>
            </ul>
            <p class="description">{{ Str::limit($blog->short_description, 100) }}</p>
            <p class="full-description" style="display: none;">{{ $blog->short_description }}</p>
            @if (strlen($blog->short_description) > 200)
            <a href="#" class="view-more">View More</a>
            @endif
        </div>
    </div>
</div>
@endforeach
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.view-more').click(function(e) {
        e.preventDefault();
        var postInfo = $(this).closest('.post-info');
        var description = postInfo.find('.description');
        var fullDescription = postInfo.find('.full-description');

        description.text(fullDescription.text());
        $(this).remove(); // Remove the "View More" link after clicking
    });
});
</script>

      
      
    </div>
    
  </div>
</div>

  <div id="contact" class="section db">
      <div class="container">
          <div class="section-title text-left">
              <h3>Contact</h3>
              <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
          </div><!-- end title -->

          <div class="row">
              <div class="col-md-12">
                  <div class="contact_form">
                      <div id="message"></div>
                      <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="sim-btn btn-hover-new" data-text="Send Message" type="submit">Send Message</button>
              </div>
            </div>
          </form>
                  </div>
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end section -->
@endsection