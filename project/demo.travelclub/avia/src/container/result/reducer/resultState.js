import React, {useReducer, useMemo, useContext, useEffect} from 'react';
import {GetDataTickets, GetMoreTicket} from '../action/actionFetchData';
import {ResultContext} from "../context/context";
import {ResultReducer} from "./resultReducer";
import {useFetchDataResultDeparture, useFetchDataTicketsGet} from "../../../source/api";
import {FETCH_DATA, LOADING, PAGE, REQUEST_ID} from "../../../source/const";
import usePrevious from '../../../hooks/usePrevious';
import useCustomEvent from '../../../hooks/useCustomEvent';
import axios from 'axios';
import qs from 'qs';
import demoData from '../demo-date';


function getSelectedFilter (filter_values){
    if(filter_values){
        let data = {};
        Object.keys(filter_values).forEach(key=>{
            let x = Object.keys(filter_values[key]).filter(item => filter_values[key][item] == true);
            if(x.length != 0){
                data = {...data,[key]:x}
            }

        });
        return data;
    }
    else return null;
}


export const ResultState = ({url, inputName, children, defaultData, lang}) => {

    const defaultState = {
        [FETCH_DATA]: null,
        [LOADING]: false,
        [PAGE]: 1,
        [REQUEST_ID]:null
    };

    const dispatchDataFilter = useCustomEvent;
    const [state, dispatch] = useReducer(ResultReducer, defaultState);

    useEffect(() =>{
        GetDataTickets(dispatch, url.INIT_DATA,dispatchDataFilter("dispatchDataFilter"));
    }, []);

    useEffect(() => {
        document.addEventListener('dispatchForm', function (e) {
            GetDataTickets(dispatch, url.INIT_DATA,dispatchDataFilter("dispatchDataFilter"));
        });
        return () => {
            document.removeEventListener('dispatchForm', function (e) {})}
    },[window.history.state]);



    let prevFilterCount = usePrevious(window.history.state ? getSelectedFilter(window.history.state.filter_values)  : null);
    let prevRequestId = usePrevious(state[REQUEST_ID]);
    useEffect(()=>{
        //console.log(state[REQUEST_ID])
        // document.addEventListener('dispatchSortPrice', function (e) {
        //     const {sortPrice} = e.detail;
        //     const body = {
        //         request_id: state[REQUEST_ID],
        //         page: state[PAGE],
        //         sort: {
        //             by: "price",
        //             order: sortPrice ? "asc" : "desc"
        //         },
        //     };
        //     state[REQUEST_ID] && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
        // });
        // document.addEventListener('dispatchSortDuration', function (e) {
        //     const {sortDuration} = e.detail;
        //     const body = {
        //         request_id: state[REQUEST_ID],
        //         page: state[PAGE],
        //         sort: {
        //             by: "duration",
        //             order: sortDuration ? "asc" : "desc"
        //         },
        //     };
        //     state[REQUEST_ID] && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
        // });
        document.addEventListener('dispatchNewData',function (e) {
            const {filter_values = null, sort = null, } = window.history.state;
                console.log(state[PAGE]);
                const body = {
                    request_id: state[REQUEST_ID],
                    page: state[PAGE],
                    sort: {...sort},
                    filter: filter_values ? getSelectedFilter(filter_values) : {}
                };
                if(Object.keys(body.filter).length > 0 ){
                    if(prevRequestId != state[REQUEST_ID] && state[REQUEST_ID]){
                        GetMoreTicket(dispatch, url.OPERATION_DATA, body);
                    }
                }
                else if(Object.keys(body.filter).length == 0 && prevFilterCount ){
                    if(prevRequestId != state[REQUEST_ID] && state[REQUEST_ID]){
                        GetMoreTicket(dispatch, url.OPERATION_DATA, body);
                    }
                }

        });
        return () => {
            document.removeEventListener('dispatchNewData', function (e) {});
            // document.removeEventListener('dispatchSortDuration', function (e) {});
            // document.removeEventListener('dispatchFilterEvent', function (e) {});
        }
    })

    const prevPage = usePrevious(state[PAGE]);
    // useEffect(()=>{
    //     document.addEventListener('dispatchSortPrice', function (e) {
    //         const {sortPrice} = e.detail;
    //         const body = {
    //             request_id: state[REQUEST_ID],
    //             page: state[PAGE],
    //             sort: {
    //                 by: "price",
    //                 order: sortPrice ? "asc" : "desc"
    //             },
    //         };
    //         (prevPage != state[PAGE] && prevPage != undefined) && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
    //     });
    //     document.addEventListener('dispatchSortDuration', function (e) {
    //         const {sortDuration} = e.detail;
    //         const body = {
    //             request_id: state[REQUEST_ID],
    //             page: state[PAGE],
    //             sort: {
    //                 by: "duration",
    //                 order: sortDuration ? "asc" : "desc"
    //             },
    //         };
    //     });
    //     document.addEventListener('dispatchFilterEvent',function (e) {
    //         const {filter_values = null, sort = null} = window.history.state;
    //         if(filter_values){
    //             let data = getSelectedFilter(filter_values);
    //             const body = {
    //                 request_id: state[REQUEST_ID],
    //                 page: state[PAGE],
    //                 sort: {...sort},
    //                 filter: {...data}
    //             };
    //             if(Object.keys(data).length > 0 ){
    //
    //                 (prevPage != state[PAGE] && prevPage != undefined) && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
    //             }
    //             else if(Object.keys(data).length == 0 && prevFilterCount ){
    //                 console.log(4);
    //                 (prevPage != state[PAGE] && prevPage != undefined) && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
    //             }
    //         }
    //     });
    //     return () => {
    //         document.removeEventListener('dispatchSortPrice', function (e) {
    //         })
    //         document.removeEventListener('dispatchSortDuration', function (e) {});
    //         document.removeEventListener('dispatchFilterEvent', function (e) {});
    //     }
    // },[state[PAGE]]);


    const handleNextPage = () => {
        const {total_page_count} = state;
        if(total_page_count >= state[PAGE]){
            const body = {
                request_id: state[REQUEST_ID],
                page: state[PAGE] + 1
            };
            dispatch({type: [PAGE]});
            window.history.pushState({...window.history.state, page: state[PAGE] + 1},'title','')
            GetMoreTicket(dispatch, url.OPERATION_DATA, body);
        }
    }




    return (
        <ResultContext.Provider
            value={{
                handleNextPage,
                lang,
                state,
            }}
        >
                {
                    children
                }
        </ResultContext.Provider>
    )
};
