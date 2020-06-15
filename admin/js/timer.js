function odliczanie()
	{
		var dzisiaj = new Date();
		
        var dzien = dzisiaj.getDate();
        
        var miesiac = dzisiaj.getMonth()+1;
        if (miesiac<10) miesiac = "0"+miesiac;

        var rok = dzisiaj.getFullYear();
        
		var godzina = dzisiaj.getHours();
		if (godzina<10) godzina = "0"+godzina;
		
		var minuta = dzisiaj.getMinutes();
		if (minuta<10) minuta = "0"+minuta;
		
		var sekunda = dzisiaj.getSeconds();
        if (sekunda<10) sekunda = "0"+sekunda;

        var weekday=new Array("niedziela","poniedziałek","wtorek","środa","czwartek","piątek","sobota")
        
		document.getElementById("zegar").innerHTML = 
		 "Witamy, dzisiaj jest " + weekday[dzisiaj.getDay()] + "<br>" +dzien+"/"+miesiac+"/"+rok+" | "+godzina+":"+minuta+":"+sekunda;
		 
		 setTimeout("odliczanie()",1000);
	}