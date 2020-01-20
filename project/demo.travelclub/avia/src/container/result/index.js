import React,{useEffect, useState, Suspense} from 'react';
import {ResultState} from "./reducer/resultState";
import {ResultContext} from "./context/context";
import Tickets from '../../components/tickets';


const Index = ({lang,query}) => {
    return (
        <ResultState url={query}>
            <ResultContext.Consumer>
                {
                    (props)=>
                        <>
                           <Suspense fallback={<div>... Загрузка...</div>}>
                                    <Tickets/>
                           </Suspense>
                        </>
                }
            </ResultContext.Consumer>
        </ResultState>
    );
};

export default Index;