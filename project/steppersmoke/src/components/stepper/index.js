import React, {useEffect} from 'react';
import {makeStyles} from '@material-ui/core/styles';
import Stepper from '@material-ui/core/Stepper';
import Step from '@material-ui/core/Step';
import StepButton from '@material-ui/core/StepButton';
import Button from '@material-ui/core/Button';
import axios from 'axios';
import { ValidatorForm} from 'react-material-ui-form-validator';

import Typography from '@material-ui/core/Typography';
import * as qs from 'qs';
const useStyles = makeStyles(theme => ({
    root: {
        width: '100%',
        minHeight:320,
        display: 'flex',
        flexDirection: 'column',
        height:'100%',
        alignItems:'center'

    },
    stepContainer:{
      width:'100%',
      padding:'1rem 0',
        background:'#7490cb'
    },
    stepsHeader: {
        textAlign: 'center',
        display:'flex',
        alignItems: 'center',
        justifyContent:'center',
        padding:'1rem 0 0'
    },
    button: {
        marginRight: theme.spacing(1),
    },
    controlContainer: {
        display: 'flex',
        justifyContent: 'center',
        flexDirection: 'column',
        alignItems: 'center'
    },
    contentConteniner: {
        display: 'flex',
        flexGrow: 1,
        width:'100%',
        padding: '0 0 1rem 0',
        flexDirection:'column',
        alignItems:'center',
        justifyContent:'space-between'

    },
    stepButton:{
        padding: 0,
        margin:0,
        '&>span':{
            display:'flex',
            flexDirection:'row !important'
        },
        "& [class$='root']":{
            fill:'white',
            "& [class$='text']":{
                fill:'#7490cb'
            }
        },
        "& [class$='completed']":{
            fill:'white',
            "& [class$='text']":{
                fill:'#7490cb'
            }
        }
    },

    buttonContainer:{
        paddingTop:'2rem'
    },
    backButton: {
        marginRight: theme.spacing(1),
    },
    completed: {
        display: 'inline-block',
    },
    instructions: {
        marginTop: theme.spacing(1),
        marginBottom: theme.spacing(1),
    },
    content:{
        display:'flex',
        flexGrow:1,
        alignItems:'center'
    }
}));

function getSteps(data = []) {
    return data.length > 0 ? data : [{
        text: 'Select campaign settings 1',
        component: <div>hello world</div>
    }, {text: 'Select campaign settings 2', component: <div></div>}, {
        text: 'Select campaign settings3',
        component: <div></div>
    }];
}

function getStepContent(step, data) {
    switch (step) {
        case 0:
            return data[0].component;
        case 1:
            return data[1].component;
        case 2:
            return data[2].component;
        case 3:
            return data[3].component;
        case 4:
            return data[4].component;

    }
}

export default function TourStepper({data,SEND,onClose,property}) {
    const classes = useStyles();
    const [activeStep, setActiveStep] = React.useState(0);
    const [completed, setCompleted] = React.useState(new Set());
    const [skipped, setSkipped] = React.useState(new Set());
    const steps = getSteps(data);

    function totalSteps() {
        return getSteps(data).length;
    }

    function isStepOptional(step) {
        return step === 1;
    }

    function handleSkip() {
        if (!isStepOptional(activeStep)) {
            throw new Error("You can't skip a step that isn't optional.");
        }

        setActiveStep(prevActiveStep => prevActiveStep + 1);
        setSkipped(prevSkipped => {
            const newSkipped = new Set(prevSkipped.values());
            newSkipped.add(activeStep);
            return newSkipped;
        });
    }

    function skippedSteps() {
        return skipped.size;
    }

    function completedSteps() {
        return completed.size;
    }

    function allStepsCompleted() {
        return completedSteps() === totalSteps() - skippedSteps();
    }

    function isLastStep() {
        return activeStep === totalSteps() - 1;
    }

    function handleNext() {
        const newActiveStep =
            isLastStep() && !allStepsCompleted()
                ? steps.findIndex((step, i) => !completed.has(i))
                : activeStep + 1;

        setActiveStep(newActiveStep);
    }

    function handleBack() {
        setActiveStep(prevActiveStep => prevActiveStep - 1);
    }

    const handleStep = step => () => {
        if(completed.has(step)){
            setActiveStep(step);
        }
    };

    function handleComplete() {
        const newCompleted = new Set(completed);
        newCompleted.add(activeStep);
        setCompleted(newCompleted);
        if (!isLastStep()) {
            handleNext();
        }
        else{

            SEND();
            onClose();


        }

    }

    function isStepComplete(step) {
        return completed.has(step);
    }
    return (
        <div className={classes.root} >
            <Stepper alternativeLabel nonLinear activeStep={activeStep} className={classes.stepContainer}>
                {
                    steps.map((label, index) => {
                    const stepProps = {};
                    const buttonProps = {};
                    return (
                        <Step key={label} {...stepProps}>
                            <StepButton

                                className={classes.stepButton}
                                onClick={handleStep(index)}
                                completed={isStepComplete(index)}
                                {...buttonProps}
                            />
                        </Step>
                    );
                })}
            </Stepper>
            <Typography variant={'h5'} className={classes.stepsHeader}>
                {steps[activeStep].text}
            </Typography>
            <div className={classes.contentConteniner}>
                    <div className={classes.content}>
                        {getStepContent(activeStep, data)}
                    </div>
                    <div className={classes.buttonContainer}>
                        {
                            activeStep === totalSteps() - 1  ?
                                <Button variant="contained" color="primary" onClick={handleComplete} disabled={!data[activeStep].valid}  >
                                   Отправить
                                </Button>
                                : <Button variant="contained" color="primary" onClick={handleComplete} disabled={!data[activeStep].valid}>
                                     Далее
                                </Button>
                        }
                    </div>

            </div>
        </div>
    );
}
