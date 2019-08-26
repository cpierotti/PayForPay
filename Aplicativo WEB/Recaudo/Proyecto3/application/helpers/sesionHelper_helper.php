<?php


	function validateLogin($sesion)
	{
		if($sesion)
		{
			return $sesion; 
		}else
		{
			redirect('LoginController/show_error');
		}
    }
 ?>