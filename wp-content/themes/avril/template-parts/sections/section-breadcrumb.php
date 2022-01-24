<?php 
	$avril_hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
if($avril_hs_breadcrumb == '1') {	
?>
 <section id="breadcrumb-section" class="breadcrumb-area breadcrumb-center">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-heading">
								<h2>
									<?php 
										if ( is_home() || is_front_page()):
	
												single_post_title();
												
										elseif ( is_day() ) : 
										
											printf( __( 'Daily Archives: %s', 'avril' ), get_the_date() );
										
										elseif ( is_month() ) :
										
											printf( __( 'Monthly Archives: %s', 'avril' ), (get_the_date( 'F Y' ) ));
											
										elseif ( is_year() ) :
										
											printf( __( 'Yearly Archives: %s', 'avril' ), (get_the_date( 'Y' ) ) );
											
										elseif ( is_category() ) :
										
											printf( __( 'Category Archives: %s', 'avril' ), (single_cat_title( '', false ) ));

										elseif ( is_tag() ) :
										
											printf( __( 'Tag Archives: %s', 'avril' ), (single_tag_title( '', false ) ));
											
										elseif ( is_404() ) :

											printf( __( 'Error 404', 'avril' ));
											
										elseif ( is_author() ) :
										
											printf( __( 'Author: %s', 'avril' ), (get_the_author( '', false ) ));		
										
										else :
												the_title();
												
										endif;
										
									?>
								</h2>	
                        </div>
						<ol class="breadcrumb-list">
							<?php if (function_exists('avril_breadcrumbs')) avril_breadcrumbs();?>
						</ol>	
                    </div>                    
                </div>
            </div>
        </div> <!-- container -->
    </section>
<?php }else{ ?>	
<section id="breadcrumb-section" class="no-breadcrumb-area">
</section>
<?php } ?>