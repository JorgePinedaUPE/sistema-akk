<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKK</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="#">Inicio</a>
            <a href="#nosotros">Acerca de</a>
            <a href="#portafolio">Portafolio</a>
            <a href="#clientes">Clientes</a>
            <a href="#servicios">Servicios</a>
            <a href="#contacto">Contacto</a>
            <a href="{{ route('login') }}">Log in</a>
        </nav>
        <section class="textos-header">
            <img src="img/LogoPNG.png">
            <h1>Aire Kanan Kuxtal S.A. de C.V.</h1>
            <h2>Empresa 100% Mexicana</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros" name="nosotros" id="nosotros">
            <h2 class="titulo">Nosotros</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span></h3>
                    <p>Misión: Estamos comprometidos con la sociedad y su calidad de vida, buscamos permanentemente el equilibrio entre la necesidad, la tecnología, la seguridad y el ambiente. Para satisfacer las necesidad de los clientes con soluciones integrales en materia ambiental y de protección civil, que sean económicamente viables, socialmente aceptables, ambientalmente adecuadas y seguras para la población dentro del marco ambiental aplicable.
                    </p>
                    <h3><span>2</span></h3>
                    <p>Visión: Ser una empresa líder en el campo vanguardista, social y ambientalmente responsables y seguros, por su contribución a la minimización del impacto ambiental, el uso eficiente de los recursos naturales, el manejo integral de los residuos y la seguridad de la población, encaminada al desarrollo sustentable del país.
                    </p>
                    <h3><span>3</span></h3>
                    <p>Valores: 
                        Compromiso
                        Imparcialidad
                        Profesionalismo
                        Responsabilidad
                    </p>
                    <h3><span>4</span></h3>
                    <p>Aire Kanan Kuxtal S.A. de C.V. Es una empresa 100% Mexicana, creada en la ciudad de Cuernavaca Morelos en 2008, comprometida con el desarrollo de la sociedad y la protección ambiental, actualmente basada en principios alineados a la Agenda 2030 y los 17 Objetivos del Desarrollo Sostenible, éticos y de responsabilidad ambiental; Buscamos apoyar a las personas, instituciones, industrias y empresas a través de asesorías, capacitación y elaboración de proyectos sustentables y regulación con el marco legal ambiental, proyectos de educación ambiental y sustentables y con ello dar valor agregado a su producto o servicio.
                    </p>
                    <p>Ubicada en Cuernavaca Morelos. Con RFC AKK080718AZA y representada por la M. en I. Valeria Dávila Solano como Directora General; dentro del equipo se encuentran personal con experiencia y compromiso con perfiles de Maestros en Ingeniería Ambiental, Biólogos, Ing. en Tecnología Ambiental, Ing. en Sistemas Ambientales, Ing. Químicos, Ing. Industriales, Ing. En Tecnologías de la Información, Técnicos en Urgencia Médica, Expertos en Sistemas de Gestión Integrados de Calidad, Ambiental y Salud Ocupacional y Auditores en Calidad, Ambiental y Salud Ocupacional.</p> 
                </div>
            </div>
        </section>
        <section class="portafolio" name="portafolio" id="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Portafolio</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="img/img1.jpeg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img2.jpeg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img3.jpeg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img4.jpeg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img5.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img6.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img7.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img8.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor" name="clientes" id="clientes">
            <h2 class="titulo">Nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="img/cliente1.png" alt="">
                    <div class="contenido-texto-card">
                        <h4>Cementos Moctezuma</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid, illo!</p>
                    </div>
                </div>
                    <div class="card">
                        <img src="img/cliente1.png" alt="">
                        <div class="contenido-texto-card">
                            <h4>Cementos Moctezuma</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid, illo!</p>
                        </div>
                    </div>  
                </div>  
        </section>
        <section class="about-service" name="servicios" id="servicios">
            <div class="contenedor">
                <h2 class="titulo">Nuestros servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="img/servicio1.jpg" alt="">
                        <h3>Auditorias ambientales</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, ipsa?</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/servicio2.png" alt="">
                        <h3>Manejo integral de residuos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, ipsa?</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/servicio3.jpeg" alt="">
                        <h3>Talleres y cursos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, ipsa?</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer" name="contacto" id="contacto">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>7771554994</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>airekanankuxtal@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>Cuernavaca, Morelos</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; TonaDS | Jorge Tonatiuh</h2>
    </footer>
</body>
</html>
