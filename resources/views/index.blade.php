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
<style>
    .new_row {
        padding: 1rem;
        border-bottom: 1px grey dashed;
    }

    .submit_row {
        margin-top: 1rem;
        text-align: center;
    }

    input[type="radio"] {
        position: absolute;
        left: -999em;
    }

    label {
        font-weight: bolder;
        font-size: 16px;
    }

    td{
        background-color: blue;
        color: white;
        font-size: 12px;
        font-weight: bolder;
        text-align: center;
    }

    td:nth-child(odd){
        background-color: #4b646f;
        color: white;
        font-size: 12px;
        font-weight: bolder;
        text-align: center;
    }

</style>

<body>

<div class="basic_info" style="text-align: center;margin:10px auto;"></div>

<div class="container">
    {{--        <form action="/api/money/add" method="POST" id="formid">--}}
    <form method="POST" id="formid">
        <div class="imp_content">
            <div class="row new_row">
                <div class="col-md-1 col-xs-1"></div>
                <div class="col-md-2 col-xs-11 title_label"><label for="num">type</label></div>
                <div class="col-md-4 col-xs-4"><label><input name="type" type="radio" value="1" checked/>
                        <div class="btn btn-danger">out</div>
                    </label></div>
                <div class="col-md-4 col-xs-4"><label><input name="type" type="radio" value="2"/>
                        <div class="btn btn-warning">in</div>
                    </label></div>
                <div class="col-md-1 col-xs-2"></div>
            </div>
            <div class="row new_row">
                <div class="col-md-1 col-xs-1"></div>
                <div class="col-md-2 col-xs-11 title_label"><label for="num">num</label></div>
                <div class="col-md-8 col-xs-8"><input type="text" name="num" id="num" class="num"></div>
                <div class="col-md-1 col-xs-1"></div>
            </div>
            <div class="row new_row">
                <div class="col-md-1 col-xs-1"></div>
                <div class="col-md-2 col-xs-11 title_label"><label for="content">content</label></div>
                <div class="col-md-8 col-xs-8"><textarea row="10" cols="20" name="content" class="content">备注</textarea>
                </div>
                <div class="col-md-1 col-xs-1"></div>
            </div>
            <div class="row submit_row">
                <div class="col-md-1 col-xs-1"></div>
                <div class="col-md-2 col-xs-11"><input type="button" class="btn btn-success submit" value="submit">
                </div>
                <div class="col-md-8 col-xs-8"></div>
                <div class="col-md-1 col-xs-1"></div>
            </div>

        </div>

    </form>
    <span class="notice_type"></span>
    {{--    <span class="notice_num"></span>--}}
    {{--    <span class="notice_content"></span>--}}

    <div class="count_info"></div>
    <table border=1  width="180" height="60">
        <tr>
            <td>张天龙</td>
            <td>陈阳</td>
            <td>许兴元</td>
            <td>邱伏奇</td>
        </tr>
        <tr>
            <td>陈子安</td>
            <td>宋贝贝</td>
            <td>历凯</td>
        </tr>
    </table>

</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "/api/basic/info",
            dataType: "json",
            type: "POST",
            success: function (response) {
                var info = '距离2021春节2-12，还有'+ response.gap_chunjie +'天</br>'
                +'距离2021元旦，还有'+ response.gap_yuandan +'天</br>';

                $('.basic_info').html(info)
            }
        });

        $.ajax({
            url: "/api/fund/getInfo",
            dataType: "json",
            type: "POST",
            success: function (response) {
                var info = '共计：' + response.data.total_money / 10000 + '万元</br>'
                    + '园区：' + response.data.sip_money / 10000 + '万元</br>'
                    + '市区：' + response.data.center_money / 10000 + '万元</br>'
                    + '本月共计消费：'+response.data.consume_money + '</br>';
                $('.count_info').html(info)
            },
            error: function () {
            }
        });
    });
    $('.container').click(function () {
        var type = $("input[type='radio']:checked").val();
        var message = '';
        if (type == 1) {
            message += '消费';
        } else if (type == 2) {
            message += '收入';
        }
        // var num=$('.num').val();
        $('.notice_type').html(message);
        // $('.notice_num').html(num);
        // $('.notice_type').html(message);
    });
    $('.submit').click(function () {
        // $('#formid').submit();
        var type = $("input[type='radio']:checked").val();
        var num = $('.num').val();
        var content = $('.content').val();
        if (!num) {
            alert('num不可以为空！')
        } else {
            $.ajax({
                url: "/api/money/add",
                dataType: "json",
                type: "POST",
                data: {type: type, num: num, content: content},
                success: function (response) {
                    alert(response.msg)
                },
                error: function () {
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('label').click(function () {
            if ($(this).children('input').is(":checked")) {
                $(this).css('background-color', '#f7edb8');
                $(this).nextAll().css('background-color', '#f8fbf9');
                $(this).prevAll().css('background-color', '#f8fbf9');
            }
        })
    })
</script>

</body>

</html>
