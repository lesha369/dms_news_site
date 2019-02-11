<section>
   <div class="row">
       <div class="col-lg-2 text-center">
           <h2 class="hr">Меню</h2>
           <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown" style="width: 100%">
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_upc_event" class="btn btn-secondary">Добавить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_upc_event" class="btn btn-secondary">Удалить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_album" class="btn btn-secondary">Добавить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_album" class="btn btn-secondary">Удалить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_photos_album" class="btn btn-secondary">Добавить/Удалить фото</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_carousel" class="btn btn-secondary active">Добавить/Удалить фото карусели</a>
           </div>
       </div>
       <div class="col-lg-8">
           <h2>Добавить фото в карусель</h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <?php echo form_open_multipart('panel_admin_dms/add_del_carousel');?>
           <div class="form-group">
               <label for="exampleInputShortName">Название фото</label>
               <input type="text" class="form-control" id="exampleInputShortName" aria-describedby="Короткое" placeholder="Название фото" name="text_info" value="<?php echo set_value('text_info'); ?>">
               <small id="emailHelp" class="form-text text-muted">Не обязательно для заполнения.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputFullName">Описание фото</label>
               <textarea class="form-control" id="exampleInputFullName" placeholder="Описание фото" name="abouth_info"><?php echo set_value('abouth_info'); ?></textarea>
               <small id="emailHelp" class="form-text text-muted">Не обязательно для заполнения.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputImg">Фото</label>
               <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
               <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
           </div>
           <button type="submit" class="btn btn-primary" name="add_carousel" value="1">Добавить фото</button>
           </form>
           <div class="hr"></div>
           <table class="table table-striped">
               <thead>
               <th>№</th>
               <th>Фото</th>
               <th>Название</th>
               <th>Описание</th>
               <th></th>
               </thead>
               <tbody>
               <?
               $i=1;
               foreach ($carousel as $row){
                   echo '<tr>
                   <td>'.$i.'.</td>
                   <td><img src="'.WEB_SERVER.'/images/carousel/'.$row['foto'].'" alt="'.$row['foto'].'" title="'.$row['foto'].'" style="height: 200px; width: auto;"></td>
                   <td>'.$row['text_info'].'</td>
                   <td>'.$row['abouth_info'].'</td>
                   <td>
                       <form action="" method="post">
                           <input type="hidden" name="id" value="'.$row['id'].'">
                           <button class="btn btn-danger" name="delete_carousel">Удалить</button>
                       </form>
                   </td>
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