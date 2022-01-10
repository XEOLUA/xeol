<!-- Price box minimal--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>XEOL | @yield('title','XEOL')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

{!! OpenGraph::renderTags() !!}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166193936-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-166193936-1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href={{url("//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900")}}>
{{--    <link rel="icon" href="images/favicon.ico" type="image/x-icon">--}}
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <link rel="icon" href="{{url('images/favicon.ico?v=2')}}" type={{url("image/x-icon")}}>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/tags.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


{{--    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">--}}
{{--    <link rel="stylesheet" href={{url("fonts/fonts.css")}}>--}}
{{--    <link rel="stylesheet" href={{url("css/style.css")}}>--}}
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>

<main role="main">
    @yield('content')
</main>

<div class="snackbars" id="form-output-global"></div>
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script defer src="https://www.google.com/recaptcha/api.js" async></script>
<script src="{{asset('js/tags.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.btnSubmit').click(function(event){
            event.preventDefault();
            $.ajax({
                type:"POST",
                url:"/subscribe/",
                data: $("#formSubscribe").serialize(),
                success: function(data){
                    // console.log('Ajax responded');
                    // console.log(data);
                    if(data.errors_sc) {
                        document.getElementById('errorAjax').innerHTML='';
                        document.getElementById('errorAjax').style.display='block';
                        // console.log('errors validation');
                        // console.log(data.errors_sc);
                        for(let key in data.errors_sc)
                        {
                            // console.log(key);
                            document.getElementById('errorAjax').innerHTML+='<div>'+data.errors_sc[key]+'</div>';
                        };
                        // grecaptcha.reset();
                    } else
                    {
                        // console.log('NOT errors validation');
                        document.getElementById('errorAjax').innerHTML='';
                        document.getElementById('errorAjax').style.display='block';
                        document.getElementById('errorAjax').innerHTML+='Дякуємо за підписку.';
                        // $('#addMember').modal('hide');
                        // window.location.href = '/successAddQueryPartner';
                    }
                },
                error: function (data) {
                    // console.log(111);
                    // console.log("777".data);
                    // $("#emailm").css('color','#fc0059').html(data.responseJSON.errors.email);
                    // console.log("data.responseJSON);
                    // console.log('Ajax not responded');
                }
            });
        });
    });

</script>
</body>
</html>
