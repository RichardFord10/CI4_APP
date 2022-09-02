-- public.items definition

-- Drop table

-- DROP TABLE public.items;

CREATE TABLE public.items (
	id serial4 NOT NULL,
	"name" varchar NULL,
	qty int4 NULL,
	"cost" numeric NULL,
	price numeric NULL,
	color text NULL,
	category text NULL,
	brand varchar NULL,
	images varchar NULL,
	height int4 NULL,
	width int4 NULL,
	"depth" int4 NULL,
	"row" text NULL,
	shelf text NULL,
	slot text NULL,
	CONSTRAINT items_pkey PRIMARY KEY (id)
);

INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Hat', 5, 10, 15, 'Purple', 'Clothing', 'Brand 1', NULL, 12, 10, 12, 'L', '5', '1');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Jacket', 10, 10, 15, 'Green', 'Clothing', 'Brand 1', NULL, 12, 10, 12, 'B', '24', '2');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Jeans', 8, 10, 15, 'Blue', 'Clothing', 'Brand 2', NULL, 12, 10, 12, 'N', '20', '4');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Sweater', 35, 10, 15, 'Gold', 'Clothing', 'Brand 2', NULL, 12, 10, 12, 'D', '14', '5');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Sweater', 10, 10, 15, 'Gray', 'Clothing', 'Brand 2', NULL, 12, 10, 12, 'M', '8', '1');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Shoes', 55, 60, 75, 'Blue', 'Clothing', 'Brand 3', NULL, 12, 10, 12, 'L', '19', '5');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Jacket', 10, 999, 2499, 'Purple', 'Clothing', 'Brand 4', NULL, 12, 10, 12, 'N', '8', '5');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Scarf', 29, 999, 1499, 'Blue', 'Clothing', 'Brand 4', NULL, 12, 10, 12, 'M', '20', '1');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Hat', 20, 999, 1499, 'Gray', 'Clothing', 'Brand 5', NULL, 12, 10, 12, 'E', '10', '5');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Socks', 67, 5, 10, 'Gray', 'Clothing', 'Brand 6', NULL, 12, 10, 12, 'Y', '17', '3');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Gloves', 75, 5, 10, 'Green', 'Clothing', 'Brand 7', NULL, 12, 10, 12, 'E', '20', '1');
INSERT INTO public.items
( "name", qty, "cost", price, color, category, brand, images, height, width, "depth", "row", shelf, slot)
VALUES('Sweater', 5, 15, 15, 'Black', 'Clothing', 'Brand 7', NULL, 12, 10, 12, 'M', '4', '5');
