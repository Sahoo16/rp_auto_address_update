jQuery(document).ready(function($) {
	console.log('hello');
	var input = document.getElementById('rpress-gmap-api-field');
	var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.addListener('place_changed', function() {

	var place = autocomplete.getPlace();
	console.log(place);
	document.getElementById('rpress-street-address').value = getStreetAddress(place);
	document.getElementById('rpress_city').value = getCity(place);
	document.getElementById('rpress-postcode').value = getPostalCode(place);

	});

});
 
  

function getStreetAddress(place) {
	var extractedAddress = [];
	
	if (place && place.address_components) {
	  for (var i = 0; i < place.address_components.length; i++) {
		var component = place.address_components[i];
		var types = component.types;
		var isRepeated = false;		 
		if (
		  types.indexOf('country') === -1 &&
		  types.indexOf('postal_code') === -1 &&
		  types.indexOf('administrative_area_level_1') === -1
		) {
		  // Check if the component is already in extractedAddress
		  for (var j = 0; j < extractedAddress.length; j++) {
			if (extractedAddress[j] === component.long_name) {
			  isRepeated = true;
			  break; // Exit the loop if it's repeated
			}
		  }
  
		  // If it's not repeated, add it to extractedAddress
		  if (!isRepeated) {
			extractedAddress.push(component.long_name);
		  }
		}
	  }
	}
	var resultAddress = extractedAddress.join(', ');
  
	return resultAddress;
  }
  

  function getCity(place) {
	for (var i = 0; i < place.address_components.length; i++) {
	  var component = place.address_components[i];
	  if (component.types.includes('locality')) {
		return component.long_name;
	  }
	}
	return '';
  }

  function getPostalCode(place) {
	for (var i = 0; i < place.address_components.length; i++) {
	  var component = place.address_components[i];
	  if (component.types.includes('postal_code')) {
		return component.long_name;
	  }
	}
	return '';
  }
  

	   
      
  
 
