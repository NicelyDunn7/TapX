DROP SCHEMA IF EXISTS tapX;
CREATE SCHEMA tapX;
use tapX;

DROP TABLE IF EXISTS businesses;
CREATE TABLE businesses (
	business_id INT(8) NOT NULL AUTO_INCREMENT,
	business_name VARCHAR(35) NOT NULL DEFAULT '',
	address VARCHAR(35), -- first address line
	address2 VARCHAR(16), -- for the second address line 
	city VARCHAR(35),
	state VARCHAR(2),
	ZIP INT(5), -- for now lets stick to 5 digit zip. we may want to move to 9 digit zip in the future
	PRIMARY KEY(business_id)
);

DROP TABLE IF EXISTS tables;
CREATE TABLE tables (
	business_id INT(8),
	table_id INT(8) NOT NULL AUTO_INCREMENT, -- just to keep them unique. not referenced in app
	table_num INT(3) NOT NULL DEFAULT '0', -- actual table number that will be queried with the bar id
	table_pass VARCHAR(28) NOT NULL DEFAULT '',
	salt VARCHAR(28) NOT NULL DEFAULT '',
	PRIMARY KEY(table_id),
	FOREIGN KEY (business_id) REFERENCES businesses(business_id)
);

DROP TABLE IF EXISTS business_admins;
CREATE TABLE business_admins (
	business_id INT(8),
	user_id INT(8) NOT NULL AUTO_INCREMENT, -- just to keep them unique. not referenced in app
	username VARCHAR(16) NOT NULL DEFAULT 'admin',
	password VARCHAR(28) NOT NULL DEFAULT '',
	salt VARCHAR(28) NOT NULL DEFAULT '',
	PRIMARY KEY(user_id),
	FOREIGN KEY (business_id) REFERENCES businesses(business_id)
);

DROP TABLE IF EXISTS item_list;
CREATE TABLE item_list (
	business_id INT(8),
	Bud_Light_Draft_16oz DECIMAL(2,2),
	Bud_Light_Bottle DECIMAL(2,2),
	Budweiser_Draft_16oz DECIMAL(2,2),
	Budweiser_Bottle DECIMAL(2,2),
	Jack_and_Coke_Single_Well DECIMAL(2,2),
	Jack_and_Coke_Double_Well DECIMAL(2,2),
	Jack_and_Coke_Triple_Well DECIMAL(2,2),
	FOREIGN KEY (business_id) REFERENCES businesses(business_id)

)
