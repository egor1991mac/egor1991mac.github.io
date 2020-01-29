import React from 'react';
import moment from 'moment';
import {getTimeFromMins} from '../../source/api';
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
const FlightSection = ({company=null, route_segment = null, air_class=null}) => {
    return (
        <div className="theme-search-results-item-flight-section">
            <div className={"row row-no-gutter row-eq-height"}>
                <div className="col-md-2"> {company ? company : "Заглушка"}</div>
                <div className="col-md-10 ">
                    <div className={"theme-search-results-item-flight-section-item"}>
                        <div className="row">

                            {
                                //точка вылета
                            }
                            <div className="col-md-3">
                                <div className="theme-search-results-item-flight-section-meta">
                                    <p className="theme-search-results-item-flight-section-meta-time">
                                        {
                                            moment(route_segment[0].segment.date.start).format('HH:mm')
                                        }
                                    </p>
                                    <p className="theme-search-results-item-flight-section-meta-city">
                                        {
                                            route_segment[0].segment.start.city_name_ru
                                        }
                                    </p>
                                    <p className="theme-search-results-item-flight-section-meta-date">
                                        {
                                            moment(route_segment[0].segment.date.start).format('LL')
                                        }
                                    </p>
                                </div>
                            </div>

                            {

                                // Маршрут
                            }
                            <div className="col-md-6">
                                <div className="theme-search-results-item-flight-section-path">
                                    <div
                                        className="theme-search-results-item-flight-section-path-fly-time">
                                        <p>{substractDateDays(
                                            route_segment[route_segment.length - 1].segment.date.end,
                                            route_segment[route_segment.length - 1].segment.end.utc,
                                            route_segment[0].segment.date.start,
                                            route_segment[0].segment.start.utc
                                        )}</p>
                                    </div>
                                    <div
                                        className="theme-search-results-item-flight-section-path-line"></div>
                                    <div
                                        className="theme-search-results-item-flight-section-path-line-start">
                                        <i className="fa fa-plane theme-search-results-item-flight-section-path-icon"></i>
                                        <div
                                            className="theme-search-results-item-flight-section-path-line-dot"></div>
                                        <div
                                            className="theme-search-results-item-flight-section-path-line-title"> {
                                            route_segment[0].segment.start.airport_code
                                        }
                                        </div>
                                    </div>

                                    {
                                        route_segment.length > 1 &&
                                        route_segment.map((item, index) => {
                                            if(index > 0 && index != route_segment.length){
                                                return <div key={`${index}_route_segment`}
                                                            className="theme-search-results-item-flight-section-path-line-middle-1"
                                                            style={{left: `${(100 / route_segment.length - 1) * index}%`}}>

                                                    <i className="fa fa-plane theme-search-results-item-flight-section-path-icon"></i>
                                                    <div
                                                        className="theme-search-results-item-flight-section-path-line-dot"></div>
                                                    <div
                                                        className="theme-search-results-item-flight-section-path-line-title">
                                                        {
                                                            item.segment.start.airport_code
                                                        }
                                                    </div>
                                                </div>
                                            }


                                        })
                                    }
                                    <div
                                        className="theme-search-results-item-flight-section-path-line-end">
                                        <i className="fa fa-plane theme-search-results-item-flight-section-path-icon"></i>
                                        <div
                                            className="theme-search-results-item-flight-section-path-line-dot"></div>
                                        <div
                                            className="theme-search-results-item-flight-section-path-line-title">
                                            {
                                                route_segment[route_segment.length - 1].segment.end.airport_code
                                            }
                                        </div>

                                    </div>


                                </div>
                            </div>
                            {
                                // точка прилета
                            }
                            <div className="col-md-3">
                                <div className="theme-search-results-item-flight-section-meta">
                                    <p className="theme-search-results-item-flight-section-meta-time">
                                        {
                                            moment(route_segment[route_segment.length - 1].segment.date.end).format('HH:mm')
                                        }
                                    </p>
                                    <p className="theme-search-results-item-flight-section-meta-city">
                                        {
                                            route_segment[route_segment.length - 1].segment.end.city_name_ru
                                        }
                                    </p>
                                    <p className="theme-search-results-item-flight-section-meta-date">
                                        {
                                            moment(route_segment[route_segment.length - 1].segment.date.end).format('LL')
                                        }
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default FlightSection;