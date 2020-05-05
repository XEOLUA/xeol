<section class="section bg-gray-700 context-dark section-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-5 text-block-1 wow fadeInLeft">
                <div class="section-sm section-sm-3">
                    <h5>Нові уроки</h5>
                    <h3>10 уроків,</h3>
                    <div>що були додані останніми</div>
                    <div class="button-wrap">
                        <a class="button button-default button-invariable" href="/lessons">переглянути всі уроки</a>
                    </div>
                    <ul class="list-inline list-inline-sm-1">
                        <li>
                            <p>Група:</p>
                        </li>
                        <li><a target="_blank" class="icon icon-sm link-default mdi mdi-facebook" href="https://www.facebook.com/xeolcomua"></a></li>
{{--                        <li><a class="icon icon-sm link-default mdi mdi-instagram" href="#"></a></li>--}}
{{--                        <li><a class="icon icon-sm link-default mdi mdi-twitter" href="#"></a></li>--}}
{{--                        <li><a class="icon icon-sm link-default mdi mdi-youtube-play" href="#"></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Swiper-->
    <div class="swiper-section">
        <div class="swiper-container swiper-slider swiper-slider-1" data-next=".custom-swiper-button-next" data-prev=".custom-swiper-button-prev" data-loop="true">
            <div class="swiper-wrapper">
                @foreach($lessons as $lesson)
                    <a class="swiper-slide" href="/lesson/{{$lesson->id}}/category/{{$lesson['relLessonToCategory'][0]->id}}">
                    <div style="width: 100%; padding: 5px" class="swiper-slide" data-slide-bg="{{url($lesson->image ?? 'images/home-1-585x541.jpg')}}">
                            <div style="color:#92d050; font-weight: 400; font-size:22px">{{$lesson['relLessonToCategory'][0]->title}}</div>
                            <div style="color:#ffffff; background-color: #262626; padding: 5px">{{$lesson->title}}</div>
                    </div>
                    </a>
                @endforeach
{{--                <div class="swiper-slide" data-slide-bg="images/home-2-585x541.jpg"></div>--}}
            </div>
            <div class="swiper-pagination"></div>
            <!-- Swiper Navigation-->
        </div>
        <div class="custom-swiper-button-wrap">
            <div class="custom-swiper-button-next mdi mdi-arrow-right"></div>
            <div class="custom-swiper-button-prev mdi mdi-arrow-left"></div>
        </div>
    </div>
    <a name="team"></a>
</section>
