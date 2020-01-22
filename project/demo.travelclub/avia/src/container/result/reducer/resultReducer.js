import {FETCH_DATA,PREV_DATA,LOADING,PAGE} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [FETCH_DATA]: (state, {payload}) => ({...state,...payload}),
    [PREV_DATA]:(state, {payload}) => ({...state,...payload}),
    [LOADING]:(state, {payload}) => ({...state,[LOADING]:payload}),
    [PAGE]:(state,{payload}) => ({...state,...payload})

};


export const ResultReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};