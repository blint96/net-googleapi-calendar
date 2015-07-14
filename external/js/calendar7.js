var set = getWeekNumber(Date.now());
var week = set[1];
document.getElementById('cweek').innerHTML = "Aktualny tydzień " + set[0] + ", " + week;

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

function nextWeek()
{
    document.getElementById('display').style.display = 'none';
    $(document).ready(function(){   
    $('#display').fadeIn(2000);
    });
    week = week+1;
    if(week > getISOWeeks())
        week = 1;
    document.getElementById('cweek').innerHTML = "Aktualny tydzień " + set[0] + ", " + week;
}

function prevWeek()
{
    document.getElementById('display').style.display = 'none';
    $(document).ready(function(){   
    $('#display').fadeIn(2000);
    });
    week = week-1;
    if(week <= 0)
        week = 1;
    document.getElementById('cweek').innerHTML = "Aktualny tydzień " + set[0] + ", " + week;
}