-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2025 at 10:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matasanos`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `idAdmin` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`idAdmin`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(10, 'Hector', 'Florez', '10@ms.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `Cita`
--

CREATE TABLE `Cita` (
  `idCita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `Paciente_idPaciente` int(11) NOT NULL,
  `Medico_idMedico` int(11) NOT NULL,
  `Consultorio_idConsultorio` int(11) DEFAULT NULL,
  `EstadoCita_idEstadoCita` int(11) NOT NULL,
  `Admin_idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cita`
--

INSERT INTO `Cita` (`idCita`, `fecha`, `hora`, `Paciente_idPaciente`, `Medico_idMedico`, `Consultorio_idConsultorio`, `EstadoCita_idEstadoCita`, `Admin_idAdmin`) VALUES
(1, '2025-06-01', '10:30:00', 1003496780, 1003425780, 1, 1, 10),
(2, '2025-04-28', '08:30:00', 1000729214, 59885793, 1, 1, 10),
(3, '2025-04-02', '14:30:00', 1030521677, 34553075, 2, 1, 10),
(4, '2025-05-29', '11:00:00', 1010840446, 7776529, 3, 1, 10),
(6, '2025-04-02', '10:00:00', 99, 99, 4, 1, 10),
(7, '2025-05-05', '10:30:00', 1014659421, 1975489721, 5, 1, 10),
(8, '2025-04-02', '10:30:00', 1, 1, 6, 3, 10),
(9, '2025-04-02', '14:00:00', 25, 32, 7, 1, 10),
(10, '2024-11-09', '14:30:00', 1011086965, 10011, 8, 3, 10),
(11, '2025-12-12', '14:30:00', 1083369369, 1083367779, 9, 1, 10),
(12, '2025-04-01', '18:15:24', 1025531497, 433779, 10, 3, 10),
(13, '2025-05-10', '14:00:00', 1021670976, 8764756, 11, 1, 10),
(14, '2025-05-24', '08:00:00', 1014738649, 1014000456, 12, 1, 10),
(15, '2025-04-17', '11:45:00', 1001287292, 2002596365, 12, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Consultorio`
--

CREATE TABLE `Consultorio` (
  `idConsultorio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Especialidad_idEspecialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Consultorio`
--

INSERT INTO `Consultorio` (`idConsultorio`, `nombre`, `Especialidad_idEspecialidad`) VALUES
(1, '205', 1),
(2, '404', 1),
(3, '303', 2),
(4, '205', 3),
(5, '502', 4),
(6, '105', 5),
(7, '210', 6),
(8, '402', 7),
(9, '308', 1),
(10, '114', 9),
(11, '117', 11),
(12, '213', 3),
(13, '411', 12),
(14, '517', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Especialidad`
--

CREATE TABLE `Especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Especialidad`
--

INSERT INTO `Especialidad` (`idEspecialidad`, `nombre`) VALUES
(1, 'Odontologia'),
(2, 'Podologia'),
(3, 'Evangelizador'),
(4, 'Optometría'),
(5, 'Radiologia'),
(6, 'Planificación'),
(7, 'Nefrología'),
(8, 'Cardiología'),
(9, 'Geriatría'),
(10, 'Oftanmologia'),
(11, 'Ortopedia'),
(12, 'Pediatria'),
(13, 'Dermatología');

-- --------------------------------------------------------

--
-- Table structure for table `EstadoCita`
--

CREATE TABLE `EstadoCita` (
  `idEstadoCita` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EstadoCita`
--

INSERT INTO `EstadoCita` (`idEstadoCita`, `valor`) VALUES
(1, 'Programada'),
(2, 'Cancelada'),
(3, 'Realizada'),
(4, 'Incumplida');

-- --------------------------------------------------------

--
-- Table structure for table `Historia`
--

CREATE TABLE `Historia` (
  `idHistoria` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `Cita_idCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Medico`
--

CREATE TABLE `Medico` (
  `idMedico` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `Especialidad_idEspecialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Medico`
--

INSERT INTO `Medico` (`idMedico`, `nombre`, `apellido`, `correo`, `clave`, `foto`, `Especialidad_idEspecialidad`) VALUES
(1, 'Julius', 'Hibbert', 'jhibbert@springfield.com', '2a2d595e6ed9a0b24f027f2b63b134d6', NULL, 5),
(2, 'Troy', 'McClure', 'TroyMcclure69@udistrital.edu.co', 'e10adc3949ba59abbe56e057f20f883e', NULL, 10),
(3, 'Plopper', 'Simpson', 'PlopperS@gmail.com', '259e99cb4dc1bad404fd61c5d547f3bc', NULL, 1),
(11, 'Julius', 'Hibbert', 'hibbert@matasanos.org', '16a1f3773acc36383d88a0fc1725f34a', NULL, 1),
(12, 'Bartolomew', 'Simpson', 'ayCaramba@gmail.com', '1fbe4754629b23146f1d1467a94167b5', NULL, 1),
(32, 'Eleanor', 'Abernathy', 'Eleanor@gmail.com', '68d150ef88aa08844acff2ccb2a07bd6', NULL, 6),
(99, 'Ned', 'Flanders', 'ndflanders@mtsanos.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL, 3),
(134, 'Nick', 'Rivera', 'NickR@matasanos.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1),
(1234, 'Barney', 'Gumble', 'eldocborracho123@gmail.com', '731309c4bb223491a9f67eac5214fb2e', NULL, 5),
(10011, 'Kent', 'Brockman', 'kb@ms.com', '202cb962ac59075b964b07152d234b70', NULL, 7),
(433779, 'Agnes', 'Skinner', 'MsSkinner@gmail.com', '0770660419b560f991055872a5df5f5f', NULL, 9),
(7776529, 'Rex', 'Banner', 'Rexbanner@gmail.com', '1e5c5a5c4920d80b775c1cee0d10035d', NULL, 2),
(8764756, 'Jasper', 'Beardsley', 'jasper.b@gmail.com', 'e82c4b19b8151ddc25d4d93baf7b908f', NULL, 11),
(10002149, 'Seymour', 'Skinner', 'SeSki@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1),
(28657666, 'Patty', 'Bouvier', 'Pattyb@ms.com', 'fc9fdf084e290f26a270390dc49061a2', NULL, 1),
(34553075, 'Ralph', 'Wiggum', 'RalphW@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 1),
(35491874, 'Ned', 'Flanders', 'nedflanders@gmail.com', '123', NULL, 5),
(59885793, 'Bob', 'Sideshow', 'bobpatinio@gmail.edu.co', 'f95aeced60bd7e4e9089c3de2789ef2f', NULL, 1),
(1003425780, 'Montgomery', 'Burns', 'MontgomeryBurns@ms.com', 'e52bb67dc3270417e0f4bd97aae98098', NULL, 1),
(1014000456, 'Barney', 'Gumble', 'bgumble@gmail.com', 'ea65f0671e29fde81a3d87983c37a191', NULL, 12),
(1023456789, 'Bob', 'Patiño', 'bob.patino@springfield.com', '830925c5b278e0b461041b493f62b493', NULL, 1),
(1083367779, 'Lionel', 'Hutz', 'lhutz@gmail.com', 'a5f54908da856fde9fdbd9ed3c82f2be', NULL, 8),
(1125784568, 'Apu', 'Nahasapeemapetilon', 'apusnahas15@gmail.com', '61cc40510362309b09ee68a34775631e', NULL, 3),
(1975489721, 'Timothy', 'Lovejoy', 'timothy.lovejoy@example.com', 'ab1f001deb53de7d83ba794b65687207', NULL, 4),
(2002596365, 'Bart', 'Simpson', 'bs@skate.com', '9e87f71a9663b0adbacd791e2b802fe1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Paciente`
--

CREATE TABLE `Paciente` (
  `idPaciente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Paciente`
--

INSERT INTO `Paciente` (`idPaciente`, `nombre`, `apellido`, `correo`, `clave`, `fechaNacimiento`) VALUES
(1, 'Cristian', 'Barrera', 'ccbarreraf@udistrital.edu.co', 'fda70557fa93e545b1330fe1cd0658ea', '0000-00-00'),
(3, 'Eduard', 'Quintero', 'ejpquinterog@gmail.com', '9ef0be34d7424c2260abf0b1004ed226', '0000-00-00'),
(11, 'Andrés Felipe', 'Rodriguez Herrera', 'afrodriguezh@udistrital.edu.co', 'd39d39372979d47faf275a7597a76356', '0000-00-00'),
(25, 'Luisa', 'Parra', 'luisa25@gmail.com', '0d40a12a2f1a5a85cfeb0c16d6cf6891', '0000-00-00'),
(74, 'Cristian Daniel', 'Feo Patarroyo', 'cdfeop@udistrital.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(99, 'Cristian Daniel', 'Feo Patarroyo', 'cdfeop@udistrital.edu.co', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(1000219497, 'Daniel', 'Cruz', 'cruz.daniel.2003@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(1000729214, 'Joan Daniel', 'Vargas Avila', 'jodvargasa@udistrital.edu.co', '36e1a5072c78359066ed7715f5ff3da8', '0000-00-00'),
(1001274173, 'Natalia', 'Herrera', 'nherrerag@udistrital.edu.co', '25d55ad283aa400af464c76d713c07ad', '0000-00-00'),
(1001287292, 'Felipe', 'Rojas', 'farojasg@udistrital.edu.co', '6fbfc520cbe5bfea7fd88bc602db1683', '0000-00-00'),
(1001327410, 'Samir', 'Gonzalez', 'josagoor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00'),
(1003496780, 'Brandon', 'Castillo', 'bscastilloa@ms.com', 'b6ba6176be29d25d1be05ffa12df72a8', '0000-00-00'),
(1010840446, 'Daniel', 'Gomez', 'alejandromune1126@gmail.com', '841afaee6b5950a3acd1733653b63cbe', '0000-00-00'),
(1011086717, 'Alison', 'Diaz', 'alisonespitia888@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '0000-00-00'),
(1011086965, 'Oscar Alejandro', 'Gonzalez Soto', 'oscaralejandrosoto9@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(1014659421, 'Juan', 'Suesca', 'juanpsuesca10@gmail.com', 'a94652aa97c7211ba8954dd15a3cf838', '0000-00-00'),
(1014738649, 'Dana Sofia', 'Macias Rojas', 'dsmaciasr@udistrital.edu.co', '64a05ba8259ebf608da263c1d7052331', '0000-00-00'),
(1021396416, 'Thomas', 'Aguirre', 'tomasesteban20010@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(1021670976, 'Danna', 'Molina', 'damolinab@udistrital.edu.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00'),
(1023369546, 'Bryan', 'Molano', 'bsmolanof@udistrital.edu.co', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00'),
(1024601409, 'Brayan', 'Rodriguez', 'brayanr@ms.com', '8e921a1d7b8e54f573bdacfdabe2fa64', '0000-00-00'),
(1025531497, 'Daniel Leonardo', 'Lopez Valderrama', 'danileo.lopez.v@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(1030521677, 'Daniela', 'Huertas', 'daniezhs@gmail.com', '15fe5f944a0d4bb48bbe5e52cf32fcf4', '0000-00-00'),
(1032798548, 'Juan', 'Ortiz', 'judaorgor@gmail.com', '7bc37c49a0b20ca749edc0713a83d440', '0000-00-00'),
(1083369369, 'Natalia', 'Guzman', 'nguzmanf@udistrital.edu.co', '312351bff07989769097660a56395065', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `Cita`
--
ALTER TABLE `Cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_Cita_Paciente1_idx` (`Paciente_idPaciente`),
  ADD KEY `fk_Cita_Medico1_idx` (`Medico_idMedico`),
  ADD KEY `fk_Cita_Consultorio1_idx` (`Consultorio_idConsultorio`),
  ADD KEY `fk_Cita_EstadoCita1_idx` (`EstadoCita_idEstadoCita`),
  ADD KEY `fk_Cita_Admin1_idx` (`Admin_idAdmin`);

--
-- Indexes for table `Consultorio`
--
ALTER TABLE `Consultorio`
  ADD PRIMARY KEY (`idConsultorio`),
  ADD KEY `fk_Consultorio_Especialidad1_idx` (`Especialidad_idEspecialidad`);

--
-- Indexes for table `Especialidad`
--
ALTER TABLE `Especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indexes for table `EstadoCita`
--
ALTER TABLE `EstadoCita`
  ADD PRIMARY KEY (`idEstadoCita`);

--
-- Indexes for table `Historia`
--
ALTER TABLE `Historia`
  ADD PRIMARY KEY (`idHistoria`),
  ADD KEY `fk_Observaciones_Cita1_idx` (`Cita_idCita`);

--
-- Indexes for table `Medico`
--
ALTER TABLE `Medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `fk_Medico_Especialidad1_idx` (`Especialidad_idEspecialidad`);

--
-- Indexes for table `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cita`
--
ALTER TABLE `Cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Consultorio`
--
ALTER TABLE `Consultorio`
  MODIFY `idConsultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Especialidad`
--
ALTER TABLE `Especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `EstadoCita`
--
ALTER TABLE `EstadoCita`
  MODIFY `idEstadoCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Historia`
--
ALTER TABLE `Historia`
  MODIFY `idHistoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cita`
--
ALTER TABLE `Cita`
  ADD CONSTRAINT `fk_Cita_Admin1` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `Admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Consultorio1` FOREIGN KEY (`Consultorio_idConsultorio`) REFERENCES `Consultorio` (`idConsultorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_EstadoCita1` FOREIGN KEY (`EstadoCita_idEstadoCita`) REFERENCES `EstadoCita` (`idEstadoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Medico1` FOREIGN KEY (`Medico_idMedico`) REFERENCES `Medico` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Paciente1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `Paciente` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Consultorio`
--
ALTER TABLE `Consultorio`
  ADD CONSTRAINT `fk_Consultorio_Especialidad1` FOREIGN KEY (`Especialidad_idEspecialidad`) REFERENCES `Especialidad` (`idEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Historia`
--
ALTER TABLE `Historia`
  ADD CONSTRAINT `fk_Observaciones_Cita1` FOREIGN KEY (`Cita_idCita`) REFERENCES `Cita` (`idCita`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Medico`
--
ALTER TABLE `Medico`
  ADD CONSTRAINT `fk_Medico_Especialidad1` FOREIGN KEY (`Especialidad_idEspecialidad`) REFERENCES `Especialidad` (`idEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
