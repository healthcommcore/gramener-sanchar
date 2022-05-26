/* exported helpers_get_,notyfication_, convertToSlug  */
/* globals Noty */
function notyfication_(noty_type, msg) {
	if(typeof msg != "object"){
		new Noty({
		      type: noty_type,
		      text: msg,
		      timeout: 1000
		    }).show()
	}
  }

function helpers_get_(url) {
  // Return a new promise.
  return new Promise(function (resolve, reject) {
    // Do the usual XHR stuff
    var req = new XMLHttpRequest()
    req.open('GET', url)

    req.onload = function () {
      // This is called even on 404 etc
      // so check the status
      if (req.status == 200) {
        // Resolve the promise with the response text
        resolve(req.response)
      }
      else {
        // Otherwise reject with the status text
        // which will hopefully be a meaningful error
        reject(Error(req.statusText))
      }
    }

    // Handle network errors
    req.onerror = function () {
      reject(Error("Network Error"))
    }

    // Make the request
    req.send()
  })
}

function convertToSlug(Text){
  return Text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
}
