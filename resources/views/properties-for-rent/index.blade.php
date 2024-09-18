@include('layouts.app')

<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                  rel="stylesheet">

<div class="container mt-4">
    <h3>Properties for Rent</h3>
    <a href="{{ route('properties-for-rent.create') }}" class="btn "><i class="fa-solid fa-plus" style="color: #74C0FC;"></i> Add New Property</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($homes as $home)
            <tr>
                <td>{{ $home->name }}</td>
                <td>
                    <a href="{{ route('properties-for-rent.edit', $home->id) }}" class="btn "><i class="fas fa-edit"></i>Edit</a>
                    <form action="{{ route('properties-for-rent.destroy', $home->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn " onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">No properties found.</td>
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