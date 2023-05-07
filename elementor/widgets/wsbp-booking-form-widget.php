<?php
namespace Jhfahim_Addon;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Hero Section Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Wsbp_Booking_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Wsbp-Booking-Widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Hero Section widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Wsbp Booking Widget', 'jhfahim' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Hero Section widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-animation-text';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Booking Form', 'url', 'link' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

	
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'wsbp_font_family',
			[
				'label' => esc_html__( 'Font Family', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wsbp_progress_btn_color',
			[
				'label' => esc_html__( 'Progress Button Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#064635',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content .multisteps-form__progress-btn.js-active' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wsbp_form_title_color',
			[
				'label' => esc_html__( 'Title Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#064635',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content .multisteps-form__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wsbp_form_label_color',
			[
				'label' => esc_html__( 'Label Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content .form-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wsbp_form_prev_next_color',
			[
				'label' => esc_html__( 'Prev/next Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content button.btn.btn-primary' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'wsbp_form_prev_next_bg_color',
			[
				'label' => esc_html__( 'Prev/next Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#064635',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content button.btn.btn-primary' => 'background-color: {{VALUE}}',
				],
			]
		);

		
		$this->add_control(
			'wsbp_form_find_time_color',
			[
				'label' => esc_html__( 'Find Time Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#064635',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content button.btn.btn-primary.find-time' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'wsbp_form_find_time_bg_color',
			[
				'label' => esc_html__( 'Find Time Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content button.btn.btn-primary.find-time' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wsbp_form_book_now_color',
			[
				'label' => esc_html__( 'Book Now Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content #wsbp_book_now' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'wsbp_form_book_now_bg_color',
			[
				'label' => esc_html__( 'Book Now Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#519259',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content #wsbp_book_now' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'wsbp_form_book_now_bg_hove_color',
			[
				'label' => esc_html__( 'Book Now Hover', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#064635',
				'selectors' => [
					'{{WRAPPER}} .wsbp_booking-plugin-content #wsbp_book_now:hover' => 'background-color: {{VALUE}}',
				],
			]
		);




		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

	
		?>
	  <!--PEN CONTENT -->
	  <div class="wsbp_booking-plugin-content">
		 <!--content inner-->
		 <div class="content__inner">
			<div class="overflow-hidden">
			  <!--multisteps-form-->
			  <div class="multisteps-form">
				 <!--progress bar-->
				 <div class="row justify-content-center">
					<div class="col-12 ml-auto mr-auto mb-4">
					  <div class="multisteps-form__progress">
						 <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Services</button>
						 <button class="multisteps-form__progress-btn" type="button" title="Address">Assistence</button>
						 <button class="multisteps-form__progress-btn" type="button" title="Order Info">Booking Info</button>
						 <button class="multisteps-form__progress-btn" type="button" title="Comments">Confirm  </button>
					  </div>
					</div>
				 </div>
				 <!--form panels-->
				 <div class="row">
					<div class="col-12 m-auto">
					  <form class="multisteps-form__form">
						 <!--single form panel-->
						 <div class="multisteps-form__panel rounded bg-white js-active" data-animation="fadeIn">
							<h3 class="multisteps-form__title">Find Services</h3>
							<div class="multisteps-form__content">
							  <div class="mb-3">
								 <label for="service-select" class="form-label">Select Service</label>
								 <select class="form-select" name="wsbp_booking_services" id="wsbp_booking_services" required>
									<option value="" disabled selected>Select Service</option>
									<?php
										$services = get_posts(array(
										'post_type' => 'wpbp-services',
										'post_status' => 'publish',
										'orderby' => 'title',
										'order' => 'ASC',
										'numberposts' => -1,
										));
										foreach ($services as $service) {
										$selected = '';
										if ($services_name == $service->ID) {
											$selected = 'selected';
										}
										echo '<option value="' . $service->ID . '"' . $selected . '><a href="' . get_permalink($service->ID) . '">' . $service->post_title . '</a></option>';
										}
									?>
								</select>
							  </div>
							  <div class="mb-3">
								 <label for="person-number" class="form-label">Number of persons</label>
								 <input type="number" class="form-control" id="wsbp_num_of_person" name="wsbp_num_of_person" required>
							  </div>
							  <div class="mb-3">
								 <label for="datetime-picker" class="form-label">Select Date</label>
								 <div class="ui calendar" id="wsbp_booking_calender">
									<div class="ui input left icon">
									  <i class="calendar icon"></i>
									  <input type="text" placeholder="Date" name="wsbp_booking_calender_date" id="wsbp_booking_calender_date" required>
									</div>
								 </div>
							  </div>
							 <div class="col-md-12">
								 <button class="btn btn-primary find-time" id="wsbp_find_available_time">Click Here To Find Available Time</button>
							 </div>
							  <table class="table ">
								 <tbody>
									<tr id="wsbp_available_times_row">
								
									</tr>		
								 </tbody>
							  </table>
							  <div class="form-warning" id="wsbp_booking_form_warning"><p class="bg-danger text-light p-2"> Please fill up all fields.</p></div>      
							  <div class="button-row d-flex justify-content-end mt-4 ">
								 <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
							  </div>
							</div>
						 </div>
						 <!--single form panel-->
						 <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="fadeIn">
							<h3 class="multisteps-form__title">Select a Assistence</h3>
							<div class="multisteps-form__content">
								<?php
									$assistants = get_posts(array(
										'post_type' => 'wsbp-assistants',
										'post_status' => 'publish',
										'orderby' => 'title',
										'order' => 'ASC',
										'numberposts' => -1,
								  ));
								  
								  if ($assistants) {
										foreach ($assistants as $assistant) {
								  
											 // Get the title
											 $title = $assistant->post_title;
								  
											 // Get the thumbnail URL
											 $thumbnail_url = get_the_post_thumbnail_url($assistant->ID, 'thumbnail');
								  
											 // Get the excerpt or the content as the description
											 $description = $assistant->post_content;
								  
											 // Generate the HTML structure
											 echo '<div class="row my-3 shadow d-flex align-items-center">';
											 echo '<div class="col-2 mx-auto">';
											 echo '<input type="radio" data-id="' . $assistant->ID . '" name="wsbp_booking_assistance">';
											 echo '</div>';
											 echo '<div class="col-4">';
											 echo '<img src="' . $thumbnail_url . '" alt="' . $title . '">';
											 echo '</div>';
											 echo '<div class="col-6">';
											 echo '<h4>' . $title . '</h4>';
											 echo '<p>' . $description . '</p>';
											 echo '</div>';
											 echo '</div>';
										}
								  }			
								  
								?>
							  <div class="button-row d-flex justify-content-between mt-4">
								 <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
								 <button class="btn btn-primary ml-auto js-btn-next " id="wsbp_booking_info" type="button" title="Next">Next</button>
							  </div>
							</div>
						 </div>
						 <!--single form panel-->
						 <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="fadeIn">
							<h3 class="multisteps-form__title">Your Booking Info</h3>
							<div class="multisteps-form__content">
							  <div class="container" id="wsbp_booking_info_show">
								 
							  </div>
							  <div class="button-row d-flex justify-content-between mt-4">
								 <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
								 <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
							  </div>
							</div>
						 </div>
						 <!--single form panel-->
						 <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="fadeIn">
							<h3 class="multisteps-form__title">Additional Info</h3>
							<div class="multisteps-form__content">
							  <div class="row">
								 <div class="col-md-6">
									<div class="mb-3">
									  <label for="wsbp_booking_firstName" class="form-label">First Name</label>
									  <input type="text" class="form-control" id="wsbp_booking_firstName" name="wsbp_booking_firstName" required>
									</div>
									<div class="mb-3">
									  <label for="wsbp_booking_lastName" class="form-label">Last Name</label>
									  <input type="text" class="form-control" id="wsbp_booking_lastName" name="wsbp_booking_lastName" required>
									</div>
									<div class="mb-3">
									  <label for="wsbp_booking_email" class="form-label">Email</label>
									  <input type="email" class="form-control" id="wsbp_booking_email" name="wsbp_booking_email" required>
									</div>
									<div class="mb-3">
									  <label for="wsbp_booking_phone" class="form-label">Phone</label>
									  <input type="tel" class="form-control" id="wsbp_booking_phone" name="wsbp_booking_phone" required>
									</div>
								 </div>
								 <div class="col-md-6">
									<div class="mb-3">
									  <label for="wsbp_booking_address" class="form-label">Address</label>
									  <textarea class="form-control" id="wsbp_booking_address" name="wsbp_booking_address" rows="3" required></textarea>
									</div>
								 </div>
							  </div>
							  <div class="button-row d-flex justify-content-between mt-4">
								 <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
								 <button class="btn btn-success ml-auto" type="button" title="Send" id="wsbp_book_now">Book Now</button>
							  </div>
							</div>
						 </div>
					  </form>
					</div>
				 </div>
			  </div>
			</div>
		 </div>
	  </div>
	  
	<?php

	}

}