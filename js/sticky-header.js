  function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }




  $('body')
    .on('click', '.close-nav-button', function () {
      closeNav()
    })
    .on("click", "#mobile-menu", function () {
      openNav()
    })
    .on('click', '#mobSearch', function () {
      $('#mobSearchBar').removeClass('d-none')
    })
    .on('click', '#mobSearchBrief', function () {
      $('#mobSearchBriefBar').removeClass('d-none')
    })
    .on('click', '#mobSearchback', function () {
      $('#mobSearchBar').addClass('d-none')

    })
    .on('click', '#mobSearchBriefback', function () {
      $('#mobSearchBriefBar').addClass('d-none')

    })



  $("#flip").click(function () {
    $("#panel").slideToggle("slow");
  });
  // footer js
  // if ($('main').innerHeight() == $('main')[0].scrollHeight) {
  //   $('footer').removeClass('d-none')
  // } else {
  //   $('footer').addClass('d-none')
  // }


  // $('main').scroll(function () {

  // })

  $('[data-toggle="pill"]').on('shown.bs.tab', function () {
    if ($('main').innerHeight() == $('main')[0].scrollHeight) {
      $('footer').removeClass('d-none')
    } else {
      $('footer').addClass('d-none')
    }
  })

  $('main').scroll(function () {
    // console.log($('main').scrollTop())
    if ($('main').scrollTop() == 0) {
      $(".header").removeClass("position-fixed z-9 shrink");
    } else {
      $(".header").addClass(" position-fixed z-9 shrink");
      $('.header').css('top', $('header')[0].clientHeight)
    }
    if ($('main').scrollTop() == 0) {
      $(".bg-brief").removeClass("position-fixed z-9");
    } else {
      $(".bg-brief").addClass(" position-fixed z-9");
      // $('.bg-brief').css('top', $('.bg-brief')[0].clientHeight)
    }
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
      $('footer').removeClass('d-none')
    } else {
      $('footer').addClass('d-none')
    }
  })
  // $(document).scroll(function () {
  //   console.log($(this).scrollTop(), $(window)[0].pageYOffset);
  //   if ($(this).scrollTop() == $(window)[0].pageYOffset) {
  //     $('footer').removeClass('d-none')
  //   } else {
  //     $('footer').addClass('d-none')
  //   }
  // })

  if (window.screen.availWidth >= 768) {
    $('main, .left-panel').css('padding-top', $('header')[0].clientHeight)
  } else {
    $('main').css('padding-top', $('header')[0].clientHeight)

  }
  if (window.screen.availWidth < 768) {
    // $('.bg-brief').css('top', ($('header')[0].clientHeight + $('.left-panel')[0].clientHeight))
    $('main').scroll(function () {

      if ($('main').scrollTop() != 0) {
        $('.data_portal-no .navbar-nav-scroll').removeClass('left-panel').addClass('position-fixed z-9')
        $('.data_portal-no .navbar-nav-scroll').css('top', $('header')[0].clientHeight)
        $('.bg-brief').css('top', ($('header')[0].clientHeight + $('.data_portal-no .navbar-nav-scroll')[0].clientHeight))
        $('.data_portal_slider .header').css('top', ($('header')[0].clientHeight + $('.data_portal-no .navbar-nav-scroll')[0].clientHeight))
        // $('.bg-brief').css('top', 0)
      } else {
        $('.data_portal-no .navbar-nav-scroll').addClass('left-panel').removeClass('position-fixed z-9')
        $('.data_portal-no .navbar-nav-scroll').css('top', 0)
        $('.bg-brief').css('top', 0)
        // $('.bg-brief').css('top', ($('header')[0].clientHeight + $('.left-panel')[0].clientHeight))
      }
    })
  }

