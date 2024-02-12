<nav style="background: #1894EC;" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h1 style="color:#ffffff;">Siser</h1>
            <h6 style="color:#ffffff;">Sistem Informasi Sertifikat Elektronik</h6>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="color:#ffffff;" href="/dashboard">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#ffffff;" href="/event">Events</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color:#ffffff;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More Information
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/certificate">Certificates</a>
                        <a class="dropdown-item" href="/events_history/{{session('id')}}">Your Events History</a>
                        @if(session('role') == "admin" OR session('role') == "host" OR session('role') == "member")
                        <a class="dropdown-item" href="/create_certificate">Create Certificates</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/create_event">Create Events</a>
                        <a class="dropdown-item" href="/your_events/{{session('id')}}">Your Events</a>
                        @else
                        @endif
                        @if(session('role') == "admin")
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/log_activity">Log Activity</a>
                        <a class="dropdown-item" href="/users_confirmation">Users Confirmation</a>
                        <a class="dropdown-item" href="/events_confirmation">Events Confirmation</a>
                        @else

                        @endif
                        <a class="dropdown-item" href="/aboutus">About Us</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/your_comment/{{session('id')}}">Your Comment</a>
                    </div>
                </li>
            </ul>
            <form class="d-flex">
                <p>
                    <i style="color:#ffffff;" class="far fa-bell  fa-1x"></i>
                    <i style="color:#ffffff; margin: 0rem 1rem;" class="far fa-user  fa-1x"></i>
                </p>
                <div class="dropdown">
                    <p style="color:#ffffff;" class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{session('username')}}
                    </p>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/profile/{{session('id')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                    </ul>
                </div>
            </form>
        </div>

    </div>
</nav>