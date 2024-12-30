<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Login Page
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .container-fluid {
            height: 100%;
        }
        .row {
            height: 100%;
        }
        .left-side {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .right-side {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-form {
            max-width: 400px;
            width: 100%;
        }
        .login-form h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .login-form p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
            height: 45px;
        }
        .btn-primary {
            width: 100%;
            height: 45px;
            font-size: 16px;
        }
        .forgot-password {
            text-align: right;
            font-size: 14px;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
  </style>
 </head>
 <body>
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-6 left-side">
     <img alt="Illustration of a cashier smiling and waving at a customer in a store" height="800" src="https://storage.googleapis.com/a1aa/image/dzvaYGIgn0KqP9zBAsQADTqwa2ACQXTw16L3Ft2M9JKVy8fJA.jpg" width="600"/>
    </div>
    <div class="col-md-6 right-side">
     <div class="login-form">
      <h2>
       Masuk Admin
      </h2>
      <p>
       Masuk sebagai admin untuk melanjutkan
      </p>
      <form action="{{ route('login') }}" method="POST">
       @csrf
       <div class="mb-3">
        <label class="form-label" for="username">
         Nama Pengguna
        </label>
        <input class="form-control" id="username" name="username" placeholder="Nama Pengguna" type="text" required/>
       </div>
       <div class="mb-3">
        <label class="form-label" for="password">
         Kata Sandi
        </label>
        <input class="form-control" id="password" name="password" placeholder="Kata Sandi" type="password" required/>
       </div>
       <input type="hidden" name="role" value="admin">
       <div class="forgot-password">
        <a href="#">
         Lupa kata sandi ? Ubah
        </a>
       </div>
       <button class="btn btn-primary" type="submit">
        Masuk
       </button>
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
