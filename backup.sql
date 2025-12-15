-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 déc. 2025 à 22:31
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetgestionhabitant`
--

-- --------------------------------------------------------

--
-- Structure de la table `certificats`
--

CREATE TABLE `certificats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `habitant_id` bigint(20) UNSIGNED NOT NULL,
  `delegue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `annee_residence` int(11) NOT NULL,
  `nom_proprietaire` varchar(255) NOT NULL,
  `numero_maison` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL,
  `status` enum('en_attente','valide','rejete') NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NomCommune` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deleguequartiers`
--

CREATE TABLE `deleguequartiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_habitant` bigint(20) UNSIGNED NOT NULL,
  `id_quartier` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `deleguequartiers`
--

INSERT INTO `deleguequartiers` (`id`, `user_id`, `id_habitant`, `id_quartier`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 2, 9, 2, 'aminata@gmail.com', '$2y$10$zePtJ4nX0xEl24UW8hizJ.2u5EgtixA9Y3sBlfWySnKd4DKHZcDrm', '2025-09-13 13:35:03', '2025-09-13 13:35:03'),
(3, 8, 4, 3, 'bousso@gmail.com', '$2y$10$dNN3wbAG.9fp3mKa8yW21eWLDMsSRyMyADV75TkABzFlGsPN7cs0u', '2025-09-13 14:01:53', '2025-09-13 14:01:53'),
(7, 13, 16, 1, 'mouhamed@gmail.com', '$2y$10$JOzj.AHLoP6qFLZOHB6cYuMiW7uWVNva4uNjboZMuSYoSx807TG56', '2025-09-13 17:48:29', '2025-09-13 17:48:29');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `habitant_id` bigint(20) UNSIGNED NOT NULL,
  `delegue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `annee_residence` int(11) NOT NULL,
  `nom_proprietaire` varchar(255) NOT NULL,
  `numero_maison` varchar(255) NOT NULL,
  `quartier_id` bigint(20) UNSIGNED NOT NULL,
  `statut` enum('en_attente','valide','refuse') NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'en_attente',
  `certificat_path` varchar(255) DEFAULT NULL,
  `piece_justificative` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `habitant_id`, `delegue_id`, `nom_complet`, `date_naissance`, `lieu_naissance`, `nationalite`, `annee_residence`, `nom_proprietaire`, `numero_maison`, `quartier_id`, `statut`, `created_at`, `updated_at`, `status`, `certificat_path`, `piece_justificative`) VALUES
(2, 18, NULL, 'Khary Diop', '2002-12-09', 'Dakar', 'Sénégalaise', 2010, 'Mouhamed Diop', '22', 3, 'en_attente', '2025-09-14 22:02:15', '2025-09-15 10:44:39', 'valide', NULL, NULL),
(3, 42, NULL, 'Ndeye Fatou dial', '2002-05-30', 'Dakar', 'Sénégalaise', 2020, 'Mamadou Dial', '001', 1, 'en_attente', '2025-09-15 16:09:20', '2025-09-17 12:58:13', 'rejete', 'certificats/certificat_3.pdf', NULL),
(20, 43, NULL, 'Madibso Ndiaye', '2002-12-25', 'Ziguinchor', 'Sénégalaise', 2021, 'Assane Ndiaye', '001', 1, 'en_attente', '2025-09-15 17:47:42', '2025-09-17 12:58:15', 'rejete', 'certificats/certificat_20.pdf', NULL),
(25, 43, NULL, 'Mame Diarra Dieng', '2002-03-12', 'Dakar', 'Sénégalaise', 2019, 'Assane Ndiaye', '001', 1, 'en_attente', '2025-09-16 19:40:09', '2025-09-17 12:58:17', 'rejete', 'certificats/certificat_25.pdf', NULL),
(27, 17, NULL, 'Fatma Gueye', '2002-02-02', 'Dakar', 'Sénégalaise', 2010, 'Ousmane Gueye', '98', 1, 'en_attente', '2025-09-17 12:48:38', '2025-09-17 12:58:20', 'valide', 'certificats/certificat_27.pdf', 'justificatifs/dty9FuAy9SeUOxC7JSf3Hi81KX80bvNiyWxGoU0p.png');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habitants`
--

CREATE TABLE `habitants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quartier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `date_naiss` date DEFAULT NULL,
  `lieu_naiss` varchar(255) DEFAULT NULL,
  `id_maison` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `habitants`
--

INSERT INTO `habitants` (`id`, `quartier_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `date_naiss`, `lieu_naiss`, `id_maison`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dieng', 'Mame Diarra', NULL, NULL, '772563479', NULL, NULL, 1, '2025-09-11 15:44:28', '2025-09-13 14:13:50'),
(2, NULL, 'Ndiaye', 'Mame', NULL, NULL, '770000001', NULL, NULL, 1, '2025-09-11 23:29:34', '2025-09-11 23:29:34'),
(3, NULL, 'Gueye', 'Fatma', NULL, NULL, '770000002', NULL, NULL, 12, '2025-09-11 23:30:15', '2025-09-11 23:30:15'),
(4, NULL, 'Bousso', 'Seynabou', NULL, NULL, '770000003', NULL, NULL, 12, '2025-09-11 23:30:39', '2025-09-11 23:30:39'),
(5, NULL, 'Seye', 'Soxna Maimouna', NULL, NULL, '770000004', NULL, NULL, 11, '2025-09-11 23:31:12', '2025-09-11 23:31:12'),
(6, NULL, 'Diallo', 'Aminata', NULL, NULL, '770000006', NULL, NULL, 11, '2025-09-11 23:31:32', '2025-09-11 23:31:32'),
(8, NULL, 'Ndiaye', 'Assane', NULL, NULL, '770000008', NULL, NULL, 10, '2025-09-11 23:35:37', '2025-09-11 23:35:37'),
(9, NULL, 'Ba', 'Aminata', NULL, NULL, '770000008', NULL, NULL, 9, '2025-09-11 23:36:14', '2025-09-11 23:36:14'),
(10, NULL, 'Ndiaye', 'Samba', NULL, NULL, '770000012', NULL, NULL, 9, '2025-09-11 23:37:36', '2025-09-11 23:37:36'),
(11, NULL, 'Diop', 'Fallou', NULL, NULL, '770000013', NULL, NULL, 8, '2025-09-11 23:38:08', '2025-09-11 23:38:08'),
(12, NULL, 'Diop', 'Adji', NULL, NULL, '770000013', NULL, NULL, 8, '2025-09-11 23:38:46', '2025-09-11 23:38:46'),
(13, NULL, 'Barry', 'Aissatou', NULL, NULL, '770000023', NULL, NULL, 7, '2025-09-11 23:41:18', '2025-09-11 23:41:18'),
(14, NULL, 'Barry', 'Ibrahima', NULL, NULL, '770000078', NULL, NULL, 7, '2025-09-11 23:41:49', '2025-09-11 23:41:49'),
(15, NULL, 'Ba', 'Khadidiatou', NULL, NULL, '770000023', NULL, NULL, 12, '2025-09-11 23:45:09', '2025-09-11 23:45:09'),
(16, NULL, 'Ndiaye', 'Mouhamed', NULL, NULL, '770986543', '2002-04-12', 'Ziguinchor', 13, '2025-09-13 16:42:34', '2025-09-13 16:42:34'),
(17, NULL, 'Faye', 'Saly', 'saly@gmail.com', '$2y$10$G3mW3mLE7NDBYcJriBHRFO9lfJo/YNY9h80q0ctPziiVSLi13l/G6', '786543245', NULL, NULL, NULL, '2025-09-14 16:52:52', '2025-09-14 16:52:52'),
(18, NULL, 'Diop', 'Khary', 'khary@gmail.com', '$2y$10$clo97ifuvbr3Pw3sf19aOOJ86XNXRu3bspGAPHIhfBeaNj5h3TxUS', '786543289', NULL, NULL, NULL, '2025-09-14 21:56:27', '2025-09-14 21:56:27'),
(19, NULL, 'Seck', 'Souleymane', NULL, NULL, '770873456', '2002-12-23', 'Dakar', 10, '2025-09-15 12:51:24', '2025-09-15 12:51:24'),
(20, NULL, 'Dieng', 'Codou', NULL, NULL, '77895678', '2000-12-12', 'Thies', 13, '2025-09-15 12:52:32', '2025-09-15 12:52:32'),
(21, NULL, 'Sall', 'Amadou', NULL, NULL, '777893456', '2001-02-23', 'Diourbel', 13, '2025-09-15 12:53:40', '2025-09-15 12:53:40'),
(22, NULL, 'Kane', 'Binta', NULL, NULL, '776543789', '2002-09-30', 'Ziguinchor', 13, '2025-09-15 13:06:38', '2025-09-15 13:06:38'),
(23, NULL, 'Sarr', 'Mamadou', NULL, NULL, '776789345', '1999-01-01', 'Saint Louis', 4, '2025-09-15 13:08:27', '2025-09-15 13:08:27'),
(24, NULL, 'Sarr', 'Ndeye astou', NULL, NULL, '77896745', '1997-03-14', 'Saint Louis', 4, '2025-09-15 13:10:12', '2025-09-15 13:10:12'),
(25, NULL, 'Mendy', 'François', NULL, NULL, '783456790', '1960-07-15', 'Dakar', 14, '2025-09-15 13:11:55', '2025-09-15 13:11:55'),
(26, NULL, 'Mendy', 'Marianne', NULL, NULL, '775679034', '2000-12-09', 'Dakar', 14, '2025-09-15 13:12:45', '2025-09-15 13:12:45'),
(27, NULL, 'Camara', 'Anna', NULL, NULL, '773456789', '2002-12-12', 'Ziguinchor', 3, '2025-09-15 13:16:18', '2025-09-15 13:16:18'),
(28, NULL, 'Camara', 'Fama', NULL, NULL, '762345678', '1961-05-27', 'Ziguinchor', 1, '2025-09-15 13:18:01', '2025-09-15 13:18:01'),
(29, NULL, 'Camara', 'Ousmane', NULL, NULL, '761456783', '1995-12-31', 'Dakar', 3, '2025-09-15 13:18:48', '2025-09-15 13:18:48'),
(30, NULL, 'Camara', 'Saly', NULL, NULL, '772345678', '2005-03-05', 'Dakar', 3, '2025-09-15 13:21:28', '2025-09-15 13:21:28'),
(31, NULL, 'Diene', 'Fatima', NULL, NULL, '779803456', '1999-12-31', 'Dakar', 7, '2025-09-15 13:23:13', '2025-09-15 13:23:13'),
(32, NULL, 'Diene', 'Moustapha', NULL, NULL, '781233456', '1999-11-23', 'Dakar', 7, '2025-09-15 13:24:26', '2025-09-15 13:24:26'),
(33, NULL, 'Diene', 'Aminata', NULL, NULL, '772345678', '2000-11-21', 'Dakar', 11, '2025-09-15 13:27:51', '2025-09-15 13:27:51'),
(34, NULL, 'Diallo', 'Fatima', NULL, NULL, '776543456', '2002-03-23', 'Ziguinchor', 12, '2025-09-15 13:30:29', '2025-09-15 13:30:29'),
(35, NULL, 'Diallo', 'Saliou', NULL, NULL, '787965434', '1999-10-29', 'Ziguinchor', 12, '2025-09-15 13:32:37', '2025-09-15 13:32:37'),
(36, NULL, 'Diallo', 'Awa', NULL, NULL, '77654321', '2002-07-06', 'Ziguinchor', 12, '2025-09-15 13:35:47', '2025-09-15 13:35:47'),
(37, NULL, 'Seydi', 'Fama', NULL, NULL, '765432879', '2005-03-01', 'Ziguinchor', 14, '2025-09-15 13:37:14', '2025-09-15 13:37:14'),
(38, NULL, 'Seye', 'Diarietou', NULL, NULL, '78654321', '2002-10-27', 'Dakar', 4, '2025-09-15 13:42:08', '2025-09-15 13:42:08'),
(39, NULL, 'Faye', 'Mame Diarra', NULL, NULL, '789453218', '2000-10-10', 'Dakar', 14, '2025-09-15 13:42:55', '2025-09-15 13:42:55'),
(40, NULL, 'Gueye', 'Ousmane', NULL, NULL, '778903456', '1995-07-09', 'Saint Louis', 8, '2025-09-15 13:44:46', '2025-09-15 13:44:46'),
(41, NULL, 'Sall', 'Mansour', NULL, NULL, '786549123', '2000-03-29', 'Dakar', 14, '2025-09-15 13:47:31', '2025-09-15 13:47:31'),
(42, NULL, 'Dial', 'Ndeye Fatou', 'fatou@gmail.com', '$2y$10$mdJi4gblxJr4n4bM7/U2..4DzvEGX1C61EjUJlzxl/VfQgKXRDCwK', '781234567', NULL, NULL, NULL, '2025-09-15 16:07:56', '2025-09-15 16:07:56'),
(43, NULL, 'Ndiaye', 'madibso', 'madibso@gmail.com', '$2y$10$SRaRKwQkBt3pqhUw5SyZmOkpAwmk/1Xm5oEc7gw6i.PtxWqB7vQtq', '770886792', NULL, NULL, NULL, '2025-09-15 17:46:07', '2025-09-15 17:46:07');

-- --------------------------------------------------------

--
-- Structure de la table `maisons`
--

CREATE TABLE `maisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surface` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `quartier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `proprietaire_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maisons`
--

INSERT INTO `maisons` (`id`, `surface`, `rue`, `quartier_id`, `created_at`, `updated_at`, `proprietaire_id`) VALUES
(1, '345m', '192', 0, '2025-09-11 15:43:51', '2025-09-13 14:19:11', 1),
(3, '500', '410', 1, '2025-09-11 22:43:59', '2025-09-19 09:41:27', 4),
(4, '120', '657', 1, '2025-09-11 23:13:36', '2025-09-19 09:42:56', 6),
(7, '300', '98', 2, '2025-09-11 23:14:40', '2025-09-11 23:14:40', NULL),
(8, '500', '567', 2, '2025-09-11 23:14:58', '2025-09-11 23:14:58', NULL),
(9, '345', '890', 2, '2025-09-11 23:15:22', '2025-09-19 09:40:07', 2),
(10, '143', '22', 3, '2025-09-11 23:15:44', '2025-09-19 09:42:08', 5),
(11, '160', '567', 3, '2025-09-11 23:15:58', '2025-09-11 23:15:58', NULL),
(12, '180', '210', 3, '2025-09-11 23:16:14', '2025-09-19 09:40:51', 3),
(13, '450', '234', 1, '2025-09-13 16:41:08', '2025-09-13 16:41:08', NULL),
(14, '450m', '001', 1, '2025-09-15 13:11:07', '2025-09-15 13:11:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_19_191516_create_communes_table', 1),
(6, '2024_02_19_194233_create_quartiers_table', 1),
(7, '2024_02_19_195135_create_maisons_table', 1),
(8, '2024_02_19_200620_create_habitants_table', 1),
(9, '2024_02_19_201216_create_deleguequartiers_table', 1),
(13, '2025_09_11_203957_add_role_to_users_table', 2),
(14, '2025_09_11_232313_remove_id_commune_from_quartiers_table', 2),
(15, '2025_09_12_120427_add_date_and_lieu_naiss_to_habitants_table', 3),
(16, '2025_09_12_121236_add_description_to_quartiers_table', 4),
(17, '2025_09_12_122200_create_proprietaires_table', 4),
(18, '2025_09_13_122747_create_deleguequartiers_table', 5),
(19, '2025_09_13_124655_add_quartier_id_to_habitants_table', 6),
(20, '2025_09_13_180100_update_role_in_users_table', 7),
(21, '2025_09_14_175058_modify_id_maison_nullable_in_habitants_table', 8),
(22, '2025_09_14_215303_create_demandes_table', 9),
(23, '2025_09_14_221037_create_certificats_table', 10),
(24, '2025_09_15_114341_add_status_to_demandes_table', 11),
(25, '2025_09_15_115508_add_certificat_path_to_demandes_table', 12);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaires`
--

CREATE TABLE `proprietaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomPro` varchar(255) NOT NULL,
  `prenomPro` varchar(255) NOT NULL,
  `telephonePro` varchar(255) NOT NULL,
  `dateNaissancePro` date NOT NULL,
  `lieuNaissancePro` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proprietaires`
--

INSERT INTO `proprietaires` (`id`, `nomPro`, `prenomPro`, `telephonePro`, `dateNaissancePro`, `lieuNaissancePro`, `created_at`, `updated_at`) VALUES
(1, 'Ndiaye', 'Assane', '775464040', '1953-12-31', 'Diourbel', '2025-09-13 14:19:11', '2025-09-13 14:19:11'),
(2, 'Seye', 'Sokhna Maimouna', '772345678', '1995-02-01', 'Dakar', '2025-09-19 09:40:07', '2025-09-19 09:40:07'),
(3, 'Dieng', 'Mame Diarra', '770987654', '1995-05-27', 'Diourbel', '2025-09-19 09:40:51', '2025-09-19 09:40:51'),
(4, 'Ndiaye', 'Mame Diarra', '770886792', '1995-12-25', 'Ziguinchor', '2025-09-19 09:41:27', '2025-09-19 09:41:27'),
(5, 'Gueye', 'Fatma', '771234567', '1995-12-31', 'Dakar', '2025-09-19 09:42:08', '2025-09-19 09:42:08'),
(6, 'Bousso', 'Mame Seynabou', '775464040', '1995-07-29', 'Dakar', '2025-09-19 09:42:56', '2025-09-19 09:42:56');

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

CREATE TABLE `quartiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomQuartier` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`id`, `nomQuartier`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Biagui 2', NULL, '2025-09-11 22:26:18', '2025-09-11 22:26:18'),
(2, 'Tilene', NULL, '2025-09-11 23:12:49', '2025-09-11 23:12:49'),
(3, 'Boucotte', NULL, '2025-09-11 23:13:00', '2025-09-11 23:13:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$fEAgJBq/Jkb13UBc9T.F8eLtWpPxauvAXpiZanhD/TQ4xIKOWUw6i', 'admin', NULL, '2025-09-11 19:40:26', '2025-09-11 19:40:26'),
(2, 'Ba Aminata', 'aminata@gmail.com', NULL, '$2y$10$NgDPCF4EsGdn4JsEKQ1cU.VzIqCs2ClxnEy.6NSdC0HPkvEL.a/Q2', 'delegue', NULL, '2025-09-13 13:35:03', '2025-09-13 13:35:03'),
(8, 'Bousso Seynabou', 'bousso@gmail.com', NULL, '$2y$10$YrRNLetC8.wv8ZDsCfHDAeE/lrAAwDcrjj0QjhY98tB5r/i0OI6yG', 'delegue', NULL, '2025-09-13 14:01:52', '2025-09-13 14:01:52'),
(13, 'Ndiaye Mouhamed', 'mouhamed@gmail.com', NULL, '$2y$10$f9dhDm9pdaoPat94cUyETu6eO6uWI18AQP7ki6pT/8Im0Bob7GZrO', 'delegue', NULL, '2025-09-13 17:48:29', '2025-09-13 17:48:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `certificats`
--
ALTER TABLE `certificats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificats_habitant_id_foreign` (`habitant_id`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deleguequartiers`
--
ALTER TABLE `deleguequartiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deleguequartiers_email_unique` (`email`),
  ADD KEY `deleguequartiers_id_habitant_foreign` (`id_habitant`),
  ADD KEY `deleguequartiers_id_quartier_foreign` (`id_quartier`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandes_habitant_id_foreign` (`habitant_id`),
  ADD KEY `demandes_delegue_id_foreign` (`delegue_id`),
  ADD KEY `demandes_quartier_id_foreign` (`quartier_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `habitants`
--
ALTER TABLE `habitants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `habitants_id_maison_foreign` (`id_maison`),
  ADD KEY `habitants_quartier_id_foreign` (`quartier_id`);

--
-- Index pour la table `maisons`
--
ALTER TABLE `maisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maisons_proprietaire_id_foreign` (`proprietaire_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `certificats`
--
ALTER TABLE `certificats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `deleguequartiers`
--
ALTER TABLE `deleguequartiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `habitants`
--
ALTER TABLE `habitants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `maisons`
--
ALTER TABLE `maisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `certificats`
--
ALTER TABLE `certificats`
  ADD CONSTRAINT `certificats_habitant_id_foreign` FOREIGN KEY (`habitant_id`) REFERENCES `habitants` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `deleguequartiers`
--
ALTER TABLE `deleguequartiers`
  ADD CONSTRAINT `deleguequartiers_id_habitant_foreign` FOREIGN KEY (`id_habitant`) REFERENCES `habitants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deleguequartiers_id_quartier_foreign` FOREIGN KEY (`id_quartier`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_delegue_id_foreign` FOREIGN KEY (`delegue_id`) REFERENCES `deleguequartiers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `demandes_habitant_id_foreign` FOREIGN KEY (`habitant_id`) REFERENCES `habitants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demandes_quartier_id_foreign` FOREIGN KEY (`quartier_id`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `habitants`
--
ALTER TABLE `habitants`
  ADD CONSTRAINT `habitants_id_maison_foreign` FOREIGN KEY (`id_maison`) REFERENCES `maisons` (`id`),
  ADD CONSTRAINT `habitants_quartier_id_foreign` FOREIGN KEY (`quartier_id`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `maisons`
--
ALTER TABLE `maisons`
  ADD CONSTRAINT `maisons_proprietaire_id_foreign` FOREIGN KEY (`proprietaire_id`) REFERENCES `proprietaires` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
