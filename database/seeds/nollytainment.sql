-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `actor_name`, `actor_picture`, `created_at`, `updated_at`) VALUES
(2, 'Charlie Cox', '1.jpg', NULL, NULL),
(4, 'Deborah Ann Wolf', '2.jpg', NULL, NULL),
(5, 'Vincent D Onofrio', '3.jpg', NULL, NULL),
(6, 'Jon Bernthal', '4.jpg', NULL, NULL),
(7, 'Elodie Yung', '5.jpg', NULL, NULL),
(11, 'Richard Hammond', '6.jpg', NULL, NULL),
(13, 'Jeremy Clarkson', '7.jpg', NULL, NULL),
(14, 'James May', '8.jpg', NULL, NULL),
(15, 'Ben Collins', '9.jpg', NULL, NULL),
(20, 'Dwayne Johnson', '8ddbb271a5b5135ff73e4fb5d99344dfMV5BMTkyNDQ3NzAxM15BMl5BanBnXkFtZTgwODIwMTQ0NTE@._V1_UX214_CR0,0,214,317_AL_.jpg', NULL, NULL),
(21, 'Josh Hutcherson', '979be63a311e3172d3dd607822c986f6MV5BMTI4OTk0MjQ1OV5BMl5BanBnXkFtZTcwNTE3NjM3Mw@@._V1_UX214_CR0,0,214,317_AL_.jpg', NULL, NULL),
(22, 'Anna Colwell', '83145f2e3aa9951277e183090d7f8f0fMV5BMTgzODQxMTIwNl5BMl5BanBnXkFtZTcwODU5Njk0NQ@@._V1_UY317_CR11,0,214,317_AL_.jpg', NULL, NULL),
(23, 'Michael Fox', '2825f90c1adcf2fe3c8c4f7e80579bc6MV5BMTcwNzM0MjE4NF5BMl5BanBnXkFtZTcwMDkxMzEwMw@@._V1_UY317_CR1,0,214,317_AL_.jpg', NULL, NULL),
(24, 'Christopher Lloyd', 'd9c5c2dce3c89323b5fcff7a8988a902MV5BMTkxNzQ0ODgxOV5BMl5BanBnXkFtZTcwMTAxMDY0Mg@@._V1_UY317_CR11,0,214,317_AL_.jpg', NULL, NULL),
(25, 'Lea Thompson', '8d9a4cef2e266ee982d4868b330b0fecMV5BMjE5ODcyODUwMl5BMl5BanBnXkFtZTgwMTA3MDg1MjE@._V1_UY317_CR10,0,214,317_AL_.jpg', NULL, NULL),
(26, 'Kristen Connolly', 'f8b3d41d0d5917c648cfc836c919b098MV5BMjE5NzA4OTY3N15BMl5BanBnXkFtZTgwMzI5MjY1NjE@._V1_UY317_CR14,0,214,317_AL_.jpg', NULL, NULL),
(27, 'Chris Hemsworth', '006fb85ea61689c6628afe29d5f447baMV5BOTU2MTI0NTIyNV5BMl5BanBnXkFtZTcwMTA4Nzc3OA@@._V1_UX214_CR0,0,214,317_AL_.jpg', NULL, NULL),
(28, 'Anna Hutchison', 'ba33df3e756abafc6c322c6d692db324MV5BMTA4Mjg3MTc5NDZeQTJeQWpwZ15BbWU4MDE5OTgxNTMx._V1_UX214_CR0,0,214,317_AL_.jpg', NULL, NULL),
(29, 'Fran Kranz', 'c6d92dc3534977b04c4ba5c927d022a4MV5BMjU1MTM4OTQzNV5BMl5BanBnXkFtZTcwODM0Mjc3Nw@@._V1_UY317_CR5,0,214,317_AL_.jpg', NULL, NULL),
(30, 'Jesse Williams', '37000214841385084ecff74e415267b1MV5BMDA5NDc3MzEtMTRlNS00YWYwLWE0MjMtMTQ4MmMyMzU4MWM3L2ltYWdlXkEyXkFqcGdeQXVyODgwMzQ5Ng@@._V1_UY317_CR73,0,214,317_AL_.jpg', NULL, NULL),
(31, 'Pens Naku', 'de6008614209c777af9a1a1720116e9ecapture.png', '2018-02-22 14:10:56', '2018-02-22 14:10:56');

-- --------------------------------------------------------



INSERT INTO `actor_relations` (`id`, `movie_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(2, 39, 2, NULL, NULL),
(4, 39, 4, NULL, NULL),
(5, 39, 5, NULL, NULL),
(6, 39, 6, NULL, NULL),
(7, 39, 7, NULL, NULL),
(14, 42, 20, NULL, NULL),
(15, 42, 21, NULL, NULL),
(16, 42, 22, NULL, NULL),
(19, 45, 11, NULL, NULL),
(20, 47, 21, NULL, NULL),
(21, 20, 7, NULL, NULL),
(22, 48, 20, NULL, NULL),
(23, 22, 11, NULL, NULL),
(24, 23, 7, NULL, NULL),
(25, 49, 20, NULL, NULL),
(26, 25, 15, NULL, NULL),
(27, 50, 20, NULL, NULL),
(28, 27, 14, NULL, NULL),
(29, 28, 13, NULL, NULL),
(30, 51, 15, NULL, NULL),
(31, 30, 13, NULL, NULL),
(32, 52, 21, NULL, NULL),
(33, 52, 20, NULL, NULL),
(34, 52, 13, NULL, NULL),
(35, 53, 20, NULL, NULL),
(36, 53, 11, NULL, NULL),
(51, 43, 25, NULL, NULL),
(52, 43, 24, NULL, NULL),
(54, 43, 23, NULL, NULL),
(55, 44, 30, NULL, NULL),
(56, 44, 29, NULL, NULL),
(57, 44, 28, NULL, NULL),
(58, 44, 27, NULL, NULL),
(59, 44, 26, NULL, NULL),
(60, 45, 2, '2018-02-23 04:44:30', '2018-02-23 04:44:30'),
(61, 45, 4, '2018-02-23 04:44:30', '2018-02-23 04:44:30'),
(62, 45, 5, '2018-02-23 04:44:30', '2018-02-23 04:44:30'),
(63, 45, 31, '2018-02-23 04:44:30', '2018-02-23 04:44:30');

-- --------------------------------------------------------

INSERT INTO `codes` (`id`, `code`, `amount`, `amount_plain`, `action`, `created_at`, `updated_at`) VALUES
(6, '483-517-A25', 1488065667, '1 month', 'add_subscription', NULL, NULL),
(7, '10F-325-19C', 1488065744, '1 month', 'add_subscription_time', NULL, NULL),
(8, 'F9C-ECF-4B3', 1485992210, '1 week', 'add_subscription', NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `season_id`, `movie_id`, `episode_number`, `episode_name`, `episode_description`, `episode_thumbnail`, `episode_source`, `is_embed`, `created_at`, `updated_at`) VALUES
(24, 19, 39, 1, 'Bang', 'Murdocks vigilante crime fighting and his new law practice find equally dangerous challenges in a murder case tied to a corporate crime syndicate.', 'e7063e2a7016c14d64b829e27c7f81381.jpg', 'https://www.youtube.com/watch?v=jAy6NJ_D5vU', 0, NULL, NULL),
(25, 19, 39, 2, 'Dogs to a Gunfight', 'Murdock makes a near fatal error while trying to save a kidnapped boy, and finds an unlikely ally when he needs saving himself.', 'ab12a986d5366cd169f2545b7d581eba2.jpg', 'https://www.youtube.com/watch?v=m5_A0Wx0jU4&t=18s', 0, NULL, NULL),
(26, 19, 39, 3, 'New Yorks Finest', 'Murdock and Foggy take on a mysterious wealthy client, but Murdock is convinced that there is more to the case than just the facts.', '3.jpg', 'https://www.youtube.com/watch?v=2Cn3DVV0LHY', 0, NULL, NULL),
(27, 19, 39, 4, 'Penny and Dime', 'Murdock and Foggy take on a mysterious wealthy client, but Murdock is convinced that there is more to the case than just the facts.', '4.jpg', 'https://www.youtube.com/watch?v=VK1mrTQd8D0', 0, NULL, NULL);

-- --------------------------------------------------------
--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `is_kid_friendly`, `created_at`, `updated_at`) VALUES
(2, 'Drama', 0, NULL, NULL),
(3, 'Thriller', 0, NULL, NULL),
(4, 'Action', 0, NULL, NULL),
(5, 'Comedy', 1, NULL, NULL),
(7, 'Medieval', 0, NULL, NULL),
(8, 'Fantasy', 0, NULL, NULL),
(9, 'Cartoon', 1, NULL, NULL),
(10, 'Documentary', 0, NULL, NULL),
(11, 'Sci-Fi', 0, NULL, NULL),
(12, 'Horror', 0, NULL, NULL),
(13, 'Tragic Comedy', 1, '2018-02-22 14:48:54', '2018-02-22 14:48:54');

-- --------------------------------------------------------

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_02_15_134327_create_actor_relations_table', 1),
(3, '2018_02_15_134341_create_actors_table', 1),
(4, '2018_02_15_134342_create_codes_table', 1),
(5, '2018_02_15_134343_create_episodes_table', 1),
(6, '2018_02_15_134343_create_genres_table', 1),
(7, '2018_02_15_134344_create_movies_table', 1),
(8, '2018_02_15_134345_create_my_list_table', 1),
(9, '2018_02_15_134346_create_pages_table', 1),
(10, '2018_02_15_134347_create_profiles_table', 1),
(11, '2018_02_15_134348_create_ratings_table', 1),
(12, '2018_02_15_134349_create_seasons_table', 1),
(13, '2018_02_15_134350_create_sessions_table', 1),
(14, '2018_02_15_134351_create_settings_table', 1),
(15, '2018_02_15_134352_create_users_table', 1);

-- --------------------------------------------------------

INSERT INTO `movies` (`id`, `movie_name`, `movie_plot`, `movie_year`, `movie_genres`, `movie_poster_image`, `movie_thumb_image`, `movie_plays`, `movie_source`, `is_embed`, `is_featured`, `is_series`, `last_season`, `is_kid_friendly`, `free_to_watch`, `created_at`, `updated_at`) VALUES
(39, 'Daredevil', 'Matt Murdock, with his other senses superhumanly enhanced, fights crime as a blind lawyer by day, and vigilante by night.', '2015', '11', 'beed6ac962ba26570fab8c8042ed7503daredevil.jpg', '0427bd3dc8b46ddc85feb05d6aeb3efamasonry2.jpg', 0, 'https://www.youtube.com/watch?v=m5_A0Wx0jU4&t=1s', 0, 1, 1, 0, 0, 0, NULL, NULL),
(43, 'Back To The Future', 'Marty McFly, a 17-year-old high school student, is accidentally sent 30 years into the past in a time-traveling DeLorean invented by his close friend, the maverick scientist Doc Brown.', '', '11', '6733a8b78bd52d3377adacd001d4cc43back-to-the-future-wallpaper-12.jpg', 'abf71042c600b1124480639355209ad2masonry25.jpg', 0, 'https://www.youtube.com/watch?v=qvsgGtivCgs', 0, 0, 0, 0, 0, 1, NULL, NULL),
(44, 'Cabin In The Woods', 'Five friends go for a break at a remote cabin, where they get more than they bargained for, discovering the truth behind the cabin in the woods.', '', '12', '599553ec5d2626a4f9465a32da89d303thecabinwoods.jpg', '506bbbc5920189e551d0c78d5a939b87masonry29.jpg', 0, 'https://www.youtube.com/watch?v=u1Ea86glnRU', 0, 0, 0, 0, 0, 1, NULL, NULL),
(45, 'Snoop Dogg Gin and Juice', 'A man and his son are unlawfully taken to court by a drug lord. They decide to find evidence against...', '2018', '2,3', 'e1ca8eeecfb124de1f6dd311fa4e5aa874166.jpg', '5bb981b8bd1cd00b7ad15a245e0a3df6107469.jpg', 0, 'https://youtu.be/5-je9p7oP1Q', 1, 1, 0, 1, 0, 0, '2018-02-23 04:44:30', '2018-02-23 04:44:30');

-- --------------------------------------------------------


INSERT INTO `pages` (`id`, `page_name`, `page_content`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, NULL),
(2, 'Contact Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, NULL);

-- --------------------------------------------------------

INSERT INTO `profiles` (`id`, `user_id`, `profile_name`, `profile_avatar`, `profile_language`, `is_kid`, `created_at`, `updated_at`) VALUES
(30, 22, 'Martin', 3, 'english', 0, NULL, NULL),
(31, 22, 'Joe', 8, 'english', 0, NULL, NULL),
(32, 22, 'Lea', 5, 'english', 1, NULL, NULL),
(33, 22, 'Olivia', 4, 'english', 1, NULL, NULL),
(34, 32, 'Pens', 4, 'english', 0, '2018-02-22 14:59:46', '2018-02-22 14:59:46');

-- --------------------------------------------------------

INSERT INTO `ratings` (`id`, `movie_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(15, 43, 22, '4', NULL, NULL),
(16, 39, 22, '4.5', NULL, NULL),
(17, 44, 22, '5', NULL, NULL),
(18, 39, 0, '4.5', NULL, NULL);

-- --------------------------------------------------------

INSERT INTO `seasons` (`id`, `movie_id`, `season_number`, `created_at`, `updated_at`) VALUES
(19, 39, 1, NULL, NULL);

-----------------------------------------------------------

INSERT INTO `sessions` (`id`, `session_id`, `user_ip`, `user_id`, `profile_id`, `language`, `is_active`, `time`, `created_at`, `updated_at`) VALUES
(54, 'e11f2b625b', '84.238.240.38', 22, 31, '', 1, 1485725235, NULL, NULL),
(55, '33fa86aa51', '::1', 22, 30, '', 0, 1485824085, NULL, NULL),
(56, 'b9216359ef', '::1', 22, 30, '', 0, 1485835978, NULL, NULL),
(57, '1d03da7678', '::1', 22, 30, '', 0, 1485962260, NULL, NULL),
(58, 'dd07e6813d', '::1', 22, 30, '', 0, 1485983423, NULL, NULL),
(59, '08012bc4bf', '::1', 22, 30, '', 0, 1485988909, NULL, NULL),
(60, '034a5c19e4', '::1', 22, 30, '', 1, 1485990503, NULL, NULL),
(61, 'a8d6406c26', '::1', 22, 30, '', 1, 1485990929, NULL, NULL),
(62, '99c1747922', '::1', 22, 30, '', 0, 1486003922, NULL, NULL),
(63, 'a91a78e880', '::1', 22, 30, '', 0, 1486006718, NULL, NULL),
(64, 'de42d2b1d4', '::1', 22, 30, '', 1, 1486006793, NULL, NULL);

-- --------------------------------------------------------

INSERT INTO `settings` (`id`, `website_name`, `website_title`, `website_description`, `website_keywords`, `theme`, `paypal_email`, `subscription_price`, `subscription_currency`, `subscription_name`, `disquis_short_name`, `footer_on_content_optimized_pages`, `redirect_after_login`, `default_language`, `facebook_url`, `twitter_url`, `show_actors`, `supports_starring`, `kid_profiles`, `show_profiles`, `supports_profiles`, `jwplayer_key`, `created_at`, `updated_at`) VALUES
(1, 'NollyTainment', 'Movies and Videos Galore', 'One of the best and most powerful content management system for movie & video content', 'watch movies online, netflix clone, muviko, educational videos', 'flixer', 'pensnaku@gmail.com', 5, 'USD', 'Premium', 'nollytainment', 0, 'select_profile', 'english', 'https://www.facebook.com/nollytainment', 'https://twitter.com/nollytainment', 1, 1, 1, 1, 1, '898i08uouhu9hy6tg6r656redr5rtsgrewseda', NULL, '2018-02-23 03:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `phone_country_code`, `last_profile`, `last_profile_name`, `is_admin`, `is_subscriber`, `subscription_expiration`, `remember_token`, `created_at`, `updated_at`) VALUES
(22, 'pensnaku@gmail.com', '$2y$10$IorOa2hj81KyHstf8dYc4ePcKpgSje/YA2t0.EHwrSSnOCyOSKHCW', 'Martin Kolarov', '08066080762', '', 30, 'Martin', 1, 1, 1924907948, 'R4LeMGy2nMSPRR0XxSV6MWNS5c1DFl3ITa2ogrpxkclGh9CEny06o689PGZd', NULL, '2018-02-22 11:29:17'),
(32, 'pensnaku@gmail.comlll', '$2y$10$YfbSLpGwHCw93Q73gRkOVO1qtQXygNLfs8tdwNinwWA4qidhzezK.', 'Pens Naku', '09339309', '234', 34, NULL, 1, 1, 1521993586, NULL, '2018-02-22 14:59:46', '2018-02-22 14:59:46');
