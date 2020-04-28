<section class="section bg-default section-lined section_list-categories">
    <div style="padding: 30px; border-top: 1px solid silver; text-align: center;">
        <a href="/lessons">Уроки</a> <i class="fas fa-caret-right" style="font-style: normal;"></i>
        <a href="/category/{{$lessons[0]->id}}">{{$lessons[0]->title}}</a>
    </div>
    <div class="container" style="padding: 30px">
        <div style="text-align: center; text-transform: uppercase; font-weight: 400">
            {{$lesson->title}}
        </div>
        {!! $lesson->text !!}
        <div style="background-color: #efefef; padding: 10px; margin: 30px;">
            <div>Рівеннь складності: {{$lesson->level}}</div>
            <div>Переглядів: {{$lesson->view}}</div>
            <div>Дата створення: {{$lesson->created_at}}</div>
            <div>Дата змінення: {{$lesson->updated_at}}</div>
            <div>Автор: {{$lesson->author}}</div>
        </div>
        <div class="row row-30 align-items-center">
            <div class="col-sm-12 col-lg-4">
                <h3>
{{--                    {{dd($lessons)}}--}}
                    {{$lessons[0]->title ?? 'title of categories'}}</h3>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="big block-1-custom">
                    {{$lessons[0]->description ?? 'As a leading web design team, we have received multiple awards over the years.'}}
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6  col-12">
                <div class="block-2-custom">
                    <div class="counter-minimal">
                        <div class="counter-left">
                            <div class="counter">{{count($lessons[0]['relCategoryToLesson'])}}</div>
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
            @foreach($lessons[0]['relCategoryToLesson'] as $les)
                @if($loop->index<8)
                    <a class="col-xl-4 col-lg-4 col-md-4 col-12 lo-0 pr-0 pl-0 block_lesson" href="/lesson/{{$les->id}}/category/{{$lessons[0]->id}}">
                        <div class="block_img">
                            <img src=@if($les->image)
                            {{url($les->image)}}
                            @else
                            @if(\App\Services\GetUrlYoutube::geturl($les->text)!='')
                            {{'https://img.youtube.com/vi/'.\App\Services\GetUrlYoutube::geturl($les->text).'/0.jpg'}}
                            @else
                            {{url('images/brand-12-121x99.png')}}
                            @endif
                            @endif alt="" width="121" height="99"/>

                        </div>
                        <div class="block_text">
                            <div class="block_main">
                                <div class="block_star">
                                    {{--                            svg_silver->svg_golden--}}
                                    <svg  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                          class="svg-inline--fa fa-star fa-w-18 img_star
{{$les->solution ? "svg_golden" : "svg_silver"}}
" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                </div>
                                <div class="block_right">
                                    <span class="title">{{$les->title ?? "Урок - N"}}</span>
                                    <div class="block_author">
                                        <span class="author_desc">Автор:</span>
                                        <span class="author">{{$les->author ?? 'Author'}}</span>
                                    </div>
                                    <div class="block_watch">
                                        <span class="watch_desc">Переглядів:</span>
                                        <span class="watch">{{$les->view ?? 0}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
            <a class="col-6 col-md-4 box-border" href="/category/{{$lessons[0]->id}}">
                <div class="icon icon-sm mdi mdi-arrow-right"></div>
            </a>
        </div>
    </div>
    </div>
</section>

