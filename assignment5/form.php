<?php session_start();?>
<?php
  if (isset($_POST["generate-pdf"])) {
  //Including the fpdf package.  
  require("../fpdf/fpdf.php");
  $pdf = new FPDF();
  $pdf->AddPage();

  $pdf->SetFont("Arial", "B", 20,);
  $pdf->SetFillColor(129,173, 239);
  $pdf->Cell(0, 40, "Registration Details", 1, 1, 'C', true);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Image("../upload-images/" . $_SESSION["image"], 10, 10, 40, 40);
  $pdf->SetFillColor(255,255,53);
  $pdf->Cell(70, 30, "First Name ", 1, 0, 'C',true);
  $pdf->Cell(0, 30, $_SESSION["firstname"], 1, 1, 'C');
  $pdf->Cell(70, 30, "Last Name ", 1, 0, 'C',true);
  $pdf->Cell(0, 30, $_SESSION["lastname"], 1, 1, 'C');
  $pdf->Cell(70, 30, "Phone Number ", 1, 0, 'C',true);
  $pdf->Cell(0, 30, $_SESSION["phone"], 1, 1, 'C');
  $pdf->Cell(70, 30, "Email Address ", 1, 0, 'C',true);
  $pdf->Cell(0, 30, $_SESSION["email"], 1, 1, 'C');
  $pdf->SetFillColor(129,173, 239);
  $pdf->Cell(0, 30, "Marks Details", 1, 1, 'C', true);
  $pdf->SetTextColor(0, 0, 0);
  // $pdf->Cell(0,20,$_SESSION['text-area'],1,1,'C');
  if (isset($_SESSION['text-area'])) {
    //Entering the marks in the array
    $sub_marks = explode("\n", $_SESSION["text-area"]);
    $marks = array();
    foreach ($sub_marks as $value) {
      $temp = explode("|", $value);
      if ($temp[0] != "") {
        if ($temp[1] > 100) {
          continue;
        }
        $pdf->SetFillColor(255,255,53);
        $pdf->Cell(100, 20, $temp[0], 1, 0, 'C',true);
        $pdf->Cell(0, 20, $temp[1], 1, 1, 'C');
      }
    }
  }
  $file = time() . '.pdf';
  $pdf->Output($file, 'I');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/formstyle.css">
  <style>
    input[type=submit] {
      background-color: green;
      color: white;
      padding: 8px 15px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="img">
      <img src="../upload-images/<?php echo $_SESSION["image"]; ?>" alt="jeee">
    </div>
    <h2> <span class="hello">Hello</span>
      <?php
      echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];

      // session_destroy();
      ?>
    </h2>
    <?php
    if (isset($_SESSION["text-area"])) {
      include("textarea.php");
    } ?>
    <h4>Your number is </h4>
    <p class="para">
      <?php
      echo $_SESSION['phone'];
      ?>
    </p>
    <h4>Your Email address</h4>
    <p class="para">
      <?php
      echo $_SESSION['email'];
      ?>
    </p>
    <form action="form.php" method="post">
      <input type="submit" value="Generate pdf" name=generate-pdf>
    </form>
  </div>
</body>

</html>

