import React from 'react';
import PropTypes from 'prop-types';
import {makeStyles} from '@material-ui/core/styles';
import DialogTitle from '@material-ui/core/DialogTitle';
import Dialog from '@material-ui/core/Dialog';
import DialogContent from '@material-ui/core/DialogContent';

import Typography from '@material-ui/core/Typography';
import {blue} from '@material-ui/core/colors';

const emails = ['username@gmail.com', 'user02@gmail.com'];
const useStyles = makeStyles({
    root: {
        padding:0,

    },
    paper:{
      width:'100%',
        margin:'1rem'
    },
    avatar: {
        backgroundColor: blue[100],
        color: blue[600],
    },
    tittle:{
        borderBottom:'1px solid lightGray',
        display:'flex',
        flexDirection: 'column',
        alignItems:'center',
        '& > span':{
            color: '#3763b4',
            fontWeight:'bold',
            fontSize: '1rem'
        }
    },

    relative:{

        position:'relative'
    }

});

export default function StepperDialog({open = new Function(), onClose = new Function(), children, title=''}) {
    const classes = useStyles();


    return (
        <Dialog
                onClose={onClose}
                open={open}
                aria-labelledby="simple-dialog-title"
                maxWidth={"sm"}
                classes={{paper:classes.paper}}
                fullWidth={true}>
            <DialogTitle disableTypography={true} className={classes.tittle}>
                {title}
            </DialogTitle>
            <DialogContent className={classes.root}>
                <div className={classes.relative}>
                    {
                        children && children
                    }
                </div>
            </DialogContent>
        </Dialog>
    );
}

StepperDialog.propTypes = {
    onClose: PropTypes.func,
    open: PropTypes.bool,
    selectedValue: PropTypes.string,
};

