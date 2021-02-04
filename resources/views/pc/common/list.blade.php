@include('common.header',['title'=>'主页'])
<style>
    .list {
        margin-bottom: 5px;
    }

    .list_logo {
        width: 60px;
        height: 60px;
        border-radius: 20px;
    }

    .list_title {
        font-weight: 600;
        color: #e08e0b;
        border-bottom: 1px snow dashed;
    }

    .list_time {
        float: right;
        color: blue;
    }
</style>
<div class="content">
    @include('common.leader')
    @include('common.page_bg')
    <div class="container" style="margin: 20px auto;">
        <div class="row list_row">
            @foreach ($lists as $list)
                <div class="col-lg-6 col-md-6 col-xs-12 list">
                        <div class="col-md-2">
                            <img class="list_logo"
                                 src=" {{ $list->logo}}">
                        </div>
                        <div class="col-md-9">
                            <a href="/pc/common/detail?id={{ $list->id }}">
                                <h4 class="list_title"> {{ $list->title }}</h4>
                                <div> {{ $list->title }} <span class="list_time"> {{ $list->create_time}}</span></div>
                            </a>
                        </div>
                </div>
            @endforeach
        </div>
        <div style="float: right;">{{ $lists->links() }}</div>
    </div>
</div>
@include('common.footer')
