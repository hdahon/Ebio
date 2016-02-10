$(document).ready(function() {
	$(".dropdown-button").dropdown();
	$(".dropdown-button2").dropdown();
	$('.parallax').parallax();
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
});