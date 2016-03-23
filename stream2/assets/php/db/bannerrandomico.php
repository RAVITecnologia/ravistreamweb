<?php

	include 'config.php';

	function bannerrandomico_insert($dados)
	{
		return mysql_query(
		'
		INSERT INTO
			banners(legendabanner)
		VALUES
			("'.$dados['legendabanner'].'")
		');
		
	}
	
	function bannerrandomico_update($dados)
	{
		return mysql_query(
		'
		UPDATE
			banners
		SET
			legendabanner = "'.$dados['legendabanner'].'"
		
		WHERE
			idbanner = '.$dados['idbanner'].'
		');
	}
	
	function bannerrandomico_select()
	{
		$banners = array();
		
		$q = mysql_query(
		'
		SELECT
			*
		FROM
			banners
		WHERE
			flagativo = 1
		');
		
		if(mysql_num_rows($q) > 0)
		{
			while($f = mysql_fetch_array($q))
			{
				$banners[] = $f;
			}
		}
		
		return $banners;
	}

?>