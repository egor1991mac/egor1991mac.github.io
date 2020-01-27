import React, {useReducer,useMemo,useEffect} from 'react';
import {FETCH_DATA, SELECT_DATA} from '../../source/const';
import {FilterContext} from './context';
import {FilterReducer} from './FilterReducer';
import useCustomEvent from "../../hooks/useCustomEvent";

const FilterState = ({children}) => {
    const defaultState = null;
    const [state,dispatch] = useReducer(FilterReducer, defaultState);

    useEffect(()=>{
        document.addEventListener('dispatchDataFilter',(e)=>{
           dispatch({
               type:[FETCH_DATA],
               payload: e.detail
           })
        })
    },[]);



    const event = useCustomEvent('dispatchNewData');
    const getData = (data, key) => {
        window.history.pushState({...window.history.state,filter_values:{...window.history.state.filter_values,[key]:data}},'','')
    };
    //useEffect(()=>{console.log(1)},[getData()])

    const sendData = () =>{setTimeout(()=>event(),300)}




    return (
       <FilterContext.Provider
           value={{
               getData,
               sendData,
               state
           }}
       >
           {
               children
           }
       </FilterContext.Provider>
    );
};

export default FilterState;