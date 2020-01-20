import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Input from '@material-ui/core/Input';
import OutlinedInput from '@material-ui/core/OutlinedInput';
import FilledInput from '@material-ui/core/FilledInput';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import FormHelperText from '@material-ui/core/FormHelperText';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import nanoid from 'nanoid';
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
}));

export default function SimpleSelect({placeholder,name,id,options,value,GET_DATA}) {
    const classes = useStyles();
    const [values, setValues] = React.useState(value);

    const inputLabel = React.useRef(null);

    React.useEffect(()=>{
        setValues(value);
    })

    function handleChange(event) {
        if(event.target.value){
            setValues(event.target.value);
            GET_DATA({valid:true,data:event.target.value});
        }

    }

    return (
            <>
            <FormControl  variant="outlined" className={classes.formControl}>
                <InputLabel>{placeholder}</InputLabel>
                <Select
                    value={values}
                    onChange={handleChange}
                    input={
                        <OutlinedInput name="age"  id="outlined-age-native-simple" />
                    }
                >
                    {
                        options.map(({Name, Id}) =>
                            <MenuItem value={Id} key={nanoid()}> {Name}</MenuItem>
                        )

                    }

                </Select>
            </FormControl>
            </>

    );
}