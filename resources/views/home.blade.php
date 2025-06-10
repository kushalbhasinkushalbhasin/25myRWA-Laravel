@extends('layouts.app')

@section('content')

   <main id="content">

      
@if(in_array('slider', $home_sections))
  <section>
    <div class="slick-slider mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":false}'>
     @foreach($sliders as $slider)
        <div class="box px-0 d-flex flex-column">
          <div class="bg-cover custom-vh-04 d-flex align-items-center" style="background-image: url('{{app('client')->client_website_url.'/RWAVendor/clients/homeslider/'.$slider['banner_image']}}')">

            <div class="container">
              <div class="row">
                <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-3 col-sm-8 offset-sm-2 mt-xl-1 py-8 pt-lg-12">
                  <div class="bg-white  px-7 pt-6 pb-4 rounded-lg ml-lg-n1 mb-xl-15 op-8" data-animate="flipInX">
                    <!--<div class="mt-n7 position-absolute">-->
                    <!--  <span class="badge badge-orange">Featured</span>-->
                    <!--</div>-->
                    <h2 class="my-0"><a href="#" class="fs-30 lh-12 text-dark hover-primary">{{$slider['banner_title']}}</a></h2>
                    <p class="my-3 font-weight-500 text-gray-light lh-15">{{$slider['banner_content']}}</p>
                    @if(0)
                    <p class="fs-14 font-weight-500 letter-spacing-087 text-primary text-uppercase lh-15 mb-1">
                      For Sale</p>
                    <p class="fs-22 font-weight-bold text-heading">$1.250.000</p>
                    <ul class="list-inline d-flex mb-0 flex-wrap border-top justify-content-between pt-4 mr-n2">
                      <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                        <svg class="icon icon-bedroom fs-18 text-primary mr-2">
                          <use xlink:href="#icon-bedroom"></use>
                        </svg>
                        3 Bedrooms
                      </li>
                      <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                        <svg class="icon icon-shower fs-18 text-primary mr-2">
                          <use xlink:href="#icon-shower"></use>
                        </svg>
                        3 Bathrooms
                      </li>
                      <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                        <svg class="icon icon-square fs-18 text-primary mr-2">
                          <use xlink:href="#icon-square"></use>
                        </svg>
                        2300 Sq.Ft
                      </li>
                    </ul>
                    @endif
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>
  </section>
@endif
  
@if(in_array('home-contact-us', $home_sections))
    <section class="bg-gray-02 bg-black pt-9 pb-9" id="contact-us-sections" style='background-color:#000!important;'>
      <div class="container">
        <h2 class="text-center text-white line-height-base">
          Contact Us
        </h2>
        <span class="heading-divider mx-auto mb-7"></span>
        <h5 class="text-center text-white">Drop us a line!</h5>
        <div class="row">
          <div class="col-md-2"></div>
            <div class='col-md-8'>
            <form action="{{ route('save_contact_us') }}" method="post">
              @csrf
              <div class="row">

                  <div class="col-md-12 mt-5">
                      <input
                          type="text"
                          placeholder="Name"
                          class="form-control form-control-lg home-contact-form-control  @error('name') is-invalid @enderror"
                          name="name"
                          value="{{ old('name') }}"
                          required
                      >
                      @error('name')
                          <div class="invalid-feedback d-block">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-12 mt-5">
                      <input
                          type="text"
                          placeholder="Email"
                          class="form-control form-control-lg home-contact-form-control @error('email') is-invalid @enderror"
                          name="email"
                          value="{{ old('email') }}"
                          required
                      >
                      @error('email')
                          <div class="invalid-feedback d-block">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-12 mt-5">
                      <textarea
                          placeholder="Message"
                          class="form-control form-control-lg home-contact-form-control @error('message') is-invalid @enderror"
                          name="message"
                          rows="5"
                          required
                      >{{ old('message') }}</textarea>
                      @error('message')
                          <div class="invalid-feedback d-block">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-12 mt-5">
                      <input
                          type="checkbox"
                          class="form-check-input home-contact-form-control ml-2 @error('newsletter') is-invalid @enderror"
                          id="newsletter"
                          name="newsletter"
                          {{ old('newsletter') ? 'checked' : '' }}
                          value="1"
                      >
                      <label class="form-check-label ml-5" for="newsletter">
                          Sign up for our email list for updates, promotions, and more.
                      </label>
                      @error('newsletter')
                          <div class="invalid-feedback d-block">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-12 mt-5">
                    @if (session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div>
                    @endif
                      <button type="submit" class="btn btn-primary btn-lg float-right">Send Message</button>
                  </div>

              </div>
            </form>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </section>
  @endif

@if(0)
  <section class="pt-9 pb-9 pb-lg-11">
    <div class="container">
      <h2 class="text-center text-dark line-height-base">
        Latest Properties For Sale
      </h2>
      <span class="heading-divider mx-auto mb-7"></span>
      <div class="slick-slider custom-arrow-spacing-30"
         data-slick-options='{"slidesToShow": 3, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}},{"breakpoint": 768,"settings": {"slidesToShow": 1,"autoplay":true,"arrows":false}}]}'>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-17.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Home in Metric Way</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-18.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Affordable Urban House</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-19.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Villa on Hollywood Boulevard</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-17.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Home in Metric Way</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-18.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Affordable Urban House</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-19.jpg')}}"
                         alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0 lh-1">$1.250.000</p>
              <span class="badge badge-primary">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Villa on Hollywood Boulevard</a>
              </h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-02 pt-9 pb-9 pb-lg-11">
    <div class="container">
      <h2 class="text-center text-dark line-height-base">
        Latest Properties For Rent
      </h2>
      <span class="heading-divider mx-auto mb-7"></span>
      <div class="slick-slider custom-arrow-spacing-30"
         data-slick-options='{"slidesToShow": 3, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-20.jpg')}}" alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Home in Metric Way</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-21.jpg')}}" alt="Affordable Urban House">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Affordable Urban House</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-22.jpg')}}" alt="Villa on Hollywood Boulevard">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-20.jpg')}}" alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Home in Metric Way</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-21.jpg')}}" alt="Affordable Urban House">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Affordable Urban House</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card" data-animate="fadeInUp">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img src="{{asset('assets/images/properties-grid-22.jpg')}}" alt="Villa on Hollywood Boulevard">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div class="mt-auto d-flex hover-image">
                  <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="far fa-heart"></i>
                      </a>
                    </li>
                    <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Compare">
                      <a href="#" class="text-white fs-20 hover-primary">
                        <i class="fas fa-exchange-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                            class="text-gray-light font-weight-500 fs-14"> / month</span></p>
              <span class="badge badge-indigo">For Sale</span>
            </div>
            <div class="card-body py-2">
              <h2 class="fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                   class="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
              <p class="font-weight-500 text-gray-light mb-0">1421 San Pedro St, Los Angeles</p>
            </div>
            <div class="card-footer bg-transparent pt-3 pb-4">
              <ul class="list-inline d-flex justify-content-between mb-0 flex-wrap">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bedroom">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  3 Br
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="3 Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  3 Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="Size">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  2300 Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                            data-toggle="tooltip" title="1 Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  1 Gr
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-single-image-03 pt-9">
    <div class="container">
      <h2 class="text-dark text-center mxw-751 px-md-8 lh-163">
        We have the most listings and constant updates.
        So you’ll never miss out.</h2>
      <span class="heading-divider mx-auto"></span>
      <div class="row mt-7 mb-6 mb-lg-11">
        <div class="col-lg-6 mb-6 mb-lg-0">
          <div class="media rounded-lg bg-white border border-hover shadow-xs-2 shadow-hover-lg-1 px-7 py-8 hover-change-image flex-column flex-sm-row h-100"
                 data-animate="fadeInUp">
            <img src="{{asset('assets/images/group-16.png')}}"
                     alt="Buy a new home" class="mb-6 mb-sm-0 mr-sm-6">
            <div class="media-body">
              <a href="#"
                       class="text-decoration-none d-flex align-items-center">
                <h4 class="fs-20 lh-1625 text-secondary mb-1">Buy a new home</h4>
                <div class="position-relative d-flex align-items-center ml-2">
                  <span class="image text-primary position-absolute pos-fixed-left-center fs-16"><i
                                            class="fal fa-long-arrow-right"></i></span>
                  <span class="text-primary fs-42 lh-1 hover-image d-flex align-items-center"><svg
                                    class="icon icon-long-arrow"><use
                                    xlink:href="#icon-long-arrow"></use></svg></span>
                </div>
              </a>
              <p class="mb-0">
                Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-6 mb-lg-0">
          <div class="media rounded-lg bg-white border border-hover shadow-xs-2 shadow-hover-lg-1 px-7 py-8 hover-change-image flex-column flex-sm-row h-100"
                 data-animate="fadeInUp">
            <img src="{{asset('assets/images/group-17.png')}}"
                     alt="Sell a home" class="mb-6 mb-sm-0 mr-sm-6">
            <div class="media-body">
              <a href="#"
                       class="text-decoration-none d-flex align-items-center">
                <h4 class="fs-20 lh-1625 text-secondary mb-1">Sell a home</h4>
                <div class="position-relative d-flex align-items-center ml-2">
                  <span class="image text-primary position-absolute pos-fixed-left-center fs-16"><i
                                            class="fal fa-long-arrow-right"></i></span>
                  <span class="text-primary fs-42 lh-1 hover-image d-flex align-items-center"><svg
                                    class="icon icon-long-arrow"><use
                                    xlink:href="#icon-long-arrow"></use></svg></span>
                </div>
              </a>
              <p class="mb-0">
                Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row pb-8 pb-sm-10">
        <div class="col-md-4 pr-xl-14" data-animate="fadeInLeft">
          <h2 class="text-heading lh-163 mt-md-4">Explore Neighborhoods</h2>
          <p class="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
          <a href="listing-full-map-1.html" class="btn btn-lg text-secondary btn-accent rounded-lg mb-md-0 mb-8">Explore all
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
        <div class="col-md-8" data-animate="fadeInRight">
          <div class="slick-slider custom-arrow-spacing-30"
                 data-slick-options='{"slidesToShow": 3, "autoplay":true,"arrows":true,"dots":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false,"autoplay":true}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
            <div class="card border-0 bg-transparent">
              <a href="single-property-1.html" class="hover-zoom-in d-block">
                <img src="{{asset('assets/images/properties-city-11.jpg')}}" class="card-img"
                             alt="Los Angeles">
              </a>
              <div class="card-body p-0 mt-2">
                <h2 class="mb-0"><a href="single-property-1.html"
                                            class="text-dark hover-primary fs-16 lh-2 ">Los Angeles</a>
                </h2>
                <p class="font-weight-500 text-gray-light mb-0">12 Properties</p>
              </div>
            </div>
            <div class="card border-0 bg-transparent">
              <a href="single-property-1.html" class="hover-zoom-in d-block">
                <img src="{{asset('assets/images/properties-city-12.jpg')}}" class="card-img"
                             alt="New York">
              </a>
              <div class="card-body p-0 mt-2">
                <h2 class="mb-0"><a href="single-property-1.html"
                                            class="text-dark hover-primary fs-16 lh-2 ">New York</a>
                </h2>
                <p class="font-weight-500 text-gray-light mb-0">24 Properties</p>
              </div>
            </div>
            <div class="card border-0 bg-transparent">
              <a href="single-property-1.html" class="hover-zoom-in d-block">
                <img src="{{asset('assets/images/properties-city-13.jpg')}}" class="card-img"
                             alt="Sacramento">
              </a>
              <div class="card-body p-0 mt-2">
                <h2 class="mb-0"><a href="single-property-1.html"
                                            class="text-dark hover-primary fs-16 lh-2 ">Sacramento</a>
                </h2>
                <p class="font-weight-500 text-gray-light mb-0">24 Properties</p>
              </div>
            </div>
            <div class="card border-0 bg-transparent">
              <a href="single-property-1.html" class="hover-zoom-in d-block">
                <img src="{{asset('assets/images/properties-city-11.jpg')}}" class="card-img"
                             alt="Los Angeles">
              </a>
              <div class="card-body p-0 mt-2">
                <h2 class="mb-0"><a href="single-property-1.html"
                                            class="text-dark hover-primary fs-16 lh-2 ">Los Angeles</a>
                </h2>
                <p class="font-weight-500 text-gray-light mb-0">12 Properties</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-gray-02 pt-10 pb-11">
    <div class="container">
      <p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">testimonials</p>
      <h2 class="text-center lh-1625 text-dark mb-5">
        What Our Clients Say About Us
      </h2>
      <div class="slick-slider testimonials"
         data-slick-options='{"slidesToShow": 3, "autoplay":true,"dots":true,"arrows":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-3.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Lydia Wise">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Lydia Wise</p>
              <p class="mb-0">Manchester</p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-4.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Olive Erickson">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Olive Erickson</p>
              <p class="mb-0">New Mexico</p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-5.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Carl Knight">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Carl Knight</p>
              <p class="mb-0">Washington, D.C.</p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-3.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Lydia Wise">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Lydia Wise</p>
              <p class="mb-0">Manchester</p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-4.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Olive Erickson">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Olive Erickson</p>
              <p class="mb-0">New Mexico</p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="card p-6" data-animate="fadeInUp">
            <div class="card-body p-0 text-center">
              <span class="text-primary fs-26 lh-1 mb-4 d-block">
                <i class="fas fa-quote-left"></i>
              </span>
              <p class="card-text fs-15 lh-2 mb-4">
                Working with @homeID is like having a family member who can fix everything. They know what you need, exactly when you need it.
              </p>
              <span class="mx-auto divider mb-5"></span>
              <img src="{{asset('assets/images/testimonial-5.jpg')}}" class="rounded-circle d-inline-block mb-2"
                         alt="Carl Knight">
              <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">Carl Knight</p>
              <p class="mb-0">Washington, D.C.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
@if(0)
  <section class="pt-10 pb-9">
    <div class="container">
      <p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">You may click the advertisement to call/ email or visit the advertiser's website.</p>
      {{-- <h2 class="text-center lh-1625 text-dark pb-1">
        Check Out Recent News & Articles
      </h2> --}}
      <div class="mx-n2">
        <div class="slick-slider mt-6 mx-n1 slick-dots-mt-0"
             data-slick-options='{"slidesToShow": 2, "autoplay":true,"arrows":false,"dots":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
          @foreach($advertisers as $advertiser)
            @php
              $link = Str::startsWith($advertiser['url'], ['http://', 'https://'])
                      ? $advertiser['url']
                      : 'https://' . $advertiser['url'];
            @endphp
            <div class="item py-4" data-animate="fadeInUp">
              <div class="" data-animate="fadeInUp">

                <div class="position-relative d-flex align-items-end card-img-top ads-imgs">
                  <a href="{{$link}}" class="hover-shine">
                    <img src="{{app('client')->client_website_url.'/RWAVendor/common/ads/'.$advertiser['image']}}" style="height:250px;"
                                  alt="{{$advertiser['bussiness_name']}}" class="">
                  </a>
                  {{-- <a href="#"
                            class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white mx-2 my-4 position-absolute pos-fixed-bottom">
                    Creative
                  </a> --}}
                </div>


              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @endif
  {{-- <div id="compare" class="compare">
    <button class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
    </button>
    <div class="list-group list-group-no-border bg-dark py-3">
      <a href="#" class="list-group-item bg-transparent text-white fs-22 text-center py-0">
        <i class="far fa-bars"></i>
      </a>
      <div class="list-group-item card bg-transparent">
        <div class="position-relative hover-change-image bg-hover-overlay">
          <img src="{{asset('assets/images/compare-01.jpg')}}" class="card-img" alt="properties">
          <div class="card-img-overlay">
            <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="list-group-item card bg-transparent">
        <div class="position-relative hover-change-image bg-hover-overlay">
          <img src="{{asset('assets/images/compare-02.jpg')}}" class="card-img" alt="properties">
          <div class="card-img-overlay">
            <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="list-group-item card card bg-transparent">
        <div class="position-relative hover-change-image bg-hover-overlay ">
          <img src="{{asset('assets/images/compare-03.jpg')}}" class="card-img" alt="properties">
          <div class="card-img-overlay">
            <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="list-group-item bg-transparent">
        <a href="compare-details.html" class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
          Compare
        </a>
      </div>
    </div>
  </div> --}}
  
@if( !empty($newsLetters) ) {

  
    <div class="modal fade login-register login-register-modal" id="news-letter-modal" tabindex="-1" role="dialog" aria-labelledby="login-register-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mxw-571" role="document">

          <img src="RWAVendor/uploads/newsletter/{{$newsLetters->image}}" />

      </div>
    </div>

    @endsection
    
    @section('after_scripts')
        
        <script>
          $(document).ready(function () {
            $('#news-letter-modal').modal('show');
          });
        </script>
    
    @stop

@endif

    </main>
    
    
@endsection