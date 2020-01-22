import React, {useContext} from 'react';
import DayPicker from 'react-day-picker';
import 'react-day-picker/lib/style.css';
import * as locale from './locale';
import MomentLocaleUtils, {
    formatDate,
    parseDate,
} from 'react-day-picker/moment';

import './style.scss';

import {DatePickerContext, PopupContext} from "../../container/form/context/context";
import {SELECT_DATA} from "../../source/const";
import Popup from "../popper";

function dateToSting(val){
    console.log(new Date().now());
    return `${val.getUTCDay()}.${val.getUTCMonth()}.${val.getUTCFullYear()}`;
}
const DatePicker = ({inputName, lang, showBtnClose=false}) => {
    const {handleShowPopup, handleHidePopup} = useContext(PopupContext);
    const {state,handleSelectDay,handleClearDay} = useContext(DatePickerContext);
    const InputRef = React.createRef();

    const modifires = {
        sunday: {daysOfWeek: [0, 6]},
        //hilight: toDateArray(initData)
    };

    return (
        <div
            className="theme-search-area-section first theme-search-area-section-fade-white theme-search-area-section-no-border theme-search-area-section-mr theme-search-area-section-sm theme-search-area-section-curved">
            <label htmlFor="" className={"theme-search-area-section-label text-white _ml-10"}>{lang.LABEL}</label>
            <div className="theme-search-area-section-inner">

                <i className="theme-search-area-section-icon lin lin-calendar"></i>


                <input className="theme-search-area-section-input "
                       type="text"
                       placeholder={lang.LABEL}
                       onClick={handleShowPopup}
                       ref={InputRef}
                       data-value={JSON.stringify(formatDate(state[SELECT_DATA],'DD.MM.YYYY'))}
                       name={inputName}
                       value = {state[SELECT_DATA] ? formatDate(state[SELECT_DATA],'DD.MM.YYYY') : ''}
                       autoComplete="off"
                />
                {
                    state[SELECT_DATA] &&
                    <span onClick={handleClearDay} className={"lin lin-close search_form-clear-btn"}></span>
                }

                <Popup innerRef={InputRef}>
                    <div className={'popupForm'}>
                        {
                            showBtnClose &&
                                <button onClick={(e)=>{
                                    handleHidePopup();
                                    handleClearDay();
                                }} className={"btn btn-primary-inverse  _mr-10 _ml-10 _mt-10 _mb-10"}>Обратный билет не нужен</button>
                        }

                    <DayPicker
                        firstDayOfWeek={1}
                        months={locale.MONTHS}
                        weekdaysLong={locale.WEEKDAYS_SHORT}
                        weekdaysShort={locale.WEEKDAYS_SHORT}
                        initialMonth={new Date()}
                        disabledDays={{
                            before: new Date()
                        }}
                        modifiers={modifires}
                        selectedDays={state[SELECT_DATA]}
                        onDayClick={(day)=>{
                            handleSelectDay(day);
                            handleHidePopup();
                        }}
                    />
                    </div>
                </Popup>
            </div>
        </div>
    );
};

export default DatePicker;