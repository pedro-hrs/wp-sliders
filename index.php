<?php 
  /*
Plugin Name: ZapZap Button
Plugin URI:  https://pedrohrs.notion.site/ZapZap-ef0704f79aad46fbb0cec49d8dafb76c?pvs=4
Description: Plugin wordpress simples e direto para inclusão do WhatsApp, sem mimimi. É ativar, inserir o shortcode e ser feliz.
Version:     0.1.0
Author:      Pedro Rodrigues
Author URI:  https://www.prodrigues.com.br
*/

function wp_zap_scripts(){
  wp_enqueue_style( 'wp-zap-style', plugin_dir_url( __FILE__ ) . 'public/css/style.css',false,'1.1','all');
  wp_enqueue_script( 'wp-zap-script', plugin_dir_url( __FILE__ ) . 'public/js/script.js',array('jquery'),'1.1','all');
}
add_action('wp_enqueue_scripts', 'wp_zap_scripts');

function zapzap_customizer( $wp_customize ){
  $wp_customize->add_section('zap', array(
      'title' => 'WhatsApp',
      'priority' => 20,
  ));

  // Titulo
  $wp_customize->add_setting('whatsapp_url', array(
    'default' => '55000000000',
    'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('whatsapp_url', array(
    'label' => 'Link do whatsapp',
    'description' => 'Link que será usado ao clicar no botão flutuante',
    'section' => 'zap',
    'settings' => 'whatsapp_url',
    'type' => 'text',
    'priority'=> 20
  ));

  // Botão 1 Link

  $wp_customize->add_setting('exibir_em_todas_as_paginas', array(
      'default' => true,
      'transport' => 'refresh',
  ));


  $wp_customize->add_control('exibir_em_todas_as_paginas', array(
      'label' => 'Adicionar botão em todas as páginas',
      'description' => 'Caso queira inserir em páginas específicas, desabilite esta opção e insira via shortcode.',
      'section' => 'zap',
      'settings' => 'exibir_em_todas_as_paginas',
      'type' => 'checkbox',
      'priority'=> 5
  ));

  // Botão 1

  $wp_customize->add_setting('alinhamento_zap', array(
      'default' => 'left',
      'transport' => 'refresh',
  ));


  $wp_customize->add_control('alinhamento_zap', array(
      'label' => 'Alinhamento',
      'section' => 'zap',
      'settings' => 'alinhamento_zap',
      'type' => 'select',
      'priority'=> 4,
      'choices' => array(
        'left' => __( 'Esquerda' ),
        'right' => __( 'Direita' ),
  ),
  ));


}
  add_action( 'customize_preview_init', 'zapzap_customizer' );
  add_action('customize_register', 'zapzap_customizer');  

  if(get_theme_mod('exibir_em_todas_as_paginas')){
    add_action( 'wp_footer', 'inserir_zap', 100 );
  }

function inserir_zap() {
    if(get_theme_mod( 'alinhamento_zap') === 'right'){
      echo '<div class="fabWhatsApp" style="position:absolute; right:120px">
            <a href="'.get_theme_mod('whatsapp_url').'" data-toggle="tooltip" title="Fale Conosco" data-placement="left" target="_blank" >
              <img src="'.plugin_dir_url( __FILE__ ).'/public/assets/icon.png">
            </a>
          </div>';
        }else{
      echo '<div class="fabWhatsApp" style="position:absolute; left:50px">
            <a href="'.get_theme_mod('whatsapp_url').'" data-toggle="tooltip" title="Fale Conosco" data-placement="left" target="_blank" >
              <img src="'.plugin_dir_url( __FILE__ ).'/public/assets/icon.png">
            </a>
          </div>';
    };
}
?>