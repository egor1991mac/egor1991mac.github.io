import React, {useContext,useState} from 'react';
import {InputRangeContext} from "./context";
import InputRange from 'react-input-range';
const InputRangeComponent = () => {
    const {min,max, handleChangeData, sendData}  = useContext(InputRangeContext);
    const [value, setValue] = useState({min,max});
    console.log(value);

   //const {state, handleChecked} = useContext(CheckboxContext);
    return (min && max) ?
        <InputRange
            //formatLabel = {(value)=> `${value} ${Object.keys(price)}`}
            draggableTrack
            maxValue={max}
            minValue={min}
            value={value}
            onChange={(value)=>setValue(value)}
            onChangeComplete={(value)=>handleChangeData(value)}
            //tep={1000}

            //onChangeComplete={handleChangeData}
        />
        : null


};

export default InputRangeComponent;