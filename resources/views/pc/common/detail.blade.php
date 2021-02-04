@include('common.header',['title'=>'详情'])
<style>
    .title {
        text-align: center;
        font-weight: 600;
    }
</style>
<div class="content">
    @include('common.leader')
    <div class="container" style="margin: 20px auto;">
        <h3 class="title">{{ $detail->title}}</h3>
        <div style="text-align: center;">{{ $detail->create_time}}</div>
        <div>{{ $detail->content}}</div>

    </div>
</div>
</div>
