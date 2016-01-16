ALTER TABLE `recetas` CHANGE `dificultad` `dificultad` SMALLINT(1) NOT NULL DEFAULT '0' COMMENT '1=Muy Facil,5=Muy Dificil.';
ALTER TABLE `recetas` CHANGE `comensales` `comensales` SMALLINT(2) NOT NULL DEFAULT '4' COMMENT 'Numero de comensales para la receta.';
ALTER TABLE `recetas` CHANGE `valoracion` `valoracion` SMALLINT(1) NOT NULL DEFAULT '3' COMMENT 'Valoracion de la receta: 1=Peor, 3=Buena, 5=Mejor.';
