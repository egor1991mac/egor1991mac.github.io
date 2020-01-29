	<?/* Если мы НЕ находимся на главной */?>
	<? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
			</div>
		</div>
	<?endif?>
      <div class="theme-footer" id="mainFooter">
         <div class="container _ph-mob-0">
            <div class="row row-eq-height row-mob-full" data-gutter="60">
               <div class="col-md-3">
                  <div class="theme-footer-section theme-footer-">
                     <a class="theme-footer-brand _mb-mob-30" href="#">
						 	<?if(!empty($APPLICATION->GetDirProperty("STYLE_COLOR"))):?>
								<img src="<?= SITE_TEMPLATE_PATH ?>/img/logo-<?=$APPLICATION->GetDirProperty("STYLE_COLOR")?>.png" alt="TravelClub" title="TravelClub"/>
							<?else:?>
								<img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" alt="TravelClub" title="TravelClub"/>
							<?endif?>
                     </a>
                     <div class="theme-footer-brand-text">
                        <p>Текст текст  текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст </p>
                        <p>Текст текст  текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="theme-footer-section theme-footer-">
                           <h5 class="theme-footer-section-title">Услуги</h5>
							 <?
								$APPLICATION->IncludeComponent(
									"bitrix:menu",
									"footer_menu",
									array(
										"ROOT_MENU_TYPE" => "bottom",
										"MAX_LEVEL" => "1",
										"CHILD_MENU_TYPE" => "left",
										"USE_EXT" => "N",
										"DELAY" => "N",
										"ALLOW_MULTI_SELECT" => "N",
										"MENU_CACHE_TYPE" => "A",
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"MENU_CACHE_GET_VARS" => array(
										),
										"COMPONENT_TEMPLATE" => "bottom.menu"
									),
									false
								);?>

                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="theme-footer-section theme-footer-">
                           <h5 class="theme-footer-section-title">О сервисе</h5>
							 <?
								$APPLICATION->IncludeComponent(
									"bitrix:menu",
									"footer_menu",
									array(
										"ROOT_MENU_TYPE" => "bottom",
										"MAX_LEVEL" => "1",
										"CHILD_MENU_TYPE" => "left",
										"USE_EXT" => "N",
										"DELAY" => "N",
										"ALLOW_MULTI_SELECT" => "N",
										"MENU_CACHE_TYPE" => "A",
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"MENU_CACHE_GET_VARS" => array(
										),
										"COMPONENT_TEMPLATE" => "bottom.menu"
									),
									false
								);?>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="theme-footer-section theme-footer-">
                           <h5 class="theme-footer-section-title">Личный кабинет</h5>
							 <?
								$APPLICATION->IncludeComponent(
									"bitrix:menu",
									"footer_menu",
									array(
										"ROOT_MENU_TYPE" => "bottom",
										"MAX_LEVEL" => "1",
										"CHILD_MENU_TYPE" => "left",
										"USE_EXT" => "N",
										"DELAY" => "N",
										"ALLOW_MULTI_SELECT" => "N",
										"MENU_CACHE_TYPE" => "A",
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_USE_GROUPS" => "Y",
										"MENU_CACHE_GET_VARS" => array(
										),
										"COMPONENT_TEMPLATE" => "bottom.menu"
									),
									false
								);?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="theme-footer-section theme-footer-section-subscribe bg-grad _mt-mob-30">
					  <div class="theme-footer-section-subscribe-bg" style="background-image:url(<?= SITE_TEMPLATE_PATH ?>/img/footer/footer_subscribe_bg.png);"></div>
                     <div class="theme-footer-section-subscribe-content">
                        <h5 class="theme-footer-section-title">Сэкономьте до 50% от вашей следующей поездки</h5>
                        <p class="text-muted">Подпишитесь, чтобы разблокировать наши секретные предложения</p>
                        <form>
                           <div class="form-group">
                              <input class="form-control theme-footer-subscribe-form-control" type="email" placeholder="Введите свой email"/>
                           </div>
                           <button class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn" type="submit">Получить предложения</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="theme-copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <p class="theme-copyright-text">Copyright &copy; 2019
                     <a href="#">TRAVEL CLUB</a>. All rights reserved.
                  </p>
               </div>
               <div class="col-md-6">
                  <ul class="theme-copyright-social">
                     <li>
                        <a class="fa fa-facebook" href="#"></a>
                     </li>
                     <li>
                        <a class="fa fa-google" href="#"></a>
                     </li>
                     <li>
                        <a class="fa fa-twitter" href="#"></a>
                     </li>
                     <li>
                        <a class="fa fa-youtube-play" href="#"></a>
                     </li>
                     <li>
                        <a class="fa fa-instagram" href="#"></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
<? $APPLICATION->ShowPanel() ?>
    <div id="autoCompleatePopper"></div>



    <script>!function (c) {
            function e(e) {
                for (var r, t, n = e[0], o = e[1], a = e[2], u = 0, i = []; u < n.length; u++) t = n[u], Object.prototype.hasOwnProperty.call(f, t) && f[t] && i.push(f[t][0]), f[t] = 0;
                for (r in o) Object.prototype.hasOwnProperty.call(o, r) && (c[r] = o[r]);
                for (d && d(e); i.length;) i.shift()();
                return s.push.apply(s, a || []), l()
            }

            function l() {
                for (var e, r = 0; r < s.length; r++) {
                    for (var t = s[r], n = !0, o = 1; o < t.length; o++) {
                        var a = t[o];
                        0 !== f[a] && (n = !1)
                    }
                    n && (s.splice(r--, 1), e = p(p.s = t[0]))
                }
                return e
            }

            var t = {}, f = {1: 0}, s = [];

            function p(e) {
                if (t[e]) return t[e].exports;
                var r = t[e] = {i: e, l: !1, exports: {}};
                return c[e].call(r.exports, r, r.exports, p), r.l = !0, r.exports
            }

            p.e = function (o) {
                var e = [], t = f[o];
                if (0 !== t) if (t) e.push(t[2]); else {
                    var r = new Promise(function (e, r) {
                        t = f[o] = [e, r]
                    });
                    e.push(t[2] = r);
                    var n, a = document.createElement("script");
                    a.charset = "utf-8", a.timeout = 120, p.nc && a.setAttribute("nonce", p.nc), a.src = p.p + "static/js/" + ({}[o] || o) + "." + {
                        3: "a02fa191",
                        4: "20a9427e",
                        5: "88afe951"
                    }[o] + ".chunk.js";
                    var u = new Error;
                    n = function (e) {
                        a.onerror = a.onload = null, clearTimeout(i);
                        var r = f[o];
                        if (0 !== r) {
                            if (r) {
                                var t = e && ("load" === e.type ? "missing" : e.type), n = e && e.target && e.target.src;
                                u.message = "Loading chunk " + o + " failed.\n(" + t + ": " + n + ")", u.name = "ChunkLoadError", u.type = t, u.request = n, r[1](u)
                            }
                            f[o] = void 0
                        }
                    };
                    var i = setTimeout(function () {
                        n({type: "timeout", target: a})
                    }, 12e4);
                    a.onerror = a.onload = n, document.head.appendChild(a)
                }
                return Promise.all(e)
            }, p.m = c, p.c = t, p.d = function (e, r, t) {
                p.o(e, r) || Object.defineProperty(e, r, {enumerable: !0, get: t})
            }, p.r = function (e) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
            }, p.t = function (r, e) {
                if (1 & e && (r = p(r)), 8 & e) return r;
                if (4 & e && "object" == typeof r && r && r.__esModule) return r;
                var t = Object.create(null);
                if (p.r(t), Object.defineProperty(t, "default", {
                    enumerable: !0,
                    value: r
                }), 2 & e && "string" != typeof r) for (var n in r) p.d(t, n, function (e) {
                    return r[e]
                }.bind(null, n));
                return t
            }, p.n = function (e) {
                var r = e && e.__esModule ? function () {
                    return e.default
                } : function () {
                    return e
                };
                return p.d(r, "a", r), r
            }, p.o = function (e, r) {
                return Object.prototype.hasOwnProperty.call(e, r)
            }, p.p = "<?= SITE_TEMPLATE_PATH ?>/", p.oe = function (e) {
                throw console.error(e), e
            };
            var r = this.webpackJsonpavia = this.webpackJsonpavia || [], n = r.push.bind(r);
            r.push = e, r = r.slice();
            for (var o = 0; o < r.length; o++) e(r[o]);
            var d = n;
            l()
        }([])</script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/static/js/2.2ee83c1c.chunk.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/static/js/main.decbf9e5.chunk.js"></script>
</body>
</html>


