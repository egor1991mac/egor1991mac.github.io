import React, {useState} from 'react';
import useCustomEvent from '../../hooks/useCustomEvent';
const Sort = () => {
    const [sortDuration,setSortDuration] = useState(false);
    const [sortPrice,setSortPrice] = useState(false);
    const event = useCustomEvent;
    const handleSortDuration = (e) =>{
        e.preventDefault();
        setSortDuration(!sortDuration);
        event('dispatchSortDuration',{sortDuration:sortDuration})
    };

    const handleSortPrice = (e) =>{
        e.preventDefault();
        setSortPrice(!sortPrice);
        event('dispatchSortPrice', {sortPrice:sortPrice});
    };

    return (

        <div className="theme-search-results-sort _mob-h clearfix">

            <ul className="theme-search-results-sort-list">
                <li>
                    <a href="#" onClick={handleSortPrice}>
                        Цена
                        {
                            sortPrice ? <span>Высокая → Низкая</span> : <span>Низкая → Высокая</span>

                        }
                    </a>
                </li>
                <li className="active" onClick={handleSortDuration}>
                    <a href="#">Продолжительность
                        {
                            sortDuration ? <span>Долго → Коротко</span> : <span>Коротко → Долго</span>
                        }

                    </a>
                </li>
            </ul>
        </div>

    );
};

export default Sort;