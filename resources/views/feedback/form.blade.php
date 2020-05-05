<!-- feedback-->
<section class="section bg-default section-lined section_list-categories">
    <section class="section bg-default section-lined section_list-categories section_feedback">
    <div style="padding: 30px; border-top: 1px solid silver; text-align: center;">
        <div class="block_feedback_form">
                <form action="">
                    @csrf
                        <input class="inp" type="text" name="name" id="name" placeholder="Введіть ім\'я">
                        <input class="inp"  type="email" name="email" id="email" placeholder="E-mail">
                    <textarea class="inp"  name="" id="" cols="30" rows="10" placeholder="Текст повідомлення"></textarea>

                    <button class="button button-default button-invariable btnSubmit" type="submit">Відправити</button>
                </form>

        </div>
    </div>
</section>
</section>
