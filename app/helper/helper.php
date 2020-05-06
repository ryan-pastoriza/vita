<?php


function age($bday){
    $date = new DateTime($bday);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

function yearInterval($start, $end){
    $s = new DateTime($start);
    $e = new DateTime($end);
    $interval = $s->diff($e);
    return $interval->y;
}

// function oneYearBatch($batch){
//     return 
// }

function formatDate($format = 'F d, Y', $date){
   return date($format, strtotime($date));
}

function uploadCert($data, $path, $filename){
    $type = ['jpg', 'png', 'gif'];
    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
            throw new \Exception('invalid image type');
        }
    
        $data = base64_decode($data);
    
        if ($data === false) {
            throw new \Exception('base64_decode failed');
        }
    } else {
        throw new \Exception('did not match data URI with image data');
    }
    
    $filename = time().rand(0,9999)."_".strtolower(str_replace(" ", "_", $filename));
    $full_path = $path.$filename.".{$type}";
    
    file_put_contents($full_path, $data);
    return $full_path;
}