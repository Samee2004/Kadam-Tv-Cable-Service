<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
       
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="cbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch CHAT BOT
  </button>
 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ChatBot</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="height: 60svh;overflow-y: scroll;" id="body">
        <!-- <div style="display:none;" id="ans1">
                          <div class="d-flex flex-row justify-content-start"  >
                            <img src="https://github.com/rushiii3/Pet-venture/blob/main/1.png?raw=true"
                              alt="avatar 1" style="width: 40px; height: 100%;border-radius:50%;">
                            <div>
                              <p class="small p-2 ms-3 mb-4 rounded-3 bg-primary" style="color: white;" >
                                Hello Buddy!
                                </p>
                            </div>
                          </div>
</div> -->

                          <div class="d-flex flex-row justify-content-start"  >
                            <img src="https://github.com/rushiii3/Pet-venture/blob/main/chatbot.png?raw=true"
                              alt="avatar 1" style="width: 40px; height: 100%;">
                            <div>
                              <p class="small p-2 ms-3 mb-4 rounded-3 bg-primary" style="color: white;" >
                               Which state would you like to take a house on rent?
                                </p>
                                <button id="login" class="btn btn-primary">Login</button>
                                <button class="btn btn-primary" type="button" onclick="sendData(1,'Register')">Register</buton>
                            </div>
                          </div>
                          <!-- <div class="d-flex flex-row justify-content-end"  style="display:none">
                            
                            <div>
                              <p class="small p-2 ms-3 mb-4 rounded-3 " style="color: black;background-color: #f5f6f7;" >
                                Hiii
                                </p>
                            </div>
                            
                          </div> -->
                        
                          <!-- <div class="d-flex justify-content-between">
                            <p class="small mb-1">Rushi</p>
                            <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                          </div>
                          <div class="d-flex flex-row justify-content-start">
                            <img src="https://github.com/rushiii3/Pet-venture/blob/main/3.png?raw=true"
                              alt="avatar 1" style="width: 45px; height: 100%;border-radius:50%;">
                            <div>
                              <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">For what reason
                                would it
                                be advisable for me to think about business content?</p>
                            </div>
                          </div>

           
            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
              <div>
                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Thank you for your believe in
                  our
                  supports</p>
              </div>
            </div> -->
                          
</div>
        <div class="modal-footer">
          Powered By Vaze BoT
          <!-- <div id="send">
        <div class="d-flex flex-row justify-content-start">
        <input type="text" id="data" style="width: 18rem;">
                            <div>
                            <input type="submit" id="btn"  value="Send" style="padding-inline: 1rem;background-color:rgb(19, 128, 238);color: white;border-radius: 10px;margin-left:1rem;">
                            </div> -->
                          </div>
</div>
                
        </div>
      </div>
    </div>
  </div>


<script>
$(document).ready(function(){
 

  })
    var $text = $('#body');
   
  function sendData(value,msg){
    $value = value;
    $msg = msg;
        console.log($value);
        $mssg  = '<div class="d-flex flex-row justify-content-end"> <div> <p class="small p-2 ms-3 mb-4 rounded-3 " style="color: black;background-color: #f5f6f7;" > '+$msg+' </p> </div> </div>';
        $('#body').append($mssg);
        $('#data').val(" ");
        $.ajax({
                    type: 'POST',
                    url: 'botajax.php',
                    data: 'value=' + $value,
                    success: function(data) {
                        $('#body').append(data);
                        $text.animate({ scrollTop: $text[0].scrollHeight }, 'slow');

                    },
                    error: function (error) {
                    alert('error; ' + eval(error));
                  }
                    
                })
  }
</script>



    </body>
</html>