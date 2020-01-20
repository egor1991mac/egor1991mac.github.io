import axios from 'axios';
import {isEqual} from 'lodash';
const initialDataContactForm = {
    name:'',
    email:'',
    phone:''
};
export function Selected_ContactForm_Text(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_CONTACT_FORM_TEXT':
                state = payload;
            break;
    }
    return state;
};

export function Selected_ContactForm(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_CONTACT_FORM':
            if(!isEqual(state[0],payload)){
                state = payload;
            }
            break;
    }
    return state;
};
export  function From(state=[],{type,payload}) {
    switch (type) {
        case 'GET_FROM':
            if(!isEqual(state[0],payload.data)){
                state = [payload.data];
            }

            break;
    }
    return state;
};
export function Selected_From(state = [],{type,payload}) {
    switch (type) {
        case 'SELECTED_FROM':
            state = payload;
            break;
    }
    return state;
};


export function To(state=[],{type,payload}) {
    switch (type) {
        case 'GET_TO':
            if(!isEqual(state[0],payload.data)){
                state = [payload.data];
            }
            break;
    }
    return state;
};

export function Selected_To(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_TO':
                state = payload;
            break;
    }
    return state;
}

export function Date(state=[]) {
    return state;
};
export function Selected_Date(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_DATE':
            state = payload;
            break;
    }
    return state;
};
export function People(state=[]) {
    return state;
};
export function Selected_People(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_PEOPLE':
            state = payload;
            break;
    }
    return state;
};
export function Days(state=[]) {
    return state;
};
export function Selected_Days(state=[],{type,payload}) {
    switch (type) {
        case 'SELECTED_DAY':
            state = payload;
            break;
    }
    return state;
};

export function  Loading(state=false,{type,payload}) {
    switch (type) {
        case 'LOADING':
            if(state != payload){
                state = payload;
            }
            break;
    }
    return state;
};


export function Alert(state=[],{type, payload}) {

    switch (type) {
        case 'ALERT':
                if(payload == null){
                    state = [];
                }
                else{
                    state = [payload];
                }


            break;
    }
    return state;
}