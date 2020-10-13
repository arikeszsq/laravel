<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="{{ URL::asset('/') }}/lib/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('/') }}/lib/bootstrap-3.3.7/css/bootstrap.min.css">
    <script src=""></script>
    <title>Document</title>
</head>
<body>
<div class="basic_info" style="text-align: center;margin:10px auto;"></div>
<style>
    .form_div {
        margin-left: 20px;
    }
    .form_group{
        margin-top: 20px;
    }
</style>
<div class="form_div">
    <form method="post" action="/api/pic/upload" enctype="multipart/form-data">
        <div class="form_group">
            <label>Title</label>
            <input name="title" type="text">
        </div>
        <div class="form_group">
            <label>类型</label>
            <input name="type" type="text">
        </div>
        <div class="form_group">
            <label>封面</label>
            <input name='cover' type="file">
        </div>
        <div class="form_group">
            <label>图片列表</label>
            <input name='uploads[]' type="file" multiple>
        </div>
        <div class="form_group">
            <input type="submit" value="上传" class="btn btn-success">
        </div>
    </form>
</div>

{{--<form action="/api/pic/upload" method="post" enctype="multipart/form-data">--}}
{{--    <label for="file">文件名：</label>--}}
{{--    <input type="file" name="file" id="file"><br>--}}
{{--    <input type="submit" name="submit" value="提交">--}}
{{--</form>--}}

<script>
    $(document).ready(function () {
        $.ajax({
            url: "/api/basic/info",
            dataType: "json",
            type: "POST",
            success: function (response) {
                var info = '距离2021春节2-12，还有' + response.gap_chunjie + '天</br>'
                    + '距离2021元旦，还有' + response.gap_yuandan + '天</br>';

                $('.basic_info').html(info)
            }
        });
    });
</script>

</body>

</html>
