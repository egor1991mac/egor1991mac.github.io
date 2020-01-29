import React, {useReducer, useMemo, useEffect, useState} from 'react';
import {FETCH_DATA, SELECT_DATA, RESET} from '../../source/const';
import {FilterContext} from './context';
import {FilterReducer} from './FilterReducer';
import useCustomEvent from "../../hooks/useCustomEvent";
import {isEqual} from 'lodash'

const FilterState = ({children}) => {
    const defaultState = null;
    const [state, dispatch] = useReducer(FilterReducer, defaultState);
    const [searchData, setSearchData] = useState(false);

    useEffect(() => {
        document.addEventListener('dispatchDataFilter', (e) => {
            dispatch({
                type: [RESET],
                payload: null
            })
            dispatch({
                type: [FETCH_DATA],
                payload: e.detail
            })
        });
        return () => {
            document.removeEventListener('dispatchDataFilter', (e) => {
            })
        };
    },);


    const event = useCustomEvent('dispatchNewData');
    const getData = (data, key) => {
        window.history.pushState({
            ...window.history.state,
            filter_values: {...window.history.state.filter_values, [key]: data}
        }, '', '');
    };
    const sendData = () => {
        event();
    }


    return (
        <FilterContext.Provider
            value={{
                getData,
                sendData,
                state
            }}
        >
            {
                children
            }
        </FilterContext.Provider>
    );
};

export default FilterState;