<!-- feedback-->
<section class="section bg-default section-lined section_list-categories">
    <div style="padding: 30px; border-top: 1px solid silver; text-align: center;">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    <form action="{{route('addfeedback')}}" method="post">
        @csrf
        <div>
            <input class="row" type="text" name="name" id="name" placeholder="Введіть ім'я">
            <input class="row"  type="email" name="email" id="email" placeholder="E-mail">
            <textarea name="text" id="text" class="row" cols="30" rows="10" placeholder="Текст повідомлення"></textarea>
            <button class="row" >Відправити</button>
        </div>
    </form>
    </div>
</section>
