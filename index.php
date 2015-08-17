<?php
class Node
{
	public $value, $prev, $next;

	public function __construct($value)
	{
		$this->value =  $value;
	}
}

class DoublyLinkedList
{
	public $head, $tail;

	public function __construct()
	{
		$this->head = null;
		$this->tail = null;
	}

	public function add_node($value)
	{	
		$newNode = new Node($value);
		$pointer = $this->head;
		if ($pointer == null)
		{
			$this->head = $newNode;
			$this->tail = $newNode;
			$this->head->prev = null;
			$this->head->next = null;
		}
		else 
		{
			while($pointer->next)
			{
				$pointer = $pointer->next;
			}
			$pointer->next = $newNode;
			$newNode->prev = $pointer;
			$newNode->next = null;
			$this->tail = $newNode;
		}
	}

	public function delete_node($value)
	{
		$pointer = $this->head;
		while($pointer->value != $value)
		{
			$pointer = $pointer->next;
		}
		$pointer->prev->next = $pointer->next;
		$pointer->next->prev = $pointer->prev;
		if (isset($pointer->next->next->next))
		{
			$pointer->next->next = $pointer->next->next->next;
		}
		else 
		{
			$pointer->next->next = null;
		}
	}

	public function insert_after($value, $node_value)
	{
		$pointer = $this->head;
		$newNode = new Node($value);
		While($pointer->value != $node_value)
		{
			$pointer = $pointer->next;
		}
		$newNode->prev = $pointer;
		$newNode->next = $pointer->next;
		$pointer->next->prev = $newNode;
		$pointer->next = $newNode;

	}
	
	public function displayAll()
	{
		var_dump($this->head);
		var_dump($this->head->next);
		return $this;
	}
}

$list = new DoublyLinkedList();
$list->add_node(1);
$list->add_node(2);
$list->add_node(3);
$list->delete_node(2);
$list->insert_after(2,1);
var_dump($list);
?>