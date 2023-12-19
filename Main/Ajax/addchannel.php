<?php
include("../../config/connect.php");
if(
    !empty($_POST["name"]) && !empty($_POST["chan_number"]) && !empty($_POST["price"]) && !empty($_POST["category"]) && !empty($_POST["img"]) 
)
{
    $name=$_POST["name"];
    $chan_number=$_POST["chan_number"];
    $price=$_POST["price"];
    $category=$_POST["category"];
    $img = $_POST["img"];
    
     
/*@ Base64 image code */
 
function tf_convert_base64_to_image( $base64_code, $path, $image_name = null ) {
     
    if ( !empty($base64_code) && !empty($path) ) :
 
        // split the string to get extension and remove not required part
        // $string_pieces[0] = to get image extension
        // $string_pieces[1] = actual string to convert into image
        $string_pieces = explode( ";base64,", $base64_code);
 
        /*@ Get type of image ex. png, jpg, etc. */
        // $image_type[1] will return type
        $image_type_pieces = explode( "image/", $string_pieces[0] );
 
        $image_type = $image_type_pieces[1];
 
        /*@ Create full path with image name and extension */
        $store_at = $path.md5(uniqid()).'.'.$image_type;
 
        /*@ If image name available then use that  */
        if ( !empty($image_name) ) :
            $store_at = $path.$image_name.'.'.$image_type;
        endif;
 
        $decoded_string = base64_decode( $string_pieces[1] );
        
        file_put_contents( $store_at, $decoded_string );
        return $store_at;
    endif;
 
}
 
// Calling function auto generate unique name
$imagename = tf_convert_base64_to_image( $img, '../assests/' );

   $addchannelquery="INSERT INTO `channels` ( `Chan_name`, `chan_number`, `chan_price`, `chan_genre`, `chan_img`) VALUES ('$name', '$chan_number', '$price', '$category', '$imagename')";

   $exutequery=mysqli_query($con,$addchannelquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
?>