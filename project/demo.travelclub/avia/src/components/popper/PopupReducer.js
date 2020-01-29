import {SHOW_DATA, HIDE_DATA} from '../../source/const';



const handlers = {
    DEFAULT: state => state,
    [HIDE_DATA]: (state, {payload}) => ({...payload}),
    [SHOW_DATA]: (state, {payload}) => ({...payload}),
};


export const PopupReducer = (state, action) => {
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
}