@include('layouts.app2')


<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container">
    <h1><br></h1>

    <!-- Add new property button -->
    <a href="{{ route('properties.create') }}" class="btn "><i class="fa-solid fa-plus" style="color:#00B98E !important" ></i> Add New Property</a>

    <h3>All Properties</h3>
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->name }}</h5>
                        <!-- Check if the property is for sale or rent -->
                        <p class="card-text">Category: {{ $property->category_id == 2 ? 'Sale' : 'Rent' }}</p>

                        <!-- Check if images exist for the property -->
                        @if($property->images->isNotEmpty())
    <img src="{{ asset($property->images->first()->url) }}" class="card-img-top" alt="...">
@else
    <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="No Image Available">
@endif


                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="{{ route('properties.edit', $property->id) }}" class="btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this property?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib1/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib1/owlcarousel/owl.carousel.min.js')}}"></script>

        <script src="{{asset('js1/main.js')}}"></script>