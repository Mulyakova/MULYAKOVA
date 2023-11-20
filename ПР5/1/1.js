function findDayOfYear(date) {
  var parts = date.split('.');
  var day = parseInt(parts[0]);
  var month = parseInt(parts[1]);
  var year = parseInt(parts[2]);

  var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  var dayOfYear = day;

  for (var i = 0; i < month - 1; i++) {
    dayOfYear += daysInMonth[i];
  }

  if (month > 2 && isLeapYear(year)) {
    dayOfYear += 1;
  }

  return dayOfYear;
}

function isLeapYear(year) {
  return (year % 4 === 0 && year % 100 !== 0) || year % 400 === 0;
}

var date = "01.06.2022";
var dayOfYear = findDayOfYear(date);
console.log("Порядковый номер дня относительно начала года: " + dayOfYear);