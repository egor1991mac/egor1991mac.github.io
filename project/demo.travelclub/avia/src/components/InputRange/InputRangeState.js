import React, {useReducer} from 'react';

import {CheckBoxReducer} from "./CheckBoxReducer";
import {CHECKED_DATA} from "../../source/const";
import {CheckboxContext} from "./context";
import useSetParentContext from "../../hooks/useSetParentContext";
import {CHECKED_DATA} from "../../source/const";

const InputRangeState = ({children, defaultDataItems = null, inputName, defaultData, parentContext, sendData=null}) => {
    const defaultState = {};

    defaultDataItems && defaultDataItems.forEach(item=>{
            if(item == defaultData){
                defaultState[item] = true;
            }
            else{
                defaultState[item] = false;
            }
    })



    const [state, dispatch] = useReducer(CheckBoxReducer, defaultDataItems ? defaultState : null);
    const getData =   useSetParentContext(state,inputName, parentContext);

    const handleSelectedData = (key) => {
        dispatch({
            type: [SELECT_DATA],
            payload: {
                [key]: !state[key]
            }
        })
        sendData && sendData();
    }


    return (
        <CheckboxContext.Provider
            value={{
                state,
                handleSelectedData
            }}
        >
            {
                children
            }
        </CheckboxContext.Provider>

    )
};

export default CheckBoxState;