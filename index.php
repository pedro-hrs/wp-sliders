<?php 
  /*
Plugin Name: Wordpress Zap Zap
Plugin URI:  https://www.prodrigues.com.br
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

function inserir_zap($atts) {
    // Definir os atributos padrão do shortcode e mesclar com os atributos recebidos
    $atts = shortcode_atts(
        array(
            'number' => '55123456789', // Número de telefone, incluindo o código do país (55 - Brasil)
            'align' => 'left', // Alinhamento padrão à esquerda (caso não seja informada)
        ),
        $atts
    );

      echo '<div class="fab">
              <a href="https://wa.me/' .$atts['number']. '" data-toggle="tooltip" title="Fale Conosco"data-placement="left" class="fabWhatsApp" target="_blank" style="'. $atts['align'].':40px">
                <img src="'.plugin_dir_url( __FILE__ ).'/public/assets/icon.png">
              </a>
            </div>';
}

add_shortcode('botao-zap', 'inserir_zap');
?>