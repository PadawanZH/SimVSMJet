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

load data infile "/home/tevenfeng/Coding/php/TxtIntoSql/document.txt" IGNORE into table document fields terminated by "," lines terminated by "\n"; 
load data infile "/home/tevenfeng/Coding/php/TxtIntoSql/titleTerms.txt" IGNORE into table titleTerms fields terminated by "," lines terminated by "\n";
load data infile "/home/tevenfeng/Coding/php/TxtIntoSql/contentTerms.txt" IGNORE into table contentTerms fields terminated by "," lines terminated by "\n";
load data infile "/home/tevenfeng/Coding/php/TxtIntoSql/doc_titleTerms.txt" IGNORE into table doc_titleTerms fields terminated by "," lines terminated by "\n";
load data infile "/home/tevenfeng/Coding/php/TxtIntoSql/doc_contentTerms.txt" IGNORE into table doc_contentTerms fields terminated by "," lines terminated by "\n";

select * from document;
select * from titleTerms;
select * from contentTerms;
select * from doc_titleTerms;
select * from doc_contentTerms;