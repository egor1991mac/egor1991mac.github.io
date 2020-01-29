import {useMemo, useContext} from 'react';
import {SELECT_DATA} from "../source/const";
import {FormContext} from "../container/form/context/context";

//key ключ объекта state[SELECT_DATA][key];

const useSetParentContext = (state, key, parentContext) =>{
    const {getData} = useContext(parentContext);

    useMemo(()=>{
        //console.log(state);
        getData(state,key);
    },[state]);
}

export default useSetParentContext;