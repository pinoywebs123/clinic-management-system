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
                    <li >
                      <a href="{{route('nurse_appointment')}}" ><i class="glyphicon glyphicon-time pull-right"></i> Appointment</a>
                    </li>
                    <li >
                      <a href="{{route('nurse_staff_list')}}" ><i class="glyphicon glyphicon-user pull-right"></i> Staff</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
          <div class="row">
            @if(Session::has('adm'))
              <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> {{Session::get('adm')}}
            </div>
            @endif

             @if(Session::has('cons'))
              <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> {{Session::get('cons')}}
            </div>
            @endif

            @if(Session::has('ref'))
              <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> {{Session::get('ref')}}
            </div>
            @endif

           @if($id == 1)
            <h2 class="text-center">ADMISSION FORM</h2>
            <form action="{{route('nurse_admission_check', ['id'=> $id,'user_id'=> $user_id])}}" method="POST">
            <div class="col-md-12">
              <div class="col-md-3">
                <div class="form-group">
                  <label>PULSE</label>
                  <input type="text" name="pulse" class="form-control" required="">
                </div>
              </div>
               <div class="col-md-3">
                  <div class="form-group">
                    <label>BLOOD PRESSURE</label>
                    <input type="text" name="blood_pressure" class="form-control" required="">
                  </div>
              </div>
               <div class="col-md-3">
                    <div class="form-group">
                    <label>RESPIRATION</label>
                    <input type="text" name="respiration" class="form-control" required="">
                  </div>
              </div>
               <div class="col-md-3">
                     <div class="form-group">
                    <label>TEMPERATURE</label>
                    <input type="text" name="temperature" class="form-control" required="">
                  </div>
              </div>

              <div class="form-group col-md-12">
                <label>Cause of Admission</label>
                <textarea name="cause_admission" class="form-control" required=""></textarea>
              </div>

              <div class="form-group col-md-12">
                <label>Treatment</label>
                <textarea name="treatment" class="form-control" required=""></textarea>
              </div>

              <div class="col-md-3 col-md-offset-9">
                     <div class="form-group">
                    <label>Treated By:</label>
                    <input type="text" name="treated_by" class="form-control" required="">
                    <br>
                    <button class="btn btn-primary">SUBMIT</button>
                    {{csrf_field()}}
                  </div>
              </div>

              </form>

            </div>


          @elseif($id == 2)
             <h2 class="text-center">CONSULTATION FORM</h2>
             <form action="{{route('nurse_consultation_check', ['id'=> $id,'user_id'=> $user_id])}}" method="POST">
             <div class="col-md-12">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label>PULSE</label>
                    <input type="text" name="pulse" class="form-control" required="">
                  </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                      <label>BLOOD PRESSURE</label>
                      <input type="text" name="blood_pressure" class="form-control" required="">
                    </div>
                </div>
                 <div class="col-md-3">
                      <div class="form-group">
                      <label>RESPIRATION</label>
                      <input type="text" name="respiration" class="form-control" required="">
                    </div>
                </div>

                 <div class="form-group col-md-12">
                    <label>Reason for today's consultation</label>
                    <textarea name="reason_consultation" class="form-control" required=""></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Treatment</label>
                    <textarea name="treatment" class="form-control" required=""></textarea>
                  </div>

                   <div class="col-md-3 col-md-offset-9">
                     <div class="form-group">
                    <label>Treated By:</label>
                    <input type="text" name="treated_by" class="form-control" required="">
                    <br>
                    <button class="btn btn-primary">SUBMIT</button>
                    {{csrf_field()}}
                  </div>
              </div>

             </div>
             </form>
         
          @elseif($id == 3)
            <h2 class="text-center">REFERRAL FORM</h2>
            <form action="{{route('nurse_referal_check', ['id'=> $id,'user_id'=> $user_id])}}" method="POST">
            <div class="col-md-12">
               <div class="form-group col-md-12">
                    <label>Reason for referral</label>
                    <textarea name="reason_referral" class="form-control"></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Treatment</label>
                    <textarea name="treatment" class="form-control"></textarea>
                  </div>

                   <div class="col-md-3 col-md-offset-9">
                     <div class="form-group">
                    <label>Treated By:</label>
                    <input type="text" name="treated_by" class="form-control">
                    <br>
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                    {{csrf_field()}}
                  </div>
            </div>
            </form>
          
          @endif

           


          
           
          </div>

            

        </div>
           

        </div>
       
       

    </div>

    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>

 

</body>

</html>
