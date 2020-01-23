export default function(){

    const calendarbTurov = document.querySelector('#calendarbTurov');
    if(calendarbTurov){
        const btnMonth = Array.from(calendarbTurov.querySelectorAll('[data-btnmonth]'));
        const rowMonth = Array.from(calendarbTurov.querySelectorAll('[data-month]'));
        const selectMonth = calendarbTurov.querySelector('select[name="month"]');

        selectMonth.onchange = () =>{
            rowMonth.forEach(month=>{

                if(selectMonth.value != month.dataset.month && selectMonth.value != 0){
                    month.style.display = 'none';
                }
                else if(selectMonth.value == month.dataset.month){
                    month.style.display = 'table-row';
                }
                else if(selectMonth.value == 0){
                    month.style.display = 'table-row';
                }
            })
        };

        btnMonth.forEach(btn=>{
            btn.classList.remove('active');

            btn.onclick = () =>{
                rowMonth.forEach(month=>{

                    if(btn.dataset.btnmonth != month.dataset.month && btn.dataset.btnmonth != 0){
                        month.style.display = 'none';
                    }
                    else if(btn.dataset.btnmonth == month.dataset.month){
                        month.style.display = 'table-row';
                    }
                    else if(btn.dataset.btnmonth == 0){
                        month.style.display = 'table-row';
                    }
                })
            }
        })
    }

}
