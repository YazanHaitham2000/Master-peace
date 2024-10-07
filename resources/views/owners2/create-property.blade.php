<!-- resources/views/owners2/create-property.blade.php -->

@include('layouts.app2')

<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div class="container">
    <br>
    <h3>Add New Property</h3>

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Property Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category_id" required>
                <option value="">Select Category</option>
                <option value="1">Rent</option>
                <option value="2">Sale</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Property Images</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple required>
        </div>

        <button type="submit" class="btn "><i class="fa-solid fa-floppy-disk" style="color:#00B98E !important" ></i> Add Property</button>
        <a href="{{ route('owners2.dashboard') }}" class="btn "><i class="fa-solid fa-backward" style="color:#00B98E !important" ></i> Back</a>

    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib1/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib1/owlcarousel/owl.carousel.min.js')}}"></script>

        <script src="{{asset('js1/main.js')}}"></script>
