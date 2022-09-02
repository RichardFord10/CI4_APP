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



