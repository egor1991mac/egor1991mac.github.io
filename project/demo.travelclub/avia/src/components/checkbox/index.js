import React, {useContext} from 'react';
import {CheckboxContext} from "./context";

const CheckBox = ({lang}) => {
   const {state, handleChecked} = useContext(CheckboxContext);
    return state ?
            <div className="theme-search-results-sidebar-section-checkbox-list">
                {
                    Object.keys(state).map(key=>
                        <div className="theme-search-results-sidebar-section-checkbox-list-items" key={key}>
                            <div className="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                                <label className="icheck-label" onClick={()=>handleChecked(key)}>
                                    <div className={`icheck ${state[key] ? 'checked' : ''}`} style={{position: "relative"}}>
                                    </div>
                                    <span className="icheck-title">{
                                       lang && lang[key]
                                    }</span>
                                </label>

                            </div>
                        </div>
                    )
                }
            </div>
        : null


};

export default CheckBox;