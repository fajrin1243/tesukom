<?php 

foreach ($query as $data)
{

}
echo form_open('kompetensi_keahlian/save','class="form-horizontal" role="form"');
echo form_input(array('name'=>'id', 'type' => 'hidden', 'class' => 'form-control', 'value' =>!empty($data) ? $data['id'] : ""));
?>
<div class="form-group">
  <label for="inputKategori" class="col-sm-2 control-label">Mata Diklat</label>
  <div class="col-sm-10">
    <select name='diklat_id' class='form-control'>
      <?php foreach ($dropdown as $row){ 
        if (!empty($data['diklat_id'])) {
          ?>
          <option value="<?php echo $row['id'] ?>"<?php echo $data['diklat_id']==$row['id'] ? " selected='Selected'" : "" ?>><?php echo $row['nama'] ?></option>
          <?php
        }
        else{
          ?>
          <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
          <?php
        }

      }
      ?>


    </select>
  </div>
</div>
<div class="form-group">
 <label for="inputKategori" class="col-sm-2 control-label">Nama</label>
 <div class="col-sm-10">
  <?php echo form_input(array('type'=>'text','name'=>'nama','class'=>'form-control','placeholder'=>'Nama','value'=>!empty($data) ? $data['nama'] : ""))?>
</div>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Save</button>
    <button class="btn btn-default">Cancel</button>
  </div>
</div>
<?php
echo form_close();

?>