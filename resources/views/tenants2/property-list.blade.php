@include('layouts.app3')




<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="{{ route('properties.index') }}" method="GET"> <!-- Search Form -->
            <div class="row g-3">
                <!-- Search Input Section -->
                <div class="col-md-10">
                    <div class="row g-3">
                        <!-- Keyword Input -->
                        <div class="col-md-6">
                            <input type="text" name="keyword" class="form-control border-0 py-3" placeholder="Search by Keyword" aria-label="Search by Keyword">
                        </div>
                        
                        <!-- Location Dropdown -->
                        <div class="col-md-6">
                            <select name="location" class="form-select border-0 py-3" style="height: auto;" aria-label="Select Location">
                                <option value="" selected>Select City</option>
                                <option value="Amman">Amman</option>
                                <option value="Zarqa">Zarqa</option>
                                <option value="Irbid">Irbid</option>
                                <option value="Aqaba">Aqaba</option>
                                <option value="Jerash">Jerash</option>
                                <option value="Madaba">Madaba</option>
                                <option value="Salt">Salt</option>
                                <option value="Ajloun">Ajloun</option>
                                <option value="Mafraq">Mafraq</option>
                                <option value="Karak">Karak</option>
                                <option value="Tafilah">Tafilah</option>
                                <option value="Ma'an">Ma'an</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Search Button -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100 py-3">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search End -->






<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sale</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                    </li>
                </ul>
            </div>
        </div>

<div class="tab-content">
    <!-- Featured Properties -->
    <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
            @foreach($properties as $property)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <!-- Link to the home details page -->
                            <a href="{{ route('home.details', ['id' => $property->id]) }}">
                                @if($property->images && $property->images->first())
                                    <img class="img-fluid" src="{{ asset($property->images->first()->url) }}" alt="Property Image">
                                @else
                                    <img class="img-fluid" src="{{ asset('default-image.jpg') }}" alt="Default Property Image">
                                @endif
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                {{ $property->category_id == 1 ? 'For Sale' : 'For Rent' }}
                            </div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="text-primary mb-3">${{ number_format($property->price) }}</h5>
                            <!-- Link to the home details page for the property name -->
                            <a class="d-block h5 mb-2" href="{{ route('home.details', ['id' => $property->id]) }}">{{ $property->name }}</a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->area }} Sqft
                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-bed text-primary me-2"></i>{{ $property->bedrooms }} Bed
                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-bath text-primary me-2"></i>{{ $property->bathrooms }} Bath
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Properties for Sale -->
    <div id="tab-2" class="tab-pane fade p-0">
        <div class="row g-4">
            @foreach($properties as $property)
                @if($property->category_id == 2) <!-- For Sale -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <!-- Link to the home details page -->
                                <a href="{{ route('home.details', ['id' => $property->id]) }}">
                                    @if($property->images && $property->images->first())
                                        <img class="img-fluid" src="{{ asset($property->images->first()->url) }}" alt="Property Image">
                                    @else
                                        <img class="img-fluid" src="{{ asset('default-image.jpg') }}" alt="Default Property Image">
                                    @endif
                                </a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sale</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{ number_format($property->price) }}</h5>
                                <!-- Link to the home details page for the property name -->
                                <a class="d-block h5 mb-2" href="{{ route('home.details', ['id' => $property->id]) }}">{{ $property->name }}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->area }} Sqft
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-bed text-primary me-2"></i>{{ $property->bedrooms }} Bed
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-bath text-primary me-2"></i>{{ $property->bathrooms }} Bath
                                </small>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Properties for Rent -->
    <div id="tab-3" class="tab-pane fade p-0">
        <div class="row g-4">
            @foreach($properties as $property)
                @if($property->category_id == 1) <!-- For Rent -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <!-- Link to the home details page -->
                                <a href="{{ route('home.details', ['id' => $property->id]) }}">
                                    @if($property->images && $property->images->first())
                                        <img class="img-fluid" src="{{ asset($property->images->first()->url) }}" alt="Property Image">
                                    @else
                                        <img class="img-fluid" src="{{ asset('default-image.jpg') }}" alt="Default Property Image">
                                    @endif
                                </a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{ number_format($property->price) }}</h5>
                                <!-- Link to the home details page for the property name -->
                                <a class="d-block h5 mb-2" href="{{ route('home.details', ['id' => $property->id]) }}">{{ $property->name }}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->area }} Sqft
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-bed text-primary me-2"></i>{{ $property->bedrooms }} Bed
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-bath text-primary me-2"></i>{{ $property->bathrooms }} Bath
                                </small>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>





  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib1/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib1/owlcarousel/owl.carousel.min.js')}}"></script>

        <script src="{{asset('js1/main.js')}}"></script>