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
                    @if (session()->has('message1'))
                        <div class="alert alert-success">{{ session()->get('message1') }}</div>
                    @endif
                    <div class="card-header">Enter your mail</div>
                    <div class="card-body">
                        <form method="post" action="{{route('do_forgot_password')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email">
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
