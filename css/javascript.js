function startTime() {
const currentDate = new Date();
const element = document.querySelector('#date');

element.innerText = " ";
element.innerText += leadingZero(currentDate.getHours()) + ':' + leadingZero(currentDate.getMinutes()) + ':' + leadingZero(currentDate.getSeconds())    + ' - ' 
element.innerText += " " + leadingZero(currentDate.getDate()) + "." + leadingZero(currentDate.getMonth()+1) + "." + currentDate.getFullYear();
var t = setTimeout(startTime, 500);
}

function leadingZero(i) {
    return (i < 10)? '0'+i : i;
}

$('.home').on('click', function () {
    $('body, html').animate({
      scrollTop: $('main').offset().top
    },500)
})

$('.about').on('click', function () {
    $('body, html').animate({
      scrollTop: $('section').offset().top
    },500)
})

$('.contact').on('click', function () {
    $('body, html').animate({
      scrollTop: $('aside').offset().top
    },500)
})

$(document).ready(function() {
  $("html").on("submit","#contact_form",function(e){
    e.preventDefault();
    $("#send_form_status").html('').hide();
    var data=$("#contact_form").serialize();
    $.post("/send_form.php",data,function(res){
      $("#send_form_status").html(res.msg).show();
      if(res.status==1){ 
        $("#contact_form")[0].reset();
      } 
    });
  });
});
