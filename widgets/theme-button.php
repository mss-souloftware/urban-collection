<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Urban_Collection extends \Elementor\Widget_Base
{
    /*
     * Get widget name.
     */
    public function get_name()
    {
        return 'themeButton';
    }

    /*
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Theme Button', 'urban-collection');
    }

    /*
     * Get widget icon.
     */
    public function get_icon()
    {
        return 'eicon-arrow-right';
    }

    /**
     * Get custom help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     */
    public function get_keywords()
    {
        return ['theme', 'urban-collection', 'button', 'urban'];
    }



    /**
     * Register widget controls.
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Theme Button', 'urban-collection'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Learn More',
                'placeholder' => esc_html__('Button Text', 'urban-collection'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'urban-collection'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'urban-collection'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#451C1B',
                'selectors' => [
                    '{{WRAPPER}} .urban-theme-button a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__('Title Color Hover', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .urban-theme-button a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Arrow Color', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#451C1B',
                'selectors' => [
                    '{{WRAPPER}} .urban-theme-button a .urban-theme-arrow svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow_color_hover',
            [
                'label' => esc_html__('Arrow Color Hover', 'urban-collection'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .urban-theme-button a:hover .urban-theme-arrow svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .urban-theme-button a',
            ]
        );

        $this->add_control(
            'arrow_width',
            [
                'label' => esc_html__('Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'selectors' => [
                    '{{WRAPPER}} .urban-theme-button a .urban-theme-arrow svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_class',
            [
                'label' => 'Arrow Position',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'arrow-right',
                'options' => [
                    'arrow-right' => 'Towards Right',
                    'arrow-left' => 'Towards Left',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Render widget controls.
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_link', $settings['button_link']);
        }
?>
        <div class="urban-theme-button <?php echo $settings['arrow_class']; ?>">
            <a <?php echo $this->get_render_attribute_string('button_link'); ?>>
                <div class="urban-theme-title"><?php echo $settings['title']; ?></div>
                <div class="urban-theme-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.846 29.959">
                        <g id="Group_3" data-name="Group 3" transform="translate(-1411 -3875)">
                            <path id="Ellipse_3_Stroke_" data-name="Ellipse 3 (Stroke)" d="M14.98,29.96A14.984,14.984,0,0,1,9.149,1.177,14.984,14.984,0,0,1,20.811,28.783,14.888,14.888,0,0,1,14.98,29.96Zm0-29.383a14.4,14.4,0,1,0,14.4,14.4A14.42,14.42,0,0,0,14.98.576Z" transform="translate(1466.886 3875)" />
                            <path id="Vector_2_Stroke_" data-name="Vector 2 (Stroke)" d="M1483.117,3897.4l1.833,1.833a.288.288,0,0,1,0,.407l-1.833,1.833a.288.288,0,0,1-.407-.407l1.341-1.341H1411v-.577h73.051l-1.341-1.341a.288.288,0,0,1,.407-.407Z" transform="translate(0 -9.46)" />
                        </g>
                    </svg>

                </div>
            </a>
        </div>

        <style>
            .urban-theme-button {
                display: inline-block;
            }

            .urban-theme-button .urban-theme-arrow {
                margin-top: -15px;
            }

            .urban-theme-button.arrow-right .urban-theme-arrow {
                margin-left: 15px;
            }

            .urban-theme-button.arrow-left .urban-theme-arrow {
                margin-right: 15px;
            }

            .urban-theme-button a,
            .urban-theme-button a .urban-theme-arrow svg path {
                transition: all 0.3s linear;
            }
        </style>

        <?php

        if ($settings['arrow_class'] === 'arrow-left') {
        ?>
            <style>
                .urban-theme-button.arrow-left .urban-theme-arrow svg {
                    transform: rotate(180deg);
                }

                .urban-theme-button.arrow-left .urban-theme-title {
                    text-align: right;
                }
            </style>
<?php
        }
    }
}
