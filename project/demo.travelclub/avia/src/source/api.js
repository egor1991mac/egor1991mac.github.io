import axios from 'axios';
import {groupBy} from 'lodash';
import moment from 'moment';

const sleep = (time) => new Promise(resolve => setTimeout(resolve, time));


function wrapPromise(promise) {
    let status = 'pending';
    let result;

    const suspender = promise
        .then(r => {
            result = r;
            status = 'success';
        }, e => {
            result = e;
            status = 'error';
        });

    return {
        read() {

            if (status == 'pending') {
                throw suspender;
            } else if (status == 'error') {

                throw result;
            } else if (status == 'success') {

                return result;
            }

        },


    }

};

const fetchData = async (URL) => {
    try {
        await sleep(300);
        let data = await axios.get(URL);
        return await data;
    } catch (e) {
        throw e;
    }
};

const fetchDataTicketsGet = async (URL) => {
    try {
        let data = await axios.get(URL);
        return await data;
    } catch (e) {
        throw e;
    }
};
const fetchDataTicketsPost = async (URL, body) => {
    try {
        let data = await axios.get(URL, body);
        return await data;
    } catch (e) {
        throw e;
    }
};

function getTimeFromMins(mins) {

    if (mins >= 24 * 60 || mins < 0) {
        var d = mins / 1440 | 0,
            mins = mins - d * 1440;
        var h = mins / 60 | 0,
            m = mins % 60 | 0;
      return `${d}д ${moment.utc().day(d).hours(h).minutes(m).format("HHч mmм")}`;

    } else {
        var
            h = mins / 60 | 0,
            m = mins % 60 | 0;

        return moment.utc().hours(h).minutes(m).format("HHч mmм");
    }

}

// const Demo = async (time,demoData) =>{
//         await sleep(time);
//         return new Promise((resolve)=>resolve(demoData))
// };
// const FetchAllData = async (data) =>{
//    return await axios.all([Demo(1000,data),Demo(500,data)]);
// }


const useFetchDataAutoCompleate = URL => value => wrapPromise(fetchData(`${URL}/?q=${value}`));

const useFetchDataTicketsPost = (URL, body) => wrapPromise(fetchDataTicketsPost(URL, body));
const useFetchDataTicketsGet = (URL) => wrapPromise(fetchDataTicketsPost(URL));

//const useFetchDemoData = (data) => wrapPromise(FetchAllData(data));

export {useFetchDataAutoCompleate, useFetchDataTicketsPost, useFetchDataTicketsGet, getTimeFromMins};



