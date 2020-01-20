import React, {Suspense, useState, useContext, useRef, useLayoutEffect,useMemo, useEffect} from 'react';
import {ResultContext} from "../../container/result/context/context";
import {FETCH_DATA} from "../../source/const";
import Ticket from './ticket';






const Tickets = ({lang,inputName}) => {

    const {state} = useContext(ResultContext);
    const data = state[FETCH_DATA] ? state[FETCH_DATA].read().data : null;


    return (
        <div className={"theme-search-results"}>

            {
                data ?
                Object.values(data.result).map((ticket,index)=>
                    <Ticket data={ticket} key={`${index}_ticket`}/>)
                    : null

            }

        </div>

);
};

export default Tickets;