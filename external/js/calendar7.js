// Miesiące
var month_name = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];

// Init daty
var d = new Date(Date.now());


// Generujemy widok
var calendarContener = document.getElementById('describe');
generateCalendarView(calendarContener);

// Ustawiamy
var month = d.getMonth();
var year = d.getFullYear();
var day = d.getDay();
var curr_max_week = 0;

// Init tekstu u góry
var limitdays = getFirstLastDayOfWeek();
document.getElementById('cweek').innerHTML = limitdays[0].toISOString() + " - " + limitdays[1].toISOString() + " " + year ;

// Przewijanie do poprzedniego tygodnia
function changeWeek(action)
{
    if (action == "left")
    {
        limitdays[0] = addDays(limitdays[0], -7);
        limitdays[1] = addDays(limitdays[1], -7);
    }
    else
    {  
        limitdays[0] = addDays(limitdays[0], 7);
        limitdays[1] =  addDays(limitdays[1], 7);
    }

    clearWeekEvents(); // czyszczenie tablicy
    listUpcomingEvents() ;
    document.getElementById('output').innerHTML = "";

    document.getElementById('cweek').innerHTML = limitdays[0].toISOString() + " - " + limitdays[1].toISOString() + " " + year;
    document.getElementById('display').style.display = 'none';
    $(document).ready(function(){   
    $('#display').fadeIn(2000);
    });
}

// Pobieranie pierwszego i ostatniego dnia konkretnego tygodnia
function getFirstLastDayOfWeek()
{
    var curr = new Date;
    var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay() + 1));
    var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+7));
    return [firstday, lastday];
}

// Ustawianie dnia jako wydarzenie day = sob-2300 albo pn-0100
function markDayAsEvent(element, string)
{

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
    var insert = "<table border='1' style='border-spacing:0; border-collapse: collapse; color: #fff; width: 100%;'>";

    insert += "<tr style=\"height: 35px;\">";
        insert += "<td style=\"width: 12.5%;\">czas</td>";
        insert += "<td style=\"width: 12.5%;\">pn</td>";
        insert += "<td style=\"width: 12.5%;\">wt</td>";
        insert += "<td style=\"width: 12.5%;\">śr</td>";
        insert += "<td style=\"width: 12.5%;\">czw</td>";
        insert += "<td style=\"width: 12.5%;\">pt</td>";
        insert += "<td id='sob-tab' style=\"width: 12.5%;\">sob</td>";
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
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"pn-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"wt-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"sr-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"czw-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"pt-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"sob-"+hour+"00"+"\"></td>";
        insert += "<td onclick='markDayAsEvent(this, \"event\");' id=\"nd-"+hour+"00"+"\"></td>";
        insert += "</tr>";
    }

    insert += "</table>"
    div.innerHTML = insert;
}

// Co by nie wyjeżdżało za tabelę
function fixEventCalendarHeight(start, height)
{
    var limit = 25 * 40;
    var current = height;

    var max = limit - start;
    if (current > max)
        current = max;

    return current;
}

function addEventToCalendar(start_hour, stop_hour, week, id)
{
    // Trzeba sprawdzić czy poza kalendarz chuj nie wyjeżdża
    var height = parseInt(stop_hour) - parseInt(start_hour);
    var top_offset = (-5) + 40 + (start_hour * 40);

    var tab = 0;
    if (week=="pn") { tab = 12.5; } else if(week=="wt") { tab = 12.5 * 2; } else if(week =="sr") { tab = 12.5 * 3; } else if(week=="czw") { tab = 12.5 * 4; } else if(week=="pt") { tab = 12.5 * 5; } else if(week=="sob") { tab = 12.5* 6; } else {tab = 12.5 *7; }
    var left_offset = (tab * 1.0);
    var length = ((stop_hour + 1) - start_hour) * 40;
    length = fixEventCalendarHeight(top_offset, length);

    var title_start_hour = start_hour;
    var title_stop_hour = stop_hour;

    if (title_start_hour < 10) {title_start_hour = "0"+title_start_hour;} if (title_stop_hour < 10) {title_stop_hour = "0"+title_stop_hour;}
    var title = title_start_hour + ":00 - " + title_stop_hour + ":00";
    $( "#"+week+"-0000" ).append( "<div onclick='showCalendarModal(this);' id='"+id+"' style='width: 12.5%; height: "+length+"px; top:"+top_offset+"px ; background: rgba(90,40,40,0.5); border: 1px #000 solid; position: absolute; left: "+left_offset+"%;'>"+title+"</div>" );
}

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}

function getDayTagFromDate(date) // 5 = piątek
{
    var d = new Date(date);
    var day = d.getDay();
    switch(day)
    {
        case 1:
            return "pn";
            break;
        case 2:
            return "wt";
            break;
        case 3:
            return "sr";
            break;
        case 4:
            return "czw";
            break;
        case 5:
            return "pt";
            break;
        case 6:
            return "sob";
            break;
        case 7:
            return "nd";
            break;
    }
}

// Usuwanie wydarzenia
function deleteEvent(id)
{
    var div = document.getElementById(id);
    if (select_cal_id != 0)
        gapi.client.calendar.events.delete({calendarId: select_cal_id, eventId: id}).execute();
    else
        gapi.client.calendar.events.delete({calendarId: 'primary', eventId: id}).execute();

    div.style.display = "none";
    BootstrapDialog.alert("Pomyślnie usunięto wydarzenie.");
}

function showCalendarModal(element)
{
    gapi.client.load('calendar', 'v3', function() {
        var id = element.id;
        var request = undefined;
        if (select_cal_id != 0)
            request = gapi.client.calendar.events.get({calendarId: select_cal_id, eventId: id});
        else
            request = gapi.client.calendar.events.get({calendarId: 'primary', eventId: id});

        // Jest
        request.execute(function(resp) 
        {
            var agent007 = {start: resp.start.dateTime, end: resp.end.dateTime, summary: resp.summary};
            $('#mainModal').modal('show'); 

            // 07/11/2015 9:05 AM <-- taką chce
            // a inną mamy

            document.getElementById('start-input').value = "";
            document.getElementById('end-input').value = "";

            document.getElementById('content-placement').innerHTML = "<hr>Wszystko co wpiszesz powyżej automatycznie zapisze się do Google, pamiętaj więc, że zmiany są akceptowane na bierząco.";
            document.getElementById('event-title').innerHTML = "Wydarzenie: " + resp.summary;

            document.getElementById('extra-buttons').innerHTML = "<button type='button' class='btn btn-danger' data-dismiss='modal' onclick='deleteEvent(\""+id+"\");'>Usuń</button>";
        });
    });
}