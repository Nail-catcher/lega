$('#circle0').click(function() {
 $('#circle3').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle3').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 

 $('#item1').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item0').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 
});


$('#circle1').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle3').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 


 $('#item0').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item1').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
});
$('#circle2').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle3').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle3').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 

 $('#item0').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item1').removeAttr("name");
 $('#item2').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 
});
$('#circle3').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 
 $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item3').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 
});
$('#circle4').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle3').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item4').attr('name', 'nonhidden'); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 
});
$('#circle5').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item5').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 
});
$('#circle6').click(function() {
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $(this).attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item6').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 
 
});


$(document).ready(function(){
   setTimeout('setbackground0()');
});

function setbackground0(){ 
  $('#item6').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item0').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle0').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
  setTimeout('setbackground1()',10000); // to change the image in 10 seconds
}
function setbackground1(){ 
  $('#item0').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item1').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#circle0').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle1').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
  setTimeout('setbackground2()',10000); // to change the image in 10 seconds
}
function setbackground2(){ 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item6').removeAttr("name");
 $('#item2').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name");
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle6').removeAttr("name");
 $('#circle2').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name");  
  setTimeout('setbackground3()',10000); // to change the image in 10 seconds
}
function setbackground3(){ 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item3').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item6').removeAttr("name"); 
 $('#item5').removeAttr("name");
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle3').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle6').removeAttr("name");  
  setTimeout('setbackground4()',10000); // to change the image in 10 seconds
}
function setbackground4(){ 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item4').attr('name', 'nonhidden'); 
 $('#item6').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item5').removeAttr("name"); 
 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle4').attr('name', 'checked'); 
 $('#circle6').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
  setTimeout('setbackground5()',10000); // to change the image in 10 seconds
}
function setbackground5(){ 
  $('#item0').removeAttr("name"); 
 $('#item1').removeAttr("name"); 
 $('#item2').removeAttr("name");
 $('#item5').attr('name', 'nonhidden'); 
 $('#item4').removeAttr("name"); 
 $('#item3').removeAttr("name"); 
 $('#item6').removeAttr("name"); 

 $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle5').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle6').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
  setTimeout('setbackground6()',10000); // to change the image in 10 seconds
}
function setbackground6(){ 
  $('#item0').removeAttr("name"); 
  $('#item1').removeAttr("name"); 
  $('#item2').removeAttr("name");
  $('#item6').attr('name', 'nonhidden'); 
  $('#item4').removeAttr("name"); 
  $('#item3').removeAttr("name"); 
  $('#item5').removeAttr("name"); 

  $('#circle0').removeAttr("name"); 
 $('#circle1').removeAttr("name"); 
 $('#circle2').removeAttr("name");
 $('#circle6').attr('name', 'checked'); 
 $('#circle4').removeAttr("name"); 
 $('#circle5').removeAttr("name"); 
 $('#circle3').removeAttr("name"); 
  setTimeout('setbackground0()',10000); // to change the image in 10 seconds
}