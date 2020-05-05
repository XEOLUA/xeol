<!-- Our awards-->
<section class="section section-lg bg-default section-lined">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <div class="row row-30 align-items-center">
            <div class="col-sm-12 col-lg-4">
                <h3>Теми занять</h3>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="big block-1-custom">
                    Наша команда працює над поповненням відеуроків їх оновленням та покращенням
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="block-2-custom">
                    <div class="counter-minimal">
                        <div class="counter-left">
                            <div class="counter">{{count($categories)}}</div>
                        </div>
                        <div class="counter-right">
                            <div class="postfix">категорій</div>
                            <div class="title">відеоуроків</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-wrap-1 wow fadeInUp" data-wow-delay="0.2s">
            <div class="row">
                @foreach($categories as $category)
                        <a class="col-xl-4 col-lg-4 col-md-4 col-12 box-border" href="/category/{{$category->id}}">
                            <div class="title" style="font-size: 25px;color: #000;">{{$category->title}}</div>
                        <img src="{{url($category->img ?? 'images/brand-12-121x99.png')}}" alt="" width="180" height="147"/>
                                <div class="block-2-custom">
                                    <div class="counter-minimal">
                                        <div class="counter-left">
                                            <div class="counter" style="font-size: 45px">{{count($category['relCategoryToIncategory'])}} уроків</div>
                                        </div>
                                        <div class="counter-right">
                                            <div class="postfix">урок{{\App\Services\GetSuffixByNumber::get_suffix(count($category['relCategoryToIncategory']))}}</div>
                                        </div>
                                    </div>
                                </div>
                </a>
                @endforeach
                <a class="col-6 col-md-4 box-border" href="/lessons"><div class="icon icon-sm mdi mdi-arrow-right"></div></a></div>
        </div>
    </div>
    <a name="newlessons"></a>
</section>
