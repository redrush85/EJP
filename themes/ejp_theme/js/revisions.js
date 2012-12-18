if (Drupal.jsEnabled) {	
  Drupal.behaviors.revisions = function (context) {
	var first_rev = '';
	var last_rev = '';
	var count = 0;
	$('.view-display-id-page_1 table tr').click(function(){
	  switch (count) {
		case 0: 
			first_rev = $(this).children('td:eq(1)').text().trim();
			$('#edit-first').val(first_rev);
			count++;
		break;
		case 1:
			last_rev = $(this).children('td:eq(1)').text().trim();
			$('#edit-last').val(last_rev);	
			count = 0;    
		break;
	}   
  });
}}