<!-- Cols -->

<?php

$post_id                = get_the_ID();

$place                  = get_post_meta( $post_id, "place", true );

$invnr_number                  = get_post_meta( $post_id, "invnr_number", true );

$link                   = esc_url( get_the_permalink() );

$images                 = get_post_meta( get_the_ID(), "images", true );

$default_featured_image = "https://mycolex.juedisches-museum.ch/pic/JMS-0905.jpg";

$image_urls             = array();

if ( isset( $images["image"] ) && ! empty( $images["image"] ) ) {

	if ( array_depth( $images["image"] ) > 2 && count( $images["image"] ) > 1 ) { //in case of multiple image

		foreach ( $images["image"] as $image ) {

			if ( isset( $image["file"] ) && ! empty( $image["file"] ) ) {

				$image_urls[] = $image["file"];

			}

		}

	} else {

		if ( isset( $images["image"]["file"] ) && ! empty( $images["image"]["file"] ) ) {

			$image_urls[] = $images["image"]["file"];

		}

	}

}

if ( isset( $image_urls[0] ) ) {

	$default_featured_image = "https://mycolex.juedisches-museum.ch" . "/pic/" . $image_urls[0];

}

?>

<div class="product-cols">

    <div class="inner-wrapper">

        <div class="img-holder">

            <img src="<?php echo $default_featured_image; ?>" alt="" loading="lazy">

        </div>

        <div class="text-wrapper">

			<?php

			if ( ! empty( $invnr_number ) ) {

				?>

                <h3 class="product-title"><?php _e("Inv.","juedisches-museum");?> <?php echo $invnr_number; ?></h3>

				<?php

			}

			if ( ! empty( $link ) ) {

				?>

                <a href="<?php echo $link; ?>" class="read-more"><?php _e( 'Mehr', 'juedisches-museum' ); ?></a>

				<?php

			}

			?>

        </div>

    </div>

</div>