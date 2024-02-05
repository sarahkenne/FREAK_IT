<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Forum</title>
    <style>
        body {
            padding-top: 56px;
            /* Adjust based on your top menu height */
        }

        #left-panel,
        #right-panel {
            height: calc(100vh - 56px);
            overflow-y: auto;
        }

        #left-panel {
            background-color: #f8f9fa;
        }

        #right-panel {
            background-color: #ffffff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Manager') }}">Administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div id="left-panel" class="col-md-4">
                @foreach($sujets as $sujet)
                <div class="card">
                    <div class="card-header">
                        {{ $sujet->titre }}
                    </div>
                    <div class="card-body">
                        <img src="{{ $sujet->image }}" alt="Image du sujet">
                        <p>{{ $sujet->description }}</p>
                        <a href="{{ route('sujetsShow', $sujet) }}" class="btn btn-primary">Voir le sujet</a>
                    </div>
                </div>
                @endforeach

                <a href="{{ route('creatSujets') }}" class="btn btn-success btn-circle btn-lg" style="position: fixed; bottom: 50px; left: 0px; z-index: 1000;">
                    <i class="fa fa-plus" style="color: white;"></i>
                </a>

            </div>
            <div id="right-panel" class="col-md-8">
                @yield('content')
            </div>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
