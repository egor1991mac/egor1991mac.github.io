import React from 'react';
import { GlobalContext } from '.';

export const GlobalState = ({children}) =>{



    return(
        <GlobalContext.Provider>
            {children}
        </GlobalContext.Provider>
    )
}