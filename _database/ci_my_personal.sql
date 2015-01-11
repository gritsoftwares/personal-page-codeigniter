-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 12:12 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.6.0-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_my_personal`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `slug` varchar(140) NOT NULL,
  `category_id` int(11) NOT NULL,
  `short_text` text NOT NULL,
  `full_text` text NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  FULLTEXT KEY `title` (`title`,`full_text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `title`, `slug`, `category_id`, `short_text`, `full_text`, `published`, `created_at`, `updated_at`) VALUES
(2, 'How I repaired my old PC', 'how-i-repaired-my-old-pc', 4, '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>\n\n<p>&nbsp;</p>', '<p><img alt="" src="/img/uploads/blog/images/tumblr_ltom07iPNz1qbj52ro1_500.jpg" /></p>\n\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\n\n<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', 1, 1406926800, 1411111133),
(3, 'How to earn your firt $1Billion', 'how-to-earn-your-firt-1billion', 5, '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\n\n<p><img alt="" src="/img/uploads/blog/images/5447507019_666af5746f_z.jpg" /></p>\n\n<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', 1, 1408136400, 1411111146),
(4, 'Understanding the Web Server OAuth Authentication Flow', 'understanding-the-web-server-oauth-authentication-flow', 6, '<div class="shortdesc">The Web server authentication flow is used by applications that are hosted on a secure server. A critical aspect of the Web server flow is that the server must be able to protect the consumer secret.</div>\n\n<p>In this flow, the client application requests the authorization server to redirect the user to another web server or resource that authorizes the user and sends the application an authorization code. The application uses the authorization code to request an access token. The following shows the steps for this flow.</p>', '<div class="shortdesc">The Web server authentication flow is used by applications that are hosted on a secure server. A critical aspect of the Web server flow is that the server must be able to protect the consumer secret.</div>\n\n<p>In this flow, the client application requests the authorization server to redirect the user to another web server or resource that authorizes the user and sends the application an authorization code. The application uses the authorization code to request an access token. The following shows the steps for this flow.</p>\n <p><img alt="" src="/img/uploads/blog/images/oauth_web_flow.png"  /></p>\n\n<p>&nbsp;</p>\n\n<ol>\n <li>The application redirects the user to the appropriate Salesforce authorization endpoint, such as https://login.salesforce.com/services/oauth2/authorize. The following parameters are required.</li>\n <li>The user logs into Salesforce with their credentials. The user is interacting with the authorization endpoint directly, so the application never sees the user&rsquo;s credentials. After successfully logging in, the user is asked to authorize the application. Note that if the user has already authorized the application, this step is skipped.</li>\n <li>Once Salesforce confirms that the client application is authorized, the end-user&rsquo;s Web browser is redirected to the callback URL specified by the <samp>redirect_uri</samp> parameter. Salesforce appends authorization information to the redirect URL with the following values.</li>\n</ol>', 1, 1408914000, 1411109077),
(6, 'How to master PHP 5 mins a day', 'how-to-master-php-5-mins-a-day', 6, '<p>Nunc sed massa odio. Aliquam fringilla ac ante et interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor orci gravida porta suscipit. Integer mollis diam sed ipsum consectetur rutrum. Mauris nec dui non nibh accumsan facilisis. Duis tincidunt ipsum sed posuere consectetur. Proin pulvinar lectus vitae fermentum cursus. Fusce vitae diam ac ex molestie pretium et at mi. Aenean ornare massa velit, non facilisis sem blandit id.</p>', '<p>Nunc sed massa odio. Aliquam fringilla ac ante et interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor orci gravida porta suscipit. Integer mollis diam sed ipsum consectetur rutrum. Mauris nec dui non nibh accumsan facilisis. Duis tincidunt ipsum sed posuere consectetur. Proin pulvinar lectus vitae fermentum cursus. Fusce vitae diam ac ex molestie pretium et at mi. Aenean ornare massa velit, non facilisis sem blandit id.</p>\n\n<p>Nunc sed massa odio. Aliquam fringilla ac ante et interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor orci gravida porta suscipit. Integer mollis diam sed ipsum consectetur rutrum. Mauris nec dui non nibh accumsan facilisis. Duis tincidunt ipsum sed posuere consectetur. Proin pulvinar lectus vitae fermentum cursus. Fusce vitae diam ac ex molestie pretium et at mi. Aenean ornare massa velit, non facilisis sem blandit id.</p>', 1, 1410443671, 1411111105),
(10, 'Outdated SEO Concepts People Still Think are Reality', 'outdated-seo-concepts-people-still-think-are-reality', 3, '<p>The bane of the existence of all search marketers is old or incorrect information given to clients at <strong>any</strong> point in time that they still hang on to. This post was inspired by an interaction with a client&#39;s co-workers, people that are not thinking about SEO on a regular basis. This is not to knock them, but to bring to the attention of&nbsp;everyone that <strong>there is a continual need for education</strong>. These concepts have a way of hanging around.</p>', '<p>The bane of the existence of all search marketers is old or incorrect information given to clients at <strong>any</strong> point in time that they still hang on to. This post was inspired by an interaction with a client&#39;s co-workers, people that are not thinking about SEO on a regular basis. This is not to knock them, but to bring to the attention of&nbsp;everyone that <strong>there is a continual need for education</strong>. These concepts have a way of hanging around.</p>\n\n<p>And this isn&#39;t about just clients either. This is about friends, parents, and partners. Does anyone else still get asked if they make pop-up ads when they try to explain what they do? (Just me? Crap.)</p>\n\n<p>Doing research for this post, I noticed there are a ton of SEO misconceptions out there, and people are talking about them regularly, but many are related to content marketing or online marketing overall. I&#39;m not covering all misconceptions, but those concepts that seem to be stuck to the idea of SEO and will not let go. Then I&#39;ll give you resources to help educate the people that believe these misconceptions and alternate solutions to give them.</p>', 0, 1411109181, 1411109181);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`) VALUES
(1, 'Web Design ', 'web-design'),
(3, 'SEO ', 'seo'),
(4, 'Hardware', 'hardware'),
(5, 'Business', 'business'),
(6, 'PHP', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `center` varchar(100) NOT NULL,
  `score` float NOT NULL,
  `link` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `center`, `score`, `link`, `order`) VALUES
(1, 'PHP 5.5 ', 'Brainbench ', 5, 'http://www.brainbench.com/xml/bb/common/testcenter/consumer/taketest.xml?testId=3094', 2),
(2, 'JavaScript 1.8', 'Brainbench', 4.95, 'http://www.brainbench.com/xml/bb/common/testcenter/consumer/taketest.xml?testId=2886', 3),
(3, 'HTML5', 'Brainbench', 4.9, 'http://www.brainbench.com/xml/bb/common/testcenter/consumer/taketest.xml?testId=2935', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('58251e49c011f949e43a667f53ada3c6', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411111946, 'a:6:{s:9:"user_data";s:0:"";s:4:"name";s:13:"Alex Kravchuk";s:5:"email";s:21:"akravchuk89@gmail.com";s:9:"logged_in";b:1;s:14:"captcha_string";s:7:"2 + 5 =";s:13:"captcha_value";i:7;}');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `company_title` varchar(140) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `company_title`, `company_website`, `description`, `technologies`, `start_date`, `end_date`) VALUES
(1, 'Junior C++ developer', 'Braier & Asociados Consultores', 'http://braier.com', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'php, javascript, html, css, git, linux', 1316413475, 1368944675),
(2, 'Semi Senior J2SE and J2EE developer', 'Novamens', 'http://novamens.org', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'php, javascript, html, css, git, linux', 1276928701, 1313735101),
(3, 'Semi Senior Java, PHP and Oracle PL/SQL developer', 'Secretaría de Ciencia, Tecnología e Innovación Productiva', 'https://ciencia.com.ua', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'php, javascript, html, css, git, linux', 1368944638, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_id` int(11) NOT NULL,
  `account` varchar(100) NOT NULL,
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `website_account` (`website_id`,`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `website_id`, `account`, `order`) VALUES
(1, 1, 'aleks.kravchuk', 1),
(2, 2, 'alex_kravchuk', 2),
(3, 5, 'alex-krav', 3),
(4, 7, 'aleks.krav', 4);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `title` varchar(140) NOT NULL,
  `author` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category`, `title`, `author`, `link`) VALUES
(1, 'Computer Science', 'Comprehensive Algorithms', 'Jordan Hudgens', 'https://www.udemy.com/comprehensive-algorithms'),
(2, 'Linux administartion', 'GitHub Fundamentals', 'Ed Matthews ', 'https://www.udemy.com/github-fundamentals'),
(3, 'Software Engineering', 'Introduction to Data Structures & Algorithms in Java', 'Raghavendra Dikshit ', 'https://www.udemy.com/introduction-to-data-structures-algorithms-in-java'),
(4, 'Software Engineering', 'APIs: Crash Course', 'Christopher Castiglione ', 'https://www.udemy.com/learn-apis'),
(5, 'Web development', 'Web developer from scratch', 'Viktor Bastos', 'http://udemy.com/course-page');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `slug` varchar(140) NOT NULL,
  `description` text NOT NULL,
  `technologies` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `img` tinyint(4) NOT NULL DEFAULT '0',
  `completion_date` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `description`, `technologies`, `link`, `img`, `completion_date`, `published`) VALUES
(28, 'Corporate website for Company', 'corporate-website-for-company', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tristique eget odio sit amet tristique. Nulla ac sollicitudin felis. Donec tristique bibendum posuere. Donec quis malesuada neque. Etiam iaculis erat vel purus dignissim, euismod laoreet diam porta. Integer hendrerit tempus vestibulum. Sed malesuada, odio eu fringilla semper, ligula lectus varius sem, vitae pretium tortor turpis sed felis. Duis a dictum ante. Curabitur id nulla hendrerit, ullamcorper tellus id, vestibulum odio.</p>\n\n<p>Duis facilisis metus urna, et efficitur ante finibus et. Donec ex libero, pretium nec lobortis et, laoreet sed massa. Vestibulum consequat lacus at maximus aliquam. Curabitur ut ligula non ligula condimentum placerat id ac ex. Fusce vel lacinia risus. Sed rutrum non diam in convallis. Aenean ornare dui ut orci pretium, non sollicitudin orci consectetur. Integer suscipit ultricies congue. Vivamus varius dapibus tincidunt. Phasellus vel ullamcorper nulla, a efficitur lorem. Morbi eleifend dignissim efficitur.</p>', 'php, mysql, js, html, css', 'http://companywebsite.com', 1, 1292743972, 1),
(29, 'News website', 'news-website', '<p>Duis facilisis metus urna, et efficitur ante finibus et. Donec ex libero, pretium nec lobortis et, laoreet sed massa. Vestibulum consequat lacus at maximus aliquam. Curabitur ut ligula non ligula condimentum placerat id ac ex. Fusce vel lacinia risus. Sed rutrum non diam in convallis. Aenean ornare dui ut orci pretium, non sollicitudin orci consectetur. Integer suscipit ultricies congue. Vivamus varius dapibus tincidunt. Phasellus vel ullamcorper nulla, a efficitur lorem. Morbi eleifend dignissim efficitur.</p>\n\n<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', 'php, mysql, js', 'http://newswebsite.com', 1, 1300520039, 1),
(30, 'Music website', 'music-website', '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>\n\n<p>Donec rhoncus tellus at nulla pharetra, a mollis mauris ornare. In tincidunt metus commodo velit convallis, non congue metus aliquet. Sed sit amet ex efficitur, auctor libero id, volutpat augue. Phasellus vulputate mauris quis orci congue, sit amet vulputate enim vestibulum. Cras mattis, mauris ac molestie aliquet, justo lacus tristique ante, nec accumsan diam metus sit amet purus. Sed nibh dui, faucibus vitae velit eu, hendrerit scelerisque mi. Ut nec est ornare, euismod mauris et, imperdiet risus. Aenean venenatis auctor velit a efficitur.</p>', 'php, codeigniter, jquery, bootstrap', 'http://music.com', 1, 1313737858, 1),
(31, 'Business website', 'business-website', '<p>Donec rhoncus tellus at nulla pharetra, a mollis mauris ornare. In tincidunt metus commodo velit convallis, non congue metus aliquet. Sed sit amet ex efficitur, auctor libero id, volutpat augue. Phasellus vulputate mauris quis orci congue, sit amet vulputate enim vestibulum. Cras mattis, mauris ac molestie aliquet, justo lacus tristique ante, nec accumsan diam metus sit amet purus. Sed nibh dui, faucibus vitae velit eu, hendrerit scelerisque mi. Ut nec est ornare, euismod mauris et, imperdiet risus. Aenean venenatis auctor velit a efficitur.</p>\n\n<p>Nunc sed massa odio. Aliquam fringilla ac ante et interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor orci gravida porta suscipit. Integer mollis diam sed ipsum consectetur rutrum. Mauris nec dui non nibh accumsan facilisis. Duis tincidunt ipsum sed posuere consectetur. Proin pulvinar lectus vitae fermentum cursus. Fusce vitae diam ac ex molestie pretium et at mi. Aenean ornare massa velit, non facilisis sem blandit id.</p>', 'php, symfony, mysql', 'http://business.com', 1, 1326958601, 1),
(32, 'Radio website', 'radio-website', '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>\n\n<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', 'html, css, javascript', 'http://radio.com', 1, 1366355441, 1),
(33, 'Apple', 'apple', '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>\n\n<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.</p>', 'php, python, java, node.js', 'http://apple.com', 1, 1403161643, 1),
(34, 'Test project', 'test-project', '<p>Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.&nbsp;</p>', 'C#, ASP.NET', 'http://secretwebsite.com', 0, 1413700846, 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE IF NOT EXISTS `portfolio_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `slug`, `order`) VALUES
(1, 'Web Design', 'webdesign', 3),
(2, 'Web Programming', 'webprogramming', 1),
(3, 'SEO', 'seo', 5),
(4, 'Content Management', 'contentmanagement', 6),
(5, 'Analytics', 'analytics', 4),
(6, 'Ecommerce', 'ecommerce', 2);

-- --------------------------------------------------------

--
-- Table structure for table `port_cat`
--

CREATE TABLE IF NOT EXISTS `port_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_id_category_id` (`portfolio_id`,`category_id`),
  KEY `portfolio_id` (`portfolio_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `port_cat`
--

INSERT INTO `port_cat` (`id`, `portfolio_id`, `category_id`) VALUES
(74, 28, 2),
(75, 29, 1),
(84, 30, 2),
(77, 31, 6),
(83, 32, 1),
(82, 33, 6),
(81, 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `description` varchar(160) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `name`, `slug`, `title`, `description`) VALUES
(1, 'Home', '', 'Alex Kravchuk | Freelance PHP Developer', 'Alex Kravchuk offers professional web development using popular frameworks or custom applications with bare PHP'),
(2, 'Resume', 'resume', 'Alex Kravchuk | Resume', 'Resume of developer Alex Kravchuk, just in case you wanted to know a bit about where I have worked.'),
(5, 'Portfolio', 'portfolio', 'Alex Kravchuk | Portfolio', 'Portfolio of web developer Alex Kravchuk. I offer custom web developing, custom web applications at an affordable price.'),
(6, 'Blog', 'blog', 'Alex Kravchuk | Blog', 'The thoughts and experience of Alex Kravchuk regarding web development, internet and whatever else that may cross my mind.'),
(7, 'Category', 'category', 'Alex Kravchuk |', 'The thoughts and experience of Alex Kravchuk regarding web development, internet and whatever else that may cross my mind.'),
(8, 'Post', 'post', 'Alex Kravchuk |', 'The thoughts and experience of Alex Kravchuk regarding web development, internet and whatever else that may cross my mind.'),
(9, 'Search', 'search', 'Alex Kravchuk |', 'The thoughts and experience of Alex Kravchuk regarding web development, internet and whatever else that may cross my mind.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(30) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `order`) VALUES
(7, 'Web Programming', 'Duis facilisis metus urna, et efficitur ante finibus et. Donec ex libero, pretium nec lobortis et, laoreet sed massa. Vestibulum consequat lacus at maximus aliquam. Curabitur ut ligula non ligula condimentum placerat id ac ex. Fusce vel lacinia risus. Sed rutrum non diam in convallis. Aenean ornare dui ut orci pretium, non sollicitudin orci consectetur. Integer suscipit ultricies congue. Vivamus varius dapibus tincidunt. Phasellus vel ullamcorper nulla, a efficitur lorem. Morbi eleifend dignissim efficitur.', 'fa fa-laptop', 6),
(8, 'Data Parsing', 'Nullam volutpat neque purus, a egestas quam placerat quis. Nulla facilisi. Mauris nec tempor ante. Proin vel massa vel elit feugiat vehicula id at enim. Duis lobortis tristique augue, vel pellentesque leo aliquet tristique. Praesent elit enim, varius et nunc sed, cursus finibus magna. Ut elementum, dolor sed vehicula aliquam, nulla neque laoreet ex, quis molestie turpis mauris a erat.', 'fa fa-database', 7),
(9, 'CMS Administration', 'Donec rhoncus tellus at nulla pharetra, a mollis mauris ornare. In tincidunt metus commodo velit convallis, non congue metus aliquet. Sed sit amet ex efficitur, auctor libero id, volutpat augue. Phasellus vulputate mauris quis orci congue, sit amet vulputate enim vestibulum. Cras mattis, mauris ac molestie aliquet, justo lacus tristique ante, nec accumsan diam metus sit amet purus. Sed nibh dui, faucibus vitae velit eu, hendrerit scelerisque mi. Ut nec est ornare, euismod mauris et, imperdiet risus. Aenean venenatis auctor velit a efficitur.', 'fa fa-wordpress', 8);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(20) NOT NULL,
  `homepage_intro` varchar(255) NOT NULL,
  `homepage_intro2` varchar(255) NOT NULL,
  `about_intro` varchar(255) NOT NULL,
  `about_intro2` text NOT NULL,
  `blog_intro` varchar(255) NOT NULL,
  `blog_intro2` varchar(255) NOT NULL,
  `resume_intro` varchar(255) NOT NULL,
  `resume_intro2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `homepage_intro`, `homepage_intro2`, `about_intro`, `about_intro2`, `blog_intro`, `blog_intro2`, `resume_intro`, `resume_intro2`) VALUES
(1, 'Alex Kravchuk', 'Hello, I''m Alex', 'PHP Developer from Ukraine', 'I''m a <span>PHP</span> Developer from Ukraine.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'This is my blog.', 'Here I share my knowledge, experience, thoughts', 'My Resume', 'My professional experience, courses, certificates');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `level_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `level_id`, `order`) VALUES
(1, 'PHP', 3, 1),
(2, 'JavaScript', 2, 4),
(3, 'HTML', 2, 5),
(5, 'Codeigniter', 2, 3),
(6, 'MySQL', 3, 2),
(7, 'CSS', 2, 6),
(8, 'Git', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `skill_levels`
--

CREATE TABLE IF NOT EXISTS `skill_levels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `skill_levels`
--

INSERT INTO `skill_levels` (`id`, `title`, `percent`) VALUES
(1, 'Beginner', 20),
(2, 'Intermediate', 40),
(3, 'Experienced', 60),
(4, 'Advanced', 80),
(5, 'Expert', 100);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` varchar(200) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `company`, `email`, `text`, `order`) VALUES
(1, 'John Doe', 'Microsoft', 'johndoe@microsof.com', 'This is amazing! Never seen it before!', 2),
(2, 'Jane Doe', 'Facebook', 'jane@doe.org', 'Yea, cool! I like him!', 3),
(4, 'David Webber', 'Google', 'webber@google.com', 'I want to thank this guy for his services. He did his job fast and professionally. I sure will recommend him for your projects.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` tinyint(4) NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `avatar`, `first_name`, `last_name`, `country`, `company`, `occupation`, `phone`, `email`, `password`) VALUES
(1, 1, 'Alex', 'Kravchuk', 'Ukraine', 'Freelancer', 'PHP Developer', '', 'admin@admin.com', '$2y$12$I8oHDN72Hz2thgvpWhSSb./dFcIAxOeUSsR6eFPdm/ppC3br/dQSS');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(155) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `color` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `title`, `link`, `icon`, `color`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'fa fa-facebook', '3278b3'),
(2, 'Twitter', 'https://twitter.com/', 'fa fa-twitter', '35bdf6'),
(3, 'Google+', 'https://plus.google.com/', 'fa fa-google-plus', 'b92c28'),
(4, 'Dribble', 'https://dribbble.com/', 'fa fa-dribbble', 'a94442'),
(5, 'Github', 'https://github.com/', 'fa fa-github', '777777'),
(6, 'Linkedin', 'http://www.linkedin.com/in/', 'fa-linkedin', '0077B5'),
(7, 'Skype', 'skype:name?call', 'fa fa-skype', '00B9F1'),
(8, 'Stackoverflow', 'http://stackoverflow.com/users/', 'fa fa-stack-overflow ', 'FF9900'),
(9, 'Behance', 'https://www.behance.net/', 'fa fa-behance', '000000'),
(10, 'deviantART', 'http://name.deviantart.com/', 'fa fa-deviantart', '526558'),
(11, 'Hacker News', 'https://news.ycombinator.com/user?id=', 'fa fa-hacker-news', 'FF6600'),
(12, 'FeedBurner', 'http://feeds.feedburner.com/', 'fa fa-rss', 'F99B2B'),
(13, 'Bitbucket', 'https://bitbucket.org/', 'fa fa-bitbucket', '205081');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `port_cat`
--
/*
ALTER TABLE `port_cat`
  ADD CONSTRAINT `port_cat_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `portfolio_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `port_cat_ibfk_2` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
