DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (


		-- this creates the attribute for the primary key
		-- auto_increment tells SQL to number them (1, 2, 3...)
		-- not null means the attribute is required

		profileId INT 	UNSIGNED AUTO_INCREMENT NOT NULL,
		profileUsername VARCHAR(32) NOT NULL,
		profileEmail VARCHAR(128) NOT NULL,
		profileHash CHAR(128) NOT NULL,
		profileSalt CHAR(64) NOT NULL,
		profileLocation CHAR(32) NOT NULL,
		UNIQUE(profileEmail),
		UNIQUE(profileUsername),
		-- this officiates the primary key for the entity
		PRIMARY KEY  (profileId)


);

CREATE TABLE item (
		itemId INT UNSIGNED AUTO_INCREMENT NOT NULL,
		itemProfileId INT UNSIGNED NOT NULL,
		itemName VARCHAR(200) NOT NULL,
		itemDescription VARCHAR(500) NOT NULL,
		itemPrice DECIMAL (11,2) NOT NULL,
		INDEX (itemProfileId),
		FOREIGN KEY (itemProfileId) REFERENCES profile(profileId),
		PRIMARY KEY (itemId)


);




