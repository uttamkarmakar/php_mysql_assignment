<?php
include 'UserRegistration.php';
/**
 * UserLogin - Takes login details from the user.
 *
 * @author Uttam karmakar
 * 
 * @method login()
 *  Login method helps to process the login details from the existing user.
 */
class UserLogin
{
  /**
   * This function is invoke when a new user details required to store in the database.
   *
   * @param string $email
   *  This variable takes user's Email address as parameter.
   * 
   * @param string $password
   *  This variable takes user's password as parameter.
   * 
   * @return boolean
   *  Returns true if all the login details are matched correctly with the datas available in database.
   */
  public function login(string $email, string $password)
  {
    include 'Connections.php';

    $result = mysqli_query($conn, "select * from " . UserRegistration::TABLE_NAME . " where userEmail ='$email';");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      if ($password === ($row['userPassword'])) {
        return TRUE;
      }
    }
    return FALSE;
  }
}
