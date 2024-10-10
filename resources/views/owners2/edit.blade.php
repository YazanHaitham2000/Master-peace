@include('layouts.app2')

<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div class="container">
    <br>
    <h3>Edit Property</h3>

    <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Property Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <option value="1" {{ $property->category_id == 1 ? 'selected' : '' }}>Rent</option>
            <option value="2" {{ $property->category_id == 2 ? 'selected' : '' }}>Sale</option>
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" required>
    </div>

    <div class="form-group">
        <label for="area">Area (sq ft)</label>
        <input type="number" class="form-control" id="area" name="area" value="{{ $property->area }}" required>
    </div>

    <div class="form-group">
        <label for="rooms">Rooms</label>
        <input type="number" class="form-control" id="rooms" name="rooms" value="{{ $property->rooms }}" required>
    </div>

    <div class="form-group">
        <label for="bathrooms">Bathrooms</label>
        <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ $property->bathrooms }}" required>
    </div>

    <div class="form-group">
        <label for="bedrooms">Bedrooms</label>
        <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ $property->bedrooms }}" required>
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ $property->location }}" required>
    </div>

    <div class="form-group">
        <label for="images">Property Images</label>
        <input type="file" class="form-control" id="images" name="images[]" multiple>
        <small class="form-text text-muted">Leave blank to keep current images.</small>
    </div>

    <button type="submit" class="btn"><i class="fa-solid fa-floppy-disk" style="color:#00B98E !important"></i> Update Property</button>
    <a href="{{ route('owners2.dashboard') }}" class="btn"><i class="fa-solid fa-backward" style="color:#00B98E !important"></i> Back</a>
</form>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib1/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib1/owlcarousel/owl.carousel.min.js')}}"></script>

        <script src="{{asset('js1/main.js')}}"></script>