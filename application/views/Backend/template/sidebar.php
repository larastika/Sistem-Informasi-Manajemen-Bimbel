 <!--Main Content-->

 <div class="row main-content">
     <!--Sidebar left-->
     <div class="col-sm-3 col-xs-6 sidebar pl-0">
         <div class="inner-sidebar mr-3">
             <!--Image Avatar-->
             <div class="avatar text-center">
                 <img src="<?php echo base_url() . '/gambar/' . $user['image']; ?>" alt="" class="rounded-circle" />
                 <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span> -->
                 <p><strong><?= $user['name']; ?></strong></p>
                 <span class="text-primary small"><strong>Selamat Datang</strong></span>
             </div>
             <!--Image Avatar-->

             <!-- QUERY MENU  -->

             <?php
                $role_id = $this->session->userdata('role_id');

                $queryMenu =    "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
                $menu = $this->db->query($queryMenu)->result_array();

                ?>

             <?php foreach ($menu as $m) : ?>
                 <!--Sidebar Navigation Menu-->
                 <div class="sidebar-menu-container">
                     <ul class="sidebar-menu mt-1 mb-0">
                         <li class="parent">
                             <a href="#" onclick="toggle_menu('<?= $m['menu']; ?>'); return false" class=""><i class="fa fa-dashboard mr-3"> </i>
                                 <span class="none"> <?= $m['menu']; ?> <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                             </a>
                             <!-- submenu -->
                             <?php
                                $menuid = $m['id'];
                                $querysubmenu = "SELECT *
                                FROM `user_sub_menu` JOIN `user_menu` 
                                ON `user_menu`.`id` = `user_sub_menu`.`menu_id`
                                WHERE `user_sub_menu`.`menu_id` = $menuid
                                AND `user_sub_menu`.`is_active`= 1                          
                                ";
                                $submenu = $this->db->query($querysubmenu)->result_array();
                                ?>

                             <ul class="children" id="<?= $m['menu']; ?>">
                                 <?php foreach ($submenu as $sm) : ?>
                                     <li class="child"><a href="<?= base_url($sm['url']); ?>" class="ml-4"><i class="fa fa-angle-right mr-2"></i> <?= $sm['title'] ?></a></li>
                                 <?php endforeach ?>
                             </ul>

                         </li>
                         </li>
                     </ul>
                 </div>
             <?php endforeach; ?>
             <!--Sidebar Naigation Menu-->
         </div>
     </div>
     <!--Sidebar left-->