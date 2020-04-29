<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body{
            font-family: 'Raleway', sans-serif;
            background: #000;
        }

        .background{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 3%, rgba(124,15,47,1) 12%, rgba(43,71,77,1) 27%, rgba(9,12,43,1) 37%, rgba(58,75,80,1) 50%, rgba(41,5,5,1) 86%);
            background-size: cover;
            height: 100vh;
            display: flex;
        }

        .text{
            margin-top: 45vh;
            flex: 1;
        }

        .box{
            margin-top: 33vh;
            flex: 1;
        }

        .text{
            margin-left: 10%;
            font-weight: 300;
        }

        .box{
            margin-left: 25%;
        }

        .text h1{
            font-size: 70px;
            color: #fff;
            font-weight: 500;
        }

        .text p{
            font-size: 20px;
            color: #fff;
            font-weight: 300;
        }

        .text p a{
            color: #fff;
            font-weight: 700;
        }

        .form{
            background: transparent;
            color: #fff;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            width: 250px;
        }

        input{
            margin: 20px 0;
            padding: 10px;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-family: 'Raleway', sans-serif;
        }

        .email, .password, .name, .confpassword {
            border-bottom: 1px solid #fff;
        }

        .button{
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            font-size: 18px;
        }

        .button:hover{
            background: #fff;
            color: #000;
        }
    </style>
</head>
<body>
<main>
    <div class="background">
        <div class="text">
            <h1>SignUp</h1>
            <p>Have Account?  <a href="{{url('login')}}">Login</a></p>
        </div>
        <div class="box">
            <form class="form" action="post-registration" method="POST">
                {{ csrf_field() }}
                <input type="text" class="name" id="name" name="name" placeholder="Full Name" >
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
                <input type="email" class="email" id="email" name="email" placeholder="example@example.com" >
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
                <input type="password" class="password" id="password" name="password" placeholder="Password" >
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
                <input type="password" class="confpassword" id="confpassword" name="confpassword" placeholder="Confirm Password" >
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
                <input type="submit" class="button" value="SignUp">
            </form>
        </div>
    </div>
</main>
</body>
</html>
