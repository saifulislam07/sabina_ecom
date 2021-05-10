-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 07:23 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabina_secret`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_manage`
--

CREATE TABLE `admin_manage` (
  `adminId` int(11) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_manage`
--

INSERT INTO `admin_manage` (`adminId`, `adminUsername`, `adminPassword`, `adminEmail`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mdmuhibullah1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `basic_manage`
--

CREATE TABLE `basic_manage` (
  `bsId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `comlogo` longtext NOT NULL,
  `addres` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `eamil` varchar(55) NOT NULL,
  `website` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basic_manage`
--

INSERT INTO `basic_manage` (`bsId`, `title`, `companyName`, `comlogo`, `addres`, `phone`, `eamil`, `website`) VALUES
(1, 'Sabina Secret', 'Savina Secret', '1509608482.png', 'House -60, R-10, BLOCK-D,BANANI-1213.', '+88 01940039139', 'info@savinasecret.com', 'www.savinasecret.com');

-- --------------------------------------------------------

--
-- Table structure for table `brands_manage`
--

CREATE TABLE `brands_manage` (
  `bndid` int(11) NOT NULL,
  `bndname` varchar(200) NOT NULL,
  `bndimage` longtext NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands_manage`
--

INSERT INTO `brands_manage` (`bndid`, `bndname`, `bndimage`, `status`) VALUES
(2, 'Dorothy Perkins', '1505286165.jpg', 'Active'),
(3, 'Zalora', '1505286192.jpg', 'Active'),
(4, 'H:CONNECT', '1505286254.jpg', 'Active'),
(5, ' ALDO', '1505286353.jpg', 'Active'),
(6, 'Under Armour', '1505286397.jpg', 'Active'),
(7, 'Guess', '1505286456.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category_manage`
--

CREATE TABLE `category_manage` (
  `catid` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catimage` longtext NOT NULL,
  `status` varchar(11) NOT NULL,
  `catdetails` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_manage`
--

INSERT INTO `category_manage` (`catid`, `catname`, `catimage`, `status`, `catdetails`) VALUES
(1, 'Clothing', '1505212106.png', 'Active', '<p>Clothing</p>'),
(2, 'Lingerie', '1508574158.png', 'Active', '<P>Bridesmaid Lace Yoke Dress with Embellished Waistband</p>'),
(3, 'Cosmetics', '1508563538.png', 'Active', ''),
(4, 'Bags', '1508563580.png', 'Active', ''),
(5, 'Shoes', '1508563608.png', 'Active', ''),
(6, 'Health & Beauty', '', 'Active', ''),
(7, 'Toiletries', '', 'Active', ''),
(8, 'Vitamin & Daily Suppliment', '', 'Active', ''),
(9, 'Others', '1508563735.PNG', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `content_manage`
--

CREATE TABLE `content_manage` (
  `contid` int(11) NOT NULL,
  `menuname` varchar(500) NOT NULL,
  `conttitle` varchar(1000) NOT NULL,
  `contimage` longtext NOT NULL,
  `status` varchar(11) NOT NULL,
  `contdetails` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_manage`
--

INSERT INTO `content_manage` (`contid`, `menuname`, `conttitle`, `contimage`, `status`, `contdetails`) VALUES
(5, 'About Us', 'Women''s Fashion Online', '1506346295.jpg', 'Active', '<p>When you shop with Sabina Secret, you are shopping for quality, the   newest trends and the best deals. So put your best foot forward today   and radiate your own brand of charm with Sabina Secret, your one-stop   online destination. Check back with us to never miss out our deals and   the latest must-have item! If you have any questions, send us an email   at customer@sg.Sabina Secret.com or call us at +65 3157 5555. Shopping   online with Sabina Secret is fun and simple. When you shop with Sabina Secret, you are shopping for quality, the    newest trends and the best deals. So put your best foot forward today    and radiate your own brand of charm with Sabina Secret, your one-stop    online destination. Check back with us to never miss out our deals and    the latest must-have item! If you have any questions, send us an email    at customer@sg.Sabina Secret.com or call us at +65 3157 5555. Shopping    online with Sabina Secret is fun and simple.</p>'),
(6, 'Careers', 'The One-Stop Fashion Solution For Women''s Clothes, Accessories, Shoes and More', '', 'Active', '<p>Sabina Secret is truly your one-stop online shopping destination for all   your fashion needs. We offer a vibrant array of apparels, shoes and   accessories for you to experiment with your own style. From head to toe,   we have got your back! Select from our collection of bridesmaid   dresses,party dresses, blouse, pants, jeans, maxi-dresses, skirts to   flats, sneakers, wedges, sandals, boots and heels. No outfit is complete   without accessories. So give your outfit an upgrade with a dainty   necklace or a chunky bracelet. Of course, looking your best goes skin   deep too. Shop for beauty products like SK-II and Skin Inc for   moisturisers, cleansers, serums and much more! Look good and feel great   with Sabina Secret.</p>'),
(7, 'FAQ', 'Top Brands in Women''s Fashion', '', 'Active', '<p>You have come to the right place for the best designs by the brand you   love! Featuring some of our homegrown labels, as well as international   best sellers like River Island, Dorothy Perkins, Nike and Aldo, you can   now get their newest collection right here. Whether you are bold,   conservative, sporty or feminine, Sabina Secret is the place to be to   get what you need. You will be sure that when you shop at Sabina Secret,   you are shopping for quality, style and affordability. Dive into the   Korean fashion scene with brands like Headline Seoul, Maxqullo and Salt.   With these swanky street styles, you''re ready to take the streets by   storm and make heads turn as you strut down the streets.Our incredible   plethora of brands and products is bound to make any woman''s heart skip a   beat! Perfect for all fashion forward ladies. Exude style effortlessly   with our exciting range of top brands now!</p>'),
(8, 'Promotions', 'A Fresh Take on Women''s Fashion', '', 'Active', '<p>It is hard for us to pick just one fashion trend that we love. There are   varying aspects of fashion as seen by the designs and styles. Each   outfit brings out a different side to you and when you shop at Sabina   Secret, you can be sure that we carry the brands that have a fresh take   on women''s fashion. That is why are are constantly on the hunt for up   and coming brands and the old favourites. With such a large collection   available at the click of a mouse, you are at liberty to be your very   own fashionista. Today, designers'' creations are risk-taking and bold.   You will see a modern take on the plain old flare jeans or shift dresses   with a Twiggy vibe. Be sure that we will only get the best brands in   for your fashion fix. Be a self-made stylist and assemble outfits easily   from the comfort of your own home. From High-street inspired clothes,   edgy and andgrogenous wear to feminine chic, you can now experiment  with  fashion. Soon you will discover that fashion is fun, easy and for   everyone.</p>'),
(10, 'Terms & Conditions', 'A Fresh Take on Women''s Fashion', '', 'Active', '<p>It is hard for us to pick just one fashion trend that we love. There  are   varying aspects of fashion as seen by the designs and styles. Each    outfit brings out a different side to you and when you shop at Sabina    Secret, you can be sure that we carry the brands that have a fresh  take   on women''s fashion. That is why are are constantly on the hunt  for up   and coming brands and the old favourites. With such a large  collection   available at the click of a mouse, you are at liberty to be  your very   own fashionista. Today, designers'' creations are  risk-taking and bold.   You will see a modern take on the plain old  flare jeans or shift dresses   with a Twiggy vibe. Be sure that we will  only get the best brands in   for your fashion fix. Be a self-made  stylist and assemble outfits easily   from the comfort of your own home.  From High-street inspired clothes,   edgy and andgrogenous wear to  feminine chic, you can now experiment  with  fashion. Soon you will  discover that fashion is fun, easy and for   everyone.</p>'),
(11, 'Privacy Policy', 'Women''s Fashion Online', '', 'Active', '<p>It is hard for us to pick just one fashion trend that we love. There   are   varying aspects of fashion as seen by the designs and styles.  Each    outfit brings out a different side to you and when you shop at  Sabina    Secret, you can be sure that we carry the brands that have a  fresh  take   on women''s fashion. That is why are are constantly on the  hunt  for up   and coming brands and the old favourites. With such a  large  collection   available at the click of a mouse, you are at  liberty to be  your very   own fashionista. Today, designers'' creations  are  risk-taking and bold.   You will see a modern take on the plain old   flare jeans or shift dresses   with a Twiggy vibe. Be sure that we  will  only get the best brands in   for your fashion fix. Be a self-made   stylist and assemble outfits easily   from the comfort of your own  home.  From High-street inspired clothes,   edgy and andgrogenous wear  to  feminine chic, you can now experiment  with  fashion. Soon you will   discover that fashion is fun, easy and for   everyone.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_information`
--

CREATE TABLE `customer_payment_information` (
  `cpinfoid` int(11) NOT NULL,
  `invoiceno` int(22) NOT NULL,
  `orderdate` varchar(22) NOT NULL,
  `paymenttype` varchar(33) NOT NULL,
  `receiptnumber` varchar(22) NOT NULL,
  `bankaccountnumber` varchar(44) NOT NULL,
  `bankaccountname` varchar(100) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentdate` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `hmcontid` int(11) NOT NULL,
  `hmconttitle` varchar(1000) NOT NULL,
  `status` varchar(11) NOT NULL,
  `hmcontdetails` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`hmcontid`, `hmconttitle`, `status`, `hmcontdetails`) VALUES
(5, 'Women''s Fashion Online', 'Inactive', '<p>When you shop with Sabina Secret, you are shopping for quality, the   newest trends and the best deals. So put your best foot forward today   and radiate your own brand of charm with Sabina Secret, your one-stop   online destination. Check back with us to never miss out our deals and   the latest must-have item! If you have any questions, send us an email   at customer@sg.Sabina Secret.com or call us at +65 3157 5555. Shopping   online with Sabina Secret is fun and simple.</p>'),
(6, 'The One-Stop Fashion Solution For Women''s Clothes, Accessories, Shoes and More', 'Inactive', '<p>Sabina Secret is truly your one-stop online shopping destination for all   your fashion needs. We offer a vibrant array of apparels, shoes and   accessories for you to experiment with your own style. From head to toe,   we have got your back! Select from our collection of bridesmaid   dresses,party dresses, blouse, pants, jeans, maxi-dresses, skirts to   flats, sneakers, wedges, sandals, boots and heels. No outfit is complete   without accessories. So give your outfit an upgrade with a dainty   necklace or a chunky bracelet. Of course, looking your best goes skin   deep too. Shop for beauty products like SK-II and Skin Inc for   moisturisers, cleansers, serums and much more! Look good and feel great   with Sabina Secret.</p>'),
(7, 'Top Brands in Women''s Fashion', 'Active', '<p>You have come to the right place for the best designs by the brand you   love! Featuring some of our homegrown labels, as well as international   best sellers like River Island, Dorothy Perkins, Nike and Aldo, you can   now get their newest collection right here. Whether you are bold,   conservative, sporty or feminine, Sabina Secret is the place to be to   get what you need. You will be sure that when you shop at Sabina Secret,   you are shopping for quality, style and affordability. Dive into the   Korean fashion scene with brands like Headline Seoul, Maxqullo and Salt.   With these swanky street styles, you''re ready to take the streets by   storm and make heads turn as you strut down the streets.Our incredible   plethora of brands and products is bound to make any woman''s heart skip a   beat! Perfect for all fashion forward ladies. Exude style effortlessly   with our exciting range of top brands now!</p>'),
(8, 'A Fresh Take on Women''s Fashion', 'Active', '<p>It is hard for us to pick just one fashion trend that we love. There are   varying aspects of fashion as seen by the designs and styles. Each   outfit brings out a different side to you and when you shop at Sabina   Secret, you can be sure that we carry the brands that have a fresh take   on women''s fashion. That is why are are constantly on the hunt for up   and coming brands and the old favourites. With such a large collection   available at the click of a mouse, you are at liberty to be your very   own fashionista. Today, designers'' creations are risk-taking and bold.   You will see a modern take on the plain old flare jeans or shift dresses   with a Twiggy vibe. Be sure that we will only get the best brands in   for your fashion fix. Be a self-made stylist and assemble outfits easily   from the comfort of your own home. From High-street inspired clothes,   edgy and andgrogenous wear to feminine chic, you can now experiment  with  fashion. Soon you will discover that fashion is fun, easy and for   everyone.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orddtlid` int(11) NOT NULL,
  `regid` int(11) NOT NULL,
  `invoiceno` int(22) NOT NULL,
  `proid` int(11) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `prosize` varchar(22) NOT NULL,
  `procode` varchar(33) NOT NULL,
  `proimage` longtext NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `orderstatus` varchar(11) NOT NULL,
  `orddtldate` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `payinId` int(11) NOT NULL,
  `payinType` varchar(22) NOT NULL,
  `paymentInfo` longtext NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`payinId`, `payinType`, `paymentInfo`, `status`) VALUES
(1, 'Bank', 'Account Holder :  A A WEBSOFT, Account Number: 10022848, Account Type: Savings account, Bank Name: Sonali Bank, Nakla Branch, Sherpur, Bangladesh.', 'Active'),
(2, 'Bkash', 'AGENT NUMBER :  BKash Phone Number-01940039139. ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `products_manage`
--

CREATE TABLE `products_manage` (
  `proid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `bndname` varchar(200) NOT NULL,
  `proname` varchar(200) NOT NULL,
  `procode` varchar(11) NOT NULL,
  `prosize` varchar(11) NOT NULL,
  `colorname` varchar(44) NOT NULL,
  `colorcode` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `prooldprice` int(11) NOT NULL,
  `proprice` int(11) NOT NULL,
  `embedcode` varchar(1000) NOT NULL,
  `proimage` longtext NOT NULL,
  `proimage1` longtext NOT NULL,
  `proimage2` longtext NOT NULL,
  `proimage3` longtext NOT NULL,
  `proimage4` longtext NOT NULL,
  `status` varchar(11) NOT NULL,
  `prodetails` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_manage`
--

INSERT INTO `products_manage` (`proid`, `catid`, `subcatid`, `bndname`, `proname`, `procode`, `prosize`, `colorname`, `colorcode`, `quantity`, `discount`, `prooldprice`, `proprice`, `embedcode`, `proimage`, `proimage1`, `proimage2`, `proimage3`, `proimage4`, `status`, `prodetails`) VALUES
(2, 1, 5, 'Guess', 'Textured Knit Dress', 'Drs0001', 'XS', 'Orange', '#fd650b', 34, '', 1200, 8000, '', '1505287858.png', '1505650201.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)<br /></td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(3, 1, 5, 'Under Armour', 'Textured Knit Dress', 'Drs00011', 'M', 'Black', '#000000', 13, '', 1200, 200, '', '1505288062.png', '1505650251.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(4, 1, 3, ' ALDO', 'Textured Knit Dress', 'Drs0001', 'S', 'Blue', '#083d8c', 2, '', 1200, 500, '', '1505288255.png', '1505650280.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(5, 1, 5, 'H:CONNECT', 'Textured Knit Dress', 'Drs0001', 'XS', 'Black', '#000000', 9, '', 1200, 1000, '', '1505288373.png', '1505650299.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(6, 1, 14, 'Zalora', 'Textured Knit Dress', 'Drs0001', 'XL', 'Brown', '#aa5628', 9, '10', 1200, 1000, '', '1505290562.png', '1505650318.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(7, 1, 5, 'Dorothy Perkins', 'Textured Knit Dress', 'Drs00011', 'XXL', 'Black', '#000000', 2, '', 350, 9000, '', '1505290809.png', '1505650339.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(8, 1, 4, 'Dorothy Perkins', 'Textured Knit Dress', 'Drs0001', 'M', '', '', 1, '', 1200, 1000, '', '1505290950.png', '1505650362.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(9, 1, 5, 'Zalora', 'Textured Knit Dress', 'Drs0001', 'S', 'Black', '#000000', 9, '10', 1200, 1000, 'https://www.youtube.com/embed/yuLi_HYoUpg', '1505291057.png', '1505650378.png', '', '', '', 'Active', '<p>&nbsp;</p>\r\n<table class="ui-grid ui-gridFull product__attr prd-attributes size1of2">\r\n<tbody>\r\n<tr>\r\n<td class="product__attr_name">SKU (simple)</td>\r\n<td>4E34BAA55AA48EGS</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Colour</td>\r\n<td>Navy</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Care label</td>\r\n<td>Machine wash cold with mild detergent<br />Line dry inside out in shade<br />Do not wring<br />Do not dry clean<br />Iron with low heat<br />Do not dry clean<br />Tumble dry medium</td>\r\n</tr>\r\n<tr>\r\n<td class="product__attr_name">Material</td>\r\n<td>97% Polyester, 3% Spandex</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(10, 3, 11, 'Guess', 'Snow Ball Brush Kit', 'MC0001', 'L', 'Gray', '#cec9c5', 5, '20', 800, 1000, '', '1508759561.png', '', '', '', '', 'Active', '<p>Brush off all the drama and stay chill. This silver Brush Kit adds some  dazzle to your going-out routine, offering a chic new way to dress the  eyes, cheeks and face. The Basic Kit helps you achieve that certain je  ne sais quoi &ndash; a little something to create intrigue &ndash; with the 420SE  Powder Brush, 490SE Pointed Foundation Brush, 530SE All-Over Shadow  Brush, 515SE Smudging Liner Brush and 505SE Brow Groomer Brush. The  foiled silver bag doubles as the ideal clutch for nights both in and  out. Time to get glam.</p>'),
(11, 3, 11, 'Dorothy Perkins', 'Snow Ball Eye Compact', 'MC0002', 'L', 'Multi color', '#FFFFFF', 3, '30', 500, 1200, '', '1508761536.png', '', '', '', '', 'Active', ''),
(12, 3, 10, '--- Select Brand Name ---', 'Snow Ball Mini Lip Gloss Kit', 'MC0003', 'S', 'Golden', '#d8a488', 3, '20', 1500, 600, '', '1508762169.png', '', '', '', '', 'Active', ''),
(13, 3, 10, 'H:CONNECT', 'Snow Ball Mini Lipstick Kit', 'MC0004', 'S', 'Red', '#FF0000', 5, '15', 500, 300, '', '1508762318.png', '', '', '', '', 'Active', ''),
(14, 9, 25, 'Under Armour', ' Polar POLAR A370 Fitness Tracker', 'WS0001', 'L', 'White', '#FFFFFF', 3, '10', 1500, 1000, '', '1508854608.png', '1508854612.png', '', '', '', 'Active', '<p>Polar A370 is a sleek and sporty waterproof fitness tracker that helps  you stay on the pulse 24/7 with continuous heart rate monitoring,  advanced sleep tracking and Polar&rsquo;s unique workout features.</p>'),
(15, 9, 27, 'Zalora', ' Jeepers Peepers Silver Square', 'SG0002', 'M', 'Black', '#000000', 2, '20', 1000, 800, '', '1508854986.png', '1508854990.png', '', '', '', 'Active', '<p>A homage to everything vintage that gets you ga-ga in the limelight,  take into Jeepers Peepers shade for that retro cool statement. The 50''s  inspired JP0171 features a squared aviator silhouette with metal brow  bar to give your eyes a soothing perspective and bold</p>'),
(17, 4, 18, 'Zalora', 'aaaa', 'aa112', 'S', 'Black', '#000000', 4, '10', 1200, 1000, '', '1510657920.png', '1510657926.png', '', '', '', 'Active', '<p>aaaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `registration_manage`
--

CREATE TABLE `registration_manage` (
  `regid` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `email` varchar(66) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(11) NOT NULL,
  `spname` varchar(100) NOT NULL,
  `spemail` varchar(66) NOT NULL,
  `spphone` varchar(22) NOT NULL,
  `spaddress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_manage`
--

INSERT INTO `registration_manage` (`regid`, `name`, `email`, `phone`, `password`, `address`, `status`, `spname`, `spemail`, `spphone`, `spaddress`) VALUES
(2, 'mdmuhibullah', 'admin@gmail.com', '01940039139', '21232f297a57a5a743894a0e4a801fc3', 'dhaka', 'Active', 'mdmuhibullah', 'admin@gmail.com', '01940039139', 'dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `shoes_video`
--

CREATE TABLE `shoes_video` (
  `svid` int(11) NOT NULL,
  `embedcode` varchar(1000) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoes_video`
--

INSERT INTO `shoes_video` (`svid`, `embedcode`, `status`) VALUES
(2, 'https://www.youtube.com/embed/yuLi_HYoUpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `slide_manage`
--

CREATE TABLE `slide_manage` (
  `slId` int(11) NOT NULL,
  `type` varchar(44) NOT NULL,
  `sltitle` varchar(500) NOT NULL,
  `status` varchar(11) NOT NULL,
  `slideimage` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide_manage`
--

INSERT INTO `slide_manage` (`slId`, `type`, `sltitle`, `status`, `slideimage`) VALUES
(2, 'Home', 'Women''s dress', 'Active', '1503554387.png'),
(3, 'Home', 'Women''s dress', 'Active', '1503554374.png'),
(4, '', 'Women''s dress', 'Active', '1503554358.png'),
(5, '', 'Women''s dress', 'Active', '1503554341.png'),
(6, '', 'Women''s dress', 'Active', '1503554315.png'),
(8, 'Lingerie', 'Sport Bra', 'Active', '1508649504.png'),
(9, 'Lingerie', 'Pajamas', 'Active', '1508649648.png'),
(10, 'Lingerie', 'Sport Bra', 'Active', '1508649792.png'),
(11, 'Shoes', 'Shoes', 'Active', '1509176522.png'),
(12, 'Shoes', 'Shoes', 'Active', '1509176554.png'),
(13, 'Shoes', 'Shoes', 'Active', '1509251604.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_manage`
--

CREATE TABLE `sub_category_manage` (
  `subcatid` int(11) NOT NULL,
  `catid` varchar(11) NOT NULL,
  `subcatname` varchar(500) NOT NULL,
  `subcattitle` varchar(1000) NOT NULL,
  `subcatimage` longtext NOT NULL,
  `status` varchar(11) NOT NULL,
  `subcatposition` varchar(11) NOT NULL,
  `subcatdetails` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_manage`
--

INSERT INTO `sub_category_manage` (`subcatid`, `catid`, `subcatname`, `subcattitle`, `subcatimage`, `status`, `subcatposition`, `subcatdetails`) VALUES
(3, '1', 'Dresses', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1505281530.png', 'Active', 'Home 1', ''),
(4, '1', 'Shorts', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1505282013.jpg', 'Active', 'Home 2', ''),
(5, '1', 'Tops', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1505282206.jpg', 'Active', 'Home 5', ''),
(6, '2', 'Bras', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1505282471.jpg', 'Active', 'Home 6', ''),
(7, '2', 'Panties', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1505282608.jpg', 'Active', 'Home 7', ''),
(8, '5', 'Heels', 'British-inspired shoes designed for work, play and everything else.', '1509253743.png', 'Active', 'Shoes 1', '<p>British-inspired shoes designed for work, play and everything else. British-inspired shoes designed for work, play and everything else. British-inspired shoes designed for work, play and everything else.</p>'),
(9, '5', 'Flats Shoes', 'British-inspired shoes designed for work, play and everything else.', '1505283085.jpg', 'Active', 'Home 4', '<p>British-inspired shoes designed for work, play and everything else. British-inspired shoes designed for work, play and everything else. British-inspired shoes designed for work, play and everything else.</p>'),
(10, '3', 'Lipstick', 'A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.', '1508753413.png', 'Active', 'Cosmetics 3', '<p>A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.</p>'),
(11, '3', 'Makeup', 'A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.', '1508753750.PNG', 'Active', 'Cosmetics 1', '<p>A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.</p>'),
(12, '3', 'Lipcolour', 'A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.', '1508753663.gif', 'Active', 'Cosmetics 4', '<p>A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold. A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.</p>'),
(13, '3', 'Mascara', 'A lipstick in four hues, packaged in limited-edition silver glitter and champagne gold.', '1508753502.png', 'Active', 'Cosmetics 2', ''),
(14, '1', 'Skirts', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '', 'Active', '', ''),
(15, '1', 'Jeans', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1508752995.jpg', 'Active', 'Home 3', ''),
(16, '2', 'Pajamas', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1508578662.png', 'Active', 'Lingerie 1', ''),
(17, '2', 'Sport Bras', 'Bridesmaid Lace Yoke Dress with Embellished Waistband', '1508579584.png', 'Active', 'Lingerie 2', ''),
(18, '4', 'Wallets & Purses', 'Bagstationz Multi-Compartment Convertible Satchel', '', 'Active', '', ''),
(19, '4', 'Shopper Bags', 'Bagstationz Multi-Compartment Convertible Satchel', '', 'Active', '', ''),
(20, '4', 'Shoulder Bags', 'Bagstationz Multi-Compartment Convertible Satchel', '', 'Active', '', ''),
(21, '4', 'Top Handle', 'Bagstationz Multi-Compartment Convertible Satchel', '', 'Active', '', ''),
(22, '5', 'Sandals', 'British-inspired shoes designed for work, play and everything else.', '1509186131.png', 'Active', 'Shoes 3', ''),
(23, '5', 'Sports Shoes', 'British-inspired shoes designed for work, play and everything else.', '1509185981.png', 'Active', 'Shoes 2', ''),
(24, '9', 'Fashion Watches', 'Skagen Hald Connected Grey Smartwatch', '1505285478.jpg', 'Active', 'Home 8', ''),
(25, '9', 'Smart Watches', 'Skagen Hald Connected Grey Smartwatch', '', 'Active', '', ''),
(26, '9', 'Digital Watches', 'Skagen Hald Connected Grey Smartwatch', '', 'Active', '', ''),
(27, '9', ' Sunglasses', 'Skagen Hald Connected Grey Smartwatch', '', 'Active', '', ''),
(28, '3', 'Lip Gloss', 'Lip Gloss', '1508753830.PNG', 'Active', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_manage`
--
ALTER TABLE `admin_manage`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `basic_manage`
--
ALTER TABLE `basic_manage`
  ADD PRIMARY KEY (`bsId`);

--
-- Indexes for table `brands_manage`
--
ALTER TABLE `brands_manage`
  ADD PRIMARY KEY (`bndid`);

--
-- Indexes for table `category_manage`
--
ALTER TABLE `category_manage`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `content_manage`
--
ALTER TABLE `content_manage`
  ADD PRIMARY KEY (`contid`);

--
-- Indexes for table `customer_payment_information`
--
ALTER TABLE `customer_payment_information`
  ADD PRIMARY KEY (`cpinfoid`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`hmcontid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orddtlid`);

--
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`payinId`);

--
-- Indexes for table `products_manage`
--
ALTER TABLE `products_manage`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `registration_manage`
--
ALTER TABLE `registration_manage`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `shoes_video`
--
ALTER TABLE `shoes_video`
  ADD PRIMARY KEY (`svid`);

--
-- Indexes for table `slide_manage`
--
ALTER TABLE `slide_manage`
  ADD PRIMARY KEY (`slId`);

--
-- Indexes for table `sub_category_manage`
--
ALTER TABLE `sub_category_manage`
  ADD PRIMARY KEY (`subcatid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_manage`
--
ALTER TABLE `admin_manage`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `basic_manage`
--
ALTER TABLE `basic_manage`
  MODIFY `bsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands_manage`
--
ALTER TABLE `brands_manage`
  MODIFY `bndid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_manage`
--
ALTER TABLE `category_manage`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `content_manage`
--
ALTER TABLE `content_manage`
  MODIFY `contid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_payment_information`
--
ALTER TABLE `customer_payment_information`
  MODIFY `cpinfoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `hmcontid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orddtlid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `payinId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products_manage`
--
ALTER TABLE `products_manage`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `registration_manage`
--
ALTER TABLE `registration_manage`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shoes_video`
--
ALTER TABLE `shoes_video`
  MODIFY `svid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slide_manage`
--
ALTER TABLE `slide_manage`
  MODIFY `slId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sub_category_manage`
--
ALTER TABLE `sub_category_manage`
  MODIFY `subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
