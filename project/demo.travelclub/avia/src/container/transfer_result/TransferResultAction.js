import {FETCH_DATA, LOADING, PAGE, REQUEST_ID} from "../../source/const";
import {fetchDataTicketsGet} from '../../source/api';
import qs from 'qs';

export const GetDataTransfers = async (dispatch,url,callback) =>{

    try {
        if (window.history.state) {
            const {state} = window.history;

            dispatch({
                type:[LOADING],
                payload:true
            });
            const response = await fetchDataTicketsGet(`${url}/?${qs.stringify(state)}`);
            dispatch({
                    type:[FETCH_DATA],
                    payload:{
                        [FETCH_DATA]:  response.result,
                        [PAGE]:1,
                        total_page_count:response.total_page_count,
                        [REQUEST_ID]: response.request_id,
                        [LOADING]: false
                    }
                })
            dispatch({
                type:[LOADING],
                payload:false
            });

            // const response = await fetchDataTicketsGet(`${url}/?${qs.stringify(body)}`);
            //
            // callback && callback(response.filter_values);
        }
    }
    catch (e){

    }

}

export const GetMoreTicket = async (dispatch,url,body) => {
    try {
        dispatch({
            type:[LOADING],
            payload:true
        });

        dispatch({
            type:[FETCH_DATA],
            payload:{
                [FETCH_DATA]: await fetchDataTicketsGet(`${url}/?${qs.stringify(body)}`),
                [LOADING]: false
            }
        });
    }
    catch (e) {

    }
}
