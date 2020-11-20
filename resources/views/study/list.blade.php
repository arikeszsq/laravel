@include('common.header',['title'=>'主页'])
<div class="container">
    @include('common.leader')
    <div class="row">
        <div class="span12">
            <div class="accordion" id="accordion-5">
                @foreach($lists as $list)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-{{$list->id}}"
                               href="#accordion-element-{{$list->id}}">
                                {{$list->id}}:{{$list->title}}-{{$list->create_time}}
                            </a>
                        </div>
                        <div id="accordion-element-{{$list->id}}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                {{$list->content}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
