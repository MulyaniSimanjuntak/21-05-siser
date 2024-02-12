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

    @include('home.navbar')

    <div class="container">
        <div>
            <h1>Isi data berikut :</h1>
        </div>
        <form action='/profile_edit/{{$user->id}}/update' method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div id="legend">
                <legend class="">Edit Profile</legend>
            </div>
            <div>
                <!-- Username -->
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" id="username" name="username" value="{{$user->username}}" class="form-control">
                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                </div>
            </div>

            <div>
                <!-- E-mail -->
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>

            <div>
                <!-- Password -->
                <label class="control-label" for="phone">Phone Number</label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control">
                    <p class="help-block">Phone Number</p>
                </div>
            </div>

            <!-- Text -->
            <label class="control-label" for="gambar">Upload gambar</label>
            <div class="controls">
                <input type="file" id="gambar" name="gambar" value="{{$user->gambar}}" class="form-control">
                <p class="help-block">Gambar</p>
            </div>
            <div>
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>


            <div>
                <!-- Password -->
                <label class="control-label" for="date_of_birth">Date Of Birth</label>
                <div class="controls">
                    <input type="text" id="date_of_birth" name="date_of_birth" value="{{$user->date_of_birth}}" class="form-control">
                    <p class="help-block">Date Of Birth</p>
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="job">Job</label>
                <div class="controls">
                    <input type="text" id="job" name="job" value="{{$user->job}}" class="form-control">
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="gender">Gender</label>
                <div class="controls">
                    <input type="text" id="gender" name="gender" value="{{$user->gender}}" class="form-control">
                </div>
            </div>

            <div>
                <!-- text -->
                <label class="control-label" for="id_card_number">ID Card Number</label>
                <div class="controls">
                    <input type="text" id="id_card_number" name="id_card_number" value="{{$user->id_card_number}}" class="form-control">
                </div>
            </div>

            <div>
                <!-- Button -->
                <div class="controls" style="margin: 2rem 0rem;">
                    <button class="btn btn-info" name="submit">Edit</button>
                </div>
            </div>
        </form>
    </div>

</body>