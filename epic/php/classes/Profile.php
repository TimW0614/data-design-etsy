<?php
namespace Edu\Cnm\DataDesign;
reqiore_once("autoload.php");

/**
 * <h1>data design etsy</h1>
 * <p>This is a data design exercise where a etsy user is trying to sell a product</p>
 * @author Timothy Williams <tkotalik@cnm.edu>
 **/

class profile{
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
			$this->profieEmail($newProfileEmail);
			$this->profileHash($newProfileHash);
			$this->profileSalt($newProfileSalt);
			$this->profileLocation($newProfileLocation);
		}

	catch(
		(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
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
		return($this->profileUsername);
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