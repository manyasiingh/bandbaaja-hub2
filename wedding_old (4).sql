-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 01:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_old`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `areareport`
-- (See below for the actual view)
--
CREATE TABLE `areareport` (
`area_id` int(10)
,`city_name` varchar(20)
,`area_name` varchar(20)
,`area_pincode` int(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `categoryreport`
-- (See below for the actual view)
--
CREATE TABLE `categoryreport` (
`category_id` int(10)
,`category_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `packagereport`
-- (See below for the actual view)
--
CREATE TABLE `packagereport` (
`package_id` int(10)
,`package_name` varchar(40)
,`package_price` int(8)
,`category_name` varchar(30)
,`vendor_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_contact_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_contact_no`) VALUES
(1, 'Sakshi Soni', 'sakshisoni779@gmail.com', 'ss1234', 8895652534),
(2, 'Janvi Bhojani', 'janvibhojani04@gmail.com', '@Janvi12', 6576589863),
(3, 'Dhrumil Vyas', 'vyasdhrumil47@gmail.com', '@Vyasvyas1', 6354595832);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `area_pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`city_id`, `area_id`, `area_name`, `area_pincode`) VALUES
(1, 1, 'Satellite', 380015),
(1, 2, 'C G Road', 380009),
(1, 3, 'Paldi', 380006),
(1, 4, 'Maninagar', 380050),
(1, 5, 'Sindhu Bhavan', 380059),
(2, 6, 'Dabholi', 395004),
(2, 7, 'Dumas', 394120),
(2, 8, 'Fort Songadh', 394670),
(2, 9, 'Athwa', 395007),
(2, 10, 'VIP Road', 395017),
(3, 11, 'Manjalpur', 390011),
(3, 12, 'New Sama', 390008),
(3, 13, 'Sayajigang', 390020),
(3, 14, 'Chhani', 391740),
(3, 15, 'Sevasi', 391101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(10) NOT NULL,
  `booking_name` varchar(20) NOT NULL,
  `booking_price` int(8) NOT NULL,
  `booking_status` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_name`, `booking_price`, `booking_status`, `user_id`, `category_id`, `booking_date`) VALUES
(1, 'Sakshi Soni', 0, 'Pending', 1, '5', '2023-03-28'),
(2, 'Janvi Bhojani', 0, 'Pending', 2, '56', '2023-04-07'),
(3, 'Shivam Nayi', 0, 'Pending', 2, '6', '2023-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Venue'),
(2, 'Decoration'),
(3, 'Catering'),
(4, 'Photography'),
(5, 'Makeup&Mehndi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(10) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Surat'),
(3, 'Baroda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(10) NOT NULL,
  `feedback_details` varchar(250) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_details`, `feedback_date`, `user_id`) VALUES
(1, 'Very Nice', '2023-04-06', 1),
(2, 'Awesome', '2023-04-14', 2),
(3, 'Wonderful service received', '2023-04-14', 3),
(4, 'Exellent service provided by realwed', '2023-04-15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(10) NOT NULL,
  `package_name` varchar(40) NOT NULL,
  `package_image` varchar(100) NOT NULL,
  `package_details` varchar(5000) NOT NULL,
  `package_price` int(8) NOT NULL,
  `category_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_image`, `package_details`, `package_price`, `category_id`, `vendor_id`) VALUES
(1, 'Premium Floral Decor', '36_1.jpeg', 'Mandap: Your mandap will set the tone for your Hindu wedding ceremony. You can choose minimalistic floral  mandaps . While there are so many options to choose from, one key decision is determining how many flowers you’d like. You can go for a heavy floral vibe or a more minimalistic mandap with only flowers on corners or certain spots.   Flowers: Indian wedding flowers can transform your decor, but they can also add up, especially if you are ordering flowers not in season or exotic flowers that need to be flown in. Often, couples will opt to mix fresh flowers with silk flowers, which look real and can be reused. Bilen recommends using silk flowers in areas that can not be touched. The other flowers like Rose,Mogra are also available.   Stage and dance floor: Whether you plan for a swing at the sangeet or a monogrammed or a printed designer stage at the reception, the last element is your stage decor and dance floor. Sometimes DJs will be able to supply your dance floor, so check with both the decorator and the DJ on their options. As a tip, make sure you include uplighting and larger pieces of decor, given how large the banquet hall or wedding venue in Houston might be.     Centerpieces: Your centerpieces will light up the tables are your sangeet, wedding ceremony and wedding reception. One  tip here is that if you have evening events, opt for more candles / lights and larger pieces that take up table space over lots of flowers. Secondly, if you are having lunch after the wedding ceremony, most people grab food and get out as quickly as they can to rest and get ready for the grand reception.', 100000, 2, 36),
(2, 'Traditional Theme Based Decor', 'd4.jpg', 'Theme based decorations are a modern concept for Indian weddings. This is currently one of the most popular ways of decorating Indian weddings. This is a maharaja theme decor where you have gorgeous carpet with flowers bouquet on the path leading to the stage.Traditional Indian wedding decorations are a popular choice for people who stay outside India. This wedding style gives a sense of home even when you are miles away from home', 90000, 2, 40),
(3, 'Premium', 'c1.jpg', 'North Indian/ Mughlai  --> Italian  -->  Chinese  -->  South Indian  -->  Garlic Free/ Onion Free   --> Live food counters -->   Chaat & Indian street food -->   Drinks (non-alcoholic)   -->  Deserts', 120000, 3, 18),
(4, 'All in one', 'c2.png', 'North Indian --> South Indian --> Chinese --> Italin --> Desserts --> Gujarati --> Rajasthani', 70000, 3, 24),
(5, 'The Traditional Package', 'p1.jpg', 'If you do not know which one to go for and are looking to have your loved ones surrounding you, you might want to consider the traditional package. The wedding photo albums tend to include many traditional shots with you and your partner posing, then posing with the family, the extended family, the friends, and so on.Since the photos are not spontaneous, voicing your opinion or communicating clearly with the photographer about your needs and wants is essential. This package can include two photographers depending on the number of hours of coverage. Often this type of package will include a pre-wedding photography session which gives you more time to take the best shots and focus on details.', 50000, 4, 4),
(6, 'Platinum Package', 'p2.avif', 'This wedding package option is great if your budget allows it as you can take all the time you want without rushing to capture this special day with all your loved ones. The package includes photography of the engagement, bridal and wedding day including of course the reception. Some elements from the packages such as the complimentary consultation, two photographers for the day, but now also include unlimited images from up to ten hours of coverage. Image the great photos you can take when everyone is dancing and letting loose and the photographers are still there to immortalize the moment without you having to worry about who has the camera and if they are taking a good shot or not. ', 45000, 4, 5),
(7, 'Videography Package', 'p3.jpg', 'Although an image is worth a thousand words, imagine what you can do with videos of your special day. To capture your father’s laugh, your mother’s shining eyes or the general atmosphere at the wedding hall or reception venue with a beautiful meaningful music as the backdrop can make a world of a difference. Over the last years, this package option has become very popular and the demand continues to grow. Similarly to edited photographs or with special effects, the same can be done and even more with a videography package, the choice is yours when it comes to how creative you want to get or what elements or mood you want to see stand out. The film coverage includes morning preparations, ceremony highlights, and the reception until dinner time. There is a pre-wedding consultation as well, and the footage will be edited to meet a limit between 45-90 minutes long. This type of package means that the footage is professionally edited at its highest standard because let’s be honest if you could film it with your iPhone and get the same effect, you wouldn’t pay so much for it.', 50000, 4, 1),
(8, 'HD Makeup', 'm1.jpg', 'High Definition makeup is usually seen on the big screen. The cameras easily capture fine lines and creases on the face. Layers of makeup can form these creases. Therefore HD makeup is a technique that hides fine lines and does not form any creases. The best part about this type of makeup is that it does not feel heavy or cakey. It also makes you look exceptionally natural in real and reel life. HD makeup keeps your skin looking fresh and luminous for hours.HD Makeup is the top-listed wedding makeup for an admirable Indian bridal look. Many celebrities and international professional makeup artists recommend HD makeup for your BIG day as it looks natural & classy.', 5000, 5, 16),
(9, 'Natural Minimal Makeup Look', 'm2.png', 'That’s where the natural minimal makeup look comes in. It makes use of a light base to give you an even skin tone. The subtle colours are used to highlight the facial features. This makeup type gives a perfect look to give you a natural radiant glow. The natural minimal makeup look makes you look flawless and ready for your big day.The word ‘natural’ is already giving glimpses that it will provide a flawless illusion of spotless skin. You get the perfect finish that creates a glamorous look. Enjoy your natural features on your BIG day with Natural Makeup.', 3500, 5, 15),
(10, 'Bridal Package', 'm3.jpg', 'They have the potential to transform you via their simple hard work and dedication. Her creative thought and outstanding fashion sense set her makeovers distinct by adding elegance and nobility to them.They have been providing a variety of services for a long time and understand the importance of your special day, making sure to showcase your beauty with full glitter and glamour. The items they use are of high quality and are gentle on the skin.  -->Bridal Makeup -->Airbrush Makeup -->Engagement Makeup -->Party Makeup -->Hair Styling -->Draping', 12000, 5, 12),
(11, 'Bridal Mehndi Package', 'me1.jfif', 'A mehandi or heena is a tradition and part of an Indian culture and wedding customs. We provide services like Jaipuri and Rajasthani Mehandi, Bridal Arabic Mehandi, Stylish and Heavy Mehandi to his bridal customers on their hands.', 7000, 5, 8),
(12, '3D Mehndi Package', 'me2.webp', 'Mehndi is an important part of our Indian culture. Especially, our Indian weddings are incomplete without mehndi designs on the hands of the bride. We are providing all types of mehandi like - marwari, Arabian, Rajasthani and 3-D also available', 10000, 5, 8),
(13, 'Unique Mehndi Package', 'm1.webp', 'Specialized in traditional and contempory mehndi designs.Brings you the most creative designs and make your memorable.Artists are specializes in all kinds of traditional and contemporary mehendi designs.', 9000, 5, 8),
(14, 'Dream Plan Package', '36_2.jpg', 'Swastik Decor Event is a wedding planning service based in ahmedabad. They work to change your dream event into reality with the best quality of work. Their team is professionally trained and has a huge expert who will work energetically to customise each stage setup as per your needs and anything and help couples to plan and build a successful and memorable event of their lives. Book Dream Decor Event now as they have a team of experts who are in the industry for several years because of their work and they make sure that the dream day is a perfect occasion that you experience.', 90000, 2, 36),
(15, 'Waterfall Decor Package', '36_3.jpg', 'A wedding is one of the most challenging tasks, which needs to be planned perfectly. You should choose Swastik decorators if you plan to have the wedding of your dreams. They have a repo for creating unique ideas for each wedding and making it a stress-free experience for their clients. this package provides you the decoration like waterfall design.', 70000, 2, 36),
(16, 'Light Decor Package', '40_2.webp', 'From a lighting design standpoint, uplighting is the first brush stroke in event design,” says event designer Brian Toner. “Done properly, it gives a sense of depth and background to your photos and videography.', 130000, 2, 40),
(17, 'Prime Rose Package', '40_3.jpg', 'It is a complete event and venue decor company, offering dependable decor solution. It provides its exceptional services, is fully capable of organising a luxurious and spectacular wedding decor, flawlessly and elegantly. They will ensure that your wedding venue looks marvellous and unique for each of your wedding-related ceremonies with the premium roses.', 85000, 2, 40),
(18, 'The Urban Package', '18_2.jpg', 'This tight-knit community of chefs and servers collaborate with one another in order to present you with the beautiful and mouth-watering meal of your dreams. We have worked extensively with wedding vendors in the area and can blend in seamlessly with the rest of your day-of team.  we provide services like:  -->Gujarati/North Indian -->Kathiyawadi', 85000, 3, 18),
(19, 'The Perfect Buffet', '18_3.jpg', ' Vegetarian only-->Chaat & Food Stalls-->South Indian-->North Indian/Mughlai-->Italian-->Maxican', 90000, 3, 18),
(20, 'Special Package', '24_2.jfif', 'They provide a wide range of services, including bartenders and other bar services for your convenience, service employees, crockery, glasses, presentations, and lighting for the food setup.They provide a wide variety of delectable cuisines, which will undoubtedly fill the air with irresistible fragrances. There are numerous cuisines available on their menu, including:  North Indian South Indian Chinese Desserts Bengali', 70000, 3, 24),
(21, 'The Fabulous Package', '24_3.jpg', 'We provides top-class service, crockery & cutlery.  Cuisines offered:  North Indian --> South Indian --> Chinese -->Japanese--> Italian -->Desserts--> Bengali--> Gujarati--> Rajasthani -->Drinks(non-alcoholic)', 100000, 3, 24),
(22, 'Basic Package', '4_2.jfif', 'Unedited Photographs & Video Footage in Client provided Harddisk. Travel Included in the Package', 50000, 4, 4),
(23, 'The Grand Package', '4_3.jpg', 'Pre-wedding Save the Date OR Post Wedding Shoot (Video & Photo) Bride Pre-Wedding Eve and Groom Pre Wedding Eve OR Post Wedding Reception Included. 2 Photography & 2 HD Video Team (Including Candid Photography & Candid/ Stedicam/ Slidercam Video on Wedding Day) Two 30 Leaf/ 60 Page (12 “x 15 “) Creative Design Magazine Album - 1 for Groom & 1 for Bride (Combination of Scuff Free Velvet /Silky Matt Paper + Silver Metallic Paper)', 65000, 4, 4),
(24, 'The Luxury Package', '5_2.jfif', '2 Photographers on Wedding Day 9 Hours of Wedding Day Coverage Bridal Portraits 800+ Retouched Photos & In-Studio Reveal Session 2 – 11×14 Canvas Prints 1 – 20 Page – Choice of Standard or Deluxe Wedding Album 1 – USB Thumb Drive containing Photos Print Release', 70000, 4, 5),
(25, 'The Classic Package', '5_3.jpg', '2 Photographers on Wedding Day 10 Hours of Wedding Day Coverage Bridal Portraits All Retouched Photos 4 – 11×14 Canvas Prints 4 – 8×10 Canvas Prints 10 – 8×10 Archival Prints 10 – 5×7 Archival Prints 2 – 20 Page Wedding Albums 1 – Proof Box with 4×6 Prints of All Photos', 55000, 4, 5),
(26, 'The Ultimate Package', '1_2.jfif', 'Approximately 2000+ Raw Hi-res images on Custom Pen-Drive ∙ 2 Photographers 2 Cinematographers   Elite Series 50 Pages (Two Photo book) 12 X 18 Up to 4 Days of Coverage Complimentary Pre-Wedding shoot 3-4min Cinematic Teaser 45min-1Hours Long Cut Video Edited 10-20pic for Facebook Images  Soft Copies within a week  Drone Service for Single Day 25% Flat off on additional Services For Price Contact details', 50000, 4, 1),
(27, 'The Bronze Package', '1_3.jpg', 'Approximately 1000+ Raw Hi-res images on Custom Pen-Drive 2 Photographers 2 Cinematographers  Premium Series 50 Pages (One Photo book) 12 X 18  Up to 3 Days of Coverage  Complimentary Pre-Wedding shoot (only Still)  3-4min Cinematic Teaser  45min-1Hours Long Cut Video  Edited 10-20pic for Facebook Images  Soft Copies within a week  15% Flat off on additional Services ∙ For Price Contact details', 52000, 4, 1),
(28, 'Shade Makeup Package', '16_2.jpeg', 'This is the traditional form of makeup and comes in various forms such as cream, powder, liquid and more. It is versatile in nature and can be applied using fingers, brushes, beauty blenders and makeup sponges. It can be used to conceal imperfections, create a contouring effect or a dewy/matte finish and can be used for light to full coverage.  Suitable for - All skin types (dependent on the formulations used)', 4000, 5, 16),
(29, 'Mineral Makeup', '16_3.jpg', 'While most makeup formulations contain minerals in varying levels, these formulations are compressed, fine powders - often without wax or oil additives. Termed as organic and natural, this form of bridal makeup is advised for women with sensitive skin. Mineral makeup is highly pigmented and can be built up from a sheer to complete coverage. Depending on what you want your final look to be like, you can have a word with your makeup artist in advance.   Suitable for - Low-key events', 3600, 5, 16),
(30, 'MAC makeup Package', '15_2.jfif', 'MAC makeup products are created with light-scattering ingredients, to ensure an even look that looks great in photos and videos. If HD bridal makeup package was on your to-do-list then find a makeup artist who specialises in this type of makeup and hires her for your wedding day.   Suitable - All skin types', 5500, 5, 15),
(31, 'Airbrush Makeup', '15_3.webp', 'This can be full coverage or light based on your preference and is ideal for red-carpet events. If this is the bridal makeup package that you were longing for since long, then go ahead and hit a salon that offers it to you at feasible rates! You will surely glow like a princess when you go out with this look.  Suitable for - Oily skin, outdoors', 6000, 5, 15),
(32, 'Silver Makeup Package', '12_2.jpg', 'Services : tickMakeup tickHair (Straightening/Curls/Blow Dry) close Draping close Lashes close Nail Polish Artist Experience : 2 yrs+ Products : Mac, Kryolan and similar brands', 6500, 5, 12),
(33, 'Diamond Makeup Package', '12_3.jpg', 'Services : tickMakeup tickHair (Buns/Braids/Any Hairstyle) tickDraping tickLashes tickNail Polish Artist Experience : 6 yrs+ Products : Chanel, Dior, Smashbox and similar brands  8,000 /person', 7000, 5, 12),
(34, 'Floral Vines Mehndi Package', '9_1.jpg', 'We try to keep it really nominal with our bridal mehndi packages, in order to offer the value of money to every bride-to-be. Traditional henna design without figures costs INR 7,100 onwards, which covers hands till elbow and on feet till ankle. You can make it personalised with your fiance’s portrait on your hands on any other specific portrait with an added cost of approx. INR 2,000 per pair (solely depending on design).', 7500, 5, 9),
(35, 'Modern Mehndi Package', '9_2.jpeg', 'After lotuses, roses are taking over mehndi designs and how! Rose mehndi designs are delicate and so beautiful, allowing brides to include them in small parts as well as statement rose mehandi designs. We love how there are different styles of rose mehndi designs that can be the best mehndi design for bridal!', 8000, 5, 9),
(36, 'Symmetrical Mehndi Package', '9_3.avif', 'For brides who are perfectionists, nothing can make you happier than symmetrical mehandi designs. Do let your bridal mehendi artist know beforehand if you are looking for this specific symmetrical best mehndi designs so that they have the designed pre-planned!', 8500, 5, 9),
(37, 'Full Mehndi Package', '10_2.webp', 'This is a new and trending style of mehndi designs where you let the mehendi stain be a major part of your mehandi designs. This not only gives your hands a glorious colour but also reduces the application time as the rest of the design is usually simple!', 3000, 5, 10),
(38, 'Two Tone Mehndi Package', '10_3.webp', 'Another new trending and best mehndi designs for bride is the dual tone or two tone mehendi. Here your mehendi is applied in two different intervals so that the mehendi colour is in two different shades. Love the idea and the glorious result!', 3000, 5, 10),
(39, 'Colorful Mehndi Package', '10_1.jpg', 'Colorful henna and mehndi designs are gaining a lot of attention from the young girls as they add more beauty. The glitter, shimmer and the colorful patterns in henna and mehndi application are all ones need, when one is attending relatives or friends special events.', 2500, 5, 10),
(40, 'Baraat & Figurines Mehndi Package', '11_1.webp', 'For brides who like elaborate and intricate work, there is nothing quite like a full blown baraat design showcased on your arm- they have been trending since forever to now in 2021. From beautiful palki motifs to bride and groom garlands and even the baraat procession, this one is fit for a queen . Also costs the most expensive and is the most time consuming design to make.', 4500, 5, 11),
(41, 'Bride and Groom Figurines Package', '11_2.webp', 'Bride and groom figurines got a makeover, as the mehandi designs featuring a couple is no more just about them facing each other! Extra attention is paid to details like the brides hairstyle, lehenga or the grooms safa, sherwani and more!', 6000, 5, 11),
(42, 'A Full Wedding Day Sequence Package', '11_3.webp', 'Instead of just getting the baraat sequence drawn, brides these days are going extra and opting for the entire wedding sequence for their mehndi design. Right from baraat to jai mala, to mandap rituals and finally the vidaai is being depicted in this design.', 4000, 5, 11),
(43, 'Drown Photography', '7_1.jpg.crdownload', 'Our drone aerial filming services enable you to capture professionally stabilised footage from a unique vantage point in HD, 4K, 5.2K, and 8K resolutions. Our experienced and trained aerial cinematography crew can capture everything from breathtaking scenery flyovers to low, quick, tracking action shots. We offer a range of equipment to meet the requirements of every drone video project, from compact action cameras to cinematic camera drone and gimbal bundles.', 70000, 4, 7),
(44, 'Full Day Coverage', '7_2.jpg', 'Our valuable clients can avail from us premium quality Vansh Vision. This service is performed as per the requirements of our precious clients. The provided service is highly appreciated by our clients owing to its hassle free execution and cost-effectiveness features. This service is carried out by our highly qualified professionals using excellent grade tools and modern technology. The offered service is executed within a scheduled time-frame. Further, clients can avail this service from us at nominal price.', 90000, 4, 7),
(45, 'Standard Package', '7_3.webp', ' Vansh Vision is a popular wedding photography and cinema brand operating from Ahmedabad. Ankit is a budding and talented photographer who has been working in the industry as a wedding photographer .', 30000, 4, 7),
(46, 'Candid Photography Package', '6_1.jpg', ' Parkash Photoworld has made Professional Photography service this easy to access. Does not matter if you want multiple shoots at a time or multiple locations at a time. We are present across 135 International destinations with multiple teams at every location', 35000, 4, 6),
(47, 'Premium Photography Package', '6_2.jpeg', 'The provided service is highly appreciated by our clients owing to its hassle free execution and cost-effectiveness features. This service is carried out by our highly qualified professionals using excellent grade tools and modern technology. The offered service is executed within a scheduled time-frame. Further, clients can avail this service from us at nominal price.', 45000, 4, 6),
(48, 'Diamond Package', '6_3.webp', 'he raw emotions behind the holy matrimony. Also offering Videography and pre-wedding shoots, Parkash Photoworld is a one-stop solution for covering your entire wedding celebrations.', 32000, 4, 6),
(49, 'Basic Package', '2_1.jpg', ' One Hour Session 25 Edited Pictures one location photo album one 5 X 7 print online access', 30000, 4, 3),
(50, 'Medium  Package', '2_2.webp', 'Two Hours Session 50 Edited Pictures 10 Location Photo Album  100 5×7 Prints Online Access', 26000, 4, 3),
(51, 'Exclusive Package', '2_3.webp', '8 Hours Coverage  Bridal Session  250 photos On Disc 200 8×10 Prints Photo Album Canvas Print Online Access', 42000, 4, 3),
(52, 'Package 1', '3_1.jpg', 'This wedding package option is great if your budget allows it as you can take all the time you want without rushing to capture this special day with all your loved ones. The package includes photography of the engagement, bridal and wedding day including of course the reception. Some elements from the packages such as the complimentary consultation, two photographers for the day, but now also include unlimited images from up to ten hours of coverage. Image the great photos you can take when everyone is dancing and letting loose and the photographers are still there to immortalize the moment without you having to worry about who has the camera and if they are taking a good shot or not. ', 30000, 4, 2),
(53, 'Package 2', '3_2.jpg', 'Although an image is worth a thousand words, imagine what you can do with videos of your special day. To capture your father’s laugh, your mother’s shining eyes or the general atmosphere at the wedding hall or reception venue with a beautiful meaningful music as the backdrop can make a world of a difference. Over the last years, this package option has become very popular and the demand continues to grow. Similarly to edited photographs or with special effects, the same can be done and even more with a videography package, the choice is yours when it comes to how creative you want to get or what elements or mood you want to see stand out. The film coverage includes morning preparations, ceremony highlights, and the reception until dinner time. There is a pre-wedding consultation as well, and the footage will be edited to meet a limit between 45-90 minutes long. This type of package means that the footage is professionally edited at its highest standard because let’s be honest if you could film it with your iPhone and get the same effect, you would not pay so much for it.', 40000, 4, 2),
(54, 'Package 3', '3_3.avif', 'If you do not know which one to go for and are looking to have your loved ones surrounding you, you might want to consider the traditional package. The wedding photo albums tend to include many traditional shots with you and your partner posing, then posing with the family, the extended family, the friends, and so on.Since the photos are not spontaneous, voicing your opinion or communicating clearly with the photographer about your needs and wants is essential. This package can include two photographers depending on the number of hours of coverage. Often this type of package will include a pre-wedding photography session which gives you more time to take the best shots and focus on details.', 50000, 4, 2),
(55, 'Glamorous Package', '13_1.jpg', ' Riddhima Makeover is a cosmetics craftsman who gives wedding makeup services to all the bride pit there. Your wedding is a standout amongst the most imperative days of your life and you require everything to be immaculate and impeccable on the grounds that the recollections of this day are conveyed forward for a long time. They would strive to make you look stunning as you stroll down the passageway', 6000, 5, 13),
(56, 'Basic Venue Package', 'venue_6.jpeg', 'Equipped with world-class facilities, the venue is spacious and comfortable. They offer complete event support for all your nuptial ceremonies and events. With their class apart services, you are ensured that every experience with them is unique, every time. This venue is an ideal choice for your wedding as it can hold lavish as well as a simple and subtle wedding. Vibrant and progressive, Jade Garden retains the warmth and spirit of India while offering a grand hall. The services go far above and beyond the conventional venue and catering staples. All these services would be customized according to your demands, needs, and budget', 80000, 1, 29),
(57, 'Grand Venue Package', 'venue_9.jpg', 'Grand Spree Banquet boasts a lovely banquet hall and lush green lawns that can comfortably hold 100–400 guests in the rooms and 800–1000 guests on the lawn at a time. All of your pre- and post-wedding events can be held there because they offer plenty of seating and roomy inside space. To ensure that your celebrations do not stop at all and that you can fully enjoy the biggest night of your life, they offer you amenities like basic electricity and lighting with a full power backup. This allows you to sit back and relax without worrying about power outages.Services Offered : Bridal dressing room Parking area Valet parking Service staff In-house catering In-house decoration team Outside DJ Guest accommodations', 300000, 1, 30),
(58, 'Luxurious Venue Package', 'venue_4.jpg', 'Equipped with world-class facilities, the venue is spacious and comfortable. They offer complete event support for all your nuptial ceremonies and events. With their class apart services, you are ensured that every experience with them is unique, every time. This venue is an ideal choice for your wedding as it can hold lavish as well as a simple and subtle wedding. Vibrant and progressive, Jade Garden retains the warmth and spirit of India while offering a grand hall. The services go far above and beyond the conventional venue and catering staples. All these services would be customized according to your demands, needs, and budget Services Offered: Inhouse catering only Inhouse decor In house alcohol not available Outside alcohol not permitted In house DJ available Outside DJ not permitted', 300000, 1, 32),
(60, 'Elegant Venue Package', 'venue_3.png', 'Space and facilities available: It is a place that can successfully host between 200 and 250 guests in their hall and 5000–7000 guests on their lawn. It will be much simpler for you to host your guests and to arrange for multiple ceremonies to take place simultaneously at the venue because they have a variety of spaces to offer you, and because all of the services are available there. You can host your celebrations outdoors on their well-kept lawns and in the lush, leafy areas that are spread throughout the property. After the wedding festivities are over, they also provide a staff of guest accommodations where you can relax.Parking Area Outside and in-house catering only Decorators from panel only In-house Dj available No alcohol available Guest accommodation Bridal room', 275000, 1, 31),
(65, 'abc', '3_3.avif', 'ndfvfd', 5000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `payment_amount` int(8) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `payment_details` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `booking_id`, `payment_amount`, `payment_mode`, `payment_details`) VALUES
(1, 1, 120000, 'UPI', 'UPI'),
(2, 2, 50000, 'UPI', 'UPI'),
(3, 3, 80000, 'UPI', 'UPI'),
(7, 25, 100000, 'UPI', 'UPI'),
(8, 26, 45000, 'UPI', 'UPI'),
(9, 27, 130000, 'UPI', 'UPI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_gender` text NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_address` text NOT NULL,
  `user_date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_email`, `user_password`, `user_address`, `user_date_of_birth`) VALUES
(1, 'Sakshi Soni', 'Female', 'sakshisoni779@gmail.com', 'sakshi2704', 'Ahmedabad', '2003-04-27'),
(2, 'Shivam Nayi', 'Male', 'shivamnayi1181@gmail.com', 'Shiv@1181', 'Chandkheda', '2003-06-21'),
(3, 'Janvi Bhojani', 'Female', 'janvi1234@gmail.com', 'janvi0412', 'Himmatnagar', '2002-12-04'),
(4, 'Darshi Shah', 'Female', 'dshah21@gmail.com', 'darshi1234', 'Maninagar', '2022-09-22'),
(5, 'Parth Patadiya', 'Male', 'parth2911@gmail.com', 'parth2911', 'Shastrinagar', '2002-11-29'),
(6, 'Hirva Solanki', 'Female', 'hirva29@gmail.com', 'hirr3456', 'Satellite', '2002-11-25'),
(7, 'Vyas Dhrumil', 'Male', 'vyasdhrumil47@gmail.com', 'vyas1234', 'Ashram Road', '2003-04-28'),
(8, 'Nirali Thakkar', 'Female', 'nirali45@gmail.com', 'nirali1234', 'Maninagar', '2002-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendor_name` varchar(20) NOT NULL,
  `vendor_contact_no` bigint(10) NOT NULL,
  `vendor_email` varchar(30) NOT NULL,
  `vendor_password` varchar(10) NOT NULL,
  `vendor_image` varchar(100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `city_id` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendor_name`, `vendor_contact_no`, `vendor_email`, `vendor_password`, `vendor_image`, `category_id`, `city_id`) VALUES
(1, 'Darshan Studio', 9875367389, 'darshanstudio12@gmail.com', '123456', 'pexels-jinto-mathew-11146331.jpg', 4, 2),
(2, 'JP Photography', 9867357483, 'jpstudio2003@gmail.com', '654321', 'pexels-varun-5759215.jpg', 4, 2),
(3, 'Sai Digital Studio', 9876573671, 'saiphotohub34@gmail.com', '123123', 'photography.jpg', 4, 1),
(4, 'Studio Arva', 9676146289, 'arvagraphy781@gmail.com', '098765', 'pexels-the-shaan-photography-7184081.jpg', 4, 1),
(5, 'Keyur Click', 9122356734, 'keyurptl23@gmail.com', '1239078', 'pexels-nghia-trinh-931796.jpg', 4, 1),
(6, 'Parkash Photoworld', 9427653566, 'pkphotohub09@gmail.com', '987522', 'pexels-unique-click-by-sonam-singh-6543940.jpg', 4, 1),
(7, 'Vansh Vision', 9156789045, 'vanshptl005@gmail.com', 'vansh$679', 'shoam.jpg', 4, 1),
(8, 'Priya Mehndi', 6353126039, 'priya1234@gmail.com', 'priya$34', '9_1.jpg', 5, 1),
(9, 'Friza Mehndi', 9345689675, 'frizamehndi30@gmail.com', 'friza4567', 'pexels-baljit-johal-6387627.jpg', 5, 1),
(12, 'Hunny Bunny Makeover', 6789456782, 'makeover4568@gmail.com', 'make%6789', 'mk1.jpg', 5, 1),
(13, 'Riddhima Makeovers', 9087578543, 'riddhimamake@gmail.com', 'rids#890', 'mk2.jpg', 5, 1),
(14, 'Lukash Beauty', 8957437890, 'lukash789@gmail.com', 'luk__5467', 'mk3.jpg', 5, 1),
(15, 'Expert Makeover', 8903456723, 'expertmakeover@gmail.com', 'expert&334', 'mk4.jpg', 5, 1),
(16, 'Pristine Beauty', 6545980678, 'pristine555@gmail.com', '999999', 'mk5.jpg', 5, 1),
(17, 'Blossom Beauty', 9045634569, 'bloosmaob@gmail.com', 'blom@9090', 'mk6.jpg', 5, 1),
(18, 'SS Caterers', 9056456378, 'sscateres@gmail.com', 'cat__234', 'ca1.jpg', 3, 1),
(19, 'Amarat Event', 9034567867, 'amarat9090@gmail.com', '99999', 'ca2.jpg', 3, 1),
(20, 'Mahalaxmi Cateres', 6355580395, 'mahalaxmi67@gmail.com', 'mahalaxmi&', 'ca3.jpg', 3, 1),
(21, 'Shree Ram Caterers', 9067845678, 'shreeram@gmail.com', '8888888', 'ca4.jpg', 3, 1),
(22, 'Lalit Event', 9427489067, 'lalithub67@gmail.com', 'lalit$56', 'ca5.jpg', 3, 1),
(23, 'Nakalang Catering', 9328123900, 'nakalangcat@gmail.com', 'maklang**3', 'ca6.jpg', 3, 1),
(24, 'Catering Corner', 9199568956, 'cateringcorn89@gmail.com', '89067890', 'ca7.jpg', 3, 1),
(25, 'Kalyani Events', 9963456789, 'kalyani5678@gamil.com', '909809090', 'ca8.jpg', 3, 1),
(26, 'Shubha Catering', 9967895678, 'subhajain@gmail.com', 'shubha5678', 'ca9.jpg', 3, 1),
(27, 'Avani caterers', 9900764567, 'avanikadiya@gmail.com', '9045634657', 'ca10.jpg', 3, 1),
(28, 'Hotel German Plaza', 7890456345, 'plazagerman@gmail.com', 'german7890', 'V1.jpg', 1, 1),
(29, 'Sankalp party plot', 9913799787, 'sankalp8978@gmail.com', '8909090', 'v2.jpg', 1, 1),
(30, 'Grand Spree Banquet', 8067553490, 'speeehotel@gmail.com', 'boot$000', 'v3.jpg', 1, 1),
(31, 'Kanj Haveli Resort', 9100567588, 'kanjhaveli8945@gmail.com', 'kanjhaveli', 'v4.jpeg', 1, 1),
(32, 'GreenWoods Lake Reso', 7789454790, 'greenwoods563@gmail.com', 'green8899', 'v5.jpg', 1, 1),
(33, 'Serene Resort', 7889905678, 'serene56jan@gmail.com', '7777', 'v6.jpg', 1, 1),
(34, 'PalmGreens Resort', 9090667464, 'plamgreenresort00@gmail.com', '4354556', 'v7.jpg', 1, 1),
(35, 'KensVille ', 9876543210, 'kensvilla6788@gmail.com', '9977', 'v8.jpg', 1, 1),
(36, 'Swastik Decorators', 9067563423, 'swastikdecorats4590@gmail.com', '9090909090', 'V1.jpg', 2, 1),
(37, 'Utsav Decor', 9067453456, 'utsavdecors0000@gmail.com', '777777', 'v2.jpg', 2, 1),
(38, 'The Heaven Events', 9068456798, 'theheaven78@gmail.com', '99999999', 'v3.jpg', 2, 1),
(39, 'Param Decoration', 9432456789, 'paramptl11@gmail.com', 'param@3345', 'v4.jpeg', 2, 1),
(40, 'VR Light Decoration', 6778456789, 'nilesh4567@gmail.com', '888856', 'v5.jpg', 2, 1),
(41, 'Seven Star Managemen', 9056459900, 'sevenstarmanage56@gmail.com', 'seven7777', 'v6.jpg', 2, 1),
(42, 'Pooja Flower', 6799004547, 'poojaflower8888@gmail.com', '888888', 'v7.jpg', 2, 1),
(43, 'Celebrite Events', 9188954321, 'minal5678@gmail.com', 'minal@2004', 'v8.jpg', 2, 1),
(51, 'Sakshi Soni', 132688, 'sakshisoni779@gmail.com', 's123445', '', 1, 1),
(52, 'Sakshi Soni', 132688, 'sakshisoni779@gmail.com', 'ss2345', '', 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userreport`
-- (See below for the actual view)
--
CREATE TABLE `userreport` (
`user_id` int(10)
,`user_name` varchar(20)
,`user_gender` text
,`user_address` text
,`user_date_of_birth` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vendorreport`
-- (See below for the actual view)
--
CREATE TABLE `vendorreport` (
`vendor_id` int(10)
,`vendor_name` varchar(20)
,`category_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `areareport`
--
DROP TABLE IF EXISTS `areareport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `areareport`  AS SELECT `tbl_area`.`area_id` AS `area_id`, `tbl_city`.`city_name` AS `city_name`, `tbl_area`.`area_name` AS `area_name`, `tbl_area`.`area_pincode` AS `area_pincode` FROM (`tbl_area` join `tbl_city` on(`tbl_area`.`city_id` = `tbl_city`.`city_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `categoryreport`
--
DROP TABLE IF EXISTS `categoryreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoryreport`  AS SELECT `tbl_category`.`category_id` AS `category_id`, `tbl_category`.`category_name` AS `category_name` FROM `tbl_category``tbl_category`  ;

-- --------------------------------------------------------

--
-- Structure for view `packagereport`
--
DROP TABLE IF EXISTS `packagereport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `packagereport`  AS SELECT `tbl_package`.`package_id` AS `package_id`, `tbl_package`.`package_name` AS `package_name`, `tbl_package`.`package_price` AS `package_price`, `tbl_category`.`category_name` AS `category_name`, `tbl_vendor`.`vendor_name` AS `vendor_name` FROM ((`tbl_package` join `tbl_category` on(`tbl_package`.`category_id` = `tbl_category`.`category_id`)) join `tbl_vendor` on(`tbl_package`.`vendor_id` = `tbl_vendor`.`vendor_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `userreport`
--
DROP TABLE IF EXISTS `userreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userreport`  AS SELECT `tbl_user`.`user_id` AS `user_id`, `tbl_user`.`user_name` AS `user_name`, `tbl_user`.`user_gender` AS `user_gender`, `tbl_user`.`user_address` AS `user_address`, `tbl_user`.`user_date_of_birth` AS `user_date_of_birth` FROM `tbl_user``tbl_user`  ;

-- --------------------------------------------------------

--
-- Structure for view `vendorreport`
--
DROP TABLE IF EXISTS `vendorreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vendorreport`  AS SELECT `tbl_vendor`.`vendor_id` AS `vendor_id`, `tbl_vendor`.`vendor_name` AS `vendor_name`, `tbl_category`.`category_name` AS `category_name` FROM (`tbl_vendor` join `tbl_category` on(`tbl_vendor`.`category_id` = `tbl_category`.`category_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_password` (`admin_password`),
  ADD UNIQUE KEY `admin_contact_no` (`admin_contact_no`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
