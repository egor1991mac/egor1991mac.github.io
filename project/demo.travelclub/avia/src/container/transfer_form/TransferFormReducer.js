import {SELECT_DATA,RESET} from '../../source/const';



const handlers = {
    DEFAULT: state => state,
    [SELECT_DATA]: (state, {payload}) => ({...state,...payload}),
    [RESET]: (state,{payload})=>({}),


};


export const TransferFormReducer = (state, action) => {
    console.log(action);
    const handle = handlers[action.type] || handlers.DEFAULT;
    return handle(state, action);
};