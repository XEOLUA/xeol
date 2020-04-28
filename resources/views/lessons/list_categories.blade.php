<!-- Our awards-->
<section class="section section-lg bg-default section-lined">

    @foreach($categories as $item)
    @if(count($item['relCategoryToLesson'])>0)
    <div class="container">
        <div class="row row-30 align-items-center">
            <div class="col-sm-12 col-lg-4">
                <a href="/category/{{$item->id}}"><h3>{{$item->title ?? 'title of categories'}}</h3></a>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="big block-1-custom">
                    {{$item->description ?? 'As a leading web design team, we have received multiple awards over the years.'}}
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="block-2-custom">
                    <div class="counter-minimal">
                        <div class="counter-left">
                            <div class="counter">{{count($item['relCategoryToLesson'])}}</div>
                        </div>
                        <div class="counter-right">
                            <div class="postfix">+</div>
                            <div class="title">Відео та матеріали</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-wrap-1 wow fadeInUp" data-wow-delay="0.2s">
            <div class="row">
                @foreach($item['relCategoryToLesson'] as $lesson)
                    @if($loop->index<5)
                    <a class="col-6 col-md-4 box-border" href="/lesson/{{$lesson->id}}/category/{{$item->id}}">
                        <div class="title"
                             style="
                             text-shadow: 1px 1px 2px black, 0 0 1em white;
    color: silver;
                                "
                        >{{$lesson->title ?? "Урок - N"}}
                            <div>Переглядів: {{$lesson->view}}</div>
                        </div>
                        <img src=@if($lesson->image)
                         {{url($lesson->image)}}
                            @else
                                @if(\App\Services\GetUrlYoutube::geturl($lesson->text)!='')
                            {{'https://img.youtube.com/vi/'.\App\Services\GetUrlYoutube::geturl($lesson->text).'/0.jpg'}}
                                @else
                        {{url('images/brand-12-121x99.png')}}
                                @endif
                        @endif alt="" width="121" height="99"/>
                    </a>
                    @endif
{{--                        @if(\App\Services\GetUrlYoutube::geturl($lesson->text)!='')--}}
{{--                            Переглядів: {{\App\Services\GetUrlYoutube::youtubeinfo(\App\Services\GetUrlYoutube::geturl($lesson->text))['views']}}--}}
{{--                        @endif--}}

                        @endforeach
{{--                @for($i=1;$i<=5-count($item['relCategoryToLesson']);$i++)--}}
{{--                        <a class="col-6 col-md-4 box-border" href="#">--}}
{{--                         <div  style="height: 120px"></div></a>--}}
{{--                @endfor--}}
                <a class="col-6 col-md-4 box-border" href="/category/{{$item->id}}">
                    <div class="icon icon-sm mdi mdi-arrow-right"></div>
                </a>

            </div>
        </div>
    </div>
    @endif
    @endforeach
</section>
