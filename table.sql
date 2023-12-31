CREATE DATABSE VLE_DB;

-- TABLE 01 ami kede debo

CREATE TABLE USER_MASTER(
    ID              INT             NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_ID         VARCHAR(30)     NOT NULL UNIQUE,
    USER_NAME       VARCHAR(50)     NOT NULL,
    USER_GENDER     ENUM('MALE','FEMALE','OTHER') default 'MALE',
    USER_DOB        DATE            NOT NULL,
    USER_ADDRESS    VARCHAR(200)    NOT NULL,
    USER_DISTRICT   VARCHAR(50)    NOT NULL,
    USER_PIN        INT             NOT NULL,
    USER_BLOCK      VARCHAR(30),
    USER_EMAIL      VARCHAR(50)     NOT NULL,
    USER_MOBILE     VARCHAR(15)     NOT NULL,
    CENTRE_CODE     VARCHAR(15),
    BANK_ACC        VARCHAR(20)     NOT NULL,
    BANK_IFSC       VARCHAR(20)     NOT NULL,
    BANK_NAME       VARCHAR(50)     NOT NULL,
    BANK_BRANCH     VARCHAR(50)     NOT NULL,
    BANK_HOLDER     VARCHAR(30)     NOT NULL,
    USER_ROLE       ENUM('1','2','3','4','5','6') DEFAULT '2',
    USER_STATUS     ENUM('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
    SECURITY_QS     VARCHAR(50)     NOT NULL,
    SECURITY_ANS    VARCHAR(50)     NOT NULL
);

INSERT INTO `user_master` VALUES ('1', 'admin', 'Arindam Ray', 'MALE', '2023-07-12', 'kolkata', 'Kolkata', '700036', 'Baranagar', 'arindam@gmail.com', '9350778825', '3333', '3333', '333', 'SBI', 'Cossipore', 'arindam', '2', 'ACTIVE', 'aaaa', 'bbbb');

-- TABLE 02

CREATE TABLE LOGIN_MASTER(
    ID              INT             NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_ID         VARCHAR(30)     NOT NULL UNIQUE,
    USER_NAME       VARCHAR(50)     NOT NULL,
    USER_ROLE       enum('1','2','3','4','5','6') default '2',
    USER_STATUS     enum('ACTIVE','INACTIVE'),
    USER_PW         VARCHAR(30)     default 'vle#123'
);
--

-- Trigger 01

CREATE TRIGGER user_login_creation 
  AFTER INSERT ON USER_MASTER
  FOR EACH ROW   
  Insert into LOGIN_MASTER (USER_ID,USER_NAME,USER_ROLE,USER_STATUS)
  VALUES(new.USER_ID,new.USER_NAME,new.USER_ROLE,new.USER_STATUS);


-- TABLE 03

CREATE TABLE DISTRICT_MASTER(
    ID              INT PRIMARY KEY AUTO_INCREMENT,
    DISTRICT_CODE   VARCHAR(10)     NOT NULL UNIQUE,
    DISTRICT_NAME   VARCHAR(50)    NOT NULL,
    USER_ID         VARCHAR(30)     NOT NULL,
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);

-- TABLE 04

CREATE TABLE BLOCK_MASTER(
    ID              INT         PRIMARY KEY AUTO_INCREMENT,
    BLOCK_CODE      VARCHAR(10) NOT NULL UNIQUE,
    DISTRICT_CODE   VARCHAR(10) NOT NULL,
    BLOCK_NAME      VARCHAR(50) NOT NULL,     
    USER_ID         VARCHAR(30) NOT NULL,
    FOREIGN KEY(DISTRICT_CODE) REFERENCES DISTRICT_MASTER(DISTRICT_CODE),
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);


-- TABLE 05

CREATE TABLE DEPARTMENT_MASTER(
    ID          INT             PRIMARY KEY AUTO_INCREMENT,
    DEPT_CODE   VARCHAR(10)     NOT NULL UNIQUE,
    DEPT_NAME   VARCHAR(100)    NOT NULL,
    DEPT_STATUS VARCHAR(20)     NOT NULL,
    USER_ID         VARCHAR(30) NOT NULL,
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);

-- TABLE 06

CREATE TABLE SERVICE_MASTER(
    ID              INT             PRIMARY KEY AUTO_INCREMENT,
    SERVICE_CODE    VARCHAR(10)     NOT NULL UNIQUE,
    SERVICE_NAME    VARCHAR(100)    NOT NULL,
    DEPT_CODE       VARCHAR(10)     NOT NULL,
    SERVICE_DESC    VARCHAR(100)    NOT NULL,
    SERVICE_STATUS  VARCHAR(20)     NOT NULL,
    SERVICE_CHARGE  FLOAT           NOT NULL,
    VLE_COMMISSION  FLOAT           NOT NULL,
    SERVICE_REMARKS VARCHAR(100),
    USER_ID         VARCHAR(30) NOT NULL,
    FOREIGN KEY(DEPT_CODE) REFERENCES DEPARTMENT_MASTER(DEPT_CODE),   
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);

-- TABLE 07

CREATE TABLE CENTRE_MASTER(
    CENTRE_ID       INT             PRIMARY KEY  AUTO_INCREMENT,
    CENTRE_CODE     VARCHAR(10)     NOT NULL UNIQUE,
    CENTRE_NAME     VARCHAR(100)    NOT NULL,
    DISTRICT_CODE   VARCHAR(10)     NOT NULL,
    CENTRE_PIN      INT             NOT NULL,
    BLOCK_CODE      VARCHAR(10)     NOT NULL,
    CENTRE_STATUS   VARCHAR(20)     NOT NULL,
    CENTRE_DATE     DATE            NOT NULL,
    CENTRE_ADDRESS  VARCHAR(100)    NOT NULL,
    CENTRE_LAT      VARCHAR(10)     NOT NULL,
    CENTRE_LON      VARCHAR(10)     NOT NULL,
    USER_ID         VARCHAR(30)     NOT NULL,
    FOREIGN KEY(BLOCK_CODE) REFERENCES BLOCK_MASTER(BLOCK_CODE),
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);


-- TABLE 08

CREATE TABLE USER_LOG(
    ID              INT             PRIMARY KEY AUTO_INCREMENT,
    USER_ID         VARCHAR(30)     NOT NULL,
    LOG_DATE_TIME   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP,
    LOG_IP          VARCHAR(20)     NOT NULL,
    LOG_DEVICE_NAME VARCHAR(30)     NOT NULL,
    LOG_DEVICE_TYPE VARCHAR(30)     NOT NULL,
    LOG_REMARKS     VARCHAR(30),
    FOREIGN KEY(USER_ID) REFERENCES USER_MASTER(USER_ID)
);



