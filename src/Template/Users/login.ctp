<h1>Login</h1>
<?php
	echo $this->Form->create(); 
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->button('Login');
	echo $this->Form->end();
?>
