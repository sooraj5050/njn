<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .sidebar {
            background-color: grey;
            padding: 15px;
            border-radius: 5px;
            height: 700px;
            /* Set your desired height here */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="navbar navbar-expand bg-light">
                <ul class="navbar-link">
                    <li>Admin</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <a>Home</a>
                <a>Product</a>
                <a>contact</a>

            </div>
        </div>
        <div class="col-md-9">
         @yield('content')
        </div>
    </div>


</body>

</html>
