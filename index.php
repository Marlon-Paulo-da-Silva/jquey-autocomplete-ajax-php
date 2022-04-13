<?php 
  if (isset($_POST['search'])){
    $con = new mysqli('localhost','root','','jquery-autocomplete');
    $q = htmlentities($_POST['q']);
    

    $response = "Sem dados encontrados";

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
</head>
<body>
  <input type="text" placeholder="Procure aqui..." id="searchBox">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#searchBox').keyup(function() {
        var query = $('#searchBox').val();

        if(query.length > 2){
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