@include('layouts.app')
<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                  rel="stylesheet">
<div class="container mt-4">
    <h1>Add New Property for Rent</h1>

    <form action="{{ route('properties-for-rent.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Property Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Add the dropdown for the owner (user) -->
    <div class="form-group mt-3">
        <label for="user_id">Owner</label>
        <select name="user_id" id="user_id" class="form-control" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="area">Area (sqft)</label>
        <input type="number" name="area" id="area" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="rooms">Number of Rooms</label>
        <input type="number" name="rooms" id="rooms" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="bedrooms">Number of Bedrooms</label>
        <input type="number" name="bedrooms" id="bedrooms" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="bathrooms">Number of Bathrooms</label>
        <input type="number" name="bathrooms" id="bathrooms" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="images">Property Images</label>
        <input type="file" name="images[]" id="images" class="form-control" multiple>
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        <i class="fa-solid fa-floppy-disk" style="color: #74C0FC;"></i> Save
    </button>
</form>


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
