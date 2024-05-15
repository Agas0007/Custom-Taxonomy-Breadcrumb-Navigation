<!--/* для файла архива */-->


<ul>
	<li> <a href="<?php echo get_site_url();?>" class="breadcrumbs__link"> <span itemprop="name"> Главная</span> </a> </li>
	<?php
								$term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );

								$tmpTerm = $term;
								$tmpCrumbs = array();
								while ($tmpTerm->parent > 0){
										$tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
										$crumb = '<li><a  class="breadcrumbs__link" href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . '</a></li>';
										array_push($tmpCrumbs, $crumb);
								}
								echo implode('', array_reverse($tmpCrumbs));
								echo '<li>' . $term->name . '</li>';
						?>
</ul>



<!--/* для файла single */-->

<ul>
	<li> <a href="<?php echo get_site_url();?>" class="breadcrumbs__link"> <span itemprop="name">Главная</span> </a> </li>
	<?php
                    $true_taxonomy = 'category_products'; 
                    $true_terms = wp_get_post_terms( $post->ID, $true_taxonomy, array( "fields" => "ids" ) ); 
                    if( $true_terms ) {
	                   $term_array = trim( implode( ',', (array) $true_terms ), ' ,' );
	                   $neworderterms = get_terms($true_taxonomy,  'orderby=none&include=' . $term_array );
	                    foreach( $neworderterms as $orderterm ) {
		                echo '<li><a class="breadcrumbs__link" href="' . get_term_link( $orderterm ) . '">' . $orderterm->name . '</a></li>';
                        }
                    }
                    
                ?>
	<li><?php the_title(); ?></li>
</ul>
