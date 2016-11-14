new Fingerprint2().get(function(result, components){
	document.getElementById("fingerprint").innerHTML=result + "<br/>";
	var componentString = components.map(function(component) {
		return component['key'] + ": " + component['value'] + "<br/>";
	})
	document.getElementById("components").innerHTML=componentString;
});