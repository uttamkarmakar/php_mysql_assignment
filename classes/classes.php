<?php
  /**
   * Creating class to create object for firstname and lastname
   */
class details {
  /**
   * Variables for firstname and lastname.
   * @var string $firstName.
   *  Stores the firstname.
   * @var string $lastName.
   *  Stores the lastname.
   */
  public $firstName = "";
  public $lastName = "";
  /**
   * Constructor to initialize objects.
   * 
   * @param string $firstName
   *  Passing this string to initialze firstname
   * 
   * @param string $lastName
   *  Passing this string to initialze firstname
   *  
   * Setting the value to the object in the constructor.
   */
  function __construct(string $firstName,string $lastName) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

 
  function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 /**
 * Checking the data consists of alphabets only.
 *
 * @param integer $data
 * Passing name and surname to this to check the condition.
 */
  function check_valid($data) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $data))
      return TRUE;
    else
      return FALSE;
  }
  /**
 * Checking the data consists of alphabets only.
 *
 * @param mixed $data
 *  To check any data pass to this empty or not.
 * 
 * @return boolean.
 *  If the data is empty it will return true,otherwise false.
 */
  function check_empty($data) {
    if (empty($data)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
/**
 * Class for initializing object for the uploading image.
 */
class imageClass {
  /**
   * @var $imageType
   * @var $imagName
   * @var $imageSize
   * @var $imageTname
   * Data members for the imageClass.
   */
  public $imageType;
  public $imageName;
  public $imageSize;
  public $imageTname;
}
/**
 * Class for checking number is correct or not.
 */
class GetNumber {
  /**
   * @var string $stringNum.
   * Store the phone number.
   */
  public $stringNum = "";
  /**
   * Constructor to initialize the string variable.
   * @param string $stringNum.
   */
  public function __construct(string $stringNum) {
    $this->stringNum = $stringNum;
  }
  /**
   * Function to check the string the empty or not.
   *  @param string $stringNum.
   *   Stores the phone number as a string.
   *  @return boolean
   */
  public function check_string_empty(string $stringNum) {
    if (empty($stringNum)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  /**
   * Function to the string is valid or not.
   *  @param string $stringNum.
   *   Stores the phone number as a string.
   *  @return bool
   */
  public function string_valid(string $stringNum) {
    if (strlen($stringNum) > 13) {
      return FALSE;
    }
    elseif (!preg_match("/[+][9][1][6-9][0-9]{9}/", $_POST["phone"])) {
      return FALSE;
    }
    else {
      return TRUE;
    }
  }
}
/**
 * Class for creating object for the email.
 */
class GetEmail {
  /**
   * @var string $emailId
   *  Stores the email id as a string.
   */
  public $emailId;
  public function check_email($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  /**
   * Constructer to initialize the object data member
   * 
   * @param $emailId
   *  Setting email id when a object is created.
   */
  function __construct($emailId){
    $this->emailId = $emailId;
  }
  /**
   * Function to check whether the email Id is valid or not.
   * 
   * @param string $emailId
   * Passing the email Id to the parameter for checking.
   * 
   * @return bool
   *  If the email id is valid it will return true.otherwise false.
   */
  public function validate_email($emailId) {
    // if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emailId)) {
    //   return TRUE;
    // }
    // else {
    //   return FALSE;
    // }
    if (empty($emailId)) {
      return false;
    }
    else {
      require ('../vendor/autoload.php');
      // Create a client with a base URI
      $client = new \GuzzleHttp\Client ([
        'base_uri' => 'https://api.apilayer.com'
      ]);

      $response = $client->request('GET', '/email_verification/check?email=' . $emailId, [
        "headers" => [
          'Content-Type'=> 'text/plain',
          'apikey' => '7kw6ZkKalclLd2E8e2yPIzKSELk5dNf0'
        ]
      ]);
      //Getting JSON data form $response variable.
      $body = $response->getBody();
      //Convert JSON data into an object.
      $arr_body = json_decode($body);
      if ($arr_body->format_valid && $arr_body->smtp_check) {
        return true;
      }
       else {
        return false;
      }
    }
  }

   /**
   * Function to check whether the email Id is empty or not.
   * @param string $emailId
   * Passing the email Id to the parameter for checking.
   * @return bool
   *  If the email id is empty returns true otherwise false.
   */
  public function check_empty_email($emailId) {
    if (empty($emailId)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  
}

