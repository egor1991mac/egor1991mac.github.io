import React from 'react';
import {URL_DATA_FROM, URL_DATA_TO} from "../../source/const";
import AutoCompleate from "../../components/autocompleate";
import {AutoCompleateState} from "./context/autoCompleateState";
import DatePicker from "../../components/datepicker";
import {PopupState} from "./context/PopupState";
import {DatePickerState} from "./context/DatePickerState";
import {CounterState} from "./context/CounterState";
import Counter from '../../components/counter';
import CheckBox from '../../components/checkbox';
import CheckBoxState from '../../components/checkbox/CheckBoxState';
import {FormState} from "./context/formState";
import {FormContext} from "./context/context";
import {isEmpty} from "lodash";


const Form = ({lang, defaultData, query}) => {

    return (

        <>
            <FormState mode={defaultData.IS_AJAX_MODE}>
                <FormContext.Consumer>
                    {
                        (props) =>
                            <form>
                                <div className="row" data-gutter="none">
                                <div className="col-md-5">
                                    <div className="row" data-gutter="none">
                                        <div className="col-md-6">
                                <PopupState>
                                    <AutoCompleateState url={query.URL_DATA_FROM} type={'FROM'} inputName={"DEPARTURE"}
                                                        defaultData={defaultData.SEARCH_DATA.DEPARTURE}
                                                        parentContext ={FormContext}
                                    >
                                        <AutoCompleate
                                            lang={
                                                {
                                                    LABEL: lang.FROM,
                                                    OK_BTN: lang.OK_BTN
                                                }
                                            }
                                        />
                                    </AutoCompleateState>
                                </PopupState>
                                        </div>
                                        <div className="col-md-6">
                                <PopupState>
                                    <AutoCompleateState url={query.URL_DATA_TO} type={'TO'} inputName={"ARRIVAL"}
                                                        defaultData={defaultData.SEARCH_DATA.ARRIVAL}
                                                        parentContext ={FormContext}
                                    >
                                        <AutoCompleate
                                            lang={
                                                {
                                                    LABEL: lang.TO,
                                                    OK_BTN: lang.OK_BTN
                                                }
                                            }
                                        />
                                    </AutoCompleateState>
                                </PopupState>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                <div className="row" data-gutter="none">
                                    <div className="col-md-4">
                                        <PopupState>
                                            <DatePickerState parentContext ={FormContext}
                                                             inputName={"DATE_DEPARTURE"}
                                                             defaultData={defaultData.SEARCH_DATA.DATE_DEPARTURE}>
                                                <DatePicker
                                                    lang={
                                                        {
                                                            LABEL: lang.DATE_FROM,
                                                            OK_BTN: lang.OK_BTN
                                                        }
                                                    }
                                                />
                                            </DatePickerState>
                                        </PopupState>
                                    </div>
                                    <div className="col-md-4">
                                        <PopupState>
                                            <DatePickerState parentContext ={FormContext}
                                                             inputName={"DATE_ARRIVAL"}
                                                             defaultData={defaultData.SEARCH_DATA.DATE_ARRIVAL || null}>

                                                <DatePicker
                                                    lang={
                                                        {
                                                            LABEL: lang.DATE_TO,
                                                            OK_BTN: lang.OK_BTN
                                                        }
                                                    }
                                                    showBtnClose={true}
                                                />
                                            </DatePickerState>
                                        </PopupState>
                                    </div>
                                    <div className="col-md-4">
                                        <PopupState>
                                            <CounterState parentContext ={FormContext}
                                                          inputName={"PESSANGER"}
                                                          defaultData={defaultData.SEARCH_DATA.PESSANGER}>
                                                <CheckBoxState  parentContext ={FormContext}
                                                                inputName={"CLASS"}
                                                                defaultDataItems = {defaultData.CLASSES}
                                                                defaultData={defaultData.SEARCH_DATA.CLASSES} >
                                                <Counter
                                                    lang={{
                                                        label: [lang.PESSENGERS, lang.PESSENGER],
                                                        adults: {
                                                            label: [lang.ADULTS, lang.ONE_ADULT],
                                                            info: lang.ADULTS_INFO
                                                        },
                                                        children: {
                                                            label: [lang.CHILDREN, lang.ONE_CHILD],
                                                            info: lang.ADULTS_INFO
                                                        },
                                                        baby: {
                                                            label: [lang.BABIES, lang.ONE_BABY],
                                                            info: lang.BABIES_INFO
                                                        },
                                                        OK_BTN: lang.OK_BTN
                                                        }
                                                    }
                                                >

                                                    <CheckBox
                                                        lang={{
                                                            Business:lang.CLASS_BUSINESS,
                                                            Economy:lang.CLASS_ECONOMY,
                                                            First:lang.CLASS_FIST,
                                                            PremiumEconomy: lang.PREMIUMECONOMY
                                                        }}/>


                                                </Counter>
                                                </CheckBoxState>
                                            </CounterState>

                                        </PopupState>
                                    </div>
                                </div>
                                </div>
                                <div className="col-md-1">
                                    <button onClick={props.handleSubmit}
                                            className={"theme-search-area-submit _mt-20 theme-search-area-submit-no-border theme-search-area-submit-white theme-search-area-submit-sm theme-search-area-submit-curved"}> {lang.SUBMIT}</button>
                                </div>
                                </div>
                            </form>
                    }
                </FormContext.Consumer>

            </FormState>

        </>


    );
};

export default Form;