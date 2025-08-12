<?php
$todayDate = strtoupper(date("d M Y"));
$todayYear = date("Y");
$todayMonth = strtoupper(date("M"));
$todayDay = date("d");
$todayStrDate = strtotime($todayDate);
$toDate = date("d-M-Y");
?>
<script>
    function sendDesktopNotification(documentRootBSlash, heading, details, name, mobile, amount, city)
    {
        //
        var notificationBody = "";
        //
        if (details != '') {
            notificationBody += "Details : " + details;
        }
        if (name != '') {
            notificationBody += "\nDate : " + name;
        }
        if (mobile != '') {
            notificationBody += "\nMobile : " + mobile;
        }
        if (amount != '') {
            notificationBody += "\nTotal Amount : " + amount;
        }
        if (city != '') {
            notificationBody += "\nCity: " + city;
        }
        //
        Push.create(heading, {
            body: notificationBody,
            icon: '<?php echo $documentRootBSlash; ?>/images/OnlineMunim_Logo.png',
            requireInteraction: true,
            timeout: 12000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
        //
    }
</script>
<?php
//
//*******************************************************************************************
// START CODE TO GET VALUE ON-OFF FOR DESKTOP NOTIFICATIONS OPTION @AUTHOR:MADHUREE-08JAN2022
//*******************************************************************************************
//
$qSelDesktopNotifications = "SELECT omly_value FROM omlayout WHERE omly_option = 'desktopNotifications'";
$resSelDesktopNotifications = mysqli_query($conn, $qSelDesktopNotifications);
$rowSelDesktopNotifications = mysqli_fetch_array($resSelDesktopNotifications);
$desktopNotifications = $rowSelDesktopNotifications['omly_value'];
//
//*****************************************************************************************
// END CODE TO GET VALUE ON-OFF FOR DESKTOP NOTIFICATIONS OPTION @AUTHOR:MADHUREE-08JAN2022
//*****************************************************************************************
//
//*************************************************************************************
// START CODE TO GET VALUE OF NOTIFICATIONS FREQUENCY OPTION @AUTHOR:MADHUREE-08JAN2022
//*************************************************************************************
//
$qSelNotificationCount = "SELECT omly_value FROM omlayout WHERE omly_option = 'notificationCount'";
$resSelNotificationCount = mysqli_query($conn, $qSelNotificationCount);
$rowSelNotificationCount = mysqli_fetch_array($resSelNotificationCount);
$notificationCount = $rowSelNotificationCount['omly_value'];
//
if ($notificationCount == '') {
    $notificationCount = 0;
}
//
//***********************************************************************************
// END CODE TO GET VALUE OF NOTIFICATIONS FREQUENCY OPTION @AUTHOR:MADHUREE-08JAN2022
//***********************************************************************************
//
//***********************************************************************************
//  Getting Start Notification time and end notification time from database and 
//  set frequency to display notifications.    CHETAN 04APR2022
//***********************************************************************************
if ($notificationCount > 0 && $notificationCount != "") {
    // GET OWNER ID FROM DATABASE //
    $qGetOwnerID = "SELECT firm_own_id FROM firm ORDER BY firm_id ASC LIMIT 0,1";
    $resOwnerID = mysqli_query($conn, $qGetOwnerID) or die(mysqli_error($conn));
    $rowOwnerID = mysqli_fetch_array($resOwnerID);
    $OwnerID = $rowOwnerID['firm_own_id'];
//******************************************************************************//
//GET FIRM ID FROM DATABASE
//*****************************************************************************//
//   
    $qStNotificationTime = "SELECT omly_value FROM omlayout WHERE omly_option = 'NotificationStartTime'";
    $resStNotificationTime = mysqli_query($conn, $qStNotificationTime);
    $rowStNotificationTime = mysqli_fetch_array($resStNotificationTime);
    $startNotificationTime = $rowStNotificationTime['omly_value'];
    //
    $qEndNotificationTime = "SELECT omly_value FROM omlayout WHERE omly_option = 'NotificationEndTime'";
    $resEndNotificationTime = mysqli_query($conn, $qEndNotificationTime);
    $rowEndNotificationTime = mysqli_fetch_array($resEndNotificationTime);
    $endNotificationTime = $rowEndNotificationTime['omly_value'];
    //
    if ($startNotificationTime != "" && $startNotificationTime != 0) {
        
    } else {
        $startNotificationTime = "09:00 AM";
        $stTimeQuery_INS = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES ('$OwnerID','NotificationStartTime','$startNotificationTime');";
        if (!mysqli_query($conn, $stTimeQuery_INS)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    if ($endNotificationTime != "" && $endNotificationTime != 0) {
        
    } else {
        $endNotificationTime = "09:00 PM";
        $endTimeQuery_INS = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES ('$OwnerID','NotificationEndTime','$endNotificationTime');";
        if (!mysqli_query($conn, $endTimeQuery_INS)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
//    
    $frTime = explode(" ", $startNotificationTime);
    $tTime = explode(" ", $endNotificationTime);
    // 
    if ($frTime[1] == 'PM') {
        $newFrTime = strtotime($frTime[0]) + (3600 * 12);
    } else {
        $newFrTime = strtotime($frTime[0]);
    }
    // 
    if ($tTime[1] == 'PM') {
        $newToTime = strtotime($tTime[0]) + (3600 * 12);
    } else {
        $newToTime = strtotime($tTime[0]);
    }
    // 
    $timeDifference = $newToTime - $newFrTime;
    $timeInHours = $timeDifference / 3600;
    //
    $notificationTimeInterval = $timeInHours / ($notificationCount + 1);
    $notificationInMins = ceil($notificationTimeInterval * 60);
    $currentTime = date('h:i:s A');
//
//***********************************************************************************
// END CODE TO GET VALUE OF NOTIFICATIONS FREQUENCY OPTION @AUTHOR:CHETAN
//***********************************************************************************/
//
    ?>
    <input type="hidden" name="firstFlag" id="firstFlag" value="<?php echo "FIRSTFLAG"; ?>"  />
    <input type="hidden" name="ownerID" id="ownerID" value="<?php echo $OwnerID; ?>"  />
    <?php
    function resetDatabaseElementsinStart($conn, $OwnerID) {
        $resetArrayOpt = array('DISPLAY_CNT_ITEM', 'DISPLAY_CNT_UDHAAR', 'LAST_ITEM_CNT', 'LAST_UDHAAR_CNT', 'LastNotifictionTime', 'LastOffset', 'NotificationTimeIndex');
        $resetArrayVal = array(0, 0, 0, 0, '00:00', 0, 0);
        $LenArray = count($resetArrayOpt);
        for ($i = 0; $i < $LenArray; $i++) {
            $selDBElement = "SELECT count(omly_option) as numrows FROM omlayout WHERE omly_own_id = '$OwnerID' and "
                    . "omly_option = '$resetArrayOpt[$i]' ";
            $resDBElement = mysqli_query($conn, $selDBElement) or die(mysqli_error($conn));
            $rowDBElement = mysqli_fetch_array($resDBElement, MYSQLI_ASSOC);
            if ($rowDBElement['numrows'] == 0) {
                $DBquery_INS = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES ('$OwnerID','$resetArrayOpt[$i]','$resetArrayVal[$i]');";
                if (!mysqli_query($conn, $DBquery_INS)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
    }

    resetDatabaseElementsinStart($conn, $OwnerID);
}
// 
//    
//
?>  
<script>
// This is document ready used to call ajax and function for display notification
// done by  CHETAN @ 17 APR 2022
$(document).ready(function ()
{
    var desktopNotifications = "<?php echo $desktopNotifications; ?>";
//console.log(desktopNotifications);
//
//var strFrmId = document.getElementById('strFrmId').value;
//
    if (desktopNotifications == "ON")
    {
//                
        var totalNotifyCount = "<?php echo $notificationCount; ?>";
        if (totalNotifyCount > 0 && totalNotifyCount != "")
        {
//console.log(totalNotifyCount);
//
            var notificationInMins = "<?php echo $notificationInMins; ?>";
//console.log("Notify in mIns: "+ notificationInMins);
//                
//
            var ownerID = document.getElementById('ownerID').value;
            var currTime = new Date().toLocaleTimeString();
//console.log(currTime); 
            if (!isNaN(notificationInMins))
            {
                var firstFlag = "FIRST_ROUND";
                const interval = setInterval(function ()
                {
                    //console.log(currTime);  
                    thisSecondloop(firstFlag, interval, ownerID);
                }, 1 * 1000 * 60);
            }
//  
            function  callClearMainInterval(interval)
            {
                clearInterval(interval);
            }
//
            var oneIntervalMins;
            function callClearTimeout(oneIntervalMins)
            {
                clearTimeout(oneIntervalMins);
            }
// Getting current Time 
            var d = new Date();
            var n = d.toLocaleString([], {hour12: true});
            /*This is ajax function call for desktop notifications**/
            //
            function thisSecondloop(firstFlag, interval, ownerID)
            {
                var currTime = new Date().toLocaleTimeString();
                $.ajax({
                    url: "include/php/omCheckNotificationprocess.php",
                    type: "post",
                    data: {firstFlag: firstFlag, currentTime: currTime, ownerID: ownerID},
                    success: function (data)
                    {
                        //console.log(currTime);
                        //console.log("First ajax call: "+ data);
                        if (data.trim() == '')
                        {
                            console.log("Error");
                        } else
                        {
                            var allData = JSON.parse(data);
                            // console.log(allData);
                            if ((allData[0].ItemData[0]['firstFlag'] == "GAME_OVER" && allData[1].UdhaarData[0]['firstFlag'] == "GAME_OVER"))
                            {
                                if (allData[0].ItemData[0]['notification_count'] == allData[0].ItemData[0]['new_acit_notification_count']
                                        && allData[1].UdhaarData[0]['notification_count'] == allData[1].UdhaarData[0]['new_utin_notification_count'])
                                {
                                    callClearMainInterval(interval);

                                } else
                                {
                                    //console.log(interval); 
                                    //callClearMainInterval(interval);
                                    //callClearTimeout(oneIntervalMins);
                                }
                            } else
                            {
                                if ((allData[0].ItemData[0]['firstFlag'] != "GAME_NOT_OVER" && allData[1].UdhaarData[0]['firstFlag'] != "GAME_NOT_OVER"))
                                {
                                    // console.log("in elsemcondition");
                                    displayNotifications(allData);
                                }
                                /*if((allData[0].ItemData[0]['round'] == "END_ROUND" && allData[1].UdhaarData[0]['round'] == "END_ROUND") ||
                                 (allData[0].ItemData[0]['firstFlag'] == "GAME_OVER" && allData[1].UdhaarData[0]['round'] == "END_ROUND") ||
                                 (allData[0].ItemData[0]['round'] == "END_ROUND" && allData[1].UdhaarData[0]['firstFlag'] == "GAME_OVER"))
                                 {
                                 clearTimeout(oneIntervalMins);
                                 } */
                                // 
                                /*Calling function for desktop notifications after 1 minutes */
                                /*oneIntervalMins = setTimeout(function() 
                                 { 
                                 console.log("second interval");
                                 thisSecondloop(firstFlag,interval,ownerID);                              
                                 },1000 * 60);  */
                            }
                        }
                    },
                    error: function (e) {
                        //console.log("error=" + e);
                    },
                    complete: function (e) {
                    }
                });
            }
//
//  DISPLAY notification function
//
            function displayNotifications(allData)
            {
                //console.log(allData);
                // console.log("in fun displam condition");
                var allNotData = allData;
                var currTime = new Date().toLocaleTimeString();
                var allLength = 0;
                var itemLength = 0;
                var udharLength = 0;
                allLength = Object.keys(allNotData).length;
                itemLength = allNotData[0].ItemData.length;
                udharLength = allNotData[1].UdhaarData.length;
                //console.log("This is function values "+allLength + itemLength + udharLength);
                if (allNotData[0].ItemData !== null || allNotData[1].UdhaarData !== null)
                {
                    if (itemLength > 0)
                    {
                        for (var m = 0; m < itemLength; m++)
                        {
                            if (allNotData[0].ItemData[m]['firstFlag'] != "GAME_OVER")
                            {
                                sendDesktopNotification('<?php echo $documentRootBSlash; ?>', allNotData[0].ItemData[m]['actionItemSubject'],
                                        allNotData[0].ItemData[m]['actionItemDetails'], '', '', '', '');
                                //console.log(currTime);
                                //console.log("Index: "+m+":"+allNotData[0].ItemData[m]['actionItemSubject']);    
                            }
                        }
                    }
                    if (udharLength > 0)
                    {
                        for (var n = 0; n < udharLength; n++)
                        {
                            if (allNotData[1].UdhaarData[n]['firstFlag'] != "GAME_OVER")
                            {
                                sendDesktopNotification('<?php echo $documentRootBSlash; ?>', allNotData[1].UdhaarData[n]['custName'],
                                        allNotData[1].UdhaarData[n]['customerBalAmt'], allNotData[1].UdhaarData[n]['custStartDate'], allNotData[1].UdhaarData[n]['custMobileData']
                                        , allNotData[1].UdhaarData[n]['custTotalAmt'], allNotData[1].UdhaarData[n]['custUserCity']);
                                //console.log(currTime);
                                //console.log("Index: "+n+":"+allNotData[1].UdhaarData[n]['customerBalAmt']);
                            }
                        }
                    }
                }
            }
        }
    }
});
</script>          