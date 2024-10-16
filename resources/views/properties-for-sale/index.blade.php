@include('layouts.app')


<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                  rel="stylesheet">


<div class="container mt-4">
    <h3>Properties for Sale</h3>
    <div class="row">
    <div class="col-md-6">
        <!-- Search form aligned to the left -->
        <form action="{{ route('properties-for-sale.index') }}" method="GET" class="d-flex">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Search by property name" 
                value="{{ request()->get('search') }}" 
                aria-label="Search">
            <button type="submit" class="btn  ms-2"><i class="fa-solid fa-magnifying-glass" style="color: #329fc3;"></i></button>
        </form>
    </div>

    <div class="col-md-6">
        <!-- Add New Property button aligned to the right -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('properties-for-sale.create') }}" class="btn">
                <i class="fa-solid fa-plus" style="color: #74C0FC;"></i> Add New Property
            </a>
        </div>
    </div>
</div>
<br>
    
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Property Name</th>
            <th>Owner Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($homes as $home)
        <tr>
            <td>{{ $home->name }}</td>
            <td>{{ $home->user->name ?? 'N/A' }}</td> <!-- Display owner name -->
            <td>{{ $home->location ?? 'N/A' }}</td> <!-- Display property location -->
            <td>
                <a href="{{ route('properties-for-sale.edit', $home->id) }}" class="btn "><i class="fas fa-edit"></i>Edit</a>
                <form action="{{ route('properties-for-sale.destroy', $home->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn " onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No properties found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

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