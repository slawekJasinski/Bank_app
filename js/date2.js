
var d=new Date()
var weekday=new Array("niedziela","poniedziałek","wtorek","środa","czwartek","piątek","sobota")
var month=new Array("styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień")
            
document.write("Witaj, dzisiaj jest " + weekday[d.getDay()] + " " + d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear() + " r.")
