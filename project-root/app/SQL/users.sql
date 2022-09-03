-- public.users definition

-- Drop table

-- DROP TABLE public.users;

CREATE TABLE public.users (
	user_id serial4 NOT NULL,
	user_name varchar NULL,
	user_email varchar NULL,
	first_name varchar NULL,
	last_name varchar NULL,
	"password" varchar NULL,
	"role" varchar NULL,
	CONSTRAINT users_pkey PRIMARY KEY (user_id)
);

--Password is 123456

INSERT INTO public.users
(user_name, user_email, first_name, last_name, "password", "role")
VALUES('admin', 'admin@admin.com', 'Admin', 'Admin', '$2y$10$mq7ul8pRM6IrQsVG.Y/68eIBOGnf1PGePLVqvajUGrn5LLAeu0bGK', 'admin');
