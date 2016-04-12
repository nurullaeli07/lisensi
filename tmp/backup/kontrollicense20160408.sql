DROP TABLE t_departement;

CREATE TABLE `t_departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_departement` varchar(20) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO t_departement VALUES("1","FA","Finance And Accounting","Aktif");
INSERT INTO t_departement VALUES("2","GA","General Affairs","Aktif");
INSERT INTO t_departement VALUES("3","PC","Production Control","Aktif");
INSERT INTO t_departement VALUES("4","PE & QA","Production Engineering & Quality Analysys","Aktif");
INSERT INTO t_departement VALUES("5","Planning","Planning","Aktif");
INSERT INTO t_departement VALUES("6","PRC","Procurement","Aktif");
INSERT INTO t_departement VALUES("7","Production","Production","Aktif");
INSERT INTO t_departement VALUES("11","QQ","QQQQ","Tidak Aktif");
INSERT INTO t_departement VALUES("12","www","AA","Tidak Aktif");



DROP TABLE t_departement_history;

CREATE TABLE `t_departement_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_departement` varchar(30) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO t_departement_history VALUES("1","FA","Finance And Accounting","Aktif","","","2016-03-15 15:13:06","nurul","");
INSERT INTO t_departement_history VALUES("2","GA","General Affairs","Aktif","","","2016-03-15 15:13:23","nurul","");
INSERT INTO t_departement_history VALUES("3","PC","Production Control","Aktif","","","2016-03-15 15:14:10","nurul","");
INSERT INTO t_departement_history VALUES("4","PE & QA","Production Engineering & Quality Analysys","Aktif","","","2016-03-15 15:14:52","nurul","");
INSERT INTO t_departement_history VALUES("5","Planning","Planning","Aktif","","","2016-03-15 15:16:47","nurul","");
INSERT INTO t_departement_history VALUES("6","PRC","Procurement","Aktif","","","2016-03-15 15:17:08","nurul","");
INSERT INTO t_departement_history VALUES("7","Production","Production","Aktif","","","2016-03-15 15:17:29","nurul","");
INSERT INTO t_departement_history VALUES("8","www","AA","Tidak Aktif","Input","-","2016-04-05 11:49:22","nurul","::1");
INSERT INTO t_departement_history VALUES("9","www","AA","Tidak Aktif","Edit","aaaaaaaaaaaaaaaaaaaaaaa","2016-04-05 11:50:23","nurul","::1");



DROP TABLE t_leveluser;

CREATE TABLE `t_leveluser` (
  `level` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_leveluser VALUES("admin","Administrator","Hak Akses Full");
INSERT INTO t_leveluser VALUES("user","user biasa","Hak Aksas Input dan Edit Data");



DROP TABLE t_license;

CREATE TABLE `t_license` (
  `id_license` varchar(10) NOT NULL,
  `pengembang` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `software` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_license` varchar(30) NOT NULL,
  `no_part_license` varchar(50) NOT NULL,
  `jenis_license` varchar(30) NOT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vendor` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_bantex` varchar(4) NOT NULL,
  `section_pemilik` varchar(30) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pic_input` varchar(20) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_cek` varchar(20) NOT NULL,
  `tgl_cek` datetime NOT NULL,
  `file_gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_license`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_license VALUES("LC0001","Microsoft","Windows Server Standard","14522067","-","-","-","Berca Hardayaperkasa","0001","Information System","1","2016-04-07","2016-03-02","-36","nurul","2016-04-07 03:31:37","nurul","2016-04-07 03:32:32","../scan/LC0001.tif");
INSERT INTO t_license VALUES("LC0002","Balsamiq","Balsamiq","-","-","-","-","Berca Hardayaperkasa","0001","Enviroment Engineering","1","2016-04-07","2017-12-10","612","nurul","2016-04-07 03:29:59","","0000-00-00 00:00:00","../scan/LC0002.tif");
INSERT INTO t_license VALUES("LC0003","AVG","AVG Internal Security","46008476","FQC-02872","Open License Purchase (OLP)","-","Berca Hardayaperkasa","0003","Information System","2","2016-04-07","2018-01-20","653","nurul","2016-04-07 03:36:50","","0000-00-00 00:00:00","");



DROP TABLE t_license_history;

CREATE TABLE `t_license_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_license` varchar(10) NOT NULL,
  `pengembang` varchar(30) NOT NULL,
  `software` varchar(50) NOT NULL,
  `no_license` varchar(30) NOT NULL,
  `no_part_license` varchar(50) NOT NULL,
  `jenis_license` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `no_bantex` varchar(5) NOT NULL,
  `section_pemilik` varchar(30) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_cek` varchar(20) DEFAULT NULL,
  `tgl_cek` datetime NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text,
  `ip_address` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO t_license_history VALUES("1","LC0001","Microsoft","Windows Server Standard","-","-","-","-","Berca Hardayaperkasa","0001","Information System","1","2016-04-07","2016-05-26","49","nurul","2016-04-07 02:55:30","","0000-00-00 00:00:00","Insert","","::1");
INSERT INTO t_license_history VALUES("2","LC0001","Microsoft","Windows Server Standard","14522067","-","-","-","Berca Hardayaperkasa","0001","Information System","1","2016-04-07","2016-05-26","49","nurul","2016-04-07 02:59:08","","0000-00-00 00:00:00","Update","-","::1");
INSERT INTO t_license_history VALUES("3","LC0001","Microsoft","Windows Server Standard","14522067","-","-","-","Berca Hardayaperkasa","0001","Information System","1","2016-04-07","2016-05-26","49","nurul","2016-04-07 02:59:08","nurul","2016-04-07 02:59:53","Check","","::1");
INSERT INTO t_license_history VALUES("4","LC0002","Balsamiq","Balsamiq","-","-","-","-","Berca Hardayaperkasa","0001","Enviroment Engineering","1","2016-04-07","2017-12-10","612","nurul","2016-04-07 03:29:59","","0000-00-00 00:00:00","Insert","-","::1");
INSERT INTO t_license_history VALUES("5","LC0001","Microsoft","Windows Server Standard","14522067","-","-","-","Berca Hardayaperkasa","0001","Information System","1","2016-04-07","2016-03-02","-36","nurul","2016-04-07 03:31:37","nurul","2016-04-07 03:32:32","Check","","::1");
INSERT INTO t_license_history VALUES("6","LC0003","AVG","AVG Internal Security","46008476","FQC-02872","Open License Purchase (OLP)","-","Berca Hardayaperkasa","0003","Information System","2","2016-04-07","2018-01-20","653","nurul","2016-04-07 03:36:50","","0000-00-00 00:00:00","Insert","-","::1");



DROP TABLE t_pc;

CREATE TABLE `t_pc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pc` varchar(20) NOT NULL,
  `id_pc` varchar(30) NOT NULL,
  `section_pemilik` varchar(30) NOT NULL,
  `id_lisensi` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `pic_instalasi` varchar(20) NOT NULL,
  `tgl_instalasi` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO t_pc VALUES("1","IS-03NB","MN1157","Information System","LC0004","1","Nanang","2016-03-29");
INSERT INTO t_pc VALUES("2","IS-03NB","MN1157","Accounting","LC0001","1","Nurul","2016-03-29");
INSERT INTO t_pc VALUES("3","-","-","Information System","LC0008","1","Nurul","2016-04-05");



DROP TABLE t_pc_history;

CREATE TABLE `t_pc_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pc` varchar(30) NOT NULL,
  `id_pc` varchar(11) NOT NULL,
  `section_pemilik` varchar(30) NOT NULL,
  `id_lisensi` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `pic_instalasi` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tgl_instalasi` date NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO t_pc_history VALUES("1","-","-","Information System","LC0008","1","Nurul","2016-04-05","Input","-","2016-04-05 02:42:59","nurul","::1");
INSERT INTO t_pc_history VALUES("2","IS-03NB","MN1157","Accounting","LC0008","10","Nanang","2016-03-29","Edit","-","2016-04-05 15:01:03","nurul","::1");
INSERT INTO t_pc_history VALUES("3","IS-03NB","MN1157","Information System","LC0001","1","Nurul","2016-03-29","Edit","-","2016-04-05 15:01:44","nurul","::1");
INSERT INTO t_pc_history VALUES("4","-","-","Information System","LC0008","10","Nurul","2016-04-05","Edit","-","2016-04-05 15:03:37","nurul","::1");
INSERT INTO t_pc_history VALUES("5","-","-","Information System","LC0008","1","Nurul","2016-04-05","Edit","-","2016-04-05 15:04:52","nurul","::1");



DROP TABLE t_pengembang;

CREATE TABLE `t_pengembang` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pengembang` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO t_pengembang VALUES("1","Acronis");
INSERT INTO t_pengembang VALUES("2","Adobe");
INSERT INTO t_pengembang VALUES("3","Auto Desk");
INSERT INTO t_pengembang VALUES("4","AVG");
INSERT INTO t_pengembang VALUES("5","Balsamiq");
INSERT INTO t_pengembang VALUES("6","Core Tecchnologies");
INSERT INTO t_pengembang VALUES("7","Corel");
INSERT INTO t_pengembang VALUES("8","Cyberlink Corp");
INSERT INTO t_pengembang VALUES("9","Edraw Soft");
INSERT INTO t_pengembang VALUES("10","IBM");
INSERT INTO t_pengembang VALUES("11","Infragistics");
INSERT INTO t_pengembang VALUES("12","Investintech");
INSERT INTO t_pengembang VALUES("13","IP Guard");
INSERT INTO t_pengembang VALUES("14","Manage Engine");
INSERT INTO t_pengembang VALUES("15","Microsoft");
INSERT INTO t_pengembang VALUES("16","MMPI");
INSERT INTO t_pengembang VALUES("17","Monarch");
INSERT INTO t_pengembang VALUES("18","SAP");
INSERT INTO t_pengembang VALUES("19","SIGMA");
INSERT INTO t_pengembang VALUES("20","Solid Works");
INSERT INTO t_pengembang VALUES("21","Symantec");
INSERT INTO t_pengembang VALUES("22","UTM");
INSERT INTO t_pengembang VALUES("23","ZWCAD");



DROP TABLE t_pengembang_history;

CREATE TABLE `t_pengembang_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengembang` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `aksi` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO t_pengembang_history VALUES("1","COBA","Input","-","2016-04-05 08:56:41","nurul","::1");
INSERT INTO t_pengembang_history VALUES("2","TRIAL","Edit","latihan","2016-04-05 08:57:32","nurul","::1");
INSERT INTO t_pengembang_history VALUES("3","DEL","Input","-","2016-04-05 09:06:22","nurul","::1");
INSERT INTO t_pengembang_history VALUES("4","COBA","Input","-","2016-04-05 10:50:12","nurul","::1");
INSERT INTO t_pengembang_history VALUES("5","COBAAAAA","Edit","coba","2016-04-05 10:50:35","nurul","::1");
INSERT INTO t_pengembang_history VALUES("6","wwwwwwwwwww","Input","-","2016-04-05 10:59:24","nurul","::1");
INSERT INTO t_pengembang_history VALUES("7","WWW","Edit","-","2016-04-05 11:00:23","nurul","::1");
INSERT INTO t_pengembang_history VALUES("8","yyy","Input","-","2016-04-05 11:04:15","nurul","::1");
INSERT INTO t_pengembang_history VALUES("9","Y","Edit","-","2016-04-05 11:04:29","nurul","::1");
INSERT INTO t_pengembang_history VALUES("10","O","Input","-","2016-04-05 11:06:49","nurul","::1");
INSERT INTO t_pengembang_history VALUES("11","OOOOOOOOO","Edit","-","2016-04-05 11:07:02","nurul","::1");



DROP TABLE t_section;

CREATE TABLE `t_section` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `departement` varchar(20) NOT NULL,
  `section` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO t_section VALUES("1","Finance","Accounting");
INSERT INTO t_section VALUES("2","Production","Black Poly");
INSERT INTO t_section VALUES("3","Finance","Costa Accounting");
INSERT INTO t_section VALUES("4","Planning","Enviroment Engineering");
INSERT INTO t_section VALUES("5","Production","Electrical Part 1");
INSERT INTO t_section VALUES("6","Production","Electrical Part 2");
INSERT INTO t_section VALUES("7","Production","Final Assembling 1");
INSERT INTO t_section VALUES("8","Production","Final Assembling 2");
INSERT INTO t_section VALUES("9","Production","Final Assembling 3");
INSERT INTO t_section VALUES("10","Production","Final Assembling 4");
INSERT INTO t_section VALUES("11","Production Control","Finish Good Control");
INSERT INTO t_section VALUES("12","General Affairs","General Affairs");
INSERT INTO t_section VALUES("13","General Affairs","Human Capital Development");
INSERT INTO t_section VALUES("14","Production Control","Incoming Control");
INSERT INTO t_section VALUES("15","General Affairs","Industrial Relation");
INSERT INTO t_section VALUES("16","Production Control","Information System");
INSERT INTO t_section VALUES("17","Planning","K3 Dan Kedisiplinan");
INSERT INTO t_section VALUES("18","Planning","Kaizen Promotion");
INSERT INTO t_section VALUES("19","Procurement","Material Control");
INSERT INTO t_section VALUES("20","Production","Mechanical Part 1");
INSERT INTO t_section VALUES("21","Production","Mechanical Part 2");
INSERT INTO t_section VALUES("22","Production","Maintenance");
INSERT INTO t_section VALUES("23","Production Control","Production Control");
INSERT INTO t_section VALUES("24","Production","Production Engineering 1");
INSERT INTO t_section VALUES("25","Production","Production Engineering 2");
INSERT INTO t_section VALUES("26","Production","Production Engineering 3");
INSERT INTO t_section VALUES("27","Production","Production Engineering 4");
INSERT INTO t_section VALUES("28","Production","Production Planning");
INSERT INTO t_section VALUES("29","Production Control","Production System");
INSERT INTO t_section VALUES("30","PE & QA","Quality Assurance");
INSERT INTO t_section VALUES("31","Production Control","Service Part Center");
INSERT INTO t_section VALUES("32","General Affairs","Technology Development");
INSERT INTO t_section VALUES("33","Production","Wood Working 1");
INSERT INTO t_section VALUES("34","Production","Wood Working 2");
INSERT INTO t_section VALUES("35","Production","Wood Working 3");
INSERT INTO t_section VALUES("36","Production","Wood Working 3");
INSERT INTO t_section VALUES("40","BB","BBB");
INSERT INTO t_section VALUES("39","AA","AAA");
INSERT INTO t_section VALUES("41","A","AAAAA");
INSERT INTO t_section VALUES("42","QQQQ","AAA");



DROP TABLE t_section_history;

CREATE TABLE `t_section_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO t_section_history VALUES("1","Production","Production Planner","","","2016-03-15 19:24:01","nurul","");
INSERT INTO t_section_history VALUES("2","AAA","QQQQ","","","2016-04-01 04:05:00","nurul","::1");



DROP TABLE t_software;

CREATE TABLE `t_software` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_software` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pengembang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

INSERT INTO t_software VALUES("1","Acrobat","Microsoft");
INSERT INTO t_software VALUES("2","Acronis","Acronis");
INSERT INTO t_software VALUES("3","AD Audit Plus","");
INSERT INTO t_software VALUES("4","AD Manager Plus","");
INSERT INTO t_software VALUES("5","Always Up","");
INSERT INTO t_software VALUES("6","AutoCAD","");
INSERT INTO t_software VALUES("7","AVG Internal Security","AVG");
INSERT INTO t_software VALUES("8","Balsamiq","Balsamiq");
INSERT INTO t_software VALUES("9","CorelDraw","Adobe");
INSERT INTO t_software VALUES("10","Creativecloud Team","");
INSERT INTO t_software VALUES("11","Dreamweaver CS6","");
INSERT INTO t_software VALUES("12","Edraw Way","");
INSERT INTO t_software VALUES("13","Ideal Administration","");
INSERT INTO t_software VALUES("14","Illustrator CS5","Adobe");
INSERT INTO t_software VALUES("15","IP Guard","");
INSERT INTO t_software VALUES("16","Joomla","");
INSERT INTO t_software VALUES("17","Kando ni Professional","");
INSERT INTO t_software VALUES("18","Lotus Domino","");
INSERT INTO t_software VALUES("19","Lync 2013","");
INSERT INTO t_software VALUES("20","Microsoft Project","Microsoft");
INSERT INTO t_software VALUES("21","MMPI","MMPI");
INSERT INTO t_software VALUES("22","Monarch Pro","Monarch");
INSERT INTO t_software VALUES("23","Navicat Premium (Windows)","");
INSERT INTO t_software VALUES("24","Net Advantage","");
INSERT INTO t_software VALUES("25","Office Enterprise","Microsoft");
INSERT INTO t_software VALUES("26","Office Professional","Microsoft");
INSERT INTO t_software VALUES("27","Office Standard","Microsoft");
INSERT INTO t_software VALUES("28","Outlook 2013","");
INSERT INTO t_software VALUES("29","PDF Conventor","");
INSERT INTO t_software VALUES("30","Photoshop","Adobe");
INSERT INTO t_software VALUES("31","Power Director","");
INSERT INTO t_software VALUES("32","Project","");
INSERT INTO t_software VALUES("33","SAP","");
INSERT INTO t_software VALUES("34","Solidworks","");
INSERT INTO t_software VALUES("35","SPC XL","");
INSERT INTO t_software VALUES("36","SQL CAL","");
INSERT INTO t_software VALUES("37","SQL Server Standard","");
INSERT INTO t_software VALUES("38","Symantec Backup Exec","Symantec");
INSERT INTO t_software VALUES("39","Symantec Endpoint Protection","Symantec");
INSERT INTO t_software VALUES("40","USB Over Network","");
INSERT INTO t_software VALUES("41","UTM Fortigate","");
INSERT INTO t_software VALUES("42","Visual Studio","");
INSERT INTO t_software VALUES("43","Windows 7 Professional","Microsoft");
INSERT INTO t_software VALUES("44","Windows 7 Ultimate","Microsoft");
INSERT INTO t_software VALUES("45","Windows 8 Professional","Microsoft");
INSERT INTO t_software VALUES("46","Windows Advanced","Microsoft");
INSERT INTO t_software VALUES("47","Windows NT CAL","Microsoft");
INSERT INTO t_software VALUES("48","Windows Professional","Microsoft");
INSERT INTO t_software VALUES("49","Windows Remote Dekstop CAL","Microsoft");
INSERT INTO t_software VALUES("50","Windows Server CAL","Microsoft");
INSERT INTO t_software VALUES("51","Windows Server Enterprise","Microsoft");
INSERT INTO t_software VALUES("52","Windows Server Standard","Microsoft");
INSERT INTO t_software VALUES("53","ZWCAD","");
INSERT INTO t_software VALUES("54","YYYYYYYYYYYYYYYYYYYYY","Auto Desk");



DROP TABLE t_software_history;

CREATE TABLE `t_software_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_software` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pengembang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO t_software_history VALUES("1","aaa","ACC","","","2016-03-15 19:10:22","nurul","");
INSERT INTO t_software_history VALUES("3","YY","WWW","","","2016-04-01 03:51:12","nurul","::1");
INSERT INTO t_software_history VALUES("4","o","Adobe","","","2016-04-05 08:40:50","nurul","::1");
INSERT INTO t_software_history VALUES("5","YYYYYYY","Adobe","Input","-","2016-04-05 11:20:28","nurul","::1");
INSERT INTO t_software_history VALUES("6","YYYYYYYYYYYYYYYYYYYYY","Auto Desk","Edit","--","2016-04-05 11:25:50","nurul","::1");



DROP TABLE t_status;

CREATE TABLE `t_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO t_status VALUES("1","Aktif");
INSERT INTO t_status VALUES("2","Tidak Aktif");



DROP TABLE t_user;

CREATE TABLE `t_user` (
  `nama_lengkap` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO t_user VALUES("ADMINISTRATOR","admin","e64b78fc3bc91bcbc7dc232ba8ec59e0","admin");
INSERT INTO t_user VALUES("NURUL LAELI MAHMUDAH","nurul","20bf7be2ab39a581561ab7ed17a1a9ca","admin");
INSERT INTO t_user VALUES("NI NYOMAN LUHPUTU","nyoman","023efc855534da174f0425560a7ababc","user");
INSERT INTO t_user VALUES("TRISYA NADYA R","trisya","f63ce0e3b93b4e1ab60aa0ae7c608b8b","user");
INSERT INTO t_user VALUES("NANANG SAFIYAN","nanang","a16feae7229ad64ff38a7770dab5be2f","admin");



DROP TABLE t_user_history;

CREATE TABLE `t_user_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `aksi` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO t_user_history VALUES("1","ADMINISTRATOR","admin","e64b78fc3bc91bcbc7dc232ba8ec59","admin","","","2016-04-04 14:02:27","nurul","::1");
INSERT INTO t_user_history VALUES("2","NURUL LAELI MAHMUDAH","nurul","20bf7be2ab39a581561ab7ed17a1a9","admin","","","2016-04-04 14:08:20","admin","::1");
INSERT INTO t_user_history VALUES("3","NI NYOMAN LUHPUTU","nyoman","023efc855534da174f0425560a7aba","user","Insert","-","2016-04-08 09:07:19","nurul","::1");
INSERT INTO t_user_history VALUES("4","TRISYA NADYA R","trisya","8b90b6ea634a50bbd204eea2b4a896","admin","Insert","-","2016-04-08 09:08:04","nurul","::1");
INSERT INTO t_user_history VALUES("5","NANANG SAFIYAN","nanang","a16feae7229ad64ff38a7770dab5be","admin","Insert","-","2016-04-08 09:08:30","nurul","::1");
INSERT INTO t_user_history VALUES("6","TRISYA NADYA R","trisya","f63ce0e3b93b4e1ab60aa0ae7c608b","user","Update","-","2016-04-08 09:08:51","nurul","::1");



DROP TABLE t_vendor;

CREATE TABLE `t_vendor` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO t_vendor VALUES("1","Berca Hardayaperkasa","Berca Building, Jl. Abdul Muis No. 62 Jakarta Pusat","marketing@berca.co.id"," (+62-21) 380-0902","(+62-21) 351-8814");
INSERT INTO t_vendor VALUES("2","PT. Trikarsa","Jl. Raya Inspeksi Klaimalang, Jatimulya - Bekasi","info@trikarsa.co.id","(+62-21) 88351000","(+62-21) 88351007");
INSERT INTO t_vendor VALUES("3","Tisa Computer","Harco Mangga Dua Blok K 12-12A \nJln. Mangga Dua Raya - Jakarta Pusat"," tisacomcomputer@yahoo.com ","(021) 6121430(H)","(021) 6121432 ");
INSERT INTO t_vendor VALUES("4","aaaaaaaaaaaaaa","aaaaaaaaaaaaaa","info@trikarsa.co.id","(8908) 989-7897","(9789) 789-7897");



DROP TABLE t_vendor_history;

CREATE TABLE `t_vendor_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `note` text,
  `tgl_input` datetime NOT NULL,
  `pic_input` varchar(30) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO t_vendor_history VALUES("1","Berca Hardayaperkasa","Berca Building, Jl. Abdul Muis No. 62 Jakarta Pusat","marketing@berca.co.id"," (+62-21) 380-0902","(+62-21) 351-8814","","","2016-03-24 07:58:11","nurul","");
INSERT INTO t_vendor_history VALUES("2","PT. Trikarsa","Jl. Raya Inspeksi Klaimalang, Jatimulya - Bekasi","info@trikarsa.co.id","(+62-21) 88351000","(+62-21) 88351007","","","2016-03-24 07:59:34","nurul","");
INSERT INTO t_vendor_history VALUES("3","Tisa Computer","Harco Mangga Dua Blok K 12-12A Jln. Mangga Dua Raya - Jakarta Pusat"," tisacomcomputer@yahoo.com ","(021) 6121430(H)","(021) 6121432 ","","","2016-03-24 01:49:02","nurul","");
INSERT INTO t_vendor_history VALUES("4","a","a","info@trikarsa.co.id","(8908) 989-7897","(9789) 789-7897","Input","-","2016-04-05 11:38:11","nurul","::1");
INSERT INTO t_vendor_history VALUES("5","aaaaaaaaaaaaaa","aaaaaaaaaaaaaa","info@trikarsa.co.id","(8908) 989-7897","(9789) 789-7897","Edit","-","2016-04-05 11:40:23","nurul","::1");



