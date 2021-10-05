<?php 

    //Obtiene la IP del cliente
        $ipaddress = '';

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            $ipaddress = $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            $ipaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            $ipaddress = $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            $ipaddress = $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            $ipaddress = $_SERVER["HTTP_FORWARDED"];

        }else{

            $ipaddress = $_SERVER["REMOTE_ADDR"];

        }

    $datos = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=".$ipaddress));

    $pais = "";

    if( $datos["geoplugin_countryName"] == "España"){

        $pais = $datos["geoplugin_countryName"];

    }else if($datos["geoplugin_countryName"] == "Peru"){

        $pais = $datos["geoplugin_countryName"];

    }else if($datos["geoplugin_countryName"] == "Mexico"){

        $pais = $datos["geoplugin_countryName"];

    }

    include('header.php');

?>


	<title>Gracias</title>

<?php include('container.php');?>

	<div class="container">		
        <div class="row">
            <div class="col col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <h1> ¡ Muchas gracias por registrarte !</h1>
                <p> DESDE: <?=$pais?></p>
            </div>
        </div>	
		
			
	</div>

	
<?php include('footer.php');?> 