import React from 'react';

const Ticket = ({data}) => {

    return (
        <div className="theme-search-results-item _br-3 _mb-20 _bsh-xl theme-search-results-item-grid">
            <div className="theme-search-results-item-preview">
                <div className="row" data-gutter="20">
                    <div className="col-md-5">
                        <img className="theme-search-results-item-img" loading="lazy" src={data.photo}
                             alt="Image Alternative text" title="Image Title"/>
                        <ul className="theme-search-results-item-car-feature-list">
                            <li>
                                <i className="fa fa-male"></i>
                                <span>{data.capacity}</span>
                            </li>
                            <li>
                                <i className="fa fa-suitcase"></i>
                                <span>{data.capacity}</span>
                            </li>
                        </ul>
                    </div>
                    <div className="col-md-5">
                        <h5 className="theme-search-results-item-title theme-search-results-item-title-lg">
                            {data.models[0]} <br/> <small>{data.car_class}</small>
                        </h5>
                        <div className="theme-search-results-item-car-location">
                            <i className="fa fa-taxi theme-search-results-item-car-location-icon"></i>
                            <div className="theme-search-results-item-car-location-body">
                                <p className="theme-search-results-item-car-location-title">{data.start.title}</p>
                                <p className="theme-search-results-item-car-location-subtitle">{data.start.type_title}</p>
                            </div>
                        </div>
                        <ul className="theme-search-results-item-car-list">
                            {
                                data.services.map(({value, title}) => {
                                    if (isNaN(parseInt(value))) {

                                        return (
                                            <li>
                                                {
                                                    (value === 'Да' || value == 'Yes')
                                                        ? <i className="fa fa-check"></i>
                                                        : <i className="fa fa-close" style={{color: "red"}}></i>
                                                }
                                                {title}
                                            </li>
                                        )
                                    }
                                    else return (
                                        <li>
                                            <i className="fa fa-check"></i>
                                            {title} ({value} мин)
                                        </li>
                                    )
                                })
                            }
                        </ul>
                    </div>
                    <div className="col-md-2">
                        <div className="theme-search-results-item-book">
                            <div className="theme-search-results-item-price">
                                <p className="theme-search-results-item-price-tag">{data.price[0].amount} {data.price[0].currency}</p>
                                <p className="theme-search-results-item-price-sign">за поездку</p>
                            </div>
                            <a className="btn btn-primary-inverse btn-block theme-search-results-item-price-btn"
                               href="#">Бронировать</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    );
};

export default Ticket;