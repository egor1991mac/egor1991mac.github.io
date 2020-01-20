import React, {useReducer, useMemo, useContext, useEffect} from 'react';
import {FETCH_DATA, QUERY_DATA} from "../../../source/const";
import {ResultContext} from "../context/context";
import {ResultReducer} from "./resultReducer";
import {useFetchDataResultDeparture, useFetchDataTicketsGet} from "../../../source/api";
import axios from 'axios';
import qs from 'qs';
import demoData from '../demo-date';

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}




export const ResultState = ({url, inputName, children,defaultData}) => {
    const defaultState = {
        [FETCH_DATA]: null,
    };


    const fetchDataGet = useFetchDataTicketsGet;
    const [state,dispatch] = useReducer(ResultReducer,defaultState);


    function GetDataTickets () {
        if(window.history.state){
            const {state: {SEARCH}} = window.history;
            const {DATE_ARRIVAL, DATE_DEPARTURE, ...rest} = SEARCH;
            let body = {};
            if (SEARCH.DATE_ARRIVAL == null) {
                body = {
                    SEARCH: {
                        ...rest,
                        DATE: DATE_DEPARTURE
                    }
                };
            }
            else{
                body = {
                    SEARCH: {
                        ...rest,
                        DATE: DATE_DEPARTURE,
                        DATE_BACK: DATE_ARRIVAL,
                    }
                };
            };

            dispatch({
                type: [FETCH_DATA],
                payload: {
                    [FETCH_DATA]: fetchDataGet(`${url}/?${qs.stringify(body)}`)
                }
            })
        }

    }
    useEffect(GetDataTickets,[])
    useMemo(()=>{



        document.addEventListener('dispatchForm',function (e) {

            GetDataTickets();

        });

        return ()=>{
            document.removeEventListener('dispatchForm',function(e){})
        }
    },[
        window.history.state
    ]);



    return (
        <ResultContext.Provider
            value={{

                state,
            }}
        >
            <div className="container bg-white _mt-30">
                {
                    children
                }
            </div>
        </ResultContext.Provider>
    )
};
