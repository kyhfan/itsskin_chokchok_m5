-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 18-05-28 04:58
-- 서버 버전: 10.1.29-MariaDB
-- PHP 버전: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `itsskin_chokchok`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `member_info`
--

CREATE TABLE `member_info` (
  `idx` int(11) NOT NULL COMMENT '순번',
  `mb_ipaddr` varchar(30) NOT NULL COMMENT 'IP 주소',
  `mb_name` varchar(100) NOT NULL COMMENT '참여자 이름',
  `mb_phone` varchar(40) NOT NULL COMMENT '참여자 전화번호',
  `mb_addr` varchar(255) NOT NULL COMMENT '주소',
  `mb_week` varchar(10) NOT NULL COMMENT '선택한 요일',
  `mb_gubun` varchar(30) NOT NULL COMMENT '유입 구분(PC, MOBILE)',
  `mb_media` varchar(50) NOT NULL COMMENT '유입매체',
  `mb_regdate` datetime NOT NULL COMMENT '등록잉ㄹ자'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `member_info5`
--

CREATE TABLE `member_info5` (
  `idx` int(11) NOT NULL COMMENT '순번',
  `mb_ipaddr` varchar(30) NOT NULL COMMENT 'IP 주소',
  `mb_name` varchar(100) NOT NULL COMMENT '참여자 이름',
  `mb_phone` varchar(40) NOT NULL COMMENT '참여자 전화번호',
  `mb_addr` varchar(255) NOT NULL COMMENT '주소',
  `mb_gubun` varchar(30) NOT NULL COMMENT '유입 구분(PC, MOBILE)',
  `mb_media` varchar(50) NOT NULL COMMENT '유입매체',
  `mb_regdate` datetime NOT NULL COMMENT '등록잉ㄹ자'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `share_info`
--

CREATE TABLE `share_info` (
  `idx` int(11) NOT NULL COMMENT '순번',
  `sns_media` varchar(10) NOT NULL COMMENT 'SNS 유입매체',
  `sns_gubun` varchar(20) NOT NULL COMMENT '유입 구분',
  `sns_ipaddr` varchar(20) NOT NULL COMMENT 'SNS IP주소',
  `inner_media` varchar(100) NOT NULL COMMENT '유입 media',
  `sns_regdate` datetime NOT NULL COMMENT '공유한 날짜'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SNS 공유 정보 테이블';

-- --------------------------------------------------------

--
-- 테이블 구조 `tracking_info`
--

CREATE TABLE `tracking_info` (
  `idx` int(11) NOT NULL COMMENT '순번',
  `tracking_media` varchar(30) DEFAULT NULL COMMENT '유입매체',
  `tracking_refferer` varchar(255) DEFAULT NULL COMMENT '유입 레퍼러주소',
  `tracking_ipaddr` varchar(20) DEFAULT NULL COMMENT '유입 IP',
  `tracking_date` datetime NOT NULL COMMENT '유입 날짜',
  `tracking_gubun` varchar(30) DEFAULT NULL COMMENT '유입 구분(PC, MOBILE)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='유입정보 테이블';

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `member_info`
--
ALTER TABLE `member_info`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `mb_phone` (`mb_phone`),
  ADD KEY `mb_phone_2` (`mb_phone`);

--
-- 테이블의 인덱스 `member_info5`
--
ALTER TABLE `member_info5`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `mb_phone` (`mb_phone`),
  ADD KEY `mb_phone_2` (`mb_phone`);

--
-- 테이블의 인덱스 `share_info`
--
ALTER TABLE `share_info`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `tracking_info`
--
ALTER TABLE `tracking_info`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `member_info`
--
ALTER TABLE `member_info`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '순번';

--
-- 테이블의 AUTO_INCREMENT `member_info5`
--
ALTER TABLE `member_info5`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '순번';

--
-- 테이블의 AUTO_INCREMENT `share_info`
--
ALTER TABLE `share_info`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '순번';

--
-- 테이블의 AUTO_INCREMENT `tracking_info`
--
ALTER TABLE `tracking_info`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '순번';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
