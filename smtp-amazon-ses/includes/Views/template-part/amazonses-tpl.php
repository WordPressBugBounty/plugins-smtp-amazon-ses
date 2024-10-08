<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$accessKeyId     = '';
$secretAccessKey = '';
$region          = 'us-east-1';
$settings        = $params['params'];
$mailer          = 'amazonses';
$regionArr       = array(
	'us-east-1'      => __( 'US East (N. Virginia)', 'smtp-amazon-ses' ),
	'us-east-2'      => __( 'US East (Ohio)', 'smtp-amazon-ses' ),
	'us-west-1'      => __( 'US West (N. California)', 'smtp-amazon-ses' ),
	'us-west-2'      => __( 'US West (Oregon)', 'smtp-amazon-ses' ),
	'af-south-1'     => __( 'Cape Town South Africa', 'smtp-amazon-ses' ),
	'ca-central-1'   => __( 'Canada (Central)', 'smtp-amazon-ses' ),
	'eu-west-1'      => __( 'EU (Ireland)', 'smtp-amazon-ses' ),
	'eu-west-2'      => __( 'EU (London)', 'smtp-amazon-ses' ),
	'eu-west-3'      => __( 'EU (Paris)', 'smtp-amazon-ses' ),
	'eu-central-1'   => __( 'EU (Frankfurt)', 'smtp-amazon-ses' ),
	'eu-south-1'     => __( 'EU (Milan)', 'smtp-amazon-ses' ),
	'eu-north-1'     => __( 'EU (Stockholm)', 'smtp-amazon-ses' ),
	'ap-south-1'     => __( 'Asia Pacific (Mumbai)', 'smtp-amazon-ses' ),
	'ap-northeast-2' => __( 'Asia Pacific (Seoul)', 'smtp-amazon-ses' ),
	'ap-southeast-1' => __( 'Asia Pacific (Singapore)', 'smtp-amazon-ses' ),
	'ap-southeast-2' => __( 'Asia Pacific (Sydney)', 'smtp-amazon-ses' ),
	'ap-northeast-1' => __( 'Asia Pacific (Tokyo)', 'smtp-amazon-ses' ),
	'ap-northeast-3' => __( 'Asia Pacific (Osaka)', 'smtp-amazon-ses' ),
	'sa-east-1'      => __( 'South America (São Paulo)', 'smtp-amazon-ses' ),
	'me-south-1'     => __( 'Middle East (Bahrain)', 'smtp-amazon-ses' ),
);

if ( ! empty( $params ) ) {
	if ( ! empty( $settings[ $mailer ] ) ) {
		if ( isset( $settings[ $mailer ]['access_key_id'] ) ) {
			$accessKeyId = $settings[ $mailer ]['access_key_id'];
		}
		if ( isset( $settings[ $mailer ]['secret_access_key'] ) ) {
			$secretAccessKey = $settings[ $mailer ]['secret_access_key'];
		}
		if ( isset( $settings[ $mailer ]['region'] ) ) {
			$region = $settings[ $mailer ]['region'];
		}
	}
}
?>

<div class="yay-smtp-card yay-smtp-mailer-settings" data-mailer="<?php echo esc_attr( $mailer ); ?>" style="display: <?php echo $currentMailer == $mailer ? 'block' : 'none'; ?>">
  <div class="yay-smtp-card-header">
	<div class="yay-smtp-card-title-wrapper">
	  <h3 class="yay-smtp-card-title yay-smtp-card-header-item">
		Amazon SES Settings
		<div class="yay-tooltip doc-setting">
		  <a class="yay-smtp-button" href="https://yaycommerce.gitbook.io/yaysmtp/how-to-set-up-smtps/how-to-connect-amazon-ses/" target="_blank">
		  <svg viewBox="64 64 896 896" data-icon="book" width="15" height="15" fill="currentColor" aria-hidden="true" focusable="false" class=""><path d="M832 64H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V96c0-17.7-14.3-32-32-32zm-260 72h96v209.9L621.5 312 572 347.4V136zm220 752H232V136h280v296.9c0 3.3 1 6.6 3 9.3a15.9 15.9 0 0 0 22.3 3.7l83.8-59.9 81.4 59.4c2.7 2 6 3.1 9.4 3.1 8.8 0 16-7.2 16-16V136h64v752z"></path></svg>
		  </a>
		  <span class="yay-tooltiptext yay-tooltip-bottom">Amazon SES Documentation</span>
		</div>
	  </h3>
	  <h3 class="yay-smtp-card-description yay-smtp-card-header-item">
		Amazon Simple Email Service enables you to send and receive email using a reliable and scalable email platform.
	  </h3>
	</div>
  </div>
  <div class="yay-smtp-card-body">
  <div class="setting-el">
	  <div class="setting-label">
		<label for="yay_smtp_setting_amazon_ses_region">Region</label>
	  </div>
	  <div class="setting-field">
		<select data-setting="region" class="yay-settings" id="yay_smtp_setting_amazon_ses_region">
		  <?php
			foreach ( $regionArr as $val => $text ) {
				$selected = '';
				if ( $val === $region ) {
					$selected = 'selected';
				}
				echo '<option value="' . esc_attr( $val ) . '" ' . esc_attr( $selected ) . '>' . esc_attr( $text ) . '</option>';
			}
			?>
		</select>
	  </div>
	</div>
	<div class="setting-el">
	  <div class="setting-label">
		<label for="yay_smtp_setting_amazon_ses_access_key_id">Access Key ID</label>
	  </div>
	  <div class="setting-field">
		<input type="text" data-setting="access_key_id" id="yay_smtp_setting_amazon_ses_access_key_id" class="yay-settings" value="<?php echo esc_attr( $accessKeyId ); ?>">
		<p class="setting-description">
		  Click here to
		  <a href="https://console.aws.amazon.com/iam/home?region=us-east-1#/security_credentials" target="_blank" rel="noopener noreferrer">Get Access Key ID</a>
		</p>
	  </div>
	</div>
	<div class="setting-el">
	  <div class="setting-label">
		<label for="yay_smtp_setting_amazon_ses_secret_access_key">Secret Access Key</label>
	  </div>
	  <div class="setting-field">
		<input data-setting="secret_access_key" type="password" spellcheck="false" id="yay_smtp_setting_amazon_ses_secret_access_key" class="yay-settings" value="<?php echo esc_attr( $secretAccessKey ); ?>">
		<p class="setting-description">
		  Click here to
		  <a href="https://console.aws.amazon.com/iam/home?region=us-east-1#/security_credentials" target="_blank" rel="noopener noreferrer">Get Secret Access Key</a>
		</p>
	  </div>
	</div>
  </div>
</div>
