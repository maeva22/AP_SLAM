# -----------------------------------------------------------------------------
#       DATABASE de l''aplication
# -----------------------------------------------------------------------------

DROP DATABASE IF EXISTS PPENR;

CREATE DATABASE IF NOT EXISTS PPENR;
USE PPENR;
# -----------------------------------------------------------------------------
#       *TABLE : MOYENCOM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOYENCOM
 (
   ID_MOYEN SMALLINT AUTO_INCREMENT ,
   LIBELLE_MOYEN CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_MOYEN) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 



# -----------------------------------------------------------------------------
#      * TABLE : SPECIALIT�
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPECIALITE
 ( ID_SPECIALITE SMALLINT AUTO_INCREMENT  ,
   ID_PROF SMALLINT NOT NULL  ,
   LIBELLE_SPECIALITE CHAR(4) NOT NULL  
   , PRIMARY KEY (ID_SPECIALITE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : ETUDIANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETUDIANT
 (
   ID_ETUDIANT SMALLINT  AUTO_INCREMENT ,
   ID_PROF SMALLINT NOT NULL  ,
   ID_CLASSE INTEGER NOT NULL  ,
   ID_SPECIALITE SMALLINT NOT NULL  ,
   NOM_ETUDIANT CHAR(32) NOT NULL  ,
   PRENOM_ETUDIANT CHAR(32) NOT NULL  ,
   ADR_ETUDIANT CHAR(32) NOT NULL  ,
   CP_ETUDIANT CHAR(5) NOT NULL  ,
   VILLE_ETUDIANT CHAR(32) NOT NULL  ,
   EMAIL CHAR(32) NOT NULL  ,
   TEL_ETUDIANT CHAR(10) NOT NULL ,
   MDP VARCHAR(100) NOT NULL
   , PRIMARY KEY (ID_ETUDIANT) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 

# -----------------------------------------------------------------------------
#       TABLE : STAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STAGE
 (
   ID_STAGE SMALLINT  AUTO_INCREMENT ,
   ID_ETUDIANT SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  ,
   DATE_FIN DATE NOT NULL  ,
   DATE_DEBUT DATE NOT NULL  ,
   ETAT CHAR(2) NOT NULL  ,
   STATUT_CONVENTION CHAR(10) NOT NULL ;
   , PRIMARY KEY (ID_STAGE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;



# -----------------------------------------------------------------------------
#       *TABLE : PROFESSEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROFESSEUR
 (
   ID_PROF SMALLINT AUTO_INCREMENT ,
   NOM_PROF CHAR(32) NOT NULL  ,
   PRENOM_PROF CHAR(32) NOT NULL  ,
   EMAIL CHAR(32) NOT NULL  ,
   TEL_PROF CHAR(10) NOT NULL  ,
   MDP VARCHAR(100) NOT NULL
   , PRIMARY KEY (ID_PROF) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : DEMARCHE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEMARCHE
 (
   ID_DEMARCHE SMALLINT AUTO_INCREMENT ,
   ID_ETUDIANT SMALLINT NOT NULL  ,
   ID_MOYEN SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  ,
   DATE_DEMARCHE DATETIME NOT NULL  ,
   COMMENTAIRE CHAR(255) NOT NULL  
   , PRIMARY KEY (ID_DEMARCHE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;



# -----------------------------------------------------------------------------
#      * TABLE : ENTREPRISE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENTREPRISE
 (
   ID_ENTREPRISE SMALLINT AUTO_INCREMENT ,
   NOM_ENTREPRISE CHAR(32) NOT NULL  ,
   ADRESSE_ENTREPRISE CHAR(255) NOT NULL  ,
   CP_ENTREPRISE CHAR(5) NOT NULL  ,
   VILLE_ENTREPRISE CHAR(32) NOT NULL  ,
   TEL_ENTREPRISE CHAR(10) NOT NULL  ,
   EMAIL_ENTREPRISE CHAR(32) NOT NULL  ,
   REFUS_ANNEESIO1 BOOLEAN NOT NULL DEFAULT FALSE ,
   REFUS_ANNEE_SIO2 BOOLEAN NOT NULL DEFAULT FALSE
   , PRIMARY KEY (ID_ENTREPRISE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

# -----------------------------------------------------------------------------
#      * TABLE : SALARIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SALARIE
 (
   ID_SALARIE SMALLINT  AUTO_INCREMENT ,
   ID_ENTREPRISE SMALLINT NOT NULL  ,
   NOM_SALARIE CHAR(32) NOT NULL  ,
   PRENOM_SALARIE CHAR(32) NOT NULL  ,
   TEL_SALARIE CHAR(10) NOT NULL  ,
   EMAIL_SALARIE CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_SALARIE) 
 ) 
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

# -----------------------------------------------------------------------------
#      * TABLE : CLASSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLASSE
 (
   ID_CLASSE INTEGER AUTO_INCREMENT ,
   ID_PROF SMALLINT NOT NULL  ,
   LIBELLE_CLASSE CHAR(4) NOT NULL  
   , PRIMARY KEY (ID_CLASSE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#    *   TABLE : ETRE_CONTACTER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETRE_CONTACTER
 (
   ID_DEMARCHE SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  
   , PRIMARY KEY (ID_DEMARCHE,ID_SALARIE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : ENSEIGNER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENSEIGNER
 (
   ID_CLASSE INTEGER NOT NULL  ,
   ID_PROF SMALLINT NOT NULL,
   MATIERE VARCHAR(10) NOT NULL,
   NB_HEURES   SMALLINT NOT NULL
   , PRIMARY KEY (ID_CLASSE,ID_PROF) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

 

# -----------------------------------------------------------------------------
#     *  TABLE : VISITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VISITER
 (
   ID_PROF SMALLINT NOT NULL  ,
   ID_STAGE SMALLINT NOT NULL ,
   DATE_VISITE DATE NOT NULL,
   COMMENTAIRES VARCHAR(50),
   HEURE_PREVUE TIME NOT NULL 
   , PRIMARY KEY (ID_PROF,ID_STAGE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 

# -----------------------------------------------------------------------------
#      * TABLE : SOUHAITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SOUHAITER
 (
   ID_PROF SMALLINT NOT NULL  ,
   ID_STAGE SMALLINT NOT NULL  ,
   PRIORITE SMALLINT NOT NULL  
   , PRIMARY KEY (ID_PROF,ID_STAGE) 
 )
 ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE SPECIALITE
  ADD FOREIGN KEY FK_SPECIALIT�_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_CLASSE (ID_CLASSE)
      REFERENCES CLASSE (ID_CLASSE) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_SPECIALIT� (ID_SPECIALITE)
      REFERENCES SPECIALIT� (ID_SPECIALITE) ;


ALTER TABLE STAGE 
  ADD FOREIGN KEY FK_STAGE_ETUDIANT (ID_ETUDIANT)
      REFERENCES ETUDIANT (ID_ETUDIANT) ;


ALTER TABLE STAGE 
  ADD FOREIGN KEY FK_STAGE_SALARIE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_ETUDIANT (ID_ETUDIANT)
      REFERENCES ETUDIANT (ID_ETUDIANT) ;


ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_MOYENCOM (ID_MOYEN)
      REFERENCES MOYENCOM (ID_MOYEN) ;



ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_ENTREPRISE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE SALARIE 
  ADD FOREIGN KEY FK_SALARIE_ENTREPRISE (ID_ENTREPRISE)
      REFERENCES ENTREPRISE (ID_ENTREPRISE) ;


ALTER TABLE CLASSE 
  ADD FOREIGN KEY FK_CLASSE_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETRE_CONTACTER 
  ADD FOREIGN KEY FK_ETRE_CONTACTER_DEMARCHE (ID_DEMARCHE)
      REFERENCES DEMARCHE (ID_DEMARCHE) ;


ALTER TABLE ETRE_CONTACTER 
  ADD FOREIGN KEY FK_ETRE_CONTACTER_SALARIE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE ENSEIGNER 
  ADD FOREIGN KEY FK_ENSEIGNER_CLASSE (ID_CLASSE)
      REFERENCES CLASSE (ID_CLASSE) ;


ALTER TABLE ENSEIGNER 
  ADD FOREIGN KEY FK_ENSEIGNER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE VISITER 
  ADD FOREIGN KEY FK_VISITER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE VISITER 
  ADD FOREIGN KEY FK_VISITER_STAGE (ID_STAGE)
      REFERENCES STAGE (ID_STAGE) ;


ALTER TABLE SOUHAITER 
  ADD FOREIGN KEY FK_SOUHAITER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE SOUHAITER 
  ADD FOREIGN KEY FK_SOUHAITER_STAGE (ID_STAGE)
      REFERENCES STAGE (ID_STAGE) ;

INSERT INTO MOYENCOM (LIBELLE_MOYEN) VALUES ('telephone'), ('d�marchage'),('couriel'), ('entretien');

INSERT INTO SPECIALITE (ID_PROF, LIBELLE_SPECIALITE) VALUES (1,'SLAM'), (2,'SISR');

INSERT INTO `professeur` (`ID_PROF`, `NOM_PROF`, `PRENOM_PROF`, `EMAIL`, `TEL_PROF`, `MDP`) VALUES
(1, 'RISSER', 'NAT', 'NRISSER@GMAIL.COM', '0606060606', '76EpKq-5seu6b3hQ'),
(2, 'DUBOIS', 'NAT', 'NDUBOIS@GMAIL.COM', '1616161616', '^6yPr%4y&@sDT$Ku'),
(3, 'PEILLON', 'HER', 'HPEILLON@GMAIL.COM', '2626262626', '!m6uU4TP+gN6A=#n'),
(4, 'LHOSTIS', 'ISA', 'ILHOSTIS@GMAIL.COM', '3636363636', 'B_bZ$RPK6LrU?8sr'),
(5, 'RICHARD', 'RIC', 'RRICHARD@GMAIL.COM', '4646464646', 'B-Bh$JK?rC6e?9gM');

INSERT INTO ENSEIGNER(ID_CLASSE,ID_PROF,MATIERE,NB_HEURES) 	VALUES (1,1,'DEV',16),(1,2,'RES', 16),(1,3,'FRANCCEE',3),(1,4,'FCasseTEte',4),(2,5,'JEUXVIDES',16);

INSERT INTO ENTREPRISE (NOM_ENTREPRISE,ADRESSE_ENTREPRISE,CP_ENTREPRISE,VILLE_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEESIO1,REFUS_ANNEE_SIO2) 
	VALUES ('KIANO','RUE BACH','22300','LANNION', '0101010101','KIANO@GMAIL.COM',0,0),
			('GERANO','RUE MOZRAT','22300','LANNION', '0202020202','GERano@GMAIL.COM',0,1),
			('MINCESIE','RUE BETOVEN','22300','LANNION', '0303030303','MINCESIE@GMAIL.COM',0,0),
			('ABIKI','RUE DVORAK','22100','DINAN', '0404040404','ABIKI@GMAIL.COM',0,0),
			('VONOLE','RUE BARTOK','22720','TREGASTEL', '0505050505','VONOLE@GMAIL.COM',0,0),
			('SUSA','RUE LICORNE','22300','LANNION', '0606060606','SUSA@GMAIL.COM',1,0),
			('BREIZHTICOT','RUE LICORNE','22300','LANNION', '0707070707','BREIZHTICOT@GMAIL.COM',1,0),
			('COMPTEURDUR','RUE LICORNE','22300','LANNION', '0808080808','COMPTEURDUR@GMAIL.COM',0,0),
			('APITICOM','RUE LICORNE','22300','LANNION', '0909090909','APITICOM@GMAIL.COM',0,0),
			('COMCOM','RUE LICORNE','22300','LANNION', '1010101010','COMCOM@GMAIL.COM',1,0); 	
 
 
 INSERT INTO SALARIE(ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE) VALUES
			(1,'KIANONO','BACH','0101010111','KIANONO.KIANO@GMAIL.COM'),
			(1,'NOKIANO','BACH','0101011111','NOKIANO.KIANO@GMAIL.COM'),
			(2,'GERANONO','MOZRAT','0202020212','GERANONO.GERANO@GMAIL.COM'),
			(2,'AGERANONO','MOZRAT','0202020222','AGERANONO.GERANO@GMAIL.COM'),
			(2,'BGERANONO','MOZRAT','0202020232','BGERANONO.GERANO@GMAIL.COM'),
			(2,'CGERANONO','MOZRAT','0202020242','CGERANONO.GERANO@GMAIL.COM'),
			(2,'DGERANONO','MOZRAT','0202020252','DGERANONO.GERANO@GMAIL.COM'),
			(2,'EGERANONO','MOZRAT','0202020252','EGERANONO.GERANO@GMAIL.COM'),
			(3,'AMINCESIE','BETOVEN','0303030313','MINCESIE@GMAIL.COM'),
			(3,'BMINCESIE','BETOVEN','0303030323','BMINCESIE@GMAIL.COM'),
			(3,'CMINCESIE','BETOVEN','0303030333','CMINCESIE@GMAIL.COM'),
			(4,'AABIKI','DVORAK','0404040404','AABIKI@GMAIL.COM'),
			(5,'AVONOLE','BARTOK','0505050515','AVONOLE@GMAIL.COM'),
			(5,'BVONOLE','BARTOK','0505050525','BVONOLE@GMAIL.COM'),
			(6,'SUSA','LICORNE','0606060616','ASUSA@GMAIL.COM'),
			(7,'ABREIZHTICOT','LICORNE','0707070717','ABREIZHTICOT@GMAIL.COM'),
			(7,'BBREIZHTICOT','LICORNE','0707070727','BBREIZHTICOT@GMAIL.COM'),
			(8,'ACOMPTEURDUR','LICORNE','0808080808','ACOMPTEURDUR@GMAIL.COM'),
			(8,'BCOMPTEURDUR','LICORNE','0808080818','BCOMPTEURDUR@GMAIL.COM'),
			(8,'CCOMPTEURDUR','LICORNE','0808080828','CCOMPTEURDUR@GMAIL.COM'),
			(8,'DCOMPTEURDUR','LICORNE','0808080838','DCOMPTEURDUR@GMAIL.COM'),
			(9,'AAPITICOM','LICORNE','0909090919','AAPITICOM@GMAIL.COM'),
			(10,'ACOMCOM','LICORNE','1010101010','COMCOM@GMAIL.COM'); 
 
 INSERT INTO  CLASSE (ID_PROF,LIBELLE_CLASSE) VALUES (3,'SIO1'),(5,'SIO2');
 
INSERT INTO ETUDIANT (ID_PROF, ID_CLASSE,ID_SPECIALITE,NOM_ETUDIANT,PRENOM_ETUDIANT,ADR_ETUDIANT,CP_ETUDIANT, VILLE_ETUDIANT,EMAIL, TEL_ETUDIANT,MDP) 
	VALUES (1,1,1,'RENAULT','KYLLIAN','LESREMPARTS','29300', 'MORLES','KRENAULT@GMAIL.COM','1010101010','7ZKbUEKZ3&Fm2u^q'),
			(2,1,2,'CORSON','KYLLIAN','LESMACHICOULIS','22300', 'CAMLEZ','KCORSON@GMAIL.COM','1010101011','bw@87==fcuwfvRuL'),
			(2,1,2,'FIN','YOHAN','PONTLEVIS','22300', 'ROSPEZ','YFIN@GMAIL.COM','1010101012','FjxY@2e9bY#^E4D7'),
			(2,1,1,'RUIZ','OLIVIO','ENCIENTE','22300', 'LERHU','ORUIZ@GMAIL.COM','1010101013','g$GZebv+eM8!ya@v'),
			(1,1,1,'RUIZ','ALIVIO','BENCIENTE','22300', 'ALERHU','ARUIZ@GMAIL.COM','1010101014','VNNfQ4q2ZDM$j_6='),
			(2,1,1,'RUIZ','BLIVIO','BENCIENTE','22300', 'BLERHU','BRUIZ@GMAIL.COM','1010101015','BJ35vLszH%==HRdZ'),
			(2,1,1,'RUIZ','CLIVIO','CENCIENTE','22300', 'CLERHU','CRUIZ@GMAIL.COM','1010101016','-MDdcP?C2BS@f6j7'),
			(3,1,1,'RUIZ','DLIVIO','DENCIENTE','22300', 'DLERHU','DRUIZ@GMAIL.COM','1010101017','n*7Ye!jssuZbCD5p'),
			(3,1,1,'RUIZ','ELIVIO','EENCIENTE','22300', 'ELERHU','ERUIZ@GMAIL.COM','1010101018','M6fyS3mPs&V=ehHk'),
			(3,1,1,'RUIZ','FLIVIO','FENCIENTE','22300', 'FLERHU','FRUIZ@GMAIL.COM','1010101019','4A8qC_thU%6&dq^6'),
			(3,1,2,'FIN','ZYOHAN','ZPONTLEVIS','22300', 'ZROSPEZ','ZFIN@GMAIL.COM','1010101020','?QzRFd3GAdmVc68N'),
			(3,1,2,'FIN','WYOHAN','WPONTLEVIS','22300', 'WROSPEZ','WFIN@GMAIL.COM','1010101021','z9J2ZJPRX7*-&6%S'),
			(1,1,2,'FIN','VYOHAN','VPONTLEVIS','22300', 'VROSPEZ','VFIN@GMAIL.COM','1010101022','Xn$X9#7@vCD9339K'),
			(1,1,2,'FIN','TYOHAN','TPONTLEVIS','22300', 'TROSPEZ','TFIN@GMAIL.COM','1010101023','U92xW3hXV!%ALA%W'),
			(3,1,2,'FIN','AYOHAN','APONTLEVIS','22300', 'AROSPEZ','AFIN@GMAIL.COM','1010101024','#mG3zv2ybqzXmt%r'),
			(4,1,2,'FIN','BYOHAN','BPONTLEVIS','22300', 'BROSPEZ','BFIN@GMAIL.COM','1010101025','N@snZ-cwy5_2bJTr'),
			(4,1,2,'FIN','CYOHAN','CPONTLEVIS','22300', 'CROSPEZ','CFIN@GMAIL.COM','1010101026','yTZ#rn52kZX2uL_6'),
			(4,1,2,'FIN','DYOHAN','DPONTLEVIS','22300', 'DROSPEZ','DFIN@GMAIL.COM','1010101027','#LjB7mJKeq!awXRK'),
			(4,1,2,'FIN','EYOHAN','EPONTLEVIS','22300', 'EROSPEZ','EFIN@GMAIL.COM','1010101028','nbKXuknX9_q+jFvQ'),
			(4,1,2,'FIN','FYOHAN','FPONTLEVIS','22300', 'FROSPEZ','FFIN@GMAIL.COM','1010101029','U@-AW*qTzj3QYCN+'),
			(4,1,2,'FIN','GYOHAN','GPONTLEVIS','22300', 'GROSPEZ','GFIN@GMAIL.COM','1010101030','pnaAYzW&Y+#v-Y67'),
			(5,2,2,'HENAFF','MELVIN','GRASSES','22808', 'GRACE','MHENNAFF@GMAIL.COM','1010101300','Dzh+=5S+G!kPV8J=');

INSERT INTO  DEMARCHE (ID_ETUDIANT,ID_MOYEN,ID_SALARIE,DATE_DEMARCHE,COMMENTAIRE) VALUES
         (1,1,1,'2020-09-21', 'attente_rep'),
		 (1,2,1,'2020-09-28', 'relance'),
		 (1,3,2,'2020-09-30', 'mort'),
		 (1,3,2,'2020-09-30', 'mort'),
		 (1,4,2,'2020-09-21', 'un espoir'),
		 (1,4,12,'2020-09-21', 'en attente'),
		 (2,1,1,'2020-09-21', 'en attente'),
		 (2,2,1,'2020-09-27', 'un espoir'),
		 (2,4,1,'2020-09-30', 'fiche recherche envoy�e'),
		 (2,4,5,'2020-09-30', 'un espoir'),
		 (3,3,10,'2020-09-21', 'en attente'),
		 (3,4,4,'2020-09-28', 'en attente'),
		 (22,1,1,'2020-10-10','fiche recherche re�ue');
		 
INSERT INTO ETRE_CONTACTER(ID_DEMARCHE,ID_SALARIE)  VALUES 
	(1,1),(2,1),(3,1),(4,3),(5,7),(6,5),(7,2),(8,1),(9,2),(10,5),(11,10),(12,6),(22,1);
		 
INSERT INTO STAGE (ID_ETUDIANT,ID_SALARIE,DATE_FIN ,DATE_DEBUT,ETAT ) VALUES (22,2,'2020-02-29','2020-01-01','AT'),
												(7,1,'2021-05-29','2020-07-01','OK');
INSERT INTO SOUHAITER (ID_PROF,ID_STAGE,PRIORITE) VALUES(5,1,1); 
INSERT INTO VISITER (ID_PROF,ID_STAGE,DATE_VISITE,COMMENTAIRES,HEURE_PREVUE) VALUES(5,1,'2021-01-31','RAS','10:00:00'); 



COMMIT;

