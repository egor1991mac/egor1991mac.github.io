import React, {useEffect, useReducer} from 'react';
import {TransferResultContext} from './context';
import {GetDataTransfers} from './TransferResultAction';
import {TransferResultReducer} from './TransferResultReducer';
import {SELECT_DATA} from '../../source/const';
import CustomEvent from "../../hooks/useCustomEvent";
import qs from 'qs';
import {FETCH_DATA, LOADING, PAGE, REQUEST_ID} from "../../source/const";
const TransferResultState = ({children,url}) => {
    const defaultState = {
        [FETCH_DATA]: null,
        [LOADING]: false,
        [PAGE]: 1,
        [REQUEST_ID]: null
    };

    const [state,dispatch] = useReducer(TransferResultReducer,defaultState);
    const getData = () => {GetDataTransfers(dispatch,url.INIT_DATA)};
    useEffect(getData,[]);
    useEffect(()=>{
        document.addEventListener('dispatchForm',getData,false);
        return document.removeEventListener('dispatchForm',()=>{},false);
    },);







    return (
        <TransferResultContext.Provider
            value = {{
                state,
            }}>
            {
                children
            }
        </TransferResultContext.Provider>
    );
};

export default TransferResultState;