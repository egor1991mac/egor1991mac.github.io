import React, {Suspense, lazy} from 'react';
import ReactDOM from 'react-dom';
import Preloader from './components/loader';
import './index.scss';

import Form from './container/form';
import TransferForm from './container/transfer_form';

import Filter from './container/filter';
//import moment from 'moment';
import * as serviceWorker from './serviceWorker';

const Result = lazy(() => import('./container/result'));
const TransferResult = lazy(() => import('./container/transfer_result'));
const Sort = lazy(() => import('./container/sort'));
//const Sort = lazy(() => import('./container/sort'));

//const Sort = lazy(() => import('./container/sort'));
//ReactDOM.render(<Form/>, document.getElementById('AviaAppForm'));

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.register();


class AviaApp {
    constructor(rootElem, typeElem, langElem, defaultData) {
        this.rootElem = {
            elem: rootElem || null,
            type: typeElem || null,
            lang: langElem || null,
            defaultData: defaultData || null,
            query: null
        };
        this.queryParam = defaultData;
    }

    get _rootElem() {
        return this.rootElem;
    }

    set _rootElem(newValue) {
        if (newValue.elem) {
            this.rootElem = newValue;
            this.initReact();
        }
    }


    initReact = () => {
        if (this.rootElem) {
            switch (this.rootElem.type) {
                case 'Form':
                    ReactDOM.hydrate(<Form lang={this.rootElem.lang}
                                           query={this.rootElem.query}
                                           defaultData={this.rootElem.defaultData}/>
                                           ,this.rootElem.elem);
                    break;
                case 'Filter':
                    ReactDOM.hydrate(
                        <Filter
                            lang={this.rootElem.lang}
                            query={this.rootElem.query}
                            defaultData={this.rootElem.defaultData}
                    />, this.rootElem.elem);
                    break;
                case 'Sort':
                    ReactDOM.hydrate(
                        <Suspense fallback={<div><Preloader/></div>}>
                            <Sort/>
                        </Suspense>,
                        this.rootElem.elem
                    )
                    break;
                case 'Result':
                    ReactDOM.hydrate(
                        <Suspense fallback={<div><Preloader/></div>}>
                            <Result
                                lang={this.rootElem.lang}
                                query={this.rootElem.query}
                                lang={this.rootElem.lang}
                            />
                        </Suspense> ,this.rootElem.elem);
                    break;
                case 'TransferForm':
                    ReactDOM.hydrate(
                        <TransferForm
                            lang={this.rootElem.lang}
                            query={this.rootElem.query}
                            defaultData={this.rootElem.defaultData}
                        />
                        ,this.rootElem.elem);
                    break;
                case 'TransferResult':
                    ReactDOM.hydrate(
                        <Suspense fallback={<div><Preloader/></div>}>
                            <TransferResult
                                lang={this.rootElem.lang}
                                query={this.rootElem.query}
                                lang={this.rootElem.lang}
                            />
                        </Suspense>
                        ,this.rootElem.elem);
                    break;
                default:
                    alert('no init');
                    break;
            }
        }
    }
}


//form
window.AviaApp = new AviaApp();
// const app = new AviaApp();
// app._rootElem = {
//     elem: document.querySelector('#AviaAppForm'),
//     type: 'Form',
//     lang: {
//         FROM: "Откуда",
//         TO: "Куда",
//         DATE_FROM: "Дата вылета",
//         DATE_TO: "Дата вылета обратно",
//         PESSENGERS: "Пассажиры и класс",
//         PESSENGER: "Пассажиры",
//         ADULTS: "Взрослых",
//         ADULTS_INFO: "от 14 и старше",
//         ONE_ADULT: "Взрослый",
//         CHILDREN: "Детей",
//         CHILDREN_INFO: "от 2 до 14",
//         ONE_CHILD: "Ребенок",
//         BABIES: "Младенцев",
//         BABIES_INFO: "от 2 до 14",
//         ONE_BABY: "Младенец",
//         SUBMIT: "Найти",
//         OK_BTN: "OK",
//         CLASS_BUSINESS:"Бизнес",
//         CLASS_ECONOMY:"Эконом",
//         CLASS_FIST:"Первый класс",
//         PREMIUMECONOMY:"Премиум эконом"
//     },
//
//     defaultData: {
//         CLASSES:['Economy','Business','First','PremiumEconomy'],
//         REQUEST: null,
//         IS_AJAX_MODE: window.location.href == window.location.origin ? "N" : "Y",
//         DATE_FORMAT: 'DD.MM.YYYY',
//         SEARCH_DATA: {
//             DEPARTURE: [
//                 {
//                     ID: "1779",
//                     UF_CODE: "DME",
//                     UF_CITY_RU: "Москва",
//                     UF_CITY_EN: "Moscow",
//                     UF_NAME_RU: "Домодедово",
//                     UF_NAME_EN: "Domodedovo",
//                     UF_AREA: "MOW",
//                     UF_COUNTRY: "RU",
//                     UF_TIMEZONE: "Europe/Moscow",
//                     UF_LAT: "55.4145",
//                     UF_LNG: "37.8999",
//                     INPUT_NAME: "airport:1779",
//                     CITY_RU_ID: "Москва~RU",
//                     CITY_INPUT_NAME_RU: "city:Москва~RU",
//                     CITY_EN_ID: "Moscow~RU",
//                     CITY_INPUT_NAME_EN: "city:Moscow~RU",
//                     OBJECT_TYPE: "city",
//                 }
//             ],
//             ARRIVAL: [
//                 {
//                     ID: "2159",
//                     UF_CODE: "EWR",
//                     UF_CITY_RU: "Нью-Йорк",
//                     UF_CITY_EN: "New-York",
//                     UF_NAME_RU: "Ньюарк Либерти",
//                     UF_NAME_EN: "Newark Liberty",
//                     UF_AREA: "NYC",
//                     UF_COUNTRY: "US",
//                     UF_TIMEZONE: "America/New_York",
//                     UF_LAT: "40.69709",
//                     UF_LNG: "-74.17557",
//                     INPUT_NAME: "airport:2159",
//                     CITY_RU_ID: "Нью-Йорк~US",
//                     CITY_INPUT_NAME_RU: "city:Нью-Йорк~US",
//                     CITY_EN_ID: "New-York~US",
//                     CITY_INPUT_NAME_EN: "city:New-York~US",
//                     OBJECT_TYPE: "city",
//                 }
//             ],
//             DATE_DEPARTURE: "30.01.2020",
//            // DATE_ARRIVAL: "22.01.2020",
//             PESSANGER: {
//                 adults: 3,
//                 children: 0,
//                 baby: 0
//             },
//             CLASSES:['Economy']
//         }
//
//     },
//     query: {
//         URL_DATA_FROM: 'http://travelclub.travelsoft.by/local/components/travelsoft/nemoconnect.search.form/templates/.default/ajax/from.php',
//         URL_DATA_TO: 'http://travelclub.travelsoft.by/local/components/travelsoft/nemoconnect.search.form/templates/.default/ajax/to.php',
//     }
// }
//
// app._rootElem = {
//     elem: document.getElementById("AviaAppSort"),
//     type: 'Sort',
// };
// app._rootElem ={
//     elem: document.getElementById("AviaAppFilter"),
//     type: 'Filter',
//     lang: {
//         am:'с 12 до 17:59',
//         e: 'с 18 до 5',
//         m:'с 5 до 11:59'
//     },
//     defaultData: {
//
//     },
// };
// //
// app._rootElem = {
//     elem: document.getElementById("AviaAppResult"),
//     type: 'Result',
//     lang: {
//         FROM: "Откуда",
//         TO: "Куда",
//         DATE_FROM: "Дата вылета",
//         DATE_TO: "Дата вылета обратно",
//         PESSENGERS: "Пассажиры и класс",
//         PESSENGER: "Пассажиры",
//         ADULTS: "Взрослых",
//         ADULTS_INFO: "от 14 и старше",
//         ONE_ADULT: "Взрослый",
//         CHILDREN: "Детей",
//         CHILDREN_INFO: "от 2 до 14",
//         ONE_CHILD: "Ребенок",
//         BABIES: "Младенцев",
//         BABIES_INFO: "от 2 до 14",
//         ONE_BABY: "Младенец",
//         SUBMIT: "Найти",
//         OK_BTN: "OK",
//         CLASS_BUSINESS:"Бизнес",
//         CLASS_ECONOMY:"Эконом",
//         CLASS_FIST:"Первый класс",
//         PREMIUMECONOMY:"Премиум эконом"
//     },
//     defaultData:{
//     },
//     query:{
//         INIT_DATA:'http://travelclub.travelsoft.by/local/components/travelsoft/nemoconnect.search.result/templates/.default/ajax/search.php',
//         OPERATION_DATA:'http://travelclub.travelsoft.by/local/components/travelsoft/nemoconnect.search.result/templates/.default/ajax/operations.php'
//     }
// }

// app._rootElem = {
//     type:'TransferForm',
//     elem: document.getElementById("AviaAppTransferForm"),
//     lang: {
//         FROM: "Откуда",
//         TO: "Куда",
//         DATE_FROM: "Дата вылета",
//         DATE_TO: "Дата вылета обратно",
//         PESSENGERS: "Пассажиры и класс",
//         PESSENGER: "Пассажиры",
//         ADULTS: "Взрослых",
//         ADULTS_INFO: "от 14 и старше",
//         ONE_ADULT: "Взрослый",
//         CHILDREN: "Детей",
//         CHILDREN_INFO: "от 2 до 14",
//         ONE_CHILD: "Ребенок",
//         BABIES: "Младенцев",
//         BABIES_INFO: "от 2 до 14",
//         ONE_BABY: "Младенец",
//         SUBMIT: "Найти",
//         OK_BTN: "OK",
//         CLASS_BUSINESS:"Бизнес",
//         CLASS_ECONOMY:"Эконом",
//         CLASS_FIST:"Первый класс",
//         PREMIUMECONOMY:"Премиум эконом"
//     },
//     defaultData: {
//         REQUEST: null,
//         IS_AJAX_MODE: window.location.href == window.location.origin ? "N" : "Y",
//         SEARCH_DATA: {
//             DEPARTURE: [
//                 {
//                     ID: "ChIJuQNzAd1LtUYRwlAkWpQ_9tE",
//                     NAME: "Москва Сити, Пресненская набережная, Москва, Россия",
//                     FIRST_PART: "Москва Сити",
//                     SECOND_PART: "Пресненская набережная, Москва, Россия",
//                     INPUT_VALUE: "eyJJRCI6IkNoSUp1UU56QWQxTHRVWVJ3bEFrV3BRXzl0RSIsIk5BTUUiOiJcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAgXHUwNDIxXHUwNDM4XHUwNDQyXHUwNDM4LCBcdTA0MWZcdTA0NDBcdTA0MzVcdTA0NDFcdTA0M2RcdTA0MzVcdTA0M2RcdTA0NDFcdTA0M2FcdTA0MzBcdTA0NGYgXHUwNDNkXHUwNDMwXHUwNDMxXHUwNDM1XHUwNDQwXHUwNDM1XHUwNDM2XHUwNDNkXHUwNDMwXHUwNDRmLCBcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAsIFx1MDQyMFx1MDQzZVx1MDQ0MVx1MDQ0MVx1MDQzOFx1MDQ0ZiIsIkZJUlNUX1BBUlQiOiJcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAgXHUwNDIxXHUwNDM4XHUwNDQyXHUwNDM4IiwiU0VDT05EX1BBUlQiOiJcdTA0MWZcdTA0NDBcdTA0MzVcdTA0NDFcdTA0M2RcdTA0MzVcdTA0M2RcdTA0NDFcdTA0M2FcdTA0MzBcdTA0NGYgXHUwNDNkXHUwNDMwXHUwNDMxXHUwNDM1XHUwNDQwXHUwNDM1XHUwNDM2XHUwNDNkXHUwNDMwXHUwNDRmLCBcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAsIFx1MDQyMFx1MDQzZVx1MDQ0MVx1MDQ0MVx1MDQzOFx1MDQ0ZiJ9"
//                 }
//
//             ],
//             ARRIVAL: [
//                 {
//                     ID: "ChIJNdpAV3hKtUYRrb_H0K9iKYU",
//                     NAME: "Москва Ленинградская, Комсомольская площадь, Москва, Россия",
//                     FIRST_PART: "Москва Ленинградская",
//                     SECOND_PART: "Комсомольская площадь, Москва, Россия",
//                     INPUT_VALUE: "eyJJRCI6IkNoSUpOZHBBVjNoS3RVWVJyYl9IMEs5aUtZVSIsIk5BTUUiOiJcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAgXHUwNDFiXHUwNDM1XHUwNDNkXHUwNDM4XHUwNDNkXHUwNDMzXHUwNDQwXHUwNDMwXHUwNDM0XHUwNDQxXHUwNDNhXHUwNDMwXHUwNDRmLCBcdTA0MWFcdTA0M2VcdTA0M2NcdTA0NDFcdTA0M2VcdTA0M2NcdTA0M2VcdTA0M2JcdTA0NGNcdTA0NDFcdTA0M2FcdTA0MzBcdTA0NGYgXHUwNDNmXHUwNDNiXHUwNDNlXHUwNDQ5XHUwNDMwXHUwNDM0XHUwNDRjLCBcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAsIFx1MDQyMFx1MDQzZVx1MDQ0MVx1MDQ0MVx1MDQzOFx1MDQ0ZiIsIkZJUlNUX1BBUlQiOiJcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAgXHUwNDFiXHUwNDM1XHUwNDNkXHUwNDM4XHUwNDNkXHUwNDMzXHUwNDQwXHUwNDMwXHUwNDM0XHUwNDQxXHUwNDNhXHUwNDMwXHUwNDRmIiwiU0VDT05EX1BBUlQiOiJcdTA0MWFcdTA0M2VcdTA0M2NcdTA0NDFcdTA0M2VcdTA0M2NcdTA0M2VcdTA0M2JcdTA0NGNcdTA0NDFcdTA0M2FcdTA0MzBcdTA0NGYgXHUwNDNmXHUwNDNiXHUwNDNlXHUwNDQ5XHUwNDMwXHUwNDM0XHUwNDRjLCBcdTA0MWNcdTA0M2VcdTA0NDFcdTA0M2FcdTA0MzJcdTA0MzAsIFx1MDQyMFx1MDQzZVx1MDQ0MVx1MDQ0MVx1MDQzOFx1MDQ0ZiJ9"
//
//                 }
//             ],
//
//         }
//
//     },
//         query: {
//             URL_DATA_FROM: 'http://travelclub.travelsoft.by/local/components/travelsoft/iway.search.form/templates/.default/ajax/from.php',
//             URL_DATA_TO: 'http://travelclub.travelsoft.by/local/components/travelsoft/iway.search.form/templates/.default/ajax/to.php',
//         }
// }
// app._rootElem = {
//     elem: document.getElementById("AviaAppTransferResult"),
//     type: 'TransferResult',
//     lang: {
//         FROM: "Откуда",
//         TO: "Куда",
//         DATE_FROM: "Дата вылета",
//         DATE_TO: "Дата вылета обратно",
//         PESSENGERS: "Пассажиры и класс",
//         PESSENGER: "Пассажиры",
//         ADULTS: "Взрослых",
//         ADULTS_INFO: "от 14 и старше",
//         ONE_ADULT: "Взрослый",
//         CHILDREN: "Детей",
//         CHILDREN_INFO: "от 2 до 14",
//         ONE_CHILD: "Ребенок",
//         BABIES: "Младенцев",
//         BABIES_INFO: "от 2 до 14",
//         ONE_BABY: "Младенец",
//         SUBMIT: "Найти",
//         OK_BTN: "OK",
//         CLASS_BUSINESS:"Бизнес",
//         CLASS_ECONOMY:"Эконом",
//         CLASS_FIST:"Первый класс",
//         PREMIUMECONOMY:"Премиум эконом"
//     },
//     defaultData:{
//     },
//     query:{
//         INIT_DATA:'http://travelclub.travelsoft.by/local/components/travelsoft/iway.search.result/templates/.default/ajax/search.php',
//         OPERATION_DATA:'http://travelclub.travelsoft.by/local/components/travelsoft/iway.search.result/templates/.default/ajax/operations.php'
//     }
// }








