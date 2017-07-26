<?php

namespace Edu\Cnm\DataDesign;
require_once("autoload.php");


/**
 * Small Cross Section of a etsy Design Product
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
	private $itemName;
	/**
	 * actual content in text format that describes this Item
	 * @var string $itemDescription
	 **/
	private $itemDescription;
	/**
	 * Actual price of this Item
	 * @var float $itemPrice
	 **/
	private $itemPrice;

	/**
	 * constructor for this Item
	 *
	 * @param int|null $newItemId id of this Item or null if a new Item
	 * @param int $newItemProfileId id of the Profile that saved this Item
	 * @param string $newItemDescription string containing actual content data
	 * @param string $newItemType string containing the type data
	 * @param string $newItemName string containing the name of the Item
	 * @param float $newItemPrice float containing cost data of the Item
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers, negative floats)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newItemId, int $newItemProfileId, string $newItemName, string $newItemDescription, float $newItemPrice) {
		try {
			$this->setItemId($newItemId);
			$this->setItemProfileId($newItemProfileId);
			$this->setItemName($newItemName);
			$this->setItemDescription($newItemDescription);
			$this->setItemPrice($newItemPrice);

		} // determine what exception was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for item id
	 * @return int|null value of item id
	 **/
	public function getItemId(): ?int {
		return ($this->itemId);
	}

	/**
	 * mutator method for item id
	 * @param int|null $newItemId new value of Item id
	 * @throws \RangeException if $newItemId is not positive
	 * @throws \TypeError if $newItemId is not an integer
	 **/
	public function setItemId(?int $newItemId): void {
		// if item id is null immediately return it
		if($newItemId === null) {
			$this->itemId = null;
			return;
		}
		// verify the item id is positive
		if($newItemId <= 0) {
			throw(new \RangeException("item id is not positive"));
		}
		//convert and store the item id
		$this->itemId = $newItemId;
	}

	/**
	 * accessor method for item profile id
	 *
	 * @return int value of item profile id
	 **/
	public function getItemProfileId(): int {
		return ($this->itemProfileId);
	}

	/**
	 * mutator method for item profile id
	 *
	 * @param int $newItemProfileId new value of item profile id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newProfileId is not an integer
	 **/
	public function setItemProfileId(int $newItemProfileId): void {
		// verify the profile id is positive
		if($newItemProfileId <= 0) {
			throw(new \RangeException("item profile id is not positive"));
		}
		// convert and store the profile id
		$this->itemProfileId = $newItemProfileId;
	}

	/**
	 * accessor method for item name
	 *
	 * @return string value of item name
	 **/
	public function getItemName(): string {
		return ($this->itemName);
	}

	/**
	 * mutator method for item name
	 * @param string $newItemName new name of item
	 * @throws \InvalidArgumentException if $newItem name is not a string or insecure
	 * @throws \RangeException if $newItemName is > 500 characters
	 * @throws \TypeError if $newItemName is not a string
	 */
	public function setItemName(string $newItemName): void {
		// verify that the item name is secure
		$newItemName = trim($newItemName);
		$newItemName = filter_var($newItemName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemName) === true) {
			throw(new \InvalidArgumentException("item name is empty or insecure"));
		}
		// verify that the item name will fit in the database
		if(strlen($newItemName) > 500) {
			throw(new \RangeException("item name is too long"));
		}
		// store the item name
		$this->itemName = $newItemName;
	}

	/**
	 * accessor method for item description
	 *
	 * @return string value of item description
	 **/
	public function getItemDescription(): string {
		return ($this->itemDescription);
	}

	/**
	 * mutator method for item description
	 *
	 * @param string $newItemDescription new description of item
	 * @throws \InvalidArgumentException if $newItemDescription is not a string or insecure
	 * @throws \RangeException if $newItemDescription is > 200 characters
	 * @throws \TypeError if $newItemDescription is not a string
	 **/
	public function setItemDescription(string $newItemDescription): void {
		// verify that the item description is secure
		$newItemDescription = trim($newItemDescription);
		$newItemDescription = filter_var($newItemDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemDescription) === true) {
			throw(new \InvalidArgumentException("item description is empty or insecure"));
		}
		// verify that the item description will fit in the database
		if(strlen($newItemDescription) > 200) {
			throw(new \RangeException("item description is too long"));
		}
		// store the item description
		$this->itemDescription = $newItemDescription;
	}

	/**
	 * accessor method for item price
	 *
	 * @return float value of item Price
	 */
	public function getItemPrice(): float {
		return ($this->itemPrice);
	}

	/**
	 * mutator method for item Price
	 *
	 * @param float $newItemPrice new cost of item
	 * @throws \InvalidArgumentException if $newItemPrice is empty insecure
	 * @throws \RangeException if $newItemPrice > 11 digits
	 * @throws \TypeError if $newItemPrice is not a float
	 **/
	public function setItemPrice(float $newItemPrice): void {
		// verify that the item Price is secure
		$newItemPrice = filter_var($newItemPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
		if(empty($newItemPrice) === true) {
			throw(new \InvalidArgumentException("item is empty or insecure"));
		}
		// verify price is > 0
		if($newItemPrice <= 0) {
			throw(new \RangeException("item price is not positive"));
		}
		// verify that the item Price will fit in the database (> 11 digits)
		// check decimal precision???
		// if ok, set itemPrice
		$this->itemPrice = $newItemPrice;

	}

	/**
	 * inserts this item into mySQL
	 *
	 * @param \PDO $pdo connection object
	 * @throws \PDOException when mySQl related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// enforce the itemId is null (i.e., don't insert a item that already exist)
		if($this->itemId !== null) {
			throw(new \PDOException("not a new item"));
		}

		// create query template
		$query = "INSERT INTO item(itemProfileId, itemName, 
					itemDescription, itemPrice) VALUES(:itemProfileId, :itemName, :itemDescription,
					 :itemPrice)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["itemProfileId" => $this->itemProfileId, "itemName" => $this->itemName,
			"itemDescription" => $this->itemDescription, "itemPrice" => $this->itemPrice];
		$statement->execute($parameters);

		// update the null itemId with what mySQL just gave us
		$this->itemId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this item from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function  delete(\PDO $pdo) : void {
		// enforce the itemId is not null (i.e., dont delete a item that hasnt been inserted)
		if($this->itemId === null) {
			throw(new \PDOException("unable to delete a item that does not exist"));
		}

		// create query template
		$query = "DELETE  FROM item WHERE itemID = : itemId";
		$statement = $pdo->prepare($query);

		// bind the memberd variables to the place holder in the template
		$parameters = ["itemId" => $this->itemId];
		$statement->execute($parameters);
	}

	/**
	 * updates this item in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		// enforce the itemId is not null (i.e., dont update a item that hasnt been inserted)
		if($this->itemId === null) {
			throw(new \PDOException("unable to update a item that does not exist"));
		}
	}
}

?>