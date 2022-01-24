<?php  
   if (  is_active_sidebar( 'gradiant-info-sidebar' ) ) {
?>	
<div id="info-section" class="">
	<div class="av-container">
		<?php dynamic_sidebar('gradiant-info-sidebar'); ?>
	</div>
</div>
<?php } ?>