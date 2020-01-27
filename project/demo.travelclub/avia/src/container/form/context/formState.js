import React, {useReducer} from 'react';
import {FormContext} from './context.js';
import {FormReducer} from "./formReducer";
import {SELECT_DATA} from "../../../source/const";
import CustomEvent from "../../../hooks/useCustomEvent";
import {isEmpty} from 'lodash';
import moment from 'moment';
import qs from 'qs';


export const FormState = ({children,mode}) => {


    const [state, dispatch] = useReducer(FormReducer, {});

    const getData = (data, key) => {
        dispatch({
            type: [SELECT_DATA],
            payload: {
                [key]: data
            }
        })
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        const action = "flights";
        const data= {
            SEARCH: {
                DEPARTURE: state.DEPARTURE.OBJECT_TYPE == 'airport' ? state.DEPARTURE.INPUT_NAME : state.DEPARTURE.CITY_INPUT_NAME_RU,
                ARRIVAL:state.ARRIVAL.OBJECT_TYPE == 'airport' ? state.ARRIVAL.INPUT_NAME : state.ARRIVAL.CITY_INPUT_NAME_RU,
                DATE_DEPARTURE: state.DATE_DEPARTURE ? moment(state.DATE_DEPARTURE).format('DD.MM.YYYY') : null,
                DATE_ARRIVAL: state.DATE_ARRIVAL ? moment(state.DATE_ARRIVAL).format('DD.MM.YYYY') : null,
                PESSANGER: state.PESSANGER,
               // CLASS: Object.keys(state.CLASS).filter(key => state.CLASS[key] == true)
            }
        };




        let url = `${window.location.origin}/${action}/?${qs.stringify(data)}`;



        if(mode == 'N'){
            window.history.pushState(data,'SEARCH', url);
            window.location.reload();
        }
        else{
            window.history.pushState(data,'', url);
            CustomEvent("dispatchForm")(data);
        }

    };




    return (
        <FormContext.Provider
            value={{
                getData,
                handleSubmit,
                state,
            }}
        >
                {
                    children
                }


        </FormContext.Provider>
    )
}
