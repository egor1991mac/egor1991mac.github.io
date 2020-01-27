import React, {useState} from 'react';
import CheckBox from '../../components/checkbox';
import CheckBoxState from '../../components/checkbox/CheckBoxState';
import FilterState from './FilterState';
import {FilterContext} from './context';
import InputRange from 'react-input-range';
import 'react-input-range/lib/css/index.css';

function ObjectFromArray(data,key,value) {
    let obj = {};

        data.forEach(item=> {
            if(typeof item == "string"){

                obj[item] = item;
            }
            else if( typeof  item == 'number'){
                obj[item] = `${item} ${value}`
            }
            else{
                obj[item[key]] = item[value]
            }
        });
    return obj;
}



const Filter = ({lang, defaultData, query}) => {
    const [PriceValue, setPriceValue] = useState({min: 200000,max:300000});
    const handleChangePrice = (value) =>{
        setPriceValue(value);
    }

    return (
        <FilterState>
            <FilterContext.Consumer>
                {
                    ({state = null, sendData}) => {
                        if (state) {
                            const {
                                transfers_count = [],
                                departure_time = [],
                                arrival_time = [],
                                departure_airports =[],
                                arrival_airports =[],
                                companies = [],
                                price = {},
                            } = state;

                            return (
                                <>
                                    {
                                        transfers_count.length > 0 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Пересадки</h5>
                                            <CheckBoxState
                                                inputName={"transfers_count"}
                                                sendData = {sendData}
                                                defaultDataItems={transfers_count}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>

                                                <CheckBox
                                                    lang={ObjectFromArray(transfers_count, null, 'Пересадка')}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }
                                    {
                                        Object.values(price).length > 0 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Диапозон цен</h5>
                                            <div className={"_mt-30 _mb-10"}>

                                            </div>
                                        </div>
                                    }
                                    {
                                        departure_time.length > 1 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Время вылета</h5>
                                            <CheckBoxState
                                                sendData = {sendData}
                                                inputName={"departure_time"}
                                                defaultDataItems={departure_time}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>
                                                <CheckBox
                                                    lang={{...lang}}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }
                                    {
                                        arrival_time.length > 1 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Время вылета обратно</h5>
                                            <CheckBoxState
                                                sendData = {sendData}
                                                inputName={"arrival_time"}
                                                defaultDataItems={arrival_time}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>
                                                <CheckBox
                                                    lang={{...lang}}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }
                                    {
                                        departure_airports.length > 1 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Аэропорты вылета</h5>
                                            <CheckBoxState
                                                sendData = {sendData}
                                                inputName={"departure_airports"}
                                                defaultDataItems={departure_airports.map(item=>item.code)}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>
                                                <CheckBox
                                                    lang={ObjectFromArray(departure_airports,'code','name_ru')}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }
                                    {
                                        arrival_airports.length > 1 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Аэропорты вылета обратно</h5>
                                            <CheckBoxState
                                                sendData = {sendData}
                                                inputName={"arrival_airports"}
                                                defaultDataItems={arrival_airports.map(item=>item.code)}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>
                                                <CheckBox
                                                    lang={ObjectFromArray(arrival_airports,'code','name_ru')}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }
                                    {
                                        companies.length > 0 &&
                                        <div className={"theme-search-results-sidebar-section"}>
                                            <h5 className="theme-search-results-sidebar-section-title">Компании</h5>
                                            <CheckBoxState
                                                sendData = {sendData}
                                                inputName={"companies"}
                                                defaultDataItems={companies}
                                                defaultData={defaultData.SEARCH_DATA.CLASSES}
                                                parentContext={FilterContext}>
                                                <CheckBox
                                                    lang={ObjectFromArray(companies)}
                                                />
                                            </CheckBoxState>
                                        </div>
                                    }

                                </>
                            )
                        } else {
                            return null
                        }


                    }

                }
            </FilterContext.Consumer>
        </FilterState>

    );
};

export default Filter;