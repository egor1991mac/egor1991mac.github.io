const useCustomEvent = (nameEvent,data) =>{
    document.dispatchEvent(new CustomEvent(nameEvent, {
        detail:{...data}
    }));
}

export default useCustomEvent;