<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Denied</title>

    <style>
        body {
            background: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .error-box {
            background: #fff;
            border-left: 6px solid #dc3545;
            padding: 40px;
            width: 500px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .error-box h1 {
            color: #dc3545;
            font-size: 35px;
            margin-bottom: 20px;
        }

        .error-box p {
            color: #555;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 25px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            opacity: .8;
        }
    </style>

</head>

<body>

<div class="error-box">

    <h1>403</h1>

    <p>
        {{ $message ?? 'You do not have permission to access this page.' }}
    </p>

    <a href="{{ url()->previous() }}" class="btn">
        Go Back
    </a>

</div>


</body>
</html>