INSERT INTO CATEGORIAS (CATNOMBRE) VALUES
('Acciones Bancarias/Financieras'),
('Acciones Tecnológicas'),
('Acciones de Consumo Discrecional'),
('Acciones de Energía'),
('Acciones de Salud (Sector Salud)');


INSERT INTO EMPRESAS (SALID, CATID, EMPNOMBRE, EMPVALORUNITARIO, EMPCANTIDADACCIONES, EMPTIPOMONEDA) VALUES
(1, 1, 'JPMorgan Chase', 120.50, 1000000, 'USD'),
(1, 1, 'Bank of America', 25.75, 2000000, 'USD'),
(2, 1, 'Goldman Sachs', 250.10, 1500000, 'USD'),
(2, 2, 'Apple', 130.00, 5000000, 'USD'),
(3, 2, 'Microsoft', 210.45, 3000000, 'USD'),
(3, 2, 'Alphabet (Google)', 2850.75, 1200000, 'USD'),
(4, 2, 'Amazon', 3400.50, 2500000, 'USD'),
(4, 3, 'Nike', 170.00, 1500000, 'USD'),
(5, 3, 'McDonalds', 230.25, 1800000, 'USD'),
(5, 3, 'Tesla', 780.00, 1000000, 'USD'),
(6, 4, 'ExxonMobil', 65.50, 4000000, 'USD'),
(6, 4, 'Chevron', 112.00, 3500000, 'USD'),
(7, 4, 'Shell', 58.50, 3000000, 'USD'),
(7, 5, 'Johnson & Johnson', 160.50, 1200000, 'USD'),
(8, 5, 'Pfizer', 49.75, 2500000, 'USD'),
(8, 5, 'Merck', 70.00, 2300000, 'USD'),
(9, 5, 'UnitedHealth', 500.00, 1000000, 'USD'),
(10, 2, 'Meta (Facebook)', 360.50, 1500000, 'USD'),
(11, 2, 'Nvidia', 620.00, 800000, 'USD');

INSERT INTO NOTICIAS (SALID, NOTDESCRIPCION, NOTSENTIMIENTO) VALUES
(1, 'Autoridades financieras han implementado nuevas regulaciones para garantizar la estabilidad del sistema financiero y proteger los intereses de los clientes.', 1),
(1, 'Más personas han accedido a servicios financieros, facilitando el manejo de sus recursos.', 1),
(2, 'La implementación de nuevas soluciones digitales ha mejorado la eficiencia en transacciones y servicios financieros.', 1),
(2, 'Se descubrió un caso de malversación de fondos que ha generado indignación en la opinión pública.', 0),
(3, 'La falta de transparencia en las prácticas financieras ha provocado un deterioro en la confianza de los clientes.', 0),
(3, 'Se anunció un incremento en las tasas de interés, lo que afectará a los prestatarios y la actividad económica en general.', 0),
(4, 'Agricultores locales han implementado nuevas técnicas de cultivo que han aumentado la productividad y la calidad de las flores, atrayendo la atención de mercados internacionales.', 1),
(5, 'Una granja de cultivo de flores ha obtenido una certificación internacional de sostenibilidad, destacando su compromiso con prácticas agrícolas respetuosas con el medio ambiente y socialmente responsables.', 1),
(6, 'Las exportaciones de flores han alcanzado niveles récord este año, impulsadas por la demanda creciente en mercados internacionales y la calidad superior de los productos cultivados localmente.', 1),
(7, 'Se ha descubierto que una granja de cultivo de flores está contaminando los cursos de agua cercanos con productos químicos utilizados en la agricultura, generando preocupación entre los residentes locales y las autoridades ambientales.', 0),
(8, 'Las ventas de flores han disminuido drásticamente debido a la pandemia y las restricciones de viaje, lo que ha llevado a una crisis financiera en varias granjas y a la pérdida de empleos en la industria.', 0),
(9, 'Varias granjas de cultivo de flores enfrentan una escasez de mano de obra debido a restricciones migratorias y dificultades para contratar trabajadores locales, lo que ha afectado la producción y la calidad de los productos.', 0),
(10, 'Muchas industrias de fabricación de alimentos están invirtiendo en tecnología y procesos de automatización para mejorar la eficiencia y la calidad de sus productos.', 1),
(11, 'El aumento en las exportaciones de sus productos, lo que impulsa el crecimiento económico y aumenta la demanda de empleo en el sector. Esto puede ser resultado de una mayor demanda de alimentos procesados en mercados internacionales o de acuerdos comerciales favorables.', 1),
(12, 'En respuesta a la creciente demanda de alimentos más saludables por parte de los consumidores, muchas industrias están innovando en la creación de productos que sean nutritivos y satisfactorios.', 1),
(13, 'Los escándalos relacionados con la seguridad alimentaria, como la contaminación, pueden tener un impacto negativo en la reputación de las industrias de fabricación de alimentos.', 0),
(14, 'El aumento de los costos de las materias primas, como los granos, la carne y el aceite, puede afectar negativamente la rentabilidad de las industrias de fabricación de alimentos.', 0),
(15, 'Las industrias de fabricación a menudo están sujetas a regulaciones y políticas gubernamentales que pueden cambiar con el tiempo.', 0),
(16, 'Una empresa dedicada a la producción de repostería ha realizado una importante inversión en tecnología de última generación, mejorando la eficiencia de sus procesos.', 1),
(17, 'La empresa ha establecido alianzas estratégicas con productores locales de ingredientes frescos, asegurando la calidad y la sostenibilidad de sus productos, y promoviendo la economía local.', 1);



INSERT INTO SALAS (SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS) VALUES
('Sala 1', 'Sala dedicada a empresas financieras y tecnología.', 10, 150),
('Sala 2', 'Sala dedicada a empresas del sector energético y medioambiental.', 8, 120),
('Sala 3', 'Sala dedicada a empresas de consumo masivo y salud.', 15, 200),
('Sala 4', 'Sala dedicada a empresas tecnológicas y startups.', 20, 250),
('Sala 5', 'Sala destinada a grandes corporaciones de alimentos y bebidas.', 18, 180),
('Sala 6', 'Sala dedicada a instituciones educativas y seminarios.', 5, 60),
('Sala 7', 'Sala especializada en industrias del sector financiero.', 12, 130),
('Sala 8', 'Sala que alberga actividades para empresas tecnológicas y digitales.', 8, 100),
('Sala 9', 'Sala para la discusión de políticas y regulaciones gubernamentales.', 3, 40),
('Sala 10', 'Sala para el desarrollo y asesoramiento en energía renovable.', 10, 110);


INSERT INTO USER (RANID, USENOMBRE, USEAPELLIDO, USEEMAIL, USEPASSWORD, USEROL, USESALDO, USECEDULA) VALUES
(1, 'Nos quedamos en APA', 'Usuario Prueva Normal', 'int@gmail.com', '$2y$10$jN6HivSwHhJokD2QTQ2Ab.pU4.Osgq28fUefUeHIdb0b5wU5jXKnC', 'usuario', 1000.00, '123456789'),
(2, 'ADMINISTRADOR', 'González', 'ADMINISTRADOR@empresa.com', '$2y$10$RyhgOHoIbggzsNFEiAwaIOjoxebtLggvQNB3YJhal8ojRjSaeYxZS', 'admin', 500.00, '987654321'),
(3, 'Luis', 'Pérez', 'luis@empresa.com', 'ghijkl', 'Usuario', 350.00, 'V34567890'),
(4, 'Marta', 'López', 'marta@empresa.com', 'mnopqr', 'Usuario', 1200.00, 'V45678901'),
(5, 'Jorge', 'Hernández', 'jorge@empresa.com', 'stuvwx', 'Administrador', 1500.00, 'V56789012'),
(6, 'Pedro', 'Ramírez', 'pedro@empresa.com', 'yzabcd', 'Usuario', 800.00, 'V67890123'),
(7, 'Raquel', 'Sánchez', 'raquel@empresa.com', 'wxyz12', 'Usuario', 450.00, 'V78901234'),
(8, 'Iván', 'Díaz', 'ivan@empresa.com', '34abcd', 'Administrador', 2000.00, 'V89012345'),
(9, 'Luis', 'Gutiérrez', 'luisg@empresa.com', '567efg', 'Usuario', 700.00, 'V90123456'),
(10, 'Sandra', 'Vega', 'sandra@empresa.com', '89hijk', 'Usuario', 100.00, 'V01234567');
