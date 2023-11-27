$("#page1").show();
$("#page3").hide();
$("#page2").hide();
var val = 0;
function generateOtp()
{

    val = Math.floor(1000 + Math.random() * 9000);

}
$("#reset").click(function(){
    var email = $("#email").val();
    generateOtp();
    sendemail(email,val);

});
function sendemail(email,val){
    console.log(email);
    console.log(val);
    Email.send({
        SecureToken : "4e1d1045-9f75-45bd-9fef-297a69bc3e72",
        To :email,
        From : "sameekshakadam23@gmail.com",
        Subject : "Forget password",
        Body : "Your OTP is "+val+" "
    }).then(
      message => alert(message)
    );
}
