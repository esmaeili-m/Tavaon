<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>صفحه ورود</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('panel/assets')}}/images/favicon.ico" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('panel/assets')}}/css/app.min.css" rel="stylesheet">
    <link href="{{asset('panel/assets')}}/js/bundles/materialize-rtl/materialize-rtl.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('panel/assets')}}/css/style.css" rel="stylesheet" />
    <link href="{{asset('panel/assets')}}/css/pages/extra_pages.css" rel="stylesheet" />
</head>

<body class="light rtl">
{{$slot}}
<script src="{{asset('panel/assets')}}/js/app.min.js"></script>
<!-- Extra page Js -->
<script src="{{asset('panel/assets')}}/js/pages/examples/login-register.js"></script>
</body>

</html>
