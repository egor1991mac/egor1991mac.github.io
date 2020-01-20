import React, {useReducer} from 'react';

import {PopupReducer} from "./PopupReducer";
import {SHOW_DATA, HIDE_DATA} from "../../../source/const";
import {PopupContext, FormContext} from "./context";


const defaultState = {
    VISIBLE: false,
};

export const PopupState = ({children}) => {

    const [state, dispatch] = useReducer(PopupReducer, defaultState);

    const handleShowPopup = () =>{
        dispatch({
            type:[SHOW_DATA],
            payload: {VISIBLE:true}
        })
    };
    const handleHidePopup = () =>{
        dispatch({
            type:[HIDE_DATA],
            payload: {VISIBLE:false}
        })
    };


    return (
        <PopupContext.Provider
            value={{
                state,
                handleShowPopup,
                handleHidePopup
            }}
        >
            {
                children
            }
        </PopupContext.Provider>

    )
};
