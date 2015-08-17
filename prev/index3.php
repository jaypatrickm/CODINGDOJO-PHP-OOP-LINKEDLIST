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

	public function insert_Beginning($value)
	{
		$newNode = new Node($value);
		if ($this->head == null)
		{
			$this->head = $newNode;
			$this->tail = $newNode;
			$this->head->prev = null;
			$this->head->next = null;
		} 
		else 
		{
			$this->insert_Before($value, $this->head);
		}
	}

	public function insert_Before($value, $before_this_node)
	{
		$newNode = new Node($value);
		$pointer = $this->head;
		if ($before_this_node->prev == null)
		{
			$before_this_node->prev = $newNode;
			$newNode->prev = null;
			$newNode->next = $before_this_node;
			$this->head = $newNode;
		}
		else 
		{
			$pointer = $this->head;
			while($pointer->value != $before_this_node)
			{
				$pointer = $pointer->next;
			}
			$newNode->prev = $pointer->prev;
			$newNode->next = $pointer;

			//$newNode->prev = $before_this_node->prev;
			//$newNode->next = $before_this_node;
			//$this->$before_this_node->prev = $newNode;
		}
	}

	public function insert_End($firstN,$val)
	{
		/*
		$newNode = new Node($value);
		if ($this->tail == null)
		{
			$newNode->insert_Beginning($value);
		}
		else
		{
			$this->tail->next = $newNode;
			$newNode->prev = $this->tail;
			$this->tail = $newNode;
		}
		*/
		$firstN = $firstN->next;
		if ($firstN != null)
		{
			insert_End($firstN,$val);

		}
		else
		{
			$firstN = new Node($val);
			return;
		}
	}

	/*public function insert_After($value, $after_this_node)
	{
		//must find $after_this_node,
		//we only know the first node. 
		$pointer = $this->head->value;
		echo $pointer;
		while($pointer != $after_this_node) {
            $pointer = $->next;
 			echo 'pointer in while :';
 			var_dump($pointer);
            if($pointer == NULL)
                return false;
        }
 
		echo 'this is pointer';
		var_dump($pointer);
		$newNode = new Node($value);
		$newNode->prev = $after_this_node;
		$newNode->next = $after_this_node->next;
		$after_this_node->next = $newNode;
	}*/

	

	public function remove_node($node)
	{
		if($node->prev == null)
		{
			$node->next = $this->$head->next;
			$this->$head->next->prev = $node;
		} 
		else if ($node->next == null)
		{
			$node->prev->next = null;
		}
		else
		{
			$node->prev->next = $node->next;
			$node->next->prev = $node->prev;
		}

	}
	
	public function displayAll()
	{
		var_dump($this->head);
		var_dump($this->head->next);
		return $this;
	}
}

$list = new DoublyLinkedList();
$list->insert_Beginning(1);
$list->insert_Beginning(2);
$list->insert_Beginning(3);
$list->insert_Before(4,2);
//$list->insert_End($list->head,3);
var_dump($list);
//$list->insert_After(2,1);
//$list->insert_After(3,2);
//$list->insert_End()
// $list->add_node(2);
//$list->add_node(3);
//$list->add_node(4);
//$list->displayAll();
?>