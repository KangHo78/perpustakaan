<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Profile</title>
    <meta charset="UTF-8">
    <!-- Stylesheets -->
    <style>
        /* @import url('//fonts.googleapis.com/css?family=Abel'); */

        html,
        body {
            font-family: Abel, Arial, Verdana, sans-serif;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
        }

        .card {
            width: 450px;
            height: 250px;
            background-color: #fff;
            background: linear-gradient(#f8f8f8, #fff);
            box-shadow: 0 8px 16px -8px rgba(0, 0, 0, 0.4);
            border-radius: 6px;
            overflow: hidden;
            position: relative;
            margin: 1.5rem;
        }

        .card h1 {
            text-align: center;
        }

        .card .additional {
            position: absolute;
            width: 150px;
            height: 100%;
            background: linear-gradient(#dE685E, #EE786E);
            transition: width 0.4s;
            overflow: hidden;
            width: 100%;
            border-radius: 0 5px 5px 0;
        }

        .card .additional .user-card {
            width: 150px;
            height: 100%;
            position: relative;
            float: left;
        }

        .card .additional .user-card::after {
            content: "";
            display: block;
            position: absolute;
            top: 10%;
            right: -2px;
            height: 80%;
            border-left: 2px solid rgba(0, 0, 0, 0.025);
            */
        }

        .card .additional .user-card .level,
        .card .additional .user-card .points {
            top: 15%;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.75em;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.15);
            padding: 0.125rem 0.75rem;
            border-radius: 100px;
            white-space: nowrap;
        }

        .card .additional .user-card .points {
            top: 85%;
        }

        .card .additional .user-card svg {
            top: 50%;
        }

        .card .additional .more-info {
            width: 300px;
            float: left;
            position: absolute;
            left: 150px;
            height: 100%;
        }

        .card .additional .more-info h1 {
            color: #fff;
            margin-bottom: 0;
        }

        .card.green .additional .more-info h1 {
            color: #224C36;
        }

        .card .additional .coords {
            margin: 1rem;
            color: #fff;
            font-size: 1rem;
        }

        .card.green .additional .coords {
            color: #325C46;
        }

        .card .additional .coords span+span {
            float: right;
        }

        .card .additional .stats {
            font-size: 2rem;
            display: flex;
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            right: 1rem;
            top: auto;
            color: #fff;
        }

        .card.green .additional .stats {
            color: #325C46;
        }

        .card .additional .stats>div {
            flex: 1;
            text-align: center;
        }

        .card .additional .stats i {
            display: block;
        }

        .card .additional .stats div.title {
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card .additional .stats div.value {
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1.5rem;
        }

        .card .additional .stats div.value.infinity {
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="center">

        <div class="card">
            <div class="additional">
                <div class="user-card">
                    <div class="level center">
                        @if(Auth::user()->previleges == '3')
                        Mahasiswa
                        @elseif(Auth::user()->previleges == '2')
                        Dosen
                        @else
                        Administrator
                        @endif
                    </div>
                    <div class="points center">
                        {{ Auth::user()->kode }}
                    </div>
                    <img width="110" height="110" class="center" src="{{ asset(Auth::user()->photo) }}">
                </div>
                <div class="more-info">
                    <h1>{{ Auth::user()->name }}</h1>
                    <div class="coords">
                        <span>Username</span>
                        <span>{{ Auth::user()->username }}</span>
                    </div>
                    <div class="coords">
                        <span>Address</span>
                        <span>{{ Auth::user()->address }}</span>
                    </div>
                    <div class="coords">
                        <span>Telepon</span>
                        <span>{{ Auth::user()->tlp }}</span>
                    </div>
                    <div class="coords">
                        <span>Valid Until</span>
                        <span>City, Country</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>