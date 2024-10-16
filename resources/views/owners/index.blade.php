  @include('layouts.app')
    <title>@yield('title', 'Owner Management')</title>

    <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  


 
<div class="container mt-4">
    <h3>Manage Owners</h3>
    <div class="row">
    <div class="col-md-6">
        <!-- Search form aligned to the left -->
        <form action="{{ route('owners.index') }}" method="GET" class="d-flex">
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
            <a href="{{ route('owners.create') }}" class="btn">
                <i class="fa-solid fa-plus" style="color: #74C0FC;"></i> Add New Owner
            </a>
        </div>
    </div>
</div>

<br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->email }}</td>
                <td>
                    <a href="{{ route('owners.show', $owner->id) }}" class="btn "> <i class="fas fa-eye"></i>View</a>
                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn"><i class="fas fa-edit"></i>Edit</a>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn " onclick="return confirm('Are you sure you want to delete this owner?')"><i class="fas fa-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No owners found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
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
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>

</html>
