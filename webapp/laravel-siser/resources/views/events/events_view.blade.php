@include('home.head')
<style>
    .dropdown1 .dropbtn1 {
        font-size: 16px;
        border: none;
        outline: none;
        color: #000000;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .dropdown-content1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content1 a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content1 a:hover {
        background-color: #ddd;
    }

    .dropdown1:hover .dropdown-content1 {
        display: block;
    }

    .dropdown-content1 .fas {
        width: 25px;
    }

</style>
<body>
    @include('home.navbar')

    <div class="container">

        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-body">
                <h1 class="card-title"> Events </h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-body">
                <button type="button" class="btn btn-secondary" style="height:150px; width: 150px;">Upload Foto</button>
                <p style="position: absolute;margin-top:-140px;margin-left:160px;font-size:20px; ">{{session('name')}}</p>
            </div>

            <div class="card">
                @if(count($events) > 0)
                <br>
                @foreach($events as $row)
                <div class="box">
                    <div class="row">
                        <div class="col">
                            <h5>
                                <a href="/event_view/{{$row->id}}">{{$row->name}}</a>
                            </h5>
                        </div>
                        <div class="float-end">
                            <div class="dropdown1">
                                <button class="dropbtn1">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-content1">
                                    <a href="events_edit/{{ $row->id }}"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="/delete/{{ $row->id }}"><i class="fas fa-trash"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>{{$row->description}}</p>
                    <p>Link Acara : <a href="{{$row->event_link}}">{{$row->event_link}}</a></p>
                    <div class="dropdown-divider bg-dark"></div>
                    <p>{{$row->event_time_start}} : {{$row->event_time_finish}}</p>
                    <p>{{$row->date}}</p>
                </div>
                <br>
                @endforeach
                @else
                <div class="card-body">
                    <h3 class="card-title" style="margin-left : 320px;">Tidak ada acara yang berlangsung </h3>
                    <br>
                    @if(session('role') == "admin" OR session('role') == "host")
                    <a href="/create_event" type="button" class="btn btn-outline-success" style="margin-left:470px;">Tambahkan Acara</a>
                    @else

                    @endif
                </div>
                @endif
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
