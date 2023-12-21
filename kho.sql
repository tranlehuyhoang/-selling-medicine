-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2023 lúc 03:51 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `MaAD` char(5) NOT NULL,
  `TenAD` text NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) NOT NULL,
  `GioiTinh` text NOT NULL,
  `VaiTro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bcdkt`
--

CREATE TABLE `bcdkt` (
  `MaBCDKT` char(5) NOT NULL,
  `NgayLap` date DEFAULT NULL,
  `SoDuDK` int(11) DEFAULT NULL,
  `SoDuCK` int(11) DEFAULT NULL,
  `NoDaiHan` int(11) DEFAULT NULL,
  `NoNganHan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bcdtk`
--

CREATE TABLE `bcdtk` (
  `MaBCDTK` char(5) NOT NULL,
  `NgayLap` date DEFAULT NULL,
  `SoDuDK` int(11) DEFAULT NULL,
  `SoDuCK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctddh`
--

CREATE TABLE `ctddh` (
  `MaDDH` char(5) DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `Dongia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `ChuThich` text DEFAULT NULL,
  `PhuongThucTT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `MaHD` int(11) DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL,
  `Soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`MaHD`, `MaMH`, `ThanhTien`, `Soluong`) VALUES
(8, 'MH001', 294000, 2),
(8, 'MH002', 55000, 1),
(8, 'MH003', 350000, 1),
(9, 'MH001', 147000, 1),
(10, 'MH001', 147000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctpxk`
--

CREATE TABLE `ctpxk` (
  `MaPXK` char(5) DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `Dongia` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhthu`
--

CREATE TABLE `doanhthu` (
  `MaDT` char(5) NOT NULL,
  `MaHD` char(5) DEFAULT NULL,
  `MaKH` char(5) DEFAULT NULL,
  `TongDT` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDDH` char(5) NOT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `MaKH` char(5) DEFAULT NULL,
  `DKthanhtoan` text NOT NULL,
  `PhuongThucTT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hachtoan`
--

CREATE TABLE `hachtoan` (
  `MaHT` char(5) NOT NULL,
  `NgayCT` date NOT NULL,
  `DienGiai` text NOT NULL,
  `SoTien` int(11) NOT NULL,
  `MaHD` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayLap` date NOT NULL DEFAULT current_timestamp(),
  `SoTien` int(11) NOT NULL,
  `PhuongThucTT` text NOT NULL,
  `MaNV` char(5) DEFAULT NULL,
  `MaKH` char(5) DEFAULT NULL,
  `TrangThai` varchar(255) NOT NULL DEFAULT 'Chưa phê duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayLap`, `SoTien`, `PhuongThucTT`, `MaNV`, `MaKH`, `TrangThai`) VALUES
(8, '2023-12-17', 699000, 'Tiền mặt', NULL, 'KH004', 'Chưa phê duyệt'),
(9, '2023-12-17', 147000, 'Chuyển khoản', NULL, 'KH004', 'Chưa phê duyệt'),
(10, '2023-12-19', 147000, 'MOMO QR', NULL, 'KH004', 'Chưa phê duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` char(5) NOT NULL,
  `TenKH` text NOT NULL,
  `DiaChi` text NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Diem` float DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `VaiTro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `DiaChi`, `SDT`, `Diem`, `Email`, `Password`, `VaiTro`) VALUES
('KH001', 'Lauv', '', '', NULL, 'lauv@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
('KH002', 'GD', '', '', NULL, 'gd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
('KH003', 'pamyeuoi', '500 Hòa Hảo, p7, q10, tphcm', '0773392811', NULL, 'pamyeuoi@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
('KH004', 'Nam', 'Binh Thanh', '0365245602', NULL, 'nguyenvudaianm113@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
('KH005', 'Phương Uyên', 'Bình Thạnh', '0365245602', NULL, 'nguyenvudaianm115@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
('KH006', 'Thắm', 'Bình Thạnh', '0365245602', NULL, 'nguyenvudaianm116@gmail.com', '202cb962ac59075b964b07152d234b70', 'employ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `MaKho` char(10) NOT NULL,
  `TenKho` text DEFAULT NULL,
  `SucChua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`MaKho`, `TenKho`, `SucChua`) VALUES
('MK001', 'Kho 001', 50),
('MK002', 'Kho 002', 50),
('MK003', 'Kho 003', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `MaMH` char(5) NOT NULL,
  `TenMH` text NOT NULL,
  `DVT` text DEFAULT NULL,
  `GiaBan` int(11) NOT NULL,
  `NgaySX` date NOT NULL,
  `MoTa` text NOT NULL,
  `HanSD` date NOT NULL,
  `HINH` text NOT NULL,
  `DanhMuc` varchar(100) NOT NULL,
  `CTDM` varchar(100) NOT NULL,
  `Xoa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`MaMH`, `TenMH`, `DVT`, `GiaBan`, `NgaySX`, `MoTa`, `HanSD`, `HINH`, `DanhMuc`, `CTDM`, `Xoa`) VALUES
('MH001', 'Acetylcystein 200 Imexpharm (10 vỉ x 10 viên)', NULL, 147000, '2023-12-08', 'Thành phần\r\n\r\nAcetylcysteine 200mg\r\n\r\nTá dược: Đường trắng, Mannitol, Dinatri hydrophosphat khan, Bột mùi dâu,\r\nAspartam, Colloidal anhydrous silica.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?):\r\n\r\nThuốc Acetylcystein 200 mg được chỉ định dùng trong các trường hợp sau\r\n\r\n- Điều trị các bệnh lý đường hô hấp có đờm nhầy quánh như viêm phế quản cấp và mạn.\r\n\r\n- Dùng làm thuốc tiêu chất nhầy trong bệnh nhầy nhớt (mucoviscidosis) như xơ nang tuyến tụy.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?):\r\n\r\nThuốc Acetylcystein 200 mg chống chỉ định trong các trường hợp sau:\r\n\r\n- Quá mẫn với acetylcystein hay bất kỳ thành phần nào của thuốc.\r\n\r\n- Người có tiền sử hen (nguy cơ phản ứng co thắt phế quản với tất cả các dạng thuốc chứa acetylcystein).\r\n\r\n- Trẻ em dưới 2 tuổi.', '2025-12-07', 'uploads/mh001.webp', 'Dược phẩm', 'Thuốc không kê đơn', 0),
('MH002', 'AcetylCystein Boston 200 (Hộp 30 gói)', NULL, 55000, '2023-12-07', 'Thành phần\r\nMỗi gói 1g có chứa:\r\nHoạt chất: Acetylcystein 200mg\r\nTá dược: Lactose monohydrat, aspartam, acid ascorbic, màu vàng số 6 lake, mùi cam, silicon dioxid.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\nĐiều trị rối loạn tiết dịch phế quản, đặc biệt là trong các rối loạn phế quản cấp tính như viêm phế quản cấp và bệnh phổi tắc nghẽn mãn tính.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\nQuá mẫn với acetylcystein hay bất kỳ thành phần nào của thuốc.\r\nNhững người có tiền sử bị hen phế quản.\r\nTrẻ em dưới 2 tuổi.', '2025-12-07', 'uploads/mh002.webp', 'Dược phẩm', 'Thuốc không kê đơn', 0),
('MH003', 'Agilodin 10g (Hộp 10 vỉ x 10 viên)', NULL, 350000, '2023-12-07', 'Thành phần\r\nMỗi viên nén chứa: Loratadin 10mg\r\nTá dược vừa đủ 1 viên.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\n- Viêm mũi dị ứng\r\n- Viêm kết mạc dị ứng\r\n- Ngứa và mày đay liên quan đến histamin\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\n- Quá mẫn với loratadin hoặc với bất kỳ thành phần nào của thuốc\r\n- Dùng dạng kết hợp với loratadin và pseudoephedrin trong khi người bệnh đang dùng và đã dùng thuốc ức chế MAO trong vòng 10 ngày.', '2025-12-07', 'uploads/mh003.webp', 'Dược phẩm', 'Thuốc không kê đơn', 0),
('MH004', 'Air-X 120 (10 vỉ x 10 viên)', NULL, 144000, '2023-12-07', 'Thành phần\r\n- Hoạt chất: Simethicone (USP 37) 120mg.\r\n- Tá dược: Colloidal silicon dioxid, (aerosil 200, aerosil R972), glucose khan, povidon, sucrose, dầu caraway, dầu fennel, dầu peppermint, menthol, calci stearat, nước tinh khiết.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\nThuốc Air-X 120 được chỉ định dùng trong các trường hợp sau:\r\n- Đầy hơi ở đường tiêu hóa, cảm giác bị đè ép và căng ở vùng thượng vị, chướng bụng thoáng qua thường có sau bữa ăn thịnh soạn hoặc ăn nhiều chất ngọt, chướng bụng sau phẫu thuật.\r\n- Chuẩn bị chụp X-quang (dạ dày, ruột, túi mật, thận) và trước khi nội soi dạ dày.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\nThuốc Air-X 120 chống chỉ định trong các trường hợp quá mẫn cảm với bất kỳ thành phần nào của thuốc.', '2025-12-07', 'uploads/mh004.webp', 'Dược phẩm ', 'Thuốc không kê đơn', 0),
('MH005', 'Efodyl Sac 250mg (20 gói x 3g)', NULL, 55000, '2023-12-07', 'Thành phần\r\n\r\nMột viên nén bao phim chứa: Cefuroxim axetil 300,72mg tương đương với 250mg Cefuroxim. Tá dược: Sodium lauryl sulfate, microcrystalline cellulose, silicone dioxide, croscarmellose sodium, sodium starch glycolate, copovidone, magnesium stearat, opadry.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\n\r\nViêm phế quản mãn & cấp, viêm phổi. Viêm tai giữa, viêm xoang, viêm amidan & viêm họng. Viêm thận-bể thận cấp hay mãn, viêm bàng quang & viêm niệu đạo. Viêm niệu đạo cấp không biến chứng do lậu cầu & viêm cổ tử cung. Nhọt, bệnh mủ da, chốc lở.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\n\r\nMẫn cảm với cefuroxime hoặc bất kỳ nào của thuốc. Bệnh nhân có tiền sử quá mẫn với kháng sinh cephalosporin. Phản ứng quá mẫn nặng (ví dụ phản ứng phản vệ) với bất kỳ loại kháng sinh betalactam khac (penicillin, monobactam và carbapenems).', '2025-12-07', 'uploads/mh005.jpg', 'Dược phẩm', 'Thuốc kê đơn', 0),
('MH006', 'Guarente Tab 8mg (Hộp 3 vỉ x 10 viên)', NULL, 100000, '2023-12-07', 'Thành phần\r\n\r\nCandesartan cilexetil 8mg.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\n\r\nĐiều trị tăng huyết áp vô căn ở người lớn. Điều trị tăng huyết áp ở trẻ em từ 6 đến 18 tuổi. Điều trị suy tim ở bệnh nhân có chức năng cơ tim bị giảm.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\n\r\nQuá mẫn với thành phần thuốc. Hẹp động mạch thận. Hẹp động mạch chủ năng. Phụ nữ có thai và cho con bú. Hạ huyết áp.', '2025-12-07', 'uploads/mh006.jpg', 'Dược phẩm', 'Thuốc kê đơn', 0),
('MH007', 'Muscino Softcap (10 vỉ x 10 viên)', NULL, 65000, '2023-12-07', 'Thành phần\r\n\r\nMỗi viên nang mềm chứa:\r\n\r\n- Thành phần hoạt chất: Codein phosphat 10mg. Guaifenesin (glyceryl guaiacolat) 100mg.\r\n\r\n- Thành phần tá dược: Vừa đủ một viên nang mềm (Lecithin, Aerosil, Dầu cọ, Dầu nành, Ethyl vanillin, Methyl paraben, Propyl paraben, Gelatin, Glycerin, Sorbitol 70%, Màu đỏ carmoisin, Oxit sắt đỏ).\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\n\r\nMUSCINO được chỉ định cho bệnh nhân trên 12 tuổi để điều trị triệu chứng ho khan hoặc kích ứng đường hô hấp do cảm lạnh. Giúp loãng đờm và giảm tiết đờm làm ho đẩy ra ngoài hiệu quả hơn.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\n\r\nKhông dùng cho bệnh nhân dị ứng với bất kì thành phần nào của thuốc. Trẻ em bị bệnh phổi mạn tính, khó thở. Trẻ em dưới 18 tuổi vừa thực hiện cắt amiđan và/hoặc thủ thuật nạo V.A. Người bị bệnh tim nghiêm trọng (ví dụ: bệnh mạch máu ở tim). Người bị cao huyết áp nặng. Đang dùng natri oxybat. Phụ nữ cho con bú ( xem phần Sử dụng thuốc cho phụ nữ có thai và phụ nữ cho con bú). Những bệnh nhân mang gen chuyển hóa thuốc qua CYP2D6 siêu nhanh. Trẻ em dưới 12 tuổi để điều trị ho do có nguy cơ cao xảy ra các phản ứng có hại nghiêm trọng và đe dọa tính mạng.', '2025-12-07', 'uploads/mh007.jpg', 'Dược phẩm', 'Thuốc kê đơn', 0),
('MH008', 'Siro Bảo Thanh (90ml)', NULL, 49000, '2023-12-07', 'Thành phần\r\nCho 5ml\r\n- Dịch chiết (5:1) của Xuyên bối mẫu: 0,08ml tương đương: Xuyên bối mẫu (Bulbus Fritillariae): 0,4g.\r\n- Cao lỏng (1,2:1) của hỗn hợp dược liệu: 2,125ml {tương đương: Tỳ bà diệp (Folium Eriobotryae japonicae) 0,5g; Sa sâm (Radix Glehniae) 0,1g; Phục linh (Poria) 0.1g: Trần bì (Pericarpium Citri reticulatae perenne) 0,1 g; Cát cánh (Radix Platicodi grandiflori) 0,4g; Bán hạ (Rhizoma pinelliae) 0,1g; Ngũ vị tử (Fructus Schisandrae) 0,05g: Qua lâu nhân (Semen Trichosan - this) 0,2g; Viễn chí (Radix Polyqalae) 0,1g; Khổ hạnh nhân (Semen Armeniacae amarum) 0,2g; Gừng (Rhizoma Zingiberis) 0,1g; Ô mai (Fructus Mume praeparatus) 0,5g: Cam thảo (Radix Glycyrrhizae) 0,1g}.\r\n- Tinh dầu bạc hà (Oleum Menthae): 0,1mg\r\n- Mật ong (Mel): 1,0g\r\n- Tá dược (acid benzoic, đường trắng, ethanoi 96°, nước tinh khiết) vừa đủ 5ml.\r\n\r\nChỉ định (Thuốc dùng cho bệnh gì?)\r\nChủ trị: Các chứng ho do cảm lạnh, nhiễm lạnh, ho gió, ho khan, ho có đờm, ho do dị ứng thời tiết. Người bị phế âm hư gây ho dai dẳng lâu ngày, miệng họng khô, cổ họng ngứa, nóng rát, khản tiếng. Hỗ trợ điều trị viêm phổi, viêm họng, viêm phế quản.\r\n\r\nChống chỉ định (Khi nào không nên dùng thuốc này?)\r\nTrẻ em dưới 30 tháng tuổi, trẻ em có tiền sử động kinh hoặc co giật do sốt cao, người tiểu đường. Không dùng thuốc cho người mẫn cảm với bất kỳ thành phần nào của thuốc.', '2025-12-07', 'uploads/mh008.webp', 'Dược phẩm', 'Thuốc kê đơn', 0),
('MH009', 'Abbott Ensure Gold sữa bột hương vani ít ngọt (850g)', NULL, 806000, '2023-12-07', 'Thành phần\r\n\r\nTinh bột bắp thuỷ phân, DẦU THỰC VẬT (dầu hướng dương giàu oleic, dầu đậu nành, dầu hạt cải), sucrose, natri caseinat, đạm đậu nành tinh chế, oligofructose, đạm whey cô đặc, KHOÁNG CHẤT (kali citrat, tricanxi phosphat, magiê sulfat, magiê clorid, kali clorid, natri citrat, dikali hydrophosphat, natri clorid, canxi carbonat, kali hydroxid, sắt sulfat, kẽm sulfat, mangan sulfat, đồng sulfat, crôm clorid, kali iodid, natri molybdat, natri selenat), canxi β-hydroxy-β-methylbutyrat monohydrat (CaHMB), hương vani tổng hợp, Beta Glucan từ nấm men (YBG), VITAMIN (acid ascorbic, ascorbyl palmitat, Vitamin E, hỗn hợp tocopherol, canxi pantothenat, niacinamid, pyridoxin hydroclorid, riboflavin, thiamin hydroclorid, Vitamin A palmitat, vitamin D3, acid folic, beta caroten, phylloquinon, biotin, cyanocobalamin), cholin clorid, taurin, l-carnitin.\r\n\r\nCông dụng\r\n\r\nEnsure Gold bổ sung dinh dưỡng đầy đủ và cân đối, vitamin, khoáng chất giúp phục hồi và tăng cường sức khỏe.\r\n\r\nHMB và đạm chất lượng cao giúp bảo vệ, xây dựng và phát triển khối cơ\r\n\r\nYBG (Beta Glucan từ nấm men) và 12 dưỡng chất giúp tăng cường miễn dịch theo 5 cách thức\r\n\r\nGiàu Omega-3, Omega-6, Omega-9 nguồn gốc thực phận hỗ trợ sức khỏe tim mạch\r\n\r\n28 vitamin và khoáng chất thiết yếu giúp cơ thể khỏe mạnh\r\n\r\nChất xơ FOS hỗ trợ tiêu hóa khỏe mạnh. Các chất chống oxy hóa (Beta caroten, Vitamin C, E, Kẽm và Selen) giúp bảo vệ cơ thể\r\n\r\nGiàu Canxi, Phospho và Vitamin D giúp xương chắc khỏe.\r\n\r\nĐối tượng sử dụng\r\n\r\nNgười lớn, người ăn uống kém, người bệnh cần phục hồi nhanh.\r\n\r\nChú ý:\r\n\r\nKhông chứa Gluten. Rất ít Trans Fat và Lactose, phù hợp cho người bất dung nạp Lactose\r\n\r\nKhông dùng cho người bệnh Galactosemia\r\n\r\nKhông dùng qua đường tĩnh mạch\r\n\r\nKhông dùng cho trẻ em trừ khi có hướng dẫn của chuyên gia y tế\r\n\r\nSử dụng cho người bệnh với sự giám sát của nhân viên y tế', '2025-12-07', 'uploads/mh009.jpg', 'Chăm sóc sức khỏe', 'Thực phẩm dinh dưỡng', 0),
('MH010', 'Bột nước mát thảo mộc Datino (Hộp 10 gói x 8g)', NULL, 42000, '2023-12-07', 'Thành phần\r\n\r\nRâu bắp, atisô, hoa cúc, mía lau, bạch mao căn, mật ong.\r\n\r\nCông dụng\r\n\r\n- Hỗ trợ thanh nhiệt, giải độc, mát gan, lợi tiểu\r\n\r\n- Giải khát\r\n\r\nĐối tượng sử dụng: Người lớn và trẻ em trên 5 tuổi\r\n\r\nCách sử dụng \r\n\r\nCho một gói bột nước mát Datino (8g) vào 120-160 ml nước và khuấy đều. Ngon hơn khi uống lạnh.', '2025-12-07', 'uploads/mh010.jpg', 'Chăm sóc sức khỏe', 'Thực phẩm dinh dưỡng', 0),
('MH011', 'Gel cải thiện giảm bỏng rát, giảm phồng rộp da Apigen 10g', NULL, 128000, '2023-12-07', 'Công dụng\r\n\r\nKem giúp làm dịu mát da, dưỡng ẩm, làm mềm da.\r\n\r\nĐối tượng sử dụng\r\n\r\nÁp dụng cho những tình trạng bỏng nhẹ:\r\n\r\nÁp dụng cho bỏng lửa nhẹ và bỏng nắng\r\n\r\nBỏng do nấu nướng văn trúng\r\n\r\nBỏng do va chạm nhiệt cấp độ nhẹ\r\n\r\nBỏng nắng, rám da do tiếp xúc ánh nắng lâu\r\n\r\nRộp nước, rát da, sần sùi và khô nứt \r\n\r\nCách sử dụng \r\n\r\nRửa sạch tay trước khi thoa lên vùng da bị tổn thương. \r\n\r\nDùng một lượng vừa đủ thoa lên vùng da bị ảnh hưởng từ 2-3 lần/ngày.', '2025-12-07', 'uploads/mh011.jpg', 'Chăm sóc sức khỏe', 'Dụng cụ sơ cứu', 0),
('MH012', 'Bông y tế thấm nước Bạch Tuyết (100g)', NULL, 22000, '2023-12-07', 'Thành phần: 100% bông xơ tự nhiên.\r\n\r\nCông dụng: Dùng làm thuốc sát trùng trước khi tiêm, lau rửa vết thương và thấm máu, vệ sinh cho em bé.\r\n\r\nBảo quản: Nơi khô ráo và sạch sẽ, tránh ánh sáng trực tiếp và nhiệt độ cao.\r\n\r\nQuy cách đóng gói: Gói 100g\r\n\r\nXuất xứ thương hiệu: Việt Nam\r\n\r\nSản xuất tại: Việt Nam', '2025-12-07', 'uploads/mh012.jpg', 'Chăm sóc sức khỏe', 'Dụng cụ sơ cứu', 0),
('MH013', 'Que thử thai nhanh HCG Allisa (Hộp 1 cái)', NULL, 15000, '2023-12-07', 'Thành phần\r\nKháng thể kháng β-hCG 0,5mg/ml\r\nKháng thể kháng α -hCG 0,7mg/ml\r\nKháng thể để kháng IgG chuột 1,5mg/ml\r\n\r\nCông dụng\r\nĐịnh tính hormone HCG trong nước tiểu người giúp phát hiện sớm thai kỳ (7-10 ngày sau khi thụ thai).\r\n\r\nĐối tượng sử dụng: Dùng cho nữ giới \r\n\r\nCách sử dụng\r\nLấy nước tiểu vào cốc, nên lấy nước tiểu giữa (không nên lấy nước tiểu đầu và cuối).\r\nLấy que thử khỏi bao nhôm và sử dụng càng sớm càng tốt (nên dùng trong vòng 10 phút).\r\nCắm que thử vào trong cốc nước tiểu theo chiều mũi tên (không ngập quá vạch đánh dấu).\r\nLấy que thử ra sau 5 - 15 giây. Để que thử trên mặt phẳng khô, sạch.\r\nĐọc kết quả trong 5 phút nhưng không lâu hơn 10 phút.\r\nĐọc kết quả\r\nDương tính (có thai): Hai vạch màu xuất hiện trên que thử ở cả vùng chứng (C) và vùng thử (T).\r\nÂm tính (không có thai): Chỉ có một vạch màu xuất hiện tại vùng chứng (C). Không có vạch màu nào xuất hiện tại vùng thử(T).\r\nKhông đạt: Nếu không có vạch màu nào xuất hiện hoặc chỉ có vạch thử mà không có vạch chứng, nên thử lại với que thử mới.', '2025-12-07', 'uploads/mh013.jpg', 'Chăm sóc sắc đẹp', 'Kế hoạch gia đình', 0),
('MH014', 'Bao cao su Durex Fetherlite (12 cái/hộp)', NULL, 204000, '2023-12-07', 'Thành phần\r\nMủ cao su thiên nhiên, chất bôi trơn silicon.\r\n\r\nĐặc điểm nổi bật\r\nSản phẩm đạt tiêu chuẩn chất lượng quốc tế, an toàn và hiệu quả, được sản xuất hoàn toàn bằng chất liệu mủ cao su thiên nhiên, đáp ứng những yêu cầu và điều kiện sản xuất khắt khe dành cho sản phẩm nhạy cảm.\r\n\r\nCách sử dụng\r\n\r\n- Xé dọc 1 bên gói, tránh làm rách bao cao su.\r\n- Mang bao cao su vào dương vật.\r\n- Sau khi rút dương vật ra giữ chặt bao cao su.\r\n- Gói bao cao su lại rồi bỏ vào thùng rác.\r\n\r\nBảo quản: Nơi khô ráo thoáng mát, tránh ánh nắng trực tiếp.', '2025-12-07', 'uploads/mh014.webp', 'Chăm sóc sức khỏe', 'Kế hoạch gia đình', 0),
('MH015', 'Nước Rửa Tay Khô Khuynh Diệp & Bạc Hà Cocoon (140ml)', NULL, 52500, '2023-12-07', 'Thành phần: Cồn 90 độ tinh khiết, tinh dầu khuynh diệp, tinh dầu bạc hà, Glycereth-26\r\n\r\nCông dụng: Giúp loại bỏ đến 99.9% vi khuẩn gây bệnh mà không cần nước, giúp khử trùng các loại đồ dùng & vật dụng cá nhân tiện lợi mọi lúc mọi nơi, đồng thời dưỡng ẩm cho đôi tay luôn mềm mại và lưu lại hương thơm mát dễ chịu từ các loại tinh dầu tự nhiên.\r\n\r\nLoại da: Mọi loại da\r\n\r\nHướng dẫn sử dụng\r\n- Xịt dung dịch vào lòng bàn tay, giữa các kẽ ngón tay rồi xoa đều cho đến khô, không cần rửa lại với nước. Sản phẩm dùng khi cần để làm sạch khuẩn nhanh sau khi tiếp xúc với động vật, sau khi đi vệ sinh.\r\n- Ngoài dùng cho tay, sản phẩm có thể xịt lên các vật dụng cá nhân để khử trùng.   ', '2025-12-07', 'uploads/mh015.jpg', 'Chăm sóc sức khỏe', 'Sản phẩm phòng tắm', 0),
('MH016', 'Sữa tắm dưỡng thể Dove Deeply Nourishing (Chai 530g)', NULL, 138000, '2023-12-07', 'Thành phần\r\n\r\nWater, Sodium Laureth Sulfate, Cocamidopropyl Betaine, PEG-4, Glycol Distearate,...\r\n\r\nCông dụng\r\n\r\nDùng để tăm, làm sạch da\r\n\r\nCách sử dụng\r\n\r\nLàm ướt da, lấy một lượng vừa đủ cho vào lòng bàn tay hoặc bông tắm, tạo bọt rồi Massage nhẹ nhàng lên da. Xả lại bằng nước sạch.\r\n\r\nBảo quản\r\n\r\nBảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp.', '2025-12-07', 'uploads/mh016.webp', 'Chăm sóc cá nhân', 'Sản phẩm phòng tắm', 0),
('MH017', 'Lăn khử mùi hương nước hoa Enchantuer Charming Enchantuer Deluxe Anti-Perspirant Deodorant Charming (50ml)', NULL, 93000, '2023-12-07', 'Thành phần\r\n\r\nAlocohol, Water, Aluminum Chlorohydrat, Propylone Glycol, Laureth-4, PEG08, Fragrance, Olive Oil PEG-7 Esters, Hydroxyethycellulose.\r\n\r\nCông dụng\r\n\r\nKhử mùi cơ thể, giảm tiết mồ hôi.\r\n\r\nCách sử dụng:\r\n\r\nLăn đều lên dùng da dưới cánh tay sau khi tắm.\r\n\r\nBảo quản:\r\n\r\nNơi khô ráo thoáng mát, tránh ánh nắng trực tiếp.\r\n\r\nDung tích: 50ml\r\n\r\nXuất xứ thương hiệu: Singapore\r\n\r\nSản xuất tại: Việt Nam', '2025-12-07', 'uploads/mh017.jpg', 'Chăm sóc cá nhân', 'Sản phẩm khử mùi', 0),
('MH018', 'Lăn khử mùi ngọc trai sáng mịn Nivea Pearl & Beauty (25ml)', NULL, 49500, '2023-12-07', 'Thành phần\r\n\r\nAqua, Aluminum Chlorohydrate, PPG-15 Stearyl Ether, Steareth-2, Steareth-21, Parfum, Trisodium EDTA, Persea Gratissima Oil, Hydrolyzed Pearl\r\n\r\nCông dụng\r\n\r\nLăn khử mùi dùng cho vùng da dưới cánh tay, giúp giảm tiết mồ hôi và giảm mùi mồ hôi cơ thể, đồng thời dưỡng ẩm cho da, mang lại làn da mịn màng.\r\n\r\nCách sử dụng: Lăn đều lên vùng da dưới cánh tay sau khi tắm hoặc trước khi ra đường.\r\n\r\nBảo quản: Nơi khô ráo thoáng mát, tránh ánh nắng trực tiếp.\r\n\r\nDung tích: Chai 25ml\r\n\r\nXuất xứ thương hiệu: Đức', '2025-12-07', 'uploads/mh018.jpg', 'Chăm sóc cá nhân', 'Sản phẩm khử mùi', 0),
('MH019', 'Dầu gội 9 loại thảo dược sạch gàu Clear 630g', NULL, 199000, '2023-12-07', 'Thành phần: Water, Sodium Laureth Sulfate, Dimethiconol, Cocamidopropyl Betaine, Sodium Chloride, Dimethicone, Phenoxyethanol...\r\n\r\nCông dụng\r\n\r\nRễ nhân sâm, dâu tằm, tinh chất vỏ bưởi: nổi tiếng với nhiều vitamin thiết yếu, cho tóc chắc khỏe, giảm gãy rụng, góp phần hỗ trợ mọc tóc mới.\r\n\r\nHoa lan, tràm trà, quả bách xù: có khả năng giúp kháng khuẩn, sạch gàu, hết ngứa.\r\n\r\nBồ kết, cỏ mực, hoa kim ngân: được biết đến với khả năng nuôi dưỡng sâu, cho tóc mềm mại, suôn mượt, bồng bềnh trông dày hơn.\r\n\r\nHướng dẫn sử dụng\r\n\r\nThoa dều dầu gội lên tóc ướt & da đầu, xoa bóp nhẹ nhàng, gội sạch với nước. Khuyên dùng hằng ngày\r\n\r\nLưu ý: Để xa tầm tay trẻ em, tránh tiếp xúc với mắt. Nếu sản phẩm dính vào mắt, rửa kĩ\r\n\r\nBảo quản: Tránh nhiệt độ cao, ánh nắng trực tiếp', '2025-12-07', 'uploads/mh019.jpg', 'Chăm sóc cá nhân', 'Chăm sóc tóc', 0),
('MH020', 'Dầu gội 2 in 1 hà thủ ô Cocayhoala 450g', NULL, 261000, '2023-12-07', 'Thành phần\r\n\r\nAqua, Sodium Laureth Sulfate, Cocamidopropyl Betaine, Cocamide MEA, PEG-7 Glyceryl Cocoate, Dimethiconol, Fragrance, Sodium Chloride, Phenoxyethanol, Carbome, DMDM Hydantoin, Sodium Lactate, Panthenol, Scanned with CamScanner, Guar Hydroxypropyltrimonium Chloride, Sodium Hydroxide, Polyquaternium, Amodimethicone, Trideceth-12, Cetrimonium Chloride, TEA-Dodecylbenzenesulfonate, Citric Acid, Olea Europaea (Olive) Fruit Oil, Macadamia Ternifolia Seed Oil, Argania Spinosa Kernel Oil, Citrus Grandis (Grapefruit) Peel Oil, Hydrolyzed Collagen, Tetrasodium EDTA, Butyrospermum Parkii (Shea) Butter, Propylene Glycol Polygonum Multiflorum Root Extract, CI 50420, CI 15985, CI 14720, CI 42090, CI 19140\r\n\r\nCông dụng\r\n\r\nDùng để gội đầu, làm sạch da đầu, giúp dưỡng ẩm cho tóc, mềm mượt tự nhiên,giảm rụng tóc.\r\n\r\nCách sử dụng\r\n\r\nThoa sản phẩm lên tóc ướt và tạo bọt, mát-xa nhẹ nhàng từ gốc đến ngọn, sau đó gội sạch. Sử dụng hằng ngày để có kết quả tốt nhất. Tránh tiếp xúc với mắt', '2025-12-07', 'uploads/mh020.jpg', 'Chăm sóc cá nhân', 'Chăm sóc tóc', 0),
('MH021', 'Khăn giấy ướt hương nhẹ an toàn cho bé Agi (100 tờ/gói)', NULL, 47000, '2023-12-07', 'Cách sử dụng:\r\nMở nắp hộp, gỡ tem phía trong, rút từng tờ để sử dụng. Sau khi dùng xong đóng nắp hộp lai để giữ ẩm và kháng khuẩn.\r\n\r\nBảo quản:\r\nNơi khô ráo thoáng mát, tránh ánh nắng trực tiếp.\r\n\r\nQuy cách đóng gói: 100 tờ/gói\r\n\r\nXuất xứ thương hiệu: Hàn Quốc\r\n\r\nSản xuất tại: Việt Nam', '2025-12-07', 'uploads/mh021.webp', 'Sản phẩm tiện lợi', 'Hàng tổng hợp', 0),
('MH022', 'Khăn giấy lụa Premium 24mm Emos (Gói 100 tờ)', NULL, 14000, '2023-12-07', 'Khăn Giấy Ăn Cao Cấp Emos Premium 2 Lớp 100 Tờ 24 x 24cm là sản phẩm đặc biệt cao cấp của nhãn hàng E\'mos.\r\n\r\nĐược sản xuất bới công nghệ độc đáo, chọn lựa và kết nối theo cấu trúc α những sợi giấy thuần khiết nhất từ thiên nhiên, hoàn toàn không có hóa chất tẩy trắng độc hại.\r\n\r\nKhăn giấy ăn cao cấp E\'mos Premium mềm hơn, dai hơn, sẽ mang lại cho bạn cảm giác được chăm sóc vô cùng nhẹ nhàng và tinh tế.\r\nKích thước: 24 x 24 cm. Gồm 100 tờ.', '2025-12-07', 'uploads/mh022.webp', 'Sản phẩm tiện lợi', 'Hàng tổng hợp', 0),
('MH023', 'Khăn giấy bỏ túi Let-Green (10 tờ/túi)', NULL, 5000, '2023-12-07', 'Thành phần: 100% bột giấy nguyên chất\r\n\r\nCông dụng: Dùng để lau mặt, tay...\r\n\r\nHướng dẫn sử dụng: Dùng tay tách đường ép lưng của bao, rút khăn cần sử dụng.\r\n\r\nBảo quản: Nơi khô ráo, thoáng mát.\r\n\r\nQuy cách đóng gói: 10 tờ/túi\r\n\r\nXuất xứ thương hiệu: Việt Nam\r\n\r\nSản xuất tại: Việt Nam', '2025-12-07', 'uploads/mh023.webp', 'Sản phẩm tiện lợi', 'Hàng tổng hợp', 0),
('MH024', 'Nước uống đóng chai Aquafina (1.5l)', NULL, 14000, '2023-12-07', 'Thành phần:\r\nNước tinh khiết\r\n\r\nCông dụng:\r\nGiải khát, giúp cơ thể sảng khoái\r\n\r\nCách sử dụng:\r\nNgon hơn khi uống lạnh\r\n\r\nBảo quản: Nơi khô ráo thoáng mát, tránh ánh nắng và hóa chất\r\n\r\nDung tích: 1.5l', '2023-12-07', 'uploads/mh024.webp', 'Sản phẩm tiện lợi', 'Hàng bách hóa', 0),
('MH025', 'Bánh sô cô la KitKat (35g)', NULL, 18000, '2023-12-07', 'Bánh sô cô la KitKat là sự hòa quyện độc đáo giữa vị ngọt ngào của sô cô la, vị béo ngậy của sữa, độ xốp, giòn của bánh, mang đến cho bạn hương vị thơm ngon, hấp dẫn. Sản phẩm được làm từ các thành phần tự nhiên, không chứa chất tạo màu, chất bảo quản độc hại, an toàn với sức khỏe.', '2023-12-07', 'uploads/mh025.webp', 'Sản phẩm tiện lợi', 'Hàng bách hóa', 0),
('MH026', 'Kẹo sing-gum hương bạc hà khuynh diệp CooL Air (58.4g)', NULL, 34000, '2023-12-07', 'Với hương vị thơm ngon của những nguyên liệu tự nhiên được chọn lọc kỹ càng, sẽ mang lại cho bạn những phút giải trí và thưởng thức thật tuyệt vời bên cạnh bạn bè hoặc người thân. Sản phẩm không chứa hóa chất, chất bảo quản độc hại, đảm bảo an toàn cho sức khỏe người tiêu dùng.', '2025-12-07', 'uploads/mh026.webp', 'Sản phẩm tiện lợi', 'Hàng bách hóa', 0),
('MH027', 'Men vi sinh hỗ trợ tiêu hóa 6 ENZYMES IP (Hộp 20 ống x 10ml)', NULL, 155000, '2023-12-07', 'Công dụng\r\n\r\nBổ sung enzym tiêu hóa giúp tăng cường tiêu hoá thức ăn, hỗ trợ giảm tình trạng đầy bụng, khó tiêu, biếng ăn, táo bón\r\n\r\nHỗ trợ tăng cường sức đề kháng cho cơ thể\r\n\r\nCách dùng – liều dùng\r\n\r\nUống cùng bữa ăn (trước hoặc sau ăn trong vòng 30 phút).\r\n\r\nTrẻ từ 2 - 6 tuổi: uống 10ml/lần x ngày 2 - 3 lần.\r\n\r\nTrẻ trên 6 tuổi: uống 10ml/lần x ngày 3 lần.\r\n\r\nTrẻ dưới 2 tuổi tham khảo ý kiến bác sĩ (liều khuyên dùng: Uống 10ml/lần/ngày).\r\n\r\nĐối tượng sử dụng\r\n\r\nTrẻ tiêu hoá kém có biểu hiện biếng ăn, ăn không ngon, khó tiêu, đầy hơi, chướng bụng.\r\n\r\nTrẻ bị rối loạn tiêu hóa, trẻ có sức đề kháng kém, trẻ mới ốm dậy.', '2025-12-07', 'uploads/mh027.jpg', 'Thực phẩm chức năng', 'TPCN Nhóm dạ dày', 0),
('MH028', 'Thực phẩm bảo vệ sức khỏe Bình vị Thái Minh (Hộp 20 viên)', NULL, 163000, '2023-12-07', 'Công dụng\r\n\r\nHỗ trợ giảm acid dịch vị, giúp bảo vệ niêm mạc dạ dày\r\n\r\nHỗ trợ cải thiện và giảm thiểu các biểu hiện của viêm loét dạ dày\r\n\r\nĐối tượng sử dụng\r\n\r\nNgười bị trào ngược dạ dày\r\n\r\nNgười bị viêm loét dạ dày với các biểu hiện: Ợ chua, ợ hơi và đau thượng vị\r\n\r\nCách dùng\r\n\r\nUống 4 viên 1 ngày, chia làm 2 lần\r\n\r\nUống vào buổi sáng và tối, trước bữa ăn 30 phút\r\n\r\nDuy trì ngày uống 2 viên\r\n\r\nQuy cách đóng gói: Hộp 20 viên', '2025-12-07', 'uploads/mh028.webp', 'Thực phẩm chức năng', 'TPCN Nhóm dạ dày', 0),
('MH029', 'Hỗ trợ giảm cholesterol Blackmores Cholesterol Health (60 viên)', NULL, 705000, '2023-12-07', 'Công dụng: Hỗ trợ giảm cholesterol trong máu, giảm nguy cơ bệnh tim mạch.\r\n\r\nĐối tượng sử dụng: Người lớn cần hỗ trợ kiểm soát cholesterol.\r\n\r\nThành phần chính: Dầu thực vật Phytosterol esters, betacarotene tự nhiên…\r\n\r\nHướng dẫn sử dụng\r\n\r\nNgười lớn: Uống 1 viên/lần x 2 lần/ngày cùng bữa ăn hoặc theo chỉ dẫn bác sĩ.\r\n\r\nTrẻ em dưới 12 tuổi: Chỉ sử dụng nếu có chỉ định của bác sĩ.\r\n\r\nLưu ý:\r\n\r\nKhông nên sử dụng khi mang thai hoặc cho con bú.\r\n\r\nKhông khuyến cáo bổ sung quá 3g phytosterol/ngày từ tất cả các nguồn.\r\n\r\nSản phẩm không dùng điều trị cholesterol cao, cần tham khảo lời khuyên của bác sĩ.\r\n\r\nKhông dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm.\r\n\r\nBảo quản: Dưới 30 độ C, nơi khô ráo, tránh ánh sáng trực tiếp.', '2025-12-07', 'uploads/mh029.jpg', 'Thực phẩm chức năng', 'TPCN Nhóm tim mạch', 0),
('MH030', 'Thực phẩm bảo vệ sức khỏe tinh dầu tỏi hỗ trợ tăng cường đề kháng Costar Garlic Oil (Lọ 60 viên)', NULL, 190900, '2023-12-07', 'Thành phần: Trong 1 viên nang mềm 400mg chứa: Dầu tỏi (1mg) (3000:1) (tương đương tỏi tươi 3000mg), thành phần khác: dầu đậu nành, Gelatin, Glycerol, nước tinh khiết\r\n\r\nCông dụng: Giúp tăng cường sức đề kháng. Hỗ trợ giảm các triệu chứng cảm cúm thông thường\r\n\r\nĐối tượng sử dụng: Người sức đề kháng kém, người bị cảm cúm thông thường.\r\n\r\nChú ý\r\n\r\nThực phẩm này không phải là thuốc, không có tác dụng thay thế thuộc chữa bệnh.\r\nKhông sử dụng với người mẫn cảm với thành phần của sản phẩm. Cần tham cấn ý kiến bác sỹ nếu có phản ứng với thành phần sản phẩm.\r\nKhông dùng cho trẻ em.', '2025-12-07', 'uploads/mh030.jpg', 'Thực phẩm chức năng', 'TPCN Nhóm tim mạch', 0),
('MH031', 'Thực phẩm bảo vệ sức khỏe phòng ngừa biến chứng tiểu đường Boni Diabet (60 viên/hộp)', NULL, 405000, '2023-12-07', 'Thành phần\r\n\r\nMagnesium 30mg, kẽm 5mg, Selenium 70mcg, Chromium: 120mcg, Alpha Lipoic acid 50mcg, chiết xuất dây thìa canh 100 mg, bột mướp đắng 100mg, bột quế 50mg, Vitamin C 150mg, Acid Folic 250 mcg…\r\n\r\nPhụ liệu: Microcrystalline Cellulose, Fumed Silica.\r\n\r\nCông dụng\r\n\r\nHỗ trợ giúp giảm lượng đường trong máu, giúp giảm các biến chứng của bệnh tiểu đường, hỗ trợ giảm cholesterol máu.\r\n\r\nĐối tượng sử dụng: Người bị bệnh tiểu đường, biến chứng do tiểu đường gây ra.\r\n\r\nCách sử dụng: Uống 2 - 4 viên/ngày, chia làm 2 lần.', '2025-12-07', 'uploads/mh031.jpg', 'Thực phẩm chức năng', 'TPCN Nhóm đường huyết', 0),
('MH032', 'Thực phẩm hỗ trợ đường huyết Premium Omexxel Blood Sugar Health (Hộp 60 viên)', NULL, 595000, '2023-12-07', 'Thành phần\r\n\r\n- Hạt cỏ cà ri (Fenumannans)............................................................. 400mg\r\n\r\n(Có chứa Galactomannan 60%: 240mg)\r\n\r\n- Chiết xuất quế...................................................................................... 200mg\r\n\r\n(Có chứa Polyphenols 20%: 40mg)\r\n\r\n- Chiết xuất hạt đậu cô ve (Fabenol Max)............................................ 100mg\r\n\r\n- Chiết xuất gỗ Pterocarpus marsupium................................................... 50mg\r\n\r\n(Có chứa Pterocarposide 2,5%: 1,25mg)\r\n\r\n- Chiết xuất vỏ cây Salacia reticulata (Salaretin)................................... 50mg\r\n\r\n(Có chứa Mangiferin 1%: 0,5mg)\r\n\r\n- Chiết xuất quả mướp đắng (Momordicin) .......................................... 25mg\r\n\r\n(Có chứa Charantin 0,5%: 0,125mg)\r\n\r\n- Chiết xuất lá dây thìa canh (GS4PLUS) ............................................. 25mg\r\n\r\n(Có chứa Gymnemic acid 25%: 6,25mg)\r\n\r\n- Chiết xuất hạt tiêu đen (BioPerine) ...................................................... 5mg\r\n\r\nPhụ liệu: Vỏ nang gelatin, Magnesium stearate.\r\n\r\nCông dụng\r\n\r\nHỗ trợ ổn định đường huyết.', '2025-12-07', 'uploads/mh032.jpg', 'Thực phẩm chức năng', 'TPCN Nhóm đường huyết ', 0),
('MH033', 'Sữa nước hương Vani Abbott PediaSure cho Trẻ 1-10 Tuổi 110ml (Lốc/4 Hộp)', NULL, 89000, '2023-12-07', 'Độ tuổi sử dụng: Trẻ từ 1 - 10 tuổi.\r\n\r\nHạn sử dụng: 12 tháng.\r\n\r\nThương hiệu: Abbott\r\n\r\nNơi sản xuất: Việt Nam\r\n\r\nTên Nhà sản xuất: Deneast\r\n\r\nSố Giấy công bố: 22/2019/ABB-CBSP\r\n\r\nCông ty phân phối: CÔNG TY TNHH DINH DƯỠNG 3A (VIỆT NAM)', '2025-12-07', 'uploads/mh033.webp', 'Mẹ và bé', 'Chăm sóc em bé', 0),
('MH034', 'Sữa tắm gội toàn thân Aveeno baby (Chai 236ml)', NULL, 135000, '2023-12-07', 'Công dụng\r\nSữa tắm gội hàng ngày Aveeno Baby cao cấp giúp cải thiện và ngăn ngừa làn da khô ngứa, mẩn đỏ và nhạy cảm, hỗ trợ cấp ẩm và dưỡng ẩm cho làn da bé tránh bị nứt nẻ.\r\n\r\nSữa tắm gội hàng ngày Aveeno Baby cao cấp giúp cải thiện và ngăn ngừa làn da khô ngứa, mẩn đỏ và nhạy cảm, hỗ trợ cấp ẩm và dưỡng ẩm cho làn da bé tránh bị nứt nẻ.\r\n\r\nSản phẩm chứa 3X yến mạch hảo hạng được trồng từ các vùng Anh, Pháp, Mỹ, Canada, giúp nuôi dượng hệ vi sinh trên da và dưỡng ẩm suốt 24h.\r\n\r\nSản phẩm đã được chứng minh lâm sàng hiệu quả NGAY LẦN SỬ DỤNG ĐẦU TIÊN cung cấp độ ẩm cho làn da mỏng manh của em bé trong suốt 24 giờ. Công thức dịu nhẹ không chứa xà phòng mà vẫn làm sạch và nuôi dưỡng da và tóc bé.\r\n\r\nSửa tắm không làm cay mắt, không chứa Paraben, không chứa Phthalate, không gây dị ứng trên da\r\n\r\nĐối tượng sử dụng: Cho bé từ 6 tháng tuổi trở lên\r\n\r\nLoại da: Phù hợp mọi loại da, đặc biệt da khô ngứa, mẩn đỏ và nhảy cảm', '2025-12-07', 'uploads/mh034.jpg', 'Mẹ và bé', 'Chăm sóc em bé', 0),
('MH035', 'Kẹo dẻo bổ sung Vitamin C trẻ em Appeton A-Z Kids Vitamin C Pastilles (Hộp 20 gói)', NULL, 8500, '2023-12-07', 'Thành phần\r\n\r\nSiro Glucose, Đường, Nước, Gelatin (từ bò), Vitamin C, Chất làm ẩm: Sorbitol (E420), Chất tạo hương trái cây giống tự nhiên, Chất điều chỉnh độ axit: Axit Citric (E330), Dầu thực vật, Chất làm bóng: Sáp ong (901)/ Sáp Carnauba (903), Chất điều chỉnh độ axit: Axit Lactic (E270), Chất tạo màu đồng nhất: Allura Red CI 16035 (E129), Tartr azin CI 19140 (E102), Sunset Yellow CI 15985 (E110), Xanh rực rỡ CI 42090 (E133).\r\n\r\nĐối tượng sử dụng: Trẻ 3 tuổi trở lên \r\n\r\nHướng dẫn sử dụng: Dùng ăn trực tiếp\r\n\r\nBảo quản: Nơi khô ráo thoáng mát\r\n\r\nNơi sản xuất: Indonesia', '2025-12-07', 'uploads/mh035.jpg', 'Mẹ và bé', 'TPCN dành cho trẻ', 0),
('MH036', 'Viên nhai bổ sung Vitamin C BAYER Redoxon Kid (Hộp 60 viên)', NULL, 100000, '2023-12-07', 'Thành phần\r\n\r\nMỗi viên nhai chứa: Vitamin C (dưới dạng Acid ascorbic và Natri ascorbate) 200mg.\r\n\r\nThành phần khác: chất độn và chất tạo ngọt tự nhiên: sorbitol, manitol; chất tạo màu tổng hợp Apocarotenal (1%); chất chống đông vón: talc; hương liệu: hương vị cam tổng hợp; chất chống đông vón: magnesium stearate; chất tạo ngọt tổng hợp: sucralose, kali acesulfam\r\n\r\nCông dụng\r\n\r\nSản phẩm cung cấp Vitamin C cho cơ thể, hỗ trợ tăng cường sức khỏe, nâng cao sức đề kháng, hỗ trợ quá trình chống oxy hóa cho cơ thể.\r\n\r\nĐối tượng sử dụng\r\n\r\nTrẻ có sức đề kháng kém, trẻ có chế độ ăn thiếu hụt Vitamin C hoặc trẻ cần thiết phải tăng nhu cầu sử dụng Vitamin C\r\n\r\nĐộ tuổi sử dụng: Trẻ em từ 6 tuổi trở lên', '2025-12-07', 'uploads/mh036.jpg', 'Mẹ và bé', 'TPCN dành cho trẻ', 0),
('MH037', 'Kem dưỡng ẩm làm mềm da núm vú Fixderma Preggers Soothing Nipple cream (Tuýp 20g)', NULL, 179000, '2023-12-07', 'Thành phần\r\n\r\nCaprylic/ Capric Triglyceride, Olea Europaea (Olive) Oil, Cocos Nucifera (Coconut) Oil, Glyceryl Behenate, Glycerol, Hydrogenated Castor Oil, Glycine Soja (Soybean) Oil, Calendula Officinalis Flower Extract, Tocopherol, Fragrance.\r\n\r\nCông dụng\r\n\r\nKem giúp dưỡng ẩm, phục hồi, làm dịu, mềm da núm vú bị khô, rạn nứt, đau rát do cho con bú.\r\n\r\nCách sử dụng\r\n\r\nCẩn thận thoa kem lên núm vú (có thể thoa nhiều lần) sau khi cho con bú.\r\n\r\nThương hiệu: Fixderma\r\n\r\nTên nhà sản xuất: Fixderma \r\n\r\nNơi sản xuất: Ấn Độ', '2025-12-07', 'uploads/mh037.jpg', 'Mẹ và bé', 'Sản phẩm dành cho mẹ', 0),
('MH038', 'Dụng cụ hút sữa bằng tay Bio Health EE Classic', NULL, 203000, '2023-12-07', 'Đặc tính kỹ thuật:\r\nSử dụng áp lực chân không, đệm silicone tạo cảm giác êm ái khi sử dụng, nhựa không BPA.\r\nGọn, nhẹ thuận tiện cho việc sử dụng mọi nơi, mọi lúc.\r\n\r\nCông dụng: Hỗ trợ thông tắc tuyến sữa, điều hòa tuyến sữa.\r\n\r\nHướng dẫn sử dụng: Xem hướng dẫn bên trong hộp sản phẩm.\r\n\r\nQuy cách đóng gói: Máy hút, 1 cần bóp tay, 1 phễu chụp vú, bộ bình sữa tiêu chuẩn, 1 sách HDSD. \r\n\r\nXuất xứ thương hiệu: Australia \r\n\r\nSản xuất tại: Lắp ráp tại Trung Quốc', '2025-12-07', 'uploads/mh038.webp', 'Mẹ và bé', 'Sản phẩm dành cho mẹ', 0),
('MH039', 'Sữa rửa mặt Acne-Aid Liquid Cleanser (Chai 100ml)', NULL, 175000, '2023-12-07', 'Thành phần\r\nAqua, Sodium Lauroyl Sarcosinate, Myristic Acid, Disodium Laureth Sulfosuccinate, Glycerin, PEG-7 Glyceryl Cocoate, Cocamidopropyl Betaine, Sulfated Olive Oil, Glycol Distearate, Paraffinum Liquidum, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Disodium EDTA, Imidazolidinyl Urea, Parfum, Sorbitan Oleate, Sodium Hydroxide\r\n\r\nCông dụng\r\nSữa rửa mặt Acne-Aid Liquid Cleanser làm sạch da dịu nhẹ, giúp loại bỏ dầu cho da. Thích hợp sử dụng hàng ngày, đặc biệt cho da dầu và mụn.\r\n\r\nCách sử dụng: Lắc kỹ trước khi dùng. Mát xa một lượng sữa rửa mặt lên da ướt, rửa sạch.\r\n\r\nĐối tượng sử dụng: Dành cho da dầu & da mụn', '2025-12-07', 'uploads/mh039.jpg', 'Chăm sóc sắc đẹp', 'Chăm sóc mặt', 0),
('MH040', 'Serum trẻ hóa Balance Active Formula Serum Collagen + 2.5% Peptides (Chai 30ml)', NULL, 256000, '2023-12-07', 'Công dụng\r\n\r\n- Công thức với Marine Collagen + Peptide 2,5%\r\n\r\n- Cả hai đều được biết là có tác dụng giảm thiểu nếp nhăn và mang lại làn da săn chắc và căng mọng\r\n\r\n- Balance Active Formula Collagen + Peptides Double Booster với hàm lượng hoạt chất cao sẽ cải thiện độ mềm mại và tươi trẻ của da\r\n\r\n- Được phát triển đặc biệt cho làn da lão hóa, giúp đem lại vẻ tươi sáng rạng rỡ\r\n\r\nCách dùng\r\n\r\n- Sử dụng trong quy trình dưỡng da sáng và tối. Sau khi rửa mặt sạch và cân bằng độ ẩm cho da, cho 3-4 giọt serum ra lòng bàn tay và xoa đều. Apply lên mặt bằng động tác vỗ nhẹ từ 1-2 phút cho serum thẩm thấu vào da\r\n\r\n- Dùng sáng và tối cho hiệu quả chăm sóc da tối ưu nhất\r\n\r\n- Một số lưu ý về sản phẩm: Phù hợp cho mọi loại da. Được kiểm nghiệm bởi Viện Da liễu Anh Quốc\r\n\r\nQuy cách: Chai 30ml\r\n\r\nBảo quản: Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp\r\n\r\nXuất xứ: Anh Quốc', '2025-12-07', 'uploads/mh040.jpg', 'Chăm sóc sắc đẹp', 'Chăm sóc mặt', 0),
('MH041', 'Kem chống nắng Cancer Council Everyday Value Sunscreen SPF50 (Chai 110ml)', NULL, 395000, '2023-12-07', 'Công dụng\r\n\r\nKem chống nắng cho da hàng ngày, đồng thời giúp cung cấp độ ẩm cho da. Sản phẩm\r\n\r\nthích hợp cho da nhạy cảm\r\n\r\nCách sử dụng\r\n\r\nDùng cho vùng da khô sạch 20 phút trước khi ra ngoài. Để đảm bảo hiệu quả của kem chống nắng, hãy sử dụng lại sau mỗi 2 giờ hoặc sau khi bơi, đổ mồ hôi hoặc lau khô bằng khăn.\r\n\r\nĐóng gói: Chai 110ml\r\n\r\nBảo quản: Nơi khô ráo thoáng mát\r\n\r\nSản xuất tại: Australia', '2025-12-07', 'uploads/mh041.jpg', 'Chăm sóc sắc đẹp', 'Sản phẩm chống nắng', 0),
('MH042', 'Sữa chống nắng Cancer Council Face Day Wear Fluid Matte SPF50+ (Chai 50ml)', NULL, 395000, '2023-12-07', 'Công dụng\r\n\r\nSữa chống nắng cho da mặt hàng ngày, đồng thời giúp cung cấp độ ẩm cho da, giúp da\r\n\r\nmềm mại. Sản phẩm thích hợp cho da hỗn hợp, da dầu và da nhạy cảm\r\n\r\nCách sử dụng\r\n\r\nDùng cho vùng da khô sạch 20 phút trước khi ra ngoài. Để đảm bảo hiệu quả của kem chống nắng, hãy sử dụng lại sau mỗi 2 giờ hoặc sau khi bơi, đổ mồ hôi hoặc lau khô bằng khăn.\r\n\r\nĐóng gói: Chai 50ml\r\n\r\nBảo quản: Nơi khô ráo thoáng mát\r\n\r\nSản xuất tại: Australia', '2025-12-07', 'uploads/mh042.jpg', 'Chăm sóc sắc đẹp', 'Sản phẩm chống nắng', 0),
('MH043', 'Tăm bông người lớn Meriday Bạch Tuyết (40 que/gói)', NULL, 33000, '2023-12-07', 'Đầu bông được làm từ 100% bông xơ tự nhiên. Bông được quấn với kỹ thuật cao, làm cho bông chắc và mịn. Thân tăm bông làm từ nhựa dẻo, có độ đàn hồi tốt, thành phần không gây hại cho sức khỏe người dùng.', '2025-12-07', 'uploads/mh043.webp', 'Chăm sóc sắc đẹp', 'Dụng cụ làm đẹp', 0),
('MH044', 'Bông tẩy trang cao cấp dạng tròn Pharmacity (80 miếng/túi)', NULL, 26500, '2023-12-07', 'Thành phần: 100% Cotton thiên nhiên\r\n\r\nCông dụng:\r\nGiúp tẩy trang làm sạch da mặt\r\nĐắp mặt nạ chăm sóc da\r\nSử dụng để lau chùi móng tay, chân\r\n\r\nHướng dẫn sử dụng: Làm ướt bông bằng nước sạch, nước hoa hồng hoặc dung dịch dưỡng da rồi lau nhẹ lên mặt. Sản phẩm chỉ sử dụng một lần. \r\n\r\nBảo quản: Nơi khô ráo, tránh ánh nắng và nơi ẩm ướt\r\n\r\nQuy cách đóng gói: 80 miếng/túi\r\n\r\nXuất xứ thương hiệu: Việt Nam \r\n\r\nSản xuất tại: Việt Nam ', '2025-12-07', 'uploads/mh044.jpg', 'Chăm sóc sắc đẹp', 'Dụng cụ làm đẹp', 0),
('MH045', 'Nhiệt kế hồng ngoại Kachi JXB-315', NULL, 711000, '2023-12-07', 'Công dụng\r\n\r\n- Nhiệt kế điện tử hồng ngoại Kachi JXB-315 là sản phẩm vô cùng cấn thiết của mỗi gia đình, không gây ồn, nên nếu đối tượng sử dụng đo là trẻ nhỏ, nhiệt kế sẽ không làm ảnh hưởng đến giấc ngủ của trẻ. Đặc biệt, trong thời điểm dịch bệnh, giúp kiểm tra nhanh các trường hợp nhiệt độ cao, giảm nguy cơ dịch lan rộng tối đa. Là một chiếc nhiệt kế cực kỳ thông minh, nhờ cảm biến cực nhạy được trang bị ngay trên sản phẩm với độ chính xác cực cao, tốc độ cho kết quả cực kỳ nhanh chỉ từ 1 đến 2 giây.\r\n\r\n- Không cần sự tiếp xúc giữa vật cần đo và nhiệt kế nên có thể ứng dụng trong rất nhiều lĩnh vực của đời sống.\r\n\r\n- Có thể đo nhiệt độ của những vật có kích thước lớn.\r\n\r\n- Rất hữu ích khi đo nhiệt độ tại những vị trí nguy hiểm: chứa chất độc hại, điều kiện khắc nghiệt, thiết bị điện…\r\n\r\n- Máy đo nhiệt kế Kachi JXB-315 cảm biến hồng ngoại còn được thiết kế góc 15.5 độ vốn được xem là góc đo lý tưởng nhất để đem lại hiệu quả cao nhất. Bạn hoàn toàn không cần đặt nhiệt kế chạm vào cơ thể mà vẫn thu được kết quả đo chính xác đến từng con số.', '2025-12-07', 'uploads/mh045.jpg', 'Thiết bị y tế', 'Nhiệt kế', 0),
('MH046', 'Nhiệt kế điện tử hồng ngoại đo trán Microlife NC200, hỗ trợ đo thân nhiệt, đo nhiệt độ bề mặt', NULL, 1150000, '2023-12-07', 'Nhiệt kế điện tử hồng ngoại đo trán Microlife NC200 với thiết kế nhỏ gọn, dễ sử dụng, phù hợp cho việc đo thân nhiệt cho người lớn và trẻ em. Sản phẩm đo nhanh, không chạm, an toàn và cho kết quả chính xác, thích hợp sử dụng tại bệnh viện, phòng khám, cơ quan, trường học, hoặc trong gia đình.', '2025-12-07', 'uploads/mh046.webp', 'Thiết bị y tế', 'Nhiệt kế', 0),
('MH047', 'Máy đo huyết áp bắp tay tự động Microlife BP 3NZ1-1P, hỗ trợ tầm soát nhịp tim', NULL, 880000, '2023-12-07', 'Máy đo huyết áp bắp tay tự động Microlife BP 3NZ1-1P là thiết bị đo huyết áp thế hệ mới của Microlife được tích hợp công nghệ đo PAD, AFIB và MAM giúp đưa ra kết quả chính xác và tin cậy, cảnh báo sớm về chứng tăng huyết áp và rung nhĩ, hai nguyên nhân chính dẫn đến đột quỵ não.', '2025-12-07', 'uploads/mh047.webp', 'Thiết bị y tế', 'Máy đo huyết áp', 0),
('MH048', 'Máy đo huyết áp cổ tay điện tử CK-W132', NULL, 350000, '2023-12-07', 'Máy đo huyết áp cổ tay điện tử CK-W132 sử dụng để đo huyết áp, nhịp tim ở người lớn. Máy hoạt động dựa trên phương pháp dao động của đo huyết áp. Máy được thiết kế nhỏ gọn, dây đeo tay gắn liền với thân máy và kèm màn hình LCD rất tiện lợi.', '2025-12-07', 'uploads/mh048.png', 'Thiết bị y tế', 'Máy đo huyết áp', 0),
('MH049', 'Hộp que thử Contour Plus (2x25 Que)', NULL, 377000, '2023-12-07', 'Công dụng\r\n\r\nKết quả chính xác\r\nTiết kiệm que thử\r\nTrả kết quả sau 5 giây\r\nĐặc điểm nổi bật\r\n\r\nChỉ cần một mẩu máu nhỏ: Que thử được thiết kế để dễ dàng \"trích\" lấy máu vào đầu mẫu thử. Chỉ cần mẫu máu nhỏ 0,6 μL.\r\nKết quả nhanh: Sử dụng que thử trước thời hạn sử dụng. Nhận kết quả sau 5 giây.\r\nTiết kiệm que thử: Khả năng lấy mẫu Second-Chance cho phép bạn lấy thêm máu khi lượng máu lúc đầu không đủ để xét nghiệm\r\nLưu ý: Sử dụng với máy đo đường huyết CONTOUR®PLUS ONE và CONTOUR®PLUS\r\n\r\nXuất xứ: Nhật Bản', '2025-12-07', 'uploads/mh049.jpg', 'Thiết bị y tế', 'Máy đo đường huyết', 0),
('MH050', 'Máy đo đường huyết Contour Plus Blood Glucose Meter', NULL, 799000, '2023-12-07', 'Cách sử dụng: Xem trong tờ hướng dẫn kèm theo\r\n\r\nLưu ý: Để xa tầm tay trẻ em. Đọc kỹ hướng dẫn sử dụng trước khi dùng\r\n\r\nBảo quản: Dưới 30 độ C. Tránh ánh sáng mạnh\r\n\r\nHạn sử dụng: Xem trên bao bì\r\n\r\nQuy cách đóng gói: 1 máy đo, 2 hộp que 2x25 (50 que)\r\n\r\nNơi sản xuất\r\n\r\nMáy đo đường huyết Contour: PT PHC Indonesia, Kawasan Industri MM2100 Blok 0-1, Cikarang Barat, Bekasi 17520, Indonesia\r\n\r\nQue thử Contour: PHC Corporation, In Vitro Diagnostics Division, 2131-1 Minamigata, Toon, Ehime, 791-0395, Japan', '2025-12-07', 'uploads/mh050.jpg', 'Thiết bị y tế', 'Máy đo đường huyết', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhang`
--

CREATE TABLE `nganhang` (
  `MaNH` char(5) NOT NULL,
  `MaHT` char(5) DEFAULT NULL,
  `TenNH` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` char(5) NOT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `TenNCC` text NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` text DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Fax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(5) NOT NULL,
  `TenNV` text NOT NULL,
  `CMND` varchar(25) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` text DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `GioiTinh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhommh`
--

CREATE TABLE `nhommh` (
  `MaNMH` char(5) NOT NULL,
  `TenMH` text NOT NULL,
  `Mota` text DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxk`
--

CREATE TABLE `phieuxk` (
  `MaPXK` char(5) NOT NULL,
  `NgayXK` date NOT NULL,
  `MaDDH` char(5) DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `MaNV` char(5) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ptthanhtoan`
--

CREATE TABLE `ptthanhtoan` (
  `MaDDH` char(5) DEFAULT NULL,
  `MaKH` char(5) DEFAULT NULL,
  `PTThanhToan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tonkho`
--

CREATE TABLE `tonkho` (
  `MaKho` char(10) DEFAULT NULL,
  `MaMH` char(5) DEFAULT NULL,
  `SoLuongTon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tonkho`
--

INSERT INTO `tonkho` (`MaKho`, `MaMH`, `SoLuongTon`) VALUES
('MK001', 'MH001', 2),
('MK001', 'MH002', 2),
('MK001', 'MH003', 2),
('MK001', 'MH004', 2),
('MK001', 'MH004', 2),
('MK001', 'MH005', 2),
('MK001', 'MH006', 2),
('MK001', 'MH007', 2),
('MK001', 'MH008', 2),
('MK001', 'MH009', 2),
('MK001', 'MH010', 2),
('MK001', 'MH011', 2),
('MK001', 'MH012', 2),
('MK001', 'MH013', 2),
('MK001', 'MH014', 2),
('MK001', 'MH015', 2),
('MK001', 'MH016', 2),
('MK002', 'MH017', 2),
('MK002', 'MH018', 2),
('MK002', 'MH019', 2),
('MK002', 'MH020', 2),
('MK002', 'MH021', 2),
('MK002', 'MH022', 2),
('MK002', 'MH023', 2),
('MK002', 'MH024', 2),
('MK002', 'MH025', 2),
('MK002', 'MH026', 2),
('MK002', 'MH027', 2),
('MK002', 'MH028', 2),
('MK002', 'MH029', 2),
('MK002', 'MH030', 2),
('MK002', 'MH031', 2),
('MK002', 'MH032', 2),
('MK003', 'MH033', 2),
('MK003', 'MH034', 2),
('MK003', 'MH035', 2),
('MK003', 'MH036', 2),
('MK003', 'MH037', 2),
('MK003', 'MH038', 2),
('MK003', 'MH039', 2),
('MK003', 'MH040', 2),
('MK003', 'MH041', 2),
('MK003', 'MH042', 2),
('MK003', 'MH043', 2),
('MK003', 'MH044', 2),
('MK003', 'MH045', 2),
('MK003', 'MH046', 2),
('MK003', 'MH047', 2),
('MK003', 'MH048', 2),
('MK003', 'MH049', 2),
('MK003', 'MH050', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttgiaohang`
--

CREATE TABLE `ttgiaohang` (
  `MaVanDon` char(10) NOT NULL,
  `MaDDH` char(5) DEFAULT NULL,
  `TenNVC` text NOT NULL,
  `TTGiaoHang` text NOT NULL,
  `NgayGH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`MaAD`);

--
-- Chỉ mục cho bảng `bcdkt`
--
ALTER TABLE `bcdkt`
  ADD PRIMARY KEY (`MaBCDKT`);

--
-- Chỉ mục cho bảng `bcdtk`
--
ALTER TABLE `bcdtk`
  ADD PRIMARY KEY (`MaBCDTK`);

--
-- Chỉ mục cho bảng `ctddh`
--
ALTER TABLE `ctddh`
  ADD KEY `FK_CTDDH_MaMH` (`MaMH`),
  ADD KEY `FK_CTDDH_MaDDH` (`MaDDH`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `FK_CTHD_MaMH` (`MaMH`),
  ADD KEY `ten_khoa_ngoai` (`MaHD`);

--
-- Chỉ mục cho bảng `ctpxk`
--
ALTER TABLE `ctpxk`
  ADD KEY `FK_CTPXK_MaPXK` (`MaPXK`),
  ADD KEY `FK_CTPXK_MaMH` (`MaMH`);

--
-- Chỉ mục cho bảng `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`MaDT`),
  ADD KEY `FK_DOANHTHU_MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDDH`),
  ADD KEY `FK_DONDH_MaMH` (`MaMH`);

--
-- Chỉ mục cho bảng `hachtoan`
--
ALTER TABLE `hachtoan`
  ADD PRIMARY KEY (`MaHT`),
  ADD KEY `FK_HACHTOAN_MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_HOADON_MaNV` (`MaNV`),
  ADD KEY `ten_khoa_ngoai1` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MaKho`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`MaMH`);

--
-- Chỉ mục cho bảng `nganhang`
--
ALTER TABLE `nganhang`
  ADD PRIMARY KEY (`MaNH`),
  ADD KEY `FK_NGANHANG_MaHT` (`MaHT`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`),
  ADD KEY `FK_NHACUNGCAP_MaMH` (`MaMH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `nhommh`
--
ALTER TABLE `nhommh`
  ADD PRIMARY KEY (`MaNMH`),
  ADD KEY `FK_NHOMMH_MaMH` (`MaMH`);

--
-- Chỉ mục cho bảng `phieuxk`
--
ALTER TABLE `phieuxk`
  ADD PRIMARY KEY (`MaPXK`),
  ADD KEY `FK_PHIEUXK_MaDDH` (`MaDDH`),
  ADD KEY `FK_PHIEUXK_MaMH` (`MaMH`),
  ADD KEY `FK_PHIEUXK_MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `ptthanhtoan`
--
ALTER TABLE `ptthanhtoan`
  ADD KEY `FK_PTThanhToan_MaDDH` (`MaDDH`);

--
-- Chỉ mục cho bảng `tonkho`
--
ALTER TABLE `tonkho`
  ADD KEY `FK_TONKHO_MaKho` (`MaKho`),
  ADD KEY `FK_TONKHO_MaMH` (`MaMH`);

--
-- Chỉ mục cho bảng `ttgiaohang`
--
ALTER TABLE `ttgiaohang`
  ADD PRIMARY KEY (`MaVanDon`),
  ADD KEY `FK_TTGiaoHang_MaDDH` (`MaDDH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctddh`
--
ALTER TABLE `ctddh`
  ADD CONSTRAINT `FK_CTDDH_MaDDH` FOREIGN KEY (`MaDDH`) REFERENCES `dondathang` (`MaDDH`),
  ADD CONSTRAINT `FK_CTDDH_MaMH` FOREIGN KEY (`MaMH`) REFERENCES `mathang` (`MaMH`);

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `FK_CTHD_MaMH` FOREIGN KEY (`MaMH`) REFERENCES `mathang` (`MaMH`),
  ADD CONSTRAINT `ten_khoa_ngoai` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `ctpxk`
--
ALTER TABLE `ctpxk`
  ADD CONSTRAINT `FK_CTPXK_MaMH` FOREIGN KEY (`MaMH`) REFERENCES `mathang` (`MaMH`),
  ADD CONSTRAINT `FK_CTPXK_MaPXK` FOREIGN KEY (`MaPXK`) REFERENCES `phieuxk` (`MaPXK`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `ten_khoa_ngoai1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
