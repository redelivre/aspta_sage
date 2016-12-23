<?php
namespace Roots\Sage\Widget;
use WP_Widget;

/**
 * Program Constestado Library widget
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
 

class ProgramConstestadoLibraryWidget extends WP_Widget {
  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'program_contestado_library_widget',
      'description' => __('Biblioteca para o Programa Constestado'),
    );
    parent::__construct( 'program_contestado_library_widget', __('Biblioteca para o Programa Constestato'), $widget_ops );
  }
  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    ?>
    <div class="sidebar-module parcerias col-sm-12">
    <h3 class="text-uppercase">Consulte Também</h3>
      <div class="logo_partners text-center" >
        <div class="parceria">
          <a href="http://aspta.org.br/2014/03/projeto-alianca-pela-agroecologia/" target="_blank">
            <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/assets/images/sidebar_partiners/alizanza.png" alt="parceiro: Alianza por la Agroecologia"/>
          </a>
        </div>
        <div class="parceria">
          <a href="http://www.agroecologiaemrede.org.br/" target="_blank">
            <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/assets/images/sidebar_partiners/agroecologia-em-rede.png" alt="parceiro: Agroecologia em Rede"/>
          </a>
        </div>
        <div class="parceria">
          <a href="http://www6.ufrgs.br/abaagroeco" target="_blank">
            <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/assets/images/sidebar_partiners/aba.png" alt="parceiro: aba Agroecologia"/>
          </a>
        </div>
      </div>
    </div>
    <?php
  }
  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    // outputs the options form on admin
  }
  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
}
