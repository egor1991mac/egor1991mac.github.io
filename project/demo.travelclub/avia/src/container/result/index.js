import React,{useEffect, useState, Suspense} from 'react';
import {ResultState} from "./reducer/resultState";
import {ResultContext} from "./context/context";
import Tickets from '../../components/tickets';



const Index = ({lang,query}) => {
    return (
        <ResultState url={query} lang={{
            Business:lang.CLASS_BUSINESS,
            Economy:lang.CLASS_ECONOMY,
            First:lang.CLASS_FIST,
            PremiumEconomy: lang.PREMIUMECONOMY
        }}>
            <ResultContext.Consumer>
                {
                    (props)=>
                        <>
                                    <Tickets />
                        </>
                }
            </ResultContext.Consumer>
        </ResultState>
    );
};

export default Index;