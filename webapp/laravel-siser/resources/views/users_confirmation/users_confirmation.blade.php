<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <title>User Confirmation</title>
</head>

@include('home.head')

<body>

    @include('home.navbar')
    <div class="container">
        <div class="row" style="margin-top: 15px;">
            <div class="w-100 col-lg-11">
                <div class="row" style="margin-left: 30px;">
                    <h2 class="text-left text-dark mt-5 ml-5" style="width: 302px; margin-left: 2px; margin-bottom: -30px;">User Confirmation</h2>
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user )
                                    <tr>
                                        <td>{{$user-> username}}</td>
                                        <td>{{$user-> name}}</td>
                                        <td>{{$user-> email}}</td>
                                        <td>{{$user-> phone}}</td>
                                        @if($user->status == "waiting")
                                        <td>
                                            <form action="/users_confirmation/{{$user->id}}/confirmed" method="POST">
                                                @method('patch')
                                                @csrf
                                                <button type="submit" name="konfirmasi" class="btn btn-success">Confirm</button>
                                                <a href="#tolak" class="btn btn-danger" data-toggle="collapse">Tolak</a>
                                            </form>
                                            <div id="tolak" class="collapse">
                                                <form action="/users_confirmation/{{ $user->id }}/rejected" method="POST">
                                                    @method('patch')
                                                    @csrf
                                                    <div>
                                                        <label>Alasan Ditolak</label>
                                                        <textarea name="description_reject" id="complaint" class="form-control" value=""></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger" name="hapus">Submit</button>
                                                </form>
                                            </div>
                                        </td>
                                        @else
                                        <td>{{$user->status}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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