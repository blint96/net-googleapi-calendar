// Miesiące
var month_name = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];

// Init daty
var d = new Date(Date.now());
var set = getWeekNumber(Date.now());

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