-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 02:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javzine`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `color`, `slug`, `created_at`, `updated_at`) VALUES
(1, '報告', 'fa-solid fa-fire fa-xl', '#ff0000', 'houkoku', '2023-09-08 00:54:47', '2025-01-01 03:45:51'),
(2, '連絡', 'fa-solid fa-leaf fa-xl', '#fdcb6e', 'renraku', '2023-09-08 00:55:08', '2025-01-01 03:46:13'),
(8, '相談', 'fa-regular fa-compass fa-xl', '#74b9ff', 'soudan', '2023-09-09 07:59:48', '2025-01-01 03:46:45'),
(9, 'Tips', 'fa-solid fa-person-skating fa-xl', '#849be6', 'tips', '2023-09-11 07:13:04', '2025-01-01 03:47:08'),
(10, '実例', 'fa-solid fa-plane-departure', '#94d461', 'jitsurei', '2023-09-11 07:14:12', '2025-01-01 03:47:50'),
(11, '経験', 'fa-solid fa-school fa-xl', '#e840b5', 'keiken', '2023-09-11 07:14:39', '2025-01-01 03:48:12'),
(12, '職場文化', 'fa-solid fa-language fa-xl', '#e6863a', 'shokubabunka', '2023-09-11 07:15:03', '2025-01-01 03:51:45'),
(13, '学び合い', 'fa-solid fa-tv fa-xl', '#49acc4', 'manabiai', '2023-09-11 07:15:41', '2025-01-01 03:52:14'),
(14, '自己改善', 'fa-solid fa-ghost fa-xl', '#050505', 'jikokaizen', '2023-09-11 07:16:33', '2025-01-01 03:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(1000) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(11, 'Nể ông này thật:v', 28, 21, '2023-09-14 03:15:34', '2023-09-14 03:15:34'),
(85, '報告がうまく伝わらないとき、最も重要なのは、上司が何を期待しているかを理解することだと思います。私も最初は同じような経験をしましたが、次の点を意識することで改善できました。\n\nまず、報告の前に「具体的にどんな情報が必要か？」と上司に確認してみるのは効果的です。例えば、「進捗報告には、どのくらいの詳細さが必要ですか？」と尋ねてみると、上司の期待がより明確になります。\n\nまた、報告の際に「結果」「課題」「次のステップ」といった構成にまとめることで、上司も理解しやすくなります。自分が考えるべき情報を先に整理し、漏れがないように心がけると、より具体的な報告ができますよ。\n\n最初は少し手間に感じるかもしれませんが、上司とのコミュニケーションを密にすることで、次第にスムーズに報告できるようになると思います。', 50, 20, '2025-01-01 04:46:25', '2025-01-01 04:46:25'),
(86, '私も似たような経験があります。上司が求める情報を正確に把握することが、報告がうまく伝わるための鍵だと思います。私の場合、まず報告の前に上司に「この報告はどのように伝えた方が良いか？」と確認してみるようにしました。それによって、上司の期待に近い報告ができるようになりました。\n\nまた、報告の内容は簡潔でありながら、必要な情報は漏れなく伝えることが大切です。私の場合、進捗状況を「達成したこと」「直面している問題」「今後の対応策」といったカテゴリーに分けて報告することで、上司も理解しやすくなりました。\n\n最初は難しいかもしれませんが、繰り返し行うことで、どの情報が求められているかが見えてくると思います。上司とコミュニケーションを取りながら、お互いに納得のいく報告ができるようになると良いですね。', 51, 20, '2025-01-01 04:49:29', '2025-01-01 04:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(27, 55, 26, '2023-09-13 02:44:30', '2023-09-13 02:44:30'),
(29, 8, 26, '2023-09-13 02:44:33', '2023-09-13 02:44:33'),
(30, 20, 26, '2023-09-13 02:44:49', '2023-09-13 02:44:49'),
(37, 49, 28, '2023-09-13 07:45:34', '2023-09-13 07:45:34'),
(47, 6, 28, '2023-09-14 02:22:33', '2023-09-14 02:22:33'),
(66, 20, 42, '2024-12-12 00:46:54', '2024-12-12 00:46:54'),
(68, 7, 42, '2024-12-12 00:47:11', '2024-12-12 00:47:11'),
(69, 55, 42, '2024-12-12 00:47:33', '2024-12-12 00:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `content`, `post_id`, `created_at`, `updated_at`) VALUES
(20, 'Bài viết bị lỗi hình ảnh\n', 13, '2023-09-15 03:32:07', '2023-09-15 03:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_08_074712_create_categories_table', 2),
(6, '2023_09_08_075655_create_posts_table', 3),
(7, '2023_09_10_055124_create_comments_table', 4),
(8, '2023_09_10_072625_create_favorites_table', 5),
(9, '2023_09_10_075844_create_favorites_table', 6),
(10, '2023_09_14_071413_create_feedback_table', 7),
(11, '2023_09_15_105419_create_page_views_table', 8),
(12, '2023_09_15_111554_create_post_views_table', 9),
(13, '2024_12_18_030049_create_notifications_table', 10),
(14, '2024_12_18_032134_add_status_to_notifications_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `post_id`, `body`, `created_at`, `updated_at`, `status`) VALUES
(66, 2, 20, '誰かがあなたの投稿にコメントした。', '2025-01-01 04:46:25', '2025-01-01 04:46:25', 'unread'),
(67, 2, 20, '誰かがあなたの投稿にコメントした。', '2025-01-01 04:49:29', '2025-01-01 04:49:29', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `view_at` date DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `page`, `view_at`, `views`, `created_at`, `updated_at`) VALUES
(124, '/', '2023-09-16', 60, '2023-09-15 23:43:57', '2023-09-16 05:53:14'),
(125, '/', '2023-09-15', 45, '2023-09-15 07:04:14', NULL),
(126, '/', '2023-09-14', 71, '2023-09-14 07:04:26', NULL),
(127, '/', '2023-09-13', 39, '2023-09-13 07:04:42', NULL),
(128, '/', '2023-09-12', 100, '2023-09-12 07:04:57', '2023-09-12 07:04:57'),
(129, '/', '2023-09-11', 29, '2023-09-11 07:05:16', '2023-09-11 07:05:16'),
(130, '/', '2023-09-10', 67, '2023-09-10 07:05:33', '2023-09-10 07:05:33'),
(131, '/', '2023-09-17', 37, '2023-09-16 22:30:26', '2023-09-17 07:59:27'),
(132, '/', '2023-09-18', 2, '2023-09-18 03:51:59', '2023-09-18 03:52:43'),
(133, '/', '2023-09-26', 5, '2023-09-26 07:40:21', '2023-09-26 07:41:41'),
(134, '/', '2023-09-28', 30, '2023-09-28 02:21:48', '2023-09-28 03:00:39'),
(135, '/', '2023-09-30', 10, '2023-09-30 06:20:25', '2023-09-30 09:01:03'),
(136, '/', '2023-10-09', 12, '2023-10-09 05:36:22', '2023-10-09 08:34:12'),
(137, '/', '2023-10-23', 5, '2023-10-23 05:40:33', '2023-10-23 05:44:53'),
(138, '/', '2023-10-24', 13, '2023-10-23 22:55:41', '2023-10-24 00:23:02'),
(139, '/', '2023-11-07', 5, '2023-11-06 21:05:23', '2023-11-06 21:18:52'),
(140, '/', '2024-03-03', 4, '2024-03-03 07:55:30', '2024-03-03 07:55:57'),
(141, '/', '2024-03-12', 9, '2024-03-12 06:58:35', '2024-03-12 07:13:42'),
(142, '/', '2024-03-18', 5, '2024-03-18 07:25:49', '2024-03-18 07:27:31'),
(143, '/', '2024-05-03', 4, '2024-05-03 01:21:52', '2024-05-03 01:22:43'),
(144, '/', '2024-05-03', 1, '2024-05-03 01:21:52', '2024-05-03 01:21:52'),
(145, '/', '2024-05-07', 4, '2024-05-07 06:55:20', '2024-05-07 06:58:45'),
(146, '/', '2024-05-12', 1, '2024-05-12 00:12:01', '2024-05-12 00:12:01'),
(147, '/', '2024-05-14', 5, '2024-05-13 23:42:06', '2024-05-14 09:20:33'),
(148, '/', '2024-05-16', 1, '2024-05-16 04:00:53', '2024-05-16 04:00:53'),
(149, '/', '2024-05-17', 1, '2024-05-17 00:45:32', '2024-05-17 00:45:32'),
(150, '/', '2024-05-23', 1, '2024-05-23 06:12:43', '2024-05-23 06:12:43'),
(151, '/', '2024-05-24', 1, '2024-05-24 00:30:17', '2024-05-24 00:30:17'),
(152, '/', '2024-06-02', 2, '2024-06-01 22:34:02', '2024-06-01 22:34:12'),
(153, '/', '2024-06-07', 3, '2024-06-06 22:24:34', '2024-06-07 00:57:05'),
(154, '/', '2024-06-12', 1, '2024-06-11 20:46:28', '2024-06-11 20:46:28'),
(155, '/', '2024-06-12', 1, '2024-06-11 20:46:28', '2024-06-11 20:46:28'),
(156, '/', '2024-10-24', 20, '2024-10-24 01:08:56', '2024-10-24 02:48:43'),
(157, '/', '2024-11-25', 5, '2024-11-25 09:32:05', '2024-11-25 09:58:12'),
(158, '/', '2024-11-28', 17, '2024-11-28 00:36:46', '2024-11-28 02:04:01'),
(159, '/', '2024-12-03', 1, '2024-12-03 06:58:29', '2024-12-03 06:58:29'),
(160, '/', '2024-12-05', 1, '2024-12-05 00:24:59', '2024-12-05 00:24:59'),
(161, '/', '2024-12-12', 46, '2024-12-11 20:25:09', '2024-12-12 00:56:46'),
(162, '/', '2024-12-16', 2, '2024-12-16 08:01:04', '2024-12-16 08:42:40'),
(163, '/', '2024-12-17', 7, '2024-12-16 19:11:02', '2024-12-16 19:14:59'),
(164, '/', '2024-12-17', 1, '2024-12-16 19:11:02', '2024-12-16 19:11:02'),
(165, '/', '2024-12-18', 5, '2024-12-17 19:37:39', '2024-12-18 04:37:38'),
(166, '/', '2024-12-20', 128, '2024-12-19 17:16:27', '2024-12-19 19:58:31'),
(167, '/', '2024-12-25', 138, '2024-12-24 19:24:24', '2024-12-25 10:53:06'),
(168, '/', '2024-12-26', 22, '2024-12-26 00:01:35', '2024-12-26 03:12:17'),
(169, '/', '2024-12-29', 30, '2024-12-29 01:31:04', '2024-12-29 11:13:03'),
(170, '/', '2024-12-30', 21, '2024-12-29 19:02:27', '2024-12-30 08:11:48'),
(171, '/', '2024-12-31', 21, '2024-12-30 17:51:07', '2024-12-31 11:19:26'),
(172, '/', '2025-01-01', 158, '2024-12-31 22:48:49', '2025-01-01 06:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) NOT NULL,
  `intro` varchar(10000) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `tags` longtext DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `intro`, `content`, `thumbnail`, `tags`, `published`, `view`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, '休暇の連絡が苦手です', '急に休みが必要になった時、職場への連絡がとても気まずいです。', '先日、体調を崩して仕事を休むことになりましたが、上司に連絡するタイミングを迷ってしまい、結果的に当日の朝に伝える形になりました。その時、上司から「もっと早く言えなかったのか？」と言われてしまい、申し訳ない気持ちでいっぱいです。今後同じことが起きないように、早めに連絡する方法や、どう伝えれば相手に不快な思いをさせずに済むのかアドバイスをいただきたいです。', 'images/sjn8y1IdfQTGGZ4N5003LQ0LHraNcK-metaNDUtNTAweDUwMC5qcGc=-.jpg', '[\"oiran\",\"geisha\",\"van hoa\",\"ki nu\",\"pho den do\"]', 1, 102, 2, 28, '2023-09-07 07:35:21', '2025-01-01 04:11:21'),
(6, '即答できない時の連絡の仕方', '上司や同僚からの質問にすぐ答えられない時、どう対応すれば良いのか悩んでいます。', '仕事中に上司から「この資料、いつ完成する？」と聞かれることがよくありますが、その場ですぐに答えられないことがあります。焦って曖昧な答えをしてしまい、後でトラブルになることも…。皆さんは、答えが分からない場合、どのように連絡していますか？「少しお時間をください」と伝えるのが良いのか、それとも別の方法があるのでしょうか？アドバイスをいただけると助かります。', 'images/xLVhSRKh4e7O5xilO1ds6RLTgIkABn-metaMzY0LTUwMHg1MDAuanBn-.jpg', '[\"kitsune\",\"h\\u1ed3 ly tinh\",\"van hoa\",\"cuu vi ho\"]', 1, 132, 2, 28, '2023-09-09 17:00:00', '2025-01-01 04:12:30'),
(7, '同僚からの返信が来ない場合の対処法', '仕事でメッセージを送っても返事が来ない時、どうすれば良いのでしょうか？', '最近、プロジェクトで一緒に働いている同僚に質問を送ったのですが、何日経っても返信がありません。急ぎの内容ではなかったので再度確認するのも気が引けますが、このまま放置して良いのか分かりません。皆さんなら、どのように対応しますか？再送する場合、どう伝えれば失礼に聞こえないでしょうか？アドバイスをお願いしたいです。', 'images/T53k01ICknl4SFbD7Y8G0lUktzHFNL-metaNDkxLTUwMHg1MDAuanBn-.jpg', '[\"ohitorisama\",\"xa hoi\",\"ket hon\"]', 1, 134, 2, 28, '2023-09-11 08:02:26', '2025-01-01 05:49:57'),
(8, '電話かメールか、迷った時の基準', '連絡手段として電話かメールを選ぶ時、どちらが適切なのか迷っています。', '先日、顧客から急ぎの質問がありましたが、電話するべきかメールで対応するべきか迷ってしまいました。結局メールを選びましたが、「すぐに対応してほしい」というニュアンスがあったようで、後から「電話の方が良かった」と指摘されてしまいました。同じような状況になった場合、どう判断すれば良いのか知りたいです。皆さんは、連絡手段を選ぶ基準として何を重視していますか？', 'images/7pvO85QSP4fWFvQWEq1x4PxFYLFlWd-metaNTEwLTUwMHg1MDAuanBn-.jpg', '[\"xa hoi\",\"nghien\",\"phim nguoi lon\"]', 1, 84, 2, 28, '2023-09-10 08:05:22', '2025-01-01 06:14:21'),
(10, 'メッセージの誤解を防ぐには？', '職場でのチャットやメールで、自分の意図が正しく伝わらないことが多いです。', '例えば、簡潔に返信しようと「了解しました」とだけ書いたところ、相手から「冷たい印象を受けた」と言われたことがあります。他にも、丁寧に書いたつもりでも「何が言いたいのか分からない」と言われてしまい、どうしていいか分からなくなりました。メッセージで誤解を生まないためには、どのように工夫すれば良いのでしょうか？具体的な例があれば教えていただきたいです。', 'images/W7iqbISWj04qaQk2OkkXFWSUwdC79p-metaNzg0LTUwMHg1MDAuanBn-.jpg', '[\"yukata\",\"kimono\",\"van hoa\",\"mua he\"]', 1, 230, 2, 4, '2023-07-11 22:46:28', '2025-01-01 04:14:41'),
(11, '報告の失敗から学んだ教訓', '一度の報告の失敗が大きな影響を与えることがあります。私の体験を共有します。', '数ヶ月前、私はプロジェクトの進捗を上司に報告しましたが、思ったように理解してもらえず、結果的にプロジェクトが遅れてしまいました。その時の失敗から学んだことを共有します。\n\n* 背景を十分に説明する: 当時、状況を簡潔に伝えすぎたため、上司が全体像をつかめませんでした。次回からは、背景や状況を整理して伝えるようにしました。\n* 質問を歓迎する姿勢を持つ: 報告後、上司が疑問点を抱えても、それに対応する準備をしていませんでした。今では「質問が出ることは良いこと」と捉え、前もって答えを準備するようになりました。\n失敗は恥ずかしい経験でしたが、その後の改善に大きく役立ちました。', 'images/8ZTaoYlvY6e8uzRhYVw8E9LcxLFkuY-metaMjI1LTUwMHg1MDAuanBn-.jpg', '[\"america mura\",\"osaka\",\"namba\",\"du lich\"]', 1, 112, 10, 4, '2023-08-19 22:53:08', '2025-01-01 04:30:37'),
(12, '週次ミーティングで連絡不足を解消した例', 'プロジェクトが停滞していた私たちのチームは、ある工夫でスムーズに進むようになりました。', '私たちのチームでは、以前、進捗状況が共有されず、各自が勝手に作業を進めてしまう問題がありました。しかし、ある日リーダーが「週次ミーティングを取り入れよう」と提案しました。\n\n* 具体的な成果: 毎週30分間だけのミーティングでしたが、全員が現在の状況を共有することで、認識のズレが解消されました。\n* チームの一体感が向上: メンバーが互いの仕事を理解し、自然とサポートし合うようになりました。\nたった30分の工夫でこれほど変わるとは思いませんでした。連絡が不足していると感じたら、一度ミーティングの導入を検討してみてください！', 'images/OeVTtGIOCJG5bCZGFM1kDA6c87LuBB-metaNjc4LTUwMHg1MDAuanBn-.jpg', '[\"mie\",\"gifu\",\"niigata\",\"shiga\",\"yamagata\",\"kagawa\",\"miyazaki\",\"ishikawa\",\"du lich\"]', 1, 56, 10, 4, '2023-05-21 22:59:01', '2025-01-01 04:31:18'),
(13, '同僚からの相談で新しい解決策を発見した話', '行き詰まっていたプロジェクトが、同僚の一言で大きく前進した経験があります。', 'ある日、プロジェクトで大きな問題に直面しました。どう進めば良いか分からず、悩んでいた私は、同僚に相談してみることにしました。\n\n* 具体的な問題: クライアントの要求が頻繁に変わり、計画が崩れる状況でした。\n* 同僚の提案: 「クライアントと次回の打ち合わせで明確なゴールを設定してみては？」と言われ、そのアドバイスを実行しました。\n結果として、クライアントとこちらの認識が一致し、プロジェクトが無事に進むようになりました。相談する勇気を持つことで、視野が広がると実感しました。', 'images/e6qdtGoniBkHhAZ9U0UXSLkwookX5l-metaOTI4LTUwMHg1MDAuanBn-.jpg', '[\"du lich\",\"khao sat\",\"bat tien\"]', 1, 25, 10, 4, '2023-05-16 23:01:47', '2025-01-01 04:32:01'),
(16, 'ミスを報告するのが怖いです', '最近、仕事で小さなミスをしてしまいましたが、上司に報告するのが怖くて悩んでいます。同じような経験をされた方はいませんか？', '初めてのプロジェクトで、書類作成中に数値を間違えてしまいました。自分で気づいて修正できたのですが、上司に報告するべきか迷っています。以前、同僚がミスを報告した際、厳しい指摘を受けていたのを見て、正直ビクビクしています。報告しないと後で大きな問題になるかもしれないのは分かっていますが、どうしても一歩踏み出せません。こういう場合、どうやって報告すれば良いのか、アドバイスをいただけると嬉しいです。', 'images/3CjCpRrlvk0jbAPBGcCsFc5mgnU8Uw-metaYmQ5OGY1NTZmNWQ1NDhlZTFjZWVjZWM2YTUxZDU4MTcuanBn-.jpg', '[\"report\",\"houkoku\"]', 1, 146, 1, 4, '2023-04-10 23:18:46', '2025-01-01 04:01:30'),
(17, '日報を書くのが苦手です', '日報を書くたびに、何をどう書けばいいか迷っています。他の人の日報が参考になることがあれば教えてほしいです。', '私は現在、営業職に就いていて、毎日業務終了後に日報を書くことが求められています。しかし、いつも何を書けばいいか分からず、「今日も頑張りました」とだけ書いてしまいます。上司からも「もっと具体的に書いてほしい」と言われるのですが、具体的とはどういうことなのかよく分かりません。他の方は日報にどのような内容を書いているのでしょうか？「報告」や「課題」を書くと言われても、どうやって文章にまとめればいいのか分かりません。同じ悩みを持っている方、ぜひアドバイスをお願いします。', 'images/m9f2tnoXvJP2D55w0CBmdvRNFpCwBH-metaOTQ4LTUwMHg1MDAuanBn-.jpg', '[\"report\",\"houkoku\"]', 1, 53, 1, 2, '2023-03-12 23:23:37', '2025-01-01 04:03:12'),
(18, '報告のタイミングを改善したいです', 'いつも報告が遅いと言われてしまい、どうすれば良いか悩んでいます。', '私は仕事の優先順位を決めるのが苦手で、特に報告を後回しにしてしまう癖があります。最近も、上司から「もっと早く報告してほしい」と指摘され、自己嫌悪に陥っています。ただ、仕事に集中していると、報告のことを忘れてしまうのです。皆さんは、どのようにして報告をスムーズに行っていますか？リマインダーなどを活用した方がいいのでしょうか？それとも、自分でタイミングを意識するしかないのでしょうか？', 'images/3962EZPeL5vBPhpdPj6sTGTph5s3V2-metaODUyLTUwMHg1MDAuanBn-.jpg', '[\"report\",\"houkoku\"]', 1, 411, 1, 2, '2023-03-18 23:25:58', '2025-01-01 04:04:10'),
(19, 'プロジェクトが進まない原因', '現在担当しているプロジェクトが進まず、チーム内での課題を報告するか迷っています。', '今のプロジェクトは、最初から少ない人数で始まり、現在もリソース不足が続いています。自分も精一杯頑張っていますが、どうしても仕事が追いつかない状況です。しかし、上司に報告すると「それくらいの人数でできるはずだ」と言われそうで、躊躇しています。皆さんなら、このような状況をどう伝えますか？また、改善策を提案する際にどんなアイデアを出すべきか、ぜひアドバイスをください。', 'images/GY3FJfzZIRLznd0QY5iQAVZzzFGIuC-metaNTEwLTUwMHg1MDAuanBn-.jpg', '[\"lifestyle\",\"doc than\",\"can ho\",\"chi phi\"]', 1, 373, 1, 2, '2023-05-31 23:29:10', '2025-01-01 04:04:53'),
(20, '報告が伝わらない原因は？', '報告した内容が上司に伝わらず、いつも話が噛み合いません。どうすれば改善できるでしょうか？', '先日も、上司に仕事の進捗を報告しましたが、「具体性が足りない」と言われてしまいました。自分ではしっかり伝えているつもりなのですが、どうやら上司の期待している情報とズレているようです。何度か聞き直しても「考えれば分かるだろう」と返され、どう改善すればいいのか分かりません。他の方は、上司が求めている情報をどうやって把握していますか？分かりやすい報告のコツがあれば教えてください。', 'images/OBQFbEjuwVIoEhCDJdWEOWGcuYwDfA-metaODQ4LTUwMHg1MDAuanBn-.jpg', '[\"houkoku\",\"report\"]', 1, 352, 1, 2, '2023-09-11 23:34:11', '2025-01-01 04:59:17'),
(21, '上司からの厳しい指摘にどう対応すれば良いか', '最近、上司から厳しい指摘を受けることが多く、精神的に参っています。', '上司から「これでは全然ダメだ」と言われることが増え、自分の仕事に自信を持てなくなってきました。一生懸命やっているつもりですが、結果が出ていないようで…。同僚に相談するのも恥ずかしいし、家庭に持ち帰っても心配されるだけです。この状況をどう乗り越えれば良いのでしょうか？厳しい言葉を受け止めながら成長する方法を知りたいです。', 'images/PQLOyntU5h9aT0iNUez7eG82a7hles-metaNjE2LTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"bao tang\",\"bup be\"]', 1, 514, 8, 27, '2023-05-21 23:43:05', '2025-01-01 04:18:52'),
(22, '断りたいのに断れない…どうすれば良い？', '同僚からのお願いを引き受けるばかりで、自分の仕事が進まなくなっています。', 'いつも「手伝ってほしい」と頼まれると断れず、結果的に自分の仕事が遅れてしまいます。特に、相手が困っていると「自分が助けなきゃ」と思ってしまい、何でも引き受けてしまう性格です。でも最近、自分が抱えるタスクが溜まりすぎて限界です。断ることが相手に悪い印象を与えるのではと心配してしまいますが、どう伝えれば良いのでしょうか？', 'images/Jg7Ow0JZNFJ7SahpUCQ86HNQz6AbXp-metaODQ2LTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"taxi\",\"gioi tinh\",\"nu gioi\"]', 1, 575, 8, 27, '2022-11-20 23:45:28', '2025-01-01 04:23:59'),
(23, 'クレーム対応で困った時のアドバイスが欲しい', '顧客対応中に厳しいクレームを受け、どう反応すれば良いか迷いました。', '先日、私のミスではなかったのですが、担当者としてお客様から「あなたが責任を取るべきだ」と厳しい言葉を浴びせられました。その場では謝罪をしましたが、気持ちが落ち着かず、後から「もっと適切な対応があったのでは」と思うようになりました。こういったクレームに対して、冷静かつ丁寧に対応するコツを教えていただきたいです。', 'images/MY1Jwh0rGsWcnO1cwVNT2c0IjeBZ25-metaODQ4LTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"ke toan\"]', 1, 234, 8, 27, '2023-02-11 23:47:20', '2025-01-01 04:20:16'),
(24, '退職を考えていますが、誰にも言えません', '仕事のプレッシャーが強く、辞めたいと思うようになりましたが、相談相手がいません。', '最近、職場の人間関係や業務量に耐えきれなくなり、「このまま続けるのは無理かも」と思うようになりました。でも、家族に相談すれば心配をかけてしまうし、上司や同僚に言えば迷惑をかける気がして言い出せません。本当に辞めるべきか、それとももう少し頑張るべきか、誰かに相談したいです。同じような経験をした方がいれば、どう乗り越えたか教えてほしいです。', 'images/1A2AEdAaNIbtwvOlwB9sBN21rP9M4u-metaNTQyLTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"leo nui\",\"phu sy\"]', 1, 123, 8, 27, '2023-09-01 23:49:40', '2025-01-01 04:20:52'),
(25, 'チーム内のコミュニケーションがうまくいかない', 'プロジェクトの進行中、チームメンバーとの意思疎通が難しく、悩んでいます。', 'リーダーとしてプロジェクトを進めていますが、メンバーそれぞれの意見がバラバラで、会議でも話がまとまりません。私はなるべく全員の意見を尊重したいのですが、それがかえって進行を遅らせているように感じます。どうすれば効率的に意見をまとめ、全員が納得する形で進められるのでしょうか？良いアプローチがあれば教えてください。', 'images/JVz9zkT5nj5YnMGnRzrBGuDQYLc0g3-metaNDIzLTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"50 nam\",\"phim tai lieu\"]', 1, 543, 8, 27, '2023-07-10 23:59:35', '2025-01-01 04:21:33'),
(29, '報告スキルを向上させるための3つのコツ', '報告する時に、「伝わっていない」と感じたことはありませんか？簡単なコツで改善できます。', '報告がうまくいかないと、上司や同僚との信頼関係に影響を与えかねません。私は以前、何を言えば良いか迷いがちでしたが、次の3つのポイントを意識するだけで大きく変わりました。\n\n* 結論を先に伝える: 例えば「結果として目標を達成しました」と冒頭に述べると、相手がすぐに要点を理解できます。\n* 根拠やデータを具体的に示す: ただ感想を述べるのではなく、数字や事実を含めることで説得力が増します。\n* 簡潔にまとめる: 長すぎる説明は避け、短い言葉で核心を伝えることが大切です。\nこれらを実践することで、信頼される報告者になれるはずです！', 'images/eHCmHyUOpb5MUGB251b0jYUiMncX9c-metaOTQzLTUwMHg1MDAuanBn-.jpg', '[\"ryuichi sakamoto\",\"nhan vat\",\"giai tri\",\"nhac si\",\"ca si\"]', 1, 133, 9, 27, '2023-06-27 00:11:19', '2025-01-01 04:26:35'),
(30, '大事なタスクを効率よく覚える方法', '忙しい毎日の中で、やるべきことを忘れがち…そんな悩みを解決する方法をご紹介します。', '日々の業務が多すぎて、何を優先すべきかわからなくなることはありませんか？私自身も以前は忘れっぽくて困っていましたが、次のテクニックを試してみたところ、劇的に改善しました。\n\n* 朝の5分で「今日のトップ3」を決める: 一日で必ず達成したい3つのタスクをリスト化し、デスクに置きます。\n* 視覚的なリマインダーを活用する: ポストイットやデジタルアプリを使い、目につく場所にタスクを書き出します。\n* 終わったタスクを消す: タスクを消すことで達成感を得られ、次のタスクに集中できます。\nシンプルですが、とても効果的なので、ぜひ試してみてください！\n', 'images/igdCKKSpXmSG8SKoDEb5rXyQPNFr6p-metaNTE1LTUwMHg1MDAuanBn-.jpg', '[\"live action\",\"holly wood\",\"arata mackenyu\",\"giai tri\"]', 1, 1010, 9, 27, '2023-01-08 00:15:08', '2025-01-01 04:27:23'),
(31, 'チーム内コミュニケーションを成功させる5つのステップ', 'プロジェクトを円滑に進めるためには、チーム内のコミュニケーションが鍵です。', 'チームでのコミュニケーションがうまくいかないと、仕事の効率が下がり、ストレスも増えてしまいます。以下の5つのステップを実践すれば、円滑なやりとりが可能になりますよ！\n\n1. 目的を明確にする: 会話の始めに「今回の目的」を簡単に伝えることで、メンバーの意識を合わせます。\n2. 相手の意見を尊重する: 反対意見が出ても感情的にならず、まず受け止めてみましょう。\n3. フィードバックをこまめに行う: 進捗や成果について、感謝や改善点を定期的に共有します。\n4. 役割分担を明確にする: 誰が何を担当するのか明確にすることで、責任感が生まれます。\n5. 振り返りを大切にする: 定期的に「どうすればもっと良くなるか」を全員で話し合います。\n小さなことの積み重ねが、チームの成功につながります！', 'images/J8ooIwLlWGCBvzrP05KT7yxX0cAaPM-metaMTAyNy01MDB4NTAwLmpwZw==-.jpg', '[\"nhan vat\",\"giai tri\",\"50 nam\",\"nhi thang family\"]', 1, 577, 9, 30, '2023-09-02 00:19:29', '2025-01-01 04:28:23'),
(34, '職場で学び合いの環境を作る方法', '職場でお互いに学び合う文化を作ることは、チーム全体の成長に繋がります。私が実践してきた方法を紹介します。', '初めてチームで働く際、最初は自分だけが成長すれば良いと考えていました。しかし、しばらくしてチーム全員の成長が重要だと感じ、学び合いの環境を作ることを意識しました。\n\n* 学び合いの重要性: 私たちの職場では、定期的に知識やスキルを共有する時間を設けています。具体的には、毎週1回、各メンバーが自分の学んだことや実践していることを発表する時間を作りました。\n* 変化を感じた瞬間: 初めてその発表の場で、自分が知らなかったテクニックや改善方法を学んだとき、これが学び合いの力だと実感しました。また、他のメンバーからもフィードバックを受けることで、改善点を自分で見つけることができました。\nこのようにして、チーム全体が互いに学び合い、協力しながら成長しています。学び合いの文化を育てることで、仕事の質や効率も向上しました。', 'images/68UTOzYwfzoYJTbOEFD0gU9BibfvXr-metaMTE3LTUwMHg1MDAuanBn-.jpg', '[\"anime\",\"one piece\",\"netflix\",\"live action\"]', 1, 147, 13, 30, '2023-08-11 00:36:02', '2025-01-01 04:40:33'),
(35, 'フィードバックを学び合うことで得られる成長', 'フィードバックを受け入れ、お互いに教え合うことで、個人だけでなくチーム全体の成長を実感できました。', '私は以前、フィードバックを受けることに抵抗がありました。自分が正しいと思っていたので、他の人からの意見に耳を貸すことが少なかったからです。しかし、職場で学び合いの文化が浸透していく中で、フィードバックの重要性を理解するようになりました。\n\n* 最初の変化: 上司から「フィードバックは成長するために必要だ」と言われたことで、自分の考え方が少し変わりました。フィードバックを受け入れ、改善点を意識して行動に移すことが、実際に自分の成長に繋がったのです。\n* 学んだこと: 他のメンバーからも定期的にフィードバックをもらい、互いにアドバイスし合うことで、自分の視野が広がり、新しいアイデアを得ることができました。\nこれらの経験を通じて、フィードバックは単なる指摘ではなく、成長の糧となる貴重な情報であることを学びました。お互いに学び合い、成長する環境を作ることが、仕事をより良いものにする鍵だと実感しています。', 'images/1aW8bBUeWhKKEQouRThNClizIjRINN-metaOTEwLTUwMHg1MDAuanBn-.jpg', '[\"anime\",\"netflix\"]', 1, 99, 13, 30, '2023-06-24 00:39:50', '2025-01-01 04:41:26'),
(39, '初めてプロジェクト管理を任された経験', 'プロジェクト管理を任されたとき、何を優先すべきか分からず苦労しましたが、多くのことを学びました。', '私は入社3年目にして初めてプロジェクト管理を任されました。最初はやる気に満ち溢れていましたが、実際に取り組み始めると、次々と問題が発生しました。\n\n* 問題の発生: 進捗が遅れるメンバーがいたり、報告のタイミングがズレたりして、全体の計画が乱れてしまいました。\n* 気づいたこと: 一番の課題は、チーム全体の認識を揃えることだと気付きました。私はすぐに、週次での進捗報告と課題共有を導入しました。さらに、メンバーと個別で話す時間も増やしました。\n結果として、プロジェクトは当初の予定より少し遅れましたが、全員の連携がスムーズになり、良い結果を出すことができました。この経験を通じて、リーダーシップとチームワークの重要性を実感しました。', 'images/P8n5Hzcw41K3jl2JyF4IVBEMiITrZ6-metaMzk5LTUwMHg1MDAuanBn-.jpg', '[\"tin 60s\",\"hoc duong\",\"tieng anh\"]', 1, 123, 11, 31, '2023-06-05 01:01:45', '2025-01-01 04:34:18'),
(40, '厳しいクライアントとの交渉から学んだ経験', '仕事で厳しいクライアントに直面し、困難な状況をどう乗り越えたかを共有します。', '新しいクライアントの対応を任された時、私は初めて厳しい要求を突きつけられました。納期は短く、内容の修正も頻繁で、プレッシャーに押しつぶされそうでした。\n\n初めの失敗: 要求に応えようと急ぎ過ぎて、クオリティが低下し、さらにクライアントの不満を招きました。\n転機: 上司から「まずはクライアントの本当のニーズを理解することが大切」とアドバイスを受け、私は話し合いの機会を増やしました。クライアントとの会話を通じて、要求の背景にある真の目的を把握することができました。\nその後、修正案を提案し、納期も現実的な範囲で再設定しました。クライアントは最初は厳しい態度を崩しませんでしたが、最終的に納得してもらい、信頼関係を築くことができました。この経験は、相手を理解する努力の重要性を教えてくれました。\n', 'images/Ssn8knDP9dhZGlKzWuGhH5gOoKfH4j-metaNTcxLTUwMHg1MDAuanBn-.jpg', '[\"hoc duong\",\"dich benh\",\"khau trang\",\"xa hoi\"]', 1, 215, 11, 31, '2023-01-10 01:05:00', '2025-01-01 04:34:58'),
(44, '日本とベトナムの職場文化の違い', '日本で働き始めてから、職場文化の違いに戸惑うことが多々ありました。その経験を共有します。', '私はベトナム出身で、日本に来て働き始めたとき、最も驚いたのは「報連相」の徹底ぶりでした。ベトナムでは、仕事の進捗や問題は必要があれば報告する程度でしたが、日本では細かい進捗や課題をその都度共有することが求められました。\n\n* 慣れるまでの困難: 最初は「わざわざ小さなことを報告しなくてもいいのでは？」と思いましたが、報告不足で上司から注意を受けたことがありました。\n* 学んだこと: 仕事を円滑に進めるためには、相手と認識を一致させることが重要だと気付きました。それ以来、私は意識的にコミュニケーションを増やすようにしています。\nこの文化の違いを理解し、受け入れることで、職場での信頼関係を築くことができました。', 'images/Jm21v4F4EIKwhGqyuwTIlEOGz7eFsq-metaNDY1LTUwMHg1MDAuanBn-.jpg', '[\"hiragana\",\"katakana\",\"kanji\",\"romaji\",\"ngon ngu\",\"bang chu cai\"]', 1, 352, 12, 28, '2023-02-27 06:12:16', '2025-01-01 04:37:26'),
(45, '日本の職場で学んだチームワークの重要性', '個人プレーが重視される環境から、日本のチームワーク重視の文化に適応するのは簡単ではありませんでした。', 'ベトナムでは、成果を重視する職場が多く、個人で仕事を完結させることが一般的です。しかし、日本ではチーム全体の成功が重視されます。最初の頃、私は「自分の仕事さえ終われば良い」と考えていましたが、同僚に「チームのためにもっと意見を出してほしい」と指摘されました。\n\n* 変化のきっかけ: プロジェクトの進行中、メンバー全員が定期的にアイデアを共有し、課題を一緒に解決している姿を見て、私の考え方が変わりました。\n* 実践したこと: 小さな意見でも遠慮せずに発言するよう心掛け、他のメンバーとも積極的に協力しました。\nその結果、私もプロジェクトの一員として認められるようになり、チームの一体感を実感しました。この経験は、どの職場でも活かせる大切な教訓だと思います。', 'images/x1t6oRhwFRdJ9l8mtPNgP9LRc6ulR3-metaNzc5LTUwMHg1MDAuanBn-.jpg', '[\"ngon ngu\",\"tieng nhat\"]', 1, 614, 12, 28, '2023-08-28 06:14:53', '2025-01-01 04:38:20'),
(49, 'コミュニケーションスキルを自己改善で向上させる方法', '自分のコミュニケーションスキルを改善することで、職場での人間関係が劇的に改善されました。自己改善を通じて学んだことを紹介します。', '仕事を始めた頃、私は人と話すことに自信がありませんでした。特に意見を言うのが苦手で、会議でも自分の意見を言うことができず、後になって「あの時もっと発言すればよかった」と後悔することが多かったです。しかし、自己改善の一環として、コミュニケーションスキルを意識的に向上させることに決めました。\n\n* 具体的な改善方法: 私が始めたのは、毎日少しずつ自己反省をすることでした。その日のコミュニケーションでうまくいかなかった点を振り返り、次回に活かすための改善策を考えました。また、積極的に会話に参加し、フィードバックをもらうことも重要だと感じました。\n* 変化を実感した瞬間: 少しずつですが、会話の中で自信を持って意見を述べることができるようになり、上司や同僚との関係がよりスムーズになりました。自己改善を通じて、人間関係が改善されることを実感しました。\nこの経験から、自己改善は一朝一夕で成果が出るものではありませんが、少しずつ積み重ねていくことで確実に成長できることを学びました。', 'images/7rdc5K3w0RGrx2RaOylHCZfGbr65QD-metaMTAwMS01MDB4NTAwLmpwZw==-.jpg', '[\"van hoa\",\"truyen\",\"kinh di\"]', 1, 175, 14, 28, '2023-01-23 07:14:51', '2025-01-01 04:43:40'),
(50, '自己改善のための瞑想で集中力を高め、ストレスを軽減する方法', '仕事のストレスや集中力の低下に悩んでいた私は、自己改善の一環として瞑想を始めました。その結果、仕事の効率や精神的な安定を得ることができました。', '日々の仕事のプレッシャーで、ストレスや疲れが溜まり、集中力が続かないことが多くなっていました。そんな中、自己改善のために瞑想を始めることにしました。最初は、瞑想が本当に効果があるのか半信半疑でしたが、試してみることにしました。\n\n* 瞑想の実践方法: 毎朝5分間の深呼吸をしながら、目を閉じて心を落ち着けることから始めました。初めのうちは思考が途切れがちでしたが、徐々に心が静まり、仕事に取り組む前にリセットできるようになりました。\n* 効果を実感: 瞑想を続けるうちに、仕事中の集中力が増し、ストレスを感じにくくなったことを実感しました。また、冷静に物事を判断できるようになり、以前よりも効率的に仕事をこなせるようになりました。\n瞑想を通じて、心のバランスを取ることが自己改善にどれほど重要かを学びました。これからも続けていき、さらに自分を高めていきたいと思っています。\n', 'images/MQOKi3Z8A4YitWttKrIW5H0uoGYOYI-metaMTAxNS01MDB4NTAwLmpwZw==-.jpg', '[\"truyen\",\"kinh di\"]', 1, 124, 14, 28, '2023-07-20 07:17:40', '2025-01-01 04:44:29'),
(55, 'Thưởng thức Miso Ramen ở khu phố Nhật giữa lòng Sài Gòn', 'Nếu đã quá quen với Tonkotsu Ramen và muốn đổi sang vị Miso, hãy \"bỏ túi\" ngay chiếc quán Nhật nhỏ xinh sau đây nhé!', '<p>Nhắc đến ẩm thực Nhật Bản, bên cạnh món Sushi quốc dân, người ta thường nghĩ ngay đến Ramen – món mì không phải sinh ra từ nước Nhật nhưng lại trở thành một trong những biểu tượng của ẩm thực xứ Phù Tang.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;miso-ramen.png&quot;,&quot;filesize&quot;:849208,&quot;height&quot;:533,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/7TuJnsPsQJJ3zd7Tm9Q6WwIBo0tTG5cHHoRtC7zo.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/7TuJnsPsQJJ3zd7Tm9Q6WwIBo0tTG5cHHoRtC7zo.png&quot;,&quot;width&quot;:800}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/7TuJnsPsQJJ3zd7Tm9Q6WwIBo0tTG5cHHoRtC7zo.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/7TuJnsPsQJJ3zd7Tm9Q6WwIBo0tTG5cHHoRtC7zo.png\" width=\"800\" height=\"533\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">miso-ramen.png</span> <span class=\"attachment__size\">829.3 KB</span></figcaption></a></figure></p><p><br></p><p>Vượt ra khỏi biên giới nước Nhật, mì Ramen nổi tiếng và được yêu thích rộng rãi ở nhiều quốc gia, các quán mì Ramen cũng mọc lên khắp nơi trên thế giới.&nbsp;</p><p>Mì Ramen cũng là món ăn khoái khẩu của nhiều tín đồ ẩm thực Việt Nam, tại các cửa hàng, Tonkotsu Ramen là loại thường thấy nhất. Bên cạnh đó còn có nhiều loại Ramen chất lượng khác như Shoyu (nước tương), Shio (muối) và Miso.&nbsp;</p><p>Lần này hãy cùng theo chân Kilala khám phá một nhà hàng chuyên về mì Miso Ramen nhé!</p><h2>Miso Ramen là gì?</h2><p>Miso Ramen có nguồn gốc từ vùng Hokkaido lạnh giá phía Bắc Nhật Bản. Đúng như tên gọi, loại Ramen này có nước dùng được nấu từ tương Miso cùng với thịt gà, rau và thịt lợn xay tạo nên hương vị ngọt umami đặc trưng.</p><h2>Miso Chikura – quán chuyên Miso Ramen ở khu phố Nhật&nbsp;</h2><h3>Không gian</h3><p>Quán Ramen mà lần này chúng mình ghé thăm có tên “Miso Chikura” – chiếc quán mang đậm phong cách Nhật tọa lạc trong một con hẻm thuộc khu phố Nhật sầm uất trên đường Lê Thánh Tôn, Quận 1, Thành phố Hồ Chí Minh.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;quan-miso-chikura.png&quot;,&quot;filesize&quot;:554550,&quot;height&quot;:667,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/B1nrcsBeQFfwvHdGqpf3udrc4BQr5n4Lh6JTIDjq.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/B1nrcsBeQFfwvHdGqpf3udrc4BQr5n4Lh6JTIDjq.png&quot;,&quot;width&quot;:500}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/B1nrcsBeQFfwvHdGqpf3udrc4BQr5n4Lh6JTIDjq.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/B1nrcsBeQFfwvHdGqpf3udrc4BQr5n4Lh6JTIDjq.png\" width=\"500\" height=\"667\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">quan-miso-chikura.png</span> <span class=\"attachment__size\">541.55 KB</span></figcaption></a></figure></p><p><br></p><p>Ấn tượng đầu tiên khi đẩy cửa bước vào chính là gian bếp mở - đặc trưng của các hàng quán kiểu Nhật, bạn có thể lựa chọn ngồi tại quầy để tận mắt quan sát quá trình bác đầu bếp người Nhật thân thiện chế biến món ăn.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;quay-bep-mo.png&quot;,&quot;filesize&quot;:766797,&quot;height&quot;:533,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/FgWFGbZ1SK1Z6XFZRrFQldL1rcGWG3BXJT5CWTfn.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/FgWFGbZ1SK1Z6XFZRrFQldL1rcGWG3BXJT5CWTfn.png&quot;,&quot;width&quot;:800}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/FgWFGbZ1SK1Z6XFZRrFQldL1rcGWG3BXJT5CWTfn.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/FgWFGbZ1SK1Z6XFZRrFQldL1rcGWG3BXJT5CWTfn.png\" width=\"800\" height=\"533\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">quay-bep-mo.png</span> <span class=\"attachment__size\">748.83 KB</span></figcaption></a></figure></p><p>Quán gồm có 2 tầng, được bài trí đơn giản trong không gian không quá rộng. Lúc team Kilala đến quán là khoảng 11h15 buổi trưa ngày làm việc trong tuần, lúc này quán chưa đông lắm nên món lên khá nhanh. Đến tầm 12h khi chúng mình rời quán thì đã vô cùng đông khách, thậm chí là cả hàng dài người xếp hàng chờ bên ngoài, đặc biệt là có rất nhiều vị khách nước ngoài.&nbsp;</p><h3>Món ăn</h3><p>Menu của quán tương đối phong phú, bên cạnh mì Ramen là món chủ lực thì còn có các món cơm, bánh xếp Gyoza, các loại topping ăn kèm khác, cùng đa dạng thức uống từ bia, rượu Sochu đến các loại nước giải khát khác.</p><p>Giá cả dao động từ 150.000 – 230.000 đồng đối với mì Miso Ramen, tùy thuộc vào loại mì và kích cỡ món.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;menu-quan.png&quot;,&quot;filesize&quot;:632497,&quot;height&quot;:533,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/gWgumrMhWYgeOhO2eKRl8QeT32R38i9MbOcOWz84.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/gWgumrMhWYgeOhO2eKRl8QeT32R38i9MbOcOWz84.png&quot;,&quot;width&quot;:800}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/gWgumrMhWYgeOhO2eKRl8QeT32R38i9MbOcOWz84.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/gWgumrMhWYgeOhO2eKRl8QeT32R38i9MbOcOWz84.png\" width=\"800\" height=\"533\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">menu-quan.png</span> <span class=\"attachment__size\">617.67 KB</span></figcaption></a></figure></p><p>Với tinh thần trải nghiệm mì Miso Ramen ngay từ đầu, chúng mình đã gọi 3 vị Miso khác nhau: Karanegi Miso, Chashiu Miso và Kokuuma Miso. Mặc dù chỉ order size S nhưng lượng mì khá nhiều, vì vậy nếu bạn không thể ăn hết, ngay từ đầu hãy lưu ý với nhân viên để có thể giảm lượng mì. Bạn cũng có thể yêu cầu điều chỉnh độ mặn khi gọi món.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;chashiu-kokuuma.png&quot;,&quot;filesize&quot;:761112,&quot;height&quot;:418,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/fmuIrrvalPDuORZNLnlwRP4ya6Q9M9P7IkJ5tru2.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/fmuIrrvalPDuORZNLnlwRP4ya6Q9M9P7IkJ5tru2.png&quot;,&quot;width&quot;:800}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/fmuIrrvalPDuORZNLnlwRP4ya6Q9M9P7IkJ5tru2.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/fmuIrrvalPDuORZNLnlwRP4ya6Q9M9P7IkJ5tru2.png\" width=\"800\" height=\"418\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">chashiu-kokuuma.png</span> <span class=\"attachment__size\">743.27 KB</span></figcaption></a></figure></p><p>Về hình thức, không có quá nhiều khác biệt giữa 3 tô mì, mỗi loại đều có topping đi kèm là thịt heo Chashu (thịt xá xíu kiểu Nhật), măng và hành xanh, riêng Karanegi có màu nước dùng ngả cam hơn một chút.</p><p>Về hương vị, Kokuuma Miso có hương vị truyền thống, ngọt thanh, không quá béo; Karanegi Miso có chút cay nhẹ và cuối cùng là Chashiu Miso với nước dùng béo ngậy và đậm đặc nhất.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;karanegi-miso.png&quot;,&quot;filesize&quot;:1042853,&quot;height&quot;:533,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/ZEeWMow3mk0xYxzuF9xIlen6IbWdYz1LePk8ut9Q.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/ZEeWMow3mk0xYxzuF9xIlen6IbWdYz1LePk8ut9Q.png&quot;,&quot;width&quot;:800}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/ZEeWMow3mk0xYxzuF9xIlen6IbWdYz1LePk8ut9Q.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/ZEeWMow3mk0xYxzuF9xIlen6IbWdYz1LePk8ut9Q.png\" width=\"800\" height=\"533\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">karanegi-miso.png</span> <span class=\"attachment__size\">1018.41 KB</span></figcaption></a></figure></p><p>Theo cảm nhận cá nhân, Kokuuma Miso có lẽ là hương vị dễ ăn và vừa miệng nhất, Karanegi pha chút cay khá cuốn lưỡi và kích thích vị giác, còn Chashiu vì khá béo và đậm đặc nên mang lại cảm giác dễ ngấy, nhưng sẽ là lựa chọn tuyệt vời cho team ưa vị béo và \"mê thịt\" vì topping có đến 3 miếng Chashu dày dặn.&nbsp;</p><h3>Câu chuyện về bác đầu bếp người Nhật&nbsp;</h3><p>Trên một bức tranh treo trên tường, chúng mình đã đọc được câu chuyện về duyên cớ mà quán Ramen này ra đời. Trước đây, khi còn sinh sống ở Nhật Bản, bác đầu bếp Kiyomi Kobuta từng điều hành một nhà hàng chuyên về Miso Ramen trong 26 năm. <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;cau-chuyen-cua-dau-bep-nhat.png&quot;,&quot;filesize&quot;:536956,&quot;height&quot;:667,&quot;href&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/yZ7ELkspz4KbRIor32UWBj60afM1nYmfpliEP0xe.png&quot;,&quot;url&quot;:&quot;http://localhost:8080/Javzine/public/storage/imagesPost/yZ7ELkspz4KbRIor32UWBj60afM1nYmfpliEP0xe.png&quot;,&quot;width&quot;:500}\" data-trix-content-type=\"image/png\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--png\"><a href=\"http://localhost:8080/Javzine/public/storage/imagesPost/yZ7ELkspz4KbRIor32UWBj60afM1nYmfpliEP0xe.png\"><img src=\"http://localhost:8080/Javzine/public/storage/imagesPost/yZ7ELkspz4KbRIor32UWBj60afM1nYmfpliEP0xe.png\" width=\"500\" height=\"667\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">cau-chuyen-cua-dau-bep-nhat.png</span> <span class=\"attachment__size\">524.37 KB</span></figcaption></a></figure></p><p>Sau khi ông nghỉ hưu, một số khách quen vẫn thường yêu cầu ông làm cho họ món mì Miso Ramen của cửa tiệm trước đây. Cảm nhận được sự hạnh phúc của những thực khách yêu quý khi được nếm lại hương vị mì yêu thích, ý định mở một cửa hàng của riêng mình dần nảy nở.&nbsp;</p><p>Cuối cùng, ông đã chọn Thành phố Hồ Chí Minh là nơi khởi đầu việc kinh doanh đó với mong muốn ngày càng có nhiều người biết đến mì Ramen do ông chế biến. &nbsp;</p><h2>Kết</h2><p>Miso Chikura sẽ là một điểm đến lý tưởng dành cho những tín đồ nghiện mì Ramen chuẩn vị Nhật, đặc biệt là loại Miso Ramen, đồng thời muốn tìm kiếm một không gian đậm chất Nhật Bản.&nbsp;</p><p>Tuy nhiên, điểm trừ của quán là không gian nhỏ, lại có gian bếp mở nên khi đi vào buổi trưa sẽ khá đông đúc và hơi nóng. Vì lượng khách ra vào liên tục, bạn chỉ nên dùng bữa nhanh chóng để nhường lại bàn cho người khác. Do đó sẽ không thích hợp nếu bạn đang muốn tìm một không gian thư thả để tận hưởng bữa ăn.</p><ul><li>Địa chỉ: 8/5 Lê Thánh Tôn, phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh</li><li>Thời gian mở cửa: 11h - 14h30, 17h - 21h</li></ul><p><br><br></p>', 'images/BVGdPVihSuO0Yn6jDkJ9xYcd8HX6FT-metaMTA0MC01MDB4NTAwLmpwZw==-.jpg', '[\"review\",\"ramen\",\"miso\"]', 1, 587, 13, 28, '2023-09-12 08:37:51', '2025-01-01 05:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `view_date` date DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`id`, `post_id`, `view_date`, `views`, `created_at`, `updated_at`) VALUES
(25, 61, '2023-09-16', 1, '2023-09-15 23:54:35', '2023-09-15 23:54:35'),
(26, 62, '2023-09-16', 6, '2023-09-16 00:31:31', '2023-09-16 05:41:53'),
(27, 7, '2023-09-16', 1, '2023-09-16 00:45:40', '2023-09-16 00:45:40'),
(28, 13, '2023-09-16', 1, '2023-09-16 04:07:13', '2023-09-16 04:07:13'),
(29, 14, '2023-09-16', 1, '2023-09-16 04:07:34', '2023-09-16 04:07:34'),
(30, 29, '2023-09-16', 1, '2023-09-16 04:08:10', '2023-09-16 04:08:10'),
(31, 49, '2023-09-16', 1, '2023-09-16 04:08:29', '2023-09-16 04:08:29'),
(32, 34, '2023-09-16', 1, '2023-09-16 04:08:52', '2023-09-16 04:08:52'),
(33, 56, '2023-09-16', 1, '2023-09-16 04:09:39', '2023-09-16 04:09:39'),
(34, 41, '2023-09-16', 1, '2023-09-16 04:10:08', '2023-09-16 04:10:08'),
(35, 60, '2023-09-16', 1, '2023-09-16 04:22:46', '2023-09-16 04:22:46'),
(36, 40, '2023-09-16', 1, '2023-09-16 04:23:08', '2023-09-16 04:23:08'),
(37, 62, '2023-09-17', 4, '2023-09-16 22:33:06', '2023-09-17 07:00:37'),
(38, 30, '2023-09-17', 1, '2023-09-16 23:02:55', '2023-09-16 23:02:55'),
(39, 59, '2023-09-17', 1, '2023-09-16 23:16:43', '2023-09-16 23:16:43'),
(40, 39, '2023-09-17', 2, '2023-09-16 23:16:51', '2023-09-16 23:21:43'),
(41, 42, '2023-09-17', 1, '2023-09-16 23:17:04', '2023-09-16 23:17:04'),
(42, 47, '2023-09-17', 1, '2023-09-16 23:22:18', '2023-09-16 23:22:18'),
(43, 49, '2023-09-17', 1, '2023-09-16 23:22:48', '2023-09-16 23:22:48'),
(44, 58, '2023-09-17', 2, '2023-09-17 06:58:05', '2023-09-17 06:59:28'),
(45, 61, '2023-09-17', 5, '2023-09-17 07:00:04', '2023-09-17 07:02:26'),
(46, 60, '2023-09-17', 2, '2023-09-17 07:56:45', '2023-09-17 07:57:54'),
(47, 62, '2023-09-18', 3, '2023-09-18 03:52:09', '2023-09-18 03:52:52'),
(48, 61, '2023-09-26', 1, '2023-09-26 07:40:41', '2023-09-26 07:40:41'),
(49, 52, '2023-09-26', 1, '2023-09-26 07:41:11', '2023-09-26 07:41:11'),
(50, 5, '2023-09-28', 1, '2023-09-28 02:23:44', '2023-09-28 02:23:44'),
(51, 62, '2023-09-28', 12, '2023-09-28 02:24:36', '2023-09-28 03:00:41'),
(52, 61, '2023-09-28', 4, '2023-09-28 02:36:32', '2023-09-28 02:38:25'),
(53, 60, '2023-09-28', 8, '2023-09-28 02:58:43', '2023-09-28 03:00:35'),
(54, 62, '2023-09-30', 1, '2023-09-30 09:00:44', '2023-09-30 09:00:44'),
(55, 60, '2023-09-30', 1, '2023-09-30 09:01:08', '2023-09-30 09:01:08'),
(56, 62, '2023-10-09', 1, '2023-10-09 05:36:28', '2023-10-09 05:36:28'),
(57, 61, '2023-10-09', 1, '2023-10-09 07:13:24', '2023-10-09 07:13:24'),
(58, 34, '2023-10-09', 3, '2023-10-09 07:14:29', '2023-10-09 07:14:52'),
(59, 37, '2023-10-09', 1, '2023-10-09 07:14:47', '2023-10-09 07:14:47'),
(60, 39, '2023-10-09', 1, '2023-10-09 08:33:59', '2023-10-09 08:33:59'),
(61, 56, '2023-10-09', 1, '2023-10-09 08:34:04', '2023-10-09 08:34:04'),
(62, 41, '2023-10-23', 1, '2023-10-23 05:41:37', '2023-10-23 05:41:37'),
(63, 59, '2023-10-23', 1, '2023-10-23 05:43:49', '2023-10-23 05:43:49'),
(64, 62, '2023-10-24', 1, '2023-10-23 22:55:45', '2023-10-23 22:55:45'),
(65, 61, '2023-10-24', 1, '2023-10-23 22:56:54', '2023-10-23 22:56:54'),
(66, 41, '2023-10-24', 2, '2023-10-23 22:59:02', '2023-10-23 23:01:04'),
(67, 30, '2023-10-24', 1, '2023-10-24 00:23:16', '2023-10-24 00:23:16'),
(68, 8, '2023-11-07', 1, '2023-11-06 21:09:31', '2023-11-06 21:09:31'),
(69, 42, '2023-11-07', 1, '2023-11-06 21:10:42', '2023-11-06 21:10:42'),
(70, 62, '2024-03-03', 1, '2024-03-03 07:55:33', '2024-03-03 07:55:33'),
(71, 62, '2024-03-12', 1, '2024-03-12 07:00:45', '2024-03-12 07:00:45'),
(72, 6, '2024-03-12', 1, '2024-03-12 07:01:20', '2024-03-12 07:01:20'),
(73, 41, '2024-03-12', 1, '2024-03-12 07:12:55', '2024-03-12 07:12:55'),
(74, 30, '2024-03-12', 1, '2024-03-12 07:14:04', '2024-03-12 07:14:04'),
(75, 62, '2024-03-18', 1, '2024-03-18 07:26:36', '2024-03-18 07:26:36'),
(76, 57, '2024-03-18', 1, '2024-03-18 07:26:45', '2024-03-18 07:26:45'),
(77, 21, '2024-03-18', 1, '2024-03-18 07:26:51', '2024-03-18 07:26:51'),
(78, 41, '2024-03-18', 4, '2024-03-18 07:27:01', '2024-03-18 07:27:50'),
(79, 62, '2024-05-03', 1, '2024-05-03 01:22:20', '2024-05-03 01:22:20'),
(80, 59, '2024-05-03', 1, '2024-05-03 01:22:38', '2024-05-03 01:22:38'),
(81, 30, '2024-05-14', 1, '2024-05-13 23:42:14', '2024-05-13 23:42:14'),
(82, 60, '2024-05-14', 1, '2024-05-13 23:42:26', '2024-05-13 23:42:26'),
(83, 62, '2024-05-14', 1, '2024-05-14 09:20:39', '2024-05-14 09:20:39'),
(84, 7, '2024-05-14', 1, '2024-05-14 09:20:47', '2024-05-14 09:20:47'),
(85, 62, '2024-10-24', 3, '2024-10-24 01:09:08', '2024-10-24 02:42:57'),
(86, 50, '2024-10-24', 1, '2024-10-24 01:21:07', '2024-10-24 01:21:07'),
(87, 42, '2024-10-24', 2, '2024-10-24 01:21:24', '2024-10-24 01:33:18'),
(88, 39, '2024-10-24', 1, '2024-10-24 01:30:11', '2024-10-24 01:30:11'),
(89, 15, '2024-10-24', 2, '2024-10-24 01:37:30', '2024-10-24 01:37:36'),
(90, 60, '2024-10-24', 1, '2024-10-24 02:39:19', '2024-10-24 02:39:19'),
(91, 59, '2024-11-25', 2, '2024-11-25 09:57:52', '2024-11-25 09:58:00'),
(92, 60, '2024-11-25', 1, '2024-11-25 09:58:11', '2024-11-25 09:58:11'),
(93, 32, '2024-11-25', 1, '2024-11-25 09:58:18', '2024-11-25 09:58:18'),
(94, 64, '2024-11-28', 3, '2024-11-28 00:43:07', '2024-11-28 00:44:03'),
(95, 62, '2024-11-28', 1, '2024-11-28 00:43:30', '2024-11-28 00:43:30'),
(96, 55, '2024-11-28', 1, '2024-11-28 02:03:58', '2024-11-28 02:03:58'),
(97, 38, '2024-11-28', 1, '2024-11-28 02:55:00', '2024-11-28 02:55:00'),
(98, 47, '2024-12-03', 1, '2024-12-03 06:58:44', '2024-12-03 06:58:44'),
(99, 62, '2024-12-05', 1, '2024-12-05 00:36:20', '2024-12-05 00:36:20'),
(100, 62, '2024-12-12', 1, '2024-12-11 20:57:40', '2024-12-11 20:57:40'),
(101, 54, '2024-12-12', 2, '2024-12-12 00:14:06', '2024-12-12 00:14:17'),
(102, 20, '2024-12-12', 1, '2024-12-12 00:44:10', '2024-12-12 00:44:10'),
(103, 60, '2024-12-12', 2, '2024-12-12 00:44:23', '2024-12-12 00:45:50'),
(104, 42, '2024-12-12', 1, '2024-12-12 00:46:20', '2024-12-12 00:46:20'),
(105, 55, '2024-12-12', 1, '2024-12-12 00:47:35', '2024-12-12 00:47:35'),
(106, 59, '2024-12-12', 1, '2024-12-12 00:47:51', '2024-12-12 00:47:51'),
(107, 68, '2024-12-12', 1, '2024-12-12 00:56:15', '2024-12-12 00:56:15'),
(108, 62, '2024-12-16', 1, '2024-12-16 08:42:43', '2024-12-16 08:42:43'),
(109, 58, '2024-12-17', 1, '2024-12-16 19:11:26', '2024-12-16 19:11:26'),
(110, 30, '2024-12-17', 1, '2024-12-16 19:12:22', '2024-12-16 19:12:22'),
(111, 62, '2024-12-17', 1, '2024-12-16 19:14:21', '2024-12-16 19:14:21'),
(112, 58, '2024-12-18', 1, '2024-12-17 20:27:38', '2024-12-17 20:27:38'),
(113, 62, '2024-12-18', 7, '2024-12-17 20:27:46', '2024-12-17 20:45:11'),
(114, 41, '2024-12-20', 3, '2024-12-19 17:33:04', '2024-12-19 17:35:39'),
(115, 69, '2024-12-20', 123, '2024-12-19 17:49:54', '2024-12-19 19:58:21'),
(116, 39, '2024-12-20', 1, '2024-12-19 19:46:23', '2024-12-19 19:46:23'),
(117, 62, '2024-12-20', 1, '2024-12-19 19:57:30', '2024-12-19 19:57:30'),
(118, 30, '2024-12-25', 1, '2024-12-24 19:24:50', '2024-12-24 19:24:50'),
(119, 69, '2024-12-25', 236, '2024-12-24 19:26:25', '2024-12-25 10:52:53'),
(120, 43, '2024-12-25', 1, '2024-12-24 20:00:15', '2024-12-24 20:00:15'),
(121, 68, '2024-12-25', 2, '2024-12-24 20:01:43', '2024-12-24 21:24:40'),
(122, 62, '2024-12-25', 24, '2024-12-24 21:07:43', '2024-12-25 11:01:10'),
(123, 30, '2024-12-26', 1, '2024-12-26 00:02:02', '2024-12-26 00:02:02'),
(124, 69, '2024-12-26', 21, '2024-12-26 00:04:08', '2024-12-26 00:37:20'),
(125, 68, '2024-12-26', 8, '2024-12-26 00:17:05', '2024-12-26 00:27:57'),
(126, 70, '2024-12-26', 3, '2024-12-26 00:39:50', '2024-12-26 01:58:12'),
(127, 39, '2024-12-26', 1, '2024-12-26 00:46:54', '2024-12-26 00:46:54'),
(128, 30, '2024-12-29', 1, '2024-12-29 08:46:56', '2024-12-29 08:46:56'),
(129, 47, '2024-12-29', 2, '2024-12-29 08:47:00', '2024-12-29 09:17:22'),
(130, 71, '2024-12-29', 10, '2024-12-29 10:47:35', '2024-12-29 11:12:33'),
(131, 5, '2024-12-29', 1, '2024-12-29 11:03:09', '2024-12-29 11:03:09'),
(132, 71, '2024-12-30', 1, '2024-12-30 02:20:48', '2024-12-30 02:20:48'),
(133, 71, '2024-12-31', 5, '2024-12-30 17:56:25', '2024-12-31 11:19:23'),
(134, 30, '2024-12-31', 1, '2024-12-31 11:12:28', '2024-12-31 11:12:28'),
(135, 55, '2024-12-31', 2, '2024-12-31 11:16:19', '2024-12-31 11:16:25'),
(136, 57, '2025-01-01', 1, '2024-12-31 22:52:54', '2024-12-31 22:52:54'),
(137, 56, '2025-01-01', 1, '2024-12-31 22:55:00', '2024-12-31 22:55:00'),
(138, 72, '2025-01-01', 3, '2024-12-31 23:34:47', '2025-01-01 00:38:45'),
(139, 73, '2025-01-01', 2, '2025-01-01 01:02:54', '2025-01-01 01:09:06'),
(140, 16, '2025-01-01', 1, '2025-01-01 04:01:30', '2025-01-01 04:01:30'),
(141, 22, '2025-01-01', 1, '2025-01-01 04:23:59', '2025-01-01 04:23:59'),
(142, 20, '2025-01-01', 8, '2025-01-01 04:44:52', '2025-01-01 04:59:17'),
(143, 55, '2025-01-01', 1, '2025-01-01 05:00:29', '2025-01-01 05:00:29'),
(144, 7, '2025-01-01', 1, '2025-01-01 05:49:57', '2025-01-01 05:49:57'),
(145, 8, '2025-01-01', 1, '2025-01-01 06:14:21', '2025-01-01 06:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(1000) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(1000) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Tran Binh Minh', 'minhbeo@gmail.com', NULL, '$2y$10$mrh93p1yzaq2EyjROTkocu8v0SnABNgh/uWw7iYJof4KQHneYy5zG', 0, 'images/XOIrVGgKMSLtjITgAmHnqoCA6h9JgLCwvmP99UpW.jpg', '8hNP2xYmMNU3InNV6WcOeOfpksQWx0NcJN2PmT3XzhzspySZgqbKuK6m5xBI', '2023-09-08 00:40:43', '2023-09-16 01:20:25'),
(4, NULL, 'Lai Quan Huy', 'quando@gmail.com', NULL, '$2y$10$cADn9fmF2kqY2O/Aj9IL7ulD70T4qOaX7jwrRsJJ557wcJLeBmz2S', 0, NULL, NULL, '2023-09-08 00:44:12', '2023-09-09 07:16:38'),
(6, NULL, 'Doan Duc Toan', 'thuymaitoaffnki@gmail.com', NULL, '$2y$10$IQI2VWZpr5wzQQ4MkgIXDen9I2RhCCH6TZX3NWaVWWz4sNsKwXPme', 0, NULL, NULL, '2023-09-09 23:39:40', '2023-09-09 23:39:40'),
(7, NULL, 'Quan Ngu Si', 'quanngusi@gmail.com', NULL, '$2y$10$IGXGL3G5X.6a7yS7kO8Ge.Xi9GcVJQzhTP8.f3SRQ1d.KdH5Z7kU.', 0, NULL, NULL, '2023-09-10 06:36:37', '2023-09-10 06:36:37'),
(8, NULL, 'fefw', 'fwfe@gmail.com', NULL, '$2y$10$47Owo4wQ8EmtDQROilM/oOnUGj9Msga6uagdz1WpvGsmUzlrzRQ4K', 0, NULL, NULL, '2023-09-10 06:38:33', '2023-09-10 06:38:33'),
(9, NULL, 'fwefwef', 'fweft@gmail.com', NULL, '$2y$10$vHb8W4xTmdMskQw0txHG3eRMKLwKov6Fnhw7ACOiFUhs0iuZI9ahu', 0, NULL, NULL, '2023-09-10 06:39:07', '2023-09-10 06:39:07'),
(10, NULL, 'fwefwef', 'fweftddd@gmail.com', NULL, '$2y$10$4LuUOftgBmhfYQY500nFPOECjMmfBnFk2OOoKLY7LrHjzHry7D94C', 0, NULL, NULL, '2023-09-10 06:39:38', '2023-09-10 06:39:38'),
(11, NULL, 'dddd', 'ddd@gmail.com', NULL, '$2y$10$Oc/b6uFkXI9bq.bThLToN.EhD87CeT.JzHpnDSitWdjowlwuKsfkm', 0, NULL, NULL, '2023-09-10 06:40:01', '2023-09-10 06:40:01'),
(12, NULL, 'fwefwf', 'fwefwf@gmail.com', NULL, '$2y$10$YRcddB/yFy1kJq7wGgvzqeT5MXH.DEMTWVoQ10FT6IpyxQh9e6QHO', 0, NULL, NULL, '2023-09-10 06:40:43', '2023-09-10 06:40:43'),
(13, NULL, 'ergerg', 'vervui@gmail.com', NULL, '$2y$10$a/ncHY/WSIdg5Ou/j.ZocuIGNO6d4ISSKo9h43LNoVNoe8A3NgJ7y', 0, NULL, NULL, '2023-09-10 06:41:03', '2023-09-10 06:41:03'),
(14, NULL, 'vevr', 'verh@gmail.com', NULL, '$2y$10$JvOMABwelA038xUdCIJFVe/f.ng6aassy5lDmkOhimhVgndL65a5i', 0, NULL, NULL, '2023-09-10 06:41:32', '2023-09-10 06:41:32'),
(15, NULL, '34gerg', 'greg@gmail.com', NULL, '$2y$10$DYWA/ntlhAr.ryZyRr45cukn0NpQc9LYN.5Q.kmjQTA6G7fnjNL6C', 0, NULL, NULL, '2023-09-10 06:47:22', '2023-09-10 06:47:22'),
(16, NULL, 'fwefew', 'geruig@gmail.com', NULL, '$2y$10$WViiBrYBqNS4NHVcf0sD5.ahBnvMP1MgEKdnbVib1xzN08jYTvQxy', 0, NULL, NULL, '2023-09-10 07:22:07', '2023-09-10 07:22:07'),
(18, NULL, 'Quan Huy Lai', 'quanoccho@gmail.com', NULL, '$2y$10$nZBxzFEotN2eVRZeLM0b.OpZU6pD7lTqA0FCRxX6iSvFovToJ1LuS', 0, NULL, NULL, '2023-09-10 08:07:51', '2023-09-10 08:07:51'),
(26, '102853996515749294093', 'Đoàn Duy Kỳ 7A1', 'toandtq123@gmail.com', NULL, NULL, 0, NULL, NULL, '2023-09-10 22:55:49', '2023-09-10 22:55:49'),
(27, '107887162759792055357', 'Duy Đoàn', 'thuymaitoanki@gmail.com', NULL, NULL, 0, NULL, NULL, '2023-09-10 23:09:04', '2023-09-10 23:09:04'),
(28, '105860543103964867979', 'Toàn Đoàn Đức', 'toanymanh@gmail.com', NULL, '$2y$10$bb33UTDzaliBUW7TAmWzIuXmEgjSvHCv/42iD57Tws/TPqLqKftmi', 1, 'images/X5NHsvOfEiRbXrc9rjg1zbJwCnzyqnuKRe3VHzhB.jpg', 'VIOZgYupgc7SsMMCCReANh4GjSA2GbP24ToSYSw8roDsKE39891qolQ4pcmW', '2023-09-10 23:10:15', '2024-12-16 19:14:07'),
(29, NULL, 'Doan Duc Toan', 'toanymanh111@gmail.com', NULL, '$2y$10$Xm0o87NoEbrl.f4dusEIfOaFea62Xxzy1YxE1BpZlJ5WsqI0b09s6', 0, NULL, NULL, '2023-09-11 05:44:21', '2023-09-11 05:44:21'),
(30, NULL, 'Pham Minh Anh', 'manhcute@gmail.com', NULL, '$2y$10$9W8wJWHp3YqyxdFYTZJUIOu3obVRhy9nIRWtyjUgHFw3QyE1oESTS', 0, NULL, NULL, '2023-09-12 00:16:17', '2023-09-12 00:16:17'),
(31, NULL, 'Phạm Thị Trang', 'trang@gmail.com', NULL, '$2y$10$9ZiwsMGezwe2fMtYhQ1n9uhnsvCU6UJy2mWRnLFa0vekWcPAGWBk2', 0, NULL, NULL, '2023-09-12 00:58:22', '2023-09-12 00:58:22'),
(32, NULL, 'Vũ Thế An', 'an@gmail.com', NULL, '$2y$10$lKGSAe6JbplEZYpiY9FvQeIoqSHGZCUhyJu29s63FdnpSzmPc4x5S', 0, NULL, NULL, '2023-09-12 01:14:43', '2023-09-12 01:14:43'),
(33, NULL, 'Nguyễn Thị Kim Nguyên', 'nguyen@gmail.com', NULL, '$2y$10$dOsPJzRzMEFPzK3TcBRoc.0esUwcwT6/1gBjluP8j8GMmj9QMcNRq', 0, NULL, NULL, '2023-09-13 03:48:45', '2023-09-13 03:48:45'),
(34, NULL, 'Doan Duc Toan', 'toandtq@gmail.com', NULL, '$2y$10$9vO5ETsmPK.ieFfaYMxwdu50LeuemvxUsvvrxSciLpaBKi3bT7K9S', 0, NULL, NULL, '2023-10-23 22:58:52', '2023-10-23 22:58:52'),
(35, NULL, 'Doan Duc Toan', 'abcd@gmail.com', NULL, '$2y$10$./hcNj6bhrWfkeYYdHToseUMKfpUjD4J.Psqn.vdq0MY8GzFOxeza', 0, NULL, NULL, '2024-10-24 01:46:10', '2024-10-24 01:46:10'),
(36, NULL, 'Wayne Koch', 'kinuheku@mailinator.com', NULL, '$2y$10$KnXxbeJp/Nz.2yJt/eVln.1vwmuEWHMV768RoIYmrl79/AIJsaFJq', 0, NULL, NULL, '2024-11-28 00:37:59', '2024-11-28 00:37:59'),
(37, NULL, 'Debra Ellis', 'kusoqoweg@mailinator.com', NULL, '$2y$10$zqZ7eTOv.9ZF4sOmCZzFc.guGYyWLOkLRTlWuILgw5fAjAezDxr3u', 0, NULL, NULL, '2024-11-28 00:38:17', '2024-11-28 00:38:17'),
(38, NULL, 'Vielka Rogers', 'winudycyvo@mailinator.com', NULL, '$2y$10$.Ce3BhYVIqIo4b.RsfXrY.pEaePBKeldXBh9m6pOq7Coju5VaSn/W', 0, NULL, NULL, '2024-11-28 00:38:40', '2024-11-28 00:38:40'),
(39, NULL, 'Xena Barrett', 'dosujabixe@mailinator.com', NULL, '$2y$10$dWRMuzzZpGOHbcouldpXaOacq70XZ8/tmwanNBHypB9k/lRZ7Leie', 0, NULL, NULL, '2024-11-28 00:57:47', '2024-11-28 00:57:47'),
(40, '106945033397561599722', 'D ABC', 'kid12345678910jq@gmail.com', NULL, NULL, 0, NULL, NULL, '2024-11-28 02:00:26', '2024-11-28 02:00:26'),
(41, NULL, 'Naida Rutledge', 'y.sato@knowledge-cs.com', NULL, '$2y$10$ifgkrNU1dSmcgUWbgf0cu.ngxi3ty6byj9c9FsEqIPKCDxjhZ9elG', 0, NULL, NULL, '2024-12-12 00:13:07', '2024-12-12 00:13:07'),
(42, NULL, 'Doan Duc Toan', 'test.vhtech@gmail.com', NULL, '$2y$10$xjHqEzOOfSyZMK/kIB4QSeFzDx7ptKY5Bnsid3t93aNmzapozxMnW', 0, 'images/HyOvLCm3q1fpTGT06zc2tglBAKLK3YVvfXEHitAf.jpg', NULL, '2024-12-12 00:37:53', '2024-12-12 00:43:40'),
(43, NULL, 'Savannah Kent', 'niquzikymi@mailinator.com', NULL, '$2y$10$.OzNIXvf7qc/mBEwkgAjTOqBzy9yAwmxrEd1/Z5Pa6nNafFIoGik2', 0, NULL, NULL, '2024-12-16 19:13:09', '2024-12-16 19:13:09'),
(44, NULL, 'abcdef', 'abc@gmail.com', NULL, '$2y$10$kpOkyAvszOtU4QanxF1XoePuqmUnB5qVfGZ0OLKmFedrb/7kzDuaO', 0, NULL, NULL, '2024-12-19 17:44:50', '2024-12-19 17:44:50'),
(45, NULL, 'Doan Duc Toan', 'abcde@gmail.com', NULL, '$2y$10$vY6RGoc0iDBQagbVpUxyMekUdOa3XhBwuKb25kVu2yqK1/ZkA6B/e', 0, NULL, NULL, '2024-12-24 19:26:09', '2024-12-24 19:26:09'),
(46, NULL, 'Content manager', 'xxx@gmail.com', NULL, '$2y$10$SAH8hkM5KD8D60j7GWmeQe.gOIEFu.IMwLPVulUO2dqeMM5c/o6py', 0, NULL, NULL, '2024-12-26 00:16:42', '2024-12-26 00:16:42'),
(47, '114691106720934091259', 'Duc Anh Nguyen', 'nguyenducanh2105@gmail.com', NULL, '$2y$10$i04p3wij3BEvim2C5vi3oe//HusKi4LHkv6G8wKZjcOMHvXtGEwGW', 0, NULL, NULL, '2024-12-30 08:06:38', '2024-12-31 11:04:48'),
(48, NULL, 'Nguyen Duc Anh', 'anh.nd214985@sis.hust.edu.vn', NULL, '$2y$10$Shh45RexhEvJorddo2kfCu5oS9owPxtDiD6GUiKFFfdwAIluhXxpq', 0, NULL, NULL, '2024-12-30 08:08:05', '2024-12-30 08:08:05'),
(49, NULL, 'Nguyen Duc Anh', 'ducanh.nb2105@gmail.com', NULL, '$2y$10$.OWVBXM/lH7dBnAum7W6hOaKgyLk.2YbpIEQcRMAe8RSHJnT1UT.K', 0, NULL, NULL, '2024-12-30 08:08:31', '2024-12-30 08:08:31'),
(50, NULL, 'Rafaelson Fernandes', 'a@email.com', NULL, '$2y$10$p38Mgjxy.DLbV5/YQJxvb.SFLz4sK123houvowQghJfciSqY8upR6', 0, NULL, NULL, '2024-12-30 17:50:51', '2025-01-01 04:45:41'),
(51, NULL, '岩倉史織', 'b@gmail.com', NULL, '$2y$10$.4vNZcC.ZcNnhZfi.AM0muaHsPzrkTdVCNauX3T8oVo/7HugsSbri', 0, NULL, NULL, '2024-12-30 17:57:09', '2025-01-01 04:47:16'),
(52, NULL, 'admin', 'admin@horensolabo.com', NULL, '$2y$10$f9ykHLOGh1IDROkQnLDqRuH7s9StxF6UO3M4LNfWJTjcEIt99Soru', 1, NULL, NULL, '2025-01-01 01:43:36', '2025-01-01 01:43:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_post_id_foreign` (`post_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_post_id_foreign` (`post_id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
