<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>

    <div class="position-absolute top-50 start-50 p-5 translate-middle border rounded-2">
        <p class="h3 mb-4">Login </p>
            <form action="{{ url("/") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" @error('username') is-invalid @enderror autofocus required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" @error('password') is-invalid @enderror required>
                </div>
                <p>Belum Registrasi ? <a href="{{ url("/register") }}">Silahkan Klik Disini</a></p>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
    </div>

</body>
</html>
