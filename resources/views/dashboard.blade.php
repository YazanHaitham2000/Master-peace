
<!-- resources/views/dashboard.blade.php -->
@include('layouts.app')
          <!-- Main Content Start -->
          <div class="container-fluid pt-4 px-4">
                @yield('content')
            </div>
            <!-- Main Content End -->


 <!-- Sale & Revenue Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-house-chimney fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Properties for Sale</p>
                    <h6 class="mb-0">{{ $propertiesForSaleCount }}</h6> <!-- Display sale count -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-hotel fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Properties for Rent</p>
                    <h6 class="mb-0">{{ $propertiesForRentCount }}</h6> <!-- Display rent count -->
                </div>
            </div>
        </div>
                    
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Number of Owners</p>
                    <h6 class="mb-0">{{ $numberOfOwners }}</h6> <!-- Display number of owners -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Number of Tenants</p>
                    <h6 class="mb-0">{{ $numberOfTenants }}</h6> 
                </div>
            </div>
        </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Review</h6>
                    </div>
                    <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">owner_name</th>
                                <th scope="col">home_name</th>
                                <!-- <th scope="col">tenant_name</th> -->
                                <th scope="col">category_home</th>
                                <th scope="col">comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                @foreach($item['homes'] as $home)
                                    @foreach($item['comments'] as $comment)
                                        <tr>
                                            @if($item['role_id'] == 1) <!-- Assuming 1 is for owner -->
                                                <td>{{ $item['user_name'] }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $home['home_name'] }}</td>
                                            <!-- @if($item['role_id'] == 2) 
                                                <td>{{ $item['user_name'] }}</td>
                                            @else
                                                <td></td>
                                            @endif -->
                                            <td>{{ $home['category_home'] }}</td>
                                            <td>{{ $comment }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->


            <!-- Widgets End -->


            <!-- Footer Start -->

            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
        </div>
        <!-- Content End -->

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>