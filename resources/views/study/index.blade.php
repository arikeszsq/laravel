@include('common.header',['title'=>'人生三学:学而无厌,学无止境,学以致用'])
@include('common.leader')
<style>
    .category .list_div {
        margin-top: 2px;
        z-index: 1;
        height: 250px;

        background-size: contain;
        text-align: center;
        position: relative;
    }

    .category .inner {
        position: absolute;
        margin: 0 auto;
        text-align: center;
        left: 42%;
        bottom: 10px;
    }

    .category .content {
        color: #b2dba1;
        font-size: 20px;
        margin-top: 100px;
    }

</style>
<div class="row category">
    @foreach($categorys as $category)
        <div class="col-lg-3 col-md-4 col-xs-12 list_div" style="background: url({{$category['img']}})no-repeat center;">
        <p class="content">
            {{$category['content']??''}}
        </p>
        <p class="inner">
            <a class="btn btn-primary" href="/study/list?id={{ intval($category['id'])}}">{{$category['title']??''}}</a>
        </p>
</div>
@endforeach
</div>


{{--@include('common.header',['title'=>'主页'])--}}
{{--<div class="container">--}}
{{--    @include('common.leader')--}}
{{--    --}}{{--    @include('common.banner')--}}

{{--    <div class="row">--}}
{{--        <div class="span12">--}}
{{--            @foreach($categorys as $category)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="thumbnail" style="min-height: 280px;">--}}
{{--                                                <img alt="300x200" src="/imgs/people.jpg"/>--}}
{{--                        <div class="caption">--}}
{{--                            <h3>--}}
{{--                                {{$category['title']??''}}--}}
{{--                            </h3>--}}
{{--                            <p>--}}
{{--                                {{$category['content']??''}}--}}
{{--                            </p>--}}
{{--                            <p>--}}
{{--                                <a class="btn btn-primary" href="/study/list?id={{ intval($category['id'])}}">查看列表</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
