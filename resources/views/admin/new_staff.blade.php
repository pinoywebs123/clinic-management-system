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

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

 

<style type="text/css">
    #txt{
        font-size: 48px;
    }
    .navbar {
     background: #34495e !important;
   }
   #sides ul {
    background: #2c3e50 !important;
    
   }
   #sides ul li a{
    color: #fff !important;
   }
   
   span{
    font-size: 40px;
   }

  .dropdown a{
    color: #2980b9 !important;
  }

   body {
    background-color: #fff !important;
   }
   .navbar-brand{
    color: #fff !important;
   }

  
  .badge{
    background-color: #e74c3c;
  }

  #logoPic img{
    margin-bottom: 10px;
  }
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
                <a class="navbar-brand" href="#">Tanjay City Urgent Care Clinic</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{Auth::user()->fname}} {{Auth::user()->lname}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                       
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin_logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                      <a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-list-alt pull-right"></i> Staff List</a>
                    </li>
                   
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
          <div class="row">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="{{route('admin_main')}}"> List</a></li>
             
              <li role="presentation" class="active"><a href="{{route('admin_new_staff')}}">New Staff</a></li>
            </ul>


           
           <h2 class="text-center">New Staff</h2>

           <div class="col-md-12">
            @if(Session::has('suc'))
              <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> {{Session::get('suc')}}
            </div>
            @endif
            
            <form action="{{route('admin_new_staff_check')}}" method="POST">
             <div class="col-md-6">

               <div class="form-group">
                 <label>First Name</label>
                 <input type="text" name="fname" class="form-control" required="">
               </div>
               <div class="form-group">
                 <label>Last Name</label>
                 <input type="text" name="lname" class="form-control" required="">
               </div>

               <div class="form-group">
                 <label>Date of Birth</label>
                 <input type="date" name="dob" class="form-control" required="">
               </div>

             </div>
             <div class="col-md-6">
               
               <div class="form-group">
                 <label>Contact</label>
                 <input type="text" name="contact" class="form-control" required="">
               </div>

               <div class="form-group">
                 <label>Username</label>
                 <input type="text" name="username" class="form-control" required="">
               </div>

               <div class="form-group">
                 <label>Password</label>
                 <input type="text" name="password" class="form-control" required="">
               </div>



             </div>

             <div class="col-md-6">
               <button type="submit" class="btn btn-primary">SUBMIT</button>
               {{csrf_field()}}
             </div>

             </form>

           </div>
          </div>

            

        </div>
           

        </div>
       
       

    </div>

    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>

 

</body>

</html>
