<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsuranceApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('owners.index') }}">InsuranceApp</a>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('owners.index') }}">Owners</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cars.index') }}">Cars</a>
        </li>
    </ul>
</nav>



@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
