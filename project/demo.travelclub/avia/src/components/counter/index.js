import React, {useContext} from 'react';
import {SELECT_DATA} from "../../source/const";
import Popup from "../popper";
import {CounterContext, PopupContext} from "../../container/form/context/context";
import './style.scss';
import Result   from './result'

const Counter = ({inputName,lang, ...rest}) => {
    const {handleShowPopup, handleHidePopup} = useContext(PopupContext);
    const {state,state:{adults,children,baby}} = useContext(CounterContext);
    const InputRef = React.createRef();

    return (
        <div
            className="theme-search-area-section first theme-search-area-section-fade-white theme-search-area-section-no-border theme-search-area-section-mr theme-search-area-section-sm theme-search-area-section-curved">
            <label htmlFor="" className={"theme-search-area-section-label text-white _ml-10"}>{lang.label[0]}</label>
            <div className="theme-search-area-section-inner">
                <i className="theme-search-area-section-icon  lin lin-people"></i>
                <input className="theme-search-area-section-input"
                       type="text"
                       placeholder={lang.label[1]}
                       name={inputName}
                       data-value={JSON.stringify(state)}
                       value={`${adults + children + baby} ${(adults + children + baby) > 1 ? lang.label[1] : lang.label[1]}`}
                       onClick={handleShowPopup}
                       ref={InputRef}
                       autoComplete="off"
                />
            </div>

            <Popup innerRef={InputRef}>
               <Result lang={lang}>
                   {rest.children}
               </Result>
            </Popup>
        </div>
    );
};

export default Counter;