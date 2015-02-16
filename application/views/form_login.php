<?php 
 echo form_open('login/validate');
 echo form_input('username', '');
 echo form_password('password', '');
 echo form_submit('submit', 'Login');
 echo form_close();
 ?>