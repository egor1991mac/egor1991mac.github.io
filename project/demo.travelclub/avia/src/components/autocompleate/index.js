import React, {Suspense, useState, useContext, useRef, useLayoutEffect,useMemo, useEffect} from 'react';
import Result from "./result";
import {AutoCompleateContext, PopupContext} from "../../container/form/context/context";
import {SEARCH_DATA, SELECT_DATA, INPUT_DATA, FETCH_DATA, FETCH_STATUS_DATA} from "../../source/const";
import {isEmpty} from 'lodash';
import Popup from '../popper';
import {PopupState} from "../../container/form/context/PopupState";
import Preloader from "../loader";

// const templateValue =  (state) =>{
//     return `${state.UF_NAME_RU ? state.UF_NAME_RU : state.UF_CITY_RU}`
// }






const AutoCompleate = ({lang,inputName}) => {

    const {state:{SELECT_DATA, INPUT_DATA, PLACEHOLDER_DATA},handleFetchData, handleInputClearData, handleInputSetData, handleFetchStatus} = useContext(AutoCompleateContext);
    const {handleShowPopup} = useContext(PopupContext);



    const handleChange = ({target: {value}}) => {
        handleFetchData(value);
        handleInputSetData(value);
        handleShowPopup(true);
    };

    const handleFocus = () =>{
        handleInputClearData();
    };
    const handleBlur = () =>{
        if(!isEmpty(SELECT_DATA)){
            handleInputSetData(PLACEHOLDER_DATA)
        }
    };



    const InputRef = React.createRef();



    return (

            <div
                className="theme-search-area-section first theme-search-area-section-fade-white theme-search-area-section-no-border theme-search-area-section-mr theme-search-area-section-sm theme-search-area-section-curved">
                <label htmlFor="" className={"theme-search-area-section-label text-white _ml-10"}>{lang.LABEL}</label>
                <div className="theme-search-area-section-inner">
                    <i className="theme-search-area-section-icon lin lin-location-pin"></i>
                    <input className="theme-search-area-section-input typeahead"
                           type="text" //
                           placeholder={!isEmpty(SELECT_DATA) ? PLACEHOLDER_DATA : lang.LABEL}
                           onChange={handleChange}
                           onBlur={handleBlur}
                           onFocus={handleFocus}
                           name={inputName}
                           data-value = {JSON.stringify(SELECT_DATA)}
                           ref={InputRef}
                           value={INPUT_DATA || ''}
                           autoComplete="off"
                    />
                    <Suspense fallback={<Preloader classes={'input_preloader'}/>}>
                        <Popup innerRef={InputRef}>
                                <Result/>
                        </Popup>
                    </Suspense>

                </div>
            </div>

    );
};

export default AutoCompleate;