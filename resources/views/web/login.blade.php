<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login - Your Website</title>

    <!-- Google Font Link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- jQuery (Required for AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- Custom CSS -->
    <style>
        /* General Body Style */
        body {
            font-family: 'Roboto', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #ffffff;
            width: 100%;
            /* max-width: 400px; */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
            color: #555;
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 0;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #f28123;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #F28123;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #D56F1E;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            text-decoration: none;
            color: #F28123;
            font-size: 14px;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Error or Success Message */
        .message {
            text-align: center;
            padding: 10px;
            margin-top: 10px;
        }

        .message.success {
            background-color: #4CAF50;
            color: white;
        }

        .message.error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-8 col-12">
                    <div class="register-container">
                        <h2>Login</h2>

                        <a href="{{route('web.home.index')}}" class="image-link">
                            <img src="{{ asset('web/img/logo.png')}}" alt="Logo or Image">
                        </a>

                        <!-- Register Form -->
                        <form class="row" action="{{ route('web.doLogin') }}" method="POST" enctype="multipart/form-data"  >
                            @csrf
                            <!-- Name Input -->
                            {{-- <div class="row"> --}}


                            <!-- Email Input -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Address Input -->


                            <!-- Phone Input -->


                             <!-- Phone Input -->
                             <div class="col-12">
                                <label for="Password">Password</label>
                                <input type="password" id="Password" name="password" class="form-control"  required>
                            </div>





                            <!-- Submit Button -->
                            <div class="col-12 pt-3">
                                <button type="submit" class="btn-submit">login</button>
                            </div>
                        {{-- </div> --}}
                        </form>
                        <div class="form-footer">
                            <p>Already have an account? <a href="{{ route('web.register') }}">Register here</a></p>
                        </div>

                        <!-- Error or Success Message -->
                        <div id="response-message" class="message" style="display:none;"></div>
                    </div>
                </div>
                <div class="col-md-2 col-12"></div>
            </div>
        </div>

    </div>





</body>
</html>