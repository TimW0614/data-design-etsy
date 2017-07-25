<?php
namespace Edu\Cnm\DataDesign;
require_once("autoload.php");
/**
 * Small Cross Section of a Contempo Design Product
 *
 * This Item can be treated as a small example of what eCommerce websites like Contempo Design store when products are created using Contempo Design. This can follow suit for more features of Contempo Design.
 *
 * @author Timothy Williams <tkotalik@cnm.edu>
 * @version 4.0.1
 **/

class Item {
	/**
	 * id for this Item; this is the primary key
	 * @var int $itemId
	 **/
	private $itemId;
	/**
	 * id of the profile that saved this Item; this is a foreign key
	 * @var int $itemProfileId
	 **/
	private $itemProfileId;
	/**
	 * actual content in text format that describes this Item
	 * @var string $itemDescription
	 **/

}