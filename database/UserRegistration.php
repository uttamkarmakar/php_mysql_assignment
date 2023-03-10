<?php

/**
 * UserRegistration - takes registration details from user like username,email,password etc.
 *
 * @author Uttam karmakar
 * 
 * @method registartion()
 *  registration method helps to store registration details into the database.
 * 
 * @method isValidPass()
 *  Checks if the password contains required characters or not.
 */

class UserRegistration {
  public $passwordErr = "";
  const TABLE_NAME =  'userInfo';

  /**
   * This function is invoke when a new user details required to store in the database.
   *
   * @param string $user
   *  This variable stores the new user's name in the database.
   *
   * @param string $email
   *  This variable stores the user's Email Id into the database.
   *  
   * @param string $password
   *  This variable stores the user's password into the database.
   * 
   * @param string $confirmPassword
   *  Confirms the user's Email Id.
   * 
   * @param string $token
   *  A unique 15 bytes data is store in this variable which will be used to find a   particular Email address from the database.
   * 
   * @return boolean
   *  Returns true if all the details filled correctly along with same data present in the password and confirm password field else it returns password doen not match.
   */
  public function registration($user, $email, $password, $confirmPassword, $token) {

    include 'Connections.php';
    $duplicate = mysqli_query($conn, "select * from " . UserRegistration::TABLE_NAME . " where userName = '$user' or userEmail = '$email';");

    if (mysqli_num_rows($duplicate) > 0) {

      return "username or email already taken";
    } elseif ($password === $confirmPassword) {

      $query = "insert into " . UserRegistration::TABLE_NAME . " values('$user','$email','$password','$token')";
      mysqli_query($conn, $query);

      return TRUE;
    }
    return "password does not match";
  }
  /**
   * isValidPass - This function checks whether the password entered by a new user is valid to be processed or not.
   * 
   * @param string $password
   *  Takes user password as a string
   *
   * @return mix
   *  This function returns true if the password entered by the user is valid else it will return a message which tells what user should include in the password string to validate his/her password.
   */
  public function isValidPass(string $password) {

    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      return "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.'";
      return false;
    }
    return TRUE;
  }
}
