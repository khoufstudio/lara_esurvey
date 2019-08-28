-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for eRecord
CREATE DATABASE IF NOT EXISTS `eRecord` /*!40100 DEFAULT CHARACTER SET eucjpms COLLATE eucjpms_bin */;
USE `eRecord`;

-- Dumping structure for table eRecord.album_photos
CREATE TABLE IF NOT EXISTS `album_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `albumphoto_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_desc_eng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.album_photos: ~0 rows (approximately)
/*!40000 ALTER TABLE `album_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `album_photos` ENABLE KEYS */;

-- Dumping structure for table eRecord.bank_materis
CREATE TABLE IF NOT EXISTS `bank_materis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.bank_materis: ~0 rows (approximately)
/*!40000 ALTER TABLE `bank_materis` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank_materis` ENABLE KEYS */;

-- Dumping structure for table eRecord.beritas
CREATE TABLE IF NOT EXISTS `beritas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.beritas: ~0 rows (approximately)
/*!40000 ALTER TABLE `beritas` DISABLE KEYS */;
/*!40000 ALTER TABLE `beritas` ENABLE KEYS */;

-- Dumping structure for table eRecord.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(10) unsigned NOT NULL,
  `blog_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_desc_eng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `be_read` int(10) unsigned DEFAULT NULL,
  `sys_user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.blogs: ~0 rows (approximately)
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- Dumping structure for table eRecord.blog_categories
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.blog_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;

-- Dumping structure for table eRecord.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_berita` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table eRecord.direktorats
CREATE TABLE IF NOT EXISTS `direktorats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_direktorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.direktorats: ~6 rows (approximately)
/*!40000 ALTER TABLE `direktorats` DISABLE KEYS */;
INSERT INTO `direktorats` (`id`, `nama_direktorat`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'SEKRETARIAT', 1, '2019-06-11 01:18:29', '2019-06-11 01:18:29'),
	(2, 'DIT. PENATAAN DAERAH OTONOMI KHUSUS DAN DPOD', 1, '2019-06-11 01:18:42', '2019-06-11 01:18:42'),
	(3, 'DIT. FASILITASI KEPALA DAERAH DAN DPRD', 1, '2019-06-11 01:18:54', '2019-06-11 01:18:54'),
	(4, 'DIT. FASILITASI KELEMBAGAAN DAN KEPEGAWAIAN PERANGKAT DAERAH', 1, '2019-06-11 01:19:05', '2019-06-11 01:19:05'),
	(5, 'DIT. PRODUK HUKUM DAERAH', 1, '2019-06-11 01:19:28', '2019-06-11 01:19:28'),
	(6, 'DIT. EVALUASI KINERJA DAN PENINGKATAN KAPASITAS DAERAH', 1, '2019-06-11 01:19:40', '2019-06-11 01:19:40');
/*!40000 ALTER TABLE `direktorats` ENABLE KEYS */;

-- Dumping structure for table eRecord.file_categories
CREATE TABLE IF NOT EXISTS `file_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.file_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `file_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_categories` ENABLE KEYS */;

-- Dumping structure for table eRecord.file_libraries
CREATE TABLE IF NOT EXISTS `file_libraries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.file_libraries: ~0 rows (approximately)
/*!40000 ALTER TABLE `file_libraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_libraries` ENABLE KEYS */;

-- Dumping structure for table eRecord.file_uploads
CREATE TABLE IF NOT EXISTS `file_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) unsigned NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.file_uploads: ~0 rows (approximately)
/*!40000 ALTER TABLE `file_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_uploads` ENABLE KEYS */;

-- Dumping structure for table eRecord.group_menus
CREATE TABLE IF NOT EXISTS `group_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `role` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.group_menus: ~27 rows (approximately)
/*!40000 ALTER TABLE `group_menus` DISABLE KEYS */;
INSERT INTO `group_menus` (`id`, `id_user_group`, `id_menu`, `role`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'ACRUD', '2019-03-25 16:14:26', '2019-03-25 17:23:31'),
	(2, 1, 1, 'ACR', '2019-03-25 17:28:31', '2019-03-25 17:28:38'),
	(3, 1, 3, 'ACRUD', '2019-03-25 17:30:14', '2019-03-25 17:30:18'),
	(4, 1, 4, 'ACR', '2019-03-25 17:31:27', '2019-03-25 17:31:29'),
	(5, 1, 5, 'ACRUD', '2019-03-25 17:33:10', '2019-03-25 17:33:13'),
	(6, 1, 6, 'ACR', '2019-03-25 17:33:14', '2019-03-25 17:33:16'),
	(8, 1, 8, 'ACRUD', '2019-03-28 04:21:32', '2019-03-28 04:21:42'),
	(10, 1, 10, 'ACRUD', '2019-03-28 04:47:16', '2019-03-28 07:37:31'),
	(11, 1, 11, 'AC', '2019-03-28 04:49:53', '2019-03-28 04:49:54'),
	(12, 1, 9, 'ACRUD', '2019-03-29 02:21:50', '2019-03-29 02:23:37'),
	(13, 1, 12, 'AC', '2019-04-11 09:10:50', '2019-04-11 09:10:52'),
	(15, 1, 15, 'ACR', '2019-04-12 02:34:46', '2019-04-15 04:27:18'),
	(17, 1, 14, 'ARC', '2019-04-15 04:25:42', '2019-04-15 04:28:56'),
	(18, 1, 16, 'A', '2019-04-16 08:10:14', '2019-04-16 08:10:14'),
	(19, 1, 17, 'A', '2019-04-16 08:12:53', '2019-04-16 08:12:53'),
	(20, 1, 18, 'AC', '2019-04-16 08:12:54', '2019-04-18 04:10:50'),
	(23, 1, 19, 'AC', '2019-04-22 07:58:13', '2019-04-22 07:58:16'),
	(24, 1, 20, 'AC', '2019-04-22 09:19:34', '2019-04-22 09:19:35'),
	(25, 1, 21, 'A', '2019-04-22 09:21:25', '2019-04-22 09:21:25'),
	(26, 2, 22, 'C', '2019-06-11 01:12:51', '2019-06-11 01:12:52'),
	(27, 2, 23, 'C', '2019-06-11 01:13:09', '2019-06-11 01:13:12'),
	(28, 2, 24, 'C', '2019-06-11 01:16:25', '2019-06-11 01:16:27'),
	(29, 4, 1, 'CRUD', '2019-06-11 02:48:18', '2019-06-11 02:48:24'),
	(30, 4, 4, 'CRUD', '2019-06-11 02:48:33', '2019-06-11 02:48:38'),
	(31, 4, 22, 'CRUD', '2019-06-11 02:48:50', '2019-06-11 02:48:54'),
	(32, 4, 23, 'CRUD', '2019-06-11 02:49:00', '2019-06-11 02:49:04'),
	(33, 4, 24, 'CRUD', '2019-06-11 02:49:06', '2019-06-11 02:49:11'),
	(34, 4, 25, 'CRUD', '2019-06-11 03:19:12', '2019-06-11 03:19:16');
/*!40000 ALTER TABLE `group_menus` ENABLE KEYS */;

-- Dumping structure for table eRecord.image_libraries
CREATE TABLE IF NOT EXISTS `image_libraries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.image_libraries: ~0 rows (approximately)
/*!40000 ALTER TABLE `image_libraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_libraries` ENABLE KEYS */;

-- Dumping structure for table eRecord.jenis_surats
CREATE TABLE IF NOT EXISTS `jenis_surats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis` tinyint(4) DEFAULT NULL,
  `nama_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.jenis_surats: ~0 rows (approximately)
/*!40000 ALTER TABLE `jenis_surats` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_surats` ENABLE KEYS */;

-- Dumping structure for table eRecord.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrent` int(11) NOT NULL,
  `nama_parrent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.menus: ~24 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `nama_menu`, `parrent`, `nama_parrent`, `link`, `icon_menu`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Setting', 0, NULL, '#', 'icon-cogs', 2, '2019-03-25 08:56:03', '2019-06-11 03:16:42'),
	(2, 'Role', 1, NULL, 'roles', 'icon-accessibility', 3, '2019-03-25 16:14:10', '2019-04-23 02:56:17'),
	(3, 'Menu Backoffice', 1, NULL, 'menus', 'icon-list2', 1, '2019-03-26 00:00:00', '2019-04-23 02:55:28'),
	(4, 'Users', 1, NULL, 'users', 'icon-people', 2, '2019-03-25 17:31:04', '2019-04-23 02:56:46'),
	(5, 'Manage Content WEB', 0, NULL, '#', 'icon-earth', 2, '2019-03-25 17:32:23', '2019-04-11 09:34:41'),
	(6, 'Manage Blog', 5, NULL, 'berita', 'icon-newspaper2', NULL, '2019-03-25 17:32:55', '2019-03-28 04:43:28'),
	(7, 'Developer', 0, NULL, 'developer', 'icon-circle-code', 4, '2019-03-26 04:01:39', '2019-04-11 09:36:37'),
	(8, 'Blog Kategori', 6, NULL, 'blogcategories', 'icon-three-bars', NULL, '2019-03-28 04:20:36', '2019-03-28 07:42:07'),
	(9, 'Blog Posts', 6, NULL, 'blogs', 'icon-newspaper', NULL, '2019-03-28 04:44:27', '2019-03-28 07:41:46'),
	(10, 'Halaman Web', 5, NULL, 'pages', 'icon-stack', NULL, '2019-03-28 04:47:04', '2019-03-28 07:40:54'),
	(11, 'Pengaturan Menu Web', 1, NULL, 'frontend_menus', 'icon-menu2', 4, '2019-03-28 04:49:15', '2019-04-23 02:57:01'),
	(12, 'Manage Galeri', 0, NULL, '#', 'icon-movie', 3, '2019-04-11 09:10:18', '2019-04-12 02:32:02'),
	(14, 'Galeri Photos', 12, NULL, 'album_photos', 'icon-images3', 1, '2019-04-12 02:31:10', '2019-04-12 04:13:14'),
	(15, 'Galeri Videos', 12, NULL, 'video_galleries', 'icon-video-camera', 2, '2019-04-12 02:33:04', '2019-04-12 02:33:04'),
	(16, 'Manage File', 5, NULL, '#', 'icon-files-empty2', 3, '2019-04-16 08:09:46', '2019-04-16 08:09:46'),
	(17, 'File Kategori', 16, NULL, 'file_categories', 'icon-file-text2', 1, '2019-04-16 08:11:26', '2019-04-16 08:11:26'),
	(18, 'File Upload', 16, NULL, 'file_uploads', 'icon-file-upload', 2, '2019-04-16 08:12:38', '2019-04-16 08:12:38'),
	(19, 'Slider', 5, NULL, 'sliders', 'icon-image3', 4, '2019-04-22 06:32:04', '2019-04-22 06:42:54'),
	(20, 'Running Text', 5, NULL, 'runningtext', 'icon-text-width', 5, '2019-04-22 09:19:23', '2019-04-22 09:19:23'),
	(21, 'Link', 5, NULL, 'links', 'icon-link', 6, '2019-04-22 09:21:10', '2019-04-22 09:21:10'),
	(22, 'Dashboard', 0, NULL, 'home', 'icon-home2', 1, '2019-06-11 01:10:01', '2019-06-11 01:10:01'),
	(23, 'Direktorat', 0, 'ROOT', 'direktorat', 'icon-tree6', 3, '2019-06-11 01:10:48', '2019-06-11 03:20:00'),
	(24, 'Arsip', 0, NULL, 'bankmateri', 'icon-books', 5, '2019-06-11 01:16:14', '2019-06-11 03:20:24'),
	(25, 'Jenis Surat', 0, NULL, 'jenissurat', 'icon-newspaper', 4, '2019-06-11 03:18:49', '2019-06-11 03:18:49');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Dumping structure for table eRecord.menu_frontends
CREATE TABLE IF NOT EXISTS `menu_frontends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu_eng` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parrent` int(11) NOT NULL,
  `nama_parrent` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.menu_frontends: ~11 rows (approximately)
/*!40000 ALTER TABLE `menu_frontends` DISABLE KEYS */;
INSERT INTO `menu_frontends` (`id`, `nama_menu`, `nama_menu_eng`, `parrent`, `nama_parrent`, `link`, `nama_link`, `kategori`, `description`, `file`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Tentang Kami', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2019-04-09 02:19:26', '2019-04-11 04:48:59'),
	(5, 'contact', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2019-04-09 03:55:04', '2019-04-11 04:48:40'),
	(9, 'Beranda', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-04-10 04:45:29', '2019-04-10 04:45:29'),
	(10, 'Media', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2019-04-10 04:45:55', '2019-04-11 04:49:17'),
	(11, 'Struktur Organisasi', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-04-10 04:47:42', '2019-04-10 04:47:42'),
	(12, 'Galeri  Foto', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-04-10 04:48:20', '2019-04-10 04:48:20'),
	(13, 'Galeri Infografis', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2019-04-10 04:49:16', '2019-04-10 04:49:16'),
	(14, 'Sejarah', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2019-04-10 04:51:10', '2019-04-10 04:51:10'),
	(16, 'Berita', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2019-04-11 04:47:46', '2019-04-11 04:49:37'),
	(17, 'Berita', NULL, 16, NULL, '1', 'Berita Dinas', 2, NULL, NULL, 1, '2019-04-11 04:50:11', '2019-04-11 08:07:06'),
	(18, 'Artikel', NULL, 16, NULL, 'http://www.google.com', 'www.google.com', 4, NULL, NULL, 2, '2019-04-11 04:50:36', '2019-04-11 08:47:20');
/*!40000 ALTER TABLE `menu_frontends` ENABLE KEYS */;

-- Dumping structure for table eRecord.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.migrations: ~29 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(5, '2016_06_01_000004_create_oauth_clients_table', 1),
	(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(7, '2019_03_13_040017_create_users_table', 1),
	(8, '2019_03_13_063848_create_menus_table', 1),
	(9, '2019_03_14_042453_create_roles_table', 1),
	(10, '2019_03_21_073930_create_beritas_table', 1),
	(11, '2019_03_25_075853_create_group_menus_table', 1),
	(12, '2019_03_25_175557_create_comments_table', 1),
	(13, '2019_03_28_045628_create_blogs_table', 1),
	(14, '2019_03_28_062350_create_blog_categories_table', 1),
	(15, '2019_03_28_072320_create_pages_table', 1),
	(16, '2019_03_29_071209_create_image_libraries_table', 1),
	(17, '2019_03_29_071218_create_file_libraries_table', 1),
	(18, '2019_04_01_021042_create_menu_frontends_table', 1),
	(19, '2019_04_12_025649_create_photo_galleries_table', 1),
	(20, '2019_04_12_025830_create_album_photos_table', 1),
	(21, '2019_04_15_080033_create_video_galleries_table', 1),
	(22, '2019_04_18_014130_create_file_categories_table', 1),
	(23, '2019_04_18_014218_create_file_uploads_table', 1),
	(24, '2019_04_22_064413_create_sliders_table', 1),
	(25, '2019_04_28_161406_create_login_publics_table', 1),
	(26, '2019_05_22_065404_create_registers_table', 1),
	(27, '2019_05_29_025759_create_running_texts_table', 1),
	(28, '2019_06_10_035729_create_bank_materis_table', 1),
	(29, '2019_06_10_042942_create_direktorats_table', 1),
	(30, '2019_06_10_062606_create_jenis_surats_table', 2),
	(31, '2019_06_10_100149_create_subdits_table', 2),
	(32, '2019_06_11_032123_create_jenis_surats_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table eRecord.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.oauth_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table eRecord.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table eRecord.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.oauth_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table eRecord.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table eRecord.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table eRecord.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pages_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_desc_eng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table eRecord.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table eRecord.photo_galleries
CREATE TABLE IF NOT EXISTS `photo_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_albumphoto` int(11) DEFAULT NULL,
  `albumphoto_gallery_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_gallery_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_gallery_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumphoto_gallery_desc_eng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `sort_number` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `file_foto_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.photo_galleries: ~0 rows (approximately)
/*!40000 ALTER TABLE `photo_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_galleries` ENABLE KEYS */;

-- Dumping structure for table eRecord.public_users
CREATE TABLE IF NOT EXISTS `public_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `public_users_email_unique` (`email`),
  UNIQUE KEY `public_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.public_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `public_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `public_users` ENABLE KEYS */;

-- Dumping structure for table eRecord.registers
CREATE TABLE IF NOT EXISTS `registers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.registers: ~0 rows (approximately)
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;
/*!40000 ALTER TABLE `registers` ENABLE KEYS */;

-- Dumping structure for table eRecord.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_user_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nama_user_group`, `created_at`, `updated_at`) VALUES
	(1, 'SUPER ADMIN', '2019-04-23 13:54:35', '2019-06-11 02:45:16'),
	(2, 'SEKRETARIAT', '2019-06-11 01:12:35', '2019-06-11 01:12:35'),
	(3, 'KOMPONEN', '2019-06-11 01:12:42', '2019-06-11 01:12:42'),
	(4, 'ADMIN', '2019-06-11 02:45:03', '2019-06-11 02:45:03');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table eRecord.running_texts
CREATE TABLE IF NOT EXISTS `running_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.running_texts: ~0 rows (approximately)
/*!40000 ALTER TABLE `running_texts` DISABLE KEYS */;
/*!40000 ALTER TABLE `running_texts` ENABLE KEYS */;

-- Dumping structure for table eRecord.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.sliders: ~0 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table eRecord.subdits
CREATE TABLE IF NOT EXISTS `subdits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_direktorat` int(11) NOT NULL,
  `nama_subdit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.subdits: ~30 rows (approximately)
/*!40000 ALTER TABLE `subdits` DISABLE KEYS */;
INSERT INTO `subdits` (`id`, `id_direktorat`, `nama_subdit`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'BAGIAN PERENCANAAN', '1', '2019-06-11 01:40:28', '2019-06-11 02:25:45'),
	(2, 1, 'BAGIAN PERUNDANG-UNDANGAN', '1', '2019-06-11 01:42:06', '2019-06-11 01:42:06'),
	(3, 1, 'BAGIAN KEUANGAN', '1', '2019-06-11 01:42:26', '2019-06-11 01:42:26'),
	(4, 1, 'BAGIAN UMUM', '1', '2019-06-11 01:42:42', '2019-06-11 01:42:42'),
	(5, 2, 'SUDBIT PENATAAN DAERAH WILAYAH I', '1', '2019-06-11 01:45:26', '2019-06-11 01:45:26'),
	(6, 2, 'SUBDIT PENATAAN DAERAH WILAYAH II', '1', '2019-06-11 01:45:46', '2019-06-11 01:45:46'),
	(7, 2, 'SUBDIT PEMERINTAHAN ACEH, DKI JAKARTA DAN DI YOGYAKARTA', '1', '2019-06-11 01:46:55', '2019-06-11 01:46:55'),
	(8, 2, 'SUBDIT PROVINSI PAPUA DAN PAPUA BARAT', '1', '2019-06-11 01:47:26', '2019-06-11 01:47:26'),
	(9, 2, 'SUBDIT FASILITASI DPOD', '1', '2019-06-11 01:47:57', '2019-06-11 01:47:57'),
	(10, 3, 'SUBDIT PENATAAN DAERAH WILAYAH I', '1', '2019-06-11 01:50:15', '2019-06-11 01:50:15'),
	(11, 3, 'SUBDIT PENATAAN DAERAH WILAYAH II', '1', '2019-06-11 01:50:24', '2019-06-11 01:50:24'),
	(12, 3, 'SUBDIT PENATAAN DAERAH WILAYAH III', '1', '2019-06-11 01:50:50', '2019-06-11 01:50:50'),
	(13, 3, 'SUBDIT PENATAAN DAERAH WILAYAH IV', '1', '2019-06-11 01:51:04', '2019-06-11 01:51:04'),
	(14, 3, 'SUBDIT PENATAAN DAERAH WILAYAH V', '1', '2019-06-11 01:51:17', '2019-06-11 01:51:17'),
	(15, 4, 'SUBDIT PENATAAN DAERAH WILAYAH I', '1', '2019-06-11 01:52:21', '2019-06-11 01:52:21'),
	(16, 4, 'SUBDIT PENATAAN DAERAH WILAYAH II', '1', '2019-06-11 01:52:42', '2019-06-11 01:52:42'),
	(17, 4, 'SUBDIT PENATAAN DAERAH WILAYAH III', '1', '2019-06-11 01:52:51', '2019-06-11 01:52:51'),
	(18, 4, 'SUBDIT PENATAAN DAERAH WILAYAH IV', '1', '2019-06-11 01:53:03', '2019-06-11 01:53:03'),
	(19, 4, 'SUBDIT PENATAAN DAERAH WILAYAH V', '1', '2019-06-11 01:53:13', '2019-06-11 01:53:13'),
	(20, 5, 'SUBDIT PENATAAN DAERAH WILAYAH I', '1', '2019-06-11 01:54:09', '2019-06-11 01:54:09'),
	(21, 5, 'SUBDIT PENATAAN DAERAH WILAYAH II', '1', '2019-06-11 01:54:21', '2019-06-11 01:54:21'),
	(22, 5, 'SUBDIT PENATAAN DAERAH WILAYAH III', '1', '2019-06-11 01:54:33', '2019-06-11 01:54:33'),
	(23, 5, 'SUBDIT PENATAAN DAERAH WILAYAH IV', '1', '2019-06-11 01:54:45', '2019-06-11 01:54:45'),
	(24, 5, 'SUBDIT PENYERASIAN KEBIJAKAN', '1', '2019-06-11 01:55:07', '2019-06-11 01:55:07'),
	(25, 6, 'SUBDIT PENATAAN DAERAH WILAYAH I', '1', '2019-06-11 01:55:36', '2019-06-11 01:55:36'),
	(26, 6, 'SUBDIT PENATAAN DAERAH WILAYAH II', '1', '2019-06-11 01:55:47', '2019-06-11 01:55:47'),
	(27, 6, 'SUBDIT PENATAAN DAERAH WILAYAH III', '1', '2019-06-11 01:55:57', '2019-06-11 01:55:57'),
	(28, 6, 'SUBDIT EVALUASI PENINGKATAN KAPASITAS DAERAH', '1', '2019-06-11 01:57:01', '2019-06-11 01:57:01'),
	(29, 6, 'SUBDIT DUKUNGAN TEKNIS DAN DOKUMENTASI', '1', '2019-06-11 01:57:27', '2019-06-11 01:57:27');
/*!40000 ALTER TABLE `subdits` ENABLE KEYS */;

-- Dumping structure for table eRecord.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_group` int(11) NOT NULL DEFAULT 2,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id_direktorat` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `hp`, `id_user_group`, `is_admin`, `status`, `id_direktorat`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'admin@mail.com', 'admin', '$2y$10$qe9QPx.lBbCuzhZSHFXa4eXHVeT23yR3LzSBem7VbKU7JNpcm8RkW', '088876765654', 1, 0, 1, 0, NULL, '2019-03-25 18:01:12', '2019-06-11 02:45:46'),
	(2, 'SEKRETARIAT', 'sekretariat@mail.com', 'sekretariat', '$2y$10$3qqeKtXlDXWMoKwFkBB0b.mVuB0mCtMbLi06FM7ihaYjXtj88SgkW', '0222', 2, 0, 1, 1, NULL, '2019-06-11 01:15:01', '2019-06-11 04:28:35'),
	(3, 'Admin', 'admin.app@mail.com', 'admin_app', '$2y$10$wflCqrIRxZfscBza766rm.9UCsD6BUBYcUXKno1Y2WCCKJaWat9qy', '0222', 4, 0, 1, 0, NULL, '2019-06-11 02:47:49', '2019-06-11 02:47:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table eRecord.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_desc_eng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eRecord.videos: ~0 rows (approximately)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
