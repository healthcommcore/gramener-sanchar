/* globals notyfication_, helpers_get_,  */

/*eslint no-control-regex: "error"*/
var reg_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ // eslint-disable-line
//let url = g1.url.parse(location.href)

$(document)
  .on('click', ".training_form .submit", function () {
    var _params = {
      name: $('.training_form #user_name').val(),
      email: $('.training_form #user_email').val(),
      phno: $('.training_form #user_ph').val(),
      dest: 'training'
    }
    let flag = 1,
      message = ''
    var name = $('.training_form #user_name').val()
    var _email = $('.training_form #user_email').val()
    var ph_no = $('.training_form #user_ph').val()

    if (!(name)) {
      flag = 0
      message = "User name can't be empty."
      notyfication_('error', message)
      return
    }
    if (!usernameIsValid(name)) {
      flag = 0
      message = "Invalid User Name"
      notyfication_('error', message)
      return
    }

    if (!reg_email.test(_email)) {
      flag = 0
      message = "User email doesn't match the format."
      notyfication_('error', message)
      return
    }
    if (!(ph_no)) {
      flag = 0
      message = "User phone number can't be empty."
      notyfication_('error', message)
      return
    }
    if(!phoneNumberIsValid(ph_no)){
      flag = 0
      message = "Invalid Phone Number";
      notyfication_('error', message)
      return
    }

    if (flag === 1) {
      $("#loading").removeClass('d-none')
      $('body').addClass('overflow-hidden')
      
       $.ajax({
		  method: "POST",
		  url: "https://script.google.com/macros/s/AKfycbwXeQYjzr3sxbt1shDjwZN2ddJTyiQDI1zr7WZn/exec",
		  data: { name: name, email: _email, phone: ph_no, source: "Training" }
		})
		  .done(function( msg ) {
			  $(".response-frm-submit").show();  
			  
		    //alert( "Data Saved: " + msg );
		  });
      
      /*helpers_get_('add_trainee?' + $.param(_params))
        .then(function (resp) {
          if (resp) {
            $('.training_form input').val('')
            // notyfication_('success', 'Sign-up Successfull!')
            $("#loading").addClass('d-none')
            $('body').removeClass('overflow-hidden')
            window.location.href = url.protocol + '://' + url.origin + url.directory + 'training_thank_you'
          } else if (resp === "false") {
            notyfication_('success', 'Failed to Register!')
          }
        })*/
      return false
    }
  })
  .on('click', '.contact_form .submit-btn', function () {
    var _params = {
      name: $('.contact_form #user_name').val(),
      email: $('.contact_form #user_email').val(),
      dest: 'contact_us'
    }

    let message = ''
    var name = $('.contact_form #user_name').val()
    var _email = $('.contact_form #user_email').val()

    if (!(name)) {
      // flag = 0
      message = "User name can't be empty."
      notyfication_('error', message)
      return
    }

    // function usernameIsValid(username) {
    //     return /^[0-9a-zA-Z_.-]+$/.test(username);
    // }

    if (!usernameIsValid(name)) {
      // flag = 0
      message = "Invalid User Name"
      notyfication_('error', message)
      return
    }

    if (!reg_email.test(_email)) {
      $('.contact_form .error').removeClass('invisible')
      return
    } else {
      $("#loading").removeClass('d-none')
      $('body').addClass('overflow-hidden')
      $('.contact_form .error').addClass('invisible')
      ph_no = 0;
      $.ajax({
		  method: "POST",
		  url: "https://script.google.com/macros/s/AKfycbwXeQYjzr3sxbt1shDjwZN2ddJTyiQDI1zr7WZn/exec",
		  data: { name: name, email: _email, phone: ph_no, source: "Contact Us" }
		})
		  .done(function( msg ) {
			  $(".response-frm-submit").show();  
			  
		    //alert( "Data Saved: " + msg );
		  });
      
      /*helpers_get_('add_trainee?' + $.param(_params))
        .then(function (resp) {
          if (resp) {
            $('.contact_form input').val('')
            $("#loading").addClass('d-none')
            $('body').removeClass('overflow-hidden')
            // notyfication_('success', 'Sign-up Successfull!')
            window.location.href = url.protocol + '://' + url.origin + url.directory + 'thank_you'
          } else if (resp === "false") {
            notyfication_('success', 'Failed to Register!')
          }
        })*/
    }
  })

  function usernameIsValid(username) {
    return /^[0-9a-zA-Z _.-]+$/.test(username)
  }

  function phoneNumberIsValid(ph_no){
    var pattern_1 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var pattern_2 = /^\(?\+?([0-9]{1})\)?[-. ]?([0-9]{3})?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if(ph_no.match(pattern_1) || ph_no.match(pattern_2)){
      return true;
    }else{
      return false;
    }
  }

  function sortbyfunc(parent, target, sortby){
	  var $divs = $(parent);
	  var alphabeticallyOrderedDivs = $divs.sort(function (a, b) {
			if(sortby == "a-z"){
				return $(a).find("span").text() > $(b).find("span").text()   ? 1 : -1;
			}else{
				return $(a).find("span").text() < $(b).find("span").text()   ? 1 : -1;
				}
	    });
	    $(target).html(alphabeticallyOrderedDivs);
	}