@include('layouts.app')

<link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                  rel="stylesheet">


<div class="container mt-4">
    <h3>Manage Tenants</h3>
    <div class="row">
    <div class="col-md-6">
        <!-- Search form aligned to the left -->
        <form action="{{ route('tenants.index') }}" method="GET" class="d-flex">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Search by name" 
                value="{{ request()->get('search') }}" 
                aria-label="Search">
            <button type="submit" class="btn ms-2"><i class="fa-solid fa-magnifying-glass" style="color: #329fc3;"></i></button>
        </form>
    </div>
    
    <div class="col-md-6">
        <!-- Add New Owner button aligned to the right -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('tenants.create') }}" class="btn">
                <i class="fa-solid fa-plus" style="color: #74C0FC;"></i> Add New Tenants
            </a>
        </div>
    </div>
</div>


    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
            <tr>
                <td>{{ $tenant->name }}</td>
                <td>{{ $tenant->email }}</td>
                <td>
                    <a href="{{ route('tenants.show', $tenant->id) }}" class="btn "> <i class="fas fa-eye"></i>View</a>
                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn "><i class="fas fa-edit"></i>Edit</a>
                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="fas fa-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
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
