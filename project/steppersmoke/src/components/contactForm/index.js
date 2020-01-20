import React from 'react';

import {makeStyles} from '@material-ui/core/styles';

import TextField from '@material-ui/core/TextField';
import validator from 'validator';
import MaskedInput from 'react-text-mask';

function TextMaskCustom(props) {
    const { inputRef, ...other } = props;

    return (
        <MaskedInput
            {...other}
            ref={ref => {
                inputRef(ref ? ref.inputElement : null);
            }}
            mask={[/[1-9]/,/[1-9]/,/[1-9]/,'(', /[1-9]/, /[1-9]/, ')',/\d/, /\d/, /\d/, '-', /\d/, /\d/,'-', /\d/,/\d/]}
            placeholderChar={'\u2000'}
            showMask
        />
    );
}

const useStyles = makeStyles(theme => ({
    container: {
        display: 'flex',
        flexWrap: 'wrap',
        flexDirection: 'column',
        alignItems:'center'
    },
    textField: {
        marginTop:'1.35rem',
        marginLeft: theme.spacing(1),
        marginRight: theme.spacing(1),

        width: 220,
        "& p":{
            position:'absolute',
            bottom:-15
        }
    },
    dense: {
        marginTop: 19,
    },
    menu: {
        width: 200,
    },
    inputClasses:{
        padding:'0.75rem 1rem'
    },

    inputLabel:{
        transform: 'translate(1rem, 0.9rem) scale(1)'
    }
}));

const defaultState = {
    email:
        {
            value: '',
            error: false,
            errorText: 'Не коректный email'

        },
    name:
        {
            value: '',
            error: false,
            errorText: 'Минимальная длинна  имени 3 '
        },
    phone: {
        value: '375()',
        error: false,
        errorText: 'Не коректный номер телефона'
    },
}

export default function TextFields({GET_DATA,GET_DATA_TEXT,value = defaultState}) {
    const classes = useStyles();
    const [values, setValues] = React.useState(value);
    const [text,setText] = React.useState('');
    //const [errors, setErrors] = React.useState({email: false, name: false, phone: false});
    const handleChange = name => event => {
        switch (name) {
            case 'name':
                if ((event.target.value.length < 3)) {
                    values[name].value = event.target.value;
                    values[name].error = true;
                    setValues({...values});
                    //setErrors({...errors, [name]: true});
                } else {
                    values[name].value = event.target.value;
                    values[name].error = false;
                    setValues({...values});
                    //setErrors({...errors, [name]: false});
                }
                break;
            case 'email':

                if (!validator.isEmail(event.target.value)) {
                    values[name].value = event.target.value;
                    values[name].error = true;
                    setValues({...values});
                    //setErrors({...errors, [name]: true});
                } else {
                    values[name].value = event.target.value;
                    values[name].error = false;
                    setValues({...values});
                    //setErrors({...errors, [name]: false});
                }

                break;
            case 'phone':
                if (value[name].value < 16) {
                    console.log(value[name]);
                    values[name].value = event.target.value;
                    values[name].error = true;
                    setValues({...values});
                } else {
                    values[name].value = event.target.value;
                    values[name].error = false;
                    setValues({...values});
                }
                break;
            case 'text':
                setText(event.target.value);
                GET_DATA_TEXT(event.target.value);
                break;
        }
        
        if(handleEmpty(values,'value') && handleError(values)){
            GET_DATA({valid:true,data:values});
        }


    };

    const handleEmpty = (val,key) =>{
        let filter = [];
        if(typeof val == 'object'){
            filter = Object.values(val).filter(elem=>elem[key].length == 0);
        }
        else{
            filter = val;
        }

        return filter.length === 0 ? true : false;
    };

    const handleError = (val) =>{
        let find = Object.values(val).find(({error})=>error === true);
        return find === undefined ? true : false;
    };

    return (
        <div className={classes.container} autoComplete="off">
            <TextField
                required
                error={values.name.error}
                id="standard-name"
                label={"Ваше имя"}
                className={classes.textField}
                helperText={values.name.error && values.name.errorText}
                value={values.name.value}
                onChange={handleChange('name')}
                margin="dense"
                variant="outlined"
            />
            <TextField
                required
                error={values.email.error}
                id="standard-name"
                label={"Ваш email"}
                helperText={values.email.error && values.email.errorText}
                className={classes.textField}
                value={values.email.value}
                onChange={handleChange('email')}
                margin="dense"
                variant="outlined"
            />
            <TextField
                required
                error={values.phone.error}
                id="standard-name"
                label={"Ваш телефон"}
                className={classes.textField}
                value={values.phone.value}
                helperText={values.phone.error && values.phone.errorText}
                onChange={handleChange('phone')}
                InputProps={{
                    inputComponent: TextMaskCustom,
                }}
                margin="dense"
                variant="outlined"
            />

            <TextField
                id="standard-name"
                label={"Коментарии"}
                className={classes.textField}
                value={text}
                onChange={handleChange('text')}
                margin="dense"
                multiline
                rows="4"
                variant="outlined"
            />


        </div>
    );
}