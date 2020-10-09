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
