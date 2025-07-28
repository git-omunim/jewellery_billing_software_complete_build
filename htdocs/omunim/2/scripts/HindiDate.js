var globDayId, globMonthId, globYearId;
var globEngDayId, globEngMonthId, globEngYearId;
function initializeDate(dayId, monthId, yearId, engDayId, engMonthId, engYearId)
{
    globDayId = dayId;
    globMonthId = monthId;
    globYearId = yearId;
    globEngDayId = engDayId;
    globEngMonthId = engMonthId;
    globEngYearId = engYearId;
    SetToday();
}
function SetToday()
{
    var now = new Date();
    var day = now.getDate();
    var month = now.getMonth() + 1;
    var year = now.getYear();

    if (year < 199) {
        year += 1900;
    }

    if (year < 2000) {
        year += 100;
    }
    UpdateGregorian(day, month, year);
}

function UpdateGregorian(day, month, year)
{
    if (prevday == true) {
        day = day - 1
    }
    if (year < 79) {
        alerting('This Gregorian year is before Saka year 1.');
        return;
    }
    if (year == 79 && month < 4 && day < 22) {
        alerting('This date is before the start of Saka year 1.');
        return;
    }
    var CivilToJDN = GregorianToJDN(year, month, day);
    UpdateJDN(CivilToJDN);
}

function alerting(message)
{
    window.document.ThisForm.infobox.value = message;
}
function GregorianToJDN(y, m, d)
{
    var jd = 0;

    if (m < 3)
    {
        m += 12;
        y -= 1;
    }
    jd = d + (((153 * m) - 457) / 5) + (365 * y) + trunc(y / 4) - trunc(y / 100) + trunc(y / 400) + 1721118.5;
    jd += 0.5; // calculate Chronological Julian Day

    return jd;
}

function trunc(val)
{
    if (val >= 0)
    {
        return Math.floor(val);
    }
    else
    {
        return Math.ceil(val);
    }
}

function UpdateJDN(CivilToJDN)
{
    jdn = trunc(CivilToJDN);
    var icdate = JDNToIndianCivil(jdn);

    document.getElementById(globYearId).value = icdate.year;
    document.getElementById(globMonthId).selectedIndex = icdate.month;
    document.getElementById(globDayId).selectedIndex = icdate.day;
}

var DAYS = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
var MONTHS = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
function JDNToGregorian(jd)
{
    var date = new DateStruct();

    var z, r, g, a, b, c, d, m, y;

    jd -= 0.5; // calculate Chronological Julian Day
    z = Math.floor(jd - 1721118.5);
    r = jd - 1721118.5 - z;
    g = z - .25;
    a = Math.floor(g / 36524.25);
    b = a - Math.floor(a / 4);
    y = Math.floor((b + g) / 365.25);
    c = b + z - Math.floor(365.25 * y);
    m = trunc(((5 * c) + 456) / 153);
    d = c - trunc(((153 * m) - 457) / 5) + r;
    if (m > 12)
    {
        y += 1;
        m -= 12;
    }

    date.year = y;
    date.month = m;
    date.day = d;

    date.monthStr = MONTHS[date.month - 1];

    date.dayStr = DAYS[dow(jd)];

    return date;
}

function DateStruct()
{
    this.year = 0;
    this.month = 0;
    this.day = 0;

    this.monthStr = "not set";
    this.dayStr = "not set";
}


function JDNToIndianCivil(jdn)
{
    var INDIAN_CIVIL_WEEKDAYS = new Array("Ravi�ra", "Somav�ra", "Ma�galv�", "Budhav�ra", "Guruv�ra", "Sukrav�ra", "Saniv�ra");
    var INDIAN_CIVIL_MONTHS = new Array("Caitra", "Vais�kha", "Jyaistha", "As�dha", "Sr�vana", "Bh�dra", "Asvina", "K�rtika", "Agrahayana", "Pausa", "M�gha", "Ph�lguna");

    var date = new IndianCivilDate();

    var Caitra, Saka, greg, greg0, leap, start, year, yday, mday, weekday, day, month;

    Saka = 79 - 1;                    // Offset in years from Saka era to Gregorian epoch
    start = 80;                       // Day offset between Saka and Gregorian

    //weekday = dow(jdn);
    jdn += 0.5; // calculate Chronological Julian Day

    jdn = Math.floor(jdn) + 0.5;
    greg = JDNToGregorian(jdn);       // Gregorian date for Julian day
    leap = isGregorianLeapYear(greg.year);   // Is this a leap year?
    year = greg.year - Saka;            // Tentative year in Saka era
    greg0 = GregorianToJDN(greg.year, 1, 1); // jdn at start of Gregorian year
    yday = jdn - greg0;                // Day number (0 based) in Gregorian year
    Caitra = leap ? 31 : 30;          // Days in Caitra this year
    if (yday < start)
    {
        //  Day is at the end of the preceding Saka year
        year--;
        // year1--;
        yday += Caitra + (31 * 5) + (30 * 3) + 10 + start;
    }
    yday -= start;
    if (yday < Caitra)
    {
        month = 1;
        day = yday + 1;
    }
    else
    {
        mday = yday - Caitra;
        if (mday < (31 * 5))
        {
            month = Math.floor(mday / 31) + 2;
            day = (mday % 31) + 1;
        }
        else
        {
            mday -= 31 * 5;
            month = Math.floor(mday / 30) + 7;
            day = (mday % 30) + 1;
        }

    }
    var year1;
    year1 = year + 135;
    date.year = year1;
    date.month = month;
    date.day = day;
    date.monthStr = INDIAN_CIVIL_MONTHS[month - 1];
//    date.weekdayStr = INDIAN_CIVIL_WEEKDAYS[weekday];

    if (Caitra == 31)
        date.leapStr = "leap year";
    else
        date.leapStr = "";
    return date;
}


function IndianCivilDate()
{
    // this.weekdayStr = "";
    this.monthStr = "";
    this.day = "";
    this.month = "";
    this.year = "";
    this.leapStr = "";
}
var prevday = false;
// Modulus function which works for non-integers. 
function mod(a, b)
{
    return a - (b * Math.floor(a / b));
}
// return the day of the week
function dow(jdn)
{
    return mod(Math.floor((jdn + 1.5)), 7);
}
function UpdateIndianCivil(year, month, day, engDayId, engMonthId, engYearId)
{
    //alert(year + ' ' + month + ' ' + day);
    globEngDayId = engDayId;
    globEngMonthId = engMonthId;
    globEngYearId = engYearId;

    year = year - 135;
    var monthAlpha = new Array();
    monthAlpha = {'CHA': '1', 'BAI': '2', 'JES': '3', 'ASD': '4', 'SHR': '5', 'BHA': '6', 'ASW': '7', 'KAR': '8', 'MAN': '9', 'POU': '10', 'MAG': '11', 'FAL': '12'};

    var JDNToCivil = IndianCivilToJDN(year, monthAlpha[month], day);
    return UpdateIndianJDN(JDNToCivil, engDayId);
}
function IndianCivilToJDN(year, month, day)
{
    var Caitra, gyear, leap, start, jdn, m;
    gyear = parseInt(year) + 78;
    leap = isGregorianLeapYear(gyear);
    start = GregorianToJDN(gyear, 3, leap ? 21 : 22);
    Caitra = leap ? 31 : 30;

    if (month == 1)
    {
        jdn = start + (day - 1);
    }
    else
    {
        jdn = start + Caitra;
        m = month - 2;
        m = Math.min(m, 5);
        jdn += m * 31;

        if (month >= 8)
        {
            m = month - 7;
            jdn += m * 30;
        }
        jdn += day - 1;

    }

    jdn += 0.5; // calculate Chronological Julian Day
    return jdn;
}

function isGregorianLeapYear(year)
{
    return ((year % 4) == 0) && (!(((year % 100) == 0) && ((year % 400) != 0)));
}

function UpdateIndianJDN(JDNToCivil, dayId)
{
    jdn = trunc(JDNToCivil);
    var gdate = JDNToGregorian(jdn);

    if (prevday == false) {
        var engMonthAlpha = new Array();
        engMonthAlpha = {'1': 'JAN', '2': 'FEB', '3': 'MAR', '4': 'APR', '5': 'MAY', '6': 'JUN', '7': 'JUL', '8': 'AUG', '9': 'SEP', '10': 'OCT', '11': 'NOV', '12': 'DEC'};
        var JuliMonth = gdate.month;
    }
    if (prevday == false) {
        var JuliDay = gdate.day;
    }
    if (prevday == false) {
        var JuliYear = (gdate.year < 1) ? (1 - gdate.year) : gdate.year;
    }

    if (dayId != '') {
        document.getElementById(globEngYearId).value = JuliYear;
        document.getElementById(globEngMonthId).value = engMonthAlpha[JuliMonth];
        document.getElementById(globEngDayId).value = JuliDay;
    }
    var completeDate = JuliMonth + ' ' + JuliDay + ', ' + JuliYear;
    return completeDate;
}
