import React, {useContext, useEffect,useState, useRef} from "react";
import ReactDOM, {createPortal} from 'react-dom';
import {Manager, Reference, Popper} from 'react-popper';
import {PopupContext} from "./context";
import {PopupState} from "./PopupState";
import useOutsideClick  from '../../hooks/clickOutside';
const Popup = ({innerRef,children}) =>{
    const {state:{VISIBLE},handleHidePopup} = useContext(PopupContext);
    const [node,setNode] = useState(innerRef.current);
    useEffect(()=>{
        if(innerRef){
            setNode(innerRef.current);
        }
    },[innerRef.current]);


    const popupRef = useRef(null);
    useOutsideClick(popupRef,()=>{
       handleHidePopup();
    });

    return (
        VISIBLE &&
            <Manager>{
                ReactDOM.createPortal(

                    <Popper placement="bottom-start" referenceElement={node}>

                        {({ ref, style, placement, arrowProps }) => {

                            return(
                            <div ref={ref}  data-placement={placement} style={{...style,zIndex:9999999}} >
                                <div ref={popupRef}>
                                {
                                    children
                                }
                                </div>
                            </div>
                        )}}
                    </Popper>,document.getElementById("autoCompleatePopper"))
            }
            </Manager>

    )

}


export default Popup;