let clock = $("#clock");
    
//  Seleciona e troca o texto do elemento de "#clock" pelo horário atual
function updateClock(){

    let date = new Date();

    let hours = fixZero(date.getHours()) + ":" + fixZero(date.getMinutes()) + ":" + fixZero(date.getSeconds());

    clock.text(hours);

    }

//  Verifica se o argumento passado é menor que 10, caso seja retorna zero concatenado com o argumento. Caso seja igual ou maior que 10, retorna o próprio argumento
function fixZero(time){

    return time < 10 ? `0${time}` : time;

}

//  Chama a função "updateClock()" a cada 1 sec
setInterval(updateClock, 1000);
updateClock();

