-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2020 at 11:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP DATABASE IF EXISTS guest_form;
CREATE DATABASE guest_form;
USE guest_form;

CREATE TABLE comments (
  item_id INT AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  body longtext NOT NULL,
  PRIMARY KEY(item_id)
);

--
-- Dumping data for table `articles`
--

INSERT INTO `comments` (`item_id`, `name`, `body`) VALUES ('item_id', 'name', 'body');

