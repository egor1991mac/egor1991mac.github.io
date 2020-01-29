import React, {useEffect, useReducer} from 'react';

import {InputRangeReducer} from "./InputRangeReducer";
import {SELECT_DATA} from "../../source/const";
import {InputRangeContext} from "./context";
import useSetParentContext from "../../hooks/useSetParentContext";


const InputRangeState = ({children, defaultDataItems = null, inputName, defaultData=null, parentContext, sendData=null}) => {
    const defaultState = {
        [SELECT_DATA]: {min:parseInt(Object.values(defaultData)[0].min), max:parseInt(Object.values(defaultData)[0].max)},
    }
    const [state, dispatch] = useReducer(InputRangeReducer, defaultState);
    const getData = useSetParentContext(
        {[Object.keys(defaultData)]:state[SELECT_DATA]},inputName, parentContext);
    const handleChangeData = (data) => {
        dispatch({
            type: [SELECT_DATA],
            payload: {[SELECT_DATA]:data}
        });
        //sendData && sendData();
    }
    useEffect(()=>{
        sendData && sendData();
    },[state[SELECT_DATA]])



    return (
        <InputRangeContext.Provider
            value={{
                min:parseInt(Object.values(defaultData)[0].min),
                max:parseInt(Object.values(defaultData)[0].max),
                value: state[SELECT_DATA],
                handleChangeData,
                sendData
            }}
        >
            {
                children
            }
        </InputRangeContext.Provider>

    )
};

export default InputRangeState;