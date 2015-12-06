CREATE DATABASE InformationRetrival;

USE InformationRetrival;

CREATE TABLE IF NOT EXISTS document
(
	ID					INT PRIMARY KEY,
    TITLE				VARCHAR(255),
    URL					VARCHAR(255),
    WORDCOUNT			LONG
);

CREATE TABLE IF NOT EXISTS titleTerms
(
	WORD				VARCHAR(255) PRIMARY KEY,
    IDF					DOUBLE,
    LENGTH				INT
);

CREATE TABLE IF NOT EXISTS doc_titleTerms
(
	ID					INT,
    WORD				VARCHAR(255),
    TF					INT,
    OFFSET				LONG,
    PRIMARY KEY(ID,WORD,TF),
    CONSTRAINT FOREIGN KEY (ID) REFERENCES document(ID),
    CONSTRAINT FOREIGN KEY (WORD) REFERENCES titleTerms(WORD)
);

CREATE TABLE IF NOT EXISTS contentTerms
(
	WORD				VARCHAR(255) PRIMARY KEY,
    IDF					DOUBLE,
    LENGTH				INT
);

CREATE TABLE IF NOT EXISTS doc_contentTerms
(
	ID					INT,
    WORD				VARCHAR(255),
    TF					INT,
    OFFSET				LONG,
    PRIMARY KEY(ID,WORD,TF),
    CONSTRAINT FOREIGN KEY (ID) REFERENCES document(ID),
    CONSTRAINT FOREIGN KEY (WORD) REFERENCES contentTerms(WORD)
);

LOAD DATA LOCAL INFILE '/home/zhangan/Workspace/TxtIntoSql/document.txt' IGNORE INTO TABLE document FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA LOCAL INFILE '/home/zhangan/Workspace/TxtIntoSql/titleTerms.txt' IGNORE INTO TABLE titleTerms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA LOCAL INFILE '/home/zhangan/Workspace/TxtIntoSql/contentTerms.txt' IGNORE INTO TABLE contentTerms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA LOCAL INFILE '/home/zhangan/Workspace/TxtIntoSql/doc_titleTerms.txt' IGNORE INTO TABLE doc_titleTerms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
LOAD DATA LOCAL INFILE '/home/zhangan/Workspace/TxtIntoSql/doc_contentTerms.txt' IGNORE INTO TABLE doc_contentTerms FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

select * from document;
select * from titleTerms;
select * from contentTerms;
select * from doc_titleTerms;
select * from doc_contentTerms;