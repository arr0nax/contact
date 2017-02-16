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

    function get_first_name() {
      return $this->first_name;
    }

    function get_last_name() {
      return $this->last_name;
    }

    function get_address() {
      return $this->address;
    }

    function get_phone_number() {
      return $this->phone_number;
    }

    function set_first_name($first) {
        $this->first_name = $first;
    }

    function set_last_name($last) {
        $this->last_name = $last;
    }

    function set_address($address) {
        $this->address = $address;
    }

    function set_phone_number($phone_number) {
        $this->phone_number = $phone_number;
    }

    static function saveContact($first,$last,$address,$number) {
        $newContact = new Contact($first,$last,$address,$number);
        array_push($_SESSION['list_of_contacts'], $newContact);
    }

    static function getAll() {
      return $_SESSION['list_of_contacts'];
    }

    static function clearAll() {
      $_SESSION['list_of_contacts'] = array();
    }
  }

 ?>
