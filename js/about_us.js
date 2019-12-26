let url = g1.url.parse(location.href)

render_people_data("people_def")

function render_people_data(people_url) {
  setTimeout(function () {
    $(".nav-pills a[href='#" + url.searchKey.view || 'about' + "']").click()
  }, 600)
  helpers_get_(people_url)
    .then(function (response) {
      let people_data = (typeof response === 'object') ? response : JSON.parse(response)
      console.log(people_data);
      $('.people-template').template({
        people: people_data
      })
    })
}

$(document)
  .on('click', 'a[href^="#"]', function (event) {
    event.preventDefault()
    if (window.screen.availWidth < 768) {
      $('main').animate({
        scrollTop: $($.attr(this, 'href'))[0].offsetTop - $('.navbar-nav-scroll').height()
      }, 500)
    } else {
      $('main').animate({
        scrollTop: $($.attr(this, 'href'))[0].offsetTop
      }, 500)
    }
    $(".nav-pills a").removeClass('active')
    $(".nav-pills a[href='" + $.attr(this, 'href') + "']").addClass('active')
    url.update({
      view: $(this).attr('href').replace(/#/g, '')
    })
    history.pushState({}, '', url.toString())
  })
