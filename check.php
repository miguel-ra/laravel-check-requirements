<?php
extension_check(array( 
	'openssl',
	'pdo', 
	'pdo_mysql', 
	'mbstring', 
	'tokenizer'
));

function extension_check($extensions) {
	$fail = '';
	$pass = '';
	
	if(version_compare(phpversion(), '5.5.9', '<')) {
		$fail .= '<li>You need<strong> PHP 5.5.9</strong> (or greater)</li>';
	}
	else {
		$pass .='<li>You have<strong> PHP 5.5.9</strong> (or greater)</li>';
	}

	foreach($extensions as $extension) {
		if(!extension_loaded($extension)) {
			$fail .= '<li> You are missing the <strong>'.$extension.'</strong> extension</li>';
		}
		else{	$pass .= '<li>You have the <strong>'.$extension.'</strong> extension</li>';
		}
	}
	
	if($fail) {
		echo '<p><strong>Your server does not meet the following requirements in order to install Laravel.</strong>';
		echo '<br>The following requirements failed, please contact your hosting provider in order to receive assistance with meeting the system requirements for Laravel:';
		echo '<ul>'.$fail.'</ul></p>';
		echo 'The following requirements were successfully met:';
		echo '<ul>'.$pass.'</ul>';
	} else {
		echo '<p><strong>Congratulations!</strong> Your server meets the requirements for Laravel.</p>';
		echo '<ul>'.$pass.'</ul>';

	}
}

?>
Install command: composer create-project laravel/laravel --prefer-dist ./ <br>
<small>
	<p>* Remember have mod_rewrite enabled and give permissions on folders (storage and bootstrap/cache)<br>
	chmod -R 777 bootstrap/cache; chmod -R 777 storage</p>
</small>
