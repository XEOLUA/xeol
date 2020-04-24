<!-- Our awards-->
<section class="section section-lg bg-default section-lined">

    @foreach($categories as $item)
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
                            <div class="counter">17</div>
                        </div>
                        <div class="counter-right">
                            <div class="postfix">+</div>
                            <div class="title">International awards</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-wrap-1 wow fadeInUp" data-wow-delay="0.2s">
            <div class="row"><a class="col-6 col-md-4 box-border" href="#">
                    <div class="title">Award #1</div><img src="images/brand-12-121x99.png" alt="" width="121" height="99"/></a><a class="col-6 col-md-4 box-border" href="#">
                    <div class="title">Award #2</div><img src="images/brand-13-124x98.png" alt="" width="124" height="98"/></a><a class="col-6 col-md-4 box-border" href="#">
                    <div class="title">Award #3</div><img src="images/brand-14-131x112.png" alt="" width="131" height="112"/></a><a class="col-6 col-md-4 box-border" href="#">
                    <div class="title">Award #4</div><img src="images/brand-15-146x68.png" alt="" width="146" height="68"/></a><a class="col-6 col-md-4 box-border" href="#">
                    <div class="title">Award #5</div><img src="images/brand-16-111x99.png" alt="" width="111" height="99"/></a><a class="col-6 col-md-4 box-border" href="#">
                    <div class="icon icon-sm mdi mdi-arrow-right"></div></a></div>
        </div>
    </div>
    @endforeach
</section>
