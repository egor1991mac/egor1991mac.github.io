import React from 'react';
import {} from '../../source/api';
const Index = ({lang,callback}) => {
    function HandleClick(e) {
        e.preventDefault();
        let event =  new CustomEvent('queryParam',{detail:'hello'});
        document.dispatchEvent(event);
    }
    return (
        <>
            фильтр
        <form action="">
            <div className="form-group">
                <label htmlFor="">
                    {lang.FROM.label}
                </label>
                <input type="text"/>
            </div>
            <div className="form-group">
            </div>
            <button onClick={HandleClick}></button>
        </form>
            </>
    );
};

export default Index;