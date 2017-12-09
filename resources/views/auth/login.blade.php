
<!-- <div class="container"> -->
<!--     <div class="row"> -->
<!--         <div class="col-md-8 col-md-offset-2"> -->
<!--             <div class="panel panel-default"> -->
<!--                 <div class="panel-heading">Login</div> -->

<!--                 <div class="panel-body"> -->
<!--                     <form class="form-horizontal" method="POST" action="{{ route('login') }}"> -->
<!--                         {{ csrf_field() }} -->

<!--                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> -->
<!--                             <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

<!--                             <div class="col-md-6"> -->
<!--                                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->

<!--                                 @if ($errors->has('email')) -->
<!--                                     <span class="help-block"> -->
<!--                                         <strong>{{ $errors->first('email') }}</strong> -->
<!--                                     </span> -->
<!--                                 @endif -->
<!--                             </div> -->
<!--                         </div> -->

<!--                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> -->
<!--                             <label for="password" class="col-md-4 control-label">Password</label> -->

<!--                             <div class="col-md-6"> -->
<!--                                 <input id="password" type="password" class="form-control" name="password" required> -->

<!--                                 @if ($errors->has('password')) -->
<!--                                     <span class="help-block"> -->
<!--                                         <strong>{{ $errors->first('password') }}</strong> -->
<!--                                     </span> -->
<!--                                 @endif -->
<!--                             </div> -->
<!--                         </div> -->

<!--                         <div class="form-group"> -->
<!--                             <div class="col-md-6 col-md-offset-4"> -->
<!--                                 <div class="checkbox"> -->
<!--                                     <label> -->
<!--                                         <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me -->
<!--                                     </label> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                         </div> -->

<!--                         <div class="form-group"> -->
<!--                             <div class="col-md-8 col-md-offset-4"> -->
<!--                                 <button type="submit" class="btn btn-primary"> -->
<!--                                     Login -->
<!--                                 </button> -->

<!--                                 <a class="btn btn-link" href="{{ route('password.request') }}"> -->
<!--                                     Forgot Your Password? -->
<!--                                 </a> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </form> -->
<!--                 </div> -->
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
<!-- </div> -->




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تسجيل الدخول</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تسجيل الدخول</h3>
                    </div>
                    <div class="panel-body">
                   		    <form  method="POST" action="{{ route('login') }}">
                    
<!--                         <form role="form" action="LoginVerify" method="post" > -->
								<fieldset>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input class="form-control" placeholder="اسم المستخدم" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="كلمة المرور" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">تذكرني
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
<!--                                 <a href="index.html" class="btn btn-lg btn-success btn-block">تسجيل الدخول</a> -->
                            
                            		<input type="submit" value="تسجيل الدخول" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                         </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
