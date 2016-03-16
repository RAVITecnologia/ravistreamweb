<?php

	include 'assets/php/db/bannerrandomico.php';

	$banners = bannerrandomico_select();

?>

<!doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <title>RAVI Stream - Criando Banner Randômico</title>
    
    <script type="text/javascript" src="assets/fw/jquery.min.js"></script>
    <script type="text/javascript" src="assets/fw/bs/js/bootstrap.js"></script>
    
    <link rel="stylesheet" href="assets/fw/bs/css/bootstrap.css" type="text/css" />
    
    <script type="text/javascript">
	
		<?php
		
		if(isset($_GET['m']))
		{
			echo 'alert("'.$_GET['m'].'");';
		}
		
		?>
	
	</script>
    
</head>

<body>

	<center>

	<h1>RAVI Stream - Criando Banner Randômico</h1>
    
    <div id="carousel-example-generic" class="carousel slide" style="width:800px;" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        
        <?php
        
			$c = 0;
			
			foreach($banners as $b)
			{
				$active = $c == 0 ? 'class="active"' : '';
				
				echo '<li data-target="#carousel-example-generic" data-slide-to="'.$c++.'" '.$active.'></li>';
			}
		
		?>
        
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      
      	<?php
        
			$c = 0;
			
			foreach($banners as $b)
			{
				$active = $c == 0 ? 'active' : '';
				
				echo 
				'
				<div class="item '.$active.'">
				  <img src="assets/img/banners/'.$b['idbanner'].'.jpg" />
				  
				  <div class="carousel-caption">
					'.$b['legendabanner'].'
				  </div>
				</div>
				';
				
				$c++;
			}
		
		?>
        
      </div>
    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
    
    <hr>
    
    <h2>Envie um banner!</h2>
    
    <form id="formbanner" action="assets/php/envio_banner.php" style="width:400px;" method="post" enctype="multipart/form-data">
    	
        <div class="form-group">
            <label>Legenda</label>
            <input type="text" class="form-control" name="legendabanner" />
        </div>
        
        <div class="form-group">
            <label>Imagem do Banner</label>
            <input type="file" name="imagembanner" class="form-control" />
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        
    </form>

	</center>
</body>
</html>