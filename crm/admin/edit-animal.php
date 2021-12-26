<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $tt=$_POST['type'];
    $sexe=$_POST['sexe'];
    $date_naissance=$_POST['date_naissance'];
    $animalid=$_GET['id'];
    $date_deces=$_POST['date_deces'];
//$ticfile=$_FILES["tfile'"]["name"];
//move_uploaded_file($_FILES["tfile"]["tmp_name"],"ticketfiles/".$_FILES["tfile"]["name"]);
    $a=mysqli_query($con,"update animal set name='$name', type = '$tt', sexe='$sexe', date_naissance='$date_naissance',date_deces='$date_deces' where id='$animalid'");
// values('$tid','$email','$name','$tt','$priority','$ticket','$st','$pdate')");
if($a)
{
echo "<script>alert('Les informations de votre animal ont bien été changé');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | Create  ticket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		<div class="page-title">
            
        <?php $rt=mysqli_query($con,"select * from animal where id='".$_GET['id']."'");
        while($row=mysqli_fetch_array($rt))
        {
        ?>	<a href="manage-animals.php" class="button">Revenir à la liste</a>
			
             <div class="row">
                        <div class="col-md-12">
                        <h3> Edition de <?php echo $row['name'] ?></h3>
                            <form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                            <!-- onSubmit="return valid();"> -->
                            <div class="panel panel-default">
                            <div align="right">
                                        Date d'ajout :<?php echo $row['date_ajout'];?> 
                                    </div>
                                <div class="panel-body">
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Nom de l'animal</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control"/>
                                            </div>            
                                        
                                        </div>
                                    </div>
									
									
									 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Type d'animal</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select  name="type" class="form-control select">
                                            <option value="<?php echo $row['type'];?>"><?php $a=$row['type'];
                                            if($a=='chat')
												  {
												  echo "chat";
												  }
												    if($a=='chien')
												  {
												  echo "chien";
                                                  
												  }
                                                  if($a=='lapin')
												  {
												  echo "lapin";
												  }
                                                  if($a=='Autres')
												  {
												  echo "Autres";
												  }
												  
												  ?></option>
                                                <?php if($a=='lapin'){
                                                echo '<option value="chat">chat</option>'; 
                                                echo '<option value="chien">chien</option>'; 
                                                echo '<option value="Autres">Autres</option>'; 
                                                }?>
                                                <?php if($a=='chat'){
                                                echo '<option value="lapin">lapin</option>'; 
                                                echo '<option value="chien">chien</option>'; 
                                                echo '<option value="Autres">Autres</option>'; 
                                                }?>
                                                <?php if($a=='chien'){
                                                echo '<option value="chat">chat</option>'; 
                                                echo '<option value="lapin">lapin</option>'; 
                                                echo '<option value="Autres">Autres</option>'; 
                                                }?>
                                                <?php if($a=='Autres'){
                                                echo '<option value="chat">chat</option>'; 
                                                echo '<option value="chien">chien</option>'; 
                                                echo '<option value="lapin">lapin</option>'; 
                                                }?>
                                            </select>
                                           </div>
                                    </div>
									
										 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Sexe</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="sexe" class="form-control select">
                                            <option value="<?php echo $row['sexe'];?>"><?php $a=$row['sexe'];
												  if($a=='mâle')
												  {
												  echo "Mâle";
												  }
												    if($a=='femelle')
												  {
												  echo "Femelle";
												  }
												  
												  ?></option>
                                                  <?php if($a=='femelle'){
                                                echo '<option value="mâle">Mâle</option>'; 
                                                }
                                                if($a=='mâle'){
                                                    echo '<option value="femelle">Femelle</option>'; 
                                                    }
                                                ?>
                                            </select>
                                           </div>
                                    </div>
									
								
                                    </div>
                                    <div class="form-group">                              
                                        <label class="col-md-3 col-xs-12 control-label">Date de naissance</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <!-- <span class="input-group-addon"><span class="fa fa-pencil"></span></span> -->
                                                <input type="date" name="date_naissance" id="subject" value="<?php echo $row['date_naissance'];?>" class="form-control"/>
                                            </div>            
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">                              
                                        <label class="col-md-3 col-xs-12 control-label">Date de décés</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <!-- <span class="input-group-addon"><span class="fa fa-pencil"></span></span> -->
                                                <input type="date" name="date_deces" id="subject" value="<?php echo $row['date_deces'];?>" class="form-control"/>
                                            </div>            
                                        
                                        </div>
                                    </div>
                                    
                                    

                                </div>
								<?php } ?>
                                <div class="panel-footer">                                  
                                    <input type="submit" value="Update" name="update" class="btn btn-primary pull-right">
                                    <!-- <a value="Delete" name="delete" class="btn btn-primary pull-right"> -->
                                    <a type="button" class="btn btn-danger"href="delete-animal.php?id=<?php echo $_GET['id']; ?>" >Delete </a>
                                    </div>
                            </div>
                            </form>
                                    
                            
                        </div>
                    </div>                    
                                   
                                   
                                    
                               
                                    
                                    
                                      
             
            	
		</div>
    </div>
  </div>

 </div>
<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="../assets/js/core.js" type="text/javascript"></script> 
<script src="../assets/js/chat.js" type="text/javascript"></script> 
<script src="../assets/js/demo.js" type="text/javascript"></script> 

</body>
</html>