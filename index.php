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

    $url = "http://www.geoplugin.net/php.gp?ip=".$ipaddress;

    $datos = unserialize( (file_get_contents( $url ) ) );

    $pais = "";
    $dinero = "";
    $dolar = "USD";

    $dinero = "";

    if( $datos["geoplugin_countryName"] == "España"){

        $pais = $datos["geoplugin_countryName"];
        $dinero = round( (100 * $datos["geoplugin_currencyConverter"]), 2 ). " Euros";

    }else if($datos["geoplugin_countryName"] == "Peru"){

        $pais = $datos["geoplugin_countryName"];
        $dinero = round( (100 * $datos["geoplugin_currencyConverter"]), 2 ) . " Soles";

    }else if($datos["geoplugin_countryName"] == "Mexico" || $datos["geoplugin_countryName"] == "México" ){

        $pais = $datos["geoplugin_countryName"];
        $dinero = round( (100 * $datos["geoplugin_currencyConverter"]), 2 ). " Pesos mexicanos";

    }

    include('header.php');

?>


	<title>Formulario</title>

	<style type="text/css">
	#register_form fieldset:not(:first-of-type) {
		display: none;
	}
	</style>

	<!-- Google Tag Manager -->
    <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MTBLPLC');
    </script>
    <!-- End Google Tag Manager -->

<?php include('container.php');?>

	<!-- Google Tag Manager (noscript) -->
	<noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTBLPLC" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

	<div class="container">		
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div class="alert alert-success hide"></div>
        <div class="row">
            <div class="col col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <?php if ( $dolar != $datos["geoplugin_currencyCode"]) { ?>
                <p style="font-weight: bold;">100 Dolares son en tu país : <?php echo $pais .'  ----  '. $dinero ;?></p>
            <?php } ?>
            </div>
        </div>	
		<form id="register_form" novalidate action="multi_form_action.php"  method="post">	
			
			<fieldset>
				<h2>Paso 1</h2>
				<div class="form-group">
					<label for="nombre">Nombre*</label>
					<input type="text" class="form-control" required id="nombre" name="nombre" placeholder="Ingre su nombre">
				</div>
				
				<input type="button" class="next-form btn btn-info" value="Siguiente" />
			</fieldset>	

			<fieldset>
				<h2> Paso 2</h2>
				<div class="form-group">
					<label for="telefono">Teléfono*</label>
					<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su teléfono">
				</div>

				<input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
				<input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
			</fieldset>
			
			<fieldset>
				<h2>Paso 3</h2>
				<div class="form-group">
					<label for="email">Email*</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Ingre su email">
				</div>
				<div class="row " style="margin-bottom:20px">
                    <div class="col col-xs-12 col-md-12 col-lg-12 col-xl-12">
                       	<a href="#exampleModal" style="text-decoration:none;" data-toggle="modal" data-target="#exampleModal">Políticas de privacidad</a>
                        <input type="checkbox" class="form-checkbox" name="polPrivacidad" id="polPrivacidad" >
                    </div>
                </div>
                <input type="hidden" name="pais" value="<?php $pais ?>">
				<input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
				<input type="submit" name="submit" class="submit btn btn-success" value="Enviar" />
			</fieldset>

		</form>
			
	</div>

	<!-- Cookies -->
            <div class="aviso-cookies" id="aviso-cookies">
                <img class="galleta" src="./img/cookie.svg" alt="Galleta">
                <h3 class="titulo">Cookies</h3>
                <p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
                <button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
                <a class="enlace" href="aviso-cookies.html">Aviso de Cookies</a>
            </div>

            <div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>
        

    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center" >
                            <h5 class="modal-title text-center"  style="width:100%;" id="exampleModalLabel">Políticas de privacidad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p style="text-align: justify;" >El objeto de la Política de Privacidad es poner en conocimiento de los titulares de los Datos Personales,  conforme se define a continuación, respecto de los cuales se está recabando información, los tratamientos específicos de sus datos, las finalidades de los tratamientos, los datos de contacto para ejercer los derechos que le asisten, los plazos de conservación de la información y las medidas de seguridad entre otras cosas. </p>
                        </div>
                        <div class="modal-footer">
                            <div class="row" style="width:100%;">
                                <div class="col col-xs-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	
<?php include('footer.php');?> 