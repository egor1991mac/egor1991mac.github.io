import React, {useReducer} from 'react';
import {CounterContext} from './context.js';
import {CounterReducer} from "./CounterReducer";
import { INCREMENT_DATA, DICREMENT_DATA } from "../../../source/const";
import useSetParentContext from "../../../hooks/useSetParentContext";



export const CounterState = ({url,inputName,children, defaultData, parentContext}) => {
    const defaultState = defaultData ? defaultData :{
        adults:1,
        children:0,
        baby:0,
    }

    const [state, dispatch] = useReducer(CounterReducer, defaultState);

    useSetParentContext(state,inputName, parentContext);

    const handleIncrement = (key) =>{
        dispatch({
            type: INCREMENT_DATA,
            payload: {
                [key]:state[key] <= 14 ? state[key] + 1 : state[key]
            }
        })
    };
    const handleDicrement  = (key) =>{
        dispatch({
            type: DICREMENT_DATA,
            payload: {
                [key]:state[key] >= 1 ? state[key] - 1 : state[key]
            }
        })
    };

    return (
        <CounterContext.Provider
            value={{
                handleIncrement,
                handleDicrement,
                state,
            }}
        >
            {
                children
            }
        </CounterContext.Provider>

    )
}
