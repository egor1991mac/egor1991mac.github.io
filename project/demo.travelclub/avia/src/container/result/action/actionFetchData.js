import {FETCH_DATA, LOADING, PAGE, REQUEST_ID} from "../../../source/const";
import {fetchDataTicketsGet} from '../../../source/api';
import qs from 'qs';

export const GetDataTickets = async (dispatch,url,callback) =>{

    try {
        if (window.history.state) {
            const {state: {SEARCH}} = window.history;
            const {DATE_ARRIVAL, DATE_DEPARTURE, ...rest} = SEARCH;
            let body = {};
            if (SEARCH.DATE_ARRIVAL == null) {
                body = {
                    SEARCH: {
                        ...rest,
                        DATE: DATE_DEPARTURE
                    }
                };
            } else {
                body = {
                    SEARCH: {
                        ...rest,
                        DATE: DATE_DEPARTURE,
                        DATE_BACK: DATE_ARRIVAL,
                    }
                };
            };
            dispatch({
                type:[LOADING],
                payload:true
            });

            const response = await fetchDataTicketsGet(`${url}/?${qs.stringify(body)}`);

            dispatch({
                type:[FETCH_DATA],
                payload:{
                    [FETCH_DATA]:  response,
                    [PAGE]:1,
                    total_page_count:response.total_page_count,
                    [REQUEST_ID]: response.request_id

                }
            })

            dispatch({
                type:[LOADING],
                payload:false
            });
            callback(response.filter_values);

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
                [FETCH_DATA]: await fetchDataTicketsGet(`${url}/?${qs.stringify(body)}`)
            }
        })

        dispatch({
            type:[LOADING],
            payload:false
        });
    }
    catch (e) {

    }
}
