import React, {useReducer, useMemo, useContext, useEffect} from 'react';
import {GetDataTickets, GetMoreTicket} from '../action/actionFetchData';
import {ResultContext} from "../context/context";
import {ResultReducer} from "./resultReducer";
import {useFetchDataResultDeparture, useFetchDataTicketsGet} from "../../../source/api";
import {FETCH_DATA, LOADING, PAGE, REQUEST_ID} from "../../../source/const";
import usePrevious from '../../../hooks/usePrevious';
import axios from 'axios';
import qs from 'qs';
import demoData from '../demo-date';


export const ResultState = ({url, inputName, children, defaultData, lang}) => {

    const defaultState = {
        [FETCH_DATA]: null,
        [LOADING]: false,
        [PAGE]: 1,
        [REQUEST_ID]:null
    };

    const [state, dispatch] = useReducer(ResultReducer, defaultState);
    useMemo(() => {

        document.addEventListener('dispatchForm', function (e) {
            GetDataTickets(dispatch, url.INIT_DATA);
        });
        return () => {
            document.removeEventListener('dispatchForm', function (e) {
            })
        }
    }, [
        window.history.state
    ]);
    useEffect(() =>
        GetDataTickets(dispatch, url.INIT_DATA), []
    )

    const prevPage = usePrevious(state[PAGE]=1);

    useMemo(()=>{
        document.addEventListener('dispatchSortPrice', function (e) {
            const {sortPrice} = e.detail;
            const body = {
                request_id: state[REQUEST_ID],
                page: state[PAGE],
                sort: {
                    by: "price",
                    order: sortPrice ? "asc" : "desc"
                },
            };
            state[REQUEST_ID] && GetMoreTicket(dispatch, url.OPERATION_DATA, body);

        });
        document.addEventListener('dispatchSortDuration', function (e) {
            const {sortDuration} = e.detail;
            const body = {
                request_id: state[REQUEST_ID],
                page: state[PAGE],
                sort: {
                    by: "duration",
                    order: sortDuration ? "asc" : "desc"
                },
            };
            state[REQUEST_ID] && GetMoreTicket(dispatch, url.OPERATION_DATA, body);

        });

        return () => {
            document.removeEventListener('dispatchSortPrice', function (e) {});
            document.removeEventListener('dispatchSortDuration', function (e) {});

        }
    },[state[REQUEST_ID]])

    useMemo(()=>{
        document.addEventListener('dispatchSortPrice', function (e) {
            const {sortPrice} = e.detail;
            console.log(prevPage,state[PAGE]);
            const body = {
                request_id: state[REQUEST_ID],
                page: state[PAGE],
                sort: {
                    by: "price",
                    order: sortPrice ? "asc" : "desc"
                },
            };
            (prevPage != state[PAGE] && prevPage != undefined) && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
            //prevPage != state[PAGE] && GetMoreTicket(dispatch, url.OPERATION_DATA, body);
        });
        document.addEventListener('dispatchSortDuration', function (e) {
            const {sortDuration} = e.detail;
            const body = {
                request_id: state[REQUEST_ID],
                page: state[PAGE],
                sort: {
                    by: "duration",
                    order: sortDuration ? "asc" : "desc"
                },
            };
            (prevPage != state[PAGE] && prevPage != undefined) && GetMoreTicket(dispatch, url.OPERATION_DATA, body);

        });
        return () => {
            document.removeEventListener('dispatchSortPrice', function (e) {
            })
            document.removeEventListener('dispatchSortDuration', function (e) {});
        }
    },[state[PAGE]])





    const handleNextPage = () => {
        const body = {
            request_id: state[REQUEST_ID],
            page: state[PAGE] + 1
        };
        dispatch({type: [PAGE], payload: {[PAGE]: state[PAGE] + 1}})
        GetMoreTicket(dispatch, url.OPERATION_DATA, body);
    }


    return (
        <ResultContext.Provider
            value={{
                handleNextPage,
                lang,
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
