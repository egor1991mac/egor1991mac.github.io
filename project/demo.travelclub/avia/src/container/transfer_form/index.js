import React  from 'react';
import AutoCompleate from "../../components/autocompleateTransfer";
import {AutoCompleateState} from "../../components/autocompleateTransfer/autoCompleateState";
import {PopupState} from "../../components/popper/PopupState";
import TransferFormState  from "./TransferFormState";
import {TransferFormContext} from './context';




const TransferForm = ({lang, defaultData, query}) => {


    return (
        <TransferFormState mode={defaultData.IS_AJAX_MODE}>
            <TransferFormContext.Consumer>
                {
                    ({state,handleSubmit})=>
                        <form>
                            <div className="row d-flex flex-wrap justify-center" data-gutter="none">
                                <div className=" col-md-5 _pl-0 _pr-0">

                                    <div className="row" data-gutter="none">
                                        <div className="col-xs-12  col-md-6">
                                            <PopupState>
                                                <AutoCompleateState url={query.URL_DATA_FROM}
                                                                    type={'FROM'}
                                                                    inputName={"DEPARTURE"}
                                                                    defaultData={defaultData.SEARCH_DATA.DEPARTURE}
                                                                    parentContext = {TransferFormContext}
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
                                        <div className="col-xs-12  col-md-6">
                                            <PopupState>
                                                <AutoCompleateState url={query.URL_DATA_TO}
                                                                    type={'TO'}
                                                                    inputName={"ARRIVAL"}
                                                                    defaultData={defaultData.SEARCH_DATA.ARRIVAL}
                                                                    parentContext ={TransferFormContext}
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
                                <div className="col-xs-12 col-md-1">
                                    <button onClick={handleSubmit}
                                        className={"theme-search-area-submit _mt-20 theme-search-area-submit-no-border theme-search-area-submit-white theme-search-area-submit-sm theme-search-area-submit-curved"}> {lang.SUBMIT}</button>
                                </div>
                            </div>
                        </form>


                }
            </TransferFormContext.Consumer>
        </TransferFormState>
    );
};

export default TransferForm;