<?php

class Elementor_Text_Widget extends Elementor\Widget_Base {

	public function get_name() {
		return 'text_widget';
	}

	public function get_title() {
		return esc_html__( 'Text Widget', 'oceanwp' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return array( 'basic' );
	}

	public function get_keywords() {
		return array( 'text', 'custom widget' );
	}

	public function get_script_depends() {
		wp_register_script( 'ocean-elementor', get_stylesheet_directory_uri() . '/assets/js/elementor-editor.js', array(), time(), true );
		return array( 'ocean-elementor' );
	}

	public function get_style_depends() {}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => esc_html__( 'Title', 'plugin-name' ),
				'placeholder' => esc_html__( 'Enter your title', 'plugin-name' ),
				'input_type'  => 'text', // email, password, number, url,
				'classes'     => 'maverick-text',
				'label_block' => true,
				'show_label'  => false,

			)
		);
		$this->add_control(
			'subtitle',
			array(
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'label'       => esc_html__( 'Subtitle', 'plugin-name' ),
				'placeholder' => esc_html__( 'Enter your subtitle', 'plugin-name' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'rows'        => 10,
				'label'       => esc_html__( 'Subtitle', 'plugin-name' ),
				'placeholder' => esc_html__( 'Enter your subtitle', 'plugin-name' ),
			)
		);

		$this->add_control(
			'enable_border',
			array(
				'label'        => esc_html__( 'Enable Border', 'plugin-name' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'your-plugin' ),
				'label_off'    => esc_html__( 'Off', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		// $this->add_control(
		// 'border_width',
		// array(
		// 'label'     => esc_html__( 'Border Width', 'plugin-name' ),
		// 'type'      => \Elementor\Controls_Manager::DIMENSIONS,
		// 'size_units' => [ 'px', '%', 'em' ],

		// 'selectors' => [
		// '{{WRAPPER}} .maverick-wrapper' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// ],
		// 'condition' => array(
		// 'enable_border' => 'yes',
		// ),
		// )
		// );
		// $this->add_control(
		// 'border_style',
		// array(
		// 'label'     => esc_html__( 'Border Style', 'plugin-name' ),
		// 'type'      => \Elementor\Controls_Manager::SELECT,
		// 'default'   => 'solid',
		// 'options'   => array(
		// 'solid'  => esc_html__( 'Solid', 'plugin-name' ),
		// 'dashed' => esc_html__( 'Dashed', 'plugin-name' ),
		// 'dotted' => esc_html__( 'Dotted', 'plugin-name' ),
		// 'double' => esc_html__( 'Double', 'plugin-name' ),
		// 'none'   => esc_html__( 'None', 'plugin-name' ),
		// ),
		// 'selectors' => [
		// '{{WRAPPER}} .maverick-wrapper' => 'border-style: {{VALUE}}',
		// ],
		// 'condition' => array(
		// 'enable_border' => 'yes',
		// ),
		// )
		// );

		// $this->add_control(
		// 'border_color',
		// array(
		// 'label'     => esc_html__( 'Border Color', 'plugin-name' ),
		// 'type'      => \Elementor\Controls_Manager::COLOR,
		// 'selectors' => [
		// '{{WRAPPER}} .maverick-wrapper' => 'border-color: {{VALUE}}',
		// ],
		// 'condition' => array(
		// 'enable_border' => 'yes',
		// ),
		// )
		// );

		$this->add_control(
			'text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'plugin-name' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'plugin-name' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'plugin-name' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'plugin-name' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .maverick-wrapper h3, {{WRAPPER}} .maverick-wrapper span, {{WRAPPER}} .maverick-wrapper p ' => 'text-align: {{VALUE}}',
				),
				'default'   => 'center',
				'toggle'    => true,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'      => 'border',
				'label'     => esc_html__( 'Border', 'plugin-name' ),
				'selector'  => '{{WRAPPER}} .maverick-wrapper',
				'condition' => array(
					'enable_border' => 'yes',
				),
			)
		);

		// $this->add_control();

		// $this->add_control();

		$this->end_controls_section();
		$this->start_controls_section(
			'second_section',
			array(
				'label' => esc_html__( 'Second', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'second_border',
			array(
				'label'        => esc_html__( 'Enable Border', 'plugin-name' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'your-plugin' ),
				'label_off'    => esc_html__( 'Off', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'third_section',
			array(
				'label' => esc_html__( 'Third', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'third_border',
			array(
				'label'        => esc_html__( 'Enable Border', 'plugin-name' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'your-plugin' ),
				'label_off'    => esc_html__( 'Off', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'plugin-name' ),
			)
		);

		// $this->add_control();

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'plugin-name' ),
			)
		);

		// $this->add_control();

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			array(
				'label' => esc_html__( 'Style Section', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'space_between',
			array(
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'label'           => esc_html__( 'Spacing', 'plugin-name' ),
				'range'           => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'devices'         => array( 'desktop', 'tablet', 'mobile' ),
				'desktop_default' => array(
					'size' => 30,
					'unit' => 'px',
				),
				'tablet_default'  => array(
					'size' => 20,
					'unit' => 'px',
				),
				'mobile_default'  => array(
					'size' => 10,
					'unit' => 'px',
				),
				'selectors'       => array(
					'{{WRAPPER}} h3 i' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'popover-toggle',
			array(
				'label'        => esc_html__( 'Box', 'plugin-name' ),
				'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__( 'Default', 'plugin-name' ),
				'label_on'     => esc_html__( 'Custom', 'plugin-name' ),
				'return_value' => 'yes',
			)
		);

		$this->start_popover();

		$this->add_control(
			'icon',
			array(
				'label'       => esc_html__( 'Icon', 'plugin-name' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'default'     => array(
					'value'   => 'fas fa-circle',
					'library' => 'fa-solid',
				),
				'recommended' => array(
					'fa-solid'   => array(
						'circle',
						'dot-circle',
						'square-full',
					),
					'fa-regular' => array(
						'circle',
						'dot-circle',
						'square-full',
					),
				),
			)
		);

		$this->end_popover();

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="maverick-wrapper">
			<h3>
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], array( 'aria-hidden' => 'true' ) ); ?>
		
				<?php echo $settings['title']; ?> 
			</h3>
			<span><?php echo $settings['subtitle']; ?> </span>
			<p><?php echo $settings['content']; ?> </p>
		</div>
		<?php
	}

	protected function content_template() {

		?>
		<# var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
		<div class="maverick-wrapper">
			<h3>{{{iconHTML.value}}} {{{ settings.title }}}</h3>
			<span>{{{ settings.subtitle }}}</span>
			<p>{{{ settings.content }}}</p>
		</div>
	
		<?php
	}

}
