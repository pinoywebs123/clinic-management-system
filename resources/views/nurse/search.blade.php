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
                            <a href="{{route('nurse_logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                      <a href="{{route('nurse_main')}}" ><i class="glyphicon glyphicon-list-alt pull-right"></i> Patient List</a>
                    </li>
                    <li>
                      <a href="{{route('nurse_appointment')}}" ><i class="glyphicon glyphicon-time pull-right"></i> Appointment</a>
                    </li>
                    <li>
                      <a href="{{route('nurse_staff_list')}}" ><i class="glyphicon glyphicon-user pull-right"></i> Staff</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
          <div class="row">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="{{route('nurse_main')}}">Patient List</a></li>
             
              <li role="presentation"><a href="{{route('nurse_new_patient')}}">New Patient</a></li>
            </ul>

            <div class="pull-right" style="margin-top: 10px;">
              <form action="{{route('nurse_search')}}" method="POST">
                <div class="form-group">
                  <input type="text" name="search" placeholder="Search Last Name">
                  <button type="submit" class="btn btn-info btn-xs">Search</button>
                  {{csrf_field()}}
                </div>
              </form>
            </div>

           
            <table class="table table-bordered">
              <thead>
                <tr>
                  
                  <th>Full Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Operation</th>
                </tr>
              </thead>

              <tbody>
                @foreach($search as $patient)
                <tr>
                  <td><a href="{{route('nurse_patient_info', ['id'=> 1])}}">{{$patient->fname}} {{$patient->lname}}</a></td>
                  <td>{{$patient->address}}</td>
                  <td>{{$patient->contact}}</td>
                  <td>
                    <a href="{{route('nurse_transaction', ['id'=> 1, 'user_id'=> $patient->id])}}" class="btn btn-danger btn-xs">Admission</a>
                    <a href="{{route('nurse_transaction', ['id'=> 2, 'user_id'=> $patient->id])}}" class="btn btn-info btn-xs">Consultation</a>
                    <a href="{{route('nurse_transaction', ['id'=> 3, 'user_id'=> $patient->id])}}" class="btn btn-primary btn-xs">Referal</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

            

        </div>
           

        </div>
       
       

    </div>

    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>

 

</body>

</html>