GRANT USAGE ON *.* TO 'adminsistema'@'localhost' IDENTIFIED BY PASSWORD '*2C6396ADEEF1AF865672D48735C0E3EC8B1A9CEC';

GRANT ALL PRIVILEGES ON `sistemagestionproyectosav`.* TO 'adminsistema'@'localhost' WITH GRANT OPTION;

GRANT USAGE ON *.* TO 'usuario'@'localhost' IDENTIFIED BY PASSWORD '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19';

GRANT SELECT ON `sistemagestionproyectosav`.`tutorial` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`historiasusuario` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`usuario` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`recomendatutorial` TO 'usuario'@'localhost';

GRANT SELECT ON `sistemagestionproyectosav`.`roles` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`planificacion` TO 'usuario'@'localhost';

GRANT SELECT ON `sistemagestionproyectosav`.`pruebatipo` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`codificacion` TO 'usuario'@'localhost';

GRANT SELECT ON `sistemagestionproyectosav`.`lenguajetipo` TO 'usuario'@'localhost';

GRANT SELECT, INSERT ON `sistemagestionproyectosav`.`usuariorol` TO 'usuario'@'localhost';

GRANT SELECT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`tareas` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE ON `sistemagestionproyectosav`.`diagramadiseno` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`proyecto` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`resultado` TO 'usuario'@'localhost';

GRANT SELECT ON `sistemagestionproyectosav`.`pruebanivel` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`rolesdesistema` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`pruebas` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`casosdeuso` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`requerimientos` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`diseño` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`lenguajecodificacion` TO 'usuario'@'localhost';

GRANT SELECT, INSERT, UPDATE, REFERENCES ON `sistemagestionproyectosav`.`tareasusuario` TO 'usuario'@'localhost';

GRANT SELECT ON `sistemagestionproyectosav`.`diagramatipo` TO 'usuario'@'localhost';