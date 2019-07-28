<?php
          //echo $hitung;
          $m = new mongoClient();
          $db=$m->earsip;
          $collection=$db->documents;
          // $regex = new MongoRegex("/^$search/i");
          
          $cursor = $collection->find(array(), array('tglupload'=>1,'kode'=>1,'jenisdok'=>1));
          $ctr= 0 ; 
           foreach ($cursor as $doc) {
         
                $date1=date_create($doc['tglupload']);
                $date2=date_create(date("Y-m-d"));
                //$date2 = date_create("2020-10-16"); 
                // Tahun percobaan kalau mau dirubah ke normal uncomment  yang diatas.
                $diff=date_diff($date1,$date2);

                // echo $diff->format("%R% days");
                $days = $diff->format("%a");

                                //echo "Nama file: ".$doc['namafile']."<br>";
                                //echo $doc['lokasi'];



                switch ($days) {
                      case ($days==366) :
                              $ctr+=1;
                              break;
                      case ($days==731 ) :
                              $ctr+=1;
                              break;
                      case ($days==1096):
                             $ctr+=1;
                              break;
                        case ($days==1461):
                             $ctr+=1;
                              break;
                        case ($days==1826):
                             $ctr+=1;
                              break;
                      default:
                     
                    
                    }
                    
                           

                            
                                ?>
                              
                                            
                           
                              
                                <?php
                               
           }
         
          
         
            
            $_SESSION['notifikasi'] = $ctr;
       
        
      ?>
