Drupal.behaviors.ecjc_theme_step_reg = function(context) {
$(function() {
     var second_next = $('#second_step .next');
     var third_next = $('#third_step .next');
     var third_prev = $('#third_step .prev');
     var last_prev = $('#last_step .prev');
     var second_step = $('#second_step');
     var third_step = $('#third_step');
     var last_step = $('#last_step');
	 
	 second_next.click(function() {
	 	alert('dfgdfg');
	 	if ($('#edit-profile-first-name').value() == '') alert('name');
		else {
			third_step.show();
			second_step.hide();
			$('.tab').removeClass('active');
			$('#third_tab').addClass('active');
		}
	 });
	 third_next.click(function() {
		last_step.show();
		third_step.hide();
		$('.tab').removeClass('active');
		$('#last_tab').addClass('active');
	 });
	 third_prev.click(function() {
		second_step.show();
		third_step.hide();
		$('.tab').removeClass('active');
		$('#second_tab').addClass('active');
	 });
	 last_step.click(function() {
		third_step.show();
		last_step.hide();
		$('.tab').removeClass('active');
		$('#third_tab').addClass('active');
	 });
	 
	 $(".form-file").customInputFile();

 });
}