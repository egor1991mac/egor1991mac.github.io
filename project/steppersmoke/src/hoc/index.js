import React, {Component} from 'react';
import {isEqual} from 'lodash';
import axios from 'axios';
import * as qs from "qs";

function sleep(time) {
    return new Promise((resolve) => setTimeout(resolve, time))
}



class withStepper extends Component {
    componentDidUpdate(prevProps, prevState, snapshot) {

    }

    state={
        loading:false,
        alert:[],
        diseases:[
            {
                Id:1,
                Name:'1',
                kinds: [
                    {
                        Id:1,
                        Name:'1',
                    },{
                        Id:2,
                        Name:'2',
                    },{
                        Id:3,
                        Name:'4',
                    },
                ]
            }
        ],
    };


    sendData = async () =>{
        const {loading, alert, ...rest} = this.state;
        const body = qs.stringify(rest,{arrayFormat :  ' brackets ' });
        try {

            this.setState({loading:true});
            await sleep(3000);
            const result = await axios.post('/',body);
            this.setState({loading:false,
                alert:{type:'success',text:"Спасибо за бронирование. Мы с вами свяжемся"}
            });
        }
        catch (e) {

            this.setState({loading:false,
                alert:{type:'error',text:"Извините. Произошла ошибка."}
            });
        }
    };
    filtred_value = (name,value) => this.state[name].find(item=> item.Id === parseInt(value));


    select_value = name => value =>{
        const {selected_diseases} = this.state;
        let data = [];
        if(selected_diseases){
            console.log(value);
            data = selected_diseases.value.kinds.find(item=>item.Id === parseInt(value.data))
        }
        else{
            data = this.filtred_value(name,value.data);
        }

        this.setState({
            [`selected_${name}`]:{
                valid: value.valid,
                value: data}
        });
    };
    select_data = name => value =>{
        this.setState({[name]:value});
    };



    render() {
        return this.props.children(
            {
                ...this.state,
                select_value: this.select_value,
                select_data:this.select_data,
                send_data: this.sendData
            })

    }
}

export default withStepper;
