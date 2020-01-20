import {INCREMENT_DATA, DICREMENT_DATA} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [INCREMENT_DATA]: (state, {payload}) => ({...state,...payload}),
    [DICREMENT_DATA]: (state, {payload}) => ({...state,...payload}),
};


export const CounterReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
}