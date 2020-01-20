import {SELECT_DATA} from '../../../source/const';



const handlers = {
    DEFAULT: state => state,
    [SELECT_DATA]: (state, {payload}) => ({...payload}),
};


export const DatePickerReducer = (state, action) => {
    console.log(state,action);
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
}