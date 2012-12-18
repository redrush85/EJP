function postdata(page_num)
  {
   $.post("/search_ajax/form.php", { search: $('#edit-keys').val(), page: page_num },
            function(data){
               document.getElementById("output").innerHTML=data;
         });
  } 
 
$(document).ready(function(){
  $('#search-form').submit(function() { 
    postdata(1);
    return false;
  }); 
  
  $('<div id="output"></div>').insertAfter('#content');

});