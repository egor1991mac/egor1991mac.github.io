import React, {Suspense, useState, useContext, useRef, useLayoutEffect, useMemo, useEffect} from 'react';
import {ResultContext} from "../../container/result/context/context";
import {FETCH_DATA, LOADING} from "../../source/const";
import Ticket from './ticket';
import Loader from '../loader'


const Tickets = () => {

    const {state: {FETCH_DATA = null, LOADING, PAGE = 0}, handleNextPage} = useContext(ResultContext);

    return <React.Fragment>
        {
            FETCH_DATA  ?
                 FETCH_DATA.error != true ?
                    <div className={"theme-search-results"}>
                        {
                            Object.values(FETCH_DATA.result).map((ticket,index)=>
                                <Ticket data={ticket} key={`${index}_ticket`}/>)
                        }
                        <button onClick={handleNextPage}
                                className={"btn _tt-uc _fs-sm btn-dark btn-block btn-lg"}>
                            Показать еще
                        </button>
                    </div>
                     : <div>Результатов нету</div>
                : null
        }
        {

            LOADING && <Loader classes={'result_preloader'}/>

        }
    </React.Fragment>


};

export default Tickets;