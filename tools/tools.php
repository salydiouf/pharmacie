<?php
function input($label, $name, $type = "text", $value = "", $id = "", $otherAtt = "", $otherClass = "", $afterInput = ""){ 
    if($id == "" && $type != "radio")
        $id = $name;
    if(in("placeholder", $otherAtt))
        $floating = '';
    else
        $floating = 'class="bmd-label-floating"';

    if($type == "checkbox"){
        $checked = old($name) == $value ? " checked" : "";?>
        <div class="form-check <?=$otherClass?>">
            <label class="form-check-label">
                <input name="<?=$name?>" id="<?=$id?>" class="form-check-input" type="checkbox" value="<?=$value?>" <?=$otherAtt.$checked?>><?=$label?>
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
            </label>
            <?=$afterInput?>
        </div><?php
    }elseif($type == "radio"){
    //   $checked = old($name) == $value ? " checked" : "";  ?>
        <div class="form-check form-check-radio  <?=$otherClass?>">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="<?=$name?>" id="<?=$id?>" value="<?=$value?>" <?=$otherAtt?>>
                <?=$label?>
                <span class="circle">
                    <span class="check"></span>
                </span>
            </label>
            <?=$afterInput?>
        </div><?php
    }else{ ?>
    <div class="form-group bmd-form-group <?=$otherClass?>">
        <label <?=$floating?>><?=$label?></label>
        <input type="<?=$type?>" name="<?=$name?>" id="<?=$id?>" value="<?=$value?>" class="form-control" <?=$otherAtt?>>
        <?=$afterInput?>
    </div> <?php
    }
}

function select($label, $name, $options, $defaultVal = "", $id = "", $otherClass = "", $afterSelect = ""){?>
    <div class="form-group bmd-form-group <?=$otherClass?>">
        <label class="bmd-label-static" for="exampleFormControlSelect1"><?=$label?></label>
        <select name="<?=$name?>" id="<?=$id?>" class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1"> <?php
            foreach ($options as $key => $value) {
                if($key == $defaultVal)
                    $selected = " selected";
                else
                    $selected = "";
                ?>
                <option value="<?=$key?>"<?=$selected?>><?=$value?></option> <?php
            }?>        
        </select>
        <?=$afterSelect?>
    </div><?php   
} 

function textarea ($label, $name, $id="", $value = "", $cols="", $rows=""){?>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><?=$label?></label>
        <textarea name="<?=$name?>" id="<?=$id?>" class="form-control" rows="<?=$rows?>" cols="<?=$cols?>"><?=$value?></textarea>
    </div><?php
}

function in($toFine, $where){
    if(is_string($where))
        return !(strpos($where, $toFine) === false);
    elseif(is_array($where))
        return !(array_search($toFine, $where) === false);
    //...
}


// Vérification avec masque
function isDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
function isMail($value){
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}
function isName($value, $minLen = 2, $maxLen = 50, $mustBeString = true){
    $len = strlen($value);
    return $minLen <= $len && $len <= $maxLen && ($mustBeString == true && !is_numeric($value));
}
function isComment($value, $minNbrOfWord = 2, $maxNbrOfWord = 500){
    $nbrOfWord = str_word_count($value);
    return $minNbrOfWord <= $nbrOfWord && $nbrOfWord <= $maxNbrOfWord;
}
function isTel($value, $regex){
    return preg_match($regex, $value) == true;
}
function isPassword($value, $regex){
    return preg_match($regex, $value) == true;
}
function regexTelSn(){
    return "#^(\+221|221|)( |)(77|76|75|78|70|33)( |)[0-9]{3}( |)([0-9]{2}( |)){2}$#";
} 

function regexPassword($spatialChar = true, $upperCase = true, $minLen = 8, $maxLen = 17, $digit = true, $lowerCase = true){
    $lowerCase = $lowerCase ? "(?=.*[a-z])" : "";
    $upperCase = $upperCase ? "(?=.*[A-Z])" : "";
    $digit = $digit ? "(?=.*[0-9])" : "";
    $spatialChar = $spatialChar ? "(?=.*\W)" : "";
    return "#^$lowerCase$upperCase$digit$spatialChar.{".$minLen.",".$maxLen."}$#";
    //^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,17}$
}

/**Comme la function explode : pour découper une chaine de caractères en un tableau de chaine de catactères */
function split($toSplit, $separator = " "){
    return explode($separator, $toSplit);
}
/**Cette fonction affiche convenablement une donnée en la centrant. */
function seec($data){
    echo "<center>";
    see($data);
    echo "</center>";
}
/**Cette fonction affiche convenablement une donnée. */
function see($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function sd($data){
    see($data);
    die;
}
function ok($value){
    return "<font color='green'>$value</font>";
}
function nonOk($value){
    return "<font color='red'>$value</font>";
}
function post($name){
    return isset($_POST[$name])? $_POST[$name] : "";
}
function somme($a, $b) {
    $s = $a + $b;
    return $s;
}

function isRegion($value){
    return in($value, regions);
}
function isCentreInteret($value){
    return in($value, centreInteret);
}

function redirect($where){
    header("Location: $where");
}
function back($where){
    redirect($where);
}
function go($where){
    redirect($where);
}
function error($name = ""){
    if($name == ""){
        return isset($_SESSION["error"]) ? $_SESSION["error"]: [];
    }
    if(isset($_SESSION["error"]) && isset($_SESSION["error"][$name]))
        return '<div>'.$_SESSION["error"][$name].'</div>';
    else
        return "";
}
function successOrError($name){
    if( ! isset($_SESSION["error"]))
        return "";
    return error($name) == "" ? "has-success" : "has-error has-danger";
}
function old($name = "", $defaultValue = ""){
    if($name == "")
        return $_SESSION["old"];
    if(isset($_SESSION["old"]) && isset($_SESSION["old"][$name]))
        return $_SESSION["old"][$name];
    else
        return $defaultValue;
}

function checkboxer($list){
    foreach ($list as $value) {?>
        <div class="col-md-3 col-6">
            <?php input($value, lcfirst($value), "checkbox", $value);?>
        </div><?php
    }
}


function myCryptor(string $pwd){
    return hash("sha256", sha1($pwd).sha1("Pppe"));
}
function recherche(){?>

    <div class="col-md-9 col-md-push-1">
          <form action="#" method="get" id="searchForm" class="input-group">
            <input type="search" class="form-control" name="x" placeholder="taper votre recherche">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
          </form>  
        </div>
    <?php 
} 
 function card(){?>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Liste des patients</h4>
            </div>
        </div>
    </div>
    <?php 
 }

 function rechercheAll($title, $name, $placeholder = ""){?>
    <div class="input-group">
        <div class="input-group-btn search-panel">
            <select class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php 
                    foreach ($title as $value) {?>
                        <option><?=$value?></option>
                <?php }?>
            </select>
        </div>
        <input type="hidden" name="search_param" value="all" id="search_param">
        <input type="text" class="form-control" name="<?=$name?>" placeholder="<?=$placeholder?>">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
<?php }