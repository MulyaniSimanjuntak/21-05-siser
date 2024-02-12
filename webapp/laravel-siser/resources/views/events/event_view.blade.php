@include('home.head')

<style>
    .card-event {
        margin-bottom: 10rem;
    }
</style>

<body>
    @include('home.navbar')

    <div class="container">
        <div class="card card-top">
            <div class="card-body">
                <h1 class="card-title"> {{$event->name}} </h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/event">Event</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$event->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card card-event">
            <div class="card-body">
                <h3 class="card-title"> {{$event->name}} </h3>
                <p style="width: 600px;;">
                    {{$event->description}}
                </p>
                <p>Link Acara : <a href="{{$event->event_link}}">{{$event->event_link}}</a></p>
                <p style="position: absolute;margin-top:-100px;margin-left:750px;font-size:30px; ;">
                <p>{{$event->event_time_start}} : {{$event->event_time_finish}}</p>
                <p>{{$event->date}}</p>
                <p>Pindai disini!</p>
                <p>{!! QrCode::size(150)->backgroundColor(255,255,255)->generate( "http://127.0.0.1:8000/event_view/$event->id" ) !!}</p>
                </p>

                @if($attendances == NULL)

                @if(count($participants) > 0)
                <p style="margin-top: 1rem; font-weight: bold;">Participate</p>
                @elseif(count($participants) == 0)
                <form action="/event_participate/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Participate</button>
                </form>
                @endif

                @if($event->starting_status == "waiting")
                <p style="margin-top: 1rem; font-weight: bold;">Acara Belum Dimulai</p>
                @elseif($event->starting_status == "Event In Progress" OR ($event->starting_status == "Event In Progress" AND $attendances != NULL))
                <p style="margin-top: 1rem; font-weight: bold;">Acara Sedang Berlangsung</p>

                <p style="margin-top: 1rem;">Abesen Belum Dibuat</p>
                @elseif($event->starting_status == "Event Is Over")
                <p style="margin-top: 1rem; font-weight: bold;">Acara Telah Selesai</p>
                @endif

                @if($event->user_id == session('id') AND $event->starting_status == "waiting")
                <form action="/event_start/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Mulai Acara</button>
                </form>
                @elseif($event->user_id == session('id') AND $event->starting_status == "Event In Progress")
                <form action="/event_stop/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-danger">End Events</button>
                </form>
                @endif

                @if(($event->user_id == session('id') AND ($event->starting_status == "waiting" OR $event->starting_status == "Event In Progress")) AND $attendances == NULL)
                <form action="/create_attendances/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Buat Absensi Acara</button>
                </form>
                @else
                <p style="margin-top: 1rem;">Absensi Sudah Dibuat</p>
                @endif

                @else

                @if(count($participants) > 0)
                <p style="margin-top: 1rem; font-weight: bold;">Participate</p>
                @elseif(count($participants) == 0)
                <form action="/event_participate/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Participate</button>
                </form>
                @endif

                @if($event->starting_status == "waiting")
                <p style="margin-top: 1rem; font-weight: bold;">Acara Belum Dimulai</p>
                @elseif($event->starting_status == "Event In Progress" OR ($event->starting_status == "Event In Progress" AND $attendances != NULL))
                <p style="margin-top: 1rem; font-weight: bold;">Acara Sedang Berlangsung</p>
                @if(count($user_attend) > 0 AND count($participants) > 0)
                @foreach($user_attend as $row)
                @if($row->attend_status == "Stop Attend")
                <p style="margin-top: 1rem;">Waktu Mulai Absen : {{$row->time_attend_start}} - Waktu Selesai Absen : {{$row->time_attend_stop}}</p>
                @else
                <form action="/user_do_stop_attend/{{$attendances->id}}/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-danger">Stop Absen</button>
                </form>
                @endif
                @endforeach
                @elseif(count($user_attend) == 0 AND (count($participants)) > 0 )
                <form action="/user_do_attend/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Absen</button>
                </form>
                @elseif(count($user_attend) == 0 AND count($participants) == 0)
                <p style="margin-top: 1rem;">Klik Tombol Participate Agar dapat melakukan Absensi</p>
                @endif
                @elseif($event->starting_status == "Event Is Over")
                <p style="margin-top: 1rem; font-weight: bold;">Acara Telah Selesai</p>
                @foreach($user_attend as $row)
                <p style="margin-top: 1rem;">Waktu Mulai Absen : {{$row->time_attend_start}} - Waktu Selesai Absen : {{$row->time_attend_stop}}</p>
                @endforeach
                @endif

                @if($event->user_id == session('id') AND $event->starting_status == "waiting")
                <form action="/event_start/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Mulai Acara</button>
                </form>
                @elseif($event->user_id == session('id') AND $event->starting_status == "Event In Progress")
                <form action="/event_stop/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @method('patch')
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-danger">End Events</button>
                </form>
                @endif

                @if(($event->user_id == session('id') AND ($event->starting_status == "waiting" OR $event->starting_status == "Event In Progress")) AND $attendances == NULL)
                <form action="/create_attendances/{{$event->id}}" method="POST" style="margin-top: 1rem;">
                    @csrf
                    <button type="submit" name="konfirmasi" class="btn btn-success">Buat Absensi Acara</button>
                </form>
                @elseif(($event->user_id == session('id') AND ($event->starting_status == "waiting" OR $event->starting_status == "Event In Progress")) AND $attendances != NULL)
                <p style="margin-top: 1rem;">Absensi Sudah Dibuat</p>
                @endif
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card">
                <!-- Commentary template start -->
                <div class="row">
                    <div class="col-5">
                        <div class="comment-box ml-2">
                            <h4>Add a comment</h4>
                            <form action="/add_comment/{{$event->id}}" method="POST">
                                @csrf
                                <div class="comment-area"> <textarea class="form-control" name="comment" placeholder="what is your view?" rows="4"></textarea> </div>
                                <div class="comment-btns mt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="pull-right"> <button class="btn btn-success send btn-sm" name="submit" type="submit">Send</button> </div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- commentary template-->
        </div>
        <div class="card">
            <div class="card">
                <!-- Commentary template start -->
                <div class="row">
                    <div class="col-5">
                        <div class="comment-box ml-2">
                            <h4>Comments</h4>
                            @foreach($user_comments as $row)
                            @if(session('username') != $row->username)
                            <div class="card">
                                <p style="font-weight: bold;">{{$row->username}}</p>
                                <p>{{$row->comment}}</p>
                            </div>
                            @else
                            <div class="card" style="margin-top: 1rem;">
                                <p style="font-weight: bold;">{{$row->username}} (You)</p>
                                <p>{{$row->comment}}</p>
                                <form action="/delete_comment/{{$row->id}}/{{$event->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" name="delete" class="btn btn-danger">delete</button>
                                </form>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- commentary template-->
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>