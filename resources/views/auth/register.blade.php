<!DOCTYPE html>
<html lang="en">

<head>


    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <script src="{{ url('js/bootstrap.bundle.min.js')}}"></script>
    <!-- END Bootstrap -->

    <!-- additional  CSS  -->
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <!-- END additional CSS -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>


    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="text-black card" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="order-2 col-md-10 col-lg-6 col-xl-5 order-lg-1">

                                        <p class="mx-1 mt-4 mb-5 text-center h1 fw-bold mx-md-4">Créer unn compte</p>

                                        <form class="mx-1 mx-md-4">

                                            <div class="flex-row mb-4 d-flex align-items-center">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="mb-0 form-outline flex-fill">

                                                    <x-label for="name" :value="__()" />

                                                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
                                                    <label class="form-label" for="form3Example1c">Pseudo</label>
                                                </div>
                                            </div>

                                            <div class="flex-row mb-4 d-flex align-items-center">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="mb-0 form-outline flex-fill">
                                                    <x-label for="email" :value="__('')" />

                                                    <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                                                    <label class="form-label" for="form3Example3c">Email</label>
                                                </div>
                                            </div>

                                            <div class="flex-row mb-4 d-flex align-items-center">
    <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
    <div class="mb-0 form-outline flex-fill">
        <x-label for="birthdate" :value="__('Date de naissance')" />

        <x-input id="birthdate" class="block w-full mt-1" type="date" name="birthdate" :value="old('birthdate')" required />
        <label class="form-label" for="birthdate"></label>
    </div>
</div>

<div class="flex-row mb-4 d-flex align-items-center">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="mb-0 form-outline flex-fill">

                                                    <x-label for="banniere" :value="__()" />

                                                    <x-input id="banniere" class="block w-full mt-1" type="text" name="banniere" :value="old('banniere')" required autofocus />
                                                    <label class="form-label" for="form3Example1c">Banniere</label>
                                                </div>
                                            </div>

                                            <div class="flex-row mb-4 d-flex align-items-center">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="mb-0 form-outline flex-fill">
                                                    <x-label for="password" :value="__('')" />

                                                    <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                </div>
                                            </div>

                                            <div class="flex-row mb-4 d-flex align-items-center">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="mb-0 form-outline flex-fill">
                                                    <x-label for="password_confirmation" :value="__('')" />

                                                    <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required />
                                                    <label class="form-label" for="form3Example4cd">Confirm your password</label>
                                                </div>
                                            </div>
                                            <div>
                                                <x-button class="btn btn-primary w-50">
                                                    {{ __('Enregistrer') }}
                                                </x-button>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                                                    {{ __('vous avez déja un compte ?') }}
                                                </a>

                                            </div>

                                        </form>

                                    </div>
                                    <div class="order-1 col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-lg-2">

                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>

</body>
