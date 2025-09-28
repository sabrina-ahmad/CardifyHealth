<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient Data Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        #patient-data {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <button id="download-pdf" class="btn btn-primary float-end">Download PDF</button>

    <div class="position-absolute top-0 start-0"> </div>
    <div class="position-absolute top-0 end-0"></div>
    <div class="position-absolute top-50 start-50"></div>
    <div class="position-absolute bottom-50 end-50"></div>
    <div class="position-absolute bottom-0 start-0"></div>
    <div class="position-absolute bottom-0 end-0"></div>
    <div class="container my-4">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <h1 class="mb-4">Patient Data Preview</h1>


        <div id="patient-data" class="mb-4">
            <!-- Patient Details -->
            <h3>Patient Details</h3>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Full Name:</strong> {{ $patient->fullname }}</p>
                    <p><strong>Patient ID:</strong>
                        #MED-{{ \Carbon\Carbon::parse($patient->created_at)->format('Y') }}-{{ substr($patient->id, 0, 7) }}</small>
                    </p>
                    <p><strong>Date of Birth:</strong> {{ $patient->dob ?? 'not mentioned' }}</p>
                    <p><strong>Gender:</strong> {{ $patient->gender ?? 'not mentioned' }} </p>
                    <p><strong>Contact:</strong> +251{{ $patient->phone_number }}</p>
                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                    <p><strong>Address:</strong> {{ $patient->address ?? 'not mentioned' }}</p>
                </div>
                <div class="col-md-6">
                    <!-- <p><strong>Blood Type:</strong> O+</p> -->
                    <!-- <p><strong>Allergies:</strong> Penicillin</p> -->
                    <!-- <p><strong>Emergency Contact:</strong> Jane Doe (+1 555 987 6543)</p> -->
                    <!-- <p><strong>Insurance Provider:</strong> ABC Health Insurance</p> -->
                    <!-- <p><strong>Insurance Number:</strong> INS-789456123</p> -->
                </div>
            </div>

            <!-- Appointment History -->
            <h3>Appointment History</h3>
            <table class="table table-bordered table-striped mb-4" id="appointments-table">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Purpose</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->department->name }}</td>
                            <td>{{ $appointment->medical_condition }}</td>
                            <td>{{ $appointment->report }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        document.getElementById("download-pdf").addEventListener("click", () => {
            const element = document.getElementById("patient-data");

            const opt = {
                margin: [0.5, 0.5, 1, 0.5],
                filename: "patient-data.pdf",
                image: {
                    type: "jpeg",
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    scrollX: 0,
                    scrollY: 0
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: "portrait"
                }
            };

            html2pdf().set(opt).from(element).save();
        });
    </script>
</body>

</html>
