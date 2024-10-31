<?php
/**
 * Elementor Icon Widget.
 *
 * Elementor widget that inserts icon box content into the page
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



class Icon_Box_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Icon Box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Icon Box', 'powerx' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Icon box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-file-image-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the banner widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'powerx' ];
	}

	/**
	 * Register Icon Box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

        // Content section

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Icon Box', 'powerx' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Step number start

        $this->add_control(
			'icon_box_step',
			[
				'label' => __( 'Step Number', 'powerx' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before',
				'placeholder' => __( '01', 'powerx' ),
                'default' => __( '01', 'powerx' ),
			]
		);

        // Start icon 

        $this->add_control(
			'box_icon',
			[
				'label' => __( 'Icon', 'powerx' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-laugh-wink',
					'library' => 'fa-solid', 
				],
			]
		);

        // Title

		$this->add_control(
			'ibox_title',
			[
				'label' => __( 'Title', 'powerx' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Title Here', 'powerx' ),
                'default' => __( 'Awesome Title', 'powerx' ),
			]
		); 

        // Description


        $this->add_control(
			'ibox_description',
			[
				'label' => __( 'Description', 'powerx' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'separator' => 'before',
				'placeholder' => __( 'Description Here', 'powerx' ),
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'powerx' ),
				
			]
		);
        
        

		$this->end_controls_section();

//    end content section 

//  start style section

        $this->start_controls_section(
			'style_icon_box',
			[
				'label' => __( 'Icon Box', 'powerx' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// responsive alignment

        $this->add_responsive_control(
			'banner_title_align',
			[
				'label' => __( 'Alignment', 'powerx' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'powerx' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'powerx' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'powerx' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],		
                'selectors' => [
					'{{WRAPPER}} .icon-box' => 'text-align: {{VALUE}};',
				],
			]
		);

       

    //    content box style 
        $this->add_control(
			'main_box_content',
			[
				'label' => __( 'Content Wrapper', 'powerx' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->start_controls_tabs(
			'style_icon_main'
		);

        $this->start_controls_tab(
			'style_normal_icon_box',
			[
				'label' => __( 'Normal', 'powerx' ),
			]
		);

        $this->add_control(
			'main_boxbg_bottom_color',
			[
				'label' => __( 'Half Circle', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:before ' => 'background: {{VALUE}}',
				],
			]
		);


         
		$this->add_control(
			'main_boxbg_color',
			[
				'label' => __( 'Background', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box' => 'background: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_normal',
				'label' => __( 'Box Shadow', 'powerx' ),
				'selector' => '{{WRAPPER}} .icon-box',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __( 'Border', 'powerx' ),
				'selector' => '{{WRAPPER}} .icon-box',
			]
		);

        $this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'powerx' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_tab();

        $this->start_controls_tab(
			'style_hover_icon_box',
			[
				'label' => __( 'Hover', 'powerx' ),
			]
		);

        $this->add_control(
			'main_boxbg_color_hover',
			[
				'label' => __( 'Background', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover:before ' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'powerx' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:before ' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'powerx' ),
				'selector' => '{{WRAPPER}} .icon-box:hover ',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_hover',
				'label' => __( 'Border', 'powerx' ),
				'selector' => '{{WRAPPER}} .icon-box:hover ',
			]
		);

        $this->add_responsive_control(
			'box_padding_hover',
			[
				'label' => __( 'Padding', 'powerx' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

//    end tab


		$this->end_controls_section();

        // start icon tab of style 

        $this->start_controls_section(
			'style_icon',
			[
				'label' => __( 'Icon', 'powerx' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        
        $this->start_controls_tabs(
			'box_icon_size'
		);

        $this->start_controls_tab(
			'bicon_normal_box',
			[
				'label' => __( 'Normal', 'powerx' ),
			]
		);

        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'powerx' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box i:before ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);



		$this->add_control(
			'icon_main_color',
			[
				'label' => __( 'Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box i:before ' => 'color: {{VALUE}}',
				],
			]
		);



        $this->end_controls_tab();

        $this->start_controls_tab(
			'bicon_Hover_box',
			[
				'label' => __( 'Hover', 'powerx' ),
			]
		);

        
        $this->add_responsive_control(
			'icon_size_hover',
			[
				'label' => __( 'Size', 'powerx' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover i:before ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);


        $this->add_control(
			'icon_main_color_hover',
			[
				'label' => __( 'Hover Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover i:before ' => 'color: {{VALUE}}',
				],
			]
		);


        $this->end_controls_tab();

        $this->end_controls_tabs();


		$this->end_controls_section();

        // start new tab of style

        $this->start_controls_section(
			'style_content',
			[
				'label' => __( 'Content', 'powerx' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

         
        $this->start_controls_tabs(
			'box_content_sizes'
		);

        $this->start_controls_tab(
			'content_normal_box_size',
			[
				'label' => __( 'Normal', 'powerx' ),
			]
		);


        
        $this->add_control(
			'box_title_color',
			[
				'label' => __( 'Title', 'powerx' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'box_title_typography',
				'label' => __( 'Typography', 'powerx' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .icon-box h3',
			]
		);

        
        
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box h3' => 'color: {{VALUE}}',
				],
			]
		);

        
        $this->add_control(
			'box_description_color',
			[
				'label' => __( 'Description', 'powerx' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);



        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'box_description_typography',
				'label' => __( 'Typography', 'powerx' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .icon-box p',
			]
		);
        
		$this->add_control(
			'Description_color',
			[
				'label' => __( 'Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box p' => 'color: {{VALUE}}',
				],
			]
		);


        $this->end_controls_tab();

        $this->start_controls_tab(
			'content_hover_box_size',
			[
				'label' => __( 'Hover', 'powerx' ),
			]
		);

        
        $this->add_control(
			'box_title_color_hover',
			[
				'label' => __( 'Title', 'powerx' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'box_title_typography_hover',
				'label' => __( 'Typography', 'powerx' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .icon-box:hover h3',
			]
		);

        
        
		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover h3' => 'color: {{VALUE}}',
				],
			]
		);

        
        $this->add_control(
			'box_description_color_hover',
			[
				'label' => __( 'Description', 'powerx' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);



        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'box_description_typography_hover',
				'label' => __( 'Typography', 'powerx' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .icon-box:hover p',
			]
		);
        
		$this->add_control(
			'Description_color_hover',
			[
				'label' => __( 'Color', 'powerx' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box:hover p' => 'color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

	}

	/**
	 * Render banner widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
        $icon_box_step = $settings ['icon_box_step'];
        $ibox_title = $settings ['ibox_title'];
        $ibox_description = $settings ['ibox_description'];
        ?>
                    <div class="icon-box">	

                        <span class="step-point"> <?php echo $icon_box_step;?> </span>
					
                        <?php \Elementor\Icons_Manager::render_icon( $settings['box_icon'], [ 'aria-hidden' => 'true' ] ); ?>

						<h3><?php echo $ibox_title?></h3>

						<p><?php echo $ibox_description;?></p>

					</div>
        <?php   

	}

}