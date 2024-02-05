
<!DOCTYPE html>
<html lang="en">
<head>


                 <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <script src="{{ url('js/bootstrap.bundle.min.js')}}" ></script>
                  <!-- END Bootstrap -->

                  <!-- additional  CSS  -->
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
                 <!-- END additional CSS -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .login-container img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

<div class="mt-8 login-container d-flex flex-column align-items-center">
    <h2 class="mb-4 text-center">Connexion</h2>

    @if(session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    <!-- Formulaire de connexion -->

    <form method="POST" action="{{ route('GestAdmin') }}">
            @csrf

            <!-- Email Address -->

            <div class="mt-4 d-flex flex-column align-items-center">
            <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 d-flex flex-column align-items-center">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex mt-4 d-flex flex-column align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <x-button class="btn btn-primary w-100">
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>

</div>

<!-- Image à droite du formulaire -->
<div class="login-container">
    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" alt="Drawing" class="img-fluid">
    <hr class="my-4">
        <p class="text-center">Nouveau ici? <a href="/register">S'inscrire</a></p>
</div>

</body>
