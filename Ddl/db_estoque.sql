create database db_estoque;

use db_estoque;

create table tb_categoria(
cd_categoria int auto_increment primary key,
nm_categoria varchar(40) not null,
ds_categoria longtext
)engine=InnoDB default charset=utf8;

create table tb_produto(
cd_produto int auto_increment primary key,
nm_produto varchar(80) not null,
ds_produto longtext,
marca_produto varchar(40),
vl_produto decimal,
dt_validade date not null,
qt_produto int not null,
entrada_produto int not null,
saida_produto int not null,
dt_entrada_produto date,
dt_saida_produto date,
peso_produto double,
largura_produto double,
comp_produto double,
altura_produto double,
dt_atualizacao date
)engine=InnoDB default charset=utf8;

create table tb_estoque(
cd_estoque int auto_increment primary key,
qt_total_produto int not null,
qt_produto_saida int,
qt_produto_entrda int,
id_produto int not null,
foreign key (id_produto) references tb_produto (cd_produto) on delete cascade on update cascade 
)engine=InnoDB default charset=utf8;

create table tb_user(
cd_user int auto_increment primary key,
nm_user varchar(80) not null,
cd_nivel int not null,
login_user varchar(80) not null,
senha_user varchar(20) not null,
tel_user varchar(15),
email_user varchar(80),
id_estoque int not null,
foreign key (id_estoque) references tb_estoque (cd_estoque) on delete cascade on update cascade 
)engine=InnoDB default charset=utf8;

create table tb_categoria_produto(
id_categoria int not null,
id_produto int not null,
foreign key (id_categoria) references tb_categoria (cd_categoria) on delete cascade on update cascade , 
foreign key (id_produto) references tb_produto (cd_produto) on delete cascade on update cascade 
)engine=InnoDB default charset=utf8;

create table tb_foto(
cd_foto int not null auto_increment primary key,
nm_foto varchar(120),
id_produto int not null,
foreign key (id_produto) references tb_produto (cd_produto) on delete cascade on update cascade 
)engine=InnoDB default charset=utf8;

show tables;