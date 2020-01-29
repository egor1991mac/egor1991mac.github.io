import React  from 'react';
import AutoCompleate from "../../components/autocompleateTransfer";
import {AutoCompleateState} from "../../components/autocompleateTransfer/autoCompleateState";
import {PopupState} from "../../components/popper/PopupState";
import TransferResultState  from "./TransferResultState";
import {TransferResultContext} from './context';
import TransferTickets from '../../components/transferTickets';




const TransferResult = ({lang, defaultData, query}) => {


    return (
        <TransferResultState url={query}>
            <TransferResultContext.Consumer>
                {
                    ({state})=><>
                        <TransferTickets/>
                    </>
                }
            </TransferResultContext.Consumer>
        </TransferResultState>
    );
};

export default TransferResult;