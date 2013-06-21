function postOnFB(body)
{
	alert('hi');
	//var body = 'Reading JS SDK documentation';
	FB.api('/me/feed', 'post', { message: body }, function(response) {
	  if (!response || response.error) {
	    alert('Error occured');
	  } else {
	    alert('QME is now Connected with Facebook');
	  }
	});
	
}