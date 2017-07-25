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
}