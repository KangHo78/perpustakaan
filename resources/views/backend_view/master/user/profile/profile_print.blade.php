<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>Print Profile</title>
    <!-- Stylesheets -->
    <style>
        html,
        body {
            font-family: sans-serif;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
        }

        .card {
            width: 470px;
            height: 250px;
            background-color: #fff;
            background: #f8f8f8;
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
            width: 200px;
            height: 100%;
            background: #dE685E;
            overflow: hidden;
            width: 100%;
        }

        .card .additional .user-card {
            width: 200px;
            height: 100%;
            position: relative;
            float: left;
        }

        .card .additional .user-card::after {
            content: "";
            display: block;
            position: absolute;
            right: -2px;
            height: 80%;
            border-left: 2px solid rgba(0, 0, 0, 0.025);
        }

        .card .additional .user-card .level,
        .card .additional .user-card .points {
            top: 5%;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.75em;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.15);
            padding: 0.125rem 0.75rem;
            border-radius: 50%;
            white-space: nowrap;
        }

        .card .additional .user-card .image {
            padding: 0.125rem 0.75rem;
            width: 100px;
            height: 100px;
            top: 14%;
            border-radius: 50%;
        }

        .card .additional .user-card .points {
            top: 22%;
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

        .card .additional .coords {
            margin: 1rem;
            color: #fff;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="additional">
            <div class="user-card">
                <div class="level center">
                    {{ Auth::user()->hak_akses->mp_name }}
                </div>
                <img class="center image" src="{{ public_path("storage/user/".Auth::user()->photo)}}">
                <div class="points center">
                    {{ Auth::user()->kode }}
                </div>
            </div>
            <div class="more-info">
                <h1>{{ Auth::user()->registration_kode }}</h1>
                <div class="coords">
                    Username : {{ Auth::user()->username }}
                </div>
                <div class="coords">
                    Name : {{ Auth::user()->name }}
                </div>
                <div class="coords">
                    Address : {{ Auth::user()->address }}
                </div>
                <div class="coords">
                    Telepon : {{ Auth::user()->tlp }}
                </div>
                @if (Auth::user()->previleges != '1')
                <div class="coords">
                    Valid Until : {{ date("d-m-Y", strtotime(Auth::user()->updated_at))}}
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>