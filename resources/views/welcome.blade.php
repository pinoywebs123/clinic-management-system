<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Tanjay City Urgent Care Clinic">
    <meta name="author" content="Dexon and Clifford">

    <title>Tanjay City Urgent Care Clinic</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
   
 

    <style type="text/css">
      body{
        background: url('{{URL::to("/images/1.jpg")}}') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      .input-group {
        margin-bottom: 10px;
      }
      .well{
        border-radius: 20px;
        margin-top: 10%;
        border-top-left-radius: 80px;
        border-top-right-radius: 80px;
      }
     
    </style>

</head>

<body>

    <div class="col-md-4 col-md-offset-4 well">
      <p class="text-center">
        <img src="{{URL::to('images/logo.png')}}" width="120px">
      </p>
      <h2 class="text-center">Clinic Login</h2>
      <form action="{{route('login_check')}}" method="POST">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          {{csrf_field()}}
        </div>
      </form>
    </div>
       
       

</body>

    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>

  <script type="text/javascript">
    @if(Session::has('err'))
    swal("Sorry!", "You have enter invalid username and password", "error");

    @endif
  </script>

</body>

</html>
