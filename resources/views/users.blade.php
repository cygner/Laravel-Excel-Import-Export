<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11 Import Export Excel to Database Example</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <h3 class="card-header p-3">Laravel 11 Import Export Excel to Database Example</h3>
                <div class="card-body">
                    @session('success')
                        <div class="alert alert-success" role="alert">{{ $value }}</div>
                    @endsession
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <button class="btn btn-success mt-3"><i class="fa fa-file"></i>Import User Details</button>
                    </form>
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th colspan="3">List Of Users
                                <a class="btn btn-warning float-end" href="{{ route('users.export') }}"><i class="fa fa-download"></i> Export User Data</a>
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
