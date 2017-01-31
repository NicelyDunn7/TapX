DROP SCHEMA IF EXISTS tapX;
CREATE SCHEMA tapX;
use tapX;

DROP TABLE IF EXISTS 'businesses';
CREATE TABLE 'businesses' (
	'business_id' INT(8) NOT NULL AUTO_INCREMENT,
	'business_name' CHAR(35) NOT NULL DEFAULT '',
	'address' CHAR(35), --first address line
	'address2' CHAR(16), --for the second address line 
	'city' CHAR(35),
	'state' CHAR(2),
	'ZIP' INT(5), --for now lets stick to 5 digit zip. we may want to move to 9 digit zip in the future
	PRIMARY KEY('business_id')
);

DROP TABLE IF EXISTS 'tables';
CREATE TABLE 'tables' (
	'business_id' INT(8) FOREIGN KEY REFERENCES businesses(business_id),
	'table_id' INT(8) NOT NULL DEFAULT AUTO_INCREMENT, --just to keep them unique. not referenced in app
	'table_num' INT(3) NOT NULL DEFAULT '0', --actual table number that will be queried with the bar id
	'table_pass' VARCHAR(28) NOT NULL DEFAULT '',
	'salt' VARCHAR(28) NOT NULL DEFAULT '',
	PRIMARY KEY('table_id')
);

DROP TABLE IF EXISTS 'business_admins';
CREATE TABLE 'business_admins' (
	'business_id' INT(8) FOREIGN KEY REFERENCES businesses(business_id),
	'user_id' INT(8) NOT NULL DEFAULT AUTO_INCREMENT, --just to keep them unique. not referenced in app
	'username' VARCHAR(16) NOT NULL DEFAULT 'admin',
	'password' VARCHAR(28) NOT NULL DEFAULT '',
	'salt' VARCHAR(28) NOT NULL DEFAULT '',
	PRIMARY KEY('user_id')
);

DROP TABLE IF EXISTS 'item_list';
CREATE TABLE 'item_list' (
	'business_id' INT(8) FOREIGN KEY REFERENCES businesses(business_id),
	'business_name' CHAR(35) FOREIGN KEY REFERENCES businesses(business_name), --why is this here? it was in the ERD, but I don't think it belongs
	'Bud Light (Draft 16oz)' DECIMAL(1,2),
	'Bud Light (Bottle)' DECIMAL(1,2),
	'Budwiser (Draft 16oz)' DECIMAL(1,2),
	'Budwiser (Bottle)' DECIMAL(1,2),
	'Jack and Coke (Single Well)' DECIMAL(1,2),
	'Jack and Coke (Double Well)' DECIMAL(1,2),
	'Jack and Coke (Triple Well)' DECIMAL(1,2)
)
