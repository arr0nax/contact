<?php
  Class Contact {
    private $first_name;
    private $last_name;
    private $address;
    private $phone_number;


    function __construct($first,$last,$address,$number) {
      $this->first_name = $first;
      $this->last_name = $last;
      $this->address = $address;
      $this->phone_number = $number;
    }

    function get_name() {
      return $this->first_name .' '. $this->last_name;
    }

    function get_address() {
      return $this->address;
    }

    function get_phone_number() {
      return $this->phone_number;
    }
  }

 ?>
