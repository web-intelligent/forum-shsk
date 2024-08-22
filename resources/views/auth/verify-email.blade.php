@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Работа в личном кабинете</h4>
            <h1 class="display-4 mb-4">Подтвердите адрес электронной почты</h1>
            <p class="mb-0">
                Вы авторизовались успешно, но для дальнейшей работы в личном кабинете необходимо подтвердить адрес электронной почты. При регистрации на указанный Адрес электронной почты было отправлено письмо со ссылкой на подтверждение. Если Вы не получили такое письмо, то необходимо проверить папку "СПАМ" в Вашем ящике. В противном случае Вы можете запросить ссылку для подтверждения адреса электронной почты повторно. Также просим удостовериться в правильности написания Email. Также Вы может обратиться в службу технической поддержки, написав письмо на <a href="mailto:contact@еип-фкис.рф" target="_blank">contact@еип-фкис.рф</a> с пометкой "Всероссийский форум ШСК"
            </p>
        </div>
        <form class="bg-white p-3 rounded-2 entrance" action="{{ route('verification.send') }}" method="POST">
            @csrf
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 ms-3"><i class="fa-solid fa-share-from-square"></i> Отправить ссылку повторно</button>
            </div>
        </form>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
