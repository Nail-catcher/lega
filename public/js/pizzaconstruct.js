var customPizza = new Map([
  ['id', Math.floor(Math.random() * 1000001)],
  ['name', 'Уникальная пицца'],
  ['path', []],
  ['cost', ''],
]);  
console.log(customPizza.get('path'));
 $('.hehe').click(function() {

    
    var clickId = $(this).attr('id');
    
   			if ($(this).prop('checked')) {
          $('i[name="custom-pizza"]').attr('data-id',customPizza['id']);
   				customPizza.get('path').push($(this).data());
   				let cost = Number($(this).attr('data-cost'));
   				let offcost = Number($('.pizzacost').attr('data-offpay'));
   				let omg = offcost+cost;
				$('.pizzacost').html(omg + 'P');
				$('.pizzacost').attr('data-offpay',omg);
        $('i[name="custom-pizza"]').attr('data-cost',omg);
			} else {
        $('i[name="custom-pizza"]').attr('data-id',customPizza['id']);
				customPizza.get('path').splice($(this).data());
				let cost = Number($(this).attr('data-cost'));
   				let offcost = Number($('.pizzacost').attr('data-offpay'));
   				let omg = offcost-cost;
				$('.pizzacost').html(omg + 'P');
				$('.pizzacost').attr('data-offpay',omg);
        $('i[name="custom-pizza"]').attr('data-cost',omg);
			}	
	console.log(customPizza);		
  });
$('#pushpizza').click(function() {
	arr=[];
	customPizza.set('cost',$('.pizzacost').attr('data-offpay'));
  $('.pizzacostinput').val(customPizza.get('cost'));

	console.log(customPizza.get('path'));		
  customPizza.get('path').forEach(function(entry) {
    arr.push(entry['name']);
    
});
  var str = arr.join();
  console.log(str);
   value = {
      'id' : customPizza.get('id'),
      'name': customPizza.get('name'),
      'cost': customPizza.get('cost'),
      'path': str,
      'count': 1,
   }
  document.cookie = customPizza.get('id') + '=' + JSON.stringify(value)+';'+'path=/;';
 
//  huely={
//   'name': customPizza.get('name'),
//       'cost': customPizza.get('cost'),
//       'path': str
//  }
//   console.log(value);  
//    $.ajax({
   
//     url: '/pizzacreate',
//     type: 'POST',
//     data: JSON.stringify(huely),
//     jsonp: 'callback',
//     dataType: 'jsonp',
//     success: function (response)
// {
// console.log(response);
// },
//     error: function(data) {
// console.log(data);
//     },
//       headers: {
//      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
//     }
// });
renderQtd(wow,sum,blackcase);
});

