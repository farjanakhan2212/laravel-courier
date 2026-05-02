<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Center the whole container in the screen */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            margin: 0;

            /* Centering */
            display: flex;
            justify-content: center;
            align-items: center;

            background-image: url("/Projects/Laravel/Courier/public/dist/img/delivery2.jpg");
            background-size: cover;

        
        }

        /* Stack form + link vertically */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Style the login form */
        form {
            background-color:transparent;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 300px;
            margin-bottom: 15px;
        }

        form div {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #09661dff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0c6b2cff;
        }

        a {
            text-align: center;
            text-decoration: none;
            color: #0763c6;
            font-size: 17px;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            font-size: 13px;
            margin: 0;
            padding-top: 5px;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div>
                User<br>
                <input type="text" name="email" placeholder="Email" required />
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                Password<br>
                <input type="password" name="password" placeholder="Password" required />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="submit" name="login" value="Login" />
            </div>
        </form>

        <!-- Register link BELOW form -->
        <a href="{{ url('/register') }}">Don't have an account? Register</a>
    </div>

</body>
</html>
