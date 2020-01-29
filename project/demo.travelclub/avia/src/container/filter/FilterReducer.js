import {FETCH_DATA,PREV_DATA,LOADING,PAGE,RESET} from '../../source/const';



const handlers = {
    DEFAULT: state => state,
    [FETCH_DATA]: (state, {payload}) => ({...state, ...payload }) ,
    [RESET]: (state,{payload})=>({}),

};


export const FilterReducer = (state, action) => {
    console.log(action.type);
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};