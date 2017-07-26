<?php

namespace Edu\Cnm\DataDesign;
require_once("autoload.php");

/**
 * <h1>data design etsy</h1>
 * <p>This is a data design exercise where a etsy user is trying to sell a product</p>
 * @author Timothy Williams <tkotalik@cnm.edu>
 **/
class profile {
	/**
	 * primary key for profileId
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * username for this Profile; this is unique
	 * @var string @profileUsername
	 **/
	private $profileUsername;
	/**
	 * email of user
	 * @var string $profileEmail
	 **/
	private $profieEmail;
	/**
	 * password hash
	 * @var string $profileHash
	 **/
	private $profileHash;
	/**
	 * password salt
	 * @var string $profileSalt
	 **/
	private $profileSalt;
	/**
	 * location of user
	 * @var string $profileLocation
	 **/
	private $profileLocation;

	/**
	 * constructor for this profile
	 *
	 * @param int|null $newProfileId of this profile or null if a new profile
	 * @param string $newProfileEmail string containing user's email
	 * @param string $newProfileHash string containing password hash
	 * @param string $newProfileSalt string containing password salt
	 * @param string $newProfileLocation string containing the location of the profile
	 * @throws \invalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers, negative floats)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newProfileId, string $newProfileUsername, string $newProfileEmail, string $newProfileHash, string $newProfileSalt, string $newProfileLocation) {
		try {
			$this->setProfileId($newProfileId);
			$this->setprofieEmail($newProfileEmail);
			$this->setProfileEmail($newProfileHash);
			$this-setprofileSalt($newProfileSalt);
			$this->setprofileLocation($newProfileLocation);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));

		}
	}

	/**
	 * accessor method for profile id
	 *
	 * @return int value of profile id
	 * (or null if new profile)
	 **/
	public function getProfileId(): int {
		return ($this->profileId);
	}

	/**
	 * mutator method for profileId
	 *
	 * @param int|null $newProfileId new value of Profile id
	 * @throws \RangeException if $newProfileId is not positiver
	 * @throws \TypeError if $newProfileId is not an integer
	 **/
	public function setProfileId(?int $newProfileId): void {
		//if profile id is null immediately return it
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		// verify the profile id is positive
		if($newProfileId <= 0) {
			throw(new \RangeException("profile id is not positive"));
		}
		// convert and store the profile id
		$this->profileId = $newProfileId;
	}

	/**
	 * accessor method for profile username
	 * @return string value of profile username
	 **/
	public function getProfileUsername(): string {
		return ($this->profileUsername);
	}

	/**
	 * mutator method for profile username
	 *
	 * @param string $newProfileUsername new value of profile username
	 * @throws \InvalidArgumentException if $newProfileUsername is empty or insecure
	 * @throws \RangeException if $newProfileUsername is > 32 characters
	 * @throws \TypeError if $newProfileUsername is not a string
	 **/
	public function setProfileUsername(string $newProfileUsername): void {
		// verify that the username is secure
		$newProfileUsername = trim($newProfileUsername);
		$newProfileUsername = filter_var($newProfileUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileUsername) === true) {
			throw(new \InvalidArgumentException("profile username is empty or insecure"));
		}
		// verify that the username will fit in the database
		if(strlen($newProfileUsername) > 32) {
			throw(new \RangeException("profile username is too large"));
		}
		// convert and store the username
		$this->profileUsername = $newProfileUsername;
	}

	/**
	 * accessor method for profile email
	 * @return string value of profile email
	 **/
	public function getProfileEmail(): string {
		return ($this->profileEmail);
	}

	/**
	 *  mutator method for profile email
	 *
	 * @param string $newProfileEmail new value of profile email
	 * @throws \InvalidArgumentException if $newProfileEmail is not a string or insecure
	 * @throws \RangeException if $newProfileEmail is not positive
	 * @throws \TypeError if $newProfileEmail is not a string
	 **/
	public function setProfileEmail(string $newProfileEmail): void {
		// verify that the profile email is secure
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("profile email is empty, invalid, or insecure"));
		}
		// verify that the email will fit in the database
		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("profile email is too large"));
		}
		// store the profile email
		$this->profileEmail = $newProfileEmail;
	}

	/**
	 * accessor method for hash
	 * @return string value of profile password hash
	 */
	public function getProfileHash(): string {
		return ($this->profileHash);
	}

	/**
	 * mutator method for hash
	 *
	 * @param string $newProfileHash new value of profile password hash
	 * @throws \InvalidArgumentException if $newProfileHash is not secure
	 * @throws \RangeException if $newProfileHash is not 128 characters
	 * @throws \TypeError if $newProfileHash is not a string
	 **/
	public function setProfileHash(string $newProfileHash): void {
		// ensure that the hash is properly formatted
		$newProfileHash = trim($newProfileHash);
		$newProfileHash = strtolower($newProfileHash);
		if(empty($newProfileHash) === true) {
			throw(new \InvalidArgumentException("profile password hash is empty or insecure "));
		}
		// ensure that the hash is a string representation of a hexadecimal
		if(!ctype_xdigit($newProfileHash)) {
			throw(new \InvalidArgumentException("profile password hash is empty or insecure"));
		}
		// ensure that the hash is exactly 128 characters
		if(strlen($newProfileHash) !== 128) {
			throw(new \InvalidArgumentException("profile password hash must be 128 characters"));
		}
		// convert and store hash
		$this->profileHash = $newProfileHash;
	}

	/**
	 * accessor method for salt
	 * @return string value of profile password salt
	 **/
	public function getProfileSalt(): string {
		return ($this->profileSalt);
	}

	/**
	 * mutator method for salt
	 *
	 * @param string $newProfileSalt new value of profile password salt
	 * @throws \InvalidArgumentException if $newProfileSalt is not secure
	 * @throws \RangeException if $newProfileSalt is not 64 characters
	 * @throws \TypeError if $newProfileSalt is not a string
	 **/
	public function setProfileSalt(string $newProfileSalt): void {
		// ensure that the salt is properly formatted
		$newProfileSalt = trim($newProfileSalt);
		$newProfileSalt = strtolower($newProfileSalt);
		if(empty($newProfileSalt) === true) {
			throw(new \InvalidArgumentException("profile password salt is empty or insecure"));
		}
		// ensure that the salt is a string representation of a hexadecimal
		if(!ctype_xdigit($newProfileSalt)) {
			throw(new \InvalidArgumentException("profile password salt is empty or insecure"));
		}
		// ensure that the salt is exactly 64 characters
		if(strlen($newProfileSalt) !== 64) {
			throw(new \InvalidArgumentException("profile password salt must be 64 characters"));
		}
		// convert and store salt
		$this->profileSalt = $newProfileSalt;
	}

	/**
	 * accessor method for profile location
	 * @return string value of profile location
	 **/
	public function getProfileLocation(): string {
		return ($this->profileLocation);
	}

	/**
	 * mutator method for profile location
	 *
	 * @param string $newProfileLocation new value of profile location
	 * @throws \InvalidArgumentException if $newProfileLocation is empty or insecure
	 * @throws \RangeException if $newProfileLocation is < 50 characters
	 * @throws \TypeError if $newProfileLocation is not a string
	 **/
	public function setProfileLocation(string $newProfileLocation): void {
		// verify that the location is secure
		$newProfileLocation = trim($newProfileLocation);
		$newProfileLocation = filter_var($newProfileLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileLocation) === true) {
			throw(new \InvalidArgumentException("profile location is empty or insecure"));
		}
		// verify that the location will fit in the database
		if(strlen($newProfileLocation) > 50) {
			throw(new \RangeException("profile location is too large"));
		}
		// convert and store the location
		$this->profileLocation = $newProfileLocation;
	}

	/**
	 * inserts this profile into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOEception when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// enforce the profileId is null (i.e., don't insert a profile that already exists}
		if($this->profileId !== null) {
			throw(new \PDOException("not a new profile"));

		}

		// create query template
		$query = "INSERT INTO profie(profileId, profileUsername, profileEmail, profileHash, profileSalt, profileLocation)
	 			VALUES(:profileId, :profileUsername, :profileEmail, :profileHash, :profileSalt, :profileLocation)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["profileId" => $this->profileId, "profileUsername" => $this->profileUsername, "profileEmail" => $this->profileEmal,
			"profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt, "profileLocation" => $this->profileLocation];
		$statement->ececute($parameters);

		//update the null profileId with what mySQL just gave us
		$this->profileId = intval($pdo->lastInsertId());
}
}