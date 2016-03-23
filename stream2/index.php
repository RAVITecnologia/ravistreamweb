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
    
    <h2>Banners Cadastrados</h2>
    
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_insert">Inserir novo banner</a>
    
    <!-- Modal -->
    <div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    
     <form id="formbanner" action="assets/php/envio_banner.php" method="post" enctype="multipart/form-data">
     
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Inserção de Banner</h4>
          </div>
          <div class="modal-body" align="left">
          
                <input type="hidden" name="insert" value="" />

                <div class="form-group">
                    <label>Legenda</label>
                    <input type="text" class="form-control" name="legendabanner" />
                </div>
                
                <div class="form-group">
                    <label>Imagem do Banner</label>
                    <input type="file" name="imagembanner" class="form-control" />
                </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Inserir</button>
          </div>
        </div>
      </div>
      
     </form>
     
    </div>
    
    <table class="table" style="width:800px">
    	<thead>
        	<th>ID</th>
            <th>Legenda</th>
            <th>Data de Criação</th>
            <th></th>
        </thead>
        
        <tbody>
        	<?php
            
			foreach($banners as $b)
			{
				echo 
				'
				<tr>
					<td>'.$b['idbanner'].'</td>
					<td>'.$b['legendabanner'].'</td>
					<td>'.$b['datacriacaobanner'].'</td>
					<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_'.$b['idbanner'].'">Alterar</a></td>
				</tr>
				
				<!-- Modal -->
				<div class="modal fade" id="modal_'.$b['idbanner'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				
				 <form id="formbanner" action="assets/php/envio_banner.php" style="width:400px;" method="post" enctype="multipart/form-data">
				 
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Alteração de Banner ID: '.$b['idbanner'].'</h4>
					  </div>
					  <div class="modal-body" align="left">
					  
					  		<input type="hidden" name="update" value="" />
							<input type="hidden" name="idbanner" value="'.$b['idbanner'].'" />
    	
							<div class="form-group">
								<label>Legenda</label>
								<input type="text" class="form-control" name="legendabanner" value="'.$b['legendabanner'].'" />
							</div>
							
							<div class="form-group">
								<label>Imagem do Banner</label>
								<input type="file" name="imagembanner" class="form-control" />
							</div>
							
							<img src="assets/img/banners/'.$b['idbanner'].'.jpg" width="568" />
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-success">Alterar</button>
					  </div>
					</div>
				  </div>
				  
				 </form>
				 
				</div>
				';
			}
			
			?>
        </tbody>
    </table>
    
    <!-- <h2>Envie um banner!</h2>
    
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
        
    </form> -->

	</center>
</body>
</html>