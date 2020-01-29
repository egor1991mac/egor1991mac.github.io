import React, {useContext} from 'react';
import {CounterContext} from "./context";

const Result = ({lang, children}) => {
    const {state, handleIncrement, handleDicrement} = useContext(CounterContext);

    const handleChecked = () =>{

    }
    return (

        <div className="quantity-selector-box show" >
            {
                Object.keys(state).map(key=>{
                    {
                        return(
                        <div className="quantity-selector-inner" key={key}>
                            <p className="quantity-selector-title">
                                {
                                    lang[key].label[0]
                                }

                                <small>
                                    {lang[key].info}
                                </small>
                            </p>
                            <ul className="quantity-selector-controls">
                                <li className="quantity-selector-decrement">
                                    <a  onClick={(e)=>{
                                        e.preventDefault();
                                        handleDicrement(key)
                                    }}>-</a>
                                </li>
                                <li className="quantity-selector-current">{state[key]}</li>
                                <li className="quantity-selector-increment">
                                    <a  onClick={(e)=> {
                                        e.preventDefault();
                                        handleIncrement(key)
                                    }}>+</a>
                                </li>
                            </ul>
                        </div>)
                    }
                })
            }

            <hr/>
            {
                children
            }


        </div>
    );
};

export default Result;