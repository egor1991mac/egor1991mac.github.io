import React, {useReducer} from 'react';

import {CheckBoxReducer} from "./CheckBoxReducer";
import {CHECKED_DATA} from "../../../source/const";
import {CheckboxContext} from "./context";
import useSetParentContext from "../../../hooks/useSetParentContext";


const CheckBoxState = ({children, defaultDataItems, inputName, defaultData}) => {
    const defaultState = {};
    defaultDataItems.forEach(item=>{
            if(item == defaultData){
                defaultState[item] = true;
            }
            else{
                defaultState[item] = false;
            }

        })



    const [state, dispatch] = useReducer(CheckBoxReducer, defaultDataItems ? defaultState : null);
    useSetParentContext(state, inputName);
    const handleChecked = (key) => {
        dispatch({
            type: CHECKED_DATA,
            payload: {
                [key]: !state[key]
            }
        })
    }


    return (
        <CheckboxContext.Provider
            value={{
                state,
                handleChecked
            }}
        >
            {
                children
            }
        </CheckboxContext.Provider>

    )
};

export default CheckBoxState;