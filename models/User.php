<?php
class User {
    private $email;
    private $password;
    private $name;
    private $maritalStatus;
    private $birthdate;
    private $website;
  
    public function __construct($email, $password, $name, $maritalStatus, $birthdate = null, $website = null) {
      $this->email = $email;
      $this->password = $password;
      $this->name = $name;
      $this->maritalStatus = $maritalStatus;
      $this->birthdate = $birthdate;
      $this->website = $website;
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    public function getPassword() {
      return $this->password;
    }
  
    public function getName() {
      return $this->name;
    }
  
    public function getMaritalStatus() {
      return $this->maritalStatus;
    }
  
    public function getBirthdate() {
      return $this->birthdate;
    }
  
    public function getWebsite() {
      return $this->website;
    }
  
    public function setName($name) {
      $this->name = $name;
    }
  
    public function setMaritalStatus($maritalStatus) {
      $this->maritalStatus = $maritalStatus;
    }
  
    public function setBirthdate($birthdate) {
      $this->birthdate = $birthdate;
    }
  
    public function setWebsite($website) {
      $this->website = $website;
    }
  
    public function calculateAge() {
      if (!$this->birthdate) {
        return null;
      }
  
      $now = new DateTime();
      $birthdate = new DateTime($this->birthdate);
      $age = $birthdate->diff($now)->y;
      return $age;
    }
  }
?>