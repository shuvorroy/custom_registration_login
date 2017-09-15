$ = new jQuery.noConflict();

$(document).ready(function($){

  $('#custom-register-form').submit(function(e){
    e.preventDefault()
    $('.response-message').hide()
    if( $('#password').val() != $('#password2').val() ) {
      $('.response-message').removeClass('success-message').addClass('failed-message').show().text('Password Doesn\'t match');
      return false;
    }
    var formData = new FormData($(this)[0]);
    $.ajax({
      data: formData,
      type: 'POST',
      url: ajax.url,
      success: function(ret) {
        if(ret.success == 1) { // success
          $('.response-message').addClass('success-message').removeClass('failed-message').show().text(ret.message)
          if(ret.go_to != '') { setTimeout(function(){window.location.href=ret.go_to},1000) }
        }
        else{
          $('.response-message').removeClass('success-message').addClass('failed-message').show().text(ret.message)
          if(ret.go_to != '') { setTimeout(function(){window.location.href=ret.go_to},1000) }
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    })
  })

  $('#custom-login-form').submit(function(e){
    e.preventDefault()
    $('.response-message').hide()
    var formData = new FormData($(this)[0]);
    $.ajax({
      data: formData,
      type: 'POST',
      url: ajax.url,
      success: function(ret) {
        if(ret.success == 1) { // success
          $('.response-message').addClass('success-message').removeClass('failed-message').show().text(ret.message)
          if(ret.go_to != '') { setTimeout(function(){window.location.href=ret.go_to},1000) }
        }
        else{
          $('.response-message').removeClass('success-message').addClass('failed-message').show().text(ret.message)
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    })
  })

});
