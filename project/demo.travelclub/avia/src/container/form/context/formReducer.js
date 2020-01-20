import {SELECT_DATA} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [SELECT_DATA]: (state, {payload}) => ({...state,...payload}),
};


export const FormReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};