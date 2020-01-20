import axios from 'axios';
export const asyncGetFrom = () => async dispatch => {
    try {
        dispatch(loadStart());
        let response = await axios.get('https://module.sletat.ru/Main.svc/GetDepartCities');
        dispatch({type:"GET_FROM",payload:await response});
        dispatch(loadCompleate());

    }
    catch (e) {
        return e;
    }
};
export const asyncGetTo = () => async dispatch => {
    try {

        dispatch(loadStart());
        let response = await axios.get('https://module.sletat.ru/Main.svc/GetCountries');
        dispatch({type:"GET_TO",payload:await response});
        dispatch(loadCompleate());
    }
    catch (e) {
        return e;
    }
};
export const asyncSendServer = (body) => async dispatch =>{
    dispatch(loadStart());
    setTimeout(async ()=>{
        try {
            let response = await axios.post('https://smoktravel.by/ajax/search_tour.php',body);
            console.log(response);
            dispatch(loadCompleate());
            if(response.data.error == false){
                dispatch(AlertSuccess());
            }
            else{
                dispatch(AlertError());
            }

        }
        catch (e) {
            //dispatch({type:"RESPONSE_ORDER_ERROR",payload:e});
            dispatch(loadCompleate());
            dispatch(AlertError());
        }
    },3000)

};
export const getData = selector => dispatch => data => dispatch({type:selector,payload:data});


export const loadStart = () => ({type:"LOADING",payload:true});
export const loadCompleate = () => ({type:"LOADING",payload:false});
export const AlertSuccess = () => ({type:"ALERT",payload:{type:'success',text:"Спасибо за бронирование. Мы с вами свяжемся"}});
export const AlertError = () => ({type:"ALERT",payload:{type:'error',text:"Извините. Произошла ошибка."}});
