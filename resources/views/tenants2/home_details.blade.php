@include('layouts.app4')

<!-- Property Details Page -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            <!-- Slider for Property Images -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($home->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset($image->url) }}" class="d-block w-100" alt="Property Image">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#propertyCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <!-- Property Details -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">{{ $home->name }}</h1>
                <p><strong>Type: </strong>
                    @if($home->category_id == 1)
                    For Rent
                    @elseif($home->category_id == 2)
                    For Sale
                    @endif
                </p>
                <p><strong>Price: </strong> ${{ $home->price }}</p>
                <p><strong>Area: </strong> {{ $home->area }} sq. ft.</p>
                <p><strong>Rooms: </strong> {{ $home->rooms }}</p>
                <p><strong>Bathrooms: </strong> {{ $home->bathrooms }}</p>

                <!-- Booking Button -->
                @if($home->is_booked)
                <button class="btn btn-danger" disabled>Already Booked</button>
                @else
                <button class="btn btn-primary" id="bookAppointment">Book Appointment</button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Appointment Popup Message -->
<div id="appointmentModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Your Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Choose your preferred date and time for the appointment.</p>
                <form id="appointmentForm">
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Appointment Date:</label>
                        <input type="date" class="form-control" id="appointmentDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentTime" class="form-label">Appointment Time:</label>
                        <input type="time" class="form-control" id="appointmentTime" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Set Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success Popup Message -->
<div id="bookingSuccess" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Booked</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Your appointment has been successfully booked!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('bookAppointment').addEventListener('click', function() {
        @if(Auth::check()) // Check if the user is logged in
            // Show the appointment modal for logged-in users
            var appointmentModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            appointmentModal.show();
        @else
            // Redirect to login page if the user is not logged in
            window.location.href = "{{ route('login') }}";
        @endif
    });

    document.getElementById('appointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Get the selected date and time from the form
        var appointmentDate = document.getElementById('appointmentDate').value;
        var appointmentTime = document.getElementById('appointmentTime').value;

        // Simulate booking process
        fetch('{{ route("book.appointment", $home->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                date: appointmentDate,
                time: appointmentTime
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide the appointment modal and show the success message
                var appointmentModal = bootstrap.Modal.getInstance(document.getElementById('appointmentModal'));
                appointmentModal.hide();

                var bookingModal = new bootstrap.Modal(document.getElementById('bookingSuccess'));
                bookingModal.show();

                document.getElementById('bookAppointment').classList.add('btn-danger');
                document.getElementById('bookAppointment').disabled = true;
                document.getElementById('bookAppointment').innerText = 'Already Booked';
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib1/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib1/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib1/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib1/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js1/main.js') }}"></script>
