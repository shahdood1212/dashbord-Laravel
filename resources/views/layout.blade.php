<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>



    <nav class="navbar navbar-expand-lg">
        <div class="container">
           
        <button class="btn" id="darkModeToggle">
    <i class="fas fa-moon"></i>
</button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="text-center mb-4">
                <img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle" width="80" alt="User Avatar">
                <h5 class="mt-2">Ibrahim Gamal</h5>
                    <small>krem.01063274122@gmail.com</small>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('books.index') }}">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-plus me-2"></i> Category
                        </a>
                    </li> <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">
                            <i class="fas fa-users me-2"></i> Author
                        </a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-plus me-2"></i> Student
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-chart-line me-2"></i> Dashboard
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
