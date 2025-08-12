<?php

//echo '<br/>$searchColumnStrPrev: ' . $searchColumnStrPrev;
//echo '<br/>$searchColumn2: ' . $searchColumn2;
$searchColumn1Pos = strpos($searchColumnStrPrev, $searchColumn);
$searchColumn2Pos = strpos($searchColumnStrPrev, $searchColumn2);
//       echo '<br/>$searchColumn1Pos: ' . $searchColumn1Pos;

if ($searchColumn1Pos != false) {

    $startPosOfAnd = $searchColumn1Pos - 6;

    if ($startPosOfAnd < 0)
        $startPosOfAnd = 0;

    $searchColumn1AndPos1 = strpos($searchColumnStrPrev, 'and', $startPosOfAnd);
    $searchColumn1AndPos2 = strpos($searchColumnStrPrev, 'and', $searchColumn1AndPos1 + 2);
    $searchColumn1OrPos = strpos($searchColumnStrPrev, ' or ', $searchColumn1AndPos1 + 2);

    //echo '<br/>$searchColumn1AndPos1: ' . $searchColumn1AndPos1;
    //echo '<br/>$searchColumn1AndPos2: ' . $searchColumn1AndPos2;

    if ($searchColumn1AndPos1 < 0)
        $searchColumn1AndPos1 = 0;

    if ($searchColumn1AndPos2 < 0)
        $searchColumn1AndPos2 = 0;

    if ($searchColumn1AndPos2 == false) {
        $searchColumnStrPrev = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
    } else {
        //           //echo '<br/>$searchColumn1AndPos2: ' . $searchColumn1AndPos2;
        $searchColumn1AndPos3 = strpos($searchColumnStrPrev, 'and', $searchColumn1AndPos2 + 2);
        //echo '<br/>$searchColumn1AndPos3: ' . $searchColumn1AndPos3;

        //if ($searchColumn1OrPos == false && $searchColumn2 != '')
        //    $searchColumn1AndPos2 = strpos($searchColumnStrPrev, 'and', $searchColumn1AndPos2 + 2);
        //echo '<br/>$searchColumn1AndPos2New: ' . $searchColumn1AndPos2;


        if ($searchColumn2 == NULL || $searchColumn2 == '') {
            //echo '<br/>$searchColumn1AndPos3: ' . $searchColumn1AndPos3;
            $searchColumnStrPrev1 = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
            $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos2);
            //echo '<br/>$searchColumnStrPrev1: ' . $searchColumnStrPrev1;
            //echo '<br/>$searchColumnStrPrev2: ' . $searchColumnStrPrev2;
            $searchColumnStrPrev = $searchColumnStrPrev1 . ' ' . $searchColumnStrPrev2;
        } else {
            if ($searchColumn1AndPos3 == false) {
                if ($searchColumn1OrPos == false) {
                    $searchColumnStrPrev1 = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
                    //echo '<br/>$searchColumnStrPrev11New: ' . $searchColumnStrPrev1;
                    $searchColumnStrPrev2 = '';
                    if ($searchColumn1AndPos2 != '' && $searchColumn2Pos == false){
                        $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos2);
                        
                    }
                    $searchColumnStrPrev = $searchColumnStrPrev1 . $searchColumnStrPrev2;
                    //echo '<br/>$searchColumnStrPrev22New: ' . $searchColumnStrPrev2;
    
                    
                } else {
                    //if($searchColumn2 != NULL){
                    $searchColumnStrPrev1 = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
                    $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos2);
                    //echo '<br/>$searchColumnStrPrev11: ' . $searchColumnStrPrev1;
                    //echo '<br/>$searchColumnStrPrev22: ' . $searchColumnStrPrev2;

                    $searchColumnStrPrev = $searchColumnStrPrev1 . ' ' . $searchColumnStrPrev2;
                    // }
                }
            } else {
                if ($searchColumn1OrPos == false) {
                    $searchColumnStrPrev1 = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
                    if ($searchColumn1AndPos3 == '' || $searchColumn1AndPos3 == NULL)
                        $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos2);
                    else
                        $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos3);
                    //echo '<br/>$searchColumnStrPrev1111: ' . $searchColumnStrPrev1;
                    //echo '<br/>$searchColumnStrPrev2222: ' . $searchColumnStrPrev2;

                    $searchColumnStrPrev = $searchColumnStrPrev1 . ' ' . $searchColumnStrPrev2;
                } else {
                    //if($searchColumn2 != NULL){
                    $searchColumnStrPrev1 = substr($searchColumnStrPrev, 0, $searchColumn1AndPos1 - 1);
                    $searchColumnStrPrev2 = substr($searchColumnStrPrev, $searchColumn1AndPos2);
                    //echo '<br/>$searchColumnStrPrev111: ' . $searchColumnStrPrev1;
                    //echo '<br/>$searchColumnStrPrev222: ' . $searchColumnStrPrev2;

                    $searchColumnStrPrev = $searchColumnStrPrev1 . ' ' . $searchColumnStrPrev2;
                    // }
                }
            }
        }

        //$searchColumnStrPrev = substr($searchColumnStrPrev, $searchColumn1AndPos2 - 1);
    }
}
//echo '<br/>$searchColumnStrPrev: ' . $searchColumnStrPrev;
?>