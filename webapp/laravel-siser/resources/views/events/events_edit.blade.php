@include('home.head')

<body>
    @include('home.navbar')
    <div class="container">

        <br>
        <h2> Edit Acara</h2>
        <p>Isi kelengkapan data dibawah untuk membuat acara</p>
        <hr>
        <form action="/update/{{ $events->id }}" method="POST">
            @method("put")
            @csrf
            <fieldset>
                <legend>Edit Acara</legend>
                <p>
                    <label></label>
                    <input type="text" name="name" placeholder="Nama Acara" class="form-control" required value="{{$events->name}}" />
                </p>
                <p>
                    <label></label>
                    <input type="text" name="topic" placeholder=" Topik" class="form-control" required value="{{$events->topic}}" />
                </p>
                <p>
                    <label></label>
                    <input type="text" name="category" placeholder=" Kategori" class="form-control" required value="{{$events->category}}" />
                </p>
                <p>
                    <label></label>
                    <input type="text" name="description" placeholder=" Deskripsi Acara" class="form-control" required value="{{$events->description}}" />
                </p>
                @if(session('role') == "host")

                @else
                <p>
                    <label></label>
                    <input type="text" name="host" placeholder=" Host" class="form-control" required value="{{$events->host}}" />
                </p>
                @endif
                <p>
                    <input type="date" id="date" name="date" class="form-control" value="" placeholder="Date\Month\Year" required value="{{$events->date}}" />
                </p>
                <p>
                    <input type="time" id="event_time_start" name="event_time_start" class="form-control" value="" placeholder="Hours : Minutes AM" required value="{{$events->event_time_start}}" />
                </p>
                <p>
                    <input type="time" id="event_time_finish" name="event_time_finish" class="form-control" value="" placeholder="Hours : Minutes AM" required value="{{$events->event_time_finish}}" />
                </p>
                <p>
                    <label></label>
                    <input type="text" name="event_link" placeholder=" link acara" class="form-control" required value="{{$events->event_link}}" />
                </p>
                <button class="btn btn-info" name="submit">Edit acara</button>

            </fieldset>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </div>
</body>

</html>
