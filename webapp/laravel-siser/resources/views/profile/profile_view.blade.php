@include('home.head')

<body>

    @include('home.navbar')

    <div class="container">
        <br>
        <div class="card">
            <h5 class="card-header">Profile</h5>
            <a href="/profile_edit/{{$user->id}}" class="btn btn-info">Edit Profile</a>
            <br>
            <div class="card-body">
                <div class="box">
                    <div class="row grid-container col-lg-3 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="/uploads/{{$user->gambar}}" style="width: 100%; height: 100%;" alt="Card image cap">
                        </div>
                    </div>
                    <h5 style="font-size: 200%;">Name : {{$user->name}}</h5>
                    <div class="dropdown-divider bg-dark"></div>
                    <p>Role : {{$user->role}}</p>
                    <p>Phone Number : {{$user-> phone}}</p>
                    <p>E-mail : {{$user->email}}</p>
                    <p>Date of Birth : {{$user-> date_of_birth}}</p>
                    <p>Job : {{$user-> job}}</p>
                    <p>ID Card Number : {{$user-> id_card_number}}</p>
                </div>
                <br>
            </div>
        </div>

        <hr>

        <br>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>