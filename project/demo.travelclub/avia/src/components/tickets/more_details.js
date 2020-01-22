import React from 'react';
import moment from 'moment';
import 'moment/locale/ru';
import {getTimeFromMins} from '../../source/api';

function substractDate(data1, data2, flag) {
    const m1 = moment(data1), m2 = moment(data2);
    const minets = m1.diff(m2, 'minutes');
    return getTimeFromMins(minets);
}

function substractDateDays(date1, utc1, date2, utc2) {
    const m1 = moment(date1), m2 = moment(date2);
    const utc = Math.abs(utc1) + Math.abs(utc2);
    const min = m1.diff(m2.add('hours', -utc), 'minutes');
    return getTimeFromMins(min);
}

const MoreDetails = ({route_segment = null}) => {
    return (
        <div className="theme-search-results-item-flight-details">
            <div className="row">
                <div className="col-md-3">
                    <div className="theme-search-results-item-flight-details-info">
                        <h5 className="theme-search-results-item-flight-details-info-title">Вылет</h5>
                        <p className="theme-search-results-item-flight-details-info-date">{
                            moment(route_segment[0].segment.date.start).format('LL')
                        }</p>
                        <p className="theme-search-results-item-flight-details-info-cities">
                            {
                                route_segment[0].segment.start.airport_name_ru
                            } → {
                            route_segment[route_segment.length - 1].segment.end.airport_name_ru
                        }</p>
                        <p className="theme-search-results-item-flight-details-info-fly-time">
                            {
                                substractDateDays(
                                    route_segment[route_segment.length - 1].segment.date.end,
                                    route_segment[route_segment.length - 1].segment.end.utc,
                                    route_segment[0].segment.date.start,
                                    route_segment[0].segment.start.utc
                                )
                            }
                        </p>
                        {route_segment.length > 1 &&
                        <p className="theme-search-results-item-flight-details-info-stops">
                            {route_segment.length - 1}
                            {
                                route_segment.length - 1 > 1 ? " пересадки" : " пересадка"
                            }
                        </p>
                        }

                    </div>
                </div>
                <div className="col-md-9">
                    <div className="theme-search-results-item-flight-details-schedule">
                        <ul className="theme-search-results-item-flight-details-schedule-list">
                            {
                                route_segment.length > 1 &&
                                route_segment.map((item, index) =>
                                    <React.Fragment key={`${index}_flight-details-schedule-list`}>
                                        <li>
                                            <i className="fa fa-plane theme-search-results-item-flight-details-schedule-icon"></i>

                                            <div className="theme-search-results-item-flight-details-schedule-dots"></div>
                                            <p className="theme-search-results-item-flight-details-schedule-date">
                                                {
                                                    moment(item.segment.date.start).format('LL')
                                                }
                                            </p>
                                            <div className="theme-search-results-item-flight-details-schedule-time">
                                                                      <span
                                                                          className="theme-search-results-item-flight-details-schedule-time-item">
                                                                          {
                                                                              moment(item.segment.date.start).format('HH:mm')
                                                                          }

                                                                      </span>
                                                <span className="theme-search-results-item-flight-details-schedule-time-separator">—</span>
                                                <span className="theme-search-results-item-flight-details-schedule-time-item">
                                                                            {
                                                                                moment(item.segment.date.end).format('HH:mm')
                                                                            }
                                                </span>
                                            </div>
                                            <p className="theme-search-results-item-flight-details-schedule-fly-time"> {getTimeFromMins(item.segment.time)}</p>
                                            <div
                                                className="theme-search-results-item-flight-details-schedule-destination">
                                                <div
                                                    className="theme-search-results-item-flight-details-schedule-destination-item">
                                                    <p className="theme-search-results-item-flight-details-schedule-destination-title">
                                                        <b> {item.segment.start.airport_code}</b> {item.segment.start.airport_name_ru}
                                                    </p>
                                                    <p className="theme-search-results-item-flight-details-schedule-destination-city">
                                                        {item.segment.start.city_name_ru}
                                                    </p>
                                                </div>
                                                <div
                                                    className="theme-search-results-item-flight-details-schedule-destination-separator">
                                                    <span>→</span>
                                                </div>
                                                <div
                                                    className="theme-search-results-item-flight-details-schedule-destination-item">
                                                    <p className="theme-search-results-item-flight-details-schedule-destination-title">
                                                        <b>{item.segment.end.airport_code}</b> {item.segment.end.airport_name_ru}
                                                    </p>
                                                    <p className="theme-search-results-item-flight-details-schedule-destination-city">
                                                        {item.segment.end.city_name_ru}
                                                    </p>
                                                </div>
                                            </div>
                                            <ul className="theme-search-results-item-flight-details-schedule-features">
                                                <li>7957 Wow</li>
                                                <li>Wide-body jet</li>
                                                <li>Boeing 777</li>
                                                <li>------DEMO</li>
                                            </ul>
                                        </li>
                                        {
                                            index != route_segment.length - 1 &&
                                            <li>
                                                <i className="fa fa-exchange theme-search-results-item-flight-details-schedule-icon"></i>
                                                <div className="theme-search-results-item-flight-details-schedule-dots"></div>
                                                <p className="theme-search-results-item-flight-details-schedule-date">
                                                    {
                                                        moment(route_segment[index].segment.date.end).format('LL')
                                                    }
                                                </p>
                                                <div
                                                    className="theme-search-results-item-flight-details-schedule-time">
                                                                          <span
                                                                              className="theme-search-results-item-flight-details-schedule-time-item">
                                                                              {
                                                                                  moment(route_segment[index].segment.date.end).format('HH:mm')
                                                                              }
                                                                          </span>
                                                    <span
                                                        className="theme-search-results-item-flight-details-schedule-time-separator">—</span>
                                                    <span
                                                        className="theme-search-results-item-flight-details-schedule-time-item">
                                                                                {
                                                                                    moment(route_segment[index + 1].segment.date.start).format('HH:mm')
                                                                                }
                                                                        </span>
                                                </div>
                                                <p className="theme-search-results-item-flight-details-schedule-fly-time">
                                                    {
                                                        substractDate(route_segment[index + 1].segment.date.start, route_segment[index].segment.date.end)
                                                        //moment(moment(route_segment[index+1].segment.date.start).subtract(moment(route_segment[index].segment.date.end))).format('DD.MM.YYYY HHч mmм')
                                                    }
                                                </p>
                                                <p className="theme-search-results-item-flight-details-schedule-transfer">Смена самолета
                                                    в {route_segment[index].segment.end.city_name_ru} ({route_segment[index].segment.end.airport_code})</p>
                                            </li>
                                        }

                                    </React.Fragment>
                                )
                            }

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default MoreDetails;