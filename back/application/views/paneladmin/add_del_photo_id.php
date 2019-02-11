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
           <h2>Добавить/Удалить фото в альбоме </h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <?php echo form_open_multipart('panel_admin_dms/add_del_photo_id');?>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                       <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Название" name="name_photo" value="<?php echo set_value('name'); ?>">
                   </div>
                   <div class="input-group-prepend">
                       <label for="exampleFormControlFile1" class="input-group-text">Загрузить фото</label>
                       <input type="file" class="custom-file-input" id="exampleFormControlFile1" name="foto">
                       <input type="submit" class="btn btn-outline-info" name="add" value="Добавить">
                   </div>
               </div>
           <input type="hidden" name="id_album" value="<?=$id_album?>">

           </form>
           <table class="table table-striped">
               <thead class="table-info">

                   <th>№</th>
                   <th>Название</th>
                   <th>Фото</th>
                   <th></th>

               </thead>
               <tbody>
               <?
               $i = 1;
               foreach ($fotos as $row){
                   echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$row['name_photo'].'</td>
                                <td><img src="'.WEB_SERVER.'/images/gallery/'.$row['folder_album'].'/'.$row['photo'].'" style="width: 200px; height: auto;"></td>
                                <td><form method="post">
                                    <input type="hidden" name="id_album" value="'.$id_album.'">
                                    <input type="hidden" name="id_photo" value="'.$row['id'].'">
                                    <input type="hidden" name="name_photo" value="'.$row['name_photo'].'">
                                    <input type="submit" class="btn btn-outline-warning" name="del" value="Удалить">
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