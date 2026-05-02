<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;

             background-image: url("/Projects/Laravel/Courier/public/dist/img/delivery1.jpg");
            background-size: cover;
        }

        form {
            background-color: transparent;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 350px;
        }

        form div {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        ul {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
            color: red;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<form method="POST" action="{{ url('/register') }}">
    @csrf
    <div>
        Full Name<br>
        <input type="text" name="name" placeholder="Full Name" required>
    </div>
    <div>
        Email<br>
        <input type="email" name="email" placeholder="Email" required>
    </div>
    <div>
        Password<br>
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <div>
        Retype Password<br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    </div>
    <div>
        <button type="submit">Register</button>   

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</form>

</body>
</html>
