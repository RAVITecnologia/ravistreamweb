<?php

    include 'config.php';
    
    if(isset($_POST))
    {
        $resposta = insert_contato($_POST);
        
        echo $resposta;
    }
    else {
        echo 'Você não preencheu o formulário';
    }
    
    function insert_contato($dados)
    {
        $query = mysql_query('
        INSERT INTO 
            contato(nomecontato, emailcontato, telefonecontato, ufcontato, assuntocontato, mensagemcontato, flagemailcontato)
        VALUES
            ("'.$dados['nomecontato'].'", "'.$dados['emailcontato'].'", "'.$dados['telefonecontato'].'", "'.$dados['ufcontato'].'", "'.$dados['assuntocontato'].'", "'.$dados['mensagemcontato'].'", '.$dados['flagemailcontato'].')');
        
        if($query)
        {
            return 'CARA, DEU TUDO CERTO MANOLO! EH NOIS! RAVI STREAM!';
        }
        else {
            return 'CARA, NAO DEU! TENTA DE NOVO!'.mysql_error();
        }
        
    }

?>