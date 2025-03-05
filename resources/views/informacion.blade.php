@extends('layouts.nav')

@section('content')

<link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
<link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
<link rel="stylesheet" href="{{ asset('css/banners.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/ban_categorias.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/video.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/newsletter.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/suscripcion.css') }}">

<section class="bg-gris" style="min-height: 56vh;">
    <div class="row m-0 p-0 d-flex justify-content-center">
        @if ($section == 'politicas')
            <div class="col-11 col-md-10 mb-5 view-politicas">
                <h1 class="text-white fw-bold fs-2 my-5">Política de uso de datos</h1>
                <div class="accordion" id="politicas-privacidad">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            1. Introducción
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                        <p class="fw-normal fs-6">
                            Esta Política de Privacidad explica lo que hacemos con tus datos personales para prestar los servicios ofrecidos en los sitios sasi.cl y sasi.campusvgroup.cl (la “Plataforma”). Esta política también explica los datos que podemos recopilar cuando visitas la Plataforma.
                            De acuerdo con la legislación de datos aplicable, ten en cuenta lo siguiente:
                            <br>
                            <br>
                            La empresa responsable de los datos personales es VGroup SPA., con domicilio fiscal en Avda. Apoquindo 5400, of 101, Las Condes (“Nosotros”). Puedes ponerte en contacto con el representante del Controlador de datos enviando un e-mail a: contacto@vgroup.cl
                            En el caso de que no proporciones la información indicada como obligatoria, es posible que no podamos procesar tu registro de usuario o proporcionarte el uso de algunos Servicios que se encuentran disponibles en la Plataforma.
                            <br>
                            <br>
                            Para poder registrarte y navegar por la Plataforma, es necesario que seas mayor de 16 años. Sasi puede utilizar tu información personal para verificar tu edad y asegurar el cumplimiento de esta restricción.
                        </p>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                            2. Base legal para el procesamiento de los datos personales
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                La recopilación y el procesamiento de tus datos personales se basa principalmente en la condición de “interesado” o “alumno” que tienes con nosotros.
                                Cuando te enviamos mails informativos o cuando utilizamos la dirección de e-mail que nos has proporcionado para ponernos en contacto contigo de forma individual o para reconocerte cuando vuelves a visitar nuestra página web, lo hacemos bajo consentimiento informado.
                                <br>
                                <br>
                                La manera en que procesamos la información recopilada por nuestras cookies se basa en el consentimiento informado que nos has dado, de acuerdo con la legislación vigente.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                            3. Información personal que recopilamos
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Para registrarte en la Plataforma e identificarte, te pediremos tu documento de identidad y tu dirección de e-mail.
                                Para crear tu perfil en la Plataforma, puedes incluir información personal adicional como el país o la ciudad en la que resides, una fotografía, tu nombre y tus apellidos, tu formación, tu experiencia profesional y cualquier otro dato que quieras compartir en tu perfil. La información del perfil te ayuda a aprovechar al máximo nuestros Servicios, como que te puedan encontrar otros profesionales y descubrir oportunidades de negocio o proyectos en los que estés interesado. Sin embargo, si no quieres que esta información sea pública, será suficiente con no rellenar tu perfil o borrar la información que hayas proporcionado.
                                <br>
                                <br>
                                Para comprar o suscribirte a nuestros cursos, lo harás a través de Web Pay en el mismo sitio www.sasi.cl y ellos te pedirán la información de tu tarjeta de crédito o débito, incluidos la fecha de validez y el código CVV. Estos datos serán registrados exclusivamente por la empresa de cobro, no teniendo “nosotros” acceso a ellos. Si solicitas una factura, te pediremos tus datos de facturación si fuera necesario.
                                <br>
                                <br>
                                Cuando visitas o utilizas nuestros Servicios, registramos datos como la frecuencia de uso, la fecha y la hora en las que accedes, cuando ves o haces clic en un contenido específico, tus preferencias de cursos, los proyectos que compartes o el contenido que publicas. Utilizamos esa información cuando inicias sesión y cuando lees nuestros e-mails, y utilizamos las direcciones de protocolos de internet (“IP”) para identificarte y registrar el uso que haces de la Plataforma. No tomamos decisiones en función de los perfiles, más allá de la personalización de la publicidad y para la legítima prevención del fraude en internet.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                            4. Objetivo del procesamiento
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Sasi, como controlador de datos, procesará tus datos personales con los siguientes objetivos: 1. Gestionar tu registro como usuario de la Plataforma, para identificarte y darte acceso a los Servicios que hay disponibles para los usuarios registrados en ella.
                                2. El desarrollo, el cumplimiento y la ejecución del contrato para la provisión de servicios como la venta o suscripción a los cursos de Sasi o de cualquier otro contrato que podamos tener en la Plataforma. Deberás tener en cuenta que:
                                <br>
                                <br>
                                Nos autorizas de manera expresa a procesar los datos requeridos para la activación y el proceso de pago. Los códigos de seguridad de las tarjetas (CVV o CVC) sólo se utilizarán para procesar la compra en curso como parte de tu información de pago y no se almacenarán ni serán procesados con posterioridad. El consentimiento para la activación de este recurso permite que tus datos se rellenen de forma automática en futuras compras, de modo que no tendrás que volver a introducir la información de pago cada vez que realizas una compra. Se entenderá que los datos introducidos serán válidos y estarán actualizados en futuras compras. Podrás modificar o borrar tus tarjetas de crédito o tu cuenta en cualquier momento a través del método de pago del formulario de compra o a través de la configuración del método de pago de tu suscripción a Sasi. Almacenamos y revelamos información de las tarjetas de acuerdo con los estándares de seguridad y confidencialidad internacionales para las tarjetas de crédito y débito. Por razones de seguridad, el uso de este recurso podría requerir cambios en tu contraseña. Recuerda que la seguridad de la Plataforma también depende del correcto uso y almacenamiento de las contraseñas confidenciales.
                                <br>
                                <br>
                                3. Ponernos en contacto contigo por e-mail para actualizarte e informarte sobre recursos, productos o servicios contratados, incluidas las actualizaciones de seguridad de la Plataforma, siempre que sea necesario y razonable.
                                4. Responder a peticiones o consultas que hagas a través de los canales de atención al cliente disponibles en nuestra Plataforma.
                                <br>
                                <br>
                                5. También utilizamos tu información para generar datos globales no identificables. Por ejemplo, para generar estadísticas sobre nuestros usuarios, sus trabajos o áreas de experiencia, el número de impactos o clics en un curso o proyecto determinado, o su demografía.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
                            5. Opciones
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                La provisión del Servicio de Sasi puede conllevar el uso de tus datos personales, para hacerte llegar publicidad personalizada relacionada con nuestros productos y servicios, a través de e-mails u otros medios de comunicación electrónica, enviada por nosotros o por colaboradores externos. Con el objetivo de mejorar nuestros servicios, ten en cuenta que la información personal relacionada con compras, intereses y preferencias puede ser utilizada por Sasi con fines analíticos, caracterización del perfil del usuario, estudios de marketing, encuestas de calidad y para mejorar la interacción con nuestros clientes.
                                <br>
                                <br>
                                Si no deseas recibir algunos tipos de comunicaciones que enviamos por e-mail, accede a la sección “Notificaciones”, en “Editar perfil”, para gestionar tus preferencias.
                                Asimismo, podrás cancelar tus notificaciones siguiendo las instrucciones que aparecen en cada notificación que recibas.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="true" aria-controls="panelsStayOpen-collapseSix">
                            6. Cambios
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Actualizaremos esta Política de Privacidad ocasionalmente y de acuerdo con las modificaciones legales, regulatorias u operativas. Te notificaremos estos cambios (incluida la fecha de vigencia) según las exigencias legales.
                                <br>
                                <br>
                                Publicado el 12 de noviembre de 2020
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($section == 'preguntas')
            <div class="col-11 col-md-10 mb-5 view-preguntas">
                <h1 class="text-white fw-bold fs-2 my-5">Preguntas Frecuentes</h1>
                <div class="accordion" id="politicas-privacidad">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            ¿Qué es Sasi?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                        <p class="fw-normal fs-6">
                            Sasi es la última y más innovadora de las empresas de VGroup. Nace el año 2020 producto de las nuevas tendencias que visualizamos en nuestro entorno en el ámbito de la educación. En Sasi, entregamos a nuestros alumnos, a través de cursos formativos cortos, prácticos y 100% audiovisuales, herramientas para emprender o para mejorar su calidad de vida, aportando así un grano de arena en esta búsqueda de la salud e independencia que muchos desean alcanzar.
                        </p>
                        </div>
                    </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                ¿A qué me da derecho el pago de mi inscripción?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Te da derecho a mirar, aprender y ver cuantas veces quieras las video cápsulas del curso que compraste mientras Sasi exista. También te da derecho a comunicarte con tu profesor/a para resolver dudas y a recibir un certificado digital que acredita tu participación.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                ¿Dónde puedo ver mis cursos?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Tus cursos los puedes ver en cualquier computador, Tablet o dispositivo móvil, sólo necesitas conexión a internet para descargar el material.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                ¿Qué cursos son aptos para mi?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                ¡Cualquiera! Nuestros cursos están diseñados precisamente para que los pueda tomar cualquier persona, no necesitas ser profesional o experto en el tema, ¡sólo se necesitan tus ganas de aprender algo nuevo!
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
                                ¿Tendré cobros posteriores al pago de mi curso?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Por supuesto que no, la inscripción a tu curso la pagas sólo 1 vez.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="true" aria-controls="panelsStayOpen-collapseSix">
                            ¿Qué pasa si no puedo ver el curso?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Nos avisas inmediatamente al correo <a class="fw-bold text-gris" href="mailto:ayuda@sasi.cl">ayuda@sasi.cl</a> y te ayudaremos.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                        <button class="accordion-button fs-6 text-primario bg-gris border-primario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeven">
                                ¿Qué pasa si no me gusta el curso?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                        <div class="accordion-body">
                            <p class="fw-normal fs-6">
                                Nos costaría creerlo, ¡pero lo entendemos! Si eso ocurre, nos avisas al correo <a class="fw-bold text-gris" href="mailto:hola@sasi.cl">hola@sasi.cl</a> nos cuentas porqué no te gustó el curso que tomaste y te devolvemos el 100% de tu inscripción.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($section == 'sobre-sasi')
            <div class="col-11 col-md-10 mb-5 view-preguntas">
                <h1 class="text-primario fs-2 my-5 fw-bold">Sobre Sasi</h1>
                <p class="fw-normal fs-6 text-white ">
                    Sasi es la última y más innovadora de las empresas de VGroup.
                    Nace el año 2020 producto de las nuevas tendencias que visualizamos en nuestro entorno. Tendencias que no surgieron de la prensa o de estudios de compañías especializadas, sino que fueron declaradas por nuestros más de 200.000 alumnos y ex alumnos.
                    <br>
                    <br>
                    Nuestra oferta formativa ha estado siempre vinculada a la capacitación profesional integral de calidad y prestigio, cuya certificación es muchas veces otorgada por nuestros socios educacionales. El 2020 fue un año de muchos cambios para el mundo entero y, por supuesto, también para nuestros alumnos.
                    <br>
                    <br>
                    Es por eso que las solicitudes por nuevos cursos comenzaron a cambiar. Si bien la formación académica especializada es y será siempre valorada y requerida, comenzó a ser cada vez más frecuente la preocupación por la salud, la calidad de vida y el aprendizaje de herramientas concretas que permitiesen a muchos emprender, o comenzar a explorar la comercialización a mayor escala de sus productos o servicios.
                    <br>
                    <br>
                    Es por esta razón que creamos Sasi, para ayudar a través de cursos formativos cortos, prácticos y 100% audiovisuales, a nuestros miles de alumnos que requerían este tipo de herramientas, o bien, para llegar con ellas a un mundo nuevo, abierto y sin restricciones, que nos permita seguir entregando, de la mano de la mejor tecnología y de destacados profesores y expertos, la formación práctica y de calidad que seguiremos construyendo y poniendo a disposición del mundo.
                </p>
            </div>
        @endif
    </div>
</section>

@endsection
@push('scriptsOpcionales')
    <script>
       $accordion-icon-color: #FCDC04;
    </script>
    <script>
        $('#canonical').attr('href', 'https://sasi.cl/informacion');
        $('.tituloSasi').html('Sasi información');
    </script>
@endpush
