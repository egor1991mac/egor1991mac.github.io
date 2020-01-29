import React, {useContext} from 'react';
import Loader from '../loader';
import Ticket from './ticket';
import {TransferResultContext} from '../../container/transfer_result/context';

const Index = () => {
    const {state: {FETCH_DATA = null, LOADING, PAGE = 1}, handleNextPage} = useContext(TransferResultContext);
    console.log(LOADING);

    return <React.Fragment>
        {
            FETCH_DATA ?
                FETCH_DATA.error != true ?
                    <div className={"theme-search-results"}>
                        <div className="_mob-h">
                        {
                            Object.values(FETCH_DATA).map((ticket, index) =>
                                <Ticket data={ticket} key={`${index}_ticket`}/>)
                        }
                        </div>
                        <div className="_desk-h">
                            {
                                Object.values(FETCH_DATA).map((ticket, index) =>
                                    <Ticket data={ticket} key={`${index}_ticket_desk`}/>)
                            }
                        </div>
                    </div>
                    : <div>Результатов нету</div>
                : null
        }
        {
            LOADING && <Loader classes={'result_preloader'}/>
        }
    </React.Fragment>

};

export default Index;