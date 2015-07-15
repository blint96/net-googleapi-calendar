// Miesiące
var month_name = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];

// Init daty
var d = new Date(Date.now());
var set = getWeekNumber(Date.now());

// Generujemy widok
var calendarContener = document.getElementById('describe');
generateCalendarView(calendarContener);

// Ustawiamy
var month = d.getMonth();
var year = d.getFullYear();
var day = d.getDay();
var week = set[1];
var curr_max_week = 0;

// Init tekstu u góry
var limitdays = getFirstLastDayOfWeek();
document.getElementById('cweek').innerHTML = limitdays[0] + " - " + limitdays[1] + " " + year + " <small>[debug] " + year + "/" + parseInt(month + 1) + "/"+ day + "("+ week +")</small>" ;

// Pobieranie numeru tygodnia
function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(+d);
    d.setHours(0,0,0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(),0,1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
    // Return array of year and week number
    return [d.getFullYear(), weekNo];
}

// Ilość tygodni br.
function getISOWeeks(y) 
{
    var d,
        isLeap;

    d = new Date(y, 0, 1);
    isLeap = new Date(y, 1, 29).getMonth() === 1;

    //check for a Jan 1 that's a Thursday or a leap year that has a 
    //Wednesday jan 1. Otherwise it's 52
    return d.getDay() === 4 || isLeap && d.getDay() === 3 ? 53 : 52
}

// Przewijanie do poprzedniego tygodnia
function changeWeek(action)
{
    curr_max_week = weekCount(year, month + 1);
    clearWeekEvents(); // czyszczenie tablicy

    if (action == "left")
    {
        limitdays[0] -= 7;
        limitdays[1] -= 7;

        week -= 1;
        if(week <= 0)
            week = 1;
    }
    else
    {  
        limitdays[0] += 7;
        limitdays[1] += 7;
        week += 1;
        if(week > getISOWeeks())
            week = 1;
    }

    // Sprawdzenie
    if(limitdays[0] <= 0 || limitdays[0] > 31)
    {
        limitdays[0] = 1;
    }

    if(limitdays[1] <= 0 || limitdays[1] > 31)
    {
        limitdays[1] = 1;
    }

    //alert(weekCount(year, month + 1));

    document.getElementById('cweek').innerHTML = limitdays[0] + " - " + limitdays[1] + " " + year + " <small>[debug] " + year + "/" + parseInt(month + 1) + "/"+ day + "("+ week +")</small>" ;
    document.getElementById('display').style.display = 'none';
    $(document).ready(function(){   
    $('#display').fadeIn(2000);
    });
}

// Pobieranie pierwszego i ostatniego dnia konkretnego tygodnia
function getFirstLastDayOfWeek()
{
    var curr = new Date;
    var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 1)).getDate();
    var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+7)).getDate();
    return [firstday, lastday];
}

// Ilość tygodni w danym miesiącu
function weekCount(year, month_number) 
{
    // month_number is in the range 1..12

    var firstOfMonth = new Date(year, month_number-1, 1);
    var lastOfMonth = new Date(year, month_number, 0);

    var used = firstOfMonth.getDay() + lastOfMonth.getDate();

    return Math.ceil( used / 7);
}

// Ustawianie dnia jako wydarzenie day = sob-2300 albo pn-0100
function markDayAsEvent(element, string)
{
    var setting = element;
    if (setting)
    {
        if(setting.innerHTML == "")
        {
            setting.style.background = "#428bca";
            setting.innerHTML = string;
        }
        else
        {
            setting.style.background = "";
            setting.innerHTML = "";
        }
    }
}

// Usuwanie eventów
function clearWeekEvents()
{
    for(i = 0; i < 24; i++)
    {
        var hour = i;
        if (hour < 10)
            hour = 0 + "" + hour;

        document.getElementById("pn-"+hour+"00").style.background = "";
        document.getElementById("pn-"+hour+"00").innerHTML = "";

        document.getElementById("wt-"+hour+"00").style.background = "";
        document.getElementById("wt-"+hour+"00").innerHTML = "";

        document.getElementById("sr-"+hour+"00").style.background = "";
        document.getElementById("sr-"+hour+"00").innerHTML = "";

        document.getElementById("czw-"+hour+"00").style.background = "";
        document.getElementById("czw-"+hour+"00").innerHTML = "";

        document.getElementById("pt-"+hour+"00").style.background = "";
        document.getElementById("pt-"+hour+"00").innerHTML = "";

        document.getElementById("sob-"+hour+"00").style.background = "";
        document.getElementById("sob-"+hour+"00").innerHTML = "";

        document.getElementById("nd-"+hour+"00").style.background = "";
        document.getElementById("nd-"+hour+"00").innerHTML = "";
    }
}

// Generowanie wyglądu kalendarza
function generateCalendarView(div)
{
    var insert = "<table border='1' style='color: #fff; width: 100%;'>";

    insert += "<tr style=\"height: 35px;\">";
        insert += "<td style=\"width: 12.5%;\">czas</td>";
        insert += "<td style=\"width: 12.5%;\">pn</td>";
        insert += "<td style=\"width: 12.5%;\">wt</td>";
        insert += "<td style=\"width: 12.5%;\">śr</td>";
        insert += "<td style=\"width: 12.5%;\">czw</td>";
        insert += "<td style=\"width: 12.5%;\">pt</td>";
        insert += "<td style=\"width: 12.5%;\">sob</td>";
        insert += "<td style=\"width: 12.5%;\">nd</td>";
    insert += "</tr>";

    for(i = 0; i < 24; i++)
    {
        var hour = i;
        if (hour < 10)
        {
            hour = 0 + "" + hour;
        }

        insert += "<tr style=\"color: #000;\">";
        insert += "<td class=\"hour\">"+hour+":00</td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"pn-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"wt-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"sr-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"czw-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"pt-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"sob-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' class=\"hour\" id=\"nd-"+hour+"00"+"\"></td>";
        insert += "</tr>";
    }

    insert += "</table>"
    div.innerHTML = insert;
}