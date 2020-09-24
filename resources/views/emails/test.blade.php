<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{{ URL::asset('/') }}/lib/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('/') }}/lib/bootstrap-3.3.7/css/bootstrap.min.css">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
</head>
<body>
<div class="flex-center position-ref full-height">
    {{$name}}
    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;劳累了一天，您辛苦了！</div>
    <div>下面是您这一个月的数据报表，请您悉知，加油！</div>
    <div class="basic_info">上线金额：{{$total_online}}元</div>
    <div class="basic_info">未上线金额：{{$total_no_online}}元</div>
    <pre>
      从前的日色
        变得慢
      车 马 邮件
         都慢
    一生只够爱一个人
</pre>
</div>
</body>
</html>
