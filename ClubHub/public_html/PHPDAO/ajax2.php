<?php

session_start();

$tvs=$_SESSION['tvs'];
$tvtypes=$_SESSION['tvtypes'];
//$tvupdatable=$_SESSION['tvupdatable'];
$tvobject=$_SESSION['tvobject'];
$tvobjects=$_SESSION['tvobjects'];

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

require 'Engine.php';

try
{
  $Engine=new Engine();

  if(file_exists('../models/dao.xml'))
  {
    $XML=simplexml_load_file('../models/dao.xml');
  }
  else
  {
    $XML=new SimpleXMLElement('<dao></dao>');
  }
?>
      <form method="post" action="dao3.php">

        <div class="alert alert-info">Define here for which columns <b>getter</b>, <b>setter</b> and <b>finder</b> methods will be created and what shall be the methods' names. Primary key columns must have setter and getter methods!<br>E.g. if you define your column's method name root as <b>firstName</b>, then methods <b>getFirstName</b>, <b>setFirstName</b> and <b>findByFirstName</b> will be created.</div>

<?php

  foreach($_SESSION['tvs'] as $tvname=>$tvcheck)
  {
    $XmlTableViews=$XML->xpath("//table[@name='".$tvname."']");

    //$updatable=($tvupdatable[$tvname]==='YES');

?>
        <div class="row">
          <div class="col-sm-12">
            <div class="thumbnail">

              <h3><?= $tvtypes[$tvname] ?>=<?= $tvname ?><?php if(!$XmlTableViews) echo ' <span class="label label-info">NEW</span>'; ?></h3>singular=<?= $tvobject[$tvname] ?>, plural=<?= $tvobjects[$tvname] ?>

              <table class="table">
                <tr>
                  <th>COLUMN</th>
                  <th>TYPE</th>
                  <th width="30" title="Primary Key">PK</th>
                  <th width="30" title="Unique Key">UQ</th>
                  <th width="30" title="Foreign Key">FK</th>
                  <th width="30" title="Not NULL">NN</th>
                  <th width="30" title="Autoincrement">AI</th>
                  <th width="30" title="Has indexes">IDX</th>
                  <th>REFERENCE</th>
                  <th>COMMENT</th>
                  <th>getter</th>
                  <th>setter</th>
                  <th>finder</th>
                  <th>method name root</th>
                </tr>
<?php

    $columns=$Engine->getColumnsWithAttributes($tvname);

    foreach($columns as $column)
    {
      $columnname=$column['COLUMN_NAME'];

      $XmlColumns=false;

      if($XmlTableViews && $XmlColumns=$XmlTableViews[0]->xpath("column[@name='".$columnname."']")) //if table and colum records exist
      {
        $method=(string)$XmlColumns[0]['method'];
        $gettercheckbox=(strtolower((string)$XmlColumns[0]['getter'])==='yes' || $column['PK']) ?  ' checked="checked"' : '';
        $settercheckbox=((strtolower((string)$XmlColumns[0]['setter'])==='yes' || $column['PK']) && $tvtypes[$tvname]=='TABLE') ?  ' checked="checked"' : '';
        $findercheckbox=(strtolower((string)$XmlColumns[0]['finder'])==='yes' || $column['PK']) ?  ' checked="checked"' : '';
      }
      else
      {
        $English=new English($columnname);
        $method=$English->camel;
        $gettercheckbox=' checked="checked"';
        $settercheckbox=' checked="checked"';
        $findercheckbox=($column['IDX']) ? ' checked="checked"' : '';
      }
      $getterreadonly = $column['PK'] ? ' readonly="readonly"' : '';
      $setterreadonly = $column['PK'] ? ' readonly="readonly"' : '';
      $setterdisabled = $tvtypes[$tvname]=='VIEW' ? ' disabled="disabled"' : '';//view cannot have setters
      if($tvtypes[$tvname]=='VIEW') $settercheckbox=''; //if(!$updatable) $settercheckbox='';
?>
                <tr>
                  <td width="15%"><input type="hidden" name="columns"><b><?= $columnname ?></b><?php if(!$XmlColumns) echo ' <span class="label label-info">NEW</span>'; ?></td>
                  <td width="15%"><?= $column['COLUMN_TYPE'] ?></td>
                  <td width="5%" align="center"><?php if($column['PK']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%" align="center"><?php if($column['UQ']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%" align="center"><?php if($column['FK']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%" align="center"><?php if($column['NN']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%" align="center"><?php if($column['AI']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%" align="center"><?php if($column['IDX']) echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                  <td width="5%"><?php if($column['REFERENCED_TABLE_NAME']) echo $column['REFERENCED_TABLE_NAME'].'.'.$column['REFERENCED_COLUMN_NAME'] ?></td>
                  <td width="5%" align="center"><?php if($column['COLUMN_COMMENT']) echo '<span title="'.$column['COLUMN_COMMENT'].'" class="glyphicon glyphicon-comment"></span>'; ?></td>
                  <td width="5%" align="center"><input type="checkbox" name="getters[<?= $tvname ?>][<?= $columnname ?>]" <?= $gettercheckbox ?><?= $getterreadonly ?>></td>
                  <td width="5%" align="center"><input type="checkbox" name="setters[<?= $tvname ?>][<?= $columnname ?>]" <?= $settercheckbox ?><?= $setterreadonly ?><?= $setterdisabled ?>></td>
                  <td width="5%" align="center"><input type="checkbox" name="finders[<?= $tvname ?>][<?= $columnname ?>]" <?= $findercheckbox ?>></td>
                  <td width="15%"><input type="text" name="methods[<?= $tvname ?>][<?= $columnname ?>]" value="<?= $method ?>"></td>
                </tr>
<?php
    }
?>
              </table>

            </div><!-- .thumbnail -->
          </div><!-- .col -->
        </div><!-- .row -->

<?php
  }
}
catch (ConnectioException $ce)
{
?>
              <div class="alert alert-critical text-center">Cannot connect to database!<br><?= $ce->errorMessage() ?></div>
<?php
}
?>
        <div class="row text-center">
          <div class="col-sm-4 col-sm-offset-4">
            <input type="submit" name="dao2" class="btn btn-info" value="Proceed">
          </div><!-- .col -->
        </div><!-- .row -->

      </form>
