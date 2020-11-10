<div class="footer basic_info text-center"></div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "/api/basic/info",
            dataType: "json",
            type: "POST",
            success: function (response) {
                var info = '距2021春节2-12，余' + response.gap_chunjie + '天&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                    + '距2021元旦，余' + response.gap_yuandan + '天</br>';

                $('.basic_info').html(info)
            }
        });
    });
</script>
</body>
</html>
