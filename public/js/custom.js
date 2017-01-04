function readnotif($id) {
  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "/read/".$id,
  "method": "GET",
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
}
