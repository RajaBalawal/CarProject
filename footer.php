<?php
?>


<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; BARROS-CARS 2018</p>
      </div>
      <!-- /.container -->
    </footer>


<?php
  /*
   <?php 
            
            $SelectMake = "Select DISTINCT Make from cars";
            
      echo"      <form method='get' name='f1' class='form-group' id='dropdown' action='view.php' >";
       echo                " <div class='row'>"; 
        echo              "   <div class='col-sm-4' >";
         echo              "<select class='form-control' name='cat' onchange=\"reload(this.form)\"><option value=''>Make</option>";
                        if($stmt = $con-query("$SelectMake")){
                            while($row2 = $stmt->fetch_assoc()){
                         if($row2['Make'] == @$cat){
                             echo "<option selected value'$row2[Make]'>$row2[Make]</option>";
                         }else{
                            echo  "<option value'$row2[Make]'>$row2[Make]</option>";
                         }           
                            }
                        }else{
                            echo $con->error;
                        }
                   echo " </select>";
        echo               "  </div>";
        echo             "   </div>";
        echo                 "<br>";
           echo            " <div class='row'>";
              echo           "<div class='col-sm-4'>";
               echo         "<select class='form-control' name'subcat'><option value=''>Model</option>";
                        if(isset($cat) and strlen($cat)>0){
                            if($stmt = $con->prepare("Select Distinct Model from cars where Make = ?")){
                                $stmt->bind_param('s',$cat);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while($row1=$result->fetch_assoc()){
                                    echo"<option value'$row1[Model]]'>$row1[Model]</option>";
                                }
                            }else{
                                $con-error;
                            }
                        }
                 echo  " </select>;
                         </div>
                        </div>
                        <br>
                        <button type='submit' name='Search' id='class='btn btn-primary btn-md'>Search</button>
                            
                    </form>
                    ";
                    ?>
   * 
   */
  ?>