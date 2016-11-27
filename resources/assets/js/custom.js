function togglePlurality(oldText){
	if(oldText.slice(-1) == 's') {
		return oldText.slice(0, -1);
	}
	else {
		return oldText + 's';
	}
}

jQuery(document).ready(function () {
	// Initialize tooltips
	jQuery('[data-toggle="tooltip"]').tooltip();

	// Initialize switches
	jQuery("[name='bidirectional']").bootstrapSwitch();

	// Register on-click for bidirectional switch
	jQuery("[name='bidirectional']").on('switchChange.bootstrapSwitch', function() {
		// Show the other part of the form
		jQuery('#bidirectional').slideToggle();

		// Change button text
		jQuery('#rel-btn').text(togglePlurality(jQuery('#rel-btn').text()));
	});

	/*
		Update text on selection change and disable matching other select option
	 */

	//First character field 
	jQuery("#rel_1_character").on('focus', function () {
		prevValue = jQuery(this).val();
	}).change(
	function() {
		//Reenable the previous value
		jQuery("#rel_1_related_to option[value='" + prevValue + "'").prop('disabled',false);

		//Disable the identical option in the other select
		jQuery("#rel_1_related_to option[value='" + jQuery(this).val() + "'").prop('disabled',true);

		//Set the value of the bidirectional input
		jQuery("#rel_2_related_to").val(jQuery(this).val());

		// Set the text
		jQuery(".character-text").text(jQuery("#rel_1_character option:selected").text());
	});

	//First relationship name
	jQuery("#rel_1_name").on('input', function() {
		jQuery(".rel-1-text").text(jQuery(this).val());
	});

	//Second character field
	jQuery("#rel_1_related_to").on('focus', function () {
		prevValue = jQuery(this).val();
	}).change(
	function() {
		//Reenable the previous value
		jQuery("#rel_1_character option[value='" + prevValue + "'").prop('disabled',false);

		//Disable the identical option in the other select
		jQuery("#rel_1_character option[value='" + jQuery(this).val() + "'").prop('disabled',true);

		//Set the value of the bidirectional input
		jQuery("#rel_2_character").val(jQuery(this).val());

		// Set the text
		jQuery(".related-to-text").text(jQuery("#rel_1_related_to option:selected").text());
	});

	//Second relationship name
	jQuery("#rel_2_name").on('input', function() {
		jQuery(".rel-2-text").text(jQuery(this).val());
	});
	
});
