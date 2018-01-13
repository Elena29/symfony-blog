DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE post
(
  id          INT AUTO_INCREMENT PRIMARY KEY,
  title       VARCHAR(255) DEFAULT ''            NOT NULL,
  description TEXT                               NULL,
  date_add    DATETIME                           NOT NULL,
  date_mod    DATETIME DEFAULT CURRENT_TIMESTAMP NULL
) ENGINE = InnoDB;

LOCK TABLES `post` WRITE;
INSERT INTO `post` (id, title, description, date_add, date_mod)
VALUES (1, 'test post', 'test desc', '2018-01-13', '2018-01-13');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

use test_db;