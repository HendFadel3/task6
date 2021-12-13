<?php
function Clean($input){
    return   strip_tags(trim($input));
 }
 function Validate($input,$flag)
 {
     $status=true;
     switch($flag)
     {
         case 1:
            if (empty($input))
            {
                $status = false;

            }
            break;
         case 2:
           if (strlen($input)<6)
              { $status = false;}
                break;
         case 3:
           if (strlen($input)<20)
              { $status = false; }
                  break;

         case 4:
         if(!in_array($extension,$allowedExtension)){
            $errors['img'] = "Invalid Extension";
                    $status = false; }
                  break;
     }
     return $status;
 }