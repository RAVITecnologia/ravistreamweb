<?php

    

?>
<html>
    
    <head>
        
        <meta charset="UTF-8">
        
        <title>RAVI STREAM #1 e #2 - FORMULÁRIO WEB PHP & MySQL</title>
        
        <script type="text/javascript" src="assets/fw/jquery/jquery.js"></script>
        <script type="text/javascript" src="assets/fw/bs/js/bootstrap.js"></script>
        
        <link rel="stylesheet" href="assets/fw/bs/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/global.css" type="text/css" />
        
    </head>
    
    <body>
        
        <center><h1>RAVI STREAM #1 e #2 - FORMULÁRIO WEB PHP & MySQL</h1></center>
        
        <form id="formcontato" action="assets/php/db/contato.php" method="post">
            
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nomecontato" placeholder="Insira seu nome" class="form-control" />
            </div>
            
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="emailcontato" placeholder="Insira seu e-mail" class="form-control" />
            </div>
            
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefonecontato" placeholder="Insira seu telefone" class="form-control" />
            </div>
            
            <div class="form-group">
                <label>UF</label>
                <select name="ufcontato" class="form-control">
                    <option value="estado">Selecione o Estado</option> 
                    <option value="ac">Acre</option> 
                    <option value="al">Alagoas</option> 
                    <option value="am">Amazonas</option> 
                    <option value="ap">Amapá</option> 
                    <option value="ba">Bahia</option> 
                    <option value="ce">Ceará</option> 
                    <option value="df">Distrito Federal</option> 
                    <option value="es">Espírito Santo</option> 
                    <option value="go">Goiás</option> 
                    <option value="ma">Maranhão</option> 
                    <option value="mt">Mato Grosso</option> 
                    <option value="ms">Mato Grosso do Sul</option> 
                    <option value="mg">Minas Gerais</option> 
                    <option value="pa">Pará</option> 
                    <option value="pb">Paraíba</option> 
                    <option value="pr">Paraná</option> 
                    <option value="pe">Pernambuco</option> 
                    <option value="pi">Piauí</option> 
                    <option value="rj">Rio de Janeiro</option> 
                    <option value="rn">Rio Grande do Norte</option> 
                    <option value="ro">Rondônia</option> 
                    <option value="rs">Rio Grande do Sul</option> 
                    <option value="rr">Roraima</option> 
                    <option value="sc">Santa Catarina</option> 
                    <option value="se">Sergipe</option> 
                    <option value="sp">São Paulo</option> 
                    <option value="to">Tocantins</option> 
                </select>
            </div>
            
            <div class="form-group">
                <label>Assunto</label>
                <input type="text" name="assuntocontato" placeholder="Insira seu assunto" class="form-control" />
            </div>
            
            <div class="form-group">
                <label>Mensagem</label>
                <textarea name="mensagemcontato" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label><input type="checkbox" name="flagemailcontato" value="1" /> Deseja receber e-mails do site?</label>
            </div>
            
            <button type="submit" class="btn btn-default">Enviar</button>
            
        </form>
        
        <hr>
        
    </body>
    
</html>
    