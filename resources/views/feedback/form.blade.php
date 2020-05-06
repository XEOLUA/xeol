<!-- feedback-->
<section class="section bg-default section-lined section_list-categories">

    <section class="section bg-default section-lined section_list-categories section_feedback">
    <div style="padding: 30px; border-top: 1px solid silver; text-align: center;">
        <div class="block_feedback_form">

            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert" >{{Session::get('flash_message')}}</div>

            @else
            <form action="{{route('addfeedback')}}" method="post">
                    <h5 style="padding: 10px">Форма зворотнього зв'язку</h5>
                    @if(isset($errors) && count($errors)>0)
                        <div>
                            <ul style="color: red;">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                        <input class="inp" type="text" name="name" id="name" placeholder="Введіть ім'я" value="{{old('name')}}">
                        <input class="inp"  type="email" name="email_fb" id="email_fb" placeholder="E-mail" value="{{old('email_fb')}}">
                        <textarea class="inp"  name="text" id="text" cols="30" rows="10" placeholder="Текст повідомлення">{{old('text')}}</textarea>

                @if(env('GOOGLE_RECAPTCHA_SITE_KEY'))
                    <center>
                    <div class="g-recaptcha"
                         data-sitekey="{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}">
                    </div></center>
                @endif

                <button class="button button-default button-invariable" type="submit">Відправити</button>
                </form>
                @endif
        </div>
    </div>
</section>
</section>
