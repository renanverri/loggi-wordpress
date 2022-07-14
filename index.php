<?php
/**
 * Plugin Name: Plugin de cotação Loggi
 * Plugin URI:  https://www.dizaboa.com
 * Description: Integração da Loggi
 * Author:      Renan Verri
 * Author URI:  https://www.dizaboa.com
 * Version:     1.0
 * Text Domain: loggi-verri
 * Domain Path: /languages
 */


add_action( 'admin_menu', 'stp_api_add_admin_menu' );
add_action( 'admin_init', 'stp_api_settings_init' );

function stp_api_add_admin_menu(  ) {
    add_options_page( 'Configs Loggi', 'Configs Loggi', 'manage_options', 'settings-api-page', 'stp_api_options_page' );
}

function stp_api_settings_init(  ) {
    register_setting( 'stpPlugin', 'stp_api_settings' );
    add_settings_section(
        'stp_api_stpPlugin_section',
        __( 'Configurações', 'wordpress' ),
        'stp_api_settings_section_callback',
        'stpPlugin'
    );

    add_settings_field(
        'apikey',
        __( 'ApiKey', 'wordpress' ),
        'apikey_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
	    add_settings_field(
        'ceporigem',
        __( 'Cep de Origem', 'wordpress' ),
        'ceporigem_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'email',
        __( 'Email Loggi', 'wordpress' ),
        'email_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'senha',
        __( 'Senha Loggi', 'wordpress' ),
        'senha_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'citycode',
        __( 'Cidade de Origem', 'wordpress' ),
        'citycode_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );



}

function apikey_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
    <input type='text' name='stp_api_settings[apikey]' value='<?php echo $options['apikey']; ?>'>
    <?php
}

function email_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
    <input type='text' name='stp_api_settings[email]' value='<?php echo $options['email']; ?>'>
    <?php
}
function senha_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
    <input type='text' name='stp_api_settings[senha]' value='<?php echo $options['senha']; ?>'>
    <?php
}
function ceporigem_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
    <input type='text' name='stp_api_settings[ceporigem]' value='<?php echo $options['ceporigem']; ?>'>
    <?php
}

function citycode_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
    <select name='stp_api_settings[citycode]'>


	<option value='1'  <?php selected( $options['citycode'], 1 ); ?>>São Paulo - SP</option>
	<option  value='2'  <?php selected( $options['citycode'], 2 ); ?>>Rio de Janeiro - RJ</option>
	<option value='3' <?php selected( $options['citycode'], 3 ); ?>>Belo Horizonte - MG</option>
	<option value='4' <?php selected( $options['citycode'], 4 ); ?>>Curitiba - PR</option>
	<option value='5' <?php selected( $options['citycode'], 5 ); ?>>Porto Alegre - RS</option>
	<option value='6' <?php selected( $options['citycode'], 6 ); ?>>Campinas - SP</option>
	<option value='7' <?php selected( $options['citycode'], 7 ); ?>>Ribeirão Preto - SP</option>
	<option value='8' <?php selected( $options['citycode'], 8 ); ?>>São José dos Campos - SP</option>
	<option value='9' <?php selected( $options['citycode'], 9 ); ?>>Santos - SP</option>
	<option value='10' <?php selected( $options['citycode'], 10 ); ?>>Brasília - DF</option>
	<option value='11' <?php selected( $options['citycode'], 11 ); ?>>Recife - PE</option>
	<option value='12' <?php selected( $options['citycode'], 12 ); ?>>Salvador - BA</option>
	<option value='13' <?php selected( $options['citycode'], 13 ); ?>>Fortaleza - CE</option>
	<option value='14' <?php selected( $options['citycode'], 14 ); ?>>Florianópolis - SC</option>
	<option value='15' <?php selected( $options['citycode'], 15 ); ?>>Goiânia - GO</option>
	<option value='16' <?php selected( $options['citycode'], 16 ); ?>>Manaus - AM</option>
	<option value='17' <?php selected( $options['citycode'], 17 ); ?>>Vitória - ES</option>
	<option value='19' <?php selected( $options['citycode'], 18 ); ?>>Cajamar - SP</option>
	<option value='20' <?php selected( $options['citycode'], 19 ); ?>>Piracicaba - SP</option>
	<option value='21' <?php selected( $options['citycode'], 20 ); ?>>Uberlândia - MG</option>
	<option value='22' <?php selected( $options['citycode'], 21 ); ?>>Joinville - SC</option>
	<option value='23' <?php selected( $options['citycode'], 22 ); ?>>Sorocaba - SP</option>
	<option value='26' <?php selected( $options['citycode'], 23 ); ?>>Maringá - PR</option>
	<option value='27' <?php selected( $options['citycode'], 24 ); ?>>São José do Rio Preto - SP</option>
	<option value='28' <?php selected( $options['citycode'], 25 ); ?>>Bauru - SP</option>
	<option value='29' <?php selected( $options['citycode'], 26 ); ?>>Araçatuba - SP</option>
	<option value='30' <?php selected( $options['citycode'], 27 ); ?>>Presidente Prudente - SP</option>
	<option value='31' <?php selected( $options['citycode'], 28 ); ?>>Jundiaí - SP</option>
	<option value='32' <?php selected( $options['citycode'], 29 ); ?>>Franca - SP</option>
	<option value='33' <?php selected( $options['citycode'], 30 ); ?>>São Carlos - SP</option>
	<option value='34' <?php selected( $options['citycode'], 31 ); ?>>Araraquara - SP</option>
	<option value='35' <?php selected( $options['citycode'], 32 ); ?>>Limeira - SP</option>
	<option value='36' <?php selected( $options['citycode'], 33 ); ?>>Taubaté - SP</option>
	<option value='37' <?php selected( $options['citycode'], 34 ); ?>>Suzano - SP</option>
	<option value='38' <?php selected( $options['citycode'], 35 ); ?>>Itaquaquecetuba - SP</option>
		
    </select>

<?php
}



function stp_api_settings_section_callback(  ) {
    echo __( 'Suporte? renan@dizaboa.com', 'wordpress' );
}

function stp_api_options_page(  ) {
    ?>
    <form action='options.php' method='post'>

        <h2>Integração da Loggi no Woocommerce</h2>

        <?php
        settings_fields( 'stpPlugin' );
        do_settings_sections( 'stpPlugin' );
        submit_button();
        ?>

    </form>
    <?php
}



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WC_Loggi' ) ) :
    include_once ABSPATH .'wp-content/plugins/woocommerce/includes/abstracts/abstract-wc-settings-api.php';
    include_once ABSPATH .'wp-content/plugins/woocommerce/includes/abstracts/abstract-wc-shipping-method.php';

    /**
     * WooCommerce Loggi main class.
     */
    class WC_Loggi extends WC_Shipping_Method {

        /**
         * Plugin version.
         *
         * @var string
         */
        const VERSION = '1.0';

        private $loggiHost;

        /**
         * Constructor for your shipping class
         *
         * @access public
         */
        public function __construct() {
            $this->id                 = 'woocommerce_loggi';
            $this->title       = __( 'Loggi MotoBoy' );
            $this->method_description = __( 'Shipment by Loggi' ); //
            $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
            $this->loggiBaseUrl = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')))
                ? 'https://staging.loggi.com/api/v1' // Sandbox
                : 'https://www.loggi.com/api/v1';    // Production

            $this->init();
        }

        /**
         * Init your settings
         *
         * @access public
         * @return void
         */
        function init() {
            // Load the settings API
            $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
            $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

            // Save settings in admin if you have any defined,
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
            add_action('init', 'registerSession', 1);
            add_action('wp_logout', 'finishSession');
            add_action('wp_login', 'finishSession');
        }

        // @todo Criar método para testar se as credenciais informadas são válidas e alertar o adminstrador quando negativo

        private function registerSession() {
            if (!session_id()) {
                session_start();
            }
        }

        private function finishSession() {
            session_destroy ();
        }

        private function authenticate() {
            // @todo mover para configurações
			
					$emailloggi = $options['email'];
							$senhaloggi = $options['senha'];
                     $params = array(
                'email' => $emailloggi,
                'password' => $senhaloggi
            );

            $payload = json_encode($params);

            $ch = curl_init($this->loggiBaseUrl .'/usuarios/login/');
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            $response = json_decode($result);
            curl_close($ch);
        }

        /**
         * calculate_shipping function.
         *
         * @access public
         * @param mixed $package
         * @return void
         */
        public function calculate_shipping($package = array()) {
//            $this->authenticate();

    $options2 = get_option( 'stp_api_settings' );

            $cep = str_replace(array('.', '-'), '', $package['destination']['postcode']);
			            $base_postcode = $options2['ceporigem'];
			              $base_code = $options2['citycode'];
            $payload = json_encode(array(
                'transport_type' => 1,
                'city' =>  $base_code,
                'addresses' => array(
                    array(
                        'by' => 'cep',
                        'query' => array(
						   'cep' => $base_postcode,                           
                            'number' => 0
                        )
                    ),
                    array(
                        'by' => 'cep',
                        'query' => array(
                            'cep' => $cep,
                            'number' => 0
                        )
                    )
                )
            ));
            $apikeyloggi = $options['apikey'];
            $ch = curl_init($this->loggiBaseUrl .'/endereco/estimativa/');
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Authorization: $apikeyloggi',

            ));
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            $response = json_decode($result, true);
            curl_close($ch);
  
            // @todo tratar cep inválido
            // @todo tratar exceptions
            // @todo remover método quando cep informado não for aceito pela API

			
			
			
			
			
            if (is_array($response) && !isset($response['errors'])) {
				
				if (empty($response['errors'])) {
					
				 	$jesus = "Via Motoboy " ;
					
					 }
					 
					 
					 else  {
						 
						  	$jesus = "Desculpe area nao suportada" ;
						  }
				
                $rate = array(
                    'id' => $this->id,

                    'label' => $jesus, 
					

			        'cost' => $response['normal']['estimated_cost'],
                    'calc_tax' => 'per_item'
                );

			
			

      $this->add_rate( $rate );

				
                // FOI KRL DA RATE
           
				
				
            }
			
			
		
			
			
			
			
			         
			
        }
    }

    function addLoggiShippingMethod( $methods ) {
        $methods['woocommerce_loggi'] = 'WC_Loggi';
        return $methods;
    }

    add_filter('woocommerce_shipping_methods', 'addLoggiShippingMethod' );
	
	
	
	
	
	
	



endif;