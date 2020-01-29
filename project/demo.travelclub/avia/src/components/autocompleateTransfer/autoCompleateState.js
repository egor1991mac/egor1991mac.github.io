import React, {useReducer, useMemo, useContext} from 'react';
import {AutoCompleateContext} from './context.js';
import {AutoCompleateReducer} from "./autoCompleateReducer";
import {FETCH_DATA, SELECT_DATA, FETCH_STATUS_DATA, INPUT_DATA, PLACEHOLDER_DATA} from "../../source/const";
import {useFetchDataAutoCompleate} from "../../source/api";
import useSetParentContext from "../../hooks/useSetParentContext";





export const AutoCompleateState = ({url, inputName, children,defaultData, parentContext}) => {
    const defaultState = {
            [FETCH_DATA]: null,
            [SELECT_DATA]: {},
            [INPUT_DATA]:'',
            [FETCH_STATUS_DATA]:1,
            [PLACEHOLDER_DATA]:''
    };

    if(defaultData.length > 0){
        defaultState[SELECT_DATA] = defaultData[0];
        defaultState[INPUT_DATA] = defaultData[0].FIRST_PART;
        defaultState[PLACEHOLDER_DATA] = defaultData[0].FIRST_PART;

        // defaultState[INPUT_DATA] = defaultData[0].UF_CITY_RU
        //     : defaultData[0].UF_NAME_RU != '' ? defaultData[0].UF_NAME_RU : defaultData[0].UF_CITY_RU;
        // defaultState[PLACEHOLDER_DATA] = defaultData[0].OBJECT_TYPE == 'city' ? defaultData[0].UF_CITY_RU
        //     : defaultData[0].UF_NAME_RU != '' ? defaultData[0].UF_NAME_RU : defaultData[0].UF_CITY_RU;
    }



    const data = useFetchDataAutoCompleate(url);
    const [state, dispatch] = useReducer(AutoCompleateReducer, defaultState);


    useSetParentContext(state[SELECT_DATA],inputName, parentContext);

    const handleFetchData = async (value = '') => {

        if(value.length >= 2){
            dispatch({
                type: FETCH_DATA,
                payload: {
                    [FETCH_DATA]: data(value),
                }
            })
        }
    };

    const handleSelectData = (value = {}) => {

        dispatch({
            type: SELECT_DATA,
            payload: {
                    [SELECT_DATA]:value,
                    [INPUT_DATA]: value.FIRST_PART,
                    [PLACEHOLDER_DATA]: value.FIRST_PART,
                }
        });
    };

    const handleInputSetData = (value = {}) =>{
            dispatch({
                type: INPUT_DATA,
                payload: {
                    [INPUT_DATA]:value
                }
            });
    };

    const handleInputClearData = (value = '') =>{
        dispatch({
            type: INPUT_DATA,
            payload: {
                    [INPUT_DATA]:value,
                }
        });
    };

    const handleFetchStatus = (value = 1) =>{
        dispatch({
            type: FETCH_STATUS_DATA,
            payload: {
                [FETCH_STATUS_DATA]:value,
            }
        });
    };

    return (
        <AutoCompleateContext.Provider
            value={{
                handleFetchData,
                handleSelectData,
                handleInputClearData,
                handleInputSetData,
                handleFetchStatus,
                state,
                inputName
            }}
        >

            {
                children
            }
        </AutoCompleateContext.Provider>

    )
};
