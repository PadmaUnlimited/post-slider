<?php

function bla(){
		return;
		if($slider_style=="style1"){
			/**
			 *
			 * style1 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area-style1 padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="carousel-style1 owl-carousel tppost-main-slider">';
				// Creating a new side loop
				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
					
					$catid = get_the_ID();
					$cats = get_the_category($catid);
					
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

					$result.='
					<div class="carousel-style1-item pps_single_slider_items-'.$block['id'].' pps_single_slider_items">
						<div class="carousel-style1-item-image pps_single_slider_items_post_images-'.$block['id'].'">';
							if ( has_post_thumbnail() ) {
								$result .= '<div class="tps-slider-thumb">';
								$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
								$result .= '</div>';
							}
							$result.='<div class="carousel-style1-item-category pps_single_slider_items_category-'.$block['id'].'">';
							foreach ( $cats as $cat ){
								$result.='<a href="'.get_category_link($cat->cat_ID).'">'.$cat->name.'</a>';
								
							}
							
							$result.='</div>';
						$result.='</div>
						<div class="carousel-style1-item-reviews pps_single_slider_item_reviews pps_single_slider_item_reviews-'.$block['id'].'">
							<h3 class="carousel-style1-item-title pps_single_slider_item_post_title-'.$block['id'].'"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h3>
							<div class="carousel-style1-item-description pps_single_slider_item_description pps_single_slider_item_description-'.$block['id'].'">'.do_shortcode(get_the_content()).'
							</div>
							<div class="carousel-style1-item-author pps_single_slider_admin_description pps_single_slider_admin_description-'.$block['id'].'">
								<span><i class="fa fa-user"></i> <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></span>
							</div>
						</div>
					</div>

					';

						
						
				endwhile;
				wp_reset_postdata();
							
				$result .='</div></div><div class="clearfix"></div>';
		
				echo $result; 
		}elseif($slider_style=="style2"){

			
			/**
			 *
			 * style2 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area-style2 padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="carousel-style2 owl-carousel tppost-main-slider">';
				// Creating a new side loop
				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
					
					$catid = get_the_ID();
					$cats = get_the_category($catid);
					
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

					$result.='
					<div class="post_slider_'.$block['id'].'_style_two carousel-style2-item ">
							<div class="post_slider_'.$block['id'].'_style_img carousel-style2-item-image">';
							if ( has_post_thumbnail() ) {
								$result .= '<div class="tps-slider-thumb-style2">';
								$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
								$result .= '</div>';
							}
							$result.='</div>
						<h5 class="post_slider_'.$block['id'].'_style_title">
							<a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a>
						</h5>
						<ul class="post_slider_'.$block['id'].'_style_bar">
							<li class="post_slider_'.$block['id'].'_style_post_date">
							<i class="fa fa-calendar"></i> '.get_the_date('Y-m-d').'</li>
							<li class="post_slider_'.$block['id'].'_style_post_author">
							<i class="fa fa-user"></i>
							<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></li>
						</ul>'.do_shortcode(get_the_content()).'
					</div>';
						
				endwhile;
				wp_reset_postdata();
							
				$result .='</div></div><div class="clearfix"></div>';
		
				echo $result;

		}elseif($slider_style=="style3"){


			/**
			 *
			 * style3 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="owl-carousel tppost-main-slider">';
				// Creating a new side loop
				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
					
					$catid = get_the_ID();
					$cats = get_the_category($catid);
					
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

				$result.='
				<div class="post_slider_'.$block['id'].'_style3">
					<div class="post_slider_'.$block['id'].'_style3_img">';
						if ( has_post_thumbnail() ) {
							$result .= '<div class="tps-slider-thumb-style3">';
							$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
							$result .= '</div>';
						}
					$result.='</div>
					<h5 class="post_slider_'.$block['id'].'_style3_title"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>
					<ul class="post_slider_'.$block['id'].'_style3_bars">
						<li class="post_slider_'.$block['id'].'_style3_dates">'.get_the_date('Y-m-d').'</li>
						<li class="post_slider_'.$block['id'].'_style3_autors"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></li>
					</ul>'.do_shortcode(get_the_content()).'
					<a href="'.esc_url(get_the_permalink()).'" class="post_slider_'.$block['id'].'_style3_p_readmores button">'.$read_more_label.'</a>
				</div>';

				endwhile;
				wp_reset_postdata();

				$result .='</div></div><div class="clearfix"></div>';
				echo $result; 
		
		}elseif($slider_style=="style4"){


			/**
			 *
			 * style4 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="owl-carousel tppost-main-slider">';
				// Creating a new side loop
				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();

					$catid = get_the_ID();
					$cats = get_the_category($catid);
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

					$clases = 'presentacion';
					foreach ( $cats as $cat ){
								$clases .= ' ' . $cat->name;
							}
					$result .= '<div class="'.$clases.'">'.do_shortcode(get_the_content()).'</div>';

				endwhile;
				wp_reset_postdata();

				$result .='</div></div><div class="clearfix"></div>';
				echo $result;
		
		}elseif($slider_style=="style5"){


			/**
			 *
			 * style5 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="owl-carousel tppost-main-slider">';
				// Creating a new side loop

				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
					
					$catid = get_the_ID();
					$cats = get_the_category($catid);
					
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

				$result.='
				<div class="post_slider_'.$block['id'].'_style5">
					<div class="post_slider_'.$block['id'].'_style5_img">';
						if ( has_post_thumbnail() ) {
							$postIMG = get_the_post_thumbnail_url(); 
							$result .= '<div class="tps-slider-thumb-style5">';						
							$result .= '<a href="'.esc_url(get_the_permalink()).'" style="background-image:url('.$postIMG.')"></a>';
							$result .= '</div>';
						}
					$result.='</div>
					<h5 class="post_slider_'.$block['id'].'_style5_title"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>';
					$result .= '<div class="tps-slider-post-content_style5">'.$this->custom_excerpt_post($excerpt,15).'</div>';
					$result .= '<div class="tps-slider-post-link_style5">'.
								'<a href="'.esc_url(get_the_permalink()).'" class="post_slider_'.$block['id'].'_style5_p_readmores button">'.$read_more_label.'</a>'
								.'</div>';

					 
				$result .= '</div>';

				endwhile;
				wp_reset_postdata();

				$result .='</div></div><div class="clearfix"></div>';
				echo $result; 
		
		}elseif($slider_style=="style6"){

			/**
			 *
			 * style6 HTML
			 *
			 */
				$result.='<div class="padma-post-slider-area padma-post-slider-area'.$block['id'].'">';
				$result.='<div id="tppost-main-slider-'.$block['id'].'" class="owl-carousel tppost-main-slider">';
				// Creating a new side loop

				while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
					
					$catid = get_the_ID();
					$cats = get_the_category($catid);
					
					setup_postdata( $post );
					$excerpt = get_the_excerpt();

				$result.='
				<div class="post_slider_'.$block['id'].'_style6">
					<div class="post_slider_'.$block['id'].'_style6_img">';
						if ( has_post_thumbnail() ) {
							$postIMG =get_the_post_thumbnail_url(); 
							$result .= '<div class="tps-slider-thumb-style6">';						
							$result .= '<a href="'.esc_url(get_the_permalink()).'" style="background-image:url('.$postIMG.');background-size: cover;"></a>';
							$result .= '</div>';
						}
					$result.='</div>
					<h5 class="post_slider_'.$block['id'].'_style6_title"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>';

					 
				$result .= '</div>';

				endwhile;
				wp_reset_postdata();

				$result .='</div></div><div class="clearfix"></div>';
				echo $result; 

		}else{
			echo 'Nothing Found !!';
		}

	}