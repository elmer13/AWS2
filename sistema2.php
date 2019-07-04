<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de votación Me gusta o No me gusta con PHP, Jquery y Ajax</title>

<style type="text/css">
.contenedor{width:600px;margin-right:auto;margin-left:auto;font-family:Georgia;font-size:13px;line-height:135%}
h3{color: #979797;border-bottom: 1px dotted #DDD;font-size:21px;padding:0 0 10px 0;clear:both}

/*voting style */
.votos {float:right;width:138px;margin:0 0 10px 40px;border:2px solid #eee;padding:10px;list-style:none;}

.votos .dw_button {background: url(img/votos.png) -64px 0 no-repeat;float: left;height: 42px;width: 64px;cursor:pointer;margin:0 0 0 10px}
.votos .dw_button:hover {background: url(img/votos.png) no-repeat -64px -42px;}

.votos .up_button {background: url(img/votos.png) 0 0 no-repeat;float: left;height: 42px;width: 64px;cursor:pointer;}
.votos .up_button:hover{background: url(img/votos.png) no-repeat 0 -42px;}

.voting_btn{float:left;}
.voting_btn span{font-size: 11px;font-family:Arial,sans-serif;margin:10px 0 0 37px;display:block;width:27px;height:22px;line-height:22px;text-align:center}

.likes_votado{background: url(img/votos.png) no-repeat 0 -42px !important;}
.hates_votado{background: url(img/votos.png) no-repeat -64px -42px !important;}

</style>
</head>

<body>
<div class="contenedor">
	<?php
require_once('Connections/conexion.php'); 
						mysql_select_db($database_conexion, $conexion);
						$query_DatosListado = "SELECT * FROM estado ORDER BY id DESC"; 
						$DatosListado= mysql_query($query_DatosListado,$conexion) or die (mysql_error());
						
	if ($row_DatosListado = mysql_fetch_assoc($DatosListado)){
	do{
		?>
		<h3><?php echo ($row_DatosListado["titulo"]); ?></h3>
		<ul class="votos">
			<li class="voting_btn up_button" data-voto="likes" data-id="<?php echo $row_DatosListado["id"]; ?>"><span><?php echo $row_DatosListado["likes"]; ?></span></li>
			<li class="voting_btn dw_button" data-voto="hates" data-id="<?php echo $row_DatosListado["id"]; ?>"><span><?php echo $row_DatosListado["hates"]; ?></span></li>
		</ul>
		<p><?php echo utf8_encode($row_DatosListado["resumen"]); ?></p>
		<?php
		}while($row_DatosListado = mysql_fetch_assoc($DatosListado));
		
	}else{
		echo "<h3>No hay entradas disponibles.</h3>";
	}
	?>
</div>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
	$(".votos .voting_btn").click(function (e) 
	{
	 	e.preventDefault();
		var voto_hecho = $(this).data('voto');
		var id = $(this).data("id"); 
		var li = $(this);
		
		if(voto_hecho && id){
			$.post('sistema.php', {'id':id, 'voto':voto_hecho}, function(data) 
			{
				if (data=="voto_duplicado") {
					li.closest("ul").append("<span class='votado'>Gracias!</span>");
				
				}else{ 
					li.addClass(voto_hecho+"_votado").find("span").text(data);
					li.closest("ul").append("<span class='votado'>Gracias por votar!</span>");
				}
			});
			setTimeout(function() {$('.votado').fadeOut('fast');}, 3000);
		}
	});
});
</script>

</body>
</html>
