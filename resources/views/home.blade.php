<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
/* start Ascending and descending order */

.icon-container {
    display: inline-block;
    position: relative;
  }

  .icon-container:hover .hover-shade {
    display: block;
  }

  .hover-shade {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    display: none;
  }

  .rotate-down {
    transform:scaleY(-1);
    transition: transform 0.3s ease;
  }

  /*End  Ascending and descending order */

  .pencil-icon {
        color: black;
        transition: color 0.3s;
    }

    #blue_icon:hover
    {
    color:blue
    }
    .fas.fa-trash:hover
    {
    color:red;
    }
   </style>
</head>
<body>


<div class="container">

    <button class="" style="border-radius: 15px;background:green;color:white; transition: filter 0.3s;text-decoration: none;" onmouseover="this.style.filter='brightness(200%)'" onmouseout="this.style.filter='brightness(100%)'"><a href="{{ route('add') }}" class="" style="color: inherit; text-decoration: none;">Add Item</a></button>
   <button class="" style="border-radius: 15px;background:green;color:white; transition: filter 0.3s;" onmouseover="this.style.filter='brightness(200%)'" onmouseout="this.style.filter='brightness(100%)'">    <a href="{{ route('export') }}"style="color: inherit; text-decoration: none;"> Excel Export</a>
    </button>
    <a class="btn btn-success" href="{{ route('pdf_export') }}">Pdf Export</a>
    <a class="btn btn-success" href="{{ route('import') }}">Excel import</a>

<button class="btn btn-success"><a href="{{ route('add1') }}" >Add_second_database</a></button>
    <div class="container mt-5">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                       <th>Name <a href="#" class="sortable-icon" data-field="name">
                        <div class="icon-container">
                            <svg id="icon" width="18px" height="18px" viewBox="0 0 48 48" focusable="false" fill="currentColor" class="a-s-fa-Ha-pa c-qd">
                              <path fill="none" d="M0 0h48v48H0V0z"></path>
                              <path d="M8 24l2.83 2.83L22 15.66V40h4V15.66l11.17 11.17L40 24 24 8 8 24z"></path>
                            </svg>
                            <div class="hover-shade"></div>
                          </div>
                    </a></th>
                    <th>Email <a href="#" class="sortable-icon" data-field="name">

                    </a></th>
                    <th>Mobile<a href="#" class="sortable-icon" data-field="name">

                    </a></th>

                    <th>Actions<a href="#" class="sortable-icon" data-field="name">

                    </a></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>
                       <a data-bs-toggle="modal" data-bs-target="#editModal" class="edit_function" data-id="{{ $user->id }}"  >
                        <i class="fas fa-pencil-alt" id="blue_icon" style="color: black;"></i>

                       </a>
                 <a data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" onclick="delete_function(this)">
                        <i class='fas fa-trash'></i>
                </a>

                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal"id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('update') }}">
                    @csrf
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="ename" id="ename" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="eemail" id="eemail"class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="emobile" id="emobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="epassword" id="epassword" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="button-style blue">Update</button>

                <button type="button" data-bs-dismiss="modal" class="button-style red">Cancel</button>

            </div>
            </form>
        </div>
    </div>

    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <span id="delete_name"></span></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('delete') }}">
                        @csrf
                        <input type="hidden" id="delete_id" name="id">
                        <h3>Are you sure?</h3>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="button-style red">Delete</button>
                    <button class="button-style blue" data-bs-dismiss="modal">Cancel</button>

                </div>
                </form>
            </div>
        </div>

    </div>


    <div class="sample">
        <button class="button-style orange">Orange</button>
        <button class="button-style green">Green</button>
        <button class="button-style red">Red</button>
        <button class="button-style blue">Blue</button>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // function edit_function(param) {
        //     var id = $(param).data('id');
        //     $.ajax({

        //         type: 'GET',
        //         url: 'edit' + '/' + id,

        //         success: function(response) {

        //             $('#edit_id').val(response.result.id);
        //             $('#ename').val(response.result.name);
        //             $('#eemail').val(response.result.email);
        //             $('#emobile').val(response.result.mobile);
        //             $('#epassword').val(response.result.password);

        //         }

        //    })
        //   }


        $(document).ready(function() {
            $('.edit_function').click(function() {

                var id = $(this).data('id');
                $.ajax({

                    type: 'GET',
                    url: 'edit' + '/' + id,

                    success: function(response) {
                        $('#edit_id').val(response.result.id);
                        $('#ename').val(response.result.name);
                        $('#eemail').val(response.result.email);
                        $('#emobile').val(response.result.mobile);
                        $('#epassword').val(response.result.password);
                    }

                })

            });

        })
    </script>

    <script>
        function delete_function(param) {
            var id = $(param).data('id');
            var name = $(param).data('name');

            $('#delete_id').val(id);
            $('#delete_name').html(name);
        }
    </script>

    {{-- Start Ascending and descending order script --}}
    <script>
        $(document).ready(function() {
            $('.sortable-icon').click(function(e) {
                e.preventDefault();
                let field = $(this).data('field');
                let order = $(this).hasClass('ascending') ? 'desc' : 'asc';
                $('.sortable-icon').removeClass('ascending descending rotate');
                $(this).addClass(order === 'asc' ? 'ascending' : 'descending rotate');

                if (field === 'name') {
                    sortTable(field, order);
                }
            });
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
    </script>
    {{-- End Ascending and descending order script --}}


    {{-- Start  Rotating arrow script --}}
    <script>
        const icon = document.getElementById('icon');
        const iconContainer = document.querySelector('.icon-container');

        iconContainer.addEventListener('click', function() {
            icon.classList.toggle('rotate-down');
        });
    </script>
    {{-- End Rotating arrow script --}}



    </body>

</html>
