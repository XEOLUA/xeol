<!-- Our awards-->
<section class="section section-lg bg-default section-lined">

    @foreach($categories as $item)
    @if(count($item['relCategoryToLesson'])>0)
    <div class="container">
        <div class="row row-30 align-items-center">
            <div class="col-sm-12 col-lg-4">
                <h3>{{$item->title ?? 'title of categories'}}</h3>
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
{{--                    @if($loop->index<8)--}}
                    <a class="col-6 col-md-4 box-border" href="/lesson/{{$lesson->id}}">
                        <div class="title">{{$lesson->title ?? "Урок - N"}}</div>
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
{{--                    @endif--}}
                        @endforeach
{{--                <a class="col-6 col-md-4 box-border" href="/category/{{$categories[0]->id}}/page/{{}}">--}}
{{--                    <div class="icon icon-sm mdi mdi-arrow-right"></div>--}}
{{--                </a>--}}

            </div>
        </div>
    </div>
    @endif
    @endforeach
</section>
