<?php

function progression_studios_enqueue_customizer_controls_styles() {

  wp_register_style( 'progression-customizer-controls', get_template_directory_uri() . '/inc/customizer/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'progression-customizer-controls' );

	wp_enqueue_script( 'jquery-ui-button' ); // for ButtonSet

}
add_action( 'customize_controls_print_styles', 'progression_studios_enqueue_customizer_controls_styles' );


//  See full blog post here
//  http://pluto.kiwi.nz/2014/07/how-to-add-a-color-control-with-alphaopacity-to-the-wordpress-theme-customizer/

function progression_studios_add_customizer_custom_controls( $wp_customize ) {
	
	
	
	/**
	 * Create a Radio-Buttonset control.
	 */
	class progression_studios_Controls_Radio_Buttonset_Control extends WP_Customize_Control {

		public $type = 'radio-buttonset';

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>

			<div id="input_<?php echo esc_html( $this-> id ); ?>" class="buttonset">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr($this->id) . esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo esc_attr($this->id) . esc_attr( $value ); ?>">
							<?php echo esc_html( $label ); ?>
						</label>
					</input>
				<?php endforeach; ?>
			</div>

			
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).buttonset(); });</script>
			<?php
		}

	}
	
	
	/**
	 * Create a jQuery slider control.
	 * TODO: Migrate to an HTML5 range control. Range control are hard to style 'cause they don't display the value
	 */
	class progression_studios_Controls_Slider_Control extends WP_Customize_Control {

		public $type = 'slider';

		public function render_content() { ?>
			<label>

				<span class="customize-control-title">
					<?php echo esc_attr( $this->label ); ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
						<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php endif; ?>
				</span>
			</label>
			
			<input type="number" class="progression-slider" id="input_<?php echo esc_html( $this-> id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" step="<?php echo esc_attr($this->choices['step']); ?>" <?php $this->link(); ?>/>
			
			
			<input type="text" class="progression-slider-hidden" id="input_<?php echo esc_html( $this-> id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" step="<?php echo esc_attr($this->choices['step']); ?>" <?php $this->link(); ?>/>
			
			<div id="slider_<?php echo esc_html( $this-> id ); ?>" class="ss-slider"></div>
			<script>
				jQuery(document).ready(function($) {
					$( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider({
							value : <?php echo esc_attr( $this->value() ); ?><?php if ( $this->value() == 0 ) : ?>0<?php endif; ?>,
							min   : <?php echo esc_attr($this->choices['min'] ); ?>,
							max   : <?php echo esc_attr($this->choices['max'] ); ?>,
							step  : <?php echo esc_attr($this->choices['step'] ); ?>,
							slide : function( event, ui ) { $( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).val(ui.value).change(); }
					});
					
					//$( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).val( $( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider( "value" ) );

					$( '[id="input_<?php echo esc_html( $this-> id ); ?>"]' ).change(function() { 
						$( '[id="slider_<?php echo esc_html( $this-> id ); ?>"]' ).slider({
							value : $( this ).val()
						});
					});

				});
			</script>
			<?php

		}
	}
	
	
	/* 
	Modified November 30th 2017
	https://github.com/skyshab/components/tree/master/customizer/alpha-color-picker

	Original: https://github.com/BraadMartin/components/tree/master/customizer/alpha-color-picker
	*/

	/**
	 * Alpha Color Picker Customizer Control
	 *
	 * This control adds a second slider for opacity to the stock WordPress color picker,
	 * and it includes logic to seamlessly convert between RGBa and Hex color values as
	 * opacity is added to or removed from a color.
	 *
	 * This Alpha Color Picker is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this Alpha Color Picker. If not, see <http://www.gnu.org/licenses/>.
	 */
	
	class Progression_Studios_Revised_Alpha_Color_Control extends WP_Customize_Control {

		/**
		 * Official control name.
		 */
		public $type = 'alpha-color';

		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 */
		public $palette;

		/**
		 * Add support for showing the opacity value on the slider handle.
		 */
		public $show_opacity;

		/**
		 * Enqueue scripts and styles.
		 *
		 * Ideally these would get registered and given proper paths before this control object
		 * gets initialized, then we could simply enqueue them here, but for completeness as a
		 * stand alone class we'll register and enqueue them here.
		 */
		public function enqueue() {

			$default_script_location = get_template_directory_uri() . '/inc/customizer/js/alpha-color-picker.js';

			wp_enqueue_script(
				'alpha-color-picker',
				apply_filters('alpha-color-picker-scripts', $default_script_location),
				array( 'jquery', 'wp-color-picker' ),
				'1.0.0',
				true
			);

			$default_styles_location = get_template_directory_uri() . '/inc/customizer/css/alpha-color-picker.css';

			wp_enqueue_style(
				'alpha-color-picker',
				apply_filters('alpha-color-picker-styles', $default_styles_location),
				array( 'wp-color-picker' ),
				'1.0.0'
			);
		}

		/**
		 * Render the control.
		 */
		public function render_content() {

			// Process the palette
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
				// Default to true
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}

			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

			// Output the label if passed in
			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
			}

			// Output the description if passed in	
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
			} 
			?>
			<div class="customize-control-content">
				<label>
					<input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr($show_opacity); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
				</label>
			</div>
			<?php
		}
	}
	

}
add_action( 'customize_register', 'progression_studios_add_customizer_custom_controls' );

