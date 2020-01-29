import {useEffect} from 'React';

export const useFetchData = () =>{
    useEffect(() => {
        document.addEventListener('dispatchForm', function (e) {
            setStartSearch(true);
        });
        return () => {
            document.removeEventListener('dispatchForm', function (e) {
            })
        }
    },);
    useEffect(() => {
        if (startSearch){
            GetDataTickets(dispatch, url.INIT_DATA, dispatchDataFilter(["dispatchDataFilter","dispatchResetSort"]));
            setStartSearch(false);
        }
    }, [startSearch]);
}