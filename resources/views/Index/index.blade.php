@include('common.header',['title'=>'主页'])
<script type="text/javascript" src="{{ asset('js/echarts.js') }}"></script>
<div id="contain" style="width: 100%;height:600px;"></div>

<div id="weight_form" class="text-center">
    <form action="/add" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <p>值: <input type="text" name="int"/></p>
        <input type="submit" value="Submit"/>
    </form>
</div>

<script type="text/javascript">
    var names = [];
    var ttls = [];

    function getData() {
        $.post("{{ url('/getData') }}", {
            "_token": "{{ csrf_token() }}"
        }, function (data) {
            $.each(data, function (i, item) {
                names.push(item.update_date);
                ttls.push(item.space_size);
            });
        });
    }

    getData();

    function chart() {
        var myChart = echarts.init(document.getElementById("contain"));
        option = {
            title: {
                text: 'O域数据最近7天更新情况'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['数据大小']
            },
            toolbox: {
                show: true,
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            calculable: true,
            xAxis: [
                {
                    axisLine: {
                        lineStyle: {color: '#333'}
                    },
                    type: 'category',
                    boundaryGap: false,
                    data: names    // x的数据，为上个方法中得到的names
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    min: 68,
                    axisLabel: {
                        formatter: '{value} kg'
                    },
                    axisLine: {
                        lineStyle: {color: '#333'}
                    }
                }
            ],
            series: [
                {
                    name: '数据大小',
                    type: 'line',
                    smooth: 0.1,
                    data: ttls   // y轴的数据，由上个方法中得到的ttls
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    }

    setTimeout('chart()', 1000);
</script>

@include('common.footer')



