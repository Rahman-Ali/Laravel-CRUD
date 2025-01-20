<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDetail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <style>
        body{
            background-color: white;
            
        }
        .custom-size {
            width: 500px;
            height: 350px;
            /* background-color: white; */
            background-image: url('/general-profile1.png');
            background-size:cover;
            background-repeat: no-repeat;
            
            border-top: 5px solid orange;
            padding: 30px 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
        }
        h3{
            color: white;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row">
            <div class="col-12 rounded custom-size">
                <center>
                    <h1 style="color: orange">USER DETAIL</h1>
                </center>
                @foreach ($data as $id => $user)
                    <h3 >Name: {{$user->name}}</h3>
                    <h3 >Email: {{$user->email}}</h3>
                    <h3 >Age: {{$user->age}}</h3>
                    <h3 >City: {{$user->city}}</h3>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
