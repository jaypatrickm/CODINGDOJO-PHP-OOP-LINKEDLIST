<?php
class Node
{
	public $value, $prev, $next;

	public function __construct($value)
	{
		$this->value =  $value;
	}
}

function addToEnd($firstN, $var)
{
	$firstN = $firstN->next;
	if ($firstN != null)
	{
		addToEnd($firstN,$var);
	}
	else
	{
		$firstN = new Node($var);
		return;
	}
}

?>