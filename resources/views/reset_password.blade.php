<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {

            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row justify-content-center login-container">
            <div class="col-md-6">
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-danger">{{ session()->get('message') }}</div>
                    @endif
                    <div class="card-header">Reset password</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('do_reset_password') }}">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control"name="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"> Confirm Password</label>
                                <input type="password" class="form-control"name="cpassword"
                                    placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="button-style blue">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
