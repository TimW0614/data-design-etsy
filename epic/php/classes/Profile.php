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
}