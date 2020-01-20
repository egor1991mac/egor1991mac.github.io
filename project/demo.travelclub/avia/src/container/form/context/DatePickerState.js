import React, {useReducer} from 'react';
import {DatePickerContext} from './context.js';
import {DatePickerReducer} from "./DatePickerStateReducer";
import {SELECT_DATA, } from "../../../source/const";
import useSetParentContext from "../../../hooks/useSetParentContext";
import moment from 'moment';


export const DatePickerState = ({url,inputName,children,defaultData=''}) => {
    console.log();
    const defaultState = {
        [SELECT_DATA]: defaultData ? moment(defaultData,'DD.MM.YYYY').toDate() : ''
    }


    const [state, dispatch] = useReducer(DatePickerReducer, defaultState);


    useSetParentContext(state[SELECT_DATA],inputName);

    const handleSelectDay = (value = new Date()) =>{
        dispatch({
            type: SELECT_DATA,
            payload:{
                [SELECT_DATA]:value
            }
        })
    };
    const handleClearDay = (value = null) => {
        dispatch({
            type: SELECT_DATA,
            payload:{
                [SELECT_DATA]:null
            }
        })
    };

    return (
        <DatePickerContext.Provider
            value={{
                handleSelectDay,
                handleClearDay,
                state,
            }}
        >
            {
                children
            }
        </DatePickerContext.Provider>

    )
}
