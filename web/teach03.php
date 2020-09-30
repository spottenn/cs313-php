<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
   <form action="teach03php.php" method="post">
       Name: <input type="text" name="name"><br>
       E-mail: <input type="email" name="email"><br>

       <?php
           $major = array("CS-Computer Science","WDD-Web Design and Development","CIT-Computer information Technology","CE-Computer Engineering");
           foreach ($major as $value) {
               echo "<input type='radio' name='Major' value='$value'>$value<br>";
           }
        ?>
<!--       <input type="radio" name="Major" value="Computer Science"> <label>Computer Science</label><br>-->
<!--       <input type="radio" name="Major" value="Web Design and Development"> <label>Web Design and Development</label><br>-->
<!--       <input type="radio" name="Major" value="Computer information Technology"> <label>Computer information Technology</label><br>-->
<!--       <input type="radio" name="Major" value="Computer Engineering"> <label>Computer Engineering</label><br>-->
       <textarea name="Comments" rows="10" cols="30"></textarea><br><br>
       <input type="checkbox" name="continents[]" value="NA"><label>North America</label>
       <input type="checkbox" name="continents[]" value="SA"><label>South America</label>
       <input type="checkbox" name="continents[]" value="EU"><label>Europe</label>
       <input type="checkbox" name="continents[]" value="AS"><label>Asia</label>
       <input type="checkbox" name="continents[]" value="AU"><label>Australia</label>
       <input type="checkbox" name="continents[]" value="AF"><label>Africa</label>
       <input type="checkbox" name="continents[]" value="AN"><label>Antarctica</label>
       <input type="submit"><br>
   </form>


</body>
</html>