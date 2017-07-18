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




