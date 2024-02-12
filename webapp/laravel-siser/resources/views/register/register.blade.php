<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Siser - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        h1 {
            font-size: 250%;
            color: black;
            text-align: left;
        }

        .btn {
            border: none;
            color: white;
            padding: 10px 45px;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            text-align: right;
            border-radius: 7px;
            cursor: pointer;
        }

        .daftar {
            background-color: #1894EC;
        }

        .daftar:hover {
            background-color: #1475bb;
            color: white
        }

        .form-horizontal {
            text-align: center;
        }

        .form101 {
            margin: 2rem 0rem;
        }
    </style>
</head>

<body>
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>


    <nav style="background: #1894EC;" class=" navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1 style="color:#ffffff;">Siser</h1>
                <h6 style="color:#ffffff;">Sistem Informasi Sertifikat Elektronik</h6>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </nav>

    <div class="container">
        <div>
            <h1>Isi data berikut :</h1>
        </div>
        <form action='/registration' method="post">
            @csrf

            <div id="legend">
                <legend class="">Register</legend>
            </div>
            <div>
                <!-- Username -->
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" id="username" name="username" placeholder="" class="form-control">
                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                </div>
            </div>

            <div>
                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="form-control">
                    <p class="help-block">Password should be at least 4 characters</p>
                </div>
            </div>

            <div>
                <!-- E-mail -->
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>

            <div>
                <!-- Password -->
                <label class="control-label" for="phone">Phone Number</label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" placeholder="" class="form-control">
                    <p class="help-block">Phone Number</p>
                </div>
            </div>

            <div>
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>


            <div>
                <!-- Password -->
                <label class="control-label" for="date_of_birth">Date Of Birth</label>
                <div class="controls">
                    <input type="text" id="date_of_birth" name="date_of_birth" placeholder="" class="form-control">
                    <p class="help-block">Date Of Birth</p>
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="job">Job</label>
                <div class="controls">
                    <input type="text" id="job" name="job" placeholder="" class="form-control">
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="gender">Gender</label>
                <div class="controls">
                    <input type="text" id="gender" name="gender" placeholder="" class="form-control">
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="id_card_number">ID Card Number</label>
                <div class="controls">
                    <input type="text" id="id_card_number" name="id_card_number" placeholder="" class="form-control">
                </div>
            </div>

            <div>
                <!-- Button -->
                <div class="controls" style="margin: 2rem 0rem;">
                    <button class="btn btn-info" name="submit">Register</button>
                </div>
            </div>
        </form>
</body>