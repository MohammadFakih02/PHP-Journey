<?php

class ListNode {
    public $data = NULL;
    public $next = NULL;

    public function __construct($data = NULL) {
        $this->data = $data;
    }
}

$head = new ListNode("man");
$temp = new ListNode("head");
$head->next= $temp;
$temp2 = new ListNode("barn");
$temp->next = $temp2;

function checkvowels($head){
    $current =$head;
    while($current){
        if(preg_match('/[aeiouAEIOU].*[aeiouAEIOU]/', $current->data)){
            print $current->data;
        }
        $current = $current->next;
    }
}
checkvowels($head);