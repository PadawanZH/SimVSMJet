CREATE DATABASE InformationRetrival;

USE InformationRetrival;

CREATE TABLE IF NOT EXISTS document
(
	ID					INT PRIMARY KEY,
    TITLE				VARCHAR(255),
    URL					VARCHAR(255),
    WORDCOUNT			LONG
);

CREATE TABLE IF NOT EXISTS terms
(
	WORD				VARCHAR(255) PRIMARY KEY,
    IDF					DOUBLE,
    LENGTH				INT
);

CREATE TABLE IF NOT EXISTS doc_terms
(
	ID					INT,
    WORD				VARCHAR(255),
    TF					DOUBLE,
    PRIMARY KEY(ID,WORD,TF),
    CONSTRAINT FOREIGN KEY (ID) REFERENCES document(ID),
    CONSTRAINT FOREIGN KEY (WORD) REFERENCES terms(WORD)
);

LOAD DATA INFILE '/home/tevenfeng/Coding/php/TxtIntoSql/document.txt' IGNORE INTO TABLE document FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA INFILE '/home/tevenfeng/Coding/php/TxtIntoSql/terms.txt' IGNORE INTO TABLE terms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA INFILE '/home/tevenfeng/Coding/php/TxtIntoSql/doc_terms.txt' IGNORE INTO TABLE doc_terms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

select * from document;
select * from terms;
select * from doc_terms;