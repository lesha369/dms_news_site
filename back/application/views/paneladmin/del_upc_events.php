<section>
   <div class="row">
       <div class="col-lg-2 text-center">
           <h2 class="hr">Меню</h2>
           <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown" style="width: 100%">
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_upc_event" class="btn btn-secondary">Добавить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_upc_event" class="btn btn-secondary active">Удалить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_album" class="btn btn-secondary">Добавить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_album" class="btn btn-secondary">Удалить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_photos_album" class="btn btn-secondary">Добавить/Удалить фото</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_carousel" class="btn btn-secondary">Добавить/Удалить фото карусели</a>
           </div>
       </div>
       <div class="col-lg-8">
           <h2>Удалить мероприятие</h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <table class="table table-striped">
               <thead class="table-info">

                   <th>№</th>
                   <th>Короткое название</th>
                   <th>Полное название</th>
                   <th></th>

               </thead>
               <tbody>
               <?
               $i = 1;
               foreach ($upc_events as $row){
                   echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$row['short_name'].'</td>
                                <td>'.$row['full_name'].'</td>
                                <td><form method="post">
                                    <input type="hidden" name="id_upc_event" value="'.$row['id'].'">
                                    <input type="hidden" name="short_name" value="'.$row['short_name'].'">
                                    <input type="submit" class="btn btn-outline-warning" value="Удалить">
                                </form></td>
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