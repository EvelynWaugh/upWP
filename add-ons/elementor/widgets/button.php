<?php

class Maverick_Button_Widget extends Elementor\Widget_Base {

	public function get_name() {
		return 'ubutton';
	}

	public function get_title() {
		return esc_html__( 'UButton', 'oceanwp' );
	}

	public function get_icon() {
		return 'eicon-button';
	}


	public function get_categories() {
		return array( 'basic' );
	}

	public function get_keywords() {
		return array( 'button', 'custom widget' );
	}

	public function get_script_depends() {
		wp_register_script( 'ocean-elementor', get_stylesheet_directory_uri() . '/assets/js/elementor-editor.js', array(), time(), true );
		return array( 'ocean-elementor' );
	}

	public function get_style_depends() {
		wp_register_style( 'ocean-button', get_stylesheet_directory_uri() . '/assets/css/elementor-button.css', array(), time(), 'all' );
		return array( 'ocean-button' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Button', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'button_type',
			array(
				'label'   => esc_html__( 'Type', 'plugin-name' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'link',
				'options' => array(
					'link'   => esc_html__( 'Link', 'plugin-name' ),
					'button' => esc_html__( 'Button', 'plugin-name' ),

				),

			)
		);

		$this->add_control(
			'text',
			array(
				'label'       => esc_html__( 'Text', 'plugin-name' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'default'     => esc_html__( 'Click button', 'plugin-name' ),
				'placeholder' => esc_html__( 'Click button', 'plugin-name' ),

			)
		);

		$this->add_control(
			'link',
			array(
				'label'       => esc_html__( 'Link', 'plugin-name' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'dynamic'     => array(
					'active' => false,
				),
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default'     => array(
					'url' => '#',
				),
				'condition'   => array(
					'button_type' => 'link',
				),
			)
		);

		$this->add_responsive_control(
			'align',
			array(
				'label'        => esc_html__( 'Alignment', 'plugin-name' ),
				'type'         => \Elementor\Controls_Manager::CHOOSE,
				'options'      => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'plugin-name' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'plugin-name' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'plugin-name' ),
						'icon'  => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => esc_html__( 'Justified', 'plugin-name' ),
						'icon'  => 'eicon-text-align-justify',
					),
				),
				'prefix_class' => 'elementor%s-align-',
				'default'      => 'left',
			)
		);

		$this->add_control(
			'selected_icon',
			array(
				'label'                  => esc_html__( 'Icon', 'plugin-name' ),
				'type'                   => \Elementor\Controls_Manager::ICONS,
				'label_block'            => false,
				'skin'                   => 'inline',

				'exclude_inline_options' => array(),
			)
		);

		$this->add_control(
			'icon_align',
			array(
				'label'     => esc_html__( 'Icon Position', 'plugin-name' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => array(
					'left'  => esc_html__( 'Before', 'plugin-name' ),
					'right' => esc_html__( 'After', 'plugin-name' ),
				),
				'condition' => array( 'selected_icon[value]!' => '' ),
			)
		);

		$this->add_control(
			'icon_indent',
			array(
				'label'     => esc_html__( 'Icon spacing', 'plugin-name' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'max' => 50,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .maverick-button .maverick-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .maverick-button .maverick-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			array(
				'label' => esc_html__( 'Button', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'typography',
				'global'   => array(
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
					// 'active'  => false,
				),
				'selector' => '{{WRAPPER}} .maverick-button',

			)
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => esc_html__( 'Normal', 'plugin-name' ),

			)
		);

		$this->add_control(
			'button_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'plugin-name' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .maverick-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				),

			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'           => 'background',
				'types'          => array( 'classic', 'gradient' ),
				'exclude'        => array( 'image' ),
				'selector'       => '{{WRAPPER}} .maverick-button',
				'fields_options' => array(
					'background' => array(
						'default' => 'classic',
					),
					'color'      => array(

						'global' => array(
							'default' => Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,

							// 'active'  => false,
						),
					),
				),

			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => esc_html__( 'Hover', 'plugin-name' ),

			)
		);

		$this->add_control(
			'hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'plugin-name' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .maverick-button:hover, {{WRAPPER}} .maverick-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .maverick-button:hover svg, {{WRAPPER}} .maverick-button:focus svg' => 'fill: {{VALUE}};',
				),

			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'           => 'button_background_hover',
				'types'          => array( 'classic', 'gradient' ),
				'exclude'        => array( 'image' ),
				'selector'       => '{{WRAPPER}} .maverick-button:hover, {{WRAPPER}} .maverick-button:focus',
				'fields_options' => array(
					'background' => array(
						'default' => 'classic',
					),
				),

			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'      => 'border',
				'selector'  => '{{WRAPPER}} .maverick-button',
				'separator' => 'before',

			)
		);

		$this->add_responsive_control(
			'border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'plugin-name' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .maverick-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),

			)
		);

		$this->add_responsive_control(
			'text_padding',
			array(
				'label'      => esc_html__( 'Padding', 'plugin-name' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'vw', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .maverick-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'default'    => array(
					'top'    => 10,
					'bottom' => 10,
					'left'   => 20,
					'right'  => 20,
					'unit'   => 'px',
				),
				'separator'  => 'before',

			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$html_tag = $settings['button_type'] === 'link' ? 'a' : 'button';

		if ( $settings['button_type'] === 'link' ) {
			$this->add_link_attributes( 'button', $settings['link'] );
			$this->add_render_attribute(
				'button',
				array(
					'class' => array( 'maverick-button', 'maverick-button-link' ),
				)
			);
		} else {
			$this->add_render_attribute(
				'button',
				array(
					'class' => array( 'maverick-button', 'maverick-button-btn' ),
				)
			);
		}
		// $this->add_render_attribute( 'button', 'class', 'maverick-button' );
		// $this->add_render_attribute( 'button', 'id', 'maverick-button' );

		$this->add_render_attribute(
			'icon',
			array(
				'class' => array(
					'maverick-button-icon',
					'maverick-align-icon-' . $settings['icon_align'],
				),
			)
		);
		?>
			<div class="maverick-button-wrapper">
				<<?php echo $html_tag; ?> <?php $this->print_render_attribute_string( 'button' ); ?>>
					<span <?php $this->print_render_attribute_string( 'icon' ); ?>>
						<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
					</span>
					<span class="maverick-button-text">
						<?php echo $settings['text']; ?>
					</span>
				</<?php echo $html_tag; ?>>
			</div>
		<?php
	}

	protected function content_template() {
		?>
		<#
		if(settings.button_type === 'link') {
			view.addRenderAttribute('button', {class: ['maverick-button','maverick-button-link'], href: settings.link.url})
		}
		else {
			view.addRenderAttribute('button', {class: ['maverick-button','maverick-button-btn']})
		}
		view.addRenderAttribute('icon', {class: ['maverick-button-icon','maverick-align-icon-' + settings.icon_align]})
		var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' );
		var htmlTag = settings.button_type === 'link' ? 'a' : 'button';
		#>
		<div class="maverick-button-wrapper">
			<{{htmlTag}} {{{ view.getRenderAttributeString( 'button' ) }}}>
				<# if ( settings.selected_icon ) { #>
					<span {{{ view.getRenderAttributeString( 'icon' ) }}}>
						{{{iconHTML.value}}}
					</span>
				<# } #>
				<span class="maverick-button-text">
					{{{settings.text}}}
				</span>
			</{{htmlTag}}>
		</div>
		<?php
	}

}
