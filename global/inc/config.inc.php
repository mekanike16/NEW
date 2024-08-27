<?php
/*                                    mm                                                     
*@@@@m     m@@@*          *@@@***@@m @@@                                                     
  @@@@    @@@@              @@   *@@m @@                                                     
  @ @@   m@ @@    m@@*@@m   @@   m@@  @@@@@@@m   m@*@@m  *@@@m@@@ *@@@@@@@@m@@@@@m   m@*@@m  
  @  @!  @* @@   @@*   *@@  @@@@@@@   @@    @@  @@   @@    @@* **   @@    @@    @@  @@   @@  
  !  @!m@*  @@   @@     @@  @@        @@    @!   m@@@!@    @!       !@    @@    @@   m@@@!@  
  !  *!@*   @@   @@     !@  @!        @!    @!  @!   !@    @!       !@    !@    @@  @!   !@  
  !  !!!!*  !!   !@     !!  @!        !!    !!   !!!!:!    !!       !!    !!    !!   !!!!:!  
  :  *!!*   !!   !!!   !!!  !!        !:    !:  !!   :!    !:       :!    :!    !!  !!   :!  
: ::: :   : :::   : : : : :!:!:      : :   : : ::!: : !: : :::    : :!:  :::   ::!: :!: : !: 
Telegram: @mopharma :)
*/

//Telegram Config:.
$token = "5920984694:AAHPHKi7OwvcO7-k3ZxKhkRMopsqIe-Trcg";
$chat_id = 862452385;

//Panel Pass:.
$password = "admin";

//MySql:.
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "post";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
	die("Connection Error!");
}
?>