<<!DOCTYPE html>
<html>
<head>
	<title>edit user info</title>
	
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->

</head>

<body>
<form method="post" action="/editqry" style="width:45%;">
<input type="hidden" name="_token" value="{{csrf_token()}}">
@foreach($res as $value)
<input type="hidden" name="id" value="{{$value->id}}">
<label>Subject</label>
<input type="text" name="subject" class="form-control" value="{{$value->subject}}"><br>
<label>Internal1</label>
<input type="text" name="internal1" class="form-control" value="{{$value->internal1}}"><br>
<label>Internal2</label>
<input type="text" name="internal2" class="form-control" value="{{$value->internal2}}"><br>
@endforeach
<input type="submit" name="add" class="btn btn-info" value="Insert">
	
</form>

</body>
</html>