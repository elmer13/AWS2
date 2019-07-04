<section id="menu">
    <div class="nav">
        <a href="#" class="nav-mobile" id="nav-mobile"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="sobre-nosotros.php">Sobre Nosotros</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Noticias</a></li>
            <li><a href="#">Entretenimiento</a></li>
		<?php if (isset ($_SESSION['id'])){?>
		<li><div id="item_op"><a href="<?php echo $logoutAction ?>"><img src="<?php echo $urlWeb ?>img/out.png" width="16" height="16" /></a></div></li>
		<?php
		}else{
		?>
		<script type="text/javascript">
		function ver(){
			document.getElementById('iniciar_sesion').style.display='block';
		}
		function cerrar(){
			document.getElementById('iniciar_sesion').style.display='none';
		}
		</script>
		<li><div id="item_op"><a href="<?php echo $urlWeb ?>user/registro.php">Registro</a></div></li>
		<li><div id="item_op"><a onclick="javascript:ver();" style="cursor:pointer">Loguearse</a></div></li>
			<div id="iniciar_sesion">
				<section id="ventana">
			<form id="form-logeo" action="login.php" method="post">
				<table width="311" border="0" align="center">
				<tr>
					<td width="79" align="right">Usuario</td>
					<td width="192"><label for="nombre"></label>
						<input id="login-username" type="text" class="text" name="username" placeholder="Nombre de Usuario" tabindex="1" maxlength="200"></td>
				</tr>
				<tr>
					<td><br>
					</td>
				</tr>
				<tr>
					<td align="right">Password</td>
					<td><label for="password"></label>
						<input id="login-password" type="password" class="text" name="password" placeholder="Contraseña" tabindex="3" maxlength="32"></td>
				</tr>
				<tr>
					<td><br>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="right"><input id="login-submit" type="submit" value="Iniciar Sesión"></td>
				</tr>
				</table></form>
				<a onclick="javascript:cerrar();" style="cursor:pointer">cerrar</a>
				</section>		
		</div>
		<?php
		}
		?>	
		</ul>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function() {

        var btn_movil = $('#nav-mobile'),
            menu = $('#menu').find('ul');

        // Al dar click agregar/quitar clases que permiten el despliegue del menú
        btn_movil.on('click', function (e) {
            e.preventDefault();

            var el = $(this);

            el.toggleClass('nav-active');
            menu.toggleClass('open-menu');
        })

    });
</script>