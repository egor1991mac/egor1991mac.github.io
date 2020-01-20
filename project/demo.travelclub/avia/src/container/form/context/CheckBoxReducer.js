import {CHECKED_DATA} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [CHECKED_DATA]: (state, {payload}) => ({...state,...payload})
};


export const CheckBoxReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
}