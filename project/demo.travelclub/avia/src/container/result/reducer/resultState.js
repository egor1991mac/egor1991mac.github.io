import React, {useReducer, useMemo, useContext, useEffect, useState} from 'react';
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
import {isEqual} from 'lodash';

function getSelectedFilter(filter_values) {
    if (filter_values) {
        let data = {};
        Object.keys(filter_values).forEach(key => {
            if(key != 'price'){
                let x = Object.keys(filter_values[key]).filter(item => filter_values[key][item] == true);
                if (x.length != 0) {
                    data = {...data, [key]: x}
                }
            }
        });
        return data;
    } else return null;
}


export const ResultState = ({url, inputName, children, defaultData, lang}) => {

        const defaultState = {
            [FETCH_DATA]: null,
            [LOADING]: false,
            [PAGE]: 1,
            [REQUEST_ID]: null
        };

        const [startFilter, setStartFilter] = useState(false);
        const [startSearch, setStartSearch] = useState(false);

        const dispatchDataFilter = useCustomEvent;
        const [state, dispatch] = useReducer(ResultReducer, defaultState);

        useEffect(() => {
            GetDataTickets(dispatch, url.INIT_DATA, dispatchDataFilter("dispatchDataFilter"));
        }, []);


        useEffect(() => {
            document.addEventListener('dispatchForm', function (e) {
                setStartSearch(true);
            });
            return () => {
                document.removeEventListener('dispatchForm', function (e) {})
            }
        },);
        useEffect(() => {
            if (startSearch){
                GetDataTickets(dispatch, url.INIT_DATA, dispatchDataFilter(["dispatchDataFilter","dispatchResetSort"]));
                setStartSearch(false);
            }
        }, [startSearch]);


        let prevFilterCount = usePrevious(window.history.state ? getSelectedFilter(window.history.state.filter_values) : null);


        useEffect(() => {
            document.addEventListener('dispatchNewData', function (e) {
                setStartFilter(true);
                console.log('startFilter');
            });
            return () => {
                document.removeEventListener('dispatchNewData', function (e) {
                });
            }
        });

        useEffect(() => {
            if (startFilter) {
                const {filter_values = null, sort = null, page = 1} = window.history.state;
                const body = {
                    request_id: state[REQUEST_ID],
                    page: page,
                    sort: {...sort},
                    filter: filter_values ? {...getSelectedFilter(filter_values),price:window.history.state.filter_values.price} : {}
                };
                GetMoreTicket(dispatch, url.OPERATION_DATA, body);
                setStartFilter(false);
            }


        }, [startFilter])




        const handleNextPage = () => {
            const {total_page_count} = state;

            if (total_page_count >= state[PAGE]) {
                const {filter_values = null, sort = null, page = 1} = window.history.state;
                const body = {
                    request_id: state[REQUEST_ID],
                    page: page + 1,
                    sort: {...sort},
                    filter: filter_values ? getSelectedFilter(filter_values) : {}
                };
                dispatch({type: [PAGE]});
                window.history.pushState({...window.history.state, page: state[PAGE] + 1}, 'title', '')
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
    }
;
