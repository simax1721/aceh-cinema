-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2025 at 03:48 PM
-- Server version: 8.4.3
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aceh_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_19_172213_create_movies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('documentary','fiction') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dacast_embed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'embed link dari Dacast',
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `release_date` date DEFAULT NULL,
  `rating` double(2,1) NOT NULL DEFAULT '0.0',
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `category`, `dacast_embed`, `poster`, `description`, `release_date`, `rating`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Accusantium laudantium.', 'fiction', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=18', 'Quae rerum enim voluptatem nobis magnam. Ad quia sint aperiam qui odio eum repellendus. Perspiciatis aspernatur doloremque ipsum ex eligendi voluptatem dolor.', '2025-01-28', 6.1, 2211, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(2, 'Vero totam placeat.', 'fiction', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=159', 'Dicta rem provident ab nobis animi ipsum nisi iste. Soluta laborum eos eveniet. Aut voluptatem reprehenderit non officia. Debitis explicabo qui architecto et aut ea doloremque.', '2024-06-15', 8.5, 4998, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(3, 'Itaque quidem assumenda iusto quam.', 'documentary', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=148', 'Itaque quod vel veniam autem suscipit eum. Dignissimos dignissimos voluptatibus quis reiciendis accusantium ut. Deleniti ratione odit praesentium.', '2024-02-28', 7.2, 1400, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(4, 'Et voluptatem nostrum quia.', 'fiction', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=181', 'Porro soluta adipisci placeat velit cum officia eum. Non qui debitis sed. Perspiciatis molestias libero odio nesciunt totam.', '2024-01-10', 7.4, 2037, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(5, 'Ea veritatis animi neque.', 'documentary', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=28', 'Doloribus repudiandae accusantium totam ut non in aliquid ea. Consequatur et recusandae rerum omnis et. Expedita quo tempore rem molestiae libero commodi eligendi.', '2025-02-02', 7.5, 2908, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(6, 'Iure temporibus alias est.', 'fiction', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=130', 'Repellat et ratione adipisci qui. Harum voluptas vel quia. Corrupti temporibus optio quia sed quas ipsum rerum optio.', '2024-05-02', 5.5, 4124, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(7, 'Consequatur quibusdam itaque ratione.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=178', 'Nesciunt impedit sunt repellendus dolorem aperiam. Et repellat necessitatibus rerum nam ullam. Voluptatum vel voluptates dolores tempore dolor. Vitae incidunt voluptatem quia veritatis.', '2025-07-17', 8.1, 4913, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(8, 'Culpa fugiat sed adipisci aut.', 'documentary', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=72', 'Repellat blanditiis officia et laudantium odit quasi. Officia non voluptas molestiae qui reprehenderit ea omnis. Doloremque impedit eius rerum ipsa aut. Est nisi eum id exercitationem commodi labore.', '2025-06-30', 7.0, 2122, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(9, 'Et adipisci fuga laudantium cum.', 'documentary', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=46', 'Nulla ea dolores et aliquid fugiat quia consequatur. Aut ut distinctio consequatur similique in odio nobis. Animi harum illum quisquam odio quidem et animi. Corrupti et consectetur ipsum qui explicabo aut pariatur.', '2025-08-06', 7.0, 4266, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(10, 'Similique adipisci nihil quia.', 'documentary', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=84', 'Nihil ducimus et et magni. Quia nisi ut nisi voluptatibus debitis. Dicta possimus voluptatem ex amet earum nam consectetur placeat.', '2023-12-03', 6.9, 821, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(11, 'Recusandae animi dicta veritatis.', 'fiction', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=8', 'Totam harum id ea repellat illum ab ducimus. Sit rem enim ipsum et quos occaecati vel. Illo possimus voluptatem ullam harum. Qui ab fugit ex similique.', '2023-11-05', 6.3, 1911, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(12, 'Voluptas ut nihil.', 'documentary', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=193', 'Nostrum dolor odio non reprehenderit. Ut adipisci et impedit nostrum rem. Consectetur ut fugit qui est autem in cumque.', '2024-07-21', 7.3, 2064, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(13, 'Cumque et et.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=85', 'Omnis quis deleniti ut omnis quo molestiae. Ullam et animi et doloremque. Officia culpa magnam ipsa.', '2024-03-08', 5.9, 437, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(14, 'Totam sed tempore.', 'documentary', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=35', 'Et voluptatem voluptate non voluptatibus magni labore. Hic ut velit quia fugit. Sapiente at quos quis rerum earum. Nisi et et esse nostrum qui itaque provident.', '2023-10-30', 7.2, 4238, '2025-10-19 10:29:39', '2025-10-19 10:29:39'),
(15, 'Commodi quaerat repellendus.', 'documentary', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=96', 'Laudantium similique est ut rem ut expedita. Tenetur esse vel itaque porro dolore earum. Aut enim soluta enim porro error iste.', '2025-08-04', 5.6, 3628, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(16, 'Quo earum odio.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=38', 'Repellat et nihil exercitationem. Perferendis quos quas modi alias vero et sint. Maxime quisquam cupiditate sit beatae officia dolores. Eum necessitatibus at molestias.', '2024-01-04', 6.2, 774, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(17, 'Eveniet officiis ut ut.', 'fiction', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=4', 'Eos enim nesciunt minus laboriosam. Dolorum ut sequi dolorem rem non voluptas corporis. Facilis non ut modi ut.', '2024-03-28', 6.7, 3925, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(18, 'Quas debitis voluptates aspernatur.', 'documentary', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=2', 'Et animi nostrum reiciendis aut. Et rem tempore rerum ducimus nam. Tenetur sed alias consequatur sit quibusdam quaerat.', '2024-11-04', 5.8, 514, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(19, 'Beatae quam.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=54', 'Ipsam sit beatae sit odio in ea magnam. Omnis aspernatur qui officia fugiat. Dolore dignissimos minima labore.', '2025-04-07', 8.3, 2426, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(20, 'Sequi amet et quam voluptatem.', 'documentary', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=154', 'Nihil et quas incidunt saepe non. Aperiam rerum nesciunt harum occaecati ut nam. Iure aut voluptatem dolor voluptatibus qui sequi.', '2025-06-17', 7.9, 904, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(21, 'Quibusdam cumque.', 'documentary', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=30', 'Earum culpa id quis accusamus fugit eos et. Quo minus explicabo eum dolores quod facilis eum. Maxime ea labore maxime et.', '2025-01-18', 7.0, 2762, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(22, 'Consequatur officia debitis quasi.', 'fiction', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=47', 'Facere atque doloremque ab omnis iusto aut quos. Repellat voluptates omnis assumenda qui adipisci tempora omnis.', '2024-12-31', 5.5, 1492, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(23, 'Expedita eligendi laudantium.', 'documentary', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=83', 'Provident enim occaecati quidem dolores. Placeat debitis consequuntur similique id recusandae. Culpa consequatur sit accusantium aut eaque sit ad non. Velit in sunt culpa magnam est eum.', '2024-08-19', 8.9, 1707, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(24, 'Et voluptate voluptate quasi.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=123', 'Atque aut fuga sunt et accusantium. Expedita non et vero qui et dolorum debitis quis. Qui quibusdam quidem nihil officia beatae consequuntur sapiente. Veniam qui magni qui aliquid.', '2024-10-19', 6.3, 3077, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(25, 'Atque molestias distinctio.', 'fiction', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=89', 'Pariatur a distinctio natus aut. Veritatis eum incidunt quia ducimus sit. Aut qui sint beatae aliquam architecto ut provident. Ad consequatur est ea maiores nulla exercitationem.', '2024-03-24', 7.7, 4297, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(26, 'Est praesentium non.', 'documentary', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=112', 'Expedita voluptatem qui officiis. Sed et quo provident nostrum odio.', '2023-11-20', 6.9, 2311, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(27, 'Corporis qui qui.', 'documentary', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=195', 'Voluptates quaerat in et eum quas. Tempore accusantium officiis iure alias aspernatur qui maxime. Qui molestiae impedit qui natus aliquam et ducimus. Qui et qui nobis sed.', '2025-01-31', 6.1, 4005, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(28, 'Et itaque earum iste aut.', 'fiction', 'https://iframe.dacast.com/live/67890/ghijkl', 'https://picsum.photos/300/450?random=34', 'Iste pariatur maiores est corrupti ipsam. Sit iusto ea dolorem quae explicabo voluptatem laborum. Molestiae iste voluptas perferendis nulla.', '2024-08-16', 6.0, 1770, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(29, 'Dicta tempora nam libero ratione.', 'fiction', 'https://iframe.dacast.com/live/11121/mnopqr', 'https://picsum.photos/300/450?random=59', 'Expedita nostrum porro tempore sit. Qui quis nihil consequatur fuga. Autem natus assumenda debitis rerum.', '2024-06-05', 8.5, 3191, '2025-10-19 10:29:40', '2025-10-19 10:29:40'),
(30, 'Eligendi ex atque consequatur quis.', 'documentary', 'https://iframe.dacast.com/live/12345/abcdef', 'https://picsum.photos/300/450?random=65', 'Optio neque ut voluptatem. Voluptatem sed voluptatibus et. Nostrum sunt corporis id neque aut. Natus quam reiciendis odit reiciendis exercitationem quia.', '2023-12-08', 8.3, 4747, '2025-10-19 10:29:40', '2025-10-19 10:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
