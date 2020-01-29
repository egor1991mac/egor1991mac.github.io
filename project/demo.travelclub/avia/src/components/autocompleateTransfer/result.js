import React, {useContext} from 'react';
import {groupBy} from "lodash";
import {PopupContext} from "../popper/context";
import {AutoCompleateContext} from "./context";
import {FETCH_DATA} from "../../source/const";


const Result = ({}) => {
    const {state, type, handleSelectData, handleFetchStatus} = useContext(AutoCompleateContext);
    const {handleHidePopup} = useContext(PopupContext);


    const fetchingData = state[FETCH_DATA] ? state[FETCH_DATA].read().data : null;


    const handleClick = item => e =>{

        handleSelectData(item);
        handleHidePopup();
    };

    return fetchingData ?
        <div className={'popupForm'}>
            <ul className={"autoCompleate"}>
                {
                    fetchingData.points.map(point =>
                        <li key={point.ID} className={"autoCompleate-inner-item flex-column"} onClick={handleClick(point)}>
                            {point.FIRST_PART}
                            <div>
                                <small className={"_ml-0"}>{point.SECOND_PART}</small>
                            </div>
                        </li>
                    )
                }

            </ul>
        </div>
        : null
    //return null;
};

export default Result;