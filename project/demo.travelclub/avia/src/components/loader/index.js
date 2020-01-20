import React from 'react';

const Preloader = ({classes}) => {
    return (
        <div  className={classes}>
        <div className="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>
    );
};

export default Preloader;