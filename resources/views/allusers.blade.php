<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <h1>All users data</h1>
                <a href="/newuser" class="btn btn-success btn-sm mb-3"><i class="fa-solid fa-plus"></i></a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>View</th>
                        <th>update</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($data as $id => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->city }}</td>
                            <td><a href="{{ route('view.user', $user->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-eye"></i></a></td>
                            <td><a href="{{ route('update.page', $user->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-pen"></i></a></td>
                            <td><a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </table>
                <div class="container d-flex justify-content-between">
                    <div class="mt-2">
                        <a href="{{ route('delete.all') }}" class="btn btn-danger btn-sm">Delete All</a>
                    </div>
                    
                    <div class="mt-2">
                        Total Users: {{$data->total()}}
                        {{-- | Current Page: {{$data->currentPage()}} --}}
                    </div>
                    <div class="mt-2">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
