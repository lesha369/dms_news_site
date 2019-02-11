<section>
   <div class="row">
       <div class="col-lg-2 text-center">
           <h2 class="hr">Меню</h2>
           <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown" style="width: 100%">
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_upc_event" class="btn btn-secondary">Добавить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_upc_event" class="btn btn-secondary">Удалить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_album" class="btn btn-secondary">Добавить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_album" class="btn btn-secondary">Удалить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_photos_album" class="btn btn-secondary active">Добавить/Удалить фото</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_carousel" class="btn btn-secondary">Добавить/Удалить фото карусели</a>
           </div>
       </div>
       <div class="col-lg-8">
           <h2>Добавить/Удалить фото в альбоме</h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <table class="table table-striped">
               <thead class="table-info">

                   <th>№</th>
                   <th>Название</th>
                   <th>Логотип</th>
                   <th></th>

               </thead>
               <tbody>
               <?
               $i = 1;
               foreach ($albums as $row){
                   echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$row['name'].'</td>
                                <td><img src="'.WEB_SERVER.'/images/gallery/'.$row['folder_album'].'/'.$row['logo'].'" style="width: 200px; height: auto;"></td>
                                <td><a href="'.WEB_SERVER.'/panel_admin_dms/add_del_photo_id/'.$row['id'].'" class="btn btn-outline-success">Выбрать</a></td>
                            </tr>';
                   $i++;
               }
               ?>
               </tbody>
           </table>
       </div>
       <div class="col-lg-2"></div>
   </div>

</section>