SET NAMES latin1;
SET FOREIGN_KEY_CHECKS = 0;
BEGIN;
CREATE DATABASE IF NOT EXISTS `ProgSergio`;
COMMIT;

USE `ProgSergio`;

DROP TABLE IF EXISTS `Player`;
CREATE TABLE `Player` (
  `Id_Player` int(11) NOT NULL	AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Adm` boolean NOT NULL,
  PRIMARY KEY (`Id_Player`)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Game`;
CREATE TABLE `Game` (
  `Id_Game` int(11) NOT NULL		AUTO_INCREMENT ,
  `Spostamenti` int(11) NOT NULL,
  `Tempo` time NOT NULL,
  `Id_Player` int(11) NOT NULL,
  PRIMARY KEY (`Id_Game`),
  CONSTRAINT `FK_Player` FOREIGN KEY (`Id_Player`)  REFERENCES `Player` (`Id_Player`) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Game (Id_Player, Spostamenti, Tempo)
				VALUES('1', '224', '0:19:58'),('1', '231', '0:20:01'),('1', '227', '0:20:12'),
					  ('2', '235', '0:21:40'),('2', '238', '0:21:48'),('3', '210', '0:18:20'),
					  ('3', '201', '0:18:04'),('3', '250', '0:18:09'),('4', '249', '0:25:26'),
					  ('4', '278', '0:27:20'),('4', '261', '0:26:37'),('5', '256', '0:24:01'),
					  ('5', '254', '0:23:11'),('5', '251', '0:23:09'),('2', '238', '0:21:48'),
					  ('1', '299', '0:17:43'),('1', '203', '0:17:59'),('2', '238', '0:21:48'),
					  ('2', '204', '0:18:40'),('2', '212', '0:18:40'),('5', '232', '0:21:35'),
					  ('3', '206', '0:18:51'),('3', '205', '0:18:54'),('1', '229', '0:20:17'),
					  ('4', '223', '0:19:45'),('4', '241', '0:20:30'),('3', '209', '0:18:11'),
					  ('5', '242', '0:22:11'),('5', '240', '0:02:07'),('4', '242', '0:25:22');
				
				
INSERT INTO Player
				VALUES('','sergio_domenici', 'sergio96@gmail.com', 'sergio96', false), ('','ezio_greggio', 'sedodome96gmail.com', 'giginerone', false),('','luca_giurato', 'giurato@rai.it', 'buongiollo', false),
					  ('','gerry_scotti', 'scotti@mediaset.com', 'striscialanotizia', false), ('','alex_del_piero', 'delpiero10@gmail.com', 'forzajuve', false), ('', 'admin','admin@admin.com', 'admin10', true);