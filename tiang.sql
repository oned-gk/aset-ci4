-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2024 pada 11.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiang`
--

CREATE TABLE `tiang` (
  `id_tiang` int(11) NOT NULL,
  `no_tiang` varchar(14) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `latitude` decimal(16,14) NOT NULL,
  `longitude` decimal(15,12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiang`
--

INSERT INTO `tiang` (`id_tiang`, `no_tiang`, `foto`, `latitude`, `longitude`) VALUES
(20, 'T000001', '', '-7.72237621012292', '109.013271973923'),
(21, 'T000002', '', '-7.72216074869962', '109.011252020021'),
(22, 'T000003', '', '-7.72235039227466', '109.011247409349'),
(23, 'T000004', '', '-7.72207621429772', '109.008057490511'),
(24, 'T000005', '', '-7.72373314269819', '109.010177984281'),
(25, 'T000006', '', '-7.73226448500560', '109.015177414591'),
(26, 'T000007', '', '-7.72256153362398', '109.015873995182'),
(27, 'T000008', '', '-7.72919709552662', '109.021442424217'),
(28, 'T000009', '', '-7.72651211167239', '109.022652742826'),
(29, 'T000010', '', '-7.72753155154457', '109.021200950765'),
(30, 'T000011', '', '-7.72388896807312', '109.021316475325'),
(31, 'T000012', '', '-7.72141911978674', '109.022242125537'),
(32, 'T000013', '', '-7.71366013132638', '109.022632924680'),
(33, 'T000014', '', '-7.71433248336882', '109.016322313067'),
(34, 'T000015', '', '-7.71431146083706', '109.016125143159'),
(35, 'T000016', '', '-7.71549832703160', '109.015792115105'),
(36, 'T000017', '', '-7.71052451761000', '109.013366944302'),
(37, 'T000018', '', '-7.70348044551815', '109.015842781876'),
(38, 'T000019', '', '-7.69903549268524', '109.019300847200'),
(39, 'T000020', '', '-7.70413375525819', '109.019894124433'),
(40, 'T000021', '', '-7.70638668708068', '109.018758044002'),
(41, 'T000022', '', '-7.70946404429479', '109.017266721168'),
(42, 'T000023', '', '-7.70808578439069', '109.019135428859'),
(43, 'T000024', '', '-7.70250770457511', '109.024548291499'),
(44, 'T000025', '', '-7.70837674459097', '109.019447612971'),
(45, 'T000026', '', '-7.71152079542571', '109.023825669741'),
(46, 'T000027', '', '-7.70382035000374', '109.025193396236'),
(47, 'T000028', '', '-7.70602051799967', '109.029824350348'),
(48, 'T000029', '', '-7.70187805416315', '109.030402291616'),
(49, 'T000030', '', '-7.69780835672729', '109.030422013085'),
(50, 'T000031', '', '-7.69914778263083', '109.032347373784'),
(51, 'T000032', '', '-7.69682934840293', '109.033977882758'),
(52, 'T000033', '', '-7.69550059597231', '109.033003008121'),
(53, 'T000034', '', '-7.69423021041734', '109.032119134517'),
(54, 'T000035', '', '-7.69578420712495', '109.030397034429'),
(55, 'T000036', '', '-7.70382566667934', '109.023395723002'),
(56, 'T000037', '', '-7.69079143066770', '109.036234258118'),
(57, 'T000038', '', '-7.71171930018401', '109.017507831752'),
(58, 'T000039', '', '-7.68526429739605', '109.043968512167'),
(59, 'T000040', '', '-7.68418410070306', '109.045572828516'),
(60, 'T000041', '', '-7.68248552866813', '109.048129758842'),
(61, 'T000042', '', '-7.68233101776152', '109.048096451101'),
(62, 'T000043', '', '-7.68016079926924', '109.051892283445'),
(63, 'T000044', '', '-7.68420999999651', '109.040151431509'),
(64, 'T000045', '', '-7.68970101593397', '109.035389152994'),
(65, 'T000046', '', '-7.68095194457409', '109.038479025171'),
(66, 'T000047', '', '-7.68099561416837', '109.038324807290'),
(67, 'T000048', '', '-7.67928697025234', '109.038972788364'),
(68, 'T000049', '', '-7.67640256709107', '109.039767202537'),
(69, 'T000050', '', '-7.67565994567627', '109.039980424842'),
(70, 'T000051', '', '-7.67741658556240', '109.039634471420'),
(71, 'T000052', '', '-7.67694371645427', '109.040463717374'),
(72, 'T000053', '', '-7.67645939965614', '109.041329191399'),
(73, 'T000054', '', '-7.67361228619420', '109.040576294879'),
(74, 'T000055', '', '-7.67252919925061', '109.042869272335'),
(75, 'T000056', '', '-7.67103961876885', '109.041243863935'),
(76, 'T000057', '', '-7.66938778667719', '109.040687349744'),
(77, 'T000058', '', '-7.66779492721394', '109.042303671672'),
(78, 'T000059', '', '-7.66771141758748', '109.042566227994'),
(79, 'T000060', '', '-7.70711762411332', '109.026757272646'),
(80, 'T000061', '', '-7.69692588696051', '109.034015006428'),
(81, 'T000062', '', '-7.67840807708398', '109.055284539367'),
(82, 'T000063', '', '-7.67824316210224', '109.055165444015'),
(83, 'T000064', '', '-7.67664135658072', '109.058752249092'),
(84, 'T000065', '', '-7.67879686281965', '109.059698223493'),
(85, 'T000066', '', '-7.67820167400060', '109.061597859353'),
(86, 'T000067', '', '-7.67502099908211', '109.061828634582'),
(87, 'T000068', '', '-7.67487441995276', '109.061753805053'),
(88, 'T000069', '', '-7.67352656190455', '109.064107749327'),
(89, 'T000070', '', '-7.67164618312522', '109.067758956835'),
(90, 'T000071', '', '-7.67232802840671', '109.068233381941'),
(91, 'T000072', '', '-7.67770728256211', '109.042255862811'),
(92, 'T000073', '', '-7.67667823303191', '109.044294676579'),
(93, 'T000074', '', '-7.67655479868236', '109.044299816013'),
(94, 'T000075', '', '-7.67620768536285', '109.044478819007'),
(95, 'T000076', '', '-7.67403984606068', '109.047647735630'),
(96, 'T000077', '', '-7.67135487915833', '109.051204751937'),
(97, 'T000078', '', '-7.67541347054980', '109.045932883866'),
(98, 'T000079', '', '-7.67503401646382', '109.046640111109'),
(99, 'T000080', '', '-7.67455307869413', '109.047574872339'),
(100, 'T000081', '', '-7.67411542368969', '109.048494503090'),
(101, 'T000082', '', '-7.67386932659732', '109.048970010577'),
(102, 'T000083', '', '-7.67336243057892', '109.049978605916'),
(103, 'T000084', '', '-7.67274814806024', '109.051333079299'),
(104, 'T000085', '', '-7.67266593578282', '109.051673829944'),
(105, 'T000086', '', '-7.67217473174069', '109.051504151790'),
(106, 'T000087', '', '-7.68666697372734', '109.047279749776'),
(107, 'T000088', '', '-7.67077601556875', '109.050983167887'),
(108, 'T000089', '', '-7.67073689597890', '109.051055095340'),
(109, 'T000090', '', '-7.66997674410099', '109.050796734401'),
(110, 'T000091', '', '-7.66870230400002', '109.050341025898'),
(111, 'T000092', '', '-7.66796111528522', '109.050064536328'),
(112, 'T000093', '', '-7.66656329663111', '109.049507844417'),
(113, 'T000094', '', '-7.66526307713757', '109.049117779578'),
(114, 'T000095', '', '-7.66410016557046', '109.048597027654'),
(115, 'T000096', '', '-7.66194983067168', '109.047823266496'),
(116, 'T000097', '', '-7.66179045892529', '109.047836664206'),
(117, 'T000098', '', '-7.66063387861753', '109.047533300259'),
(118, 'T000099', '', '-7.65942944598080', '109.047067171598'),
(119, 'T000100', '', '-7.65829530411384', '109.046608074202'),
(120, 'T000101', '', '-7.65704287621921', '109.046132320451'),
(121, 'T000102', '', '-7.65612029685054', '109.046051004522'),
(122, 'T000103', '', '-7.65567071189616', '109.045943709837'),
(123, 'T000104', '', '-7.65474262573534', '109.046352864808'),
(124, 'T000105', '', '-7.65438972066603', '109.046662389383'),
(125, 'T000106', '', '-7.65367074623010', '109.046820310670'),
(126, 'T000107', '', '-7.65364801496410', '109.046710867242'),
(127, 'T000108', '', '-7.65333132484011', '109.046671688982'),
(128, 'T000109', '', '-7.65284739265214', '109.046449860512'),
(129, 'T000110', '', '-7.65159380754965', '109.045844527759');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tiang`
--
ALTER TABLE `tiang`
  ADD PRIMARY KEY (`id_tiang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tiang`
--
ALTER TABLE `tiang`
  MODIFY `id_tiang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;