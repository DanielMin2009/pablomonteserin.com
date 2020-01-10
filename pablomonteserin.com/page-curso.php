
<?php
/**
 * Template Name: cursos Template
 *
 * @package WordPress
 * @subpackage monteserin
 * @since monteserin 1.0
 */
/*
<div class="col_left_curso">

</div><div class="col_right_curso">
    [contact-form-7 id="227" title="Contact form 1"]
</div>
<br><br>


[include file="apuntes/web/html/xhtml/index.php"]
*/
remove_action('genesis_entry_header', 'genesis_do_post_format_image', 4);
remove_action('genesis_entry_header', 'genesis_entry_header_markup_open', 5);
remove_action('genesis_entry_header', 'genesis_entry_header_markup_close', 15);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_header', 'genesis_post_info', 12);

remove_action('genesis_entry_content', 'genesis_do_post_image', 8);
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_content', 'genesis_do_post_content_nav', 12);
remove_action('genesis_entry_content', 'genesis_do_post_permalink', 14);
$m = get_stylesheet_directory_uri();

add_action('wp_enqueue_scripts', 'estilos_cursos', 999);

function estilos_cursos()
{
    wp_register_style('cursos', get_stylesheet_directory_uri()."/css/cursos.css");
    wp_enqueue_style('cursos');
}

/* EL FILTRO


add_action( 'genesis_after_footer', 'add_scripts' );
function add_scripts(){

    echo '<script>


    if (window.attachEvent) {window.attachEvent("onload", inicioHome);}
else if (window.addEventListener) {window.addEventListener("load", inicioHome, false);}
else {document.addEventListener("load", inicioHome, false);}

function inicioHome(){

    var enlaces_filtro = document.querySelectorAll(".filtro a");

    for(i in enlaces_filtro){
        var cursoObjLink = enlaces_filtro[i];
        cursoObjLink.onclick = function(e){
            e.preventDefault();
            e.stopPropagation();
            var filtro = e.target.getAttribute("href");
                        var cursoObjs = document.querySelectorAll(".box");

            if(filtro=="#"){

                    for(var j=0; j<cursoObjs.length; j++){
                        cursoObjs[j].classList.remove("oculta")
                    }

            }else{

                filtro = filtro.substring(1, filtro.length);
                for(var j=0; j<cursoObjs.length; j++){

                    var cursoObj = cursoObjs[j];
                    if(cursoObj.classList.contains(filtro)){
                        cursoObj.classList.remove("oculta")

                    }else{
                        cursoObj.classList.add("oculta")

                    }
                }

            }


        }


    }
}   </script>';

}*/



		

add_action('genesis_entry_content', function () {
    global $m;

    if (!rcp_is_active()) {
        ?>






<!------------------------------------------------>


<div class="banner_monteserin">
	<h1 class="titulo_banner">CURSOS DE PROGRAMACIÓN DE PÁGINAS WEB</h1>
	<p>Accede a <span class="textMasGrande">+850 video tutoriales</span> y ejercicios prácticos de los cursos de <a class="link_banner" href="/curso/html5/">HTML y CSS</a>, <a class="link_banner" href="/curso/javascript-es6">Javascript</a>, <a class="link_banner" href="/curso/jquery/">jQuery</a>, <a class="link_banner" href="/curso/nodejs/">nodeJS</a>, <a class="link_banner" href="/curso/php/">PHP</a>, <a class="link_banner" href="/curso/php-mysql/">PHP y MySQL</a>, <a class="link_banner" href="/curso/wordpress/">Wordpress</a>, <a class="link_banner" href="/curso/java/">Java</a>, <a class="link_banner" href="/curso/java-jdbc/">Java con JDBC</a> y <a class="link_banner" href="/curso/java-servlets/">Servlets</a> que imparto en mis cursos regulares con Certificación Oficial de Profesionalidad. <br>Incluye acceso a <span class="textMasGrande2">email de soporte técnico</span>.</p>



	<!--div class="flex gridLayout">
			

			<div>
				<div class="cajita1">
					<div class="cajita2">
						<img src="<?=$m ?>/images/cursos/html5.svg" alt="curso HTML5 logo" width="100px" height="100px">
					</div>
				</div>
				<h2>HTML</h2>
			</div>

			<div>
				<div class="cajita1">
					<div class="cajita2">
						<img src="<?=$m ?>/images/cursos/html5.svg" alt="curso HTML5 logo" width="100px" height="100px">
					</div>
				</div>
				<h2>Bootstrap 4</h2>
			</div>

			<div>
				<div class="cajita1">
					<div class="cajita2">
						<img src="<?=$m ?>/images/cursos/javascript.svg" alt="curso HTML5 logo" width="100px" height="100px">
					</div>
				</div>
				<h2>Javascript</h2>
			</div>
			
			<div> 
				<div class="cajita1">
					<div class="cajita2">
						<img src="<?=$m ?>/images/cursos/jquery.svg" alt="curso HTML5 logo" width="100px" height="100px">
					</div></div>
					<h2>jQuery</h2>
				</div>
				
				<div> 
					<div class="cajita1">
						<div class="cajita2">
							<img src="<?=$m ?>/images/cursos/nodejs.jpg" alt="curso nodejs logo" width="100px" height="100px">
						</div></div>
						<h2>nodejs</h2>
					</div>
					
					<div> 
						<div class="cajita1">
							<div class="cajita2">
								<img style="position:relative;top:7px" src="<?=$m ?>/images/cursos/php.svg" alt="curso PHP logo" width="100px" height="100px">
							</div></div>
							<h2>PHP</h2>
						</div>
						

						<div> 	<div class="cajita1">
							<div class="cajita2">
								<img src="<?=$m ?>/images/cursos/MySQL.jpg" alt="curso PHP y Mysql logo" width="100px" height="100px">
							</div></div>
							<h2>PHP/MySQL</h2>
						</div>
					
						<div> 	<div class="cajita1">
							<div class="cajita2">
								<img src="<?=$m ?>/images/cursos/wordpress.svg" alt="curso Wordpress logo" width="100px" height="100px">
							</div></div>
							<h2>Wordpress</h2>
						</div>
					
						<div> 	<div class="cajita1">
							<div class="cajita2">
								<img src="<?=$m ?>/images/cursos/unity.jpg" alt="curso unity 3D logo" width="100px" height="100px">
							</div></div>
							<h2>Unity 3D</h2>
						</div>
					
						
						<div> 	<div class="cajita1">
							<div class="cajita2">
								<img src="<?=$m ?>/images/cursos/java.svg" alt="curso java logo" width="100px" height="100px">
							</div></div>
							<h2>Java</h2>
						</div>
						<div> 	<div class="cajita1">
							<div class="cajita2">
								<img src="<?=$m ?>/images/cursos/jdbc.png" alt="curso jdbc logo" width="100px" height="100px">
							</div></div>
							<h2>JDBC</h2>
						</div>
					</div-->


	<div class="boton_banner">
		<a class="wpcf7-form-control" href="https://pablomonteserin.com/registro/">Pruébalo Grátis</a>
	</div>
</div>

<!------------------------------------------------>
<h2 class="titulo1" style="padding-top:70px">¿Por qué suscribirte a mis cursos de programación?</h2>

<h3 class="tit_ppal txt_center" style="padding-top:5px; margin-top:0px; font-size:1rem">Conviértete en un experto en programación web sin pasar miles de horas de investigación</h3>
				<ul class="lista_checks txt_center" style="margin-bottom:50px">
					<li>Amplía los servicios que ofreces a tus clientes.</li>
					<li>Deja de depender de un programador.</li>
					<li>Aprende a pedirle al programador lo que necesitas y rebátele cuando te diga "esto no se puede hacer".</li>
					<li>Completa tu curriculum profesional.</li>
					<li>Aprovecha el tiempo de estudio: videos rápidos, concisos y servicio de soporte mediante aplicación móvil y correo.</li>
					<li>No hay periodos mínimos ni matrícula. Puedes darte de baja en cualquier momento desde tu área de usuario.</li>
					<!--li style="list-style: none"><a href="#cursos_destacados">Más información</a>
					</li-->
				</ul>
<?php
    } ?>
<!------------------------------------------------>
				<!-- ul class="filtro">
					<li><a href="#" data-type="all">Todos</a></li>
					<li><a href="#html_css">HTML y CSS</a></li>
					<li><a href="#js">Javascript</a></li>
					<li><a href="#design">Design</a></li>
					<li><a href="#wordpress">Wordpress y CMS's</a></li>
					<li><a href="#java">Java</a></li>
					<li><a href="#editores">Editores</a></li>
				</ul --> 

<!-- EL BUSCADOR
	div class="buscador">
<input type="text" id="q">
<input type="button" class="monteserin_cta" id="buscar_resultados" value="Buscar">
</div>
<script>
	const search_box = document.querySelector('#q');
	search_box.addEventListener('input', () => {
		search_box.style.backgroundImage = 'none'});

		document.querySelector('#buscar_resultados').addEventListener('click', e => {
			e.stopPropagation();

		const query =  'https://www.googleapis.com/customsearch/v1?key=AIzaSyBzWAlpRzxerR88npOcMYVhrXt_mRGNVzw&cx=007600146550896909595:fiomi7__ati&q='+search_box.value
	//const query2 = query //+ '+site:pablomonteserin.com'
	
	document.querySelector('.resultados_busqueda_wrapper').classList.toggle('visible');
	let codigo = '';
	fetch(query)
	.then(res => res.json())
	.then( res => {
		const resultados = res.items;
		console.log(resultados)
		resultados.forEach( (obj, i) => {
		//	console.log(obj)
			codigo += `<a class="resultado_busqueda" href="${obj.link}""><p class="title">${obj.title}</p><p>${obj.snippet}</p></a>`
		});

		document.querySelector('.lightbox_resultados_busqueda').innerHTML = codigo;

	});

});

window.addEventListener('click', function(e){ 
	const lightbox = document.querySelector('.lightbox_resultados_busqueda'); 
	const black_overlay = document.querySelector('.resultados_busqueda_wrapper');
	if ( !lightbox.contains(e.target)){
		black_overlay.classList.remove('visible');
	}
});
</script> 


<div class="resultados_busqueda_wrapper">
	<div class="lightbox_resultados_busqueda">
		
	</div>
</div-->


<section class="cursos max_width">		
<a class="box html_css" href="/curso/html5/">
	<div class="curso_hover"><p>Si quieres empezar tu aventura en el mundo del desarrollo web, este curso de HTML5 y CSS es el primer paso. </p>
	</div>
	<div> 
		<img src="<?= $m ?>/images/cursos/html5.svg" alt="curso HTML5 logo">
		<h3>Curso de HTML</h3>
		
	</div>
</a
><a class="box html_css" href="/curso/bootstrap-4/">
	<div class="curso_hover"><p>Esta librería CSS desarrollada por Twitter nos permitirá hacer diseños web responsive con acabado profesional en un tiempo record.</p>
	</div>
	<div>

		<img src="<?= $m ?>/images/cursos/bootstrap.svg" alt="Curso Bootstrap Logo">
		<h3>Curso de Bootstrap 4</h3>
		
	</div>
</a
><a class="box js" href="/curso/javascript-es6">
	<div class="curso_hover"><p>Javascript es seguramente el mejor primer lenguaje para aprender a programar, tanto por su sensillez, como por lo extendido que está.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/javascript.svg" alt="Curso Javascript Logo">
		<h3>Curso de Javascript</h3>
		
	</div>
</a
><a class="box js" href="/curso/jquery/">
	<div class="curso_hover"><p>jQuery  ha llegado a convertirse en un estandar de facto en el desarrollo de páginas web. Este curso lleno de ejemplos reales de aplicación.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/jquery.svg" alt="Curso jQuery Logo">
		<h3>Curso de jQuery</h3>
		
	</div>
</a
><a class="box html_css" href="/curso/react/">
	<div class="curso_hover"><p>Gran framework desarrollado por Facebo para el desarrollo de aplicaciones.</p>
	</div>
	<div>

		<img src="<?= $m ?>/images/cursos/react-logo.png" alt="Curso React Logo">
		<h3>Curso de React</h3>
		
	</div>
</a><a class="box js" href="/curso/nodejs/">
		<div class="curso_hover"><p>Podras programar el servidor utilizando Javascript. Veremos como acceder a la base de datos, hacer un chat, aplicaciones en tiempo real... </p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/nodejs.jpg" alt="Curso nodeJS logo">
			<h3>Curso de NodeJS</h3>
			
		</div>
</a><!--a class="box js videojuegos" href="/curso/phaser/">
	<div class="curso_hover"><p>Phaser es la librería de Javascript más extendida para desarrollar videojuegos. Haremos un Flappy Bird, un plataformas, naves espaciales, etc.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/phaser.jpg" alt="Curso Phaser Logo">
		<h3>Curso de Phaser</h3>
		
	</div>
</a
--><a class="box editores" href="/curso/sublime-text/">
	<div class="curso_hover"><p>Utilizo este editor de código habitualmente en mis desarrollos web con HTML, CSS, Javascript, PHP... es super rápido, versátil y potente.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/Sublime_Text_Logo.jpg" alt="Curso Sublime Text Logo">
		<h3>Sublime Text</h3>
		
	</div>
</a><a class="box php_mysql" href="/curso/php/">
	<div class="curso_hover"><p>La inmensa mayoría de las webs utilizan PHP. Desde una página web a medida, pasando por Wordpress, Joomla, Drupal, Prestashop, etc.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/php.svg" alt="Curso PHP Logo">
		<h3>Curso de PHP</h3>
		
	</div>
</a
><a class="box php_mysql" href="/curso/php-mysql/">
	<div class="curso_hover"><p>Integrar una base de datos en nuestros desarrollos PHP nos abrirá una puerta a una nueva dimensión llena de posibilidades.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/MySQL.jpg" alt="Curso MySQL Logo">
		<h3>Curso de PHP y MySQL</h3>
		
	</div>
</a
><a class="box php_mysql" href="/curso/servidor-apache/">
	<div class="curso_hover"><p>Aquí tienes todos los conocimientos sobre servidores que he necesitado tener para poder realizar mis tareas como desarrollador. </p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/apache.jpg" alt="Curso Apache Logo">
		<h3>Curso de Apache</h3>
		
	</div>
</a><a class="box js" href="/curso/unity-3d/">
		<div class="curso_hover"><p>Esta es probablemente la herramienta más extendida para el desarrollo de videojuegos.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/unity.jpg" alt="Curso unity 3d logo">
			<h3>Curso Unity 3D</h3>
			
		</div>
</a><a class="box wordpress" href="/curso/wordpress/">
	<div class="curso_hover"><p>Es el gestor de contenidos más extendido. De hecho, esta página web está hecha con Wordpress.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/wordpress.svg" alt="Logo Curso Wordpress">
		<h3>Curso de Wordpress</h3>
		
	</div>
</a
><a class="box wordpress" href="/curso/wordpress-plugin/">
	<div class="curso_hover"><p>Esta es mi selección personal de plugins para hacer una página con Wordpress.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/plugins-wordpress.jpg" alt="Plugins Wordpresss">
		<h3>Curso de Plugins para Wordpress</h3>
		
	</div>
</a
><a class="box wordpress" href="/curso/wordpress-design/">
	<div class="curso_hover"><p>Aprenderás a crear y modificar plantillas para Wordpress modificando su código fuente.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/wp-design.jpg" alt="Diseño plantillas para Wordpress">
		<h3>Curso de programación de plantillas para Wordpress</h3>
		
	</div>
</a
><a class="box wordpress" href="/curso/genesis-framework/">
	<div class="curso_hover"><p>Estas  son las mejores plantillas para Wordpress si sabes un poco de PHP y CSS.</p>
	</div>
	<div>
		<img src="<?= $m ?>/images/cursos/genesis.jpg" alt="Genesis Framework para Wordpress">
		<h3>Curso de Genesis</h3>
		
	</div>
</a
><a class="box java" href="/curso/java/">
			<div class="curso_hover"><p>Java es un lenguaje de programación multiplataforma usado para desarrollar aplicaciones web, móviles o incluse de escritorio.</p>
	</div>
			<div>

			<img src="<?= $m ?>/images/cursos/java.svg" alt="Curso Java Logo">
			<h3>Curso de Java</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/java-jdbc/">
			<div class="curso_hover"><p>Aprenderemos a conectarnos a una base de datos MySQL utilizando el módulo JDBC.</p>
	</div> 
			<div>

			<img src="<?= $m ?>/images/cursos/jdbc.jpg" alt="Curso Java JDBC Logo">
			<h3>Curso de JDBC</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/java-servlets/">
		<div class="curso_hover"><p>Apache Tomcat nos permitirá desplegar nuestras aplicaciones Java en un servidor web.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/tomcat-logo.jpg" alt="Curso Servlets Tomcat Logo">
			<h3>Curso de Servlets</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/jsp-jstl/">
		<div class="curso_hover"><p>Vamos las tecnologías del lado del cliente para para programar una aplicación web.</p>
	</div> 
		<div>
			<img src="<?= $m ?>/images/cursos/tomcat-logo.jpg" alt="Curso JSP JSTL">
			<h3>Curso de JSP y JSTL</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/java-mvc/">
		<div class="curso_hover"><p>Estructurar nuestras aplicaciones Java utilizando el padigma modelo-vista-controlador, nos permitirá que sean más escalables y entendidas,.</p>
	</div> 
		<div>
			<img src="<?= $m ?>/images/cursos/mvc.jpg" alt="Curso modelo vista controlador con Java">
			<h3>Curso de MVC con Java</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/hibernate-jpa/">
		<div class="curso_hover"><p>Esta librería para desarrollos con Java permite manipular nuestra base de datos como si fuese un objeto, en lugar de escribir sentencias SQL.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/hibernate.svg" alt="Curso Hibernate Logo">
			<h3>Curso de Hibernate y JPA</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/struts-2/">
		<div class="curso_hover"><p>Struts 2 son un conjunto de librerías con las que podremos hacer desarrollos web con Java de forma rápida y efectiva.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/struts2.jpg" alt="Curso Struts 2 Logo">
			<h3>Curso de Struts 2</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/jsf/">
		<div class="curso_hover"><p>JSF es otro framework que nos permite agilizar, estandarizar y permitir la escalabilidad en el dedesarrollo de aplicaciones web con Java. </p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/jsf.jpg" alt="Curso JSF Logo">
			<h3>Curso de JSF</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/jsf-2/">
		<div class="curso_hover"><p>Segunda versión de este framework standard para desarrollo de aplicaciones web.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/jsf.jpg" alt="Curso JSF 2 Logo">
			<h3>Curso de JSF 2</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/spring/">
		<div class="curso_hover"><p>Spring es el framework Java más extendido para el desarrollo de aplicaciones web.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/spring.jpg" alt="Curso Spring Logo">
			<h3>Curso de Spring</h3>
			
		</div>
	</a
	><a class="box java" href="/curso/heroku/">
			<div class="curso_hover"><p>Heroku es una plataforma que nos permitirá subir gratuitamente nuestros desarrollos a internet.</p>
	</div>
			<div>

			<img src="<?= $m ?>/images/cursos/heroku.svg" alt="Curso Java Logo">
			<h3>Heroku</h3>
			
		</div>
	</a><a class="box java" href="/curso/android/">
		<div class="curso_hover"><p>Veremos como usar Java para programar aplicaciones móviles Android.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/android.svg" alt="Curso Android Logo">
			<h3>Curso de Android</h3>
			
		</div>
	</a
	><a class="box design" href="/curso/autocad/">
		<div class="curso_hover"><p>Autocad la herramienta más utilizada en arquitectura para la elaboración de planos técnicos 2D. </p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/autocad.jpg" alt="Curso Autocad Logo">
			<h3>Curso de Autocad 2D</h3>
			
		</div>
	</a><a class="box design" href="/curso/autocad-3d/">
		<div class="curso_hover"><p>Con Autocad también podemos diseñar estructuras arquitectónicas en tres dimensiones. </p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/autocad.jpg" alt="Curso Autocad Logo">
			<h3>Curso Autocad 3D</h3>
			
		</div>
	</a><!--a class="box" href="<?= get_page_link(3983); ?>">
		<div class="curso_hover">
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/coaching.png" alt="Coaching">
			<h3>Coaching</h3>
			<p>Tras años de dar clases, dejo aquí recogidas algunas reflexiones propias y ajenas sobre algunas situaciones que ocurren en el aula, como pienso que se deben enfocar, y los valores y espíritu de superación que un profesor debería tratar de transmitir al alumno. </p>
		</div>
	</a>

	<a href="<?= get_page_link(3985); ?>">
		<div class="curso_hover">
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/Gmail.png" alt="Logo Gmail">
			<h3>Gmail</h3>
			<p>Con este curso de Gmail te muestro como desde la configuración básica del correo hasta como puedes aumentar tu productividad aprovechando las posibilidades que te da este gestor de correo.</p>
		</div>
	</a--><a class="box" href="/curso/usabilidad-accesibilidad/">
		

		<div class="curso_hover"><p>La usabilidad y accesibilidad son el arte de aplicar el sentido común para que todo el mundo pueda usar nuestras páginas teniendo una buena experiencia.</p>
	</div>
		<div>
			<img src="<?= $m ?>/images/cursos/usabilidad-accesibilidad.jpg" alt="usabilidad  y accesibilidad">
			<h3>UX y Accesibilidad</h3>
			
		</div>
	</a></section> 		





<section class="ancho_perfecto" style="padding-top:45px;">
<h2 class="titulo1" style="margin-bottom:40px">¿A quién va dirigido?</h2>
	<p><strong>Diseñadores</strong> que desean adquirir conocimientos de programación y maquetación con código.</p>
	<p>Programadores que ya conocen algún lenguaje de programación pero quieren mejorar su curriculum con nuevas tecnologías.</p>
	<p>En general, personas que desean aprender a manejarse con el código fuente de una web. Iremos desde nivel 0 hasta el nivel que necesitas para trabajar en una empresa.</p>
</section>

<section style="padding: 50px 0 50px 0; text-align: center">
	<h2 class="titulo1" style="margin-bottom:40px">Y para muestra un botón:</h2>

<div class="tres_videos max_width">
<div><img src="<?= $m ?>/images/hola-mundo-html.jpg" alt=""></div>
<div><img src="<?= $m ?>/images/mandar-mail-php.jpg" alt=""></div>
<div><img src="<?= $m ?>/images/ejemplo-sencillo-react.jpg" alt=""></div>
			</div>

			<div class="fondo_gris">
			<div class="video_emergente">	
			<iframe id="video0" width="560" height="315" src="https://www.youtube.com/embed/UZLv9dn26QE" frameborder="0" allowfullscreen></iframe>

<iframe id="video1" width="560" height="315" src="https://www.youtube.com/embed/Smkw2vBizIY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<iframe id="video2" width="560" height="315" src="https://www.youtube.com/embed/N0jrsxYx3ag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
			</div>	
</section>
<script>
const lasTresImg = document.querySelectorAll('.tres_videos img');
const losTresVideos = document.querySelectorAll('.fondo_gris iframe');
lasTresImg.forEach((obj,i) =>{

obj.addEventListener('click', e => {
	e.stopPropagation();
document.querySelector('.fondo_gris').classList.add('visibleFondoGris');
losTresVideos.forEach(obj => {
	obj.style.display = 'none';
});
document.querySelector('#video'+ i).style.display = 'block';
});
});

window.addEventListener('click', function(e){ 
	const lightbox = document.querySelector('.video_emergente'); 
	const black_overlay = document.querySelector('.fondo_gris');
	if (!lightbox.contains(e.target)){
		document.querySelector('.fondo_gris').classList.remove('visibleFondoGris');
		losTresVideos.forEach( obj => {
			stopVideo(obj);
		});
	}
});


var stopVideo = function ( element ) {
		var iframeSrc = element.src;
		element.src = iframeSrc;
};

</script>

<section>

<div class="mobil_zone ancho_perfecto">
	<h2 class="titulo1" style="color: black; margin-bottom: 20px">Más razones para suscribirte a los cursos de programación</h2>
	<h3 class="tit_ppal txt_center" style="padding-top:5px; margin-top:0px; font-size:1rem">Conviértete en un experto en programación web sin pasar miles de horas de investigación</h3>

		<ul class="lista_checks" style="color: black">
			<li>Actualizo los cursos constantemente, mejorando contenidos para lograr la excelencia.</li>
			<li>El CEO de pablomonteserin.com es el mismo tío que hace los videotutoriales y que te va a dar soporte. Todos tienen la misma ilusión y la mismas ganas de hacerlo lo mejor posible. Ninguno piensa que si trabajase en otra empresa podría ganar más trabajando menos. Porque a todos nos mueve la ilusión y el orgullo de hacer las cosas lo mejor posible.</li>
		</ul>
</section>

<p class="max_width">¿Quieres más? <a href="/cursos-tecnologia">En esta otra página puedes consultar más cursos de desarrollo</a>.</p>

<?php
});
/*remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' ); */
genesis();
