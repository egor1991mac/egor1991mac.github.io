import 'date-fns';
import React from 'react';
import ruLocale from "date-fns/locale/ru";
import { makeStyles } from '@material-ui/core/styles';
import DateFnsUtils from '@date-io/date-fns';
import TextField from '@material-ui/core/TextField';
import {
    MuiPickersUtilsProvider,
    KeyboardDatePicker,
} from '@material-ui/pickers';

const useStyles = makeStyles({

});

export default function MaterialUIPickers({ GET_DATA, value = { valid:true,data:new Date()}}) {
    // The first commit of Material-UI
    const [selectedDate, setSelectedDate] = React.useState(value.data);
    const classes = useStyles();
    React.useEffect(()=>{
        GET_DATA({valid:true,data: selectedDate});
    },[selectedDate]);

    function handleDateChange(date) {
        setSelectedDate(date);
    };

    return (
        <MuiPickersUtilsProvider utils={DateFnsUtils} locale={ruLocale}>

                <KeyboardDatePicker
                    inputVariant={"outlined"}
                    minDate = {new Date()}
                    margin="dense"
                    disableToolbar
                    variant = "inline"
                    id="mui-pickers-date"
                    label="Выбирите дату"
                    value={selectedDate}
                    format="dd.MM.yyyy"
                    onChange={handleDateChange}
                />


        </MuiPickersUtilsProvider>
    );
}