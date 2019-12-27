<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");

?>

    <main class="section-py-10 h-50vh" style="background: url(<?= SITE_TEMPLATE_PATH ?>/img/slider-104.jpg); background-size: cover ">
        <div class="container">
            <div class="row align-items-center flex-column ">
                <div class="col-12 col-sm-6 col-md-5">
                    <!--                <h1 class="h1 text-center mb-4">-->
                    <!--                    Регистрация-->
                    <!--                </h1>-->

                    <div class="card card-shadow card-border " id="auth-tabs">
                        <div class="card-body p-md-5">
                            <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active h4" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Регистрация</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link h4" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Авторизация</a>
                                </li>

                            </ul>
                            <div class="hr"></div>
                            <div class="tab-content mt-4 " id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <form action="">
                                        <div class="form-group"><label for="">Email <sup class="text-danger">*</sup></label><input type="email" class="form-control" placeholder="email@mail.com"></div>
                                        <div class="form-group"><label for="">Телефон <sup class="text-danger">*</sup></label><input type="tel" class="form-control" placeholder="+375(44) xxx-xx-xx"></div>
                                        <div class="form-group"><label for="">Пароль <sup class="text-danger">*</sup></label><input type="password" class="form-control" placeholder="xxx xxx xx"></div>
                                        <div class="form-group"><label for="">Подтверждение пароля <sup class="text-danger">*</sup></label><input type="text" class="form-control"></div>
                                        <div class="custom-control custom-switch d-flex justify-content-center align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label pt-1" for="customSwitch1"> Я агент</label>
                                        </div>

                                        <div class="form-group"><label for="">УНП<sup class="text-danger"> *</sup></label><input type="text" class="form-control"></div>
                                        <button class="btn btn-secondary mx-auto mt-4"><span class="icon-user-check mr-2"></span>Регистрация</button>
                                        <hr>
                                        <h6 class="text-center mb-3">Через соцальные сети</h6>
                                        <div class="d-flex justify-content-center  mx-auto flex-wrap w-75">
                                            <button class="btn btn-social p-0 vk "><span class="icon-vk"></span></button>
                                            <!--    <button class="btn btn-social p-0 tel "><span class="icon-telegram"></span></button>-->
                                            <button class="btn btn-social p-0 fb "><span class="icon-facebook"></span></button>
                                            <!--    <button class="btn btn-social p-0 inst "><span class="icon-instagram"></span></button>-->
                                            <!--    <button class="btn btn-social p-0 vb "><span class="icon-whatsapp"></span></button>-->
                                            <button class="btn btn-social p-0 tw "><span class="icon-twitter"></span></button>
                                            <button class="btn btn-social p-0 goggle "><span class="icon-google"></span></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                    <form action="">
                                        <div class="form-group"><label for="">Логин или email <sup class="text-danger">*</sup></label><input type="email" class="form-control" placeholder="email@mail.com">
                                        </div>

                                        <div class="form-group"><label for="">Пароль <sup class="text-danger">*</sup></label><input type="password" class="form-control" placeholder="xxx xxx xx">
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-group d-flex align-items-center justify-content-center mb-0">
                                                <input type="checkbox" class=" mr-2"><label for="" class="m-0"> Запомнить меня </label>
                                            </div>
                                            <a href="#">Забыли пароль?</a>
                                        </div>
                                        <button class="btn btn-secondary mx-auto mt-3"><span class="icon-user-check mr-2"></span> Авторизация</button>
                                        <hr>
                                        <h6 class="text-center mb-3">Через соцальные сети</h6>
                                        <div class="d-flex justify-content-center  mx-auto flex-wrap w-75">
                                            <button class="btn btn-social p-0 vk "><span class="icon-vk"></span></button>
                                            <!--    <button class="btn btn-social p-0 tel "><span class="icon-telegram"></span></button>-->
                                            <button class="btn btn-social p-0 fb "><span class="icon-facebook"></span></button>
                                            <!--    <button class="btn btn-social p-0 inst "><span class="icon-instagram"></span></button>-->
                                            <!--    <button class="btn btn-social p-0 vb "><span class="icon-whatsapp"></span></button>-->
                                            <button class="btn btn-social p-0 tw "><span class="icon-twitter"></span></button>
                                            <button class="btn btn-social p-0 goggle "><span class="icon-google"></span></button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </main>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>