import React from 'react';
import { makeStyles } from '@material-ui/core/styles';

import OutlinedInput from '@material-ui/core/OutlinedInput';

import InputLabel from '@material-ui/core/InputLabel';

import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import MenuItem from '@material-ui/core/MenuItem';

import nanoid from "nanoid";


const useStyles = makeStyles(theme => ({
    root: {
        display: 'flex',
        flexWrap: 'wrap',
    },
    formControl: {
        margin: theme.spacing(1),
        minWidth: 200,

    },
    selectEmpty: {
        marginTop: theme.spacing(2),
    },
    select:{
        padding:'0.75rem 1rem'
    },
    inputLabel:{
       transform: 'translate(1rem, 0.9rem) scale(1)'
    },


}));

export default function NativeSelects({placeholder,name,id,options,value,GET_DATA}) {
    const classes = useStyles();
    console.log(value,'-value');
    //const [values, setValues] = React.useState(value);

    const inputLabel = React.useRef(null);
    const [labelWidth, setLabelWidth] = React.useState();


    React.useEffect(() => {
        setLabelWidth(inputLabel.current.offsetWidth);
    });

    function handleChange(event) {
        if(event.target.value){
            //setValues(event.target.value);
            GET_DATA({valid:true,data:event.target.value});
        }
    }
    return (
        <div className={classes.root}>
            <FormControl variant="outlined" className={classes.formControl}>
                <InputLabel  className = {classes.inputLabel} ref={inputLabel} htmlFor="outlined-age-native-simple">
                    {placeholder}
                </InputLabel>
                <Select
                    value={value}
                    onChange={handleChange}
                    classes={{
                        select:classes.select
                    }}
                    input={
                        <OutlinedInput  labelWidth={labelWidth} id="outlined-age-native-simple" />
                    }
                >
                    {
                        options.map(({Name, Id}) =>
                            <MenuItem value={Id} key={nanoid()}> {Name}</MenuItem>
                        )
                    }
                </Select>
            </FormControl>

        </div>
    );
}