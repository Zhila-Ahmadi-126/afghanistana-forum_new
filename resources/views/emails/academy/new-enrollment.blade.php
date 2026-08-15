<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Academy Enrollment</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f4f7fb; padding:30px;">

    <div style="
        max-width:650px;
        margin:auto;
        background:#ffffff;
        border-radius:15px;
        padding:30px;
        border:1px solid #dbe5f0;
    ">

        <h2 style="color:#123b68;">
            New Academy Enrollment
        </h2>

        <p>
            A new student has submitted an enrollment application through the Academy website.
        </p>

        <hr>

        <p>
            <strong>Student:</strong>
            {{ $enrollment->student?->first_name }}
            {{ $enrollment->student?->last_name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $enrollment->student?->email }}
        </p>

        <p>
            <strong>Phone:</strong>
            {{ $enrollment->student?->phone }}
        </p>

        <p>
            <strong>Enrollment Date:</strong>
            {{ $enrollment->enrollment_date }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ ucfirst($enrollment->enrollment_status) }}
        </p>

        <hr>

        <p style="color:#555;">
            Please log in to the Academy administration panel to review this application.
        </p>

    </div>

</body>
</html>