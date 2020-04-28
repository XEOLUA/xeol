<section class="section bg-default section-lined">
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
            <div class="col-sm-6 col-lg-4">
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
        <div class="row">
            @foreach($lessons[0]['relCategoryToLesson'] as $les)
                @if($loop->index<8)
                    <a class="col-6 col-md-4 box-border" href="/lesson/{{$les->id}}/category/{{$lessons[0]->id}}">
                        <div class="title">
                            {{$les->title ?? "Урок - N"}}
                            <div>Переглядів: {{$les->view}}</div>
                        </div>
                        <img src=@if($les->image)
                        {{url($les->image)}}
                        @else
                        @if(\App\Services\GetUrlYoutube::geturl($les->text)!='')
                        {{'https://img.youtube.com/vi/'.\App\Services\GetUrlYoutube::geturl($les->text).'/0.jpg'}}
                        @else
                        {{url('images/brand-12-121x99.png')}}
                        @endif
                        @endif alt="" width="121" height="99"/>
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

