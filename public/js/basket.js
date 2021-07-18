$('#dost').click(function() {
 $('#notdost').css('color', '#FFFAFA');
 $('#dost').css('color', '#ED2828');
    $('#notdost').css('text-decoration', 'none');
 $('#dost').css('text-decoration', 'underline');
 $('.adresstable').css('display', 'block');
 $("#shipping").val(0);
});
$('#notdost').click(function() {
 $('#notdost').css('color', '#ED2828');
 $('#dost').css('color', '#FFFAFA');
    $('#notdost').css('text-decoration', 'underline');
    $('#dost').css('text-decoration', 'none');
 $('.adresstable').css('display', 'none');
 $("#shipping").val(1);
 
});
var dt = new Date();
if ($('#notfar').prop("checked") && (dt.getHours()>=22 || dt.getHours()<=10)) {
    $('.nonefar').fadeIn(300);
} else {
    $('.nonefar').fadeOut(300);
}
  $(".radiotime").change(function() {

    if ($('#far').prop("checked")) {
      $('.ontime').fadeIn(300);
    } else {
      $('.ontime').fadeOut(300);
    }
    if ($('#notfar').prop("checked") && (dt.getHours()>=22 || dt.getHours()<=10)) {
        $('.nonefar').fadeIn(300);
    } else {
        $('.nonefar').fadeOut(300);
    }
  });
  $(".radiomoney").change(function() {

    if ($('#cash').prop("checked")) {
      $('.cashback').fadeIn(300);
    } else {
      $('.cashback').fadeOut(300);
    }

  });
var wow = 0;
var sum = 0;
var blackcase = new Map();
renderQtd(wow,sum,blackcase); 
document.onclick = event =>{

    if(event.target.classList.contains('fa-plus-square')){
   plusFunction(event.target.dataset);
    } else if(event.target.classList.contains('fa-minus-square')){
   minusFunction(event.target.dataset);
    }
}

function plusFunction(arr) {
   let GC=getCookie(arr['id']);
   
   if(!GC) {
   value = {
      'id' : arr['id'],
      'name': arr['name'],
      'cost': arr['cost'],
      'count': 1,
   }
   document.cookie = arr['id'] + '=' + JSON.stringify(value)+';'+'path=/;';
   const p = document.getElementById(value['id']);   
   p.textContent = 1;
   $.ajax({
   
    url: '/basket/add/'+value['id'],
    type: 'POST',
    data: {id: value['id'], how_many:value['count']},
    jsonp: 'callback',
    dataType: 'jsonp',
    success: function(data) {
      callback.call(this, data);
    },
    error: function(data) {
    },
      headers: {
     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});
renderQtd(wow,sum,blackcase);
  
   } else {
      value = JSON.parse(GC);
      cocount = value['count'];
      cocount++;
      value = {

      'id' : value['id'],
      'name': value['name'],
      'cost': value['cost'],
      'count': cocount,
      }
    $.ajax({
    url: '/basket/plus/'+value['id'],
    type: 'POST',
    data: {id: value['id']},
    jsonp: 'callback',
    dataType: 'jsonp',
    success: function(data) {
      callback.call(this, data);
    },
    error: function(data) {
    },
      headers: {
     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});   
   document.cookie = arr['id'] + '=' + JSON.stringify(value)+';'+'path=/;';
   value = JSON.parse(GC);
   const p = document.getElementById(value['id']);   
   p.textContent = value['count']+1;
   
renderQtd(wow,sum,blackcase);
   }
   
}
function minusFunction(arr) {
  
   let GC=getCookie(arr['id'])
   let value = JSON.parse(GC);
   
   if(value['count']==-1) {
   deleteCookie(arr['id']);
   value = JSON.parse(GC);
   const p = document.getElementById(arr['id']);   
   p.textContent =  0;

renderQtd(wow,sum,blackcase);
    
   } else {
      cocount = value['count'];
      console.log(cocount);
      cocount--;
      console.log(cocount);
      value = {
      'id' : value['id'],
      'name': value['name'],
      'cost': value['cost'],
      'count': cocount,
      }      
   document.cookie = arr['id'] + '=' + JSON.stringify(value)+';'+'path=/;';
   value = JSON.parse(GC);
   const p = document.getElementById(value['id']);   
   p.textContent = value['count']-1;
   
renderQtd(wow,sum,blackcase);
   }
      $.ajax({
    url: '/basket/minus/'+value['id'],
    type: 'POST',
    data: {id: value['id']},
    jsonp: 'callback',
    dataType: 'jsonp',
    success: function(data) {
      callback.call(this, data);
    },
    error: function(data) {
    },
      headers: {
     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
}); 
}
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options = {}) {

  options = {
    path: '/',

  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie+';'+'path=/;';
}
function deleteCookie(name) {
  setCookie(name, "", {
    'max-age': -99999999
  })
}

function renderQtd (wow, sum,blackcase){
  
//часть для отрисовки красной части
  var keyValuePairs = document.cookie.split('; ');
  // var result = Object.keys(keyValuePairs).map((key) => [Number(key), keyValuePairs[key]]);
  // console.log(result);
  // if(result.length>1){
  //   $('#fullcase').css('display', 'block');
  //   $('#foocase').css('display', 'none');
  // } else{
  //    $('#fullcase').css('display', 'none');
  //     $('#foocase').css('display', 'block');
  // }
 
for(var i = 0; i < keyValuePairs.length; i++) {
    var name = keyValuePairs[i].substring(0, keyValuePairs[i].indexOf('='));
    var value = keyValuePairs[i].substring(keyValuePairs[i].indexOf('=')+1);
   
    if(name!='XSRF-TOKEN' && name!='path' && value){
    
    
    value2 = JSON.parse(value);
    
    wow = wow + value2['count'];
    sosum = value2['cost'] * value2['count'];
    sum = sum+sosum;
    const input_name = document.getElementById(value2['id']);
    const p = document.getElementById(value2['id']);
    const fullcasea = document.getElementById('fullcasea');
    
    fullcasea.textContent =  wow +'  / '+ sum +' P';
    //document.cookie = 'basket' + '=' + JSON.stringify(value);
    if(value2['count']>0){
    blackcase.set(value2['id'],value2);

    }
    if(p){   
    p.textContent = value2['count'];}
    } else {
      console.log('sosat');
     
    }
    if (wow>0){
    $('#fullcase').css('display', 'block');
    $('#foocase').css('display', 'none');
  } else{
     $('#fullcase').css('display', 'none');
      $('#foocase').css('display', 'block');
  }
//часть для отрисовки черной части
    
   
    
}
   
renderbskt(blackcase);    

}

function renderbskt(blackcase) {
  const eatbasket = document.getElementById('eatbasket');

// 
for (let key of blackcase.keys()) {
  let heh = blackcase.get(key);
  console.log(heh['name']);
  var removableNode = document.getElementsByClassName(heh['id']);
  console.log(removableNode);
  let arrrrr=heh['count']*heh['cost']

    var elem = document.createElement("h2");
    elem.className = heh['id'];
// создаем для него текст
    var elemText = document.createTextNode(heh['name'] +' '+ heh['count'] +' '+ arrrrr );
// добавляем текст в элемент в качестве дочернего элемента
    elem.appendChild(elemText);
// добавляем элемент в блок div
    eatbasket.appendChild(elem);

  eatbasket.replaceChild(elem, removableNode[0]);
}
//console.log(blackcase.get("5"));
}






