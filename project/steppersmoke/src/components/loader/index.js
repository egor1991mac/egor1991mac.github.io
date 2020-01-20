import React from 'react';
import loader from './loader.module.css';
import style from './style.module.css';
import { makeStyles } from '@material-ui/core/styles';
import Paper from '@material-ui/core/Paper';

const useStyles = makeStyles(theme => ({
    root: {
        display:'flex',
        maxWidth:300,
        alignItems:'center',
        padding:'1rem'
    },
}));
const Index = ({message}) => {
    const classes = useStyles();
    return (
        <div className={style.loader}>
        <Paper className={classes.root}>

                <div className={loader["lds-roller"]}>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
             <span className={style.mx__2}> {message ? message : 'Загрузка'}</span>

        </Paper>
        </div>
    );
};

export default Index;
