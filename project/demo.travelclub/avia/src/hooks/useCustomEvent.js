const useCustomEvent = nameEvent => data =>{
    if(Array.isArray(nameEvent)){
        nameEvent.forEach(item=>{

            document.dispatchEvent(new CustomEvent(item, {
                detail:{...data}
            }));
        })
    }
    else{
        document.dispatchEvent(new CustomEvent(nameEvent, {
            detail:{...data}
        }));
    }

}

export default useCustomEvent;