<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<table class="table table-dark">
<tr>
<th>Sl.No</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>


</tr>

@foreach ($users as $user)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->mobile}}</td>
</tr>
@endforeach

</table>
</body>
</html>
