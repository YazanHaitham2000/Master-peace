@include('layouts.app2')


    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<br>

<div class="container">
    <h2>User Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('owners2.profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="{{ route('owners2.dashboard') }}" class="btn"><i class="fa-solid fa-backward" style="color:#00B98E !important"></i> Back</a>

    </form>
<br>
<h3>Your Appointments</h3>
@if($appointments->isEmpty())
    <p>No appointments found.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Appointment With</th>
                <th>Email</th>
                <th>House</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->name ?? 'N/A' }}</td> <!-- Accessing the user's name -->
                    <td>{{ $appointment->user->email ?? 'N/A' }}</td> <!-- Accessing the user's email -->
                    <td>{{ $appointment->home->name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->date . ' ' . $appointment->time)->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif














<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib1/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib1/owlcarousel/owl.carousel.min.js')}}"></script>

        <script src="{{asset('js1/main.js')}}"></script>
