import React, {useReducer} from 'react';
import {TransferFormContext} from './context';
import {TransferFormReducer} from './TransferFormReducer';
import {SELECT_DATA} from '../../source/const';
import CustomEvent from "../../hooks/useCustomEvent";
import qs from 'qs';
const TransferFormState = ({children, mode='Y'}) => {

    const [state,dispatch] = useReducer(TransferFormReducer,{});
    const getData = (data, key) => {
        console.log(data,key);
        dispatch({
            type: [SELECT_DATA],
            payload: {
                [key]: data
            }
        })
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        const action = "transfer";

        const data = {
            SEARCH: {
                DEPARTURE: state.DEPARTURE && state.DEPARTURE.INPUT_VALUE,
                ARRIVAL: state.ARRIVAL && state.ARRIVAL.INPUT_VALUE
            }
        };

        console.log(data);


        let url = `${window.location.origin}/${action}/?${qs.stringify(data)}`;

        if(mode == 'N'){
            window.history.pushState(data,'SEARCH', url);
            //window.location.reload();
        }
        else{
            window.history.pushState(data,'', url);
            CustomEvent("dispatchForm")(data);
        }

    };
    return (
        <TransferFormContext.Provider
            value = {{
                getData,
                state,
                handleSubmit
            }}
        >
            {
                children
            }
        </TransferFormContext.Provider>
    );
};

export default TransferFormState;