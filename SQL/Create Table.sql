CREATE TABLE `brand` (
  `SKU_BRND` varchar(300) NOT NULL,
  `NamaBrand` varchar(250) NOT NULL,
  `Tanggal` date NOT NULL,
  PRIMARY KEY (`SKU_BRND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ;

CREATE TABLE `ip_data` (
  `date_access` date NOT NULL,
  `ip` varchar(50) NOT NULL,
  `isp` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

CREATE TABLE `kategori` (
  `kode_kategori` varchar(300) NOT NULL,
  `NamaKategori` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  PRIMARY KEY (`kode_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

CREATE TABLE `produk` (
  `KodeProduk` int(11) NOT NULL AUTO_INCREMENT,
  `NamaProduk` varchar(150) NOT NULL,
  `kode_kategori` varchar(300) NOT NULL,
  `SKU_BRND` varchar(200) NOT NULL,
  `Harga` double NOT NULL,
  `Gambar` varchar(350) NOT NULL,
  `Keterangan` text DEFAULT NULL,
  `Tokopedia` varchar(300) DEFAULT NULL,
  `Blibli` varchar(300) DEFAULT NULL,
  `Shopee` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`KodeProduk`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf32;


CREATE TABLE `seo` (
  `KodeSEO` int(11) NOT NULL AUTO_INCREMENT,
  `PageTitle` varchar(300) NOT NULL,
  `MetaDescription` varchar(350) NOT NULL,
  `FokusKeyword` varchar(400) NOT NULL,
  `Content` text NOT NULL,
  `WaktuBuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `WaktuUpdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`KodeSEO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

CREATE TABLE `baner` (
  `KodeBanner` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(250) NOT NULL,
  `GambarURL` text NOT NULL,
  `TautanURL` text NOT NULL,
  `TglMulai` date NOT NULL,
  `TglAkhir` date NOT NULL,
  `WaktuBuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `WaktuUpdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`KodeBanner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
