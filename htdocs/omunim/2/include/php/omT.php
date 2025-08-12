<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
//require_once 'system/omssopin.php';

/* * ***************************************************************************
  Start Input Block
 * *************************************************************************** */

//Table Columns fields
$dataTableColumnsFields = $_SESSION['dataTableColumnsFields'];
$dtSumColumn = $_SESSION['dtSumColumn'];
$dtDeleteColumn = $_SESSION['dtDeleteColumn'];
// Auth:Amol 4 june 2017
$dtPrintTitle = $_SESSION['dtPrintTitle'];

/*****************************************************************************
  End Input Block
**************************************************************************** */
?>
<table id="example" class="display " cellspacing="0" width="100%">
                    <thead>
                        <tr >
                            <?php
                            foreach ($dataTableColumnsFields as $values) {
                                ?>
                                <th> <?php echo "<b>" . $values['dt'] . "</b>"; ?></th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tfoot>
        <tr>
            <?php
            foreach ($dataTableColumnsFields as $values) {
                ?>
                <th> <?php echo $values['dt']; ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>
            </td>
            <td colspan="<?php echo count($dataTableColumnsFields) - 1; ?>">
                <div id="display_girvi_info_popup" class="display-girvi-info-popup"></div>
            </td>
        </tr>
        <tr>
            <?php
            foreach ($dataTableColumnsFields as $values) {
                ?>
                <td style="background-color: #CCCCCC; font-weight: bold; text-align: right; padding-right: 5px;"></td>
                <?php
            }
            ?>
        </tr>
    </tfoot>

</table>
            
<!-- Start DataTable Table -->
<!-- <table id="example" class="display responsive nowrap"  cellspacing="0" width="100%">
    <thead style="background-color: #DCDCDC; " >
        <tr >
            <?php
            foreach ($dataTableColumnsFields as $values) {
                ?>
                <th> <?php echo "<b>" . $values['dt'] . "</b>"; ?></th>
                <?php
            }
            ?>
        </tr>
    </thead> 
    <tfoot>
        <tr>
            <?php
            foreach ($dataTableColumnsFields as $values) {
                ?>
                <th> <?php echo $values['dt']; ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>
            </td>
            <td colspan="<?php echo count($dataTableColumnsFields) - 1; ?>">
                <div id="display_girvi_info_popup" class="display-girvi-info-popup"></div>
            </td>
        </tr>
        <tr>
            <?php
            foreach ($dataTableColumnsFields as $values) {
                ?>
                <td style="background-color: #CCCCCC; font-weight: bold; text-align: right; padding-right: 5px;"></td>
                <?php
            }
            ?>
        </tr>
    </tfoot>
</table>  -->
<!-- End DataTable Table -->
<div>
    <table cellspacing="0" width="100%" border="0">
        <tr>
            <td colspan="<?php echo count($dataTableColumnsFields); ?>" style="color: #333">
                Note - To search in a range use '|' (PIPE) as a separator. For example 1000|5000 (<b>MIN|MAX</b>).
            </td>

        </tr>
        <tr>
            <td colspan="<?php echo count($dataTableColumnsFields) - 1; ?>" style="color: #333">
                To search exact value use '|' (PIPE) as a separator. For example 5000|5000 (<b>VALUE|VALUE</b>).
            </td>
            <td align="right">
                <?php if ($dtDeleteColumn != '' && $retailList != 'retailList') { ?>
                    <input id="deleteAll" name="deleteAll" value="DELETE ALL"
                           title="Click Here to Delete All Records!"
                           type="button" class="frm-btn"
                           onclick="javascript:deleteAllRecordId('<?php echo $_SESSION['deleteColumnFunctionPara1']; ?>');"/>
                       <?php } ?>
            </td>
        </tr>
    </table>
</div>
<!-- Call dataTablesDis() for load datatable data -->
<img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt="" onload="dataTablesDis('<?php echo $dtSumColumn; ?>', '<?php echo $dtDeleteColumn; ?>', '<?php echo $dtPrintTitle; ?>');"/>