     ALTER TABLE article ADD title_en VARCHAR(255) NOT NULL, ADD resume_en VARCHAR(255) NOT NULL, ADD description_en LONGTEXT NOT NULL;
     ALTER TABLE article CHANGE view view INT DEFAULT NULL;
