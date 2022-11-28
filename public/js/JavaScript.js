(function(){
    'use strict';

    function confirmDel(event){
        event.preventDefault();
        console.log(event);
    }

    if(document.querySelector('#js-del')){
        let btn = document.querySelectorAll('#js-del');
        for(let i=0; i<btn.length;i++){
            btn[i].addEventListener('Click', confirmDel,false);
        }
    }

})(window, document);