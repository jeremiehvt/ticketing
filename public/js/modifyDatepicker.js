$(function(){
 	
 	var year = new Date(); 
 	
	
	$.fn.datepicker.dates['fr'] = {
		days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
		daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
		daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
		months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
		monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
		today: "Aujourd'hui",
		monthsTitle: "Mois",
		clear: "Effacer",
		weekStart: 1,
		format: "dd/mm/yyyy"
	};

	console.log((year.getFullYear()+2)+"-12-31");

	$( "#command_visitDay" ).datepicker({
	  startDate: new Date(),
	  endDate: (year.getFullYear()+2)+"-12-31",
	  language: 'fr',
	  format: 'yyyy-mm-dd',
	  daysOfWeekDisabled: '2',
	  datesDisabled: [ ""+ year.getFullYear()+"-05-01", ""+ year.getFullYear()+"-11-01", ""+ year.getFullYear()+"-12-25",
	  ""+ (year.getFullYear()+1)+"-05-01", ""+ (year.getFullYear()+1)+"-11-01", ""+ (year.getFullYear()+1)+"-12-25",
	  ""+ (year.getFullYear()+2)+"-05-01", ""+ (year.getFullYear()+2)+"-11-01", ""+ (year.getFullYear()+2)+"-12-25"]
	});

	$( "#command_visitDay" ).attr('placeholder', 'année-mois-jour');
});
