<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <title>Riwayat Aktivitas</title>
</head>
<style>
    footer {
        background-color: rgb(48, 46, 46);
    }

    .fa-user-circle {
        float: right;
        margin-right: 25px;
        margin-top: 20px;
    }

    .btn-success {
        margin-left: 35px;
        margin-bottom: 5px;
        position: static;
    }

    .btn-user {
        float: right;
        margin-left: 50px;
        margin-bottom: 5px;
        position: static;
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    ;

    .btn-hapus {
        margin-left: 5px;
        margin-bottom: 5px;
        position: static;
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-logout {
        margin-left: 5px;
        margin-bottom: 5px;
        position: static;
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-warning {
        margin-left: 5px;
        margin-bottom: 5px;
        position: static;
    }
</style>

@include('home.head')

<body>

    @include('home.navbar')
    <div class="container">
        <form method="post" action="">
            <div class="row" style="margin-top: 15px;">
                <div class="w-100 col-lg-11">
                    <div class="row" style="margin-left: 30px;">
                        <h2 class="text-left text-dark mt-5 ml-5" style="width: 302px; margin-left: 2px; margin-bottom: -30px;">Log Activity</h2>
                        <div class="input-group mb-3 col-lg-3 mr-5" style="margin-top: 5%; margin-left: 5%; margin-right: 30px;">
                            <input type="text" class="form-control" name="input_filter_date" placeholder="Masukan tanggal YYYY-MM-DD" aria-label="Masukan tanggal YYYY-MM-DD" aria-describedby="button-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" name="filter_date" type="submit" id="button-addon2">Filter</button>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-lg-3 ml-5" style="margin-top: 5%; margin-left: 10%;">
                            <input type="text" class="form-control" name="input_filter_user" placeholder="Masukan username" aria-label="Masukan username" aria-describedby="button-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" name="filter_user" type="submit" id="button-addon2">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-12">
                        <div class="table-responsiv col-lg-12 ml-5">
                            <div style="height: 500px; overflow: auto; margin-bottom: 40px;">
                                <table class="table table-bordered" style="background: #f7f7f7;">
                                    <thead class="bg-primary text-white text-center">
                                        <th scope="col">Tanggal &amp; Waktu</th>
                                        <th scope="col">Nama Aktivitas</th>
                                        <th scope="col">Nama User</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($riwayataktivitas as $riwayat )
                                        <tr>
                                            <td>{{$riwayat-> date_time}}</td>
                                            <td>{{$riwayat-> activity}}</td>
                                            <td>{{$riwayat-> username}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>