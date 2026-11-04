-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla de categorías
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) UNIQUE NOT NULL,
    color VARCHAR(10)
);

-- Tabla de posts
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT,
    estado ENUM('Publicado', 'Borrador') NOT NULL DEFAULT 'Borrador',
    imagen varchar(150),
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categorias(id) ON DELETE CASCADE
);
-- Datos

-- ==========================================
-- DATOS DE EJEMPLO
-- Proyecto CRUD
-- ==========================================

-- ==========================================
-- 1. USUARIOS
-- Password común: secret0
-- Hash generado con password_hash()
-- PASSWORD_BCRYPT
-- ==========================================

INSERT INTO usuarios (id, email, password) VALUES
(1, 'ana.garcia@example.com', '$2y$12$r7ML27hJw.G1rKNbzjZ9s.RietX0dHvF3RuoXlxy2FweehjGQ..d6'),
(2, 'carlos.lopez@example.com', '$2y$12$r7ML27hJw.G1rKNbzjZ9s.RietX0dHvF3RuoXlxy2FweehjGQ..d6'),
(3, 'laura.martinez@example.com', '$2y$12$r7ML27hJw.G1rKNbzjZ9s.RietX0dHvF3RuoXlxy2FweehjGQ..d6'),
(4, 'david.sanchez@example.com', '$2y$12$r7ML27hJw.G1rKNbzjZ9s.RietX0dHvF3RuoXlxy2FweehjGQ..d6'),
(5, 'marta.ruiz@example.com', '$2y$12$r7ML27hJw.G1rKNbzjZ9s.RietX0dHvF3RuoXlxy2FweehjGQ..d6');


-- ==========================================
-- 2. CATEGORÍAS
-- ==========================================

INSERT INTO categorias (id, nombre, color) VALUES
(1, 'Tecnología', '#6478D3'),
(2, 'Cocina', '#E89B5A'),
(3, 'Viajes', '#48A999'),
(4, 'Educación', '#9675C9'),
(5, 'Salud y bienestar', '#65A982');


-- ==========================================
-- 3. PUBLICACIONES
-- ==========================================

INSERT INTO posts
(titulo, contenido, estado, imagen, user_id, category_id)
VALUES

-- ==========================================
-- TECNOLOGÍA (10 publicaciones)
-- ==========================================

(
'Cómo proteger nuestros datos personales en Internet',
'Cada vez compartimos más información personal a través de Internet. Desde las redes sociales hasta las compras online, nuestros datos están presentes en numerosos servicios. Utilizar contraseñas diferentes, activar la autenticación en dos pasos y revisar los permisos de las aplicaciones son algunas medidas básicas para mejorar nuestra seguridad digital.',
'Publicado', '/imagenes/default.jpg', 1, 1
),
(
'La inteligencia artificial está cambiando nuestra forma de trabajar',
'La inteligencia artificial se ha convertido en una herramienta habitual en muchos sectores profesionales. Permite automatizar tareas repetitivas, analizar grandes cantidades de información y facilitar la toma de decisiones. Sin embargo, también plantea nuevos retos relacionados con la privacidad, la formación y el uso responsable de estas tecnologías.',
'Publicado', '/imagenes/default.jpg', 2, 1
),
(
'Linux: una alternativa para recuperar el control de nuestro ordenador',
'Linux ofrece un sistema operativo flexible, seguro y adaptable a diferentes necesidades. Distribuciones como Ubuntu, Debian o Manjaro permiten utilizar ordenadores antiguos y modernos sin depender necesariamente de software propietario. Además, su comunidad proporciona documentación y herramientas que facilitan el aprendizaje.',
'Publicado', '/imagenes/default.jpg', 3, 1
),
(
'Cinco consejos para mejorar el rendimiento de tu ordenador',
'Un ordenador lento no siempre necesita ser sustituido. Revisar los programas que se ejecutan al iniciar el sistema, mantener actualizado el software, liberar espacio en el disco y comprobar el estado del almacenamiento puede mejorar considerablemente su rendimiento. También conviene revisar la memoria disponible y las temperaturas del equipo.',
'Publicado', '/imagenes/default.jpg', 4, 1
),
(
'Qué es la computación en la nube y para qué sirve',
'La computación en la nube permite utilizar recursos informáticos a través de Internet sin necesidad de mantener toda la infraestructura físicamente. Almacenamiento, servidores, bases de datos y aplicaciones pueden contratarse bajo demanda. Este modelo facilita la escalabilidad y reduce los costes iniciales para empresas y particulares.',
'Publicado', '/imagenes/default.jpg', 5, 1
),
(
'El papel de Docker en el desarrollo de aplicaciones',
'Docker permite empaquetar aplicaciones junto con sus dependencias dentro de contenedores. Esto facilita que un proyecto funcione de manera consistente en diferentes equipos y entornos. Los desarrolladores pueden definir servicios mediante Docker Compose y reproducir fácilmente entornos completos de desarrollo.',
'Borrador', '/imagenes/default.jpg', 1, 1
),
(
'Cómo elegir un buen gestor de contraseñas',
'Recordar decenas de contraseñas diferentes resulta complicado. Los gestores de contraseñas permiten almacenarlas de forma cifrada y generar claves seguras para cada servicio. Antes de elegir uno conviene revisar su reputación, las opciones de recuperación, la sincronización entre dispositivos y las medidas de seguridad que incorpora.',
'Publicado', '/imagenes/default.jpg', 2, 1
),
(
'El futuro de las conexiones Wi-Fi en nuestros hogares',
'Las conexiones inalámbricas evolucionan constantemente para ofrecer mayor velocidad, menor latencia y mejor cobertura. Los estándares Wi-Fi más recientes incorporan mejoras importantes para viviendas con muchos dispositivos conectados. Sin embargo, una buena instalación también depende de la ubicación del router y de la distribución de la vivienda.',
'Borrador', '/imagenes/default.jpg', 3, 1
),
(
'Por qué es importante mantener actualizado nuestro software',
'Las actualizaciones no solo incorporan nuevas funcionalidades. También corrigen errores y solucionan vulnerabilidades que pueden ser aprovechadas por atacantes. Mantener actualizado el sistema operativo, el navegador y las aplicaciones habituales es una de las medidas más sencillas para reducir riesgos informáticos.',
'Publicado', '/imagenes/default.jpg', 4, 1
),
(
'Programación web: por dónde empezar en 2026',
'Aprender desarrollo web requiere combinar conocimientos de diferentes tecnologías. HTML proporciona la estructura de las páginas, CSS permite definir su presentación y JavaScript añade interactividad. Posteriormente, lenguajes de servidor como PHP y sistemas de bases de datos como MariaDB permiten construir aplicaciones web completas.',
'Publicado', '/imagenes/default.jpg', 5, 1
),

-- ==========================================
-- COCINA (10 publicaciones)
-- ==========================================

(
'Cómo preparar una auténtica tortilla de patatas',
'La tortilla de patatas es uno de los platos más representativos de la gastronomía española. Para prepararla necesitamos patatas, huevos, aceite de oliva y sal. Las patatas deben cocinarse lentamente hasta quedar tiernas antes de mezclarlas con los huevos batidos. El último paso consiste en cuajar la mezcla por ambos lados, ajustando el tiempo según prefiramos una tortilla más o menos hecha.',
'Publicado', '/imagenes/default.jpg', 1, 2
),
(
'Receta de lentejas caseras para toda la familia',
'Las lentejas son una excelente fuente de proteínas vegetales, fibra y minerales. Para preparar un guiso tradicional podemos utilizar lentejas, zanahoria, cebolla, ajo, tomate, patata y pimentón. Cocinarlas a fuego lento permite que los ingredientes se integren y que el caldo adquiera una textura espesa y sabrosa.',
'Publicado', '/imagenes/default.jpg', 2, 2
),
(
'El secreto de una buena salsa de tomate casera',
'Una buena salsa de tomate necesita pocos ingredientes y algo de paciencia. Utilizar tomates maduros, aceite de oliva, cebolla y una pizca de sal es suficiente para conseguir un resultado excelente. La cocción lenta ayuda a concentrar los sabores y permite obtener una textura ideal para acompañar pastas, arroces y carnes.',
'Publicado', '/imagenes/default.jpg', 3, 2
),
(
'Cinco desayunos saludables para empezar el día',
'El desayuno puede ser una buena oportunidad para incorporar alimentos nutritivos a nuestra alimentación. Las tostadas integrales con tomate, el yogur natural con fruta, la avena, los frutos secos y los huevos son algunas alternativas sencillas. Lo importante es adaptar las cantidades y los alimentos a nuestras necesidades y preferencias.',
'Publicado', '/imagenes/default.jpg', 4, 2
),
(
'Cómo conseguir que el arroz quede siempre en su punto',
'Preparar un buen arroz requiere controlar la proporción de líquido, la temperatura y el tiempo de cocción. Cada variedad tiene características diferentes, por lo que conviene seguir las indicaciones del fabricante. También es importante evitar removerlo constantemente cuando buscamos una textura suelta y mantener un reposo breve antes de servir.',
'Publicado', '/imagenes/default.jpg', 5, 2
),
(
'Bizcocho de yogur: una receta sencilla y tradicional',
'El bizcocho de yogur es una de las recetas más populares de la repostería casera. Su preparación utiliza como medida el propio recipiente del yogur, lo que facilita calcular las cantidades de harina, azúcar y aceite. Añadir ralladura de limón aporta un aroma especial y hornearlo a temperatura moderada permite conseguir una textura esponjosa.',
'Borrador', '/imagenes/default.jpg', 1, 2
),
(
'La importancia del aceite de oliva en la cocina mediterránea',
'El aceite de oliva virgen extra ocupa un lugar destacado en la alimentación mediterránea. Su aroma y sabor permiten utilizarlo tanto en preparaciones en frío como en diferentes técnicas de cocinado. Además, aporta principalmente grasas monoinsaturadas y compuestos antioxidantes que forman parte de sus características nutricionales.',
'Publicado', '/imagenes/default.jpg', 2, 2
),
(
'Cómo organizar un menú semanal equilibrado',
'Planificar las comidas de la semana permite ahorrar tiempo, reducir el desperdicio alimentario y mejorar la variedad de nuestra dieta. Una buena planificación combina verduras, frutas, legumbres, cereales integrales y fuentes variadas de proteínas. Preparar algunos ingredientes con antelación también facilita mantener estos hábitos durante los días más ocupados.',
'Publicado', '/imagenes/default.jpg', 3, 2
),
(
'Croquetas caseras: cómo conseguir una bechamel cremosa',
'Las croquetas caseras requieren una bechamel bien elaborada y un buen equilibrio entre harina, mantequilla y leche. La mezcla debe cocinarse lentamente para evitar el sabor a harina cruda. Una vez fría y consistente, se forman las croquetas, se pasan por huevo y pan rallado y se fríen hasta conseguir un exterior dorado.',
'Borrador', '/imagenes/default.jpg', 4, 2
),
(
'Productos de temporada: por qué conviene consumirlos',
'Consumir frutas y verduras de temporada permite disfrutar de productos que habitualmente se recolectan en su momento óptimo de maduración. También facilita encontrar alimentos locales y adaptar la cocina a cada estación. Consultar los calendarios de temporada es una buena manera de descubrir nuevos ingredientes.',
'Publicado', '/imagenes/default.jpg', 5, 2
),

-- ==========================================
-- VIAJES (10 publicaciones)
-- ==========================================

(
'Granada: una ciudad donde historia y cultura se encuentran',
'Granada es uno de los destinos más interesantes de Andalucía. La Alhambra, el Albaicín y el Sacromonte permiten descubrir diferentes etapas de su historia. Pasear por sus calles, disfrutar de sus miradores y conocer su gastronomía convierte la visita en una experiencia completa. Es recomendable reservar con antelación la entrada a los monumentos más populares.',
'Publicado', '/imagenes/default.jpg', 1, 3
),
(
'Consejos prácticos para organizar un viaje económico',
'Viajar no tiene por qué ser caro si se planifica con suficiente antelación. Comparar diferentes medios de transporte, reservar alojamiento con tiempo y evitar las temporadas de mayor demanda puede reducir considerablemente el presupuesto. También es interesante investigar las actividades gratuitas que ofrece cada destino.',
'Publicado', '/imagenes/default.jpg', 2, 3
),
(
'Qué ver en Lisboa durante un fin de semana',
'Lisboa es una ciudad perfecta para una escapada de varios días. Sus barrios históricos, los tranvías tradicionales y los miradores ofrecen numerosos lugares que merece la pena conocer. Alfama, Belém y la Baixa son visitas imprescindibles. Tampoco conviene marcharse sin probar los tradicionales pasteles de nata.',
'Publicado', '/imagenes/default.jpg', 3, 3
),
(
'El turismo rural como alternativa a las grandes ciudades',
'El turismo rural permite disfrutar de paisajes naturales, pueblos pequeños y actividades al aire libre. Muchas zonas ofrecen rutas de senderismo, gastronomía tradicional y alojamientos con encanto. Es una alternativa interesante para quienes buscan tranquilidad y desean conocer de cerca las costumbres locales.',
'Publicado', '/imagenes/default.jpg', 4, 3
),
(
'Cómo preparar correctamente una mochila para una excursión',
'Preparar una mochila adecuada es fundamental para disfrutar de una excursión con seguridad. Conviene llevar agua suficiente, comida, ropa adaptada al tiempo, protección solar y un pequeño botiquín. También es recomendable consultar la previsión meteorológica y estudiar previamente el recorrido que vamos a realizar.',
'Publicado', '/imagenes/default.jpg', 5, 3
),
(
'Descubriendo los pueblos blancos de Andalucía',
'Los pueblos blancos de Andalucía destacan por sus casas encaladas, calles estrechas y paisajes montañosos. Localidades como Grazalema, Zahara de la Sierra y Setenil de las Bodegas ofrecen una combinación de patrimonio, naturaleza y gastronomía. Recorrerlos en coche permite descubrir rincones que a menudo pasan desapercibidos.',
'Borrador', '/imagenes/default.jpg', 1, 3
),
(
'Viajar en tren: una forma diferente de descubrir Europa',
'El tren permite recorrer numerosos destinos europeos disfrutando del paisaje y evitando algunos inconvenientes del transporte aéreo. Las conexiones internacionales y los servicios de alta velocidad facilitan organizar itinerarios entre grandes ciudades. Planificar las conexiones y consultar las tarifas con antelación ayuda a conseguir mejores precios.',
'Publicado', '/imagenes/default.jpg', 2, 3
),
(
'Qué llevar en la maleta para unas vacaciones de verano',
'Preparar el equipaje con tiempo evita olvidos y permite viajar con mayor comodidad. Es recomendable elegir prendas versátiles, calzado adecuado y artículos de higiene en formatos de viaje. También debemos tener en cuenta las restricciones de equipaje de la compañía de transporte y las características del destino.',
'Publicado', '/imagenes/default.jpg', 3, 3
),
(
'Senderismo en Sierra Nevada: naturaleza y aventura',
'Sierra Nevada ofrece numerosas posibilidades para disfrutar del senderismo en un entorno natural privilegiado. Sus paisajes cambian considerablemente según la altitud y la estación del año. Antes de realizar cualquier ruta es importante comprobar las condiciones del terreno, llevar el equipamiento adecuado y respetar las indicaciones de seguridad.',
'Publicado', '/imagenes/default.jpg', 4, 3
),
(
'Turismo sostenible: pequeñas decisiones que marcan la diferencia',
'Viajar de manera sostenible implica respetar el entorno natural y cultural de los lugares que visitamos. Elegir alojamientos responsables, utilizar el transporte público cuando sea posible y consumir productos locales son algunas acciones sencillas. El objetivo es disfrutar de los destinos sin perjudicar los recursos de los que dependen sus comunidades.',
'Borrador', '/imagenes/default.jpg', 5, 3
),

-- ==========================================
-- EDUCACIÓN (10 publicaciones)
-- ==========================================

(
'Cómo mejorar nuestros hábitos de estudio',
'Estudiar de manera eficiente no consiste únicamente en dedicar muchas horas a los libros. Organizar el tiempo, establecer objetivos concretos y realizar descansos periódicos ayuda a mantener la concentración. También resulta útil combinar diferentes técnicas de aprendizaje, como los esquemas, los ejercicios prácticos y la recuperación activa de información.',
'Publicado', '/imagenes/default.jpg', 1, 4
),
(
'El aprendizaje basado en proyectos en el aula',
'El aprendizaje basado en proyectos permite que los estudiantes desarrollen conocimientos y competencias mediante la resolución de problemas reales. Esta metodología fomenta la colaboración, la creatividad y la autonomía. El docente actúa como guía durante el proceso y facilita los recursos necesarios para alcanzar los objetivos establecidos.',
'Publicado', '/imagenes/default.jpg', 2, 4
),
(
'La importancia de aprender idiomas en un mundo globalizado',
'Conocer otros idiomas facilita la comunicación entre personas de diferentes culturas y amplía las oportunidades académicas y profesionales. Aprender una lengua requiere constancia y exposición frecuente a situaciones reales de comunicación. Escuchar contenidos originales, leer textos adaptados y practicar la conversación son estrategias muy eficaces.',
'Publicado', '/imagenes/default.jpg', 3, 4
),
(
'Cómo utilizar mapas conceptuales para estudiar mejor',
'Los mapas conceptuales permiten representar visualmente las relaciones entre diferentes conceptos. Su elaboración obliga a identificar las ideas principales, establecer jerarquías y conectar conocimientos. Son especialmente útiles para estudiar materias con abundante contenido teórico y repasar antes de una evaluación.',
'Publicado', '/imagenes/default.jpg', 4, 4
),
(
'La formación profesional y sus oportunidades laborales',
'La Formación Profesional ofrece una vía práctica para adquirir competencias relacionadas con diferentes sectores productivos. Sus ciclos formativos combinan conocimientos teóricos, actividades prácticas y formación en empresas. La evolución del mercado laboral hace que especialidades relacionadas con la informática, la industria y los servicios tengan un papel cada vez más relevante.',
'Publicado', '/imagenes/default.jpg', 5, 4
),
(
'Ventajas de utilizar plataformas educativas digitales',
'Las plataformas educativas permiten organizar materiales, entregar actividades y realizar un seguimiento del progreso académico. Herramientas como Moodle facilitan la comunicación entre docentes y estudiantes y ofrecen diferentes recursos para evaluar el aprendizaje. Su eficacia depende de una planificación pedagógica adecuada y de un uso responsable de la tecnología.',
'Borrador', '/imagenes/default.jpg', 1, 4
),
(
'Cómo desarrollar el pensamiento crítico en los estudiantes',
'El pensamiento crítico permite analizar información, contrastar fuentes y construir opiniones fundamentadas. Para desarrollarlo en el aula es conveniente plantear preguntas abiertas, promover debates y trabajar con diferentes puntos de vista. Estas actividades ayudan a los estudiantes a distinguir entre hechos, interpretaciones y opiniones.',
'Publicado', '/imagenes/default.jpg', 2, 4
),
(
'La lectura diaria como herramienta de aprendizaje',
'Leer de forma habitual mejora la comprensión, amplía el vocabulario y facilita la expresión escrita. No es necesario comenzar con libros extensos: dedicar unos minutos diarios a textos que despierten nuestro interés puede ser suficiente para adquirir el hábito. La constancia es mucho más importante que la cantidad de páginas leídas.',
'Publicado', '/imagenes/default.jpg', 3, 4
),
(
'Programación para principiantes: aprender haciendo',
'La programación se aprende mejor combinando explicaciones con pequeños proyectos prácticos. Comenzar con variables, estructuras condicionales y bucles permite comprender los fundamentos de cualquier lenguaje. A partir de ahí podemos desarrollar aplicaciones sencillas que ayuden a consolidar los conocimientos adquiridos.',
'Publicado', '/imagenes/default.jpg', 4, 4
),
(
'La evaluación formativa y su utilidad en el aprendizaje',
'La evaluación formativa proporciona información continua sobre el proceso de aprendizaje. Permite detectar dificultades, ofrecer retroalimentación y adaptar las actividades a las necesidades del alumnado. Su finalidad principal no es únicamente calificar, sino ayudar a mejorar tanto el aprendizaje como la práctica docente.',
'Borrador', '/imagenes/default.jpg', 5, 4
),

-- ==========================================
-- SALUD Y BIENESTAR (10 publicaciones)
-- ==========================================

(
'La importancia de mantener una buena rutina de sueño',
'Dormir bien es fundamental para el funcionamiento del organismo y el bienestar diario. Mantener horarios regulares, reducir el uso de pantallas antes de acostarse y procurar un ambiente tranquilo puede favorecer el descanso. También conviene evitar las comidas copiosas y las bebidas estimulantes durante las horas previas al sueño.',
'Publicado', '/imagenes/default.jpg', 1, 5
),
(
'Caminar todos los días: un hábito sencillo y saludable',
'Caminar es una actividad física accesible que puede incorporarse fácilmente a la rutina diaria. Realizar paseos de forma habitual contribuye a mejorar la condición cardiovascular y ayuda a mantener un estilo de vida activo. Lo importante es adaptar la intensidad y la duración a nuestra condición física.',
'Publicado', '/imagenes/default.jpg', 2, 5
),
(
'Cómo gestionar el estrés en nuestra vida cotidiana',
'El estrés forma parte de la vida diaria, pero aprender a gestionarlo puede mejorar nuestro bienestar. Organizar las tareas, establecer prioridades y reservar tiempo para actividades agradables son medidas útiles. También pueden ayudar los ejercicios de respiración, la actividad física y mantener relaciones sociales saludables.',
'Publicado', '/imagenes/default.jpg', 3, 5
),
(
'La hidratación y su importancia para el organismo',
'El agua participa en numerosos procesos del organismo, como la regulación de la temperatura y el transporte de nutrientes. Las necesidades de hidratación varían según la actividad física, el clima y las características individuales. Beber agua regularmente y prestar atención a las señales de sed ayuda a mantener una hidratación adecuada.',
'Publicado', '/imagenes/default.jpg', 4, 5
),
(
'Beneficios de incorporar frutas y verduras a nuestra dieta',
'Las frutas y verduras aportan vitaminas, minerales, fibra y diferentes compuestos beneficiosos. Incluir una variedad de colores y tipos de alimentos permite ampliar la diversidad nutricional de nuestra alimentación. Elegir productos frescos y de temporada facilita mantener una dieta variada y equilibrada.',
'Publicado', '/imagenes/default.jpg', 5, 5
),
(
'La importancia de realizar pausas durante el trabajo',
'Pasar muchas horas sentado frente a una pantalla puede provocar cansancio y molestias musculares. Realizar pequeñas pausas para levantarse, caminar y cambiar de postura ayuda a reducir la fatiga. También es recomendable ajustar la altura de la pantalla y utilizar una silla que permita mantener una postura cómoda.',
'Borrador', '/imagenes/default.jpg', 1, 5
),
(
'Mindfulness: aprender a prestar atención al momento presente',
'El mindfulness consiste en prestar atención al momento presente de manera consciente y sin juzgar constantemente nuestras experiencias. Algunas personas utilizan ejercicios de respiración y meditación para practicarlo. Puede ser una herramienta complementaria para desarrollar la atención y mejorar la relación con los pensamientos cotidianos.',
'Publicado', '/imagenes/default.jpg', 2, 5
),
(
'Cómo mantener la motivación para hacer ejercicio',
'Comenzar una actividad física puede resultar sencillo, pero mantenerla en el tiempo requiere planificación. Establecer objetivos realistas, elegir actividades agradables y registrar los pequeños avances puede ayudar a mantener la motivación. También es importante respetar los descansos y evitar comparaciones con otras personas.',
'Publicado', '/imagenes/default.jpg', 3, 5
),
(
'La importancia de cuidar nuestra salud mental',
'La salud mental forma parte del bienestar general y merece la misma atención que la salud física. Mantener relaciones sociales, dedicar tiempo a nuestras aficiones y aprender a reconocer nuestras emociones son aspectos importantes. Cuando las dificultades afectan de forma persistente a la vida cotidiana, buscar ayuda profesional es una decisión adecuada.',
'Publicado', '/imagenes/default.jpg', 4, 5
),
(
'Pequeños hábitos para llevar una vida más activa',
'Incorporar movimiento a nuestra rutina no exige necesariamente acudir a un gimnasio. Subir escaleras, caminar para realizar pequeños desplazamientos o dedicar unos minutos a estiramientos son alternativas sencillas. La clave está en reducir el sedentarismo y encontrar actividades que podamos mantener de manera habitual.',
'Borrador', '/imagenes/default.jpg', 5, 5
);

