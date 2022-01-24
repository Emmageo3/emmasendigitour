(function($) {
  $(document).ready(function(){
    $('#submit').click(function(e) {
 var ajaxurl = $('#ajaxurl').val();
 var resaon = $('input[name=reason_key]:checked').val();
 var SiteAdminEmail = $('#admin_mail').val();
 var SiteUrl = $('#plugin_site').val();
 var  reasontext = '';
 if(resaon=="I want to try a new design, I don't like Startkit style"){
  reasontext = $('#reason_found_a_better_plugin').val();
 }else if(resaon == 'Other'){
 	reasontext = $('#reason_other').val();
 } else if(resaon == 'Is not working with a plugin that I need'){
  reasontext = $('#reason_not_working_with_needed_plugin').val();
 }
 var dataString = 'Resason='+resaon+'&TextReason='+reasontext+'&SiteUrl='+SiteUrl+'&SiteAdminEmail='+SiteAdminEmail;

 $.ajax({
    type:'POST',
    data:dataString,
    url:ajaxurl,
    success:function(data) {
     location.reload();
 
    }
  });
 
});
 });
}(jQuery));
