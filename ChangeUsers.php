<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>SchoolTeam</title>
        <link rel="stylesheet" href="TeamStyle.css" type="text/css">
    </head>
    
    <body>
        <div class="tittle">TEAM</div>
    <form method = "GET" action="UserChangeForm.php">    
    <div class="userList">
    <div id ="result"></div>
        <?php 
        
        
        $connect = mysqli_connect("localhost", "michal","xyz");
        $output = '';
        $query = "
        SELECT Id,Imie,Nazwisko,Nr_telefonu,Email FROM uzytkownik 
        ";
        mysqli_select_db($connect, "school" );
        mysqli_query($connect, $query)  ;
        $result = mysqli_query($connect, $query);  
        if(mysqli_num_rows($result) > 0)
        {
         
         while($row = mysqli_fetch_array($result))
         {
          $output .= '
        <label class="container">
          <ul class="aboutUser">
            <li name = "imie">Imię i Nazwisko:  '.$row["Imie"].'  '.$row["Nazwisko"].'</li>
            <li>Email:  '.$row["Email"].' </li>
            <li>Telefon:  '.$row["Nr_telefonu"].' </li>
            <li>Stanowisko: Instruktor </li>
          </ul>
          <img src="pictures/smiling-girl.png">
          <input type="checkbox" name="check_list[]" value="'.$row["Id"].'" class="check" onclick= checkOnlyThis(this) >
          <span class="checkmark"></span>
        </label>
            ';
         }
         echo $output;
         }
        else
        {
         echo 'Data Not Found';
        }
       
        ?>    
    </div>
    <div class="button" id="buttonCenter">
        <img src="pictures/group-users.png"></br>
        <button type="submit" class="buttonStyle" >Change</button>
    </div>
    <div class="button" id="buttonRight">
        <img src="pictures/finger.png"></br>
        <a href="EndSite.html"> <button type="button" class="buttonStyle">Back</button></a>
    </div>
    </form>
    
</body>
<script src="TeamList.js"></script>
<script>
    
        
         function load_data(query)
         {
          $.ajax({
           url:"MainTeamSite.php",
           method:"POST",
           data:{query:query},
           success:function(data)
           {
            $('#result').html(data);
           }
          });
         }
        
        
        </script>
</html>
