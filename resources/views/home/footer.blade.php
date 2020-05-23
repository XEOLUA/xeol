{{--<a class="section section-banner" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank" style="background-image: url(images/background-01-1920x310.jpg); background-image: -webkit-image-set( url(images/background-01-1920x310.jpg) 1x, url(images/background-01-3840x620.jpg) 2x )"><img src="images/foreground-01-1600x310.png" srcset="images/foreground-01-1600x310.png 1x, images/foreground-01-3200x620.png 2x" alt="" width="1600" height="310"></a>--}}
<div class="pre-footer-classic bg-gray-700 context-dark">
    <div class="container">
        <div class="row row-30 justify-content-lg-between">
            <div class="col-sm-6 col-lg-3 col-xl-3">
                <h5>Розташування</h5>
                <ul class="list list-sm">
                    <li>
                        <p>Україна,</p>
                    </li>
                    <li>
                        <p>Хмельницький</p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <h5>Контакти</h5>
                <dl class="list-terms-custom">
                    <dt>Mail.</dt>
                    <dd><a class="link-default" href="mailto:#">xeol@ukr.net</a></dd>
                </dl>
                <ul class="list-inline list-inline-sm">
                    <li><a class="icon icon-sm icon-gray-filled icon-circle mdi mdi-facebook" href="https://www.facebook.com/xeolcomua" target="_blank"></a></li>
{{--                    <li><a class="icon icon-sm icon-gray-filled icon-circle mdi mdi-instagram" href="#"></a></li>--}}
{{--                    <li><a class="icon icon-sm icon-gray-filled icon-circle mdi mdi-twitter" href="#"></a></li>--}}
                </ul>
            </div>
            <div class="col-lg-4">
                {{$success ?? ''}}
                @if(isset($errors_sc) && count($errors_sc)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors_sc->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h5>Підписатися</h5>
                <div id="errorAjax" style="color:red"></div>
                <form
                    id="formSubscribe"
{{--                    class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact"--}}
                      method="post"
{{--action={{route('subscribe')}}--}}
                >
                    @csrf
                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-email-outline"></div>
                        <input class="form-input" id="footer-email" type="email" name="email"
                               data-constraints="@Email @Required">
                        <label class="form-label" for="footer-email">E-mail</label>
                    </div>
                    <div class="button-wrap">
                        <button class="button button-default button-invariable btnSubmit" type="submit">Підписатися</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="section footer-classic context-dark text-center">
    <div class="container">
        <div class="row row-15 justify-content-lg-between">
            <div class="col-lg-6 col-xl-6 text-lg-left">
                <p class="rights"><span>&copy;&nbsp;</span>
                    <a href="http://xeol.com.ua">XEOL</a> <span class="copyright-year"></span></p>
            </div>
            <div class="col-lg-6 col-xl-6">
                <ul class="list-inline list-inline-lg text-uppercase">
{{--                    <li><a href="about-us.html">About us</a></li>--}}
                    <li><a href="/#team">Наша команда</a></li>
                    <li><a href="/#newlessons">Новинки</a></li>
                    <li>
                        <!-- MyCounter v.2.0 -->
                        <script type="text/javascript"><!--
                            my_id = 170597;
                            my_width = 88;
                            my_height = 61;
                            my_alt = "MyCounter - счётчик и статистика";
                            //--></script>
                        <script type="text/javascript"
                                src="https://get.mycounter.ua/counter2.0.js">
                        </script><noscript>
                            <a target="_blank" href="https://mycounter.ua/"><img
                                    src="https://get.mycounter.ua/counter.php?id=170597"
                                    title="MyCounter - счётчик и статистика"
                                    alt="MyCounter - счётчик и статистика"
                                    width="88" height="61" border="0" /></a></noscript>
                        <!--/ MyCounter -->

                    </li>
{{--                    <li><a href="#">Blog</a></li>--}}
                </ul>
            </div>
        </div>
    </div>
</footer>
