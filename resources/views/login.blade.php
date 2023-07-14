<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Event
    </title>

    <!-- Favicons -->

    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('bootstrap-md5/img/mdb-favicon.ico') }}" type="image/x-icon" />

    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('bootstrap-md5/css/mdb.min.css') }}" />


</head>

<body>
    <div class="container">

        <div class="row">

            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <small>
                            Event
                        </small>
                    </a>

                </div>
            </nav>

            <div class="col-lg-7 col-md-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>

            <div class="col-lg-5 col-md-6">

                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login"
                            role="tab" aria-controls="pills-login" aria-selected="true">Connexion</a>
                    </li>
                    {{-- Inscription magasin --}}
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">inscription</a>
                    </li> --}}
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form action="login" method="post">
                            @csrf
                            <!-- identifiant input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="loginName" class="form-control" name="name" required />
                                <label class="form-label" for="loginName">Identifier</label>
                            </div>

                            <!-- mot de passe input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="loginPassword" class="form-control" name="password"
                                    required />
                                <label class="form-label" for="loginPassword">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sing In</button>

                        </form>
                    </div>
                    {{-- <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        @include('register')
                    </div> --}}
                </div>
            </div>

        </div>

        <div class="row">
            <x-footer />
        </div>


    </div>

    <!-- Script -->
    <script src="{{ asset('js-projects/app.js') }}"></script>

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('bootstrap-md5/js/mdb.min.js') }}"></script>
    <!--  -->
    <script src="{{ asset('bootstrap-5/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/sweetAlert.js') }}"></script>
</body>

</html>
