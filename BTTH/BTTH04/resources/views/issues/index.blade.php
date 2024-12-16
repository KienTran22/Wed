<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 CRUD with Upload Image Search and Pagination | Cairocoders</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
 
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Laravel CRUD Pagination</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <form method="GET" action="/products/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Searh..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
                <a href="{{ route('issues.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Products</h3>
                    </div>
 
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Mã vấn đề</th>
                                <th>Tên máy tính</th>
                                <th>Tên phiên bản</th>
                                <th>Người báo cáo sự cố</th>
                                <th>Thời gian báo cáo</th>
                                <th>Mức độ sự cố</th>
                                <th>Trạng thái hiện tại</th>
                            </tr>
                            @if ($issues->isNotEmpty())
                            @foreach ($issues as $issue)
                            <tr>
                                <td>{{ $issue->id }}</td>
                                <td>{{ $issue->computer->computer_name }}</td>
                                <td>{{ $issue->computer->operating_system }}</td>
                                <td>{{ $issue->reported_by }}</td>
                                <td>{{ $issue->reported_date }}</td>
                                <td>{{ $issue->urgency }}</td>
                                <td>{{ $issue->status }}</td>
                                <td>
                                    <a href="{{ route('issues.edit', $issue->id) }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							        <a href="#" onclick="deleteProduct({{ $issue->id }});"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    <form id="delete-product-from-{{ $issue->id }}" action="{{ route('issues.destroy', $issue->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
 
                            @endif
 
                        </table>
 
                        {!! $issues->withQueryString()->links('pagination::bootstrap-5') !!}

                    </div>
 
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete product?")) {
                document.getElementById("delete-product-from-" + id).submit();
            }
        }
    </script>
</body>
 
</html>