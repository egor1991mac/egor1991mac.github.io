import React, {useContext} from 'react';
import {groupBy} from "lodash";
import {AutoCompleateContext, PopupContext} from "../../container/form/context/context";
import {FETCH_DATA} from "../../source/const";


const Result = ({}) => {
    const {state, type, handleSelectData, handleFetchStatus} = useContext(AutoCompleateContext);
    const {handleHidePopup} = useContext(PopupContext);


    //console.log(state[FETCH_DATA].read());


    const fetchingData = state[FETCH_DATA] ? state[FETCH_DATA].read().data : null;
    const airports = fetchingData ? groupBy(fetchingData.airports, (item) => item.UF_CITY_RU) : null;
    const countries = fetchingData ? fetchingData.countries : [];

    if (airports != null) {
        Object.values(airports).forEach((airport, index) => {
            let country = countries.find(country => country.UF_CODE == airport[0].UF_COUNTRY.replace(/"/g));

            if (airport.length > 0) {
                airport.forEach(item => {
                    item.UF_COUNTRY_NAME_RU = typeof country != "undefined" ? country.UF_NAME_RU : '';
                })
            }
        })
    }


    const handleClick = (item,flag) => e => {
        handleSelectData(item,flag);
        handleHidePopup();
    };

    return (
        airports ?
            <div className={'popupForm'}>
            <ul className={"autoCompleate"}>
                {
                    Object.keys(airports).map((key, index) =>

                        <li key={index} className={"autoCompleate-item"}>

                            <div className={"autoCompleate-item__header"} onClick={handleClick(airports[key][0],0)}>
                                <div>
                                    {key}, <small >{airports[key][0].UF_COUNTRY_NAME_RU}</small>
                                </div>
                                <div>
                                    <small>
                                        {airports[key][0].UF_AREA}
                                    </small>
                                </div>

                            </div>
                            <ul className={"autoCompleate-inner"} style={{position: "relative", display: "block"}}>
                                {
                                    airports[key].map(item =>
                                        <li key={item.ID} onClick={handleClick(item,1)}
                                            className={"autoCompleate-inner-item"}>
                                            <span>{item.UF_NAME_RU == "" ? key : item.UF_NAME_RU}</span><small>{item.UF_CODE} </small>
                                        </li>
                                    )
                                }
                            </ul>

                        </li>
                    )
                }
            </ul>
            </div>
            : null
    )
    //return null;
};

export default Result;