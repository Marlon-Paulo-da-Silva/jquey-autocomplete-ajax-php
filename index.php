<?php 
  if (isset($_POST['search'])){
    $response = "<ul><li>Não foi encontrado dados<li><ul>";

    $con = new mysqli('localhost','root','','jquery-autocomplete');
    $q = $con->real_escape_string($_POST['q']);
    
    $sql = $con->query("SELECT name FROM country WHERE name LIKE '%$q%'");

    if($sql->num_rows > 0){
      $response = "<ul>";

      while($data = $sql->fetch_array()){
        $response .= "<li>".$data['name']."<li>";
      }

      $response .= "</ul>";
    }

    exit( $response);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Jquery Ajax PHP</title>
  <style type="text/css">
    ul {
      float: left;
      list-style: none;
      padding: 0px;
      border: 1px solid black;
      margin-top: 0px;
    }
   
    input, ul {
      width: 250px;
    }
  </style>
</head>
<body>
  <input type="text" placeholder="Procure aqui..." id="searchBox">
  <div id="response"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#searchBox').keyup(function() {
        var query = $('#searchBox').val();

        if(query.length > 1){
          $.ajax(
            {
              url: 'index.php',
              method: 'POST',
              data: {
                search: 1,
                q: query
              },
              success: function(data) {
                console.log(data);
                $("#response").html(data);
              },
              dataType: 'text'
            }
          );
        }
        
      })
    });
  </script>
</body>
</html>