<?php
global $USER;
?>

<div class="dropdown dropdown-login dropdown-tab">
    <a href="#" class="d-block d-md-none " id="dropdownSignIn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons reg-popup">
            account_circle
        </i>
    </a>
    <? if (!$USER->IsAuthorized()): ?>
        <a href="/tspersonal/vouchers/"<? /* href="#" */ ?> class="btn btn-text-inherit <? /* btn-interactive */ ?> d-none d-md-block" id="dropdownSignIn" <? /* data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" */ ?>>
            Войти
        </a>
    <? else: ?>
        <div class="text-center">
            <a style="color: #fff;text-decoration: underline" class="d-none d-md-block" href="/tspersonal/"><?= $USER->GetEmail() ?></a> 
            <a style="color: #fff;text-decoration: underline" class="d-none d-md-block" href="/?logout=yes">Выйти</a>
        </div>
    <!--        <a href="/tspersonal/"<? /* href="#" */ ?> class="btn btn-text-inherit <? /* btn-interactive */ ?> d-none d-md-block" id="dropdownSignIn" <? /* data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" */ ?>>
                
            </a>-->
    <? endif ?>
    <div class="dropdown-menu dropdown-menu-right tab-in-dropdown padding-0" aria-labelledby="dropdownSignIn">

        <nav class="menu-horizontal-01">
            <ul class="nav external-link-navs">
                <li><a class="active" data-toggle="tab" href="#loginTabInDropdown01-01s">Авторизоваться</a></li>
                <li><a data-toggle="tab" href="#loginTabInDropdown01-02s">Регистрация </a></li>
                <li class="d-none"><a data-toggle="tab" href="#loginTabInDropdown01-03s">Забыл пароль </a></li>
            </ul>
        </nav>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active padding-0" id="loginTabInDropdown01-01s">

                <div class="form-login">

                    <form>

                        <div class="form-inner">

                            <div class="login-with-socials">
                                <button class="btn btn-facebook btn-block">Войти через Facebook</button>
                            </div>

                            <hr>

                            <div class="form-group">
                                <input id="login_username" class="form-control" placeholder="Email" type="text">
                            </div>
                            <div class="form-group">
                                <input id="login_password" class="form-control" placeholder="Пароль" type="password">
                            </div>

                            <div class="row gap-5 mt-5">
                                <div class="col-12 col-sm-6">
                                    <div class="custom-control custom-checkbox style-01 mt-5">
                                        <input type="checkbox" class="custom-control-input" id="loginForm-02-checkbox-in-tab">
                                        <label class="custom-control-label line-145 pt-5" for="loginForm-02-checkbox-in-tab">Запомни меня</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 text-right">
                                    <div class="nav text-right d-inline-block">
                                        <a href="#loginTabInDropdown01-03s" class="btn btn-link tab-external-link">Напомнить пароль?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary btn-block">Войти</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade in padding-0" id="loginTabInDropdown01-02s">

                <div class="form-login">

                    <form>

                        <div class="form-inner">

                            <div class="login-with-socials">
                                <button class="btn btn-facebook btn-block">Зарегистрироваться через Facebook</button>
                            </div>

                            <hr>
                            <div class="form-group">
                                <input id="login_username" class="form-control" placeholder="Email" type="text">
                            </div>
                            <div class="form-group">
                                <input id="login_password" class="form-control" placeholder="Пароль" type="password">
                            </div>
                            <div class="form-group">
                                <input id="login_password" class="form-control" placeholder="Подтвердить пароль" type="password">
                            </div>

                            <div class="custom-control custom-checkbox style-01 mt-10">
                                <input type="checkbox" class="custom-control-input" id="loginForm-02-01-checkbox-in-tab">
                                <label class="custom-control-label line-145 pt-5" for="loginForm-02-01-checkbox-in-tab">Проверяя здесь, вы соглашаетесь с нашими <a href="#">правилами</a>.</label>
                            </div>

                            <div class="mt-10">
                                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade in padding-0" id="loginTabInDropdown01-03s">
                <div class="form-login">

                    <form>

                        <div class="form-inner">

                            <h5>Забыли свой пароль?</h5>
                            <p class="line-145">Не волнуйтесь, сбросить пароль очень просто, введите свой адрес электронной почты, зарегистрированный у нас</p>

                            <div class="form-group">
                                <input id="login_username" class="form-control" placeholder="Email адрес" type="email">
                            </div>

                            <div class="mt-10">
                                <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                            </div>

                            <div class="mt-15">
                                Вернуться к входу
                                <div class="nav d-inline-block">
                                    <a href="#loginTabInDropdown01-01s" class="tab-external-link">Войти</a>
                                </div>
                                или
                                <div class="nav d-inline-block">
                                    <a href="#loginTabInDropdown01-02s" class="tab-external-link">Зарегистрироваться</a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
