<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>REMOVE EVENT</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
<style>
       
        .login-box
        {
            margin-left:540px;
        }
        .heading
        {
            margin-right: 700px;
        }
    </style>
    </head>
    


    <body>
        <?php require 'utils/header.php';?>
<?php
//redirection in another page after successful login

	include("dbcon.php");
session_start();	
     
	if(isset($_POST['submit']))
	{  
        $s=$_SESSION['uid'];
        $eid=$_POST['EID'];
        $qry="select * from event;";
		$run=mysqli_query($conn,$qry);
        $row=mysqli_num_rows($run); 
        while($data=mysqli_fetch_array($run))
        {
		if($data['OID']==$s)
        {
		
		$qry1="DELETE FROM event WHERE EID='$eid'";
            $qry2="DELETE FROM result WHERE EID='$eid'";
		$run1=mysqli_query($conn,$qry1);
            $run2=mysqli_query($conn,$qry2);
        
        header('Location:REMOVEEVENTSUCCESSFULL.php');
        exit;
        }}  }
else
   { goto h; } ?>
    
    <?php    h: ?><h3 align="center" style="color:red">No Records Found !!!</h3> 
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <h1 align="center">Enter Event Details !!</h1>
                    <h1 align="center">_____________________</h1>
            <form name="loginform" method="POST" action="REMOVEEVENTCHECK.php" >
                
                 <div class="form-group">
                    Event ID
                     <?php
                     include("dbcon.php");
                $qry="SELECT * FROM  event where OID='$_SESSION[uid]'";
                $run=mysqli_query($conn,$qry);  
                   ?>
           <select name="EID" placeholder="Enter Event ID" class="form-control" required> <?php
                while($data=mysqli_fetch_array($run))
                {?>
               <option name="EID" required><?php echo $data['EID'] ?></option>
                     <?php } ?> </select></div>       
       
           <div>
            <?php   include("dbcon.php");
            $qry1="SELECT e.EID,e.NAME,e.OID FROM event e where e.OID='$_SESSION[uid]';";
              $run1=mysqli_query($conn,$qry1);
             while($data1=mysqli_fetch_array($run1))
              {
          
             ?>  <h5 align="center"> <?php echo $data1['NAME'] ?> 
               <p align=>Event ID  :<?php echo $data1['EID'] ?></p>                
                </h5>
                  <?php }?>
                    </div>
           <div class="form-group">
 
            <input type="submit" name="submit" value="Submit" class = "btn btn-default">
                                    <p></p>
                                    <p></p>
                               </div>
                            </form>
                    <h1 align="center">______________________</h1>
                    <h1 align="center">______________________</h1>
                    </div>
                </div>

        </div>
         <?php require 'utils/footer.php'; ?>
</body>
</html>
        