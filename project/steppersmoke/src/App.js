import React from 'react';
import Dialog from './components/dialog';
import Button from '@material-ui/core/Button';
import Select from './components/select';
import Stepper from './components/stepper';
import Datepicker from './components/datepicker';
import ContactForm from './components/contactForm';
import Typography from '@material-ui/core/Typography';


import AlertMessage from './components/alert';
import Loader from './components/loader';
import {makeStyles} from "@material-ui/core";
import CssBaseline from '@material-ui/core/CssBaseline';
import FromData from './data/country';
import WithStepper from './hoc';

import ToData from './data/curort';
import nanoid from 'nanoid';



const useStyles = makeStyles(theme => ({
    flex: {
        display: 'flex',
        flexWrap:'wrap',
        justifyContent:'center',
        margin:'1rem 0 0 0'
    },
    colorButton:{

        color:'white',
        background:'#c02122',
        "& span":{
            textShadow:'2px 2px 2px rgba(0, 0, 0, 0.4196078431372549)'
        },
        "& svg":{
            fill:'white'
        }
    }

}));

function App({   diseases,
                 selected_diseases=[],
                 selected_kinds = [],
                 date = [],
                 days =[],
                 people =[],
                 contact_form = [],
                 contact_text = [],
                 select_value,
                 select_data,
                 send_data,
                alert=[],
                loading=''
             },props) {


console.log(alert,'-alert');

    const [open, setOpen] = React.useState(false);

    // React.useEffect(() => {
    //     if (From.length == 0) {
    //         getFrom();
    //     }
    //     if (To.length == 0) {
    //         getTo();
    //     }
    // });


    const classes = useStyles();
    const handleOpen = () => {
        setOpen(!open);
    };
    if (!loading) {
        return (
            <div className="App">
                <CssBaseline/>
                <div className={'ts-stepper'}>
                <Button onClick={handleOpen} className={classes.colorButton}>

                    <span style={{margin:'0.5rem'}}>
                        Быстрый подбор санатория
                    </span>
                </Button>
                </div>
                <Dialog
                    open={open}
                    onClose={handleOpen}
                    title={<>

                        <Typography variant={'h6'} color={'primary'}>
                           Поиск санаториев
                        </Typography>
                    </>}
                >
                    <Stepper
                        SEND={send_data}
                        onClose={handleOpen}

                        data={[
                            {
                                valid: !Array.isArray(selected_diseases) && !Array.isArray(selected_kinds) ? selected_kinds.valid ? true : false : false,
                                text: <span>В какую страну <br/> Вы хотели бы отправиться?</span>,
                                component:
                                    <div className={classes.flex}>
                                        <Select
                                            placeholder={'Откуда'}
                                            name={'from'}
                                            options={diseases.length != 0 &&  diseases}
                                            GET_DATA={select_value('diseases')}
                                            value={!Array.isArray(selected_diseases) ? selected_diseases.value.Id : null}
                                            id={nanoid()}
                                        />
                                        <Select
                                            placeholder={'Куда'}
                                            name={'to'}
                                            options={!Array.isArray(selected_diseases) ? selected_diseases.value.kinds : [{Id:0,Name:0}]}
                                            GET_DATA={select_value('kinds')}
                                            value={!Array.isArray(selected_kinds) ? selected_kinds.value.Id : null}
                                            id={nanoid()}
                                        />
                                    </div>

                            },
                            {
                                valid: date.hasOwnProperty('valid') ? date.valid ? true : false : false,
                                text: <span>Какая дата вылета Вам <br/> будет удобна?</span>,
                                component: <Datepicker
                                    GET_DATA={select_data('date')}
                                    value={ !Array.isArray(date) ? date.value : undefined}
                                />
                            }, {
                                valid: days.valid ? true : false,
                                text: <span>На сколько дней <br/> Вы планируете отдых?</span>,
                                component: <Select
                                    type={'type_array'}
                                    placeholder={'Дней'}
                                    name={'days'}
                                    GET_DATA={select_data('days')}
                                    value={!Array.isArray(days) ? days.data : ""}
                                    id={nanoid()}
                                    options={[
                                        {
                                            Id: 1,
                                            Name: '3 дня',
                                        },
                                        {
                                            Id: 2,
                                            Name: '4 дня',
                                        },
                                        {
                                            Id: 3,
                                            Name: '5 дней',
                                        },
                                        {
                                            Id: 4,
                                            Name: '6 дней'
                                        },
                                        {
                                            Id: 5,
                                            Name: '7 дней'
                                        },
                                        {
                                            Id: 6,
                                            Name: '8 дней'
                                        },
                                        {
                                            Id: 7,
                                            Name: '9 дней'
                                        },
                                        {
                                            Id: 8,
                                            Name: '10 дней'
                                        },
                                        {
                                            Id: 9,
                                            Name: '11 дней'
                                        },
                                        {
                                            Id: 10,
                                            Name: '12 дней'
                                        },
                                        {
                                            Id: 11,
                                            Name: '13 дней'
                                        },
                                        {
                                            Id: 12,
                                            Name: '14 дней'
                                        },
                                        {
                                            Id: 12,
                                            Name: 'на 3 недели'
                                        }
                                    ]}
                                />
                            },
                            {
                                valid: people.valid ? true : false,
                                text: <span>Сколько человек <br/> едет в тур?</span>,
                                component: <Select
                                    type={'type_array'}
                                    placeholder={'Туристов'}
                                    name={'tourist'}
                                    GET_DATA={select_data('people')}
                                    value={people.length == 0 ? "" : people.data}
                                    id={nanoid()}
                                    options={[
                                        {
                                            Id: '1',
                                            Name: '1 взрослый'
                                        },

                                        {
                                            Id: 2,
                                            Name: '1 взрослый 1 ребенок'
                                        },
                                        {
                                            Id: 3,
                                            Name: '1 взрослый 2 ребенка'
                                        },
                                        {
                                            Id: 4,
                                            Name:'2 взрослых'
                                        },
                                        {
                                            Id: 5,
                                            Name: '2 взрослых 1 ребенок'
                                        },

                                        {
                                            Id: 6,
                                            Name: '2 взрослый 2 ребенка'
                                        },
                                        {
                                            Id: 7,
                                            Name: '3 взрослых',
                                        },
                                        {
                                            Id: 8,
                                            Name: '3 взрослых 1 ребенок'
                                        },{
                                            Id: 9,
                                            Name: '3 взрослых 2 ребенка'
                                        },{
                                            Id: 10,
                                            Name: '3 взрослых 1 ребенок'
                                        },{
                                            Id: 11,
                                            Name: '3 взрослых 2 ребенка'
                                        },
                                        {
                                            Id: 12,
                                            Name: '4 взрослых'
                                        }

                                    ]}
                                />
                            },
                            {
                                valid: contact_form.valid ? true : false,
                                text: <span>Расскажите <br/> о себе поподробней!</span>,
                                component: <ContactForm
                                    GET_DATA={select_data('contact_form')}
                                    GET_DATA_TEXT={select_data('contact_text')}
                                    value={contact_form.length > 0 ? contact_form : undefined}
                                />
                            }
                        ]}
                    />
                </Dialog>
                {
                    !Array.isArray(alert) ?
                        <AlertMessage type = {alert.type} message = {alert.text} GET_DATA={select_data("alert")}/>
                        : null
                }

            </div>

        );
    } else {
        return <>
        <CssBaseline/>
        <Loader/></>
    }

}






const STEPPER = () => (
    <WithStepper>
        {
            data => <App {...data}/>

        }
    </WithStepper>

);

export default STEPPER;

