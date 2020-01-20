import {FETCH_DATA} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [FETCH_DATA]: (state, {payload}) => ({...state,...payload}),

};


export const ResultReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};