function czas(){
    var data = new Date();
    var sekundy = data.getSeconds()
        if(sekundy<10){
            sekundy = "0"+sekundy;
        }
    var minuty = data.getMinutes();
        if(minuty<10){
            minuty = "0"+minuty;
        }
    var godziny = data.getHours();
        if(godziny<10){
            godziny = "0"+godziny;
        }
    var miesiac = data.getMonth();
        switch(miesiac){
            case 0:
                miesiac = "stycznia";
                break;
            case 1:
                miesiac = "lutego";
                break;
            case 2: 
                miesiac = "marca";
                break;
            case 3:
                miesiac = "kwietnia";
                break;
            case 4: 
                miesiac = "maja";
                break;
            case 5:
                miesiac = "czerwca";
                break;
            case 6:
                miesiac = "lipca";
                break;
            case 7:
                miesiac = "sierpnia";
                break;
            case 8:
                miesiac = "września";
                break;
            case 9:
                miesiac = "października";
                break;
            case 10:
                miesiac = "listopada";
                break;
            case 11:
                miesiac = "grudnia";
                break;

        }

        var dzien = data.getDate();
        var rok = data.getFullYear();

    document.getElementById('czas').innerHTML = godziny+":"+minuty+":"+sekundy;
    document.getElementById('data').innerHTML = dzien+" "+miesiac+" "+rok;
    setTimeout(czas,0)
}
