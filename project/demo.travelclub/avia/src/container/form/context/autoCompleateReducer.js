import {FETCH_DATA, SELECT_DATA, FETCH_STATUS_DATA, PLACEHOLDER_DATA, INPUT_DATA} from '../../../source/const';


const handlers = {
    DEFAULT: state => state,
    [FETCH_DATA]: (state, {payload}) => ({...payload}),
    [SELECT_DATA]: (state, {payload}) => ( {...state,...payload}),
    [INPUT_DATA]:(state,{payload}) => ({...state,...payload}),
    [PLACEHOLDER_DATA]:(state,{payload}) => ({...state,...payload}),
    [FETCH_STATUS_DATA]: (state, {payload}) => ({...state,...payload}),
};


export const AutoCompleateReducer = (state, action, type) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
}