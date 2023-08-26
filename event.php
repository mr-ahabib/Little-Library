<?php
include("db.php");
session_start();
$sid = $_SESSION['s_id'];

$pid=$_GET['id'];



?>

<html lang="en" title="The Little Library"><head>
    <title>
        The Little Library
    </title>
   
</head>

<body>
    <div class="main">
    <div class="navbar-new">
        <div class="icon">
            <div class="uiu_logo">
                <img src="..//Little_Library/image/uiu logo.png" height="70px" width="70px" >
            </div>           
        </div>

        <div class="menu">
          <ul>
          <li><a href="Home.php">Home</a></li>
                <li><a href="admin_course_list.php">Councelling</a></li>
                <li><a href="course_table.php">Course List</a></li>
                <li><a href="stdnProfile.php">Problems</a></li>
                <li><a href="apply.php">Apply</a></li>
                <li><a href="sProfile.php">My Profile</a></li>
                <li><a href="index.php">Log out</a></li>
          </ul>
        </div>

        
    </div> 

    <?php
                                
    

                                $s = "SELECT * FROM `events`where id='$pid'";
                                $result = mysqli_query($conn, $s);
                                while ($row = mysqli_fetch_array($result)) {
                                  $id=$row['id'];
                                  $details=$row['details'];
                                  $title=$row['tittle'];
                                  $link=$row['link']
                                  
                                ?>

    <div class="event">
      <h2><?php echo$title ?></h2>
     <br>
      <div class="details">
          <p><?php echo $details ?></p>
          
         <a href='<?php echo$link ?>' ><button class="apply-btn">Source</button></a>
         
    
  <p>
    <br>
    <?php
  $sqli = "SELECT * FROM `interest` WHERE sid='$sid' AND pid='$pid'";
  $result = mysqli_query($conn, $sqli);


  $data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
    $id= $data['id'] ;
    echo"<a href='removelike.php?id=$id&&pid=$pid'><button type='submit' name='interestCount'>
    <span style='color:red'>&#x2764;</span> Interested
  </button></a>";

  }
  else{
     echo" <a href='interest.php?id=$pid'> <button type='submit' name='interestCount'>
      <span>&#x2764;</span> Interested?
    </button></a>";
 

  }
// while ($row = mysqli_fetch_array($result)) {

//     echo"<button type='submit' name='interestCount'>
//       <span style='color:red'>&#x2764;</span> Interested
//     </button>";
// }
    ?>
    <br>
    <br>
    <p>
    Total: <?php 
  $sql="SELECT COUNT(pid) as  total
  FROM `interest` 
  WHERE pid = $pid";
   $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    
       echo  $row['total'];

  }
  

  ?>
</p>

    
   
   

    
    <!-- <p>
      <a href="#" title="Love it" class="btn btn-counter multiple-count" data-count="0">
        <span>&#x2764;</span>  Interested
      </a>
    </p> -->
    

</div>
</form>
</br>
</br>
  </div>  

</div>
<?php } ?>
<style>
        * {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    font-family: sans-serif;
}


body {
  min-height: 100vh;
  background-color:gainsboro;
    display: flex;
    justify-content: center;
    align-items: center;
}


.navbar-new{
  width: 100%;
  height: 15%;
  margin: auto;
  margin-top: -8%;
  background-color: black;
  
}

.icon{
  
  width: 200px;
  float: left;
  height: 70px;

}

.logo{
  color: #ff7200;
  font-size: 35px;
  font-family: Arial;
  padding-left: 20px;
  float: left;
  padding-top: 10px;
  margin-top: 5px;
  
}
.uiu_logo{
  width: 200px;
  float: left;
  height: 70px;
  padding-top: 12px;
  padding-left: 20px;
}
.menu{
  width: 100px;
  float: left;
  height: 70px;
  
}

ul{
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: -45px;
  width: max-content;
}


ul li{
  list-style: none;
  margin-left: 62px;
  margin-top: 27px;
  font-size: 14px;
}

ul li a{
  text-decoration: none;
  color: #fff;
  font-family: Arial;
  font-weight: bold;
  transition: 0.4s ease-in-out;
}

ul li a:hover{
  color: #ff7200;
}




.event {
  margin: 20px;
}

.event h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.event .date {
  font-size: 16px;
  margin-bottom: 20px;
}

.event .details {
  max-height: 300px;
  text-align: left;
}

.event .details p {
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 10px;
  text-align: justify;
}

.buttons {
  margin-top: 40px;
  display: flex;
  justify-content: left;

}

.apply-btn, .interest-btn, .total-interest-btn {
  font-size: 16px;
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.interest-btn {
  background-color: #2196F3;
}

.total-interest-btn {
  background-color: #f44336;
}



.interest-count {
  display: block;
  width: 15%;
  height: 30px;
  font-size: 16px;
  line-height: 1.2;
  border: none;
  background-color: #f5f5f5;
  text-align: center;
  margin-top: 10px;
  margin-bottom: 10px;
}

/* button love interested */


.btn {
  box-shadow: 1px 1px 0 rgba(255,255,255,0.5) inset;
  border-radius: 3px;
  border: 1px solid;
  display: inline-block;
  height: 18px;
  line-height: 18px;
  padding: 0 8px;
  position: relative;

  font-size: 12px;
  text-decoration: none;
  text-shadow: 0 1px 0 rgba(255,255,255,0.5);
  background-color: #dbdbdb;
  border-color: #bbb;
  color: #666;
}

.btn:hover,
.btn.active {
  text-shadow: 0 1px 0 #b12f27;
  background-color: #f64136;
  border-color: #b12f27;
}

.btn:active {
  box-shadow: 0 0 5px 3px rgba(0,0,0,0.2) inset;
}

.btn span {
  color: #f64136;
}

.btn:hover,
.btn:hover span,
.btn.active,
.btn.active span {
  color: #eeeeee;
}

.btn:active span {
  color: #b12f27;
  text-shadow: 0 1px 0 rgba(255,255,255,0.3);
}

.btn-counter {
  margin-right: 39px;
}

.btn-counter:after,
.btn-counter:hover:after {
  text-shadow: none;
}

.btn-counter:after {
  border-radius: 3px;
  border: 1px solid #d3d3d3;
  background-color: #eee;
  padding: 0 8px;
  color: #777;
  content: attr(data-count);
  left: 100%;
  margin-left: 8px;
  margin-right: -13px;
  position: absolute;
  top: -1px;
}

.btn-counter:before {
  transform: rotate(45deg);
  filter: progid:DXImageTransform.Microsoft.Matrix(M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476, sizingMethod='auto expand');
  background-color: #eee;
  border: 1px solid #d3d3d3;
  border-right: 0;
  border-top: 0;
  content: '';
  position: absolute;
  right: -13px;
  top: 5px;
  height: 6px;
  width: 6px;
  z-index: 1;
  zoom: 1;
}


a.btn.btn-counter.multiple-count {
    margin-top: 5px;
}



   </style>
</body>

<script>
  const btn = document.querySelector('.btn-counter');
let count = 0;

function updateCount() {
  if (!btn.classList.contains('active')) {
    count++;
    localStorage.setItem('count', count);
    showInterestMessage();
  } else {
    count--;
    localStorage.setItem('count', count);
    showNotInterestedMessage();
  }
  btn.classList.toggle('active');
  btn.setAttribute('data-count', count);
}

function showInterestMessage() {
  const message = document.createElement('span');
  message.classList.add('message');
  message.innerText = 'You are interested';
  btn.appendChild(message);
  setTimeout(() => {
    btn.removeChild(message);
  }, 3000);
}

function showNotInterestedMessage() {
  const message = document.createElement('span');
  message.classList.add('message');
  message.innerText = 'You are not interested';
  btn.appendChild(message);
  setTimeout(() => {
    btn.removeChild(message);
  }, 3000);
}

btn.addEventListener('click', function(e) {
  e.preventDefault(); // prevent default behavior of the link
  updateCount();
});

</script>
</html>