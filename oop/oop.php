<?php
class Person
{
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
		echo __CLASS__ . ' created<br>';
	}

	public function __destruct()
	{
		echo __CLASS__ . ' destroyed<br>';
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name . '<br>';
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email . '<br>';
	}
}

$person1 = new Person('John Doe', 'azaz22155@gmail.com');

echo $person1->getName();
echo $person1->getEmail();

class Customer extends Person
{
	private $balance;

	public function __construct($name, $email, $balance)
	{
		parent::__construct($name, $email, $balance);
		$this->balance = $balance;
		echo 'A new ' . __CLASS__ . ' has been created<br>';
	}

	public function setBalance($balance)
	{
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance . '<br>';
	}
}

$Customer1 = new Customer('John Doe', 'azaz22155@gmail.com', 300);
echo $Customer1->getBalance();

// $person1->name = 'John';
// echo $person1->name;

?>
