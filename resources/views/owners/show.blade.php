@include('layouts.app')
<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                  rel="stylesheet">

<div class="container mt-4">
    <h1>Owner Details</h1>
    <p><strong>Name:</strong> {{ $owner->name }}</p>
    <p><strong>Email:</strong> {{ $owner->email }}</p>
    <a href="{{ route('owners.edit', $owner->id) }}" class="btn "><i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i> Edit</a>
    <a href="{{ route('owners.index') }}" class="btn "><i class="fa-solid fa-backward" style="color: #74C0FC;"></i> Back</a>
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
