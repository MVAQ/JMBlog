<div id="content-blog" class="content group">
<!--    --><?php //dd($msposts);    ?>
    @if($msposts)
        @foreach($msposts as $mspost)


            <div class="sticky hentry hentry-post blog-big group">
                <!-- post featured & title -->
                <div class="thumbnail">
                    <!-- post title -->
                    <h2 class="post-title"><a

                                href="{{ route('msposts.show', ['alias'=>$mspost->alias]) }}">{{ $mspost->title }}</a>
                    </h2>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{ asset(env ('THEME')) }}/images/articles/{{ $mspost->imgs->max }}" alt="photo"
                             title="001"/>
                    </div>
                    <p class="date">
                        <span class="month">{{ $mspost->created_at->format('M') }}</span>
                        <span class="day">{{ $mspost->created_at->format('d')  }}</span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a href="#" title="{{ $mspost->user->name }}"
                                                  rel="author">{{ $mspost->user->name }}</a></span></p>
                    <p class="categories"><span>In: <a
                                    href="{{ route('mspostsCat',['cat_alias' =>$mspost->categorie->alias]) }}"
                                    title="Viev all posts in {{ $mspost->categorie->title }}"
                                    rel="category tag">{{ $mspost->categorie->title }}</a></span></p>
                    <p class="comments"><span><a href="{{ route('msposts.show', ['alias'=>$mspost->alias]) }}#respond"
                                                 title="Comment on Section shortcodes &amp; sticky posts!">{{ count($mspost->commments)? count($mspost->commments):'0' }} {{ Lang::choice('ru.comments', count($mspost->commments)) }} </a></span>
                    </p>
                </div>
                <!-- post content -->
                <div class="the-content group">
                    {!! $mspost->description !!}
                    <p><a href="{{ route('msposts.show', ['alias'=>$mspost->alias]) }}"
                          class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">{{ Lang::get('ru.read_more') }}</a>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
        @endforeach

        <div class="general-pagination group">
            @if($msposts->lastPage() > 1)

                @if($msposts->currentPage() !== 1)
                    <a href="{{ $msposts->url(($msposts->currentPage() - 1)) }}"
                       class="selected">{{ Lang::get('pagination.previous') }}</a>
                @endif

                @for($i = 1; $i <= $msposts->lastPage(); $i++)

                    @if($msposts->currentPage() == $i)
                        <a class="selected disabled">{{ $i }}</a>

                    @else
                        <a href="{{ $msposts->url($i) }}">{{ $i }}</a>

                    @endif
                @endfor

                @if($msposts->currentPage() !== $msposts->lastPage())
                    <a href="{{ $msposts->url(($msposts->currentPage() + 1)) }}"
                       class="selected">{{ Lang::get('pagination.next') }}</a>
                @endif
            @endif
        </div>
    @else
        {{ Lang::get('ru.post_no') }}
    @endif
</div>
