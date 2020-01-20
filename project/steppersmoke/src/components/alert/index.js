import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import ClickAwayListener from '@material-ui/core/ClickAwayListener';
const useStyles = makeStyles(theme => ({
    container:{
        display:'flex',
        alignItems:'center',
        justifyContent:'center',
        position:'fixed',
        width:'100%',
        height:'100%',
        top:0,
        left:0,
        background: '#00000040'
    },
    root: {
        padding: theme.spacing(3, 2),
        maxWidth: '320px'
    },
}));

export default function PaperSheet({message,GET_DATA}) {
    const classes = useStyles();
    const handleClickAway = () =>{
        GET_DATA([]);
    };
    return (
        <div className={classes.container}>
            <ClickAwayListener onClickAway={handleClickAway}>
            <Paper className={classes.root}>
                <Typography component="p">
                    {message}
                </Typography>
            </Paper>
            </ClickAwayListener>
        </div>
    );
}
