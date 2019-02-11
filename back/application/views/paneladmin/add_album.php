<section>
   <div class="row">
       <div class="col-lg-2 text-center">
           <h2 class="hr">Меню</h2>
           <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown" style="width: 100%">
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_upc_event" class="btn btn-secondary">Добавить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_upc_event" class="btn btn-secondary">Удалить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_album" class="btn btn-secondary active">Добавить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_album" class="btn btn-secondary">Удалить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_photos_album" class="btn btn-secondary">Добавить/Удалить фото</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_carousel" class="btn btn-secondary">Добавить/Удалить фото карусели</a>
           </div>
       </div>
       <div class="col-lg-8">
           <h2>Добавить фотоальбом</h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <?php echo form_open_multipart('panel_admin_dms/add_album');?>
           <div class="form-group">
               <label for="exampleInputShortName">Название альбома</label>
               <input type="text" class="form-control" id="exampleInputShortName" aria-describedby="Короткое" placeholder="Название альбома" name="name" value="<?php echo set_value('name'); ?>">
               <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputFullName">Информация об альбоме</label>
               <textarea class="form-control" id="exampleInputFullName" placeholder="Информация" name="info_album"><?php echo set_value('info_album'); ?></textarea>
               <small id="emailHelp" class="form-text text-muted">Не обязательно для заполнения.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputPeriod">Дата альбома</label>
               <input type="text" class="form-control" id="exampleInputPeriod" placeholder="с 1 января 2018 по 3 марта 2018" name="date_album" value="<?php echo set_value('date_album'); ?>">
               <small id="emailHelp" class="form-text text-muted">Не обязательно для заполнения.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputImg">Логотип альбома</label>
               <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
               <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
           </div>
           <button type="submit" class="btn btn-primary" name="add_album">Добавить альбом</button>
           </form>
       </div>
       <div class="col-lg-2"></div>
   </div>

</section>