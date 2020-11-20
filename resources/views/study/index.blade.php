@include('common.header',['title'=>'主页'])
<div class="container">
    @include('common.leader')
    {{--    @include('common.banner')--}}

    <div class="row">
        <div class="span12">
            @foreach($categorys as $category)
                <div class="col-lg-4">
                    <div class="thumbnail" style="min-height: 280px;">
                                                <img alt="300x200" src="/imgs/people.jpg"/>
                        <div class="caption">
                            <h3>
                                {{$category['title']??''}}
                            </h3>
                            <p>
                                {{$category['content']??''}}
                            </p>
                            <p>
                                <a class="btn btn-primary" href="/study/list?id={{ intval($category['id'])}}">查看列表</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
