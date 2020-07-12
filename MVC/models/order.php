<?php
class Order{
    public $date;
    public $status = false;
    public $amount;
    public $customerName;
    public $customersAddress;
    public $customerPhone;
    public $user;

    public function __construct($date, $amount, $customerName, $customersAddress, $customerPhone, $user )
    {
        $this->date = $date;
        $this->amount = $amount;
        $this->customerName = $customerName; 
        $this->customersAddress = $customersAddress; 
        $this->customerPhone = $customerPhone; 
        $this->user = $user; 
    }

}


?>