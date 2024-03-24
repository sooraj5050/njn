<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .sortable-icon {
            cursor: pointer;
            float:right;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{route('add')}}" class="btn btn-success">Add Item</a>
    <a href="{{route('export')}}" class="btn btn-primary">Export</a>
    <div class="container mt-5">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name <a href="#" class="sortable-icon" data-field="name"> <i style="font-size:18px" class="fa">&#xf0dc;</i></a></th>
                    <th>Email <a href="#" class="sortable-icon" data-field="name"> <i style="font-size:18px" class="fa">&#xf0dc;</i></a></th>
                    <th>Mobile<a href="#" class="sortable-icon" data-field="name"> <i style="font-size:18px" class="fa">&#xf0dc;</i></a></th>
                    <th>Password<a href="#" class="sortable-icon" data-field="name"> <i style="font-size:18px" class="fa">&#xf0dc;</i></a></th>
                    <th>Actions<a href="#" class="sortable-icon" data-field="name"> <i style="font-size:18px" class="fa">&#xf0dc;</i></a></th>

                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($users as $user) --}}
                <tr>
                    <td>Das</td>
                    <td>das@gmail.com</td>
                    <td>9878766765</td>
                    <td>dasl123</td>
                    <td>

                        <a href=""><i class="fa fa-edit" style="font-size:35px;color:blue"></i></a>
                        <a href=""><i class="material-icons" style="font-size:35px;color:red">delete</i></a>


                    </td>
                </tr>
                <tr>
                    <td>James</td>
                    <td>james@gmail.com</td>
                    <td>9878766765</td>
                    <td>james123</td>
                    <td>

                        <a href=""><i class="fa fa-edit" style="font-size:35px;color:blue"></i></a>
                        <a href=""><i class="material-icons" style="font-size:35px;color:red">delete</i></a>


                    </td>
                </tr><tr>
                    <td>sooraj</td>
                    <td>sooraj@gmail.com</td>
                    <td>9878766765</td>
                    <td>sooraj123</td>
                    <td>

                        <a href=""><i class="fa fa-edit" style="font-size:35px;color:blue"></i></a>
                        <a href=""><i class="material-icons" style="font-size:35px;color:red">delete</i></a>


                    </td>
                </tr><tr>
                    <td>Amal</td>
                    <td>amal@gmail.com</td>
                    <td>9878766765</td>
                    <td>amal123</td>
                    <td>

                        <a href=""><i class="fa fa-edit" style="font-size:35px;color:blue"></i></a>
                        <a href=""><i class="material-icons" style="font-size:35px;color:red">delete</i></a>


                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
        $('.sortable-icon').click(function(e) {
            e.preventDefault();
            let field = $(this).data('field');
            let order = $(this).hasClass('ascending') ? 'desc' : 'asc';

            if (field === 'name') {
                // Perform sorting and update the table
                sortTable(field, order);

                // Toggle the icon class for next click
                $(this).toggleClass('ascending descending');
            }
        });

        function sortTable(field, order) {
            let rows = Array.from(document.querySelector("tbody").querySelectorAll("tr"));
            let sortedRows = rows.sort((a, b) => {
                let aValue = a.querySelector("td:first-child").textContent.trim();
                let bValue = b.querySelector("td:first-child").textContent.trim();
                return order === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
            });

            let tbody = document.querySelector("tbody");
            tbody.innerHTML = '';
            sortedRows.forEach(row => tbody.appendChild(row));
        }
    });

</script>
</body>
</html>
