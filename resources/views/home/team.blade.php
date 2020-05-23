<!-- Team-->
<section class="section section-lg bg-gray-100 section-lined">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <div class="row row-40 justify-content-between">
            <div class="col-lg-7 col-xl-8">
                <div class="row no-gutters">
                    @foreach($authors as $author)
                    <div class="col-sm-6 wow fadeInLeft">
                        <div class="box-team box-team-right">
                            <img src="
{{$author->image ? url(\App\Services\ImgResize::ImgCopy_3($author->image,385,450)) : url('images/index-3-1-390x332.jpg')}}"
                                 alt="" width="390" height="332"/>
                            <div class="meta">
                                <div class="heading-6 title">{{$author->name ?? 'John Smith'}}</div>
                                <p class="position">{{$author->pseudonym ?? 'Senior Designer'}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="row row-30 row-xxl-55 justify-content-end">
                    <div class="col-sm-6 col-lg-9 col-xl-10 text-lg-right">
                        <h3>Команда</h3>
                        <div class="big-text">Наша команда завжди готова допомогти Вам зорієнтуватися у ІТ просторі.</div>
                        <div class="divider divider-2 d-none d-lg-block"></div>
                    </div>
                    <div class="col-sm-6 col-lg-8 col-xl-7">
                        <div class="counter-minimal">
                            <div class="counter-left">
                                <div class="counter">{{count($authors)}}</div>
                            </div>
                            <div class="counter-right">
                                <div class="postfix">+</div>
                                <div class="title">учасник{{\App\Services\GetSuffixByNumber::get_suffix(count($authors))}} команди</div>
                            </div>
                        </div>
                        <ul class="list-marked list-marked-big">
                            <li>талановиті учні та студенти - наша підтримка</li>
                            <li>{{date('Y')-2014}} рок{{\App\Services\GetSuffixByNumber::get_suffix(date('Y')-2014)}} розвиваємо проєкт</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
