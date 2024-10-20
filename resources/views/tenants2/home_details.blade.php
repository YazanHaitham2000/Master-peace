@include('layouts.app4')



<link href="{{ asset('rating.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
#appointmentForm {
    display: flex;
    flex-direction: column;
    align-items: center;
}

#appointmentDate, #appointmentTime {
    width: 50%; /* Set the width of the inputs */
    margin-bottom: 20px; /* Space between date and time inputs */
}
</style>

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
    <button class="btn btn-danger" id="cancelAppointment">Cancel Appointment</button>
@else
    <button class="btn btn-primary" id="bookAppointment">Book Appointment</button>
@endif
</div>
</div>
</div>
</div>

<!-- Appointment Popup Message -->
<div id="appointmentModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center"> <!-- Added 'text-center' for centering -->
            <div class="modal-header">
                <h5 class="modal-title">Set Your Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Choose your preferred date and time for the appointment.</p>

                <form id="appointmentForm">
                    <div class="mb-3 d-flex justify-content-center">
                        <label for="appointmentDate" class="form-label">Appointment Date:</label>
                        <input type="text" class="form-control w-50" id="appointmentDate" required> <!-- Center with 'w-50' -->
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <label for="appointmentTime" class="form-label">Appointment Time:</label>
                        <input type="time" class="form-control w-50" id="appointmentTime" required disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Set Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Success Popup Message -->
<div id="bookingSuccess" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
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

<!-- Cancel Success Popup Message -->
<div id="cancelSuccess" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Canceled</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Your appointment has been successfully canceled!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- Comments Section -->
<div class="container my-5">
    <h2>Comments & Ratings</h2>

    @if(Auth::check())
    <!-- Comment Form for logged-in users -->
    <form id="commentForm" action="{{ route('comments.store', $home->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Your Comment</label>
            <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Star Rating -->
        <div class="mb-3">
            <label class="form-label">Rate this Property:</label>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
    @else
    <!-- Prompt to login -->
    <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment and rating.</p>
    @endif

<!-- Display Comments -->
<div class="comments-list mt-5">
    <h4>All Comments</h4>
    
    <!-- Container for comments with scroll -->
    <div style="max-height: 300px; overflow-y: auto;">
        @foreach($home->comments as $index => $comment)
        <div class="comment-item mb-4" style="{{ $index >= 4 ? 'display: block;' : '' }}"> <!-- Display all comments but limit scroll -->
            <strong>{{ $comment->user->name }}</strong>
            <div class="rating-display">
                @for($i = 1; $i <= 5; $i++)
                <span class="fa fa-star {{ $i <= $comment->rating ? 'checked' : '' }}"></span>
                @endfor
            </div>
            <p>{{ $comment->content }}</p>
        </div>
        @endforeach
    </div>
</div>






<script>
    document.addEventListener('DOMContentLoaded', function() {
        const appointmentDateInput = document.getElementById('appointmentDate');
        const appointmentTimeInput = document.getElementById('appointmentTime');

        // Fetch reserved dates and times from the backend
        fetch('{{ route("booked.times", $home->id) }}')
            .then(response => response.json())
            .then(data => {
                let reservedDates = data.map(appointment => appointment.date);
                let reservedTimes = data.reduce((acc, curr) => {
                    acc[curr.date] = acc[curr.date] || [];
                    acc[curr.date].push(curr.time);
                    return acc;
                }, {});

                // Initialize Flatpickr to disable reserved dates
                flatpickr(appointmentDateInput, {
                    dateFormat: "Y-m-d",
                    minDate: "today",  // Only allow future dates
                    disable: reservedDates, // Disable reserved dates
                    onChange: function(selectedDates, dateStr) {
                        // Enable time input only if the selected date is not fully booked
                        if (reservedDates.includes(dateStr)) {
                            appointmentTimeInput.setAttribute('disabled', true);
                            alert('This date is fully booked.');
                        } else {
                            appointmentTimeInput.removeAttribute('disabled');
                        }
                    }
                });

                // Disable reserved times based on selected date
                appointmentDateInput.addEventListener('change', function() {
                    let selectedDate = appointmentDateInput.value;

                    if (reservedDates.includes(selectedDate)) {
                        appointmentTimeInput.setAttribute('disabled', true);
                    } else {
                        appointmentTimeInput.removeAttribute('disabled');
                    }
                });
            });
    });

    document.getElementById('bookAppointment').addEventListener('click', function() {
        @if(Auth::check()) // Check if the user is logged in
            var appointmentModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            appointmentModal.show();
        @else
            window.location.href = "{{ route('login') }}";
        @endif
    });

    document.getElementById('appointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Get the selected date and time
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

    // Handle appointment cancellation
    document.getElementById('cancelAppointment').addEventListener('click', function() {
        fetch('{{ route("cancel.appointment", $home->id) }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var cancelModal = new bootstrap.Modal(document.getElementById('cancelSuccess'));
                cancelModal.show();

                document.getElementById('cancelAppointment').classList.remove('btn-danger');
                document.getElementById('cancelAppointment').classList.add('btn-primary');
                document.getElementById('cancelAppointment').innerText = 'Book Appointment';
                document.getElementById('cancelAppointment').setAttribute('id', 'bookAppointment');
                document.getElementById('bookAppointment').disabled = false;
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
