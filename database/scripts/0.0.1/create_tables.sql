-- !! YOU MUST RUN THE FOLLOWING SCRIPTS IN ORDER TO USE THIS !!
-- !! create_database.sql !!
-- !! states_cities !!

-- --------------------------------------------------------
-- Creates table `address`
-- --------------------------------------------------------
drop table if exists `address`;

create table if not exists `address` (
	`address_id`		int(11) not null auto_increment,
	`city_id`			int(11) null,
	`state_id`			int(11) null,
    `city_text`         varchar(255) null,
    `cep`				varchar(25) null,
	`district`			varchar(55) null,
	`text`				varchar(255) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`address_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------
-- Creates table `user_type`
--
-- This table define the types of users that the site will 
-- allow to use.
-- --------------------------------------------------------
drop table if exists `user_type`;

create table if not exists `user_type` (
	`user_type_id`		int(11) not null auto_increment,
	`cod`				int(11) not null,
	`description`		varchar(50) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `user_type` (`cod`, `description`) values (10, 'Representante');
insert into `user_type` (`cod`, `description`) values (20, 'Gerente');
insert into `user_type` (`cod`, `description`) values (40, 'Gerência Comercial');
insert into `user_type` (`cod`, `description`) values (31, 'Assitência Tecnica');
insert into `user_type` (`cod`, `description`) values (32, 'Marketing');
insert into `user_type` (`cod`, `description`) values (5, 'Distribuidor');

-- --------------------------------------------------------
-- Creates table `user`
--
-- This is the principal table of the application, all
-- informations related to user activity shall use this
-- table as reference.
-- --------------------------------------------------------
drop table if exists `user`;

create table if not exists `user` (
	`user_id`			int(11) not null auto_increment,
	`user_type`			int(11) not null default 10,
	`name`				varchar(50) null,
	`surname`           varchar(50) null,
	`email`				varchar(255) not null unique,
    `avatar_path`       varchar(1024) null,
	`password`			varchar(64) not null,
	`remember_token`    varchar(100) null,
	`email_token`		varchar(100) null,
	`active`			char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`user_id`),
	foreign key (`user_type`) references `user_type`(`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------
-- Creates table `notification_subject`
--
-- --------------------------------------------------------
drop table if exists `notification_subject`;

create table if not exists `notification_subject` (
	`notification_subject_id`		int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`notification_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `notification_subject`(`description`) values ('Confirmação de Envio Estoque');
insert into `notification_subject`(`description`) values ('Envio de pedido para análise logística');
insert into `notification_subject`(`description`) values ('Envio de pedido para análise de política');
insert into `notification_subject`(`description`) values ('Solicitação de análise de crédito');
insert into `notification_subject`(`description`) values ('Finalizar pedido');
insert into `notification_subject`(`description`) values ('Envio de pedido para distribuidor');
insert into `notification_subject`(`description`) values ('Distribuidor respondeu solicitação de aprovação de Pedido');
insert into `notification_subject`(`description`) values ('Quadro de mensagens');

-- --------------------------------------------------------
-- Creates table `notification_status`
--
-- --------------------------------------------------------
drop table if exists `notification_status`;

create table if not exists `notification_status` (
	`notification_status_id`		int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`notification_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `notification_status`(`description`) values ('Enviado');
insert into `notification_status`(`description`) values ('Visualizado');
insert into `notification_status`(`description`) values ('Deletado');

-- --------------------------------------------------------
-- Creates table `notification`
--
-- --------------------------------------------------------
drop table if exists `notification`;

create table if not exists `notification` (
	`notification_id`		int(11) not null auto_increment,
    `from_user_id`          int(11) not null,
    `to_user_id`            int(11) not null,
    `subject_id`            int(11) not null,
    `status_id`             int(11) not null, 
    `text`                  varchar(1024) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `notification` add foreign key (`from_user_id`) references `user`(`user_id`);
alter table `notification` add foreign key (`to_user_id`) references `user`(`user_id`);
alter table `notification` add foreign key (`subject_id`) references `notification_subject`(`notification_subject_id`);
alter table `notification` add foreign key (`status_id`) references `notification_status`(`notification_status_id`);

-- --------------------------------------------------------
-- Creates table `directory`
--
-- --------------------------------------------------------
drop table if exists `directory`;

create table if not exists `directory` (
	`directory_id`		int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`directory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `directory`(`description`) values ('inventory_positions');
insert into `directory`(`description`) values ('customer_credit_analysis');
insert into `directory`(`description`) values ('customer_email_approval');
insert into `directory`(`description`) values ('order_invoices');

-- --------------------------------------------------------
-- Creates table `storage_file`
--
-- --------------------------------------------------------
drop table if exists `storage_file`;

create table if not exists `storage_file` (
	`storage_file_id`		int(11) not null auto_increment,
    `directory_id`          int(11) not null,             
	`filepath`              varchar(1024) null,
    `filename`              varchar(1024) null,
    `extension`             varchar(255) null,
    `uploaded_filename`     varchar(1024) null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`storage_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `storage_file` add foreign key (`directory_id`) references `directory`(`directory_id`);

-- --------------------------------------------------------
-- Creates table `user_filesystem`
--
-- --------------------------------------------------------
drop table if exists `user_filesystem`;

create table if not exists `user_filesystem` (
	`user_id`		int(11) not null auto_increment,
	`storage_file_id`				int(11) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`user_id`, `storage_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `user_filesystem` add foreign key (`user_id`) references `user` (`user_id`);
alter table `user_filesystem` add foreign key (`storage_file_id`) references `storage_file` (`storage_file_id`);

-- --------------------------------------------------------
-- Creates table `customer_segment`
--
-- This table refers to all segments in wich sutomers are
-- segregate.
-- --------------------------------------------------------
drop table if exists `customer_segment`;

create table if not exists `customer_segment` (
	`customer_segment_id` 		int(11) not null auto_increment,
	`name`				varchar(25),
	`description`		varchar(255),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_segment`(`name`, `description`) values ('ASTEC', 'Assistência Técnica');
insert into `customer_segment`(`name`, `description`) values ('DELTA', '');
insert into `customer_segment`(`name`, `description`) values ('DISTR', 'Distribuidor');
insert into `customer_segment`(`name`, `description`) values ('ENG', '');
insert into `customer_segment`(`name`, `description`) values ('OTHER', '');
insert into `customer_segment`(`name`, `description`) values ('RETAIL', '');
insert into `customer_segment`(`name`, `description`) values ('SHOWROOM', '');

-- --------------------------------------------------------
-- Creates table `customer_status`
--
-- This table refers to all possible status that one customer
-- can be.
-- --------------------------------------------------------
drop table if exists `customer_status`;

create table if not exists `customer_status` (
	`customer_status_id` 		int(11) not null auto_increment,
	`description`				varchar(25) not null, 
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_status`(`description`) values ('OK');
insert into `customer_status`(`description`) values ('DESAT');

-- --------------------------------------------------------
-- Creates table `customer_channel`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_channel`;

create table if not exists `customer_channel` (
	`customer_channel_id` 		int(11) not null auto_increment,
	`description`				varchar(50) not null,
		`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_channel`(`description`) values ('ENG + OTHER');
insert into `customer_channel`(`description`) values ('DISTRIBUITOR');
insert into `customer_channel`(`description`) values ('STORES');

-- --------------------------------------------------------
-- Creates table `customer_region`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_region`;

create table if not exists `customer_region` (
	`customer_region_id` 		int(11) not null auto_increment,
	`state_id`				int(11) not null, 
	`description`			varchar(5) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_region`(`state_id`,`description`) values (26, 'SP01');
insert into `customer_region`(`state_id`,`description`) values (24, 'SC01');
insert into `customer_region`(`state_id`,`description`) values (7, 'DF01');
insert into `customer_region`(`state_id`,`description`) values (11, 'MG02');
insert into `customer_region`(`state_id`,`description`) values (19, 'RJ01');
insert into `customer_region`(`state_id`,`description`) values (23, 'RS01');
insert into `customer_region`(`state_id`,`description`) values (20, 'RN01');
insert into `customer_region`(`state_id`,`description`) values (22, 'PR01');
insert into `customer_region`(`state_id`,`description`) values (3, 'AM01');
insert into `customer_region`(`state_id`,`description`) values (26, 'SP02');
insert into `customer_region`(`state_id`,`description`) values (26, 'SP06');
insert into `customer_region`(`state_id`,`description`) values (11, 'MG01');
insert into `customer_region`(`state_id`,`description`) values (26, 'SP05');
insert into `customer_region`(`state_id`,`description`) values (9, 'GO01');
insert into `customer_region`(`state_id`,`description`) values (26, 'SP03');
insert into `customer_region`(`state_id`,`description`) values (12, 'MS01');
insert into `customer_region`(`state_id`,`description`) values (22, 'PR02');
insert into `customer_region`(`state_id`,`description`) values (8, 'ES01');
insert into `customer_region`(`state_id`,`description`) values (13, 'MT01');
insert into `customer_region`(`state_id`,`description`) values (26, 'SP04');
insert into `customer_region`(`state_id`,`description`) values (11, 'MG03');


-- --------------------------------------------------------
-- Creates table `customer_manager`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_manager`;

create table if not exists `customer_manager` (
	`customer_manager_id` 		int(11) not null auto_increment,
	`name`						varchar(50) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_manager`(`name`) values ('Alan');
insert into `customer_manager`(`name`) values ('Carlos');
insert into `customer_manager`(`name`) values ('Eduardo');

-- --------------------------------------------------------
-- Creates table `customer_salesman`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_salesman`;

create table if not exists `customer_salesman` (
	`customer_salesman_id` 		int(11) not null auto_increment,
	`name`						varchar(250) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_salesman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_salesman`(`name`) values ('WAINER');
insert into `customer_salesman`(`name`) values ('DIRETO ARMAZEN');
insert into `customer_salesman`(`name`) values ('JONAS');
insert into `customer_salesman`(`name`) values ('DIRETO HBB');
insert into `customer_salesman`(`name`) values ('DIRETO MARCOLAR');
insert into `customer_salesman`(`name`) values ('DIRETO NACIONAL');
insert into `customer_salesman`(`name`) values ('DIRETO MERCURY');
insert into `customer_salesman`(`name`) values ('TELEVENDAS');
insert into `customer_salesman`(`name`) values ('ALEXANDRE');
insert into `customer_salesman`(`name`) values ('CLEVERSON');
insert into `customer_salesman`(`name`) values ('FERNANDO');
insert into `customer_salesman`(`name`) values ('ERNANE');
insert into `customer_salesman`(`name`) values ('REP DELTA');
insert into `customer_salesman`(`name`) values ('MOPESP');
insert into `customer_salesman`(`name`) values ('JANIR');
insert into `customer_salesman`(`name`) values ('BISPO');
insert into `customer_salesman`(`name`) values ('-');

-- --------------------------------------------------------
-- Creates table `customer_distribuitor`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_distribuitor`;

create table if not exists `customer_distribuitor` (
	`customer_distribuitor_id` 		int(11) not null auto_increment,
	`name`							varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_distribuitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_distribuitor`(`name`) values ('Mercury');
insert into `customer_distribuitor`(`name`) values ('Delta');
insert into `customer_distribuitor`(`name`) values ('Armazen Pará');
insert into `customer_distribuitor`(`name`) values ('Casa SP');
insert into `customer_distribuitor`(`name`) values ('HBB');
insert into `customer_distribuitor`(`name`) values ('Marcolar');
insert into `customer_distribuitor`(`name`) values ('Nacional');
insert into `customer_distribuitor`(`name`) values ('Navas');
insert into `customer_distribuitor`(`name`) values ('Vibras');
insert into `customer_distribuitor`(`name`) values ('GP');

-- --------------------------------------------------------
-- Creates table `customer_classification`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_classification`;

create table if not exists `customer_classification` (
	`customer_classification_id` 	int(11) not null auto_increment,
	`name`							varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_classification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_classification`(`name`) values ('ASTEC');
insert into `customer_classification`(`name`) values ('DELTA');
insert into `customer_classification`(`name`) values ('DISTR');
insert into `customer_classification`(`name`) values ('ENG');
insert into `customer_classification`(`name`) values ('REGULAR (-)');
insert into `customer_classification`(`name`) values ('REGULAR');
insert into `customer_classification`(`name`) values ('GOLD');
insert into `customer_classification`(`name`) values ('SILVER');
insert into `customer_classification`(`name`) values ('INDEF');

-- --------------------------------------------------------
-- Creates table `sanitary_metals_supplier`
--
-- ???
-- --------------------------------------------------------
drop table if exists `sanitary_metals_supplier`;

create table if not exists `sanitary_metals_supplier` (
	`sanitary_metals_supplier_id` 	int(11) not null auto_increment,
	`name`							varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`sanitary_metals_supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `sanitary_metals_supplier`(`name`) values ('Deca');
insert into `sanitary_metals_supplier`(`name`) values ('Docol');
insert into `sanitary_metals_supplier`(`name`) values ('Hansgrohe');
insert into `sanitary_metals_supplier`(`name`) values ('Outro');

-- --------------------------------------------------------
-- Creates table `sanitary_ware_supplier`
--
-- ???
-- --------------------------------------------------------
drop table if exists `sanitary_ware_supplier`;

create table if not exists `sanitary_ware_supplier` (
	`sanitary_ware_supplier_id` 	int(11) not null auto_increment,
	`name`							varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`sanitary_ware_supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `sanitary_ware_supplier`(`name`) values ('Deca');
insert into `sanitary_ware_supplier`(`name`) values ('Docol');
insert into `sanitary_ware_supplier`(`name`) values ('Hansgrohe');
insert into `sanitary_ware_supplier`(`name`) values ('Outro');

-- --------------------------------------------------------
-- Creates table `customer_type`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_type`;

create table if not exists `customer_type` (
	`customer_type_id` 	int(11) not null auto_increment,
	`name`							varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_type`(`name`) values ('Loja - Showroom');
insert into `customer_type`(`name`) values ('Loja - Revenda');
insert into `customer_type`(`name`) values ('Loja - Home Center');
insert into `customer_type`(`name`) values ('Distribuidor');
insert into `customer_type`(`name`) values ('Hotel');
insert into `customer_type`(`name`) values ('Hospital');
insert into `customer_type`(`name`) values ('Consumidor');
insert into `customer_type`(`name`) values ('Construtora');
insert into `customer_type`(`name`) values ('Outro');

-- --------------------------------------------------------
-- Creates table `customer`
--
-- This table refers to all entities that have some relationship
-- with us.
-- --------------------------------------------------------
drop table if exists `customer`;

create table if not exists `customer` (
	`customer_id`			int(11) not null auto_increment,
	`customer_segment_id`	int(11) null,
	`customer_status_id` 	int(11) null default 1,
	`customer_channel_id`	int(11) null,
	`customer_region_id`	int(11) null,
	`customer_manager_id`	int(11) null,
	`customer_salesman_id`	int(11) null,
    `customer_address_id`   int(11) null,
    `customer_delivery_address_id` int(11) null,
    `customer_billing_address_id` int(11) null,
	`customer_distribuitor_actual_id`	int(11) null,
	`customer_distribuitor_future_id`	int(11) null,
	`customer_classification_potential_id`		int(11) null,
	`customer_classification_official_id`		int(11) null,
    `customer_sanitary_ware_supplier_id`        int(11) null,
    `customer_sanitary_metals_supplier_id`      int(11) null,
    `customer_type_id`          int(11) null,
	`state_id`				int(11) null,
	`city_id`				int(11) null,
    `city_text`         varchar(255) null,
	`fantasy_name`		varchar(255) null,
	`company_name`		varchar(255) null,
    `phone`             varchar(25) null,
    `email`             varchar(255) null,
	`cnpj`				varchar(255) null,
	`ie`				varchar(255) null,
	`iss`				varchar(255) null,
    `annual_income`     numeric(16,2) null,
    `credit`            numeric(16, 2) null,
    `icms_taxpayer`     char(1) not null default '?' check (`icms_taxpayer` in ('s', 'n', '?')),
    `own_seat`          char(1) not null default 'n' check (`own_seat` in ('s', 'n')),
	`top`				char(1) not null default 'n' check (`top` in ('s', 'n')),
	`observation`		varchar(255) null,
	`month_open`		int(11) null,
	`year_open`			int(11) null,		
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer` add foreign key(`customer_segment_id`) references `customer_segment`(`customer_segment_id`);
alter table `customer` add foreign key(`customer_status_id`) references `customer_status`(`customer_status_id`);
alter table `customer` add foreign key(`customer_channel_id`) references `customer_channel`(`customer_channel_id`);
alter table `customer` add foreign key(`customer_region_id`) references `customer_region`(`customer_region_id`);
alter table `customer` add foreign key(`customer_manager_id`) references `customer_manager`(`customer_manager_id`);
alter table `customer` add foreign key(`customer_salesman_id`) references `customer_salesman`(`customer_salesman_id`);
alter table `customer` add foreign key(`customer_distribuitor_actual_id`) references `customer_distribuitor`(`customer_distribuitor_id`);
alter table `customer` add foreign key(`customer_distribuitor_future_id`) references `customer_distribuitor`(`customer_distribuitor_id`);
alter table `customer` add foreign key(`customer_classification_potential_id`) references `customer_classification`(`customer_classification_id`);
alter table `customer` add foreign key(`customer_classification_official_id`) references `customer_classification`(`customer_classification_id`);
alter table `customer` add foreign key(`customer_sanitary_metals_supplier_id`) references `customer_sanitary_metals_supplier`(`customer_sanitary_metals_supplier_id`);
alter table `customer` add foreign key(`customer_sanitary_ware_supplier_id`) references `customer_sanitary_ware_supplier`(`customer_sanitary_ware_supplier_id`);
alter table `customer` add foreign key(`customer_address_id`) references `address`(`address_id`);
alter table `customer` add foreign key(`customer_delivery_address_id`) references `address`(`address_id`);
alter table `customer` add foreign key(`customer_billing_address_id`) references `address`(`address_id`);
alter table `customer` add foreign key(`customer_type_id`) references `customer_type`(`customer_type_id`);


-- --------------------------------------------------------
-- Creates table `customer_note`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_note`;

create table if not exists `customer_note` (
	`customer_note_id` 	int(11) not null auto_increment,
    `customer_id`           int(11) null,
    `user_id`               int(11) null,
	`text`                  varchar(5256),
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_note` add foreign key (`customer_id`) references `customer`(`customer_id`);
alter table `customer_note` add foreign key (`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `customer_business_contact`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_business_contact`;

create table if not exists `customer_business_contact` (
	`customer_business_contact_id` 	int(11) not null auto_increment,
    `customer_id`                   int(11) not null,
	`name`							varchar(255) not null,
    `email`                         varchar(255) null,
    `phone`                         varchar(20) null,
    `dept`                          varchar(255) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_business_contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_business_contact` add foreign key (`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `customer_business_contact`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_partner`;

create table if not exists `customer_partner` (
	`customer_partner_id` 	int(11) not null auto_increment,
    `customer_id`                   int(11) not null,
	`name`							varchar(255) not null,
    `email`                         varchar(255) null,
    `phone`                         varchar(20) null,
    `cpf`                          varchar(25) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_partner` add foreign key (`partner_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `customer_main_provider`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_main_provider`;

create table if not exists `customer_main_provider` (
	`customer_main_provider_id` 	int(11) not null auto_increment,
    `customer_id`                   int(11) not null,
	`name`							varchar(255) not null,
    `email`                         varchar(255) null,
    `phone`                         varchar(20) null,
    `company`                       varchar(255) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_main_provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_main_provider` add foreign key (`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `customer_bank_account`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_bank_account`;

create table if not exists `customer_bank_account` (
	`customer_bank_account_id` 	int(11) not null auto_increment,
    `customer_id`                   int(11) not null,
	`bank`							varchar(255) not null,
    `agency`                         varchar(255) null,
    `number`                         varchar(20) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`customer_bank_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_bank_account` add foreign key (`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `customer_sanitary_ware_supplier`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_sanitary_ware_supplier`;

create table if not exists `customer_sanitary_ware_supplier` (
	`sanitary_ware_supplier_id` 	int(11) not null,
    `customer_id`                   int(11) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`sanitary_ware_supplier_id`, `customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------
-- Creates table `customer_sanitary_metals_supplier`
--
-- ???
-- --------------------------------------------------------
drop table if exists `customer_sanitary_metals_supplier`;

create table if not exists `customer_sanitary_metals_supplier` (
	`sanitary_metals_supplier_id` 	int(11) not null,
    `customer_id`                   int(11) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key (`sanitary_metals_supplier_id`, `customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------
-- Creates table `product_status`
-- --------------------------------------------------------
drop table if exists `product_status`;

create table if not exists `product_status` (
	`product_status_id`		int(11) not null auto_increment,
	`description`			varchar(25),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_status_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;						

insert into `product_status` (`description`) values ('Active');
insert into `product_status` (`description`) values ('Obsolete in 2015');
insert into `product_status` (`description`) values ('Fora de linha');
insert into `product_status` (`description`) values ('Obsolete');
insert into `product_status` (`description`) values ('Undefined');

-- --------------------------------------------------------
-- Creates table `product_vrc`
-- --------------------------------------------------------
drop table if exists `product_vrc`;

create table if not exists `product_vrc` (
	`product_vrc_id`		int(11) not null auto_increment,
	`description`			varchar(25) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_vrc_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;	

insert into `product_vrc` (`description`) values ('YES');
insert into `product_vrc` (`description`) values ('NO');
insert into `product_vrc` (`description`) values ('MAYBE');

-- --------------------------------------------------------
-- Creates table `product_serie`
-- --------------------------------------------------------
drop table if exists `product_serie`;

create table if not exists `product_serie` (
	`product_serie_id`		int(11) not null auto_increment,
	`description`			varchar(55) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_serie_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;	

insert into `product_serie` (`description`) values (	'	Belo	');
insert into `product_serie` (`description`) values (	'	Charlotte	');
insert into `product_serie` (`description`) values (	'	Jason Wu for Brizo	');
insert into `product_serie` (`description`) values (	'	Odin	');
insert into `product_serie` (`description`) values (	'	Other	');
insert into `product_serie` (`description`) values (	'	RSVP	');
insert into `product_serie` (`description`) values (	'	Siderna	');
insert into `product_serie` (`description`) values (	'	Solna	');
insert into `product_serie` (`description`) values (	'	Sotria	');
insert into `product_serie` (`description`) values (	'	Venuto	');
insert into `product_serie` (`description`) values (	'	Virage	');
insert into `product_serie` (`description`) values (	'	Vuelo	');
insert into `product_serie` (`description`) values (	'	Addison	');
insert into `product_serie` (`description`) values (	'	Allora	');
insert into `product_serie` (`description`) values (	'	Ara	');
insert into `product_serie` (`description`) values (	'	Cassidy	');
insert into `product_serie` (`description`) values (	'	Compel	');
insert into `product_serie` (`description`) values (	'	Dryden	');
insert into `product_serie` (`description`) values (	'	Foundations	');
insert into `product_serie` (`description`) values (	'	Fuse	');
insert into `product_serie` (`description`) values (	'	Gala	');
insert into `product_serie` (`description`) values (	'	Grail	');
insert into `product_serie` (`description`) values (	'	Lahara	');
insert into `product_serie` (`description`) values (	'	Linden	');
insert into `product_serie` (`description`) values (	'	Pilar	');
insert into `product_serie` (`description`) values (	'	Trinsic	');
insert into `product_serie` (`description`) values (	'	UniversalShoweringComponents	');
insert into `product_serie` (`description`) values (	'	UniversalShoweringComponents.	');
insert into `product_serie` (`description`) values (	'	UrbanArzo	');
insert into `product_serie` (`description`) values (	'	Vero	');
insert into `product_serie` (`description`) values (	'	Victorian	');
insert into `product_serie` (`description`) values (	'	Electronics	');
insert into `product_serie` (`description`) values (	'	Miscellaneous Commercial	');
insert into `product_serie` (`description`) values (	'	CommercialMisc	');
insert into `product_serie` (`description`) values (	'	Teck87TSeries	');
insert into `product_serie` (`description`) values (	'	Andian	');
insert into `product_serie` (`description`) values (	'	Brevard	');
insert into `product_serie` (`description`) values (	'	Celeste	');
insert into `product_serie` (`description`) values (	'	Centra-S	');
insert into `product_serie` (`description`) values (	'	Centra-V	');
insert into `product_serie` (`description`) values (	'	Elemetro	');
insert into `product_serie` (`description`) values (	'	InternationalOthers	');
insert into `product_serie` (`description`) values (	'	InternationalProject	');
insert into `product_serie` (`description`) values (	'	Lilah	');
insert into `product_serie` (`description`) values (	'	Mandolin	');
insert into `product_serie` (`description`) values (	'	Ribbon	');
insert into `product_serie` (`description`) values (	'	Talon	');
insert into `product_serie` (`description`) values (	'	Artesso	');
insert into `product_serie` (`description`) values (	'	Baliza	');
insert into `product_serie` (`description`) values (	'	BathSafety	');
insert into `product_serie` (`description`) values (	'	BrizoEuropean	');
insert into `product_serie` (`description`) values (	'	BrizoTraditional	');
insert into `product_serie` (`description`) values (	'	Floriano	');
insert into `product_serie` (`description`) values (	'	IndustrialChic	');
insert into `product_serie` (`description`) values (	'	Loki	');
insert into `product_serie` (`description`) values (	'	Pascal	');
insert into `product_serie` (`description`) values (	'	ProvidenceBelle	');
insert into `product_serie` (`description`) values (	'	ProvidenceClassic	');
insert into `product_serie` (`description`) values (	'	Quiessence	');
insert into `product_serie` (`description`) values (	'	SelectRivera	');
insert into `product_serie` (`description`) values (	'	SelectStratfordClassic	');
insert into `product_serie` (`description`) values (	'	SelectTrevi	');
insert into `product_serie` (`description`) values (	'	SelectWilliamsburgClassic	');
insert into `product_serie` (`description`) values (	'	Talo	');
insert into `product_serie` (`description`) values (	'	Tresa	');
insert into `product_serie` (`description`) values (	'	Vesi	');
insert into `product_serie` (`description`) values (	'	1300Series	');
insert into `product_serie` (`description`) values (	'	134/100_300_400Series	');
insert into `product_serie` (`description`) values (	'	2100_2400Series	');
insert into `product_serie` (`description`) values (	'	2500_2522Series	');
insert into `product_serie` (`description`) values (	'	3540Series	');
insert into `product_serie` (`description`) values (	'	520_522Series	');
insert into `product_serie` (`description`) values (	'	Andover	');
insert into `product_serie` (`description`) values (	'	Arabella	');
insert into `product_serie` (`description`) values (	'	Ashlyn	');
insert into `product_serie` (`description`) values (	'	Ashton	');
insert into `product_serie` (`description`) values (	'	Aubrey	');
insert into `product_serie` (`description`) values (	'	Ayden	');
insert into `product_serie` (`description`) values (	'	Berkley	');
insert into `product_serie` (`description`) values (	'	BotanicalStatice	');
insert into `product_serie` (`description`) values (	'	Carlisle	');
insert into `product_serie` (`description`) values (	'	Celice	');
insert into `product_serie` (`description`) values (	'	Cicero	');
insert into `product_serie` (`description`) values (	'	Collins	');
insert into `product_serie` (`description`) values (	'	CoreOther	');
insert into `product_serie` (`description`) values (	'	CSpouts	');
insert into `product_serie` (`description`) values (	'	Dawson	');
insert into `product_serie` (`description`) values (	'	Debonair	');
insert into `product_serie` (`description`) values (	'	DeLuca	');
insert into `product_serie` (`description`) values (	'	Denim	');
insert into `product_serie` (`description`) values (	'	Dennison	');
insert into `product_serie` (`description`) values (	'	District	');
insert into `product_serie` (`description`) values (	'	Gourmet	');
insert into `product_serie` (`description`) values (	'	Graves	');
insert into `product_serie` (`description`) values (	'	Griffen	');
insert into `product_serie` (`description`) values (	'	Innovations	');
insert into `product_serie` (`description`) values (	'	Jordan	');
insert into `product_serie` (`description`) values (	'	Kate	');
insert into `product_serie` (`description`) values (	'	Leland	');
insert into `product_serie` (`description`) values (	'	LelandJ	');
insert into `product_serie` (`description`) values (	'	Lewiston	');
insert into `product_serie` (`description`) values (	'	Lockwood	');
insert into `product_serie` (`description`) values (	'	Lorain	');
insert into `product_serie` (`description`) values (	'	MGM	');
insert into `product_serie` (`description`) values (	'	NeoStyleOld	');
insert into `product_serie` (`description`) values (	'	Nura	');
insert into `product_serie` (`description`) values (	'	Nyla	');
insert into `product_serie` (`description`) values (	'	Olmsted	');
insert into `product_serie` (`description`) values (	'	Orleans	');
insert into `product_serie` (`description`) values (	'	Palo	');
insert into `product_serie` (`description`) values (	'	Porter	');
insert into `product_serie` (`description`) values (	'	Prelude	');
insert into `product_serie` (`description`) values (	'	Retail Channel Product	');
insert into `product_serie` (`description`) values (	'	RetailChannelProduct	');
insert into `product_serie` (`description`) values (	'	RetailCore	');
insert into `product_serie` (`description`) values (	'	Riosa	');
insert into `product_serie` (`description`) values (	'	Rizu	');
insert into `product_serie` (`description`) values (	'	Savile	');
insert into `product_serie` (`description`) values (	'	SaxonyPullouts	');
insert into `product_serie` (`description`) values (	'	SBS	');
insert into `product_serie` (`description`) values (	'	Sentiment	');
insert into `product_serie` (`description`) values (	'	Signature	');
insert into `product_serie` (`description`) values (	'	SignaturePullouts	');
insert into `product_serie` (`description`) values (	'	Silverton	');
insert into `product_serie` (`description`) values (	'	Soline	');
insert into `product_serie` (`description`) values (	'	Talbott	');
insert into `product_serie` (`description`) values (	'	Tolva	');
insert into `product_serie` (`description`) values (	'	Uptown	');
insert into `product_serie` (`description`) values (	'	UrbanVerona	');
insert into `product_serie` (`description`) values (	'	Velino	');
insert into `product_serie` (`description`) values (	'	Vessona	');
insert into `product_serie` (`description`) values (	'	Waterfall	');
insert into `product_serie` (`description`) values (	'	WaterfallPullouts	');
insert into `product_serie` (`description`) values (	'	Windemere	');
insert into `product_serie` (`description`) values (	'	Yorkshire	');
insert into `product_serie` (`description`) values (	'	Zella	');
insert into `product_serie` (`description`) values (	'	24T Series	');
insert into `product_serie` (`description`) values (	'	27T Series	');
insert into `product_serie` (`description`) values (	'	28T Series	');
insert into `product_serie` (`description`) values (	'	CommercialLaboratory	');
insert into `product_serie` (`description`) values (	'	Laboratory	');
insert into `product_serie` (`description`) values (	'	Teck23TSeries	');
insert into `product_serie` (`description`) values (	'	Teck24TSeries	');
insert into `product_serie` (`description`) values (	'	Teck25CSeries	');
insert into `product_serie` (`description`) values (	'	Teck27TSeries	');
insert into `product_serie` (`description`) values (	'	Teck28TSeries	');
insert into `product_serie` (`description`) values (	'	Teck81_83TSeries	');
insert into `product_serie` (`description`) values (	'	Metering	');
insert into `product_serie` (`description`) values (	'	Teck11TSeries	');
insert into `product_serie` (`description`) values (	'	Teck21TSeries	');
insert into `product_serie` (`description`) values (	'	Teck22TSeries	');
insert into `product_serie` (`description`) values (	'	Teck26TSeries	');
insert into `product_serie` (`description`) values (	'	Teck86TSeries	');
insert into `product_serie` (`description`) values (	'	UniversalTubShowerValve	');
insert into `product_serie` (`description`) values (	'	1300Series_Universal	');
insert into `product_serie` (`description`) values (	'	Centra	');
insert into `product_serie` (`description`) values (	'	Apex	');
insert into `product_serie` (`description`) values (	'	Choice	');
insert into `product_serie` (`description`) values (	'	Core	');
insert into `product_serie` (`description`) values (	'	Designer	');
insert into `product_serie` (`description`) values (	'	Peerless Designer	');
insert into `product_serie` (`description`) values (	'	Universal Showering Components	');
insert into `product_serie` (`description`) values ('Undefined');

-- --------------------------------------------------------
-- Creates table `product_brand`
-- --------------------------------------------------------
drop table if exists `product_brand`;

create table if not exists `product_brand` (
	`product_brand_id`		int(11) not null auto_increment,
	`description`			varchar(55) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_brand_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_brand` (`description`) values ('Brizo');
insert into `product_brand` (`description`) values ('Delta');
insert into `product_brand` (`description`) values ('Delta Commercial');
insert into `product_brand` (`description`) values ('Delta HDF');
insert into `product_brand` (`description`) values ('Delta International');
insert into `product_brand` (`description`) values ('Peerless');

-- --------------------------------------------------------
-- Creates table `product_finish`
-- --------------------------------------------------------
drop table if exists `product_finish`;

create table if not exists `product_finish` (
	`product_finish_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_finish_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_finish` (`description`) values ('	Chrome	');
insert into `product_finish` (`description`) values ('	Cocoa Bronze and Polished Nickel	');
insert into `product_finish` (`description`) values ('	Matte Black	');
insert into `product_finish` (`description`) values ('	Not Applicable	');
insert into `product_finish` (`description`) values ('	Polished Nickel	');
insert into `product_finish` (`description`) values ('	Matte White	');
insert into `product_finish` (`description`) values ('	Stainless	');
insert into `product_finish` (`description`) values ('	Brushed Nickel	');
insert into `product_finish` (`description`) values ('	Cocoa Bronze/Stainless Steel	');
insert into `product_finish` (`description`) values ('	Polished Chrome/Matte White	');
insert into `product_finish` (`description`) values ('	Arctic Stainless	');
insert into `product_finish` (`description`) values ('	Venetian Bronze	');
insert into `product_finish` (`description`) values ('	Stainless and Chili Pepper	');
insert into `product_finish` (`description`) values ('	Stainless and Cracked Pepper	');
insert into `product_finish` (`description`) values ('	Stainless/White	');
insert into `product_finish` (`description`) values ('	Champagne Bronze	');
insert into `product_finish` (`description`) values ('	NA	');
insert into `product_finish` (`description`) values ('	Bright Stainless Steel	');
insert into `product_finish` (`description`) values ('	Brilliance Brushed Bronze	');
insert into `product_finish` (`description`) values ('	Luxe Nickel	');
insert into `product_finish` (`description`) values ('	Brilliance Brass	');
insert into `product_finish` (`description`) values ('	Black	');
insert into `product_finish` (`description`) values ('	Black/Chrome	');
insert into `product_finish` (`description`) values ('	Matte Black/Brushed Nickel	');
insert into `product_finish` (`description`) values ('	Aged Pewter	');
insert into `product_finish` (`description`) values ('	Other Finish	');
insert into `product_finish` (`description`) values ('	Polished Brass	');
insert into `product_finish` (`description`) values ('	White	');
insert into `product_finish` (`description`) values ('	Pearl Nickel	');
insert into `product_finish` (`description`) values ('	Cocoa Bronze	');
insert into `product_finish` (`description`) values ('	Chrome & Polished Brass	');
insert into `product_finish` (`description`) values ('	Oil Rubbed Bronze	');
insert into `product_finish` (`description`) values ('	White/Chrome	');
insert into `product_finish` (`description`) values ('	Biscuit	');
insert into `product_finish` (`description`) values ('	Satin Nickel	');
insert into `product_finish` (`description`) values ('	Brushed Chrome	');
insert into `product_finish` (`description`) values ('	Polished Brass/Black	');
insert into `product_finish` (`description`) values ('	Nickel Stainless	');
insert into `product_finish` (`description`) values ('	Peened Stainless Steel	');
insert into `product_finish` (`description`) values ('	Rough Chrome	');
insert into `product_finish` (`description`) values ('	Oil Bronze	');

-- --------------------------------------------------------
-- Creates table `product_raw_material`
-- --------------------------------------------------------
drop table if exists `product_raw_material`;

create table if not exists `product_raw_material` (
	`product_raw_material_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_raw_material_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_raw_material` (`description`) values ('	Brass/Zinc	');
insert into `product_raw_material` (`description`) values ('	Brass	');
insert into `product_raw_material` (`description`) values ('	Zinc	');
insert into `product_raw_material` (`description`) values ('	Brass 	');
insert into `product_raw_material` (`description`) values ('	Brass/Plastic 	');
insert into `product_raw_material` (`description`) values ('	Zinc/Glass	');
insert into `product_raw_material` (`description`) values ('	Brass/Glass	');
insert into `product_raw_material` (`description`) values ('	Brass  	');
insert into `product_raw_material` (`description`) values ('	BRASS & ZINC	');
insert into `product_raw_material` (`description`) values ('	BRASS & PLASTIC	');
insert into `product_raw_material` (`description`) values ('	Zinc 	');
insert into `product_raw_material` (`description`) values ('	Steel	');
insert into `product_raw_material` (`description`) values ('	Zinc/Steel	');
insert into `product_raw_material` (`description`) values ('	Brass/Zinc/Glass	');
insert into `product_raw_material` (`description`) values ('	ZINC & SSTEEL	');
insert into `product_raw_material` (`description`) values ('	ZINC/PLASTIC	');
insert into `product_raw_material` (`description`) values ('	PLASTIC	');
insert into `product_raw_material` (`description`) values ('	ZINC & BRASS	');
insert into `product_raw_material` (`description`) values ('	COPPER	');
insert into `product_raw_material` (`description`) values ('	STAINLESS STL	');
insert into `product_raw_material` (`description`) values ('	METAL	');
insert into `product_raw_material` (`description`) values ('	Zinc/Brass 	');
insert into `product_raw_material` (`description`) values ('	Plastic  	');
insert into `product_raw_material` (`description`) values ('	BRASS/PLASTIC	');
insert into `product_raw_material` (`description`) values ('	Plastic 	');
insert into `product_raw_material` (`description`) values ('	ZINC & STEEL	');
insert into `product_raw_material` (`description`) values ('	BRASS, ZINC & PLASTIC	');
insert into `product_raw_material` (`description`) values ('	STAINLESS STEEL	');
insert into `product_raw_material` (`description`) values ('	IRON	');
insert into `product_raw_material` (`description`) values ('	IRON & COPPER	');
insert into `product_raw_material` (`description`) values ('	ZINC & PLASTIC	');
insert into `product_raw_material` (`description`) values ('	BRASS & SS	');
insert into `product_raw_material` (`description`) values ('	BRASS & GLASS	');
insert into `product_raw_material` (`description`) values ('	Zinc/Plastic 	');
insert into `product_raw_material` (`description`) values ('	PLASTIC AND BRASS	');
insert into `product_raw_material` (`description`) values ('	Glass & Stainless Steel	');
insert into `product_raw_material` (`description`) values ('	BRASS & S.S.	');
insert into `product_raw_material` (`description`) values ('	GLASS	');
insert into `product_raw_material` (`description`) values ('	PLASTIC/SS/BRASS	');
insert into `product_raw_material` (`description`) values ('	PLASTIC & S.S.	');
insert into `product_raw_material` (`description`) values ('	PLASTIC & ZINC	');
insert into `product_raw_material` (`description`) values ('	ZINC, GLASS	');
insert into `product_raw_material` (`description`) values ('	 Brass	');
insert into `product_raw_material` (`description`) values ('	COPPER & BRASS	');
insert into `product_raw_material` (`description`) values ('	Zinc & Glass	');
insert into `product_raw_material` (`description`) values ('	BRASS & ACRYLIC	');

-- --------------------------------------------------------
-- Creates table `product_type`
-- --------------------------------------------------------
drop table if exists `product_type`;

create table if not exists `product_type` (
	`product_type_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_type_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_type` (`description`) values ('Faucet');
insert into `product_type` (`description`) values ('Parts');
insert into `product_type` (`description`) values ('Rough');

-- --------------------------------------------------------
-- Creates table `product_function`
-- --------------------------------------------------------
drop table if exists `product_function`;

create table if not exists `product_function` (
	`product_function_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_function_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_function` (`description`) values ('	Kitchen	');
insert into `product_function` (`description`) values ('	Bar Laundry	');
insert into `product_function` (`description`) values ('	Tub Shower	');
insert into `product_function` (`description`) values ('	Tub Shower Component 	');
insert into `product_function` (`description`) values ('	Accessories	');
insert into `product_function` (`description`) values ('	Lavatory	');
insert into `product_function` (`description`) values ('	Handles	');
insert into `product_function` (`description`) values ('	Tub Filler 	');
insert into `product_function` (`description`) values ('	Other Parts 	');
insert into `product_function` (`description`) values ('	Other Faucets	');
insert into `product_function` (`description`) values ('	Roman Tub	');
insert into `product_function` (`description`) values ('	Pot Filler	');
insert into `product_function` (`description`) values ('	Other	');

-- --------------------------------------------------------
-- Creates table `product_sub_function`
-- --------------------------------------------------------
drop table if exists `product_sub_function`;

create table if not exists `product_sub_function` (
	`product_sub_function_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_sub_function_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_sub_function` (`description`) values ('	KitchenPullDown	');
insert into `product_sub_function` (`description`) values ('	BarPrep	');
insert into `product_sub_function` (`description`) values ('	TubShowerShowerOnly	');
insert into `product_sub_function` (`description`) values ('	DiverterORVolumeControl	');
insert into `product_sub_function` (`description`) values ('	PersonalHandheldShowers	');
insert into `product_sub_function` (`description`) values ('	AccessoryRobeUtilityHook	');
insert into `product_sub_function` (`description`) values ('	LavatoryWidespread	');
insert into `product_sub_function` (`description`) values ('	LavatoryCenterset	');
insert into `product_sub_function` (`description`) values ('	LavatoryTouchCenterset	');
insert into `product_sub_function` (`description`) values ('	AccessoryTissueHolder	');
insert into `product_sub_function` (`description`) values ('	RPHandleAccent	');
insert into `product_sub_function` (`description`) values ('	AccessoryTowelRing	');
insert into `product_sub_function` (`description`) values ('	Accessory18inchTowelBar	');
insert into `product_sub_function` (`description`) values ('	Accessory24inchTowelBar	');
insert into `product_sub_function` (`description`) values ('	AccessorySoapDishDispenser	');
insert into `product_sub_function` (`description`) values ('	Floor-MountTubFiller	');
insert into `product_sub_function` (`description`) values ('	AccessoryGlassShelf	');
insert into `product_sub_function` (`description`) values ('	BodySprayORBodyJet	');
insert into `product_sub_function` (`description`) values ('	TubShowerComponent	');
insert into `product_sub_function` (`description`) values ('	Roughs	');
insert into `product_sub_function` (`description`) values ('	RPDrainDrainParts	');
insert into `product_sub_function` (`description`) values ('	RPTrim	');
insert into `product_sub_function` (`description`) values ('	LavatoryWallMount	');
insert into `product_sub_function` (`description`) values ('	AccessoriesMisc	');
insert into `product_sub_function` (`description`) values ('	KitchenPullout	');
insert into `product_sub_function` (`description`) values ('	KitchenPullDownTap	');
insert into `product_sub_function` (`description`) values ('	TubShowerValveOnly	');
insert into `product_sub_function` (`description`) values ('	Showerhead	');
insert into `product_sub_function` (`description`) values ('	BarPrepTouch	');
insert into `product_sub_function` (`description`) values ('	Accessory30inchTowelBar	');
insert into `product_sub_function` (`description`) values ('	KitchenPulloutTap	');
insert into `product_sub_function` (`description`) values ('	KitchenWidespread	');
insert into `product_sub_function` (`description`) values ('	KitchenWidespreadTap	');
insert into `product_sub_function` (`description`) values ('	KitchenDeck	');
insert into `product_sub_function` (`description`) values ('	HandshowerShowerheadCombo	');
insert into `product_sub_function` (`description`) values ('	GrabBar	');
insert into `product_sub_function` (`description`) values ('	TowelShelf	');
insert into `product_sub_function` (`description`) values ('	ShowerOrganizer	');
insert into `product_sub_function` (`description`) values ('	RPMisc	');
insert into `product_sub_function` (`description`) values ('	FlushValve/UrinalValve	');
insert into `product_sub_function` (`description`) values ('	Bidet	');
insert into `product_sub_function` (`description`) values ('	AccessoryTumblerToothbrush	');
insert into `product_sub_function` (`description`) values ('	NotApplicable	');
insert into `product_sub_function` (`description`) values ('	RPFillValve	');
insert into `product_sub_function` (`description`) values ('	RPPullOutDownWands	');
insert into `product_sub_function` (`description`) values ('	KitchenAccessory	');
insert into `product_sub_function` (`description`) values ('	RomanTubWithDiverter	');
insert into `product_sub_function` (`description`) values ('	TubShower	');
insert into `product_sub_function` (`description`) values ('	RomanTub	');
insert into `product_sub_function` (`description`) values ('	LavatoryMiniWidespread	');
insert into `product_sub_function` (`description`) values ('	RPHoses	');
insert into `product_sub_function` (`description`) values ('	RPHandleParts	');
insert into `product_sub_function` (`description`) values ('	RPSpout	');
insert into `product_sub_function` (`description`) values ('	PotFillerDeckmount	');
insert into `product_sub_function` (`description`) values ('	PotFillerWallmount	');
insert into `product_sub_function` (`description`) values ('	RPTubSpouts	');
insert into `product_sub_function` (`description`) values ('	AccessoryTripLever	');
insert into `product_sub_function` (`description`) values ('	RPRisers	');
insert into `product_sub_function` (`description`) values ('	TubFillerValveOnly	');
insert into `product_sub_function` (`description`) values ('	RPAerator	');
insert into `product_sub_function` (`description`) values ('	RPBidetParts	');
insert into `product_sub_function` (`description`) values ('	RPSideSpray	');
insert into `product_sub_function` (`description`) values ('	RPAccessoryMountingHardware	');
insert into `product_sub_function` (`description`) values ('	AccessoryLight	');
insert into `product_sub_function` (`description`) values ('	AccessoryMirror	');
insert into `product_sub_function` (`description`) values ('	AccessoryDrawerKnobsandPulls	');
insert into `product_sub_function` (`description`) values ('	RPBathwaste	');
insert into `product_sub_function` (`description`) values ('	KitchenButler	');
insert into `product_sub_function` (`description`) values ('	RomanTubHandheldShower	');
insert into `product_sub_function` (`description`) values ('	RPCardedParts	');
insert into `product_sub_function` (`description`) values ('	KitchenDeckTap	');
insert into `product_sub_function` (`description`) values ('	TubShowerTubOnly	');
insert into `product_sub_function` (`description`) values ('	Pedestal Basin	');
insert into `product_sub_function` (`description`) values ('	Laundry	');
insert into `product_sub_function` (`description`) values ('	RPBulk	');
insert into `product_sub_function` (`description`) values ('	RPMiniBulk	');
insert into `product_sub_function` (`description`) values ('	Laboratory	');
insert into `product_sub_function` (`description`) values ('	ShowerRod	');
insert into `product_sub_function` (`description`) values ('	BedpanCleanser	');
insert into `product_sub_function` (`description`) values ('	KitchenWallMount	');
insert into `product_sub_function` (`description`) values ('	SurgeonScrubUp	');
insert into `product_sub_function` (`description`) values ('	BathStorageandOrganizer	');
insert into `product_sub_function` (`description`) values ('	DisplayMerchandising	');
insert into `product_sub_function` (`description`) values ('	BathDispenserandReceptacle	');
insert into `product_sub_function` (`description`) values ('	ServiceFaucetWallmount	');

-- --------------------------------------------------------
-- Creates table `product_attribute`
-- --------------------------------------------------------
drop table if exists `product_attribute`;

create table if not exists `product_attribute` (
	`product_attribute_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_attribute_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_attribute` (`description`) values ('	None	');
insert into `product_attribute` (`description`) values ('	WithoutPopUp	');
insert into `product_attribute` (`description`) values ('	WithPopUp	');
insert into `product_attribute` (`description`) values ('	WithoutSidespray	');
insert into `product_attribute` (`description`) values ('	MiscellaneousItem	');
insert into `product_attribute` (`description`) values ('	WithSidespray	');
insert into `product_attribute` (`description`) values ('	CardedPart	');
insert into `product_attribute` (`description`) values ('	CAM Direct Ship	');
insert into `product_attribute` (`description`) values ('	BulkRP	');
insert into `product_attribute` (`description`) values ('	Trim	');

-- --------------------------------------------------------
-- Creates table `product_handle`
-- --------------------------------------------------------
drop table if exists `product_handle`;

create table if not exists `product_handle` (
	`product_handle_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_handle_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_handle` (`description`) values ('	Single Handle Lever	');
insert into `product_handle` (`description`) values ('	Single Handle Blade	');
insert into `product_handle` (`description`) values ('	NA	');
insert into `product_handle` (`description`) values ('	Two Handle LHP	');
insert into `product_handle` (`description`) values ('	Two Handle Blade	');
insert into `product_handle` (`description`) values ('	Electronic	');
insert into `product_handle` (`description`) values ('	Two Handle Lever	');
insert into `product_handle` (`description`) values ('	Single Handle LHP	');
insert into `product_handle` (`description`) values ('	Single Handle Cross	');
insert into `product_handle` (`description`) values ('	Two Handle Cross	');
insert into `product_handle` (`description`) values ('	Single Handle other or Single Hole Sink	');
insert into `product_handle` (`description`) values ('	Single Handle Loop	');
insert into `product_handle` (`description`) values ('	Two Handle other or Two Hole Sink	');
insert into `product_handle` (`description`) values ('	Three Handle Lever	');
insert into `product_handle` (`description`) values ('	Single Handle Knob	');
insert into `product_handle` (`description`) values ('	Single Handle Accent	');
insert into `product_handle` (`description`) values ('	Two Handle Knob	');
insert into `product_handle` (`description`) values ('	Three Handle LHP	');
insert into `product_handle` (`description`) values ('	Two Handle Accent	');


-- --------------------------------------------------------
-- Creates table `product_packaging_type`
-- --------------------------------------------------------
drop table if exists `product_packaging_type`;

create table if not exists `product_packaging_type` (
	`product_packaging_type_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_packaging_type_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_packaging_type` (`description`) values ('	Box	');
insert into `product_packaging_type` (`description`) values ('	Bag	');
insert into `product_packaging_type` (`description`) values ('	BME - Blister Pack	');
insert into `product_packaging_type` (`description`) values ('	NA	');
insert into `product_packaging_type` (`description`) values ('	Clamshell	');
insert into `product_packaging_type` (`description`) values ('	Sleeve	');

-- --------------------------------------------------------
-- Creates table `product_stocking_type`
-- --------------------------------------------------------
drop table if exists `product_stocking_type`;

create table if not exists `product_stocking_type` (
	`product_stocking_type_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_stocking_type_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `product_stocking_type` (`description`) values ('MFG');
insert into `product_stocking_type` (`description`) values ('PFG');
insert into `product_stocking_type` (`description`) values ('DS');
insert into `product_stocking_type` (`description`) values ('Obsolete');

-- --------------------------------------------------------
-- Creates table `product`
-- --------------------------------------------------------
drop table if exists `product`;

create table if not exists `product` (
	`product_id`		int(11) not null auto_increment,
	`product_status_id` int(11) null,
	`product_serie_id`  int(11) null,
	`product_vrc_id`	int(11) null,
	`product_coo_id`	int(11) null,
	`product_brand_id`  int(11) null,
	`product_finish_id` int(11) null,
	`product_raw_material_id` int(11) null,
	`product_type_id`   int(11) null,
	`product_function_id`		int(11) null,
	`product_sub_function_id`		int(11) null,
	`product_attribute_id`		int(11) null,
	`product_handle_id`		int(11) null,
	`product_packaging_type_id`		int(11) null,
	`product_stocking_type_id`		int(11) null,
	`hts`				varchar(10) null,
	`ncm`				varchar(8) null,
	`ship_from_jackson` char(1) not null check(`ship_from_jackson` in ('s', 'n')),
	`sku`				varchar(30) not null,
	`ean`				varchar(30) null,
	`ipi`				double null,
	`ii`				double null,
	`pis`				double null,
	`cofins`			double null,
	`icms`				double null,
	`resale_mark_up`	numeric(10, 2),
	`consumer_mark_up`	numeric(10, 2),
	`case_quantity`		int(11) null,
	`break_case_allowed` char(1) null check(`break_case_allowed` in ('s', 'n')),
	`box_height_cm`		numeric(10,4) null,
	`box_length_cm`		numeric(10,4) null,
	`box_width_cm`		numeric(10,4) null,
	`master_weight_kg`	numeric(10,4) null,
	`master_carton_height_cm` numeric(10,4) null,
	`master_carton_length_cm` numeric(10,4) null,
	`master_carton_width_cm` numeric(10,4) null,
	`flow_rate`			varchar(255) null,
	`line_type`			char(2) null check (`line_type` in (`s`, `ds`)),
	`product_weight_kg`	numeric(10, 4) null,
	`description_en`	varchar(255) null,
	`description_pt`	varchar(255) null,
	`short_description`	varchar(255) null,		
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product` add foreign key(`product_status_id`) references `product_status`(`product_status_id`);
alter table `product` add foreign key(`product_vrc_id`) references `product_vrc`(`product_vrc_id`);
alter table `product` add foreign key(`product_serie_id`) references `product_serie`(`product_serie_id`);
alter table `product` add foreign key(`product_brand_id`) references `product_brand`(`product_brand_id`);
alter table `product` add foreign key(`product_finish_id`) references `product_finish`(`product_finish_id`);
alter table `product` add foreign key(`product_raw_material_id`) references `product_raw_material`(`product_raw_material_id`);
alter table `product` add foreign key(`product_type_id`) references `product_type`(`product_type_id`);
alter table `product` add foreign key(`product_function_id`) references `product_function`(`product_function_id`);
alter table `product` add foreign key(`product_sub_function_id`) references `product_sub_function`(`product_sub_function_id`);
alter table `product` add foreign key(`product_attribute_id`) references `product_attribute`(`product_attribute_id`);
alter table `product` add foreign key(`product_handle_id`) references `product_handle`(`product_handle_id`);
alter table `product` add foreign key(`product_packaging_type_id`) references `product_packaging_type`(`product_packaging_type_id`);
alter table `product` add foreign key(`product_stocking_type_id`) references `product_stocking_type`(`product_stocking_type_id`);
	
-- --------------------------------------------------------
-- Creates table `product_international_list_price`
-- --------------------------------------------------------
drop table if exists `product_international_list_price`;

create table if not exists `product_international_list_price` (
	`product_international_list_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`value`				numeric(10, 2) not null,
	`discount`			double not null default 0,
	`dollar_real_ratio` double not null,
	`dollar_considered` numeric(10, 4) not null,
	`real_considered` 	numeric(10, 4) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_international_list_price_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_international_list_price` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `product_resale_price`
-- --------------------------------------------------------
drop table if exists `product_resale_price`;

create table if not exists `product_resale_price` (
	`product_resale_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`value_s_ipi`				numeric(10, 2) not null,
    `value_c_ipi`				numeric(10, 2) not null,
    `mark_up`           double not null,
     `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_resale_price_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_resale_price` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `product_builder_price`
-- --------------------------------------------------------
drop table if exists `product_builder_price`;

create table if not exists `product_builder_price` (
	`product_builder_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`value_s_ipi`				numeric(10, 2) not null,
    `value_c_ipi`				numeric(10, 2) not null,
    `mark_up`           double not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_builder_price_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_builder_price` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `product_consumer_price`
-- --------------------------------------------------------
drop table if exists `product_consumer_price`;

create table if not exists `product_consumer_price` (
	`product_consumer_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`value_s_ipi`				numeric(10, 2) not null,
    `value_c_ipi`				numeric(10, 2) not null,
    `mark_up`           double not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_consumer_price_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_consumer_price` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `product_suggested_price`
-- --------------------------------------------------------
drop table if exists `product_suggested_price`;

create table if not exists `product_suggested_price` (
	`product_suggested_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`value`				numeric(10, 2) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_suggested_price_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_suggested_price` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `product_sell_price`
-- --------------------------------------------------------
drop table if exists `product_sell_price`;

create table if not exists `product_sell_price` (
	`product_sell_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`distribuitor_id`			int(11) not null,
	`value`				numeric(10, 2) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_sell_price_id`, `product_id`, `distribuitor_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_sell_price` add foreign key(`product_id`) references `product`(`product_id`);
alter table `product_sell_price` add foreign key(`distribuitor_id`) references `distribuitor`(`customer_distribuitor_id`);

-- --------------------------------------------------------
-- Creates table `product_purchase_price`
-- --------------------------------------------------------
drop table if exists `product_purchase_price`;

create table if not exists `product_purchase_price` (
	`product_purchase_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`distribuitor_id`			int(11) not null,
	`value`				numeric(10, 2) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_purchase_price_id`, `product_id`, `distribuitor_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_purchase_price` add foreign key(`product_id`) references `product`(`product_id`);
alter table `product_purchase_price` add foreign key(`distribuitor_id`) references `customer_distribuitor`(`customer_distribuitor_id`);


-- --------------------------------------------------------
-- Creates table `product_transfer_price`
-- --------------------------------------------------------
drop table if exists `product_transfer_price`;

create table if not exists `product_transfer_price` (
	`product_transfer_price_id`		int(11) not null auto_increment,
	`product_id`				int(11) not null,
	`distribuitor_id`			int(11) not null,
	`value`				numeric(10, 2) not null,
	 `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`product_transfer_price_id`, `product_id`, `distribuitor_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `product_transfer_price` add foreign key(`product_id`) references `product`(`product_id`);
alter table `product_transfer_price` add foreign key(`distribuitor_id`) references `customer_distribuitor`(`customer_distribuitor_id`);

-- --------------------------------------------------------
-- Creates table `inventory`
-- --------------------------------------------------------
drop table if exists `inventory`;

create table if not exists `inventory` (
	`inventory_id`		int(11) not null auto_increment,
	`description`			varchar(255) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`inventory_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `inventory` (`description`) values ('Quartinho');
insert into `inventory` (`description`) values ('Sudeste');
insert into `inventory` (`description`) values ('Guarde Aqui');

-- --------------------------------------------------------
-- Creates table `inventory_product`
-- --------------------------------------------------------
drop table if exists `inventory_product`;

create table if not exists `inventory_product` (
	`inventory_id`		int(11) not null auto_increment,
    `product_id`        int(11) not null,
    `quantity`          int(11) not null default 0,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`inventory_id`, `product_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `inventory_product` add foreign key(`inventory_id`) references `inventory`(`inventory_id`);
alter table `inventory_product` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `inventory_log`
-- --------------------------------------------------------
drop table if exists `inventory_log`;

create table if not exists `inventory_log` (
	`inventory_log_id`  int(11) not null auto_increment,
    `inventory_id`		int(11) not null,
    `product_id`        int(11) not null,
    `quantity`          int(11) not null default 0,
    `type`              char(1) not null default 'e'
        check(`type` in ('e', 's')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`inventory_log_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `inventory_log` add foreign key(`inventory_id`) references `inventory`(`inventory_id`);
alter table `inventory_log` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `distribuitor`
-- --------------------------------------------------------
drop table if exists `distribuitor`;

create table if not exists `distribuitor` (
	`distribuitor_id`		int(11) not null auto_increment,
    `user_id`               int(11) not null,
    `state_id`				int(11) null,
	`city_id`				int(11) null,
    `city_text`         varchar(255) null,
    `state`             char(2) null,
    `address`           varchar(1024) null,
    `cep`               varchar(25) null,
    `fantasy_name`		varchar(255) null,
    `delta_code`        varchar(3) null,
	`company_name`		varchar(255) null,
	`cnpj`				varchar(255) null,
	`ie`				varchar(25) null,
	`iss`				varchar(25) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`distribuitor_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `distribuitor` add foreign key (`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `distribuitor_inventory_product`
-- --------------------------------------------------------
drop table if exists `distribuitor_inventory_product`;

create table if not exists `distribuitor_inventory_product` (
    `distribuitor_id`       int(11) not null,
    `product_id`            int(11) not null,
    `quantity`              int(11) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `distribuitor_inventory_product` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `distribuitor_inventory_product` add foreign key (`product_id`) references `product`(`product_id`);


-- --------------------------------------------------------
-- Creates table `manager`
-- --------------------------------------------------------
drop table if exists `manager`;

create table if not exists `manager` (
	`manager_id`		int(11) not null auto_increment,
	`user_id`				int(11) not null,
	`phone`					varchar(20) null,
	`cellphone`				varchar(20) null,
	`cpf`					varchar(20) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`manager_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `manager` add foreign key(`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `manager_portfolio`
-- --------------------------------------------------------
drop table if exists `manager_portfolio`;

create table if not exists `manager_portfolio` (
    `manager_id`		int(11) not null,
	`customer_id`			int(11) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`manager_id`, `customer_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `manager_portfolio` add foreign key(`manager_id`) references `manager`(`manager_id`);
alter table `manager_portfolio` add foreign key(`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `distribuitor_portfolio`
-- --------------------------------------------------------
drop table if exists `distribuitor_portfolio`;

create table if not exists `distribuitor_portfolio` (
    `distribuitor_id`		int(11) not null,
	`customer_id`			int(11) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`distribuitor_id`, `customer_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `distribuitor_portfolio` add foreign key(`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `distribuitor_portfolio` add foreign key(`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `representant_profile`
-- --------------------------------------------------------
drop table if exists `representant_profile`;

create table if not exists `representant_profile` (
    `representant_profile_id` int(11) not null auto_increment,
    `description`       varchar(255) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_profile_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `representant_profile` (`description`) values ('Misto');
insert into `representant_profile` (`description`) values ('Hoteis');
insert into `representant_profile` (`description`) values ('Pequenos Showrooms');

-- --------------------------------------------------------
-- Creates table `representant_company`
-- --------------------------------------------------------
drop table if exists `representant_company`;

create table if not exists `representant_company` (
    `representant_company_id` int(11) not null auto_increment,
    `name`              varchar(255) null,
    `cnpj`              varchar(20) null,
    `ie`                varchar(25) null,
    `address`           varchar(2048) null,
    `city`              varchar(1024) null,
    `state`             char(2) null,
    `district`          varchar(1024) null,
    `phone2`					varchar(25) null,
    `bank_name`             varchar(255) null,
    `bank_agency`           varchar(255) null,
    `bank_cc`               varchar(255) null,
    `bank_number`           varchar(255) null,
    `start_operated_date`   timestamp null,
    `cep`               varchar(24) null,   
    `phone`             varchar(20) null,������������������������������������������������������������������������������������������������������������
    `email`             varchar(255) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_company_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `representant_company`(`name`) values ('Mopesp Representações Ltda.');
insert into `representant_company`(`name`) values ('Stagemix Representações Comerciais Ltda.');
insert into `representant_company`(`name`) values ('G.A. Colombo e Cia Ltda.');
insert into `representant_company`(`name`) values ('Aspenzr Representações Comerciais Ltda.');
insert into `representant_company`(`name`) values ('Almeida & Franca Representações Ltda.');
insert into `representant_company`(`name`) values ('Riden Representações de Ferragens Ltda. ME');
insert into `representant_company`(`name`) values ('Representações Z Rio Ltda');
insert into `representant_company`(`name`) values ('VHC Representações Ltda');
insert into `representant_company`(`name`) values ('Spagnul Representções Ltda');

-- --------------------------------------------------------
-- Creates table `representant_company_partner`
-- --------------------------------------------------------
drop table if exists `representant_company_partner`;

create table if not exists `representant_company_partner` (
	`representant_company_partner_id`  int(11) not null auto_increment,
    `representant_company_id`       int(11) null,
    `user_id`           int(11) null,
    `name`              varchar(255) null,
    `role`              varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_company_partner_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant_company_partner` add foreign key(`representant_company_id`) references `representant_company`(`representant_company_id`);
alter table `representant_company_partner` add foreign key(`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `representant`
-- --------------------------------------------------------
drop table if exists `representant`;

create table if not exists `representant` (
	`representant_id`		int(11) not null auto_increment,
    `manager_id`            int(11) not null,
    `representant_company_id` int(11) null,
    `representant_profile_id` int(11) null,
	`user_id`				int(11) not null,
	`phone`					varchar(20) null,
	`cellphone`				varchar(20) null,
	`cpf`					varchar(20) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant` add foreign key(`user_id`) references `user`(`user_id`);
alter table `representant` add foreign key(`manager_id`) references `user`(`manager_id`);
alter table `representant` add foreign key(`representant_company_id`) references `representant_company`(`representant_company_id`);
alter table `representant` add foreign key(`representant_profile_id`) references `representant_profile`(`representant_profile_id`);

-- --------------------------------------------------------
-- Creates table `report_kpi`
-- --------------------------------------------------------
drop table if exists `report_kpi`;

create table if not exists `report_kpi` (
	`report_kpi_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`report_kpi_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- --------------------------------------------------------
-- Creates table `representant_kpi`
-- --------------------------------------------------------
drop table if exists `representant_kpi`;

create table if not exists `representant_kpi` (
	`representant_id`		int(11) not null auto_increment,
    `report_kpi_id`			int(11) not null,
	`kpi_total`				decimal(16, 2) null,
	`kpi_goal_1`			decimal(16, 2) null,
	`kpi_goal_2`			decimal(16, 2) null,
	`kpi_goal_3`			decimal(16, 2) null,
	`kpi_goal_4`			decimal(16, 2) null,
	`kpi_goal_5`			decimal(16, 2) null,
	`kpi_goal_6`			decimal(16, 2) null,
	`kpi_goal_7`			decimal(16, 2) null,
	`kpi_goal_8`			decimal(16, 2) null,
	`kpi_goal_9`			decimal(16, 2) null,
	`kpi_goal_10`			decimal(16, 2) null,
	`kpi_goal_11`			decimal(16, 2) null,
	`kpi_goal_12`			decimal(16, 2) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_id`, `report_kpi_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant_kpi` add foreign key(`report_kpi_id`) references `report_kpi`(`report_kpi_id`);
alter table `representant_kpi` add foreign key(`representant_id`) references `representant`(`representant_id`);

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_status`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_status`;

create table if not exists `customer_credit_analysis_status` (
    `customer_credit_analysis_status_id` int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_credit_analysis_status_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_credit_analysis_status` (`description`) values ('Sob Análise');
insert into `customer_credit_analysis_status` (`description`) values ('Não Aprovado');
insert into `customer_credit_analysis_status` (`description`) values ('Aprovado');

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_range`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_range`;

create table if not exists `customer_credit_analysis_range` (
    `customer_credit_analysis_range_id` int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_credit_analysis_range_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_credit_analysis_range` (`description`) values ('Antecipado');
insert into `customer_credit_analysis_range` (`description`) values ('Até R$ 5.000');
insert into `customer_credit_analysis_range` (`description`) values ('Até R$ 10.000');
insert into `customer_credit_analysis_range` (`description`) values ('Até R$ 25.000');
insert into `customer_credit_analysis_range` (`description`) values ('Até R$ 50.000');
insert into `customer_credit_analysis_range` (`description`) values ('Até R$ 100.000');
insert into `customer_credit_analysis_range` (`description`) values ('Maior que R$ 100.000');

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis`;

create table if not exists `customer_credit_analysis` (
    `customer_credit_analysis_id` int(11) not null auto_increment,
    `customer_id`       int(11) null,
    `representant_id`   int(11) null,
    `manager_id`        int(11) null,
    `customer_credit_analysis_status_id`   int(11) null,
    `customer_credit_analysis_range_id` int(11) null,
    `observation`       varchar(1024) null,
    `first_order_value` numeric(15, 2) not null,
    `credit_required`   numeric(15, 2) not null,
    `cnpj_filepath`     varchar(1024) null,
    `ie_filepath`     varchar(1024) null,
    `social_contract_filepath`     varchar(1024) null,
    `dre_filepath`     varchar(1024) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_credit_analysis_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_credit_analysis` add foreign key(`customer_id`) references `customer`(`customer_id`);
alter table `customer_credit_analysis` add foreign key(`representant_id`) references `representant`(`representant_id`);
alter table `customer_credit_analysis` add foreign key(`manager_id`) references `manager`(`manager_id`);
alter table `customer_credit_analysis` add foreign key(`customer_credit_analysis_status_id`) references `customer_credit_analysis_status`(`customer_credit_analysis_status_id`);
alter table `customer_credit_analysis` add foreign key(`customer_credit_analysis_range_id`) references `customer_credit_analysis_range`(`customer_credit_analysis_range_id`);

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_note`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_note`;

create table if not exists `customer_credit_analysis_note` (
	`customer_credit_analysis_id` int(11) not null,
    `from_id`       int(11) not null,
    `text`          varchar(2048) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_credit_analysis_note` add foreign key (`customer_credit_analysis_id`) references `customer_credit_analysis`(`customer_credit_analysis_id`);
alter table `customer_credit_analysis_note` add foreign key (`from_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_request_status`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_request_status`;

create table if not exists `customer_credit_analysis_request_status` (
    `customer_credit_analysis_request_status_id` int(11) not null auto_increment,
    `description`       varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_credit_analysis_request_status_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `customer_credit_analysis_request_status` (`description`) values ('Sob Análise');
insert into `customer_credit_analysis_request_status` (`description`) values ('Não Aprovado');
insert into `customer_credit_analysis_request_status` (`description`) values ('Aprovado');


-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_request`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_request`;

create table if not exists `customer_credit_analysis_request` (
    `customer_credit_analysis_id` int(11) not null,
    `distribuitor_id`               int(11) not null,
    `customer_credit_analysis_request_status_id`   int(11) null,
    `credit_analysis_range_id`          int(11) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`customer_credit_analysis_id`, `distribuitor_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_credit_analysis_request` add foreign key (`customer_credit_analysis_id`) references `customer_credit_analysis`(`customer_credit_analysis_id`);
alter table `customer_credit_analysis_request` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `customer_credit_analysis_request` add foreign key (`customer_credit_analysis_request_status_id`) references `customer_credit_analysis_request_status`(`customer_credit_analysis_request_status_id`);

-- --------------------------------------------------------
-- Creates table `customer_credit_analysis_request_note`
-- --------------------------------------------------------
drop table if exists `customer_credit_analysis_request_note`;

create table if not exists `customer_credit_analysis_request_note` (
	`customer_credit_analysis_id` int(11) not null,
    `from_id`       int(11) not null,
    `distribuitor_id` int(11) null,
    `text`          varchar(2048) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `customer_credit_analysis_request_note` add foreign key (`customer_credit_analysis_id`) references `customer_credit_analysis`(`customer_credit_analysis_id`);
alter table `customer_credit_analysis_request_note` add foreign key (`from_id`) references `user`(`user_id`);
alter table `customer_credit_analysis_request_note` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);

-- --------------------------------------------------------
-- Creates table `representant_budget_payment_condition`
-- --------------------------------------------------------
drop table if exists `representant_budget_payment_condition`;

create table if not exists `representant_budget_payment_condition` (
	`representant_budget_payment_condition_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_budget_payment_condition_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `representant_budget_payment_condition` (`description`) values (	'NEGOCIADO - VIDE OBS'	);
insert into `representant_budget_payment_condition` (`description`) values (	'ANTECIPADO'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 07 DD - 7 DD - FINANCEIRO DE 07 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 00 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 28 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 14 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 42 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 28 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 56 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 28 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 56 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 42 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 70 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 56 DD'	);
insert into `representant_budget_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 84 DD'	);

-- --------------------------------------------------------
-- Creates table `representant_portfolio`
-- --------------------------------------------------------
drop table if exists `representant_portfolio`;

create table if not exists `representant_portfolio` (
    `representant_id`		int(11) not null,
	`customer_id`			int(11) not null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_id`, `customer_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant_portfolio` add foreign key(`representant_id`) references `representant`(`representant_id`);
alter table `representant_portfolio` add foreign key(`customer_id`) references `customer`(`customer_id`);


-- --------------------------------------------------------
-- Creates table `representant_budget`
-- --------------------------------------------------------
drop table if exists `representant_budget`;

create table if not exists `representant_budget` (
	`representant_budget_id`		int(11) not null auto_increment,
	`representant_id`			int(11) null,
    `manager_id`                int(11) null,
	`customer_id`				int(11) null,
    `distribuitor_id`           int(11) null,
	`representant_budget_payment_condition_id` int(11) null,
	`payment_details`           varchar(1024) null,
    `email_filepath`            varchar(1024) null,
    `observation`               varchar(2048) null,
    `title`                     varchar(255) null,
	`architect_fee`				double null,
    `interest_rate`             double null,
	`other_charging`			numeric(16,2) null,
    `grand_total`               numeric(16, 2) null,
    `product_values`            numeric(16, 2) null,
	`accept_different_orders`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`accept_partial_delivery`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`is_draft`					char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`representant_budget_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant_budget` add foreign key (`representant_id`) references `representant`(`representant_id`);
alter table `representant_budget` add foreign key (`customer_id`) references `customer`(`customer_id`);
alter table `representant_budget` add foreign key (`manager_id`) references `manager`(`manager_id`);
alter table `representant_budget` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `representant_budget` add foreign key (`representant_budget_payment_condition_id`) references `representant_budget_payment_condition`(`representant_budget_payment_condition`);
alter table `representant_budget` add foreign key (`representant_budget_goal_id`) references `representant_budget_goal`(`representant_budget_goal_id`);

-- --------------------------------------------------------
-- Creates table `representant_budget_product`
-- --------------------------------------------------------
drop table if exists `representant_budget_product`;

create table if not exists `representant_budget_product` (
	`representant_budget_id` int(11) not null,
	`product_id`			int(11) not null,
	`quantity`				int(11) null,
    `price_c_ipi`       numeric(16,2) null,
    `price_s_ipi`       numeric(16,2) null,
	`discount`			double null,
    `price_c_discount`  numeric(16, 2) null,
    `total_price`       numeric(16, 2) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `representant_budget_product` add foreign key (`representant_budget_id`) references `representant_budget`(`representant_budget_id`);
alter table `representant_budget_product` add foreign key (`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `order_payment_condition`
-- --------------------------------------------------------
drop table if exists `order_payment_condition`;

create table if not exists `order_payment_condition` (
	`order_payment_condition_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`order_payment_condition_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `order_payment_condition` (`description`) values (	'NEGOCIADO - VIDE OBS'	);
insert into `order_payment_condition` (`description`) values (	'ANTECIPADO'	);
insert into `order_payment_condition` (`description`) values (	'PM 07 DD - 7 DD - FINANCEIRO DE 07 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 00 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 28 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 14 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 42 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 28 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 56 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 28 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 56 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 42 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 70 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 56 DD'	);
insert into `order_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 84 DD'	);

-- --------------------------------------------------------
-- Creates table `order_status`
-- --------------------------------------------------------
drop table if exists `order_status`;

create table if not exists `order_status` (
	`order_status_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`order_status_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `order_status` (`description`) values ('Sob Análise');
insert into `order_status` (`description`) values ('Reprovado');
insert into `order_status` (`description`) values ('Aprovado');
insert into `order_status` (`description`) values ('Sob Análise Logística');
insert into `order_status` (`description`) values ('Enviado para Distribuidor');
insert into `order_status` (`description`) values ('Enviado para Cliente');
insert into `order_status` (`description`) values ('Finalizado');

-- --------------------------------------------------------
-- Creates table `order`
-- --------------------------------------------------------
drop table if exists `order`;

create table if not exists `order` (
    `order_id`		        int(11) not null auto_increment,
	`representant_id`       int(11) null,
    `manager_id`            int(11) null,
    `customer_id`			int(11) null,
    `order_status_id`       int(11) null,
	`order_payment_condition_id` int(11) null,
    `manager_observation`       varchar(2048) null,
    `representant_budget_id`          int(11) null,
	`payment_details`           varchar(1024) null,
    `observation`               varchar(2048) null,
    `final_observation`               varchar(2048) null,
    `title`                     varchar(255) null,
	`architect_fee`				double null,
    `interest_rate`             double null,
	`other_charging`			numeric(16,2) null,
    `grand_total`               numeric(16, 2) null,
    `product_values`            numeric(16, 2) null,
    `match_police`              char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),     
	`accept_different_orders`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`accept_partial_delivery`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`order_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `order` add foreign key (`representant_id`) references `representant`(`representant_id`);
alter table `order` add foreign key (`manager_id`) references `manager`(`manager_id`);
alter table `order` add foreign key (`customer_id`) references `customer`(`customer_id`);
alter table `order` add foreign key (`order_payment_condition_id`) references `order_payment_condition`(`order_payment_condition_id`);
alter table `order` add foreign key (`order_status_id`) references `order_status`(`order_status_id`);
alter table `order` add foreign key (`representant_budget_id`) references `representant`(`representant_budget_id`);

-- --------------------------------------------------------
-- Creates table `order_product`
-- --------------------------------------------------------
drop table if exists `order_product`;

create table if not exists `order_product` (
    `order_product_id`  int(11) not null auto_increment,
	`order_id`          int(11) not null,
	`product_id`		int(11) not null,
    `distribuitor_id`          int(11) null,
	`quantity`				int(11) null,
    `price_c_ipi`       numeric(16,2) null,
    `price_s_ipi`       numeric(16,2) null,
	`discount`			double null,
    `price_c_discount`  numeric(16, 2) null,
    `total_price`       numeric(16, 2) null,
    `approved_discount` double null,
    `approved`          char(1) not null default 's' 
		check(`active` in ('s', 'n', '?')),
    `dist_approval`          char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key (`order_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `order_product` add foreign key (`order_id`) references `order`(`order_id`);
alter table `order_product` add foreign key (`product_id`) references `product`(`product_id`);
alter table `order_product` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);

-- --------------------------------------------------------
-- Creates table `order_product_note`
-- --------------------------------------------------------
drop table if exists `order_product_note`;

create table if not exists `order_product_note` (
	`order_id`		int(11) not null,
    `product_id`    int(11) not null,
    `from_id`       int(11) not null,
    `text`          varchar(2048) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


-- --------------------------------------------------------
-- Creates table `sub_order_status`
-- --------------------------------------------------------
drop table if exists `sub_order_status`;

create table if not exists `sub_order_status` (
	`sub_order_status_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`sub_order_status_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `sub_order_status` (`description`) values ('Sob Análise');
insert into `sub_order_status` (`description`) values ('Reprovado');
insert into `sub_order_status` (`description`) values ('Aprovado');
insert into `sub_order_status` (`description`) values ('Sob Análise Logística');
insert into `sub_order_status` (`description`) values ('Enviado para Distribuidor');
insert into `sub_order_status` (`description`) values ('Enviado para Cliente');
insert into `sub_order_status` (`description`) values ('Finalizado');

-- --------------------------------------------------------
-- Creates table `sub_order_payment_condition`
-- --------------------------------------------------------
drop table if exists `sub_order_payment_condition`;

create table if not exists `sub_order_payment_condition` (
	`sub_order_payment_condition_id`		int(11) not null auto_increment,
	`description`		varchar(255) not null null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`sub_order_payment_condition_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `sub_order_payment_condition` (`description`) values (	'NEGOCIADO - VIDE OBS'	);
insert into `sub_order_payment_condition` (`description`) values (	'ANTECIPADO'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 07 DD - 7 DD - FINANCEIRO DE 07 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 00 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 28 DD - 28 DD  - FINANCEIRO DE 28 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 14 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 42 DD - 28/56 DD  - FINANCEIRO DE 42 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 28 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 56 DD - 28/56/84 DD  - FINANCEIRO DE 56 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 28 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 56 DD - 56 DD  - FINANCEIRO DE 56 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 42 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 70 DD - 28/56/84/112 DD  - FINANCEIRO DE 70 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 56 DD'	);
insert into `sub_order_payment_condition` (`description`) values (	'PM 84 DD - 28/56/84/112/140 DD  - FINANCEIRO DE 84 DD'	);

-- --------------------------------------------------------
-- Creates table `sub_order`
-- --------------------------------------------------------
drop table if exists `sub_order`;

create table if not exists `sub_order` (
    `sub_order_id`		        int(11) not null auto_increment,
	`order_id`              int(11) null,
    `distribuitor_id`          int(11) null,
    `manager_id`            int(11) null,
    `customer_id`			int(11) null,
    `representant_company_id`       int(11) null,
    `sub_order_status_id`       int(11) null,
	`sub_order_payment_condition_id` int(11) null,
    `representant_budget_id`          int(11) null,
	`observation`               varchar(2048) null,
    `title`                     varchar(255) null,
    `representant_fee`          decimal(10, 2) null,
	`architect_fee`				double null,
    `interest_rate`             double null,
	`other_charging`			numeric(16,2) null,
    `grand_total`               numeric(16, 2) null,
    `product_values`            numeric(16, 2) null,
    `accept_different_orders`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`accept_partial_delivery`	char(1) not null default 'n'
		check(`accept_partial_delivery` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
	primary key(`sub_order_id`)	
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


alter table `sub_order` add foreign key (`order_id`) references `order`(`order_id`);
alter table `sub_order` add foreign key (`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `sub_order` add foreign key (`manager_id`) references `manager`(`manager_id`);
alter table `sub_order` add foreign key (`customer_id`) references `customer`(`customer_id`);
alter table `sub_order` add foreign key (`representant_company_id`) references `representant_company`(`representant_company_id`);
alter table `sub_order` add foreign key (`sub_order_status_id`) references `sub_order_status`(`sub_order_status_id`);
alter table `sub_order` add foreign key (`sub_order_payment_condition_id`) references `sub_order_payment_condition`(`sub_order_payment_condition_id`);
alter table `sub_order` add foreign key (`representant_budget_id`) references `representant`(`representant_budget_id`);

-- --------------------------------------------------------
-- Creates table `sub_order_product`
-- --------------------------------------------------------
drop table if exists `sub_order_product`;

create table if not exists `sub_order_product` (
	`sub_order_id` int(11) not null,
	`product_id`			int(11) not null,
    `quantity`				int(11) null,
    `price_c_ipi`       numeric(16,2) null,
    `price_s_ipi`       numeric(16,2) null,
	`discount`			double null,
    `price_c_discount`  numeric(16, 2) null,
    `total_price`       numeric(16, 2) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sub_order_product` add foreign key (`order_id`) references `sub_order`(`sub_order_id`);
alter table `sub_order_product` add foreign key (`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `sub_order_note`
-- --------------------------------------------------------
drop table if exists `sub_order_note`;

create table if not exists `sub_order_note` (
	`sub_order_id`		int(11) not null,
    `from_id`       int(11) not null,
    `text`          varchar(2048) null,
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sub_order_note` add foreign key (`sub_order_id`) references `sub_order`(`sub_order_id`);
alter table `sub_order_note` add foreign key (`from_id`) references `user`(`user_id`);


-- --------------------------------------------------------
-- Creates table `invoice_status`
-- --------------------------------------------------------
drop table if exists `invoice_status`;

create table if not exists `invoice_status` (
    `invoice_status_id`		        int(11) not null auto_increment,
    `description`               varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`invoice_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `invoice_status`(`description`) values ('Sob Faturamento');
insert into `invoice_status`(`description`) values ('Cancelada por Distribuidor');
insert into `invoice_status`(`description`) values ('Cancelada pela Delta');
insert into `invoice_status`(`description`) values ('Cancelada por cliente');

-- --------------------------------------------------------
-- Creates table `invoice`
-- --------------------------------------------------------
drop table if exists `invoice`;

create table if not exists `invoice` (
    `invoice_id`		        int(11) not null auto_increment,
    `invoice_status_id`         int(11) null,
    `sub_order_id`              int(11) null,
    `sub_order_quota`           double null,
    `code`                      varchar(255) null, 
    `product_value`            numeric(16, 2) null,
    `grand_total`               numeric(16, 2) null,
    `filepath`              varchar(1024) null,
	`due_date`          timestamp null,
    `emission_date`     timestamp null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
    
alter table `invoice` add foreign key (`sub_order_id`) references `sub_order`(`sub_order_id`);
alter table `invoice` add foreign key (`invoice_status_id`) references `invoice_status`(`invoice_status_id`);

-- --------------------------------------------------------
-- Creates table `invoice_item`
-- --------------------------------------------------------
drop table if exists `invoice_item`;

create table if not exists `invoice_item` (
    `invoice_id`		        int(11) not null,
    `product_id`                int(11) not null,
    `quantity`                  int(11) null,
    `unit_price`                numeric(16, 2) null,
    `fee_quota`                 numeric(16, 2) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `invoice_item` add foreign key (`invoice_id`) references `invoice`(`invoice_id`);
alter table `invoice_item` add foreign key (`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `installment_status`
-- --------------------------------------------------------
drop table if exists `installment_status`;

create table if not exists `installment_status` (
    `installment_status_id`		        int(11) not null auto_increment,
    `description`               varchar(255) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`installment_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `installment_status` (`description`) values ('Aguardando Pagamento');
insert into `installment_status` (`description`) values ('Pago');
insert into `installment_status` (`description`) values ('Cancelada');

-- --------------------------------------------------------
-- Creates table `installment`
-- --------------------------------------------------------
drop table if exists `installment`;

create table if not exists `installment` (
    `installment_id`            int(11) not null auto_increment,
    `installment_status_id`         int(11) null,
    `invoice_id`              int(11) null,
    `invoice_quota`           double null,
    `code`                      varchar(255) null, 
    `grand_total`               numeric(16, 2) null,
    `filepath`              varchar(1024) null,
	`emission_date`     timestamp null,
    `due_date`          timestamp null,
    `fee_is_paid`		char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`installment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `installment` add foreign key (`invoice_id`) references `invoice`(`invoice_id`);
alter table `installment` add foreign key (`installment_status_id`) references `installment_status`(`installment_status_id`);

-- --------------------------------------------------------
-- Creates table `installment_item`
-- --------------------------------------------------------
drop table if exists `installment_item`;

create table if not exists `installment_item` (
    `installment_id`		        int(11) not null,
    `product_id`                int(11) not null,
    `quantity`                  int(11) null,
    `unit_price`                numeric(16, 2) null,
    `grand_total`                numeric(16, 2) null,
    `fee_quota`                 numeric(16, 2) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `installment_item` add foreign key (`installment_id`) references `installment`(`installment_id`);
alter table `installment_item` add foreign key (`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `fee_report`
-- --------------------------------------------------------
drop table if exists `fee_report`;

create table if not exists `fee_report` (
    `fee_report_id`     int(11) not null auto_increment,
    `representant_id`   int(11) null,
    `manager_id`   int(11) null,
    `distribuitor_id`   int(11) null,
    `nfe_filepath`      varchar(1024) null,
    `is_paid`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`fee_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `fee_report` add foreign key(`representant_id`) references `representant`(`representant_id`);
alter table `fee_report` add foreign key(`manager_id`) references `manager`(`manager_id`);
alter table `fee_report` add foreign key(`distribuitor_id`) references `distribuitor`(`distribuitor_id`);

-- --------------------------------------------------------
-- Creates table `fee_report_item`
-- --------------------------------------------------------
drop table if exists `fee_report_item`;

create table if not exists `fee_report_item` (
    `fee_report_id`     int(11) null,
    `installment_id`   int(11) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `fee_report_item` add foreign key(`fee_report_id`) references `fee_report`(`fee_report_id`);
alter table `fee_report_item` add foreign key(`installment_id`) references `installment`(`installment_id`);

-- --------------------------------------------------------
-- Creates table `influencer_type`
-- --------------------------------------------------------
drop table if exists `influencer_type`;

create table if not exists `influencer_type` (
    `influencer_type_id`    int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`influencer_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `influencer_type`(`description`) values ('Engineer');
insert into `influencer_type`(`description`) values ('Other');
insert into `influencer_type`(`description`) values ('Owner');
insert into `influencer_type`(`description`) values ('Architect');
insert into `influencer_type`(`description`) values ('Plumber');

-- --------------------------------------------------------
-- Creates table `influencer`
-- --------------------------------------------------------
drop table if exists `influencer`;

create table if not exists `influencer` (
    `influencer_id`     int(11) not null auto_increment,
    `influencer_type_id` int(11) null,
    `representant_id`   int(11) null,
    `manager_id`        int(11) null,
    `distribuitor_id`   int(11) null,
    `customer_id`       int(11) null,
    `name`              varchar(255) null,
    `email`             varchar(255) null,
    `website`           varchar(255) null,
    `phone`             varchar(25) null,
    `phone2`            varchar(25) null,
    `cellphone`         varchar(25) null,
    `cpf_cnpj`          varchar(30) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`influencer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `influencer` add foreign key(`influencer_type_id`) references `influencer_type`(`influencer_type_id`);
alter table `influencer` add foreign key(`representant_id`) references `representant`(`representant_id`);
alter table `influencer` add foreign key(`manager_id`) references `manager`(`manager_id`);
alter table `influencer` add foreign key(`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `influencer` add foreign key(`customer_id`) references `customer`(`customer_id`);

-- --------------------------------------------------------
-- Creates table `project_type`
-- --------------------------------------------------------
drop table if exists `project_type`;

create table if not exists `project_type` (
    `project_type_id`   int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`project_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


-- --------------------------------------------------------
-- Creates table `project_type`
-- --------------------------------------------------------
drop table if exists `project_type`;

create table if not exists `project_type` (
    `project_type_id`   int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`project_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `project_type`(`description`) values ('Healthcare');
insert into `project_type`(`description`) values ('Hospitality');
insert into `project_type`(`description`) values ('Multi-Family');
insert into `project_type`(`description`) values ('Other');

-- --------------------------------------------------------
-- Creates table `project_stage`
-- --------------------------------------------------------
drop table if exists `project_stage`;

create table if not exists `project_stage` (
    `project_stage_id`   int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`project_stage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `project_stage`(`description`) values ('Closed');
insert into `project_stage`(`description`) values ('Identified');
insert into `project_stage`(`description`) values ('Mock-up Room');
insert into `project_stage`(`description`) values ('Proposal');
insert into `project_stage`(`description`) values ('Delta Specified');
insert into `project_stage`(`description`) values ('Prospect');

-- --------------------------------------------------------
-- Creates table `project_closed_status`
-- --------------------------------------------------------
drop table if exists `project_closed_status`;

create table if not exists `project_closed_status` (
    `project_closed_status_id`   int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`project_closed_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `project_closed_status`(`description`) values ('Complete');
insert into `project_closed_status`(`description`) values ('Lost');
insert into `project_closed_status`(`description`) values ('Cancelled');
insert into `project_closed_status`(`description`) values ('Won');
insert into `project_closed_status`(`description`) values ('Dropped');
                                                           
-- --------------------------------------------------------
-- Creates table `project`
-- --------------------------------------------------------
drop table if exists `project`;

create table if not exists `project` (
    `project_id`     int(11) not null auto_increment,
    `representant_id`   int(11) null,
    `manager_id`   int(11) null,
    `project_type_id`   int(11) null,
    `project_stage_id`  int(11) null,
    `project_closed_status_id`  int(11) null,
    `distribuitor_id`   int(11) null,
    `influencer_id`     int(11) null,
    `title`             varchar(255) null,
    `description`       varchar(1024) null,
    `city_text`         varchar(250) null,
    `state`             char(2) null,
    `confidence_level`  double not null default 0,
    `est_arrival`			timestamp null,
    `product_units`     int(11) null,
    `project_value`     decimal(16, 2) null,
    `brag_book`	char(1) not null default 's' 
		check(`active` in ('s', 'n', '?')),
    `includes_brizo`	char(1) not null default 's' 
		check(`active` in ('s', 'n', '?')),
    `specified_in_us`	char(1) not null default 's' 
		check(`active` in ('s', 'n')),
    `enter_in_forecast`	char(1) not null default 's' 
		check(`active` in ('s', 'n')),
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `project` add foreign key(`representant_id`) references `representant`(`representant_id`);
alter table `project` add foreign key(`manager_id`) references `manager`(`manager_id`);
alter table `project` add foreign key(`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `project` add foreign key(`influencer_id`) references `influencer`(`influencer_id`);
alter table `project` add foreign key(`project_type_id`) references `project_type`(`project_type_id`);
alter table `project` add foreign key(`project_stage_id`) references `project_stage`(`project_stage_id`);
alter table `project` add foreign key(`project_closed_status_id`) references `project_closed_status`(`project_closed_status_id`);

-- --------------------------------------------------------
-- Creates table `project_influencer`
-- --------------------------------------------------------
drop table if exists `project_influencer`;

create table if not exists `project_influencer` (
    `influencer_id`    int(11) not null,
    `project_id`        int(11) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `project_influencer` add foreign key (`influencer_id`) references `influencer`(`influencer_id`);
alter table `project_influencer` add foreign key (`project_id`) references `project`(`project_id`);

-- --------------------------------------------------------
-- Creates table `project_note`
-- --------------------------------------------------------
drop table if exists `project_note`;

create table if not exists `project_note` (
    `project_id`        int(11) not null,
    `user_id`           int(11) not null,
    `text`              text not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `project_note` add foreign key (`project_id`) references `project`(`project_id`);

-- --------------------------------------------------------
-- Creates table `project_budget`
-- --------------------------------------------------------
drop table if exists `project_budget`;

create table if not exists `project_budget` (
  `project_id`        int(11) not null,
	`representant_budget_id` int(11) not null,
  `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `project_budget` add foreign key (`project_id`) references `project`(`project_id`);
alter table `project_budget` add foreign key (`representant_budget_id`) references `representant_budget`(`representant_budget_id`);

-- --------------------------------------------------------
-- Creates table `post_tag`
-- --------------------------------------------------------
drop table if exists `post_tag`;

create table if not exists `post_tag` (
    `post_tag_id`     int(11) not null auto_increment,
    `description`   varchar(255) not null,
    `color`         varchar(30) null, 
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`post_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `post_tag`(`description`, `color`) values ('Cliente', 'bg-success');
insert into `post_tag`(`description`, `color`) values ('Pedido', 'bg-info');
insert into `post_tag`(`description`, `color`) values ('Projeto', 'bg-warning');
insert into `post_tag`(`description`, `color`) values ('Urgente', 'bg-danger');
insert into `post_tag`(`description`, `color`) values ('Outro', 'bg-pa-purple');

-- --------------------------------------------------------
-- Creates table `post`
-- --------------------------------------------------------
drop table if exists `post`;

create table if not exists `post` (
    `post_id`     int(11) not null auto_increment,
    `user_id`     int(11) null,
    `tag_id`      int(11) null,  
    `subject`     varchar(255) null,
    `text`        text null,
    `has_been_seen`			char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`important`			char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `post` add foreign key(`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `post_cc`
-- --------------------------------------------------------
drop table if exists `post_cc`;

create table if not exists `post_cc` (
    `post_id`     int(11) not null,
    `cc_id`   int(11) not null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `post_cc` add foreign key(`cc_id`) references `user`(`user_id`);
alter table `post_cc` add foreign key(`post_id`) references `post`(`post_id`);

-- --------------------------------------------------------
-- Creates table `post_user_status`
-- --------------------------------------------------------
drop table if exists `post_user_status`;

create table if not exists `post_user_status` (
    `post_id`     int(11) not null,
    `user_id`   int(11) not null,
    `important`     char(1) not null default 'n',
    `has_been_seen` char(1) not null default 'n',
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `post_user_status` add foreign key(`post_id`) references `post`(`post_id`);
alter table `post_user_status` add foreign key(`user_id`) references `user`(`user_id`);

-- --------------------------------------------------------
-- Creates table `post_attachment`
-- --------------------------------------------------------
drop table if exists `post_attachment`;

create table if not exists `post_attachment` (
    `post_attachment_id`     int(11) not null auto_increment,
    `post_id`           int(11) not null,
    `filepath`          varchar(1024) null,
    `filename`          varchar(1024) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `post_attachment` add foreign key(`post_id`) references `post`(`post_id`);

-- --------------------------------------------------------
-- Creates table `sub_post`
-- --------------------------------------------------------
drop table if exists `sub_post`;

create table if not exists `sub_post` (
    `sub_post_id`     int(11) not null auto_increment,
    `post_id`       int(11) not null,
    `user_id`     int(11) null,
    `subject`     varchar(255) null,
    `text`        text null,
    `has_been_seen`			char(1) not null default 'n' 
		check(`active` in ('s', 'n')),
	`active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`sub_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sub_post` add foreign key(`user_id`) references `user`(`user_id`);
alter table `sub_post` add foreign key(`post_id`) references `post`(`post_id`);

-- --------------------------------------------------------
-- Creates table `sub_post_attachment`
-- --------------------------------------------------------
drop table if exists `sub_post_attachment`;

create table if not exists `sub_post_attachment` (
    `sub_post_attachment_id`     int(11) not null auto_increment,
    `sub_post_id`           int(11) not null,
    `filepath`          varchar(1024) null,
    `filename`          varchar(1024) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sub_post_attachment` add foreign key(`post_id`) references `sub_post`(`sub_post_id`);

-- --------------------------------------------------------
-- Creates table `sellout_invoice_nature`
-- --------------------------------------------------------
drop table if exists `sellout_invoice_nature`;

create table if not exists `sellout_invoice_nature` (
    `sellout_invoice_nature_id`     int(11) not null auto_increment,
    `description`       varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`sellout_invoice_nature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `sellout_invoice_nature` (`description`) values ('Venda');
insert into `sellout_invoice_nature` (`description`) values ('Bonificação');
insert into `sellout_invoice_nature` (`description`) values ('Amostra');
insert into `sellout_invoice_nature` (`description`) values ('Consignação');
insert into `sellout_invoice_nature` (`description`) values ('Devolução');
insert into `sellout_invoice_nature` (`description`) values ('Indenização');
insert into `sellout_invoice_nature` (`description`) values ('Venda de Entrega Futura');
insert into `sellout_invoice_nature` (`description`) values ('Troca');
insert into `sellout_invoice_nature` (`description`) values ('Reposição em Garantia');
insert into `sellout_invoice_nature` (`description`) values ('Outras Saídas');
insert into `sellout_invoice_nature` (`description`) values ('Remessa para Demonstração');
insert into `sellout_invoice_nature` (`description`) values ('Diferença a Menor em Importação');
insert into `sellout_invoice_nature` (`description`) values ('Assistência Técnica');
insert into `sellout_invoice_nature` (`description`) values ('Venda Interestadual');
insert into `sellout_invoice_nature` (`description`) values ('Venda Fora do Estado');
insert into `sellout_invoice_nature` (`description`) values ('Venda Estadual');
insert into `sellout_invoice_nature` (`description`) values ('Venda Merc. S.T. F/ Estado N. Cont.');

-- --------------------------------------------------------
-- Creates table `sellout_invoice`
-- --------------------------------------------------------
drop table if exists `sellout_invoice`;

create table if not exists `sellout_invoice` (
    `sellout_invoice_id`     int(11) not null auto_increment,
    `distribuitor_id`       int(11) null,
    `customer_id`           int(11) null,
    `sellout_invoice_nature_id` int(11) null,
    `invoice_number`        varchar(255) null,
    `order_number`          varchar(255) null,
    `invoice_date`          timestamp null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`sellout_invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sellout_invoice` add foreign key(`distribuitor_id`) references `distribuitor`(`distribuitor_id`);
alter table `sellout_invoice` add foreign key(`customer_id`) references `customer`(`customer_id`);
alter table `sellout_invoice` add foreign key(`sellout_invoice_nature_id`) references `sellout_invoice_nature`(`sellout_invoice_nature_id`);

-- --------------------------------------------------------
-- Creates table `sellout_invoice_product`
-- --------------------------------------------------------
drop table if exists `sellout_invoice_product`;

create table if not exists `sellout_invoice_product` (
    `sellout_invoice_id`    int(11) null,
    `product_id`     int(11) null,
    `unit_price`       numeric(16, 2) null,
    `quantity`         int(11) null,
    `total_price`      numeric(16, 2) null,
    `freight`          numeric(16, 2) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `sellout_invoice_product` add foreign key(`sellout_invoice_id`) references `sellout_invoice`(`sellout_invoice_id`);
alter table `sellout_invoice_product` add foreign key(`product_id`) references `product`(`product_id`);

-- --------------------------------------------------------
-- Creates table `cloud_directory`
-- --------------------------------------------------------
drop table if exists `cloud_directory`;

create table if not exists `cloud_directory` (
    `cloud_directory_id` int(11) not null auto_increment,
    `name`              varchar(255) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`cloud_directory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into `cloud_directory` (`name`) values ('Estoques');
insert into `cloud_directory` (`name`) values ('Política de Preço');

-- --------------------------------------------------------
-- Creates table `cloud_file`
-- --------------------------------------------------------
drop table if exists `cloud_file`;

create table if not exists `cloud_file` (
    `cloud_file_id`     int(11) not null auto_increment,
    `cloud_directory_id` int(11) not null,
    `user_id`           int(11) not null,
    `filename`          varchar(255) null,
    `filepath`          varchar(1024) null,
    `active`			char(1) not null default 's' 
		check(`active` in ('s', 'n')),
	`created_at`			timestamp not null default current_timestamp,
	`updated_at`		timestamp not null default current_timestamp,
    primary key(`cloud_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

alter table `cloud_file` add foreign key(`cloud_directory_id`) references `cloud_directory`(`cloud_directory_id`);
alter table `cloud_file` add foreign key(`user_id`) references `user`(`user_id`);



























