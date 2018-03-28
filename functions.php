
<?php
// You need to create a class called User:
// A. The object should connect to database at the time of its creation. (15%)
// B. Createfourfunctionsintheclasswhichcanrealizetodisplayallusersinformation,
// delete one user, insert a new user and update a user’s password in table “accounts”,
// respectively. (20%)
// C. CreateanewUserobjectandcalleachfunctioninorderofdisplay,insert,deleteand
// update. Moreover, you need to create a HTML table using each function’s result to
// display what you have done for this job. (40%)
// D. Definetheheaderforeachelementandmakethetableheadingsboldandcentered.
// (10%)
// E. Specifyaborderforeachtablewhateveryoulike.(15%)
//Code to obtain files from the HTML
class User {

	private $fname;
	private $lname;
	private $phone;
	private $birthday;
	private $gender;
	private $email;
	private $password;




	public function __construct($fname, $lname, $phone, $birthday, $gender, $email, $password) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;}





    public function display(){
        $results = mysqli_query($GLOBALS[$con],"SELECT * FROM accounts where email='$this->email'");
        if(count($results) > 0){
                 echo "<table border=\"1\"><tr><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Email</th><th>Password</th></tr>";
                 foreach ($results as $row) {
                 echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
            }
         }
             else{
             echo '0 results';
         }
         echo "<br><br><br>";
    }

    public function insert(){

    $sql = "INSERT into accounts (fname, lname, phone, birthday, gender,email, password) values ('$this->fname', '$this->lname', '$this->phone', '$this->birthday', '$this->gender', '$this->email', '$this->password')" ;
    $results = mysql_query($sql);
    }


    public function delete(){
    $sql = "DELETE FROM accounts WHERE email='$this->email'" ;
    $results = mysql_query($sql);
    }


    public function update(){
    $sql = "UPDATE accounts SET password = 'rabble' WHERE email='$this->email' AND fname= '$this->fname' AND lname= '$this->lname' AND phone= '$this->phone' AND birthday= '$this->birthday' AND gender= '$this->gender' AND email= '$this->email' AND password= '$this->password'";
    $results = mysql_query($sql);
    }


//WHERE fname= '$this->fname', lname= '$this->lname', phone= '$this->phone', birthday= '$this->birthday', gender= '$this->gender', email= '$this->email', password= '$this->password'";

}


function connect(){
    mysql_connect ( "sql.njit.edu", "dbt7" ,  "l4WqZe070")
        or die ( "Unable to connect to MySQL database" ); //used to connect to Database

    mysql_select_db( "dbt7" );  //select the DB
    }




function newUser($userName, $fname, $lname, $phone, $birthday, $gender, $email, $password){
    ${$userName} = new User($fname, $lname, $phone, $birthday, $gender, $email, $password);
    connect();
    $GLOBALS[$userName]= ${$userName};
    $GLOBALS[$con]=mysqli_connect("sql.njit.edu", "dbt7" ,  "l4WqZe070","dbt7");

    }

/////////













newUser('user1', 'bob', 'shmob', '18005550123','01/01/01', 'male', 'test2@test.com', 'mook' );
$bla=$GLOBALS['user1'];
$bla->insert();

$bla->display();
    echo "<p> Result of Insert function </p>";


$bla->delete();

$bla->display();
    echo "<p> Result of Delete function </p>";

$bla->insert();

$bla->display();
    echo "<p> Result of Another Insert </p>";

$bla->update();

$bla->display();
    echo "<p> Result of Update function </p>";
//$user1->display();
?>