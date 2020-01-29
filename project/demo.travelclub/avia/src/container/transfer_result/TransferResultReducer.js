import {FETCH_DATA,PREV_DATA,LOADING,PAGE} from '../../source/const';



const handlers = {
    DEFAULT: state => state,
    [FETCH_DATA]: (state, {payload}) => ({...state,...payload}),
    [PREV_DATA]:(state, {payload}) => ({...state,...payload}),
    [LOADING]:(state, {payload}) => ({...state,[LOADING]:payload}),
    [PAGE]:(state,{payload}) => ({...state,[PAGE]:state[PAGE] + 1})
};


export const TransferResultReducer = (state, action) => {

    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};