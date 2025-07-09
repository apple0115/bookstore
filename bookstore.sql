-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-01-16 17:54:30
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bookstore`
--

-- --------------------------------------------------------

--
-- 資料表結構 `books`
--

CREATE TABLE `books` (
  `bId` char(7) NOT NULL,
  `bName` varchar(30) NOT NULL,
  `category` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `books`
--

INSERT INTO `books` (`bId`, `bName`, `category`, `price`, `quantity`) VALUES
('B001', '原子習慣', '心理', 260, 37),
('B002', '職業棒球 12月號/2024 第513期', '運動競技', 170, 36),
('B003', '美好結局 全', '小說', 160, 37),
('B004', '張忠謀自傳全集', '人物傳記', 1800, 37),
('B005', '有錢人想的和你不一樣', '商業理財', 250, 37),
('B006', '米斯托尼亞的翅望 -The Lost D', '遊戲', 3990, 37),
('B007', '世界上最透明的故事', '懸疑推理', 360, 37),
('B008', '新制多益TOEIC聽力／閱讀題庫解', '語言學習', 1760, 37),
('B009', '城與不確定的牆', '文學小說', 680, 37),
('B010', '光影交織的葡萄牙速寫之旅', '旅遊', 450, 37),
('B011', '特殊清掃人', '懸疑推理', 355, 37),
('B012', '借貓的眼睛看一看', '文學小說', 284, 37),
('B013', '追火車的日子', '旅遊', 765, 36),
('B014', '同行二人．四國遍路', '旅遊', 379, 37),
('B015', '迪化街食家的早餐物語', '飲食', 395, 37),
('B016', '夢想糖果店', '飲食', 379, 37),
('B017', '莓果甜點聖經', '飲食', 423, 37),
('B018', '名店精選 美味拉麵調理技術', '飲食', 369, 37),
('B019', 'C++物件導向程式設計實務與進階活用技術', '電腦資訊', 504, 37),
('B020', 'SQL × Power Automate', '電腦資訊', 455, 37),
('B021', 'Office 365商務應用必學的16堂', '電腦資訊', 340, 37),
('B022', 'CI/CD安全防護大揭密', '電腦資訊', 476, 37),
('B023', '我的第一本韓語學習書', '語言學習', 299, 37),
('B024', 'GEPT全民英檢初級聽力測驗初試', '語言學習', 279, 37),
('B025', '老外常說口頭語流行時髦的英文', '語言學習', 189, 37),
('B026', '完全命中托福必考單字', '語言學習', 279, 37),
('B027', '不生氣之後，變身有錢人+看漫畫學致富', '商業理財', 450, 37),
('B028', '後設思考：養成「聰明人」的思考法', '商業理財', 266, 37),
('B029', '練習呵護自己的心(雙冊套書)', '心理勵志', 517, 37),
('B030', '妥協只是周全討好，不會讓你人生更好', '心理勵志', 210, 37),
('B031', '與低潮共處也是一種堅強', '心理勵志', 300, 38),
('B032', '自卑與超越：生命對你意味著什麼', '心理勵志', 315, 39),
('B033', '為什麼我們越愛越焦慮', '心理勵志', 432, 38),
('B034', '我可能錯了：森林智者的最後一堂人生課', '心理勵志', 355, 35),
('B035', '泰勒絲：聽她訴說歌曲背後的故事', '藝術設計', 521, 37),
('B036', '在建築中發現夢想：安藤忠雄的建築原點', '藝術設計', 300, 37),
('B037', '學校場景 精準描繪教本', '藝術設計', 462, 37),
('B038', '20年全職畫家寫給創作者的事業指南', '藝術設計', 379, 39),
('B039', '日本繪師到我家：跟著影片畫，解鎖人物卡關！', '藝術設計', 458, 38),
('B040', '最後的夢：阿莫多瓦的自傳式故事集', '藝術設計', 379, 38),
('B041', '骨科如何正確診斷背痛與肢體麻痛', '醫療保健', 252, 38),
('B042', '不可思議的醫學冷知識', '醫療保健', 379, 40),
('B043', '日本名醫教你飲酒的科學', '醫療保健', 300, 37),
('B044', '一位精神科醫師的成長筆記', '醫療保健', 300, 37),
('B045', '傷獸之島：我當野生動物獸醫師的日子', '自然科普', 300, 37),
('B046', '命定：沒有自由意志的科學', '自然科普', 568, 40),
('B047', '中研院的25堂數理科學課', '自然科普', 442, 37),
('B048', '太空人都在做什麼？', '自然科普', 331, 37),
('B049', '從沒救到得救的大坦誠成長記', '親子教養', 331, 37),
('B50', '家有青少年的親子相處指南', '親子教養', 284, 37);

-- --------------------------------------------------------

--
-- 資料表結構 `cdetail`
--

CREATE TABLE `cdetail` (
  `cdId` char(7) NOT NULL,
  `cId` char(7) NOT NULL,
  `bId` char(7) NOT NULL,
  `cQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `cdetail`
--

INSERT INTO `cdetail` (`cdId`, `cId`, `bId`, `cQuantity`) VALUES
('cd001', 'c001', 'B001', 2),
('cd002', 'c002', 'B003', 2),
('cd003', 'c002', 'B004', 3),
('cd004', 'c002', 'B011', 1),
('cd005', 'c001', 'B002', 1),
('cd007', 'c003', 'B002', 1),
('cd008', 'c003', 'B003', 2),
('cd009', 'c003', 'B004', 3),
('cd010', 'c003', 'B011', 1),
('cd011', 'c004', 'B022', 1),
('cd012', 'c005', 'B033', 1),
('cd013', 'c005', 'B045', 2),
('cd014', 'c006', 'B007', 3),
('cd015', 'c007', 'B033', 1),
('cd016', 'c007', 'B013', 1),
('cd017', 'c007', 'B034', 2),
('cd018', 'c008', 'B027', 3),
('cd019', 'c008', 'B024', 1),
('cd020', 'c009', 'B032', 1),
('cd021', 'c010', 'B023', 1),
('cd022', 'c010', 'B043', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `customerorders`
--

CREATE TABLE `customerorders` (
  `cId` char(10) NOT NULL,
  `cName` varchar(10) NOT NULL,
  `cTotal` decimal(10,0) NOT NULL,
  `cStatus` varchar(10) NOT NULL,
  `cDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `customerorders`
--

INSERT INTO `customerorders` (`cId`, `cName`, `cTotal`, `cStatus`, `cDate`) VALUES
('C001', '姚子嘉', 260, '已出貨', '2025-01-01 10:24:34'),
('C002', '張惠澤', 568, '已出貨', '2025-01-01 10:34:04'),
('C003', '曾弈志', 360, '已出貨', '2025-01-01 11:08:54'),
('C004', '馬宣似', 765, '已出貨', '2025-01-01 11:28:34'),
('C005', '連子森', 1360, '已出貨', '2025-01-01 12:15:47'),
('C006', '池婷睎', 1551, '處理中', '2025-01-01 12:32:27'),
('C007', '翁諭辰', 3990, '處理中', '2025-01-01 14:21:53'),
('C008', '黄芳磬', 758, '處理中', '2025-01-01 15:41:23'),
('C009', '沈也恩', 2130, '處理中', '2025-01-02 12:26:14'),
('C010', '萬詩玲', 340, '處理中', '2025-01-02 12:27:14');

-- --------------------------------------------------------

--
-- 資料表結構 `employees`
--

CREATE TABLE `employees` (
  `eId` varchar(7) NOT NULL,
  `eName` varchar(5) NOT NULL,
  `ePassword` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `employees`
--

INSERT INTO `employees` (`eId`, `eName`, `ePassword`) VALUES
('E001', '余佳蓁', '1234'),
('E002', '江昀慧', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `idetail`
--

CREATE TABLE `idetail` (
  `idId` char(7) NOT NULL,
  `iId` char(7) NOT NULL,
  `bId` char(7) NOT NULL,
  `iQuantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `idetail`
--

INSERT INTO `idetail` (`idId`, `iId`, `bId`, `iQuantity`) VALUES
('id001', 'i001', 'B001', 2),
('id002', 'i001', 'B046', 3),
('id003', 'i002', 'B033', 2),
('id004', 'i002', 'B031', 1),
('id005', 'i002', 'B032', 2),
('id006', 'i003', 'B035', 3),
('id007', 'i003', 'B036', 1),
('id008', 'i004', 'B037', 3),
('id009', 'i005', 'B038', 2),
('id010', 'i005', 'B039', 1),
('id011', 'i005', 'B040', 1),
('id012', 'i006', 'B041', 1),
('id013', 'i006', 'B042', 3),
('id014', 'i006', 'B043', 2),
('id015', 'i007', 'B038', 2),
('id016', 'i007', 'B039', 1),
('id017', 'i008', 'B040', 1),
('id018', 'i008', 'B041', 1),
('id019', 'i008', 'B042', 3),
('id020', 'i009', 'B043', 2),
('id021', 'i009', 'B030', 1),
('id022', 'i010', 'B010', 3),
('id023', 'i010', 'B020', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `indent`
--

CREATE TABLE `indent` (
  `iId` char(10) NOT NULL,
  `eId` char(7) NOT NULL,
  `iTotal` decimal(10,0) NOT NULL,
  `iStatus` varchar(10) NOT NULL,
  `iDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `indent`
--

INSERT INTO `indent` (`iId`, `eId`, `iTotal`, `iStatus`, `iDate`) VALUES
('I001', 'E001', 738, '已入庫', '2024-12-30 20:39:52'),
('I002', 'E001', 1008, '已入庫', '2024-12-30 22:59:52'),
('I003', 'E001', 299, '已入庫', '2024-12-31 05:19:33'),
('I004', 'E002', 3126, '處理中', '2024-12-31 11:22:52'),
('I005', 'E002', 300, '已入庫', '2024-12-31 16:39:42'),
('I006', 'E001', 3000, '處理中', '2025-01-01 00:00:00'),
('I007', 'E002', 993, '已入庫', '2025-01-01 01:01:37'),
('I008', 'E002', 442, '已入庫', '2025-01-01 01:48:05'),
('I009', 'E001', 758, '處理中', '2025-01-01 05:59:59'),
('I010', 'E002', 1800, '處理中', '2025-01-01 10:57:41');

-- --------------------------------------------------------

--
-- 資料表結構 `sale`
--

CREATE TABLE `sale` (
  `sId` char(10) NOT NULL,
  `bId` varchar(100) NOT NULL,
  `sQuantity` int(10) NOT NULL,
  `sTotal` decimal(10,0) NOT NULL,
  `sDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `sale`
--

INSERT INTO `sale` (`sId`, `bId`, `sQuantity`, `sTotal`, `sDate`) VALUES
('S001', 'B050', 3, 852, '2024-12-30 11:11:09'),
('S002', 'B025', 1, 189, '2024-12-30 11:30:48'),
('S003', 'B044', 2, 600, '2024-12-30 13:57:09'),
('S004', 'B020', 2, 910, '2024-12-31 11:00:37'),
('S005', 'B037', 6, 2772, '2024-12-31 14:31:27'),
('S006', 'B039', 1, 458, '2024-12-31 15:17:32'),
('S007', 'B003', 2, 320, '2025-01-02 11:30:49'),
('S008', 'B008', 5, 8800, '2025-01-02 11:47:00'),
('S009', 'B005', 2, 500, '2025-01-02 13:17:11'),
('S010', 'B002', 1, 170, '2025-01-02 14:58:20');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bId`);

--
-- 資料表索引 `cdetail`
--
ALTER TABLE `cdetail`
  ADD PRIMARY KEY (`cdId`);

--
-- 資料表索引 `customerorders`
--
ALTER TABLE `customerorders`
  ADD PRIMARY KEY (`cId`);

--
-- 資料表索引 `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eId`);

--
-- 資料表索引 `idetail`
--
ALTER TABLE `idetail`
  ADD PRIMARY KEY (`idId`);

--
-- 資料表索引 `indent`
--
ALTER TABLE `indent`
  ADD PRIMARY KEY (`iId`);

--
-- 資料表索引 `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
