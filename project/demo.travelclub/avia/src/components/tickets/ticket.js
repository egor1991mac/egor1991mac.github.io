import React, {useContext, useState} from 'react';
import moment from 'moment';
import 'moment/locale/ru';
import FlightSection from './flight_section';
import MoreDetails from './more_details';
import {Collapse} from 'react-collapse';
import {getTimeFromMins} from '../../source/api';
import {ResultContext} from '../../container/result/context/context.js'



function substractDate(data1,data2,flag) {
    const m1=moment(data1),m2=moment(data2);
    const minets = m1.diff(m2,'minutes');
    return  getTimeFromMins(minets);
}

function substractDateDays(date1,utc1,date2,utc2) {
    const m1 = moment(date1), m2 = moment(date2);
    const utc = Math.abs(utc1)+Math.abs(utc2);
    const min = m1.diff(m2.add('hours',-utc),'minutes');
    return getTimeFromMins(min);
}

const Ticket = ({data}) => {
    const {price=null,from=null, to=null} = data;
    const [isOpen, setIsOpen] = useState(false);
    const {lang} = useContext(ResultContext);


    return (
        <div className={"theme-search-results-item _mb-10 theme-search-results-item-rounded theme-search-results-item"}>
            <div className={"theme-search-results-item-preview"}>
                <div className="row" data-gutter="20">
                    <div className="col-md-10 cursor-pointer" onClick={() => setIsOpen(!isOpen)}>
                        <div className="theme-search-results-item-flight-sections">
                            {
                                from &&
                                <FlightSection
                                    route_segment={from.route_segment}
                                    class_air={from.class_air}
                                    company={from.company}/>
                            }
                            {

                                to &&
                                <FlightSection
                                    route_segment={to.route_segment}
                                    class_air={to.class_air}
                                    company={to.company}/>

                            }

                        </div>

                    </div>
                    <div className="col-md-2 ">
                        <div className="theme-search-results-item-book">
                            <div className="theme-search-results-item-price">
                                <p className="theme-search-results-item-price-tag">{price[0].amount} {price[0].currency}</p>
                                <p className="theme-search-results-item-price-sign">{lang[from.class_air]}</p>
                            </div>
                            <a className="btn btn-primary-inverse btn-block theme-search-results-item-price-btn"
                               href="#">Бронировать</a>
                        </div>
                    </div>
                </div>
            </div>


                <Collapse isOpened={isOpen}>
                    <div className="theme-search-results-item-extend" style={{overflow:"hidden"}}>
                    <a className="theme-search-results-item-extend-close" href="#searchResultsItem-1" role="button" onClick={(e)=>{
                        e.preventDefault();
                        setIsOpen(!isOpen);
                    }}
                       data-toggle="collapse" aria-expanded="true" aria-controls="searchResultsItem-1">✕</a>
                    <div className="theme-search-results-item-extend-inner">
                        <div className="theme-search-results-item-flight-detail-items">

                                {
                                    from &&
                                    <MoreDetails route_segment={from.route_segment}/>
                                }
                                {
                                    to &&
                                    <MoreDetails route_segment={to.route_segment}/>
                                }


                        </div>
                    </div>
                    </div>
                </Collapse>


        </div>
    );
};

export default Ticket;