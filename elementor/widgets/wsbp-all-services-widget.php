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
class Wsbp_All_Services_Widget extends \Elementor\Widget_Base {

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
		return 'Wsbp-All-Services-Widget';
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
		return esc_html__( 'Wsbp All Services Widget', 'jhfahim' );
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
		return [ 'All Services', 'wsbp', 'services form' ];
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

		$this->add_responsive_control(
			'wsbp_colums',
			[
				'label' => esc_html__( 'Select Colums', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => esc_html__( '2', 'textdomain' ),
					'3'  => esc_html__( '3', 'textdomain' ),
					'4' => esc_html__( '4', 'textdomain' ),
				],
			]
		);

    $this->add_control(
			'wsbp_row_gap',
			[
				'label' => esc_html__( 'Gap', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				
			]
		);
		$this->end_controls_section();

    // add style tab control
    $this->start_controls_section(
			'services_name_style_section',
			[
				'label' => esc_html__( 'Services Name', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wsbp_services_name_typography',
				'selector' => '{{WRAPPER}} .wsbp-all-services-widget h5.card-title',
			]
		);

    $this->add_control(
			'wsbp_services_name_text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget h5.card-title' => 'color: {{VALUE}}',
				],
			]
		);
    $this->end_controls_section();

    //icons
    $this->start_controls_section(
			'services_icon_style_section',
			[
				'label' => esc_html__( 'Icons', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
        'label' => esc_html__( 'Label Typography', 'textdomain' ),
				'name' => 'wsbp_services_icon_label_typography',
				'selector' => '{{WRAPPER}} .wsbp-all-services-widget .services-info .service-info-heading',
			]
		);

    $this->add_responsive_control(
			'wsbp_services_icon_label_color',
			[
				'label' => esc_html__( 'Label Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .services-info .service-info-heading' => 'color: {{VALUE}}',
				],
			]
		);

    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
        'label' => esc_html__( 'Value Typography', 'textdomain' ),
				'name' => 'wsbp_services_icon_value_typography',
				'selector' => '{{WRAPPER}} .wsbp-all-services-widget .services-info .service-info-value',
			]
		);

    $this->add_responsive_control(
			'wsbp_services_icon_value_color',
			[
				'label' => esc_html__( 'Value Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .services-info .service-info-value' => 'color: {{VALUE}}',
				],
			]
		);


    $this->add_responsive_control(
			'wsbp_services_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .services-icon' => 'color: {{VALUE}}',
				],
			]
		);

    $this->add_responsive_control(
			'wsbp_services_icon_bg_color',
			[
				'label' => esc_html__( 'Icon Bg Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .services-icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

    //button style
    $this->start_controls_section(
			'services_button_style_section',
			[
				'label' => esc_html__( 'Button', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wsbp_services_button_typography',
				'selector' => '{{WRAPPER}} .wsbp-all-services-widget .card-button button',
			]
		);

    $this->add_responsive_control(
			'wsbp_services_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .card-button button' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_responsive_control(
			'wsbp_services_button_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .card-button button' => 'background-color: {{VALUE}}',
				],
			]
		);
    $this->add_responsive_control(
			'wsbp_services_button_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .card-button button:hover' => 'color: {{VALUE}}',
				],
			]
		);
    $this->add_responsive_control(
			'wsbp_services_button_hover_bg_color',
			[
				'label' => esc_html__( 'Hover Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .card-button button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

    $this->add_responsive_control(
			'wsbp_button_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wsbp-all-services-widget .card-button button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    // services colums
    $services_col = $settings['wsbp_colums'];
    if($services_col == 2){
      $wsbp_col = 6;
    }elseif($services_col == 3){
      $wsbp_col = 4;
    }elseif($services_col == 4){
      $wsbp_col = 3;
    }

    // service row gap
    $services_row_gap = $settings['wsbp_row_gap']['size'];
    if($services_row_gap == 1){
      $row_gap = 1;
    }elseif($services_row_gap == 2){
      $row_gap = 1;
    }elseif($services_row_gap == 3){
      $row_gap = 3;
    }elseif($services_row_gap == 4){
      $row_gap = 4;
    }elseif($services_row_gap == 5){
      $row_gap = 5;
    }
		?>
	 
   <div class="wsbp-all-services-widget">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-<?php echo $row_gap;?>">

      <?php
        $services = get_posts(array(
          'post_type' => 'wsbp-services',
          'post_status' => 'publish',
          'posts_per_page' => -1 // retrieve all posts
        ));

        foreach ($services as $service) :
          $duration = get_post_meta($service->ID, 'wsbp_services_duration', true);
          $price = get_post_meta($service->ID, 'wsbp_services_price', true);
          $capacity = get_post_meta($service->ID, 'wsbp_services_capacity', true);
          $service_id = $service->ID
        ?>
          <div class="col-md-<?php echo $wsbp_col;?> ">
            <div class="card shadow border-0">
              <?php if (has_post_thumbnail($service->ID)) : ?>
                <img src="<?php echo get_the_post_thumbnail_url($service->ID, 'large'); ?>" class="card-img-top" alt="<?php echo $service->post_title; ?>">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?php echo $service->post_title; ?></h5>
                <div class="services-row d-flex align-items-center mb-3">
                  <div class="services-icon">
                    <i class="far fa-clock"></i>
                  </div>
                  <div class="services-info">
                    <p class="service-info-heading m-0">Duration:</p>
                    <p class="service-info-value mb-0"><?php echo $duration; ?> min</p>
                  </div>
                </div>
                <div class="services-row d-flex align-items-center mb-3">
                  <div class="services-icon">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="services-info">
                    <p class="service-info-heading m-0">Price/Person:</p>
                    <p class="service-info-value mb-0">$<?php echo $price; ?></p>
                  </div>
                </div>
                <div class="services-row d-flex align-items-center mb-3">
                  <div class="services-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="services-info">
                    <p class="service-info-heading m-0">Capacity/service:</p>
                    <p class="service-info-value mb-0"><?php echo $capacity; ?></p>
                  </div>
                </div>
                <div class="card-button d-grid">
                  <button class="btn btn-primary rounded-0 wsbp_services_book_now" id="wsbp_services_book_now" data-id="<?php echo $service_id;?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Book</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      
      </div>

         <!-- offcanvas for booking form  -->
       <div class="offcanvas w-100 offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
           <h3 class="text-center" id="offcanvasRightLabel">Book Your Services</h3>
           <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
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
                        <select class="form-select" name="wsbp_booking_services" id="wsbp_booking_services">
                          <option value="" disabled selected>Select Service</option>
                          <?php
                            $services = get_posts(array(
                            'post_type' => 'wsbp-services',
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
                        <input type="number" class="form-control" id="wsbp_num_of_person" name="wsbp_num_of_person">
                        </div>
                        <div class="mb-3">
                        <label for="datetime-picker" class="form-label">Select Date</label>
                        <div class="ui calendar" id="wsbp_booking_calender">
                          <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" placeholder="Date" name="wsbp_booking_calender_date" id="wsbp_booking_calender_date">
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
         </div>
       </div>
   </div>
  </div>
	  
	<?php

	}

}