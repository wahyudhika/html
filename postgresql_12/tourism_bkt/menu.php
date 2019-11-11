sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              	  <p class="centered"><a href="index.php"><img src="icon/home.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo @$_SESSION['username'] ?></h5>

                  <li class="sub">
                      <a onclick="init();listTourism();" style="cursor:pointer;background:none"><i class="fa fa-list"></i>List Tourism</a>
                  </li>

                  <li class="sub">
                      <a onclick="" style="cursor:pointer;background:none"><i class="fa fa-thumb-tack"></i>Tourism Around You</a>
                      <ul class="treeview-menu">
                        <!-- <li style="margin-top:10px"><input id="inputradius" type="range" name="inputradius" data-highlight="true" min="1" max="10" value="1"></li>                             
                        <li><a onclick="init();tourism_sekitar_user();" style="cursor:pointer;background:none">Search</a></li> -->
                        <div class=" form-group" style="color: white;" > <!-- <br> -->
                          <!-- <label>Based On Radius</label><br> -->
                          <label for="inputradius" style="font-size: 10pt";>Radius : </label>
                          <label  id="nilai"  style="font-size: 10pt";>0</label> m
                          
                          <input  type="range" onchange="init();tourism_sekitar_user();cekkk();" id="inputradius" 
                                  name="inputradius" data-highlight="true" min="0" max="20" value="0" >
                          <script>
                            function cekkk()
                            {
                              document.getElementById('nilai').innerHTML=document.getElementById('inputradius').value*100
                            }

                            function rad5()
                            {
                              document.getElementById('rad5').innerHTML=document.getElementById('inputradius5').value*100
                            }

                            function rad3()
                            {
                              document.getElementById('rad3').innerHTML=document.getElementById('inputradius3').value*100
                            }

                            function rad4()
                            {
                              document.getElementById('rad4').innerHTML=document.getElementById('inputradius4').value*100
                            }

                            function rad6()
                            {
                              document.getElementById('rad6').innerHTML=document.getElementById('inputradius6').value*100
                            }

                            function rad7()
                            {
                              document.getElementById('rad7').innerHTML=document.getElementById('inputradius7').value*100
                            }
                            function rad8()
                            {
                              document.getElementById('rad8').innerHTML=document.getElementById('inputradius8').value*100
                            }
                            function rad9()
                            {
                              document.getElementById('rad9').innerHTML=document.getElementById('inputradius9').value*100
                            }
                            function rad10()
                            {
                              document.getElementById('rad10').innerHTML=document.getElementById('inputradius10').value*100
                            }

                          </script>
                        </div>
                      </ul>                     
                  </li>

                  <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-search"></i>
                        <span>Search Tourism By</span>
                    </a>
                    <ul class="sub">
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Name</a>
                          <ul class="sub">
                            <li style="margin-top:10px"><input id="input_name" type="text" class="form-control"></li>                             
                            <li><a onclick="init();cari_tourism(1)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>

                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Address</a>
                          <ul class="sub">
                            <li style="margin-top:10px"><input id="input_address" type="text" class="form-control"></li>                             
                            <li><a onclick="init();cari_tourism(2)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>

                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_jenis">
                              <?php                      
                              require_once('../connect.php');    
                              $querysearch="SELECT id, name FROM tourism_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                              ?>
                            </select>
                            </li>                             
                            <li><a onclick="init();cari_tourism(3)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>

                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                          <ul class="sub">
                            <!-- <li style="margin-top:10px"><input id="input_fasility" type="text" class="form-control"></li> -->   
                            <?php
                              $q = "SELECT * FROM facility_tourism";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="input_fasility[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li><a onclick="init();cari_tourism(4)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Worship Place</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="inputradius5" style="font-size: 10pt; color:white;">WP Radius : </label>
                              <label  id="rad5"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad5()" type="range" id="inputradius5" name="inputradius5" data-highlight="true" min="0" max="20" value="0" >
                            </li>
                            <li style="margin-top:10px">
                              <label for="input_facility" style="font-size: 10pt; color:white;">WP Facility : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM facility";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="input_facility[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li><a onclick="init();cari_tourism(5)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Culinary Place</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="inputradius3" style="font-size: 10pt; color:white;">CP Radius : </label>
                              <label  id="rad3"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad3()" type="range" id="inputradius3" name="inputradius3" data-highlight="true" min="0" max="20" value="0" >
                            </li>
                            <li style="margin-top:10px">
                              <label for="facility_culinary" style="font-size: 10pt; color:white;">CP Facility : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM facility_culinary";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="facility_culinary[]" value="<?= $d->id; ?>"> <?= $d->facility; ?></li>
                                <?php
                              }
                            ?>
                            <li style="margin-top:10px">
                              <label for="culinary" style="font-size: 10pt; color:white;">CP Culinary : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM culinary";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="culinary[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li><a onclick="init();cari_tourism(6)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Hotel</a>
                          <ul class="sub">     
                            <li style="margin-top:10px">
                              <label for="inputradius4" style="font-size: 10pt; color:white;">Hotel Radius : </label>
                              <label  id="rad4"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad4()" type="range" id="inputradius4" name="inputradius3" data-highlight="true" min="0" max="20" value="0" >
                            </li>                         
                            <li style="margin-top:10px">
                              <label for="h_facility" style="font-size: 10pt; color:white;">Hotel Facility : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM facility_hotel";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="h_facility[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li style="margin-top:10px">
                              <label for="h_type" style="font-size: 10pt; color:white;">Hotel Type : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM hotel_type";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="h_type[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li><a onclick="init();cari_tourism(8)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Small Industry District</a>
                          <ul class="sub">      
                            <li style="margin-top:10px">
                              <label for="inputradius6" style="font-size: 10pt; color:white;">SI Radius : </label>
                              <label  id="rad6"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad6()" type="range" id="inputradius6" name="inputradius6" data-highlight="true" min="0" max="20" value="0" >
                            </li>                        
                            <li style="margin-top:10px">
                              <label for="district" style="font-size: 10pt; color:white;">Tourism District : </label>
                              <input id="district" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="si_type" style="font-size: 10pt; color:white;">SI Type : </label>
                              <input id="si_type" type="text" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(7)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Souvenir</a>
                          <ul class="sub">      
                            <li style="margin-top:10px">
                              <label for="inputradius7" style="font-size: 10pt; color:white;">Souvenir Radius : </label>
                              <label  id="rad7"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad7()" type="range" id="inputradius7" name="inputradius7" data-highlight="true" min="0" max="20" value="0" >
                            </li>                        
                            <li style="margin-top:10px">
                              <label for="s_district" style="font-size: 10pt; color:white;">Tourism District : </label>
                              <input id="s_district" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="s_type" style="font-size: 10pt; color:white;">Souvenir Type : </label>
                              <input id="s_type" type="text" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(9)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Restaurant Culinary</a>
                          <ul class="sub">      
                            <li style="margin-top:10px">
                              <label for="inputradius8" style="font-size: 10pt; color:white;">Restaurant Radius : </label>
                              <label  id="rad8"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad8()" type="range" id="inputradius8" name="inputradius8" data-highlight="true" min="0" max="20" value="0" >
                            </li>                        
                            <li style="margin-top:10px">
                              <label for="r_district" style="font-size: 10pt; color:white;">Tourism District : </label>
                              <input id="r_district" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="r_type" style="font-size: 10pt; color:white;">Tourism Type : </label>
                              <input id="r_type" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="r_cul" style="font-size: 10pt; color:white;">Restaurant Culinary : </label>
                              <input id="r_cul" type="text" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(10)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Restaurant Price</a>
                          <ul class="sub">      
                            <li style="margin-top:10px">
                              <label for="inputradius9" style="font-size: 10pt; color:white;">Restaurant Radius : </label>
                              <label  id="rad9"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad9()" type="range" id="inputradius9" name="inputradius9" data-highlight="true" min="0" max="20" value="0" >
                            </li>                        
                            <li style="margin-top:10px">
                              <label for="r_district2" style="font-size: 10pt; color:white;">Tourism District : </label>
                              <input id="r_district2" type="text" class="form-control">
                            </li>    
                            <li style="margin-top:10px">
                              <label for="r_price" style="font-size: 10pt; color:white;">Restaurant Price (<=) : Rp </label>
                              <input id="r_price" type="number" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(11)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type, Angkot, and Facility</a>
                          <ul class="sub">                         
                            <li style="margin-top:10px">
                              <label for="t_type" style="font-size: 10pt; color:white;">Tourism Type : </label>
                              <select name="t_type" id="t_type">
                                <?php
                                  $q = "SELECT * FROM tourism_type";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>  
                            <li style="margin-top:10px">
                              <label for="t_facility2" style="font-size: 10pt; color:white;">Tourism Facility : </label>
                              <input id="t_facility2" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="angkot" style="font-size: 10pt; color:white;">Angkot : </label>
                              <select name="angkot" id="angkot">
                                <?php
                                  $q = "SELECT * FROM angkot";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->destination; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>
                            <li><a onclick="init();cari_tourism(12)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Price, Angkot, and Facility</a>
                          <ul class="sub">     
                            <li style="margin-top:10px">
                              <label for="inputradius10" style="font-size: 10pt; color:white;">Culinary Radius : </label>
                              <label  id="rad10"  style="font-size: 10pt; color:white;">0</label ><p style="font-size: 10pt; color:white;display:inline;"> m</p>
                              <input onchange="rad10()" type="range" id="inputradius10" name="inputradius10" data-highlight="true" min="0" max="20" value="0" >
                            </li>                    
                            <li style="margin-top:10px">
                              <label for="t_price" style="font-size: 10pt; color:white;">Tourism Price : </label>
                              <input id="t_price" type="number" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="t_facility3" style="font-size: 10pt; color:white;">Culinary Facility : </label>
                              <input id="t_facility3" type="text" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="angkot2" style="font-size: 10pt; color:white;">Angkot : </label>
                              <select name="angkot2" id="angkot2">
                                <?php
                                  $q = "SELECT * FROM angkot";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->destination; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>
                            <li><a onclick="init();cari_tourism(13)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Time and Type</a>
                          <ul class="sub">   
                            <li style="margin-top:10px">
                              <label for="t_type2" style="font-size: 10pt; color:white;">Tourism Type : </label>
                              <select name="t_type2" id="t_type2">
                                <?php
                                  $q = "SELECT * FROM tourism_type";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>
                            <li style="margin-top:10px">
                              <label for="open" style="font-size: 10pt; color:white;">Open : </label>
                              <input id="open" type="time" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="close" style="font-size: 10pt; color:white;">Close : </label>
                              <input id="close" type="time" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(14)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Ticket</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="t_price2" style="font-size: 10pt; color:white;">Price : </label>
                              <input id="t_price2" type="number" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(15)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Ticket & Facility</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="t_price3" style="font-size: 10pt; color:white;">Price : </label>
                              <input id="t_price3" type="number" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="t_facility4" style="font-size: 10pt; color:white;">Facility : </label>
                              <input id="t_facility4" type="text" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(16)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Ticket & Type</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="t_price4" style="font-size: 10pt; color:white;">Price : </label>
                              <input id="t_price4" type="number" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="t_type3" style="font-size: 10pt; color:white;">Tourism Type : </label>
                              <select name="t_type3" id="t_type3">
                                <?php
                                  $q = "SELECT * FROM tourism_type";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>
                            <li><a onclick="init();cari_tourism(17)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Ticket & Address</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="t_price5" style="font-size: 10pt; color:white;">Price : </label>
                              <input id="t_price5" type="number" class="form-control">
                            </li>
                            <li style="margin-top:10px">
                              <label for="t_address" style="font-size: 10pt; color:white;">Address : </label>
                              <input id="t_address" type="text" class="form-control">
                            </li>
                            <li><a onclick="init();cari_tourism(18)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                      <li class="sub">
                          <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Angkot Worship Place</a>
                          <ul class="sub">
                            <li style="margin-top:10px">
                              <label for="wp_type" style="font-size: 10pt; color:white;">Worship Type : </label>
                              <select name="wp_type" id="wp_type">
                                <?php
                                  $q = "SELECT * FROM category_worship_place";
                                  $r = pg_query($q);
                                  while($d = pg_fetch_object($r)){ ?>
                                    <option value="<?= $d->id; ?>"><?= $d->name; ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </li>
                            <li style="margin-top:10px">
                              <label for="wp_facility" style="font-size: 10pt; color:white;">Worship Facility : </label>
                            </li>
                            <?php
                              $q = "SELECT * FROM facility";
                              $r = pg_query($q);
                              while($d=pg_fetch_object($r)){
                                ?>
                                <li style="margin-top:10px;color:white"><input type="checkbox" name="wp_facility[]" value="<?= $d->id; ?>"> <?= $d->name; ?></li>
                                <?php
                              }
                            ?>
                            <li><a onclick="init();cari_tourism(19)" style="cursor:pointer;background:none">Search</a></li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                  <!-- <li class="sub">
                      <a href="apps.apk" download>
                      <i class="fa fa-download" ></i>Download Android Apps</a>
                  </li> -->
                  <li class="sub">
                      <a onclick="backToHome();" style="cursor:pointer;background:none"><i class="fa fa-home"></i>Route to First Location</a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href=".././">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end