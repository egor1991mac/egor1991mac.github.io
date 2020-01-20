import {useMemo, useContext} from 'react';
import {SELECT_DATA} from "../source/const";
import {FormContext} from "../container/form/context/context";

//key ключ объекта state[SELECT_DATA][key];

const useSetParentContext = (state, key) =>{
    const {getData} = useContext(FormContext);

    useMemo(()=>{
        getData(state,key);
    },[state]);
}

export default useSetParentContext;