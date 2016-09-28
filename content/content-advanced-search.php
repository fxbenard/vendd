<?php
/**
 * Advanced search results template
 *
 * @package Vendd
 */

if ( isset( $_GET['s'] ) ) :
	$download_args = array(
		'post_type'      => 'download',
		'posts_per_page' => -1,
		's'              => $_GET['s']
	);
	$download_results = new WP_Query( $download_args );

	if ( ! empty( $download_results->post_count ) ) : ?>
		<div id="store-front" class="vendd-download-search-results">
			<div class="edd_downloads_list edd_download_columns_3">
				<?php
					$i = 1;
					foreach ( $download_results->posts as $index => $post ) : ?>
						<div itemscope itemtype="http://schema.org/Product" class="edd_download" id="edd_download_<?php echo $post->ID; ?>">
							<div class="edd_download_inner">
								<?php
									edd_get_template_part( 'shortcode', 'content-image' );
									edd_get_template_part( 'shortcode', 'content-title' );
									edd_get_template_part( 'shortcode', 'content-excerpt' );
									edd_get_template_part( 'shortcode', 'content-price' );
									edd_get_template_part( 'shortcode', 'content-cart-button' );
								?>
							</div>
						</div>
						<?php
						if ( $i % 3 == 0 ) :
							?>
							<div style="clear:both;"></div>
							<?php
						endif;
						$i += 1;
					endforeach;
				?>
			</div>
		</div>
		<?php
	endif;
endif;

if ( isset( $_GET['s'] ) ) :
	$page_args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		's'              => $_GET['s']
	);
	$page_results = new WP_Query( $page_args );

	if ( ! empty( $page_results->post_count ) ) : ?>
		<div class="vendd-page-search-results vendd-search-results-container">
			<span class="vendd-search-results-title">
				<?php _ex( 'Page Results', 'advanced search results page search results title', 'vendd' ); ?>
			</span>
			<ul class="vendd-search-results-list">
				<?php
					foreach ( $page_results->posts as $index => $post ) : ?>
						<li class="vendd-search-result-item">
							<?php
								the_title( sprintf(
								'<span class="vendd-search-result">
									<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>
								</span>'
								);
							?>
						</li>
						<?php
					endforeach;
				?>
			</ul>
		</div>
		<?php
	endif;
endif;


if ( isset( $_GET['s'] ) ) :
	$post_args = array(
		'post_type'      => 'post',
		'posts_per_page' => -1,
		's'              => $_GET['s']
	);
	$post_results = new WP_Query( $post_args );

	if ( ! empty( $post_results->post_count ) ) : ?>
		<div class="vendd-post-search-results vendd-search-results-container">
			<span class="vendd-search-results-title">
				<?php _ex( 'Post Results', 'advanced search results post search results title', 'vendd' ); ?>
			</span>
			<ul class="vendd-search-results-list">
				<?php
					foreach ( $post_results->posts as $index => $post ) : ?>
						<li class="vendd-search-result-item">
							<?php
								the_title( sprintf(
								'<span class="vendd-search-result">
									<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>
								</span>'
								);
							?>
						</li>
						<?php
					endforeach;
				?>
			</ul>
		</div>
		<?php
	endif;
endif;
