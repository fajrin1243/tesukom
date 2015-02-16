<div class="container signin">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading"> <strong class="">LOGIN</strong>

			</div>
			<div class="panel-body">

				<?php 
				echo form_open('login/validate',array('class'=>'form-signin'));
				echo div_open('form-group');
				echo div_open('input-group');
				echo div_open('input-group-addon');
				echo "<i class='fa fa-user'></i>";
				echo div_close();
				echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>'Enter your username'));
				echo div_close();
				echo div_close();
				echo div_open('form-group');
				echo div_open('input-group');
				echo div_open('input-group-addon');
				echo "<i class='fa fa-lock'></i>";
				echo div_close();
				echo form_password(array('type'=>'password','name'=>'password','class'=>'form-control','placeholder'=>'Enter your password'));
				echo div_close();
				echo div_close();
				echo div_open('form-group');
				echo form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary','content'=>'Login'));
				echo div_close();
				echo form_close();
				?>
			</div>
		</div>
	</div>