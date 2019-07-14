 @extends('layouts.frontend')
@section('content')

  <!-- mobile logo end -->

  <!-- Banner Part Start -->
  <section id="banner">
      <i class="fa fa-chevron-left prv-arrow"></i>
      <i class="fa fa-chevron-right nxt-arrow"></i>
      <div class="banner-slider">
        @foreach ($banners as $banner)
        <div class="banner-img" style="background: url({{ asset($banner->banner_image)}}) no-repeat center; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="banner-content">
                            <h1>{{ $banner->heading}}</h1>
                            <h2> {{ $banner->sub_heading}}  </h2>
                            <p> {{ $banner->details}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

</div>
  </section>
  <!-- Banner Part End -->

  <!-- Service Part Start -->
  <section id="service">
      <div class="container">
          <div class="row">
              <div class="service-main">
                  <div class="col-md-4">
                      <div class="service-item text-center">
                          <h3><i class="fa fa-truck rotat"></i> Free Shipping</h3>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                  </div>
                  <div class="col-md-4 service-mid">
                      <div class="service-item text-center">
                          <h3><i class="fa fa-support"></i> 24/7 Support</h3>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="service-item text-center">
                          <h3><i class="fa fa-money"></i> Cashback</h3>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Service Part End -->

  <!-- Newest Part Start -->
  <section id="newest">
      <div class="container">
          <div class="row">
              <div class="newest-main">
                  <div class="col-md-4 col-sm-4">
                      <div class="newest-item">
                          <img src="{{asset('frontend_assets/images/newest3.jpg')}}" alt="newest1" class="img-responsive">
                          <div class="overlay1 text-center">
                              <h2>new</h2>
                              <h3>jeans shirt</h3>
                              <a href="#">shop now</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <div class="newest-item">
                          <img src="{{asset('frontend_assets/images/newest3.jpg')}}" alt="newest1" class="img-responsive">
                          <div class="overlay1 text-center">
                              <h2>2017</h2>
                              <h3>women's glass</h3>
                              <a href="#">shop now</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <div class="newest-item">
                          <img src="{{asset('frontend_assets/images/newest3.jpg')}}" alt="newest1" class="img-responsive">
                          <div class="overlay1 text-center">
                              <h2>best</h2>
                              <h3>mens Shirt</h3>
                              <a href="#">shop now</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Newest Part End -->
 

  <!-- Latest Part Start -->
  <section id="latest">
      <i class="fa fa-chevron-left prv-arrow2"></i>
      <i class="fa fa-chevron-right nxt-arrow2"></i>
      <div class="container">
          <div class="row">
              <div class="latest-main">
                  <div class="heading2 text-center">
                      <h2>latest Products</h2>
                  </div>
                  <div class="latest-item">
                    @foreach ($products as $products)
                      <div class="gallery_product col-md-3">
                          <div class="featured-product">
                              <a href="product-details.html"><img  src="{{ asset($products->product_image)}}"></a>
                              <div class="overlay2 text-center">
                                  <a href="{{url('add/cart')}}/{{$products->id}}"><i class="fa fa-random"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>{{ $products->product_name }}</p><span>{{ $products->product_price }}</span>
                              <div class="clearfix"></div>
                          </div>
                          <div class="ratings">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-half"></i>
                          </div>
                      </div>

                    @endforeach





                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Latest Part End -->

  <!-- Testimonial Part Start -->
  <section id="testimonial">
      <div class="heading3 text-center">
          <h2>testimonial</h2>
      </div>
      <div class="testimonial-bg">
          <i class="fa fa-chevron-left prv-arrow3"></i>
          <i class="fa fa-chevron-right nxt-arrow3"></i>
          <div class="container">
              <div class="row">
                  <div class="testimonial-main">
                      <div class="col-md-6">
                          <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="images/testimonial1.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Shahin Alom</h2>
                                  <h3>Sketch Artist</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Shahin Alom</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="images/testimonial2.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Mahadi Tahsan</h2>
                                  <h3>Software Developer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>mahadi tahsan</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="images/testimonial1.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Shohan Hossain</h2>
                                  <h3>Software Developer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Shohan Hossain</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="images/testimonial2.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Sujon Saha</h2>
                                  <h3>Graphic Designer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Aminul Islam</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Testimonial Part End -->

  <!-- Footer Part Start -->
  <section id="footer">
      <div class="footer-bg">
          <div class="container">
              <div class="row">
                  <div class="footer-main">
                      <div class="col-md-3 col-sm-6">
                          <div class="footer-logo">
                              <a href="#"><img src="images/footer-logo.png" alt="footer-logo" class="img-responsive"></a>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                              <p>magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="contact">
                              <h2>Contact us</h2>
                              <p><i class="fa fa-map-marker"></i> <a href="#">1234, Parkstreet Avenue, NewYork</a> </p>
                              <p><i class="fa fa-phone"></i> <a href="tel:+12345678900">+123 456 78900</a>,<a href="tel:+00987654321"> +009 876 54321</a> </p>
                              <p><i class="fa fa-envelope"></i> <a href="mailto:info@e-feri.com">info@e-feri.com</a>,<a href="mailto:e-feri@info.com"> e-feri@info.com</a> </p>
                              <p><i class="fa fa-globe"></i> <a href="www.e-feri.com">www.e-feri.com</a>,<a href="www.infoferi.com">www.infoferi.com</a> </p>
                          </div>
                      </div>
                      <div class="col-md-2 col-sm-6">
                          <div class="account">
                              <h2>my account</h2>
                              <a href="my-account.html">my account</a>
                              <a href="shopping-cart.html">wishlist</a>
                              <a href="shopping-cart.html">shopping cart</a>
                              <a href="#">compare</a>
                              <a href="checkout.html">checkout</a>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-6">
                          <div class="newsletter">
                              <h2>Sign Up For Newsletter</h2>
                              <form>
                                  <div class="input-group">
                                      <input id="1" class="form-control" type="text" name="search" placeholder="Your Mail" required />
                                      <span class="input-group-btn">
                                          <button class="btn btn-success" type="submit">Submit</button>
                                      </span>
                                  </div>
                              </form>
                              <div class="footer-social">
                                  <h3>follow us on</h3>
                                  <a href="#"><i class="fa fa-facebook"></i></a>
                                  <a href="#"><i class="fa fa-twitter"></i></a>
                                  <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                  <a href="#"><i class="fa fa-behance"></i></a>
                                  <a href="#"><i class="fa fa-linkedin"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Footer Part End -->

  <!-- Footer Bottom Start -->
  <section id="footer-btm">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-xs-12">
                  <div class="copywright">
                      <p>Copyright &copy; 2017. All right reserved by <a href="index.html">E-BUY</a></p>
                  </div>
              </div>
              <div class="col-md-6 col-xs-12">
                  <div class="payment text-right">
                      <img src="images/card1.png" alt="card" class="img-responsive">
                      <img src="images/card2.png" alt="card" class="img-responsive">
                      <img src="images/card3.png" alt="card" class="img-responsive">
                      <img src="images/card4.png" alt="card" class="img-responsive">
                      <img src="images/card5.png" alt="card" class="img-responsive">
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Footer Bottom End -->







@endsection
