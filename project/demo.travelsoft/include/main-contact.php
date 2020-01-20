<div class="container-fluid main-contact">
    <div class="row">
        <div class="map-frame" id="wrapMap">
            <iframe loading="lazy" src="https://yandex.by/map-widget/v1/-/CCsnb1S" style="pointer-events: none;" width="1920" height="400" frameborder="0" allowfullscreen="true"></iframe>
        </div>
    </div>

    <div class="row h-100 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-border">
                        <div class="card-body">
                            <h3>Контакты</h3>
                            <div class="hr"></div>
								<?$APPLICATION->IncludeFile("/include/contact_footer.php", Array(), Array(
									"MODE"      => "html",
									"NAME"      => "О компании (текст)",
								));?>                          
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary my-auto ml-3 d-none d-lg-block" data-toggle="modal" data-target="#exampleModal">
                                    <span class="icon icon-phone mr-2"></span>
                                    Перезвонить мне
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // создаём элемент <div>, который будем перемещать вместе с указателем мыши пользователя
    var mapTitle = document.createElement('div'); mapTitle.className = 'mapTitle';
    // вписываем нужный нам текст внутрь элемента
    mapTitle.textContent = 'Для активации карты нажмите по ней';
    // добавляем элемент с подсказкой последним элементов внутрь нашего <div> с id wrapMap
    wrapMap.appendChild(mapTitle);
    // по клику на карту
    wrapMap.onclick = function() {
        // убираем атрибут "style", в котором прописано свойство "pointer-events"
        this.children[0].removeAttribute('style');
        // удаляем элемент с интерактивной подсказкой
        mapTitle.parentElement.removeChild(mapTitle);
    }
    // по движению мыши в области карты
    wrapMap.onmousemove = function(event) {
        // показываем подсказку
        mapTitle.style.display = 'block';
        // двигаем подсказку по области карты вместе с мышкой пользователя
        if(event.offsetY > 10) mapTitle.style.top = event.offsetY + 20 + 'px';
        if(event.offsetX > 10) mapTitle.style.left = event.offsetX + 20 + 'px';
    }
    // при уходе указателя мыши с области карты
    wrapMap.onmouseleave = function() {
        // прячем подсказку
        mapTitle.style.display = 'none';
    }
</script>