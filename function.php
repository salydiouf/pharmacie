<?php
function input($label, $name, $type = 'text', $id = "", $value = "", $otherAtt = "", $kind = "outline")
{
  if ($id == "") $id = $name;
  if ($kind != 'static')
    $labelkind = " class='form-label'";
  else
    $labelkind = "";
  return "<div class='input-group input-group-$kind my-3'>
        <label$labelkind>$label</label>
        <input value='$value' type='$type' name='$name' id='$id' class='form-control' $otherAtt>
      </div>";
}

function select($label, $name, $options, $id = "", $otherAtt = "")
{
  if ($id == "") $id = $name ?>
  <div class="input-group input-group-static mb-4">
    <label for="<?= $id ?>" class="ms-0"><?= $label ?></label>
    <select class="form-control" name="<?= $name ?>" id="<?= $id ?>" <?= $otherAtt?>><?php
                                                                  foreach ($options as $key => $value) { ?>
        <option value="<?= $key ?>"><?= $value ?></option><?php
                                                                  } ?>
    </select>
  </div><?php
}
function toAssArr($tab1, $tab2 = [])
{
  if (empty($tab2))
    $tab2 = $tab1;
  $tab3 = [];
  foreach ($tab1 as $key => $value) {
    $tab3[$tab2[$key]] = $value;
  }
  return $tab3;
}
?>