<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>
  <body>
      
      <div class="container">
     <div class="mx-auto content col-6">
        <h1> Check your Zip</h1>
          
          <form class="form-inline" action="" method="post">
                  <div class="form-group mx-sm-3">
                    <label for="inputPassword2"> Where u at: </label>
                    <input type="text" class="form-control" id="inputPassword2" name="place" placeholder="Where are you?" required>
                  </div>
                  <input class="btn btn-primary" id= "confirm" value="Confirm Place" readonly>
                </form>
        </div>
      </div>

    <!-- Optional JavaScript -->
      
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>

    <script>
          $('document').ready(function(){
                $('#confirm').click(function(){
                var city= $('#inputPassword2').val();
                $.ajax({
                    url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + city + " &key=AIzaSyDadE4h7FDs9gYGQdj-59BOK1Y1QetjL0I",
                    type: 'POST',
                    success: function(result){
                            $.each(result, function(key,value){
                                
                                if(result['status']== "OK"){
                                    $.each(result['results'][0]['address_components'], function(key,value){
                                    if (value['types'][0]== "postal_code")
                                        {    
                                        $('.content').append("<div class='alert alert-success' style='margin-top:10px'> <strong> Your zip code is: " + value['short_name'] +"</strong> </div>");
                                        }
                               })
                                    }
                                else{
                                    alert("Please put the correct name of the city");
                                }
                            }
                            )},
                     error: function(){
                            console.log('fail');
                    }
                })  
    })
});   
</script>
    
</html>
