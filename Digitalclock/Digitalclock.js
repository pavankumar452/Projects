var interval;
function start(){
    if(!interval)
    {
        interval=setInterval("updateTime()",1000);
    }
}
function stop(){
    clearInterval(interval);
    interval=null;
}
function updateTime(){
        const time=new Date();
        var getSec = time.getSeconds();
        var getMin = time.getMinutes();
        var getHour=time.getHours();
        var getMonth=time.getMonth()+1;
        var getDate=time.getDate();
        if(time.getSeconds()<10)getSec="0"+time.getSeconds();
        if(time.getMinutes()<10)getMin="0"+time.getMinutes();
        if(time.getHours()<10)getHour="0"+time.getHours();
        if(time.getDate()<10)getDate="0"+time.getDate();
        if(time.getMonth()<10)getMonth="0"+(time.getMonth()+1);
    document.getElementById("hr").innerHTML=getHour;
    document.getElementById("min").innerHTML=getMin;
    document.getElementById("sec").innerHTML=getSec;
    document.getElementById("Date").innerHTML=getDate;
    document.getElementById("month").innerHTML=getMonth;
    document.getElementById("year").innerHTML=time.getFullYear();
}     
window.onload=function(){
    start();
}