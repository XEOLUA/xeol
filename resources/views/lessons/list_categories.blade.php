<!-- Our awards-->
<section class="section bg-default section-lined section_list-categories"
         style="border-top: 1px solid silver; padding-top: 30px">
    @foreach($categories as $item)
    @if(count($item['relCategoryToLesson'])>0)
    <div class="container">
        <div class="row row-30 align-items-center">
            <div class="col-sm-12 col-lg-4">
                <a href="/category/{{$item->id}}">
                    <h3>{{$item->title ?? 'title of categories'}}</h3></a>
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
            <div class="row lesson_row">
                @foreach($item['relCategoryToLesson'] as $lesson)
                    @if($loop->index<5)
                <a class="col-xl-4 col-lg-4 col-md-4 col-12 lo-0 pr-0 pl-0 block_lesson" href="/lesson/{{$lesson->id}}/category/{{$item->id}}">
                    <div class="block_img">
                        <img src=@if($lesson->image)
                        {{url($lesson->image)}}
                        @else
{{--                        @if(\App\Services\GetUrlYoutube::geturl($lesson->text)!='')--}}
                        {{'https://img.youtube.com/vi/'.\App\Services\GetUrlYoutube::geturl($lesson->text).'/0.jpg' ?? url('images/brand-12-121x99.png')}}
{{--                        @else--}}
{{--                        {{}}--}}
{{--                        @endif--}}
                        @endif alt="" width="121" height="99"/>

                    </div>
                    <div class="block_text">
                        <div class="block_main">
                            <div class="block_star">
                                {{--                            svg_silver->svg_golden--}}
                                <svg  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                      class="svg-inline--fa fa-star fa-w-18 img_star
{{$lesson->solution ? "svg_golden" : "svg_silver"}}" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                            </div>
                            <div class="block_right">
                                <span class="title">{{$lesson->title ?? "Урок - N"}}</span>
                                <div class="block_author">
                                    <span class="author_desc">Автор:</span>
                                    <span class="author">{{$lesson->author ?? 'Author'}}</span>
                                </div>
                                <div class="block_watch">
                                    <span class="watch_desc">Переглядів:</span>
                                    <span class="watch">{{$lesson->view ?? 0}}</span>
                                </div>
                                <div class="block_watch">
                                    <span class="watch_desc">Створено:</span>
                                    <span class="watch">{{$lesson->created_at ?? ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                        @else @break;
                @endif
                @endforeach
                <a class="col-6 col-md-4 box-border" href="/category/{{$item->id}}">
                    <div class="icon icon-sm mdi mdi-arrow-right"></div>
                </a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</section>

