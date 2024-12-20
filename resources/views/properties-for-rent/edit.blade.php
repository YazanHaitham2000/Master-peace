@include('layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container mt-4">
    <h1>Edit Property for Rent</h1>

    <form action="{{ route('properties-for-rent.update', $home->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $home->name }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $home->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Price Field -->
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $home->price }}" required>
    </div>

    <!-- Area Field -->
    <div class="mb-3">
        <label for="area" class="form-label">Area (sqft)</label>
        <input type="number" class="form-control" id="area" name="area" value="{{ $home->area }}" required>
    </div>

    <!-- Rooms Field -->
    <div class="mb-3">
        <label for="rooms" class="form-label">Rooms</label>
        <input type="number" class="form-control" id="rooms" name="rooms" value="{{ $home->rooms }}" required>
    </div>

    <!-- Bedrooms Field -->
    <div class="mb-3">
        <label for="bedrooms" class="form-label">Bedrooms</label>
        <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ $home->bedrooms }}" required>
    </div>

    <!-- Bathrooms Field -->
    <div class="mb-3">
        <label for="bathrooms" class="form-label">Bathrooms</label>
        <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ $home->bathrooms }}" required>
    </div>

    <!-- Location Field -->
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ $home->location }}" required>
    </div>

    <div class="mb-3">
        <label for="images" class="form-label">Property Images</label>
        <input type="file" name="images[]" id="images" class="form-control" multiple>
        @if($home->images)
            <div class="mt-2">
                <p>Existing Images:</p>
                <div class="row">
                    @foreach($home->images as $image)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $image->url) }}" class="img-fluid mb-2">
                            <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"> Remove
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
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
