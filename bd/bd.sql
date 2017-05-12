create table tipo_usuario(
	pk_tipo_usuario		 smallint auto_increment primary key not null,
	tipo 				varchar(30) not null
)

create table sucursal(
	pk_sucursal 		smallint auto_increment primary key not null,
	sucursal 			varchar(40) not null
)
create table usuario(
	pk_usuario  		smallint auto_increment primary key not null,
	nombre      		varchar(40) not null,
	apellidop   		varchar(40) not null,
	apellidom  			varchar(40) not null,
	user				varchar(30) not null,
	pass    			varchar(60)	not null,
	fk_tipo_usuario		smallint 	not null,
	fk_sucursal 		smallint 	not null,
	foreign key (fk_tipo_usuario) 	references tipo_usuario (pk_tipo_usuario),
	foreign key (fk_sucursal) 		references sucursal (pk_sucursal)
)
create table tipo_proveedor (
	pk_tipo_proveedor 	smallint auto_increment primary key not null,
	tipo_proveedor 		varchar(50) not null
)

create table proveedor (
	pk_proveedor 		smallint auto_increment primary key not null,
	rfc 				varchar(13) not null,
	nombre 				varchar(40) not null,
	apellidop 			varchar(40) not null,
	apellidom 			varchar(40) not null,
	calle 				varchar(50) not null,
	numero				integer 	not null,	
	colonia				varchar (50) not null,
	localidad			varchar(50) not null,
	municipio 			varchar(50) not null,
	telefono			bigint		not null,
	fecha_registro		date	 	not null,	
	correo_electronico 	varchar(50) not null,
	fk_tipo_proveedor	smallint 	not null,
	status				varchar(30) not null,
	foreign key (fk_tipo_proveedor)	references tipo_proveedor(pk_tipo_proveedor)
)

create table catalogo (
	pk_nombre_producto 	varchar(80) primary key not null,
	descripcion 		varchar(80),
	costo_compra		float(2) 	not null,
	costo_venta 		float(2) 	not null
)
create table almacen (
	pk_almacen 			smallint 	auto_increment primary key not null,
	fk_sucursal			smallint 	not null,
	fk_nombre_producto	varchar(80)	not null,
	cantidad_existencia	integer		not null,
	fk_proveedor 		smallint 	not null,
	fecha_entrada		date		not null,
	foreign key (fk_sucursal) 			references sucursal(pk_sucursal),
	foreign key (fk_nombre_producto) 	references catalogo(pk_nombre_producto),
	foreign key (fk_proveedor) 			references proveedor(pk_proveedor),
)

create table compra_proveedor(
	pk_compra 			smallint auto_increment primary key not null,
	no_factura			varchar (50)not null,
	fk_proveedor 		smallint 	not null,
	fk_usuario 			smallint 	not null,
	fk_nombre_producto 	varchar (80)not null,
	cantidad  			integer		not null,
	costo_compra		float(2)	not null,
	fecha_compra		date		not null,	
	foreign key (fk_proveedor) 		references proveedor (pk_proveedor),
	foreign key (fk_usuario) 		references usuario (pk_usuario),
	foreign key (fk_nombre_producto) references catalogo (pk_nombre_producto)
)
create table productor (
	pk_productor 		smallint auto_increment primary key not null,
	rfc 				varchar (13) not null,
	nombre 				varchar (40) not null,
	apellidop			varchar (40) not null,
	apellidom			varchar (40) not null,
	calle 				varchar (40) not null,
	numero 				integer 	 not null,
	colonia				varchar (50) not null,
	localidad 			varchar (50) not null,
	telefono 			bigint 		 not null
)

create table entrega (
	folio				smallint auto_increment primary key not null,
	fk_usuario 			smallint 	not null,
	fk_productor		smallint 	not null,
	total_vendido		float(2) 	not null,
	fecha_venta 		date 	 	not null,
	status				varchar (20)not null,
	foreign key (fk_usuario)	references usuario (pk_usuario),
	foreign key (fk_productor)	references productor(pk_productor)
)

create table carrito (
	pk_carrito 			smallint auto_increment primary key not null,
	fk_venta 			smallint 	not null,
	fk_nombre_producto 	varchar(80) not null,
	cantidad 			integer 	not null,
	costo_sugerido		float(2) 	not null,
	subtotal			float(2)	not null,
	foreign key (fk_venta) 		references entrega (folio),
	foreign key (fk_nombre_producto) references catalogo(pk_nombre_producto)
)

create table cantidad_asignada(
	pk_cantidad_asignada smallint auto_increment primary key not null,
	fk_productor 		smallint not null,
	fk_usuario 			smallint not null,
	cantidad 			float(2) not null,
	fecha 				date,
	foreign key (fk_productor)	references productor (pk_productor),
	foreign key (fk_usuario)	references usuario (pk_usuario)

)

create table gastos (
	pk_gasto 			smallint auto_increment primary key not null,
	folio_factura		varchar(60) ,
	empresa				varchar(59) not null,
	concepto			text     not null,
	total 				float(2) not null,
	observaciones		text,
	status				varchar(30) not null,
	fecha_gasto			date 	
)