import React, {useContext} from 'react';
import {InputRangeContext} from "./context";

const InputRange = ({lang}) => {
   const {state, handleChecked} = useContext(CheckboxContext);
    return state ?
        <InputRange
            formatLabel = {(value)=> `${value} ${Object.keys(price)}`}
            draggableTrack
            maxValue={parseInt(Object.values(price)[0].max)}
            minValue={parseInt(Object.values(price)[0].min)}
            value={PriceValue}
            step={1000}
            onChange={handleChangePrice}
            //onChangeComplete={}
        />
        : null


};

export default CheckBox;