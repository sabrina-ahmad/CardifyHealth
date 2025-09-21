<section id="preview">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">Appointment Preview</h3>
        </div>
        <div class="card-body">
            <div id="previewContent" class="d-none">
                <h4>Appointment Details</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Doctor:</strong> <span id="previewDoctor"></span><br>
                        <strong>Date & Time:</strong> <span id="previewDateTime"></span><br>
                        <strong>Patient:</strong> <span id="previewPatient"></span><br>
                        <strong>Email:</strong> <span id="previewEmail"></span>
                    </div>
                    <div class="col-md-6 text-center">
                        <canvas id="qrCode"></canvas>
                        <p class="mt-2">Booking Code: <span id="bookingCode"></span></p>
                    </div>
                </div>

                <hr>
                <div class="text-center">
                    <button id="confirmAppointment" class="btn btn-primary">Confirm Booking</button>
                    <button id="editAppointment" class="btn btn-secondary">Edit Appointment</button>
                </div>
            </div>

            <div id="previewError" class="alert alert-danger d-none">
                Unable to book appointment. Please try again later.
            </div>
        </div>
    </div>
</section>
