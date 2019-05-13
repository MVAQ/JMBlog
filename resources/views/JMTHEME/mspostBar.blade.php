<div class="widget-first widget recent-posts">
    <h3>{{ Lang::get('ru.latest_project') }}</h3>
    <div class="recent-post group">

    @if( !$portpholios->isEmpty() )
        @foreach( $portpholios as $portpholio )
            <!--                   --><?php //dd($portpholio->imgs->min)?>
                <div class="hentry-post group">
                    <div class="thumb-img"><img style="width: 60px"
                                                src="{{ asset(env('THEME')) }}/images/projects/{{ $portpholio->imgs->min }}"
                                                alt="001" title="001"/></div>
                    <div class="text">
                        <a href="{{ route('portpholios.show',['alias'=>$portpholio->alias]) }}"
                           title="{{ $portpholio->title }}" class="title">{{ $portpholio->title }}</a>
                        <p> {{ str_limit($portpholio->text,60) }} </p>
                        <a class="read-more"
                           href="{{ route('portpholios.show',['alias'=>$portpholio->alias]) }}">{{ Lang::get('ru.read_more') }}</a>
                    </div>
                </div>

            @endforeach
        @endif
    </div>
</div>

@if( !$comments->isEmpty() )

        <div class="widget-last widget recent-comments">
            <h3>{{ Lang::get('ru.latest_comment') }}</h3>
            <!--                   --><?php //dd($portpholio->imgs->min)?>
            <div class="recent-post recent-comments group">
                @foreach( $comments as $comment )
                    <div class="the-post group">
                        <div class="avatar">
                            @set( $hash, ($comment->email)? md5($comment->email) : ($comment->user->email))
                            <img alt="" src="https://www.gravatar.com/avatar/{{ $hash }}?d=mm&s=55" class="avatar"/>
                        </div>
                        <span class="author"><strong><a href="#">{{ isset($comment->user)?$comment->user->name:$comment->name }}</a></strong> in</span>
<!--                       --><?php //dd($comment->mspost)?>

                        <a class="title" href="{{ route('msposts.show',['alias'=>$comment->mspost->alias]) }}">{{$comment->mspost->title}}</a>
                        <p class="comment">
                           {{$comment->text}} <a class="goto" href="{{ route('msposts.show',['alias'=>$comment->mspost->alias]) }}">&#187;</a>
                        </p>
                    </div>
                @endforeach
            </div>

        </div>

@endif

