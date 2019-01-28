create table usuarios(
  username varchar(10) primary key,
  nombre varchar(20) not null,
  password varchar(20) not null
);


create table ingredientes(
  nombre varchar(10) primary key,
  tipo varchar(10) not null
);

create table pizzas(
  id varchar(10) primary key,
  nombre varchar(20) not null,
  precio int(5) not null
);

create table ingredientes_x_pizzas(
  pizza varchar(10) not null,
  foreign key (pizza) references pizzas(id),
  ingrediente varchar(10) not null,
  foreign key (ingrediente) references ingredientes(nombre),
  primary key (pizza,ingrediente)
);

create table ordenes(
  id varchar(10) primary key,
  fecha varchar(10) not null,
  cliente varchar(10) not null,
  foreign key (cliente) references usuarios(username)
);

create table pizzas_x_orden(
  orden varchar(10) not null,
  foreign key (orden) references ordenes(id),
  pizza varchar(10) not null,
  foreign key(pizza) references pizzas(id),
  masa varchar(10) not null,
  primary key (orden,pizza),
  cantidad int not null
);

create table tipos_masa(
 masa varchar(10) primary key
);


