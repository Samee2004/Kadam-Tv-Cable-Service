<?php
include("../../config/connect.php");
if(
    !empty($_POST["name"]) && !empty($_POST["chan_language"]) && !empty($_POST["category"]) && !empty($_POST["chan_quality"]) && !empty($_POST["price"]) && !empty($_POST["img"]) 
)
{
    $name=$_POST["name"];
    $chan_language=$_POST["chan_language"];
    $price=$_POST["price"];
    $category=$_POST["category"];
    $img = $_POST["img"];
    $chan_quality = $_POST["chan_quality"];
    
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
$imagename = tf_convert_base64_to_image( $img, '../assets/' );

   $addchannelquery="INSERT INTO `channels` (`Chan_name`, `chan_price`, `chan_genre`, `chan_img`, `chan_language`, `chan_quality`) VALUES ( '$name', '$price', '$category', '$imagename', '$chan_language', '$chan_quality')";

   $exutequery=mysqli_query($con,$addchannelquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
if(
    !empty($_POST["id"]) 
)
{
    $id=$_POST["id"];
    $deletechannelquery="DELETE FROM channels WHERE `channels`.`chan_id` = '$id' ";

    $exutequery=mysqli_query($con,$deletechannelquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}

//upadte
if(
    !empty($_POST["update_name"]) &&
    !empty($_POST["update_chan_language"]) && 
    !empty($_POST["update_category"]) && 
    !empty($_POST["update_chan_quality"]) && 
    !empty($_POST["update_price"]) && 
    !empty($_POST["update_img"]) &&
    !empty($_POST["update_channelid"])
)
{
    
    $channelid=$_POST["update_channelid"];
    $name=$_POST["update_name"];
    $chan_language=$_POST["update_chan_language"];
    $price=$_POST["update_price"];
    $category=$_POST["update_category"];
    $img = $_POST["update_img"];
    $chan_quality = $_POST["update_chan_quality"];
    
    $get_img_to_delete = "SELECT * FROM `channels` WHERE `chan_id` = '$channelid' ";
    $result_of_delete_image = mysqli_query($con,$get_img_to_delete);
    if(mysqli_num_rows($result_of_delete_image)>0)
    {
        while($row_for_delete=mysqli_fetch_assoc($result_of_delete_image)){
            unlink($row_for_delete["chan_img"]);
        }
    }
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
$imagename = tf_convert_base64_to_image( $img, '../assets/' );

   $updatechannelquery="   UPDATE `channels` SET `Chan_name`='$name', `chan_price`='$price',  `chan_genre`='$category', `chan_language`='$chan_language', `chan_quality`='$chan_quality'  ,`chan_img` = '$imagename' WHERE `channels`.`chan_id` = '$channelid'";
   
   $exutequery=mysqli_query($con,$updatechannelquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
?>