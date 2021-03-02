current_page([uri:string="/"]):string
<?php 
//return TRU or FALSE if $uri passed in the current page 
function current_page($uri="/"){
    // dd::strstr(request()->path(),$uri);
    return strstr(request()->path(),$uri);

}

// function other_page(){

//     return strstr(request()->path(),$uri);
    

// }