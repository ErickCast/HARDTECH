CREATE DATABASE tiendaHardware;
use tiendaHardware;

CREATE TABLE usuarios(
id int(40) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(150) not null,
email varchar(255) not null,
password varchar(255) not null,
estado varchar(100) not null,
ciudad varchar(100) not null,
domicilio varchar(255) not null, 
fecha date not null,
rol varchar(10) not null,
imagen varchar(255),

CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
id int(40) auto_increment not null,
categoria varchar(100) not null,

CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(NULL, "Computadoras");
INSERT INTO categorias VALUES(NULL, "Accesorios");
INSERT INTO categorias VALUES(NULL, "Almacenamiento");
INSERT INTO categorias VALUES(NULL, "Componentes");

CREATE TABLE subcategorias(
id int(50) auto_increment not null,
categoria_id int(50) not null,
subcategoria varchar(100) not null,

CONSTRAINT pk_subcategorias PRIMARY KEY(id),
CONSTRAINT fk_subcategoria_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

INSERT INTO subcategorias VALUES(NULL, 1, "Escritorio");
INSERT INTO subcategorias VALUES(NULL, 1, "Servidor");
INSERT INTO subcategorias VALUES(NULL, 1, "Tablets");
INSERT INTO subcategorias VALUES(NULL, 1, "Portatiles");
INSERT INTO subcategorias VALUES(NULL, 2, "Mouse");
INSERT INTO subcategorias VALUES(NULL, 2, "Teclado");
INSERT INTO subcategorias VALUES(NULL, 2, "Cables/Adaptadores");
INSERT INTO subcategorias VALUES(NULL, 2, "Sillas");
INSERT INTO subcategorias VALUES(NULL, 2, "Escritorios");
INSERT INTO subcategorias VALUES(NULL, 2, "Fundas");
INSERT INTO subcategorias VALUES(NULL, 2, "Lentes VR");
INSERT INTO subcategorias VALUES(NULL, 3, "Dock HDD");
INSERT INTO subcategorias VALUES(NULL, 3, "Discos Duros Externos");
INSERT INTO subcategorias VALUES(NULL, 3, "Memorias USB");
INSERT INTO subcategorias VALUES(NULL, 3, "Tarjetas de Memoria");
INSERT INTO subcategorias VALUES(NULL, 3, "NAS/RED");
INSERT INTO subcategorias VALUES(NULL, 3, "Enclosure");
INSERT INTO subcategorias VALUES(NULL, 4, "Discos Duros Internos");
INSERT INTO subcategorias VALUES(NULL, 4, "Unidades SSD");
INSERT INTO subcategorias VALUES(NULL, 4, "Memoria RAM");
INSERT INTO subcategorias VALUES(NULL, 4, "Procesadores");
INSERT INTO subcategorias VALUES(NULL, 4, "Tarjetas Madre");
INSERT INTO subcategorias VALUES(NULL, 4, "Fuente de Alimentacion");
INSERT INTO subcategorias VALUES(NULL, 4, "Tarjetas de Video");

CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
subcategoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta int(255) not null,
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

INSERT INTO productos VALUES(NULL, 1, 1, "Laptop HP / Intel Core i3 6006U 2.0GHz / 4GB RAM / 1TB HDD / Windows 10 Home / 14 / 14-BS012LA", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 8799.99, 5, NULL, CURDATE(), "assets/img/laptopi3.jpg");
INSERT INTO productos VALUES(NULL, 1, 1, "Computadora / Intel J1800 / HD Graphics / 2Gb RAM / 160Gb HDD / Ofimatica", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 2257.55, 31, NULL, CURDATE(), "assets/img/INTELJ1800.jpg");
	INSERT INTO productos VALUES(NULL, 1, 1, "Computadora / Intel Celeron J1800 / Intel HD Graphics / 4GB RAM / 250GB HDD", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 4011.86, 126, NULL, CURDATE(), "assets/img/INTELCELERONJ1800.jpg");
	INSERT INTO productos VALUES(NULL, 1, 1, "Computadora Gamer Venus / AMD Ryzen 3 2200G / 8GB RAM / 1TB HDD", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 5505.75, 62, NULL, CURDATE(), "assets/img/AMDRYZEN3_2200.jpg");
	INSERT INTO productos VALUES(NULL, 2, 5, "Mouse Gamer Yeyian Sabre 1001 Retroiluminado / Control DPIs / 3200 DPI / 6 Botones", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 111.16, 4, NULL, CURDATE(), "assets/img/accesorios/SABRE1001.jpg");
	INSERT INTO productos VALUES(NULL, 4, 20, "Memoria RAM DDR2 1GB 800MHz Adata Value 1 Modulo", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 355.65, 15, NULL, CURDATE(), "assets/img/componentes/mrddr2_800mhz.jpg");
	INSERT INTO productos VALUES(NULL, 4, 20, "Memoria RAM SODIMM DDR3 2GB 1333MHz Adata Value 1 Modulo", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 355.90, 40, NULL, CURDATE(), "assets/img/componentes/mrddr3_1333mhz.jpg");
	INSERT INTO productos VALUES(NULL, 4, 20, "Memoria RAM SODIMM DDR3 2GB 1600MHz Adata Value 1 Modulo", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 355.90, 30, NULL, CURDATE(), "assets/img/componentes/mrddr3_1600mhz.jpg");
	INSERT INTO productos VALUES(NULL, 4, 20, "Memoria RAM SODIMM DDR3L 2GB 1600MHz Adata Value 1 Modulo", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 355.90, 31, NULL, CURDATE(), "assets/img/componentes/mrddr3l_1600mhz.jpg");
	INSERT INTO productos VALUES(NULL, 2, 6, "Teclado Gamer Genius Scorpio K215 / Alambrico / Led Varios colores Rainbow", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 271.26, 15, NULL, CURDATE(), "assets/img/accesorios/geniusscorpio.jpg");
		INSERT INTO productos VALUES(NULL, 2, 6, "Teclado Gamer Naceb NA-0912 Retroiluminado / Antighosting / Efecto rainbow", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 191.75, 15, NULL, CURDATE(), "assets/img/accesorios/naceb.jpg");
		INSERT INTO productos VALUES(NULL, 2, 6, "Teclado Gamer Genius Scorpio K215 / Alambrico / Led Varios colores Rainbow", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 271.26, 15, NULL, CURDATE(), "assets/img/accesorios/geniusscorpio.jpg");

		INSERT INTO productos VALUES(NULL, 2, 8, "Silla Gamer Deportiva Xzeal XZ10 Negra - Rojo / ZXSXZ10R", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 2899.00, 2, NULL, CURDATE(), "assets/img/accesorios/xzeal.jpg");
	CREATE TABLE pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
direccion       varchar(255) not null,
coste           float(200,2) not null,
estado          varchar(20) not null,
fecha           date,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;
