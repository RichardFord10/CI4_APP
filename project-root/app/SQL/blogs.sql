-- public.blogs definition

-- Drop table

-- DROP TABLE public.blogs;

CREATE TABLE public.blogs (
	id serial4 NOT NULL,
	title varchar NOT NULL,
	slug varchar NOT NULL,
	body text NOT NULL,
	author varchar NULL,
	CONSTRAINT blog_pkey PRIMARY KEY (id)
);

INSERT INTO public.blogs
(title, slug, body, author)
VALUES('Hello', 'hello', 'Test', 'User1');