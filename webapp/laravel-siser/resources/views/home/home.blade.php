@include('home.head')

<body>

    @include('home.navbar')

    <div class="container">
        <br>
        <div class="box">
            <h5 style="font-size: 200%;">Name : {{session('name')}}</h5>
            <div class="dropdown-divider bg-dark"></div>
            <p>Role : {{session('role')}}</p>
            <p>Phone Number : {{session('phone')}}</p>
        </div>
        <hr>

        <br>

        @if(count($user_events) > 0)
        <div class="card">
            <h2 style="text-indent: 20px; font-size: 220%;">Acara yang anda ikuti</h2>
            <div class="card-body">
                @foreach($user_events as $row)
                <div class="box">
                    <h5><a href="/event_view/{{$row->id}}">{{$row->name}}</a></h5>
                    <p>{{$row->description}}</p>
                    <div class="dropdown-divider bg-dark"></div>
                    <p>{{$row->event_time_start}} : {{$row->event_time_finish}}</p>
                    <p>{{$row->date}}</p>
                </div>
                <br>
                @endforeach
            </div>
        </div>
        <br>
        @else
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Tidak ada acara yang Pernah diikuti </h3>
            </div>
            <div class="card-body">
                <a href="/event" type="button" class="btn btn-outline-success">Klik Tombol Ini Untuk Melihat Acara</a>
            </div>
        </div>
        @endif

        <br>

        <div class="card">
            <h5 class="card-header">Acara yang tersedia</h5>
            <a href="/event" class="btn btn-info">Liat semua Acara</a>
            <br>
            <div class="card-body">
                @foreach($events as $row)
                <div class="box">
                    <h5><a href="/event_view/{{$row->id}}">{{$row->name}}</a></h5>
                    <p>{{$row->description}}</p>
                    <div class="dropdown-divider bg-dark"></div>
                    <p>{{$row->event_time_start}} : {{$row->event_time_finish}}</p>
                    <p>{{$row->date}}</p>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>