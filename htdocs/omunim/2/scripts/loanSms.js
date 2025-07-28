//Start code to add selectall sms option @Author:SHE20FEB15

//var userId = '';
var userId = new Array();

function selectAllSms(panelName) {

   var smsDel = document.getElementById('smsallcheck').checked;
   var counter = parseFloat(document.getElementById('counter').value);
   if (smsDel == true) {
      confirm_box = confirm("You are Selecting All sms!\n Do you really want to continue!");
   }
   if (confirm_box == true) {
      loadXMLDoc();
      xmlhttp.onreadystatechange = function() {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            if (smsDel == true) {
               for (var i = 1; i <= counter; i++) {
                  document.getElementById('smscheck' + i).checked = true;
//                  if(document.getElementById('girviIdForSms' + i).value!=NULL || document.getElementById('girviIdForSms' + i).value!='')
                  userId[i] = document.getElementById('girviIdForSms' + i).value;

               }
            }
            else {
               for (var i = 1; i <= counter; i++) {
                  document.getElementById('smscheck' + i).checked = false;

               }
            }
         }

      };

   }

   else
   {
      document.getElementById('smsallcheck').checked = false;
   }

   if (panelName == 'lossGirviList')
      xmlhttp.open("POST", "include/php/orgplglp.php?panelName=" + panelName, true);
   else if (panelName == 'loansList')
      xmlhttp.open("POST", "include/php/orgpllpn.php?panelName=" + panelName, true);
   else if (panelName == 'releaseGirviList')
      xmlhttp.open("POST", "include/php/orgpregl.php?panelName=" + panelName, true);
   xmlhttp.send();

}
//End code to add selectall sms option @Author:SHE20FEB15

//Start Code to add function for selection of one checkbox
function selectOne(panelName, smsId, girviId, custId) {
   var counter = parseFloat(document.getElementById('counter').value);

   var sms = document.getElementById(smsId).value;
   var smsChkAll = new Array();
   var chk = 0;
   for (var i = 1; i <= counter; i++) {
      smsChkAll[i] = document.getElementById('smscheck' + i).checked;
      if (smsChkAll[i] == false)
      {
         chk = 1;
         break;
      }
   }
   if (chk == 1)
      document.getElementById('smsallcheck').checked = false;
   else
      document.getElementById('smsallcheck').checked = true;
   loadXMLDoc();
   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         for (var i = 1; i <= counter; i++) {
            var smsChk = document.getElementById('smscheck' + i).checked;
            if (smsChk == true) {

               userId[i] = document.getElementById('girviIdForSms' + i).value;

            }
            else if (smsChk != true) {
               userId[i] = '';
            }
         }
      }
   };
   if (panelName == 'lossGirviList')
      xmlhttp.open("POST", "include/php/orgplglp.php?panelName=" + panelName + "&custId=" + custId, true);
   if (panelName == 'loansList')
      xmlhttp.open("POST", "include/php/orgpllpn.php?panelName=" + panelName, true);
   if (panelName == 'releaseGirviList')
      xmlhttp.open("POST", "include/php/orgpregl.php?panelName=" + panelName, true);
   xmlhttp.send();

}
//End Code to add function for selection of one check
//function sendSMSLoan(custMobNo, custName, templateId) {
//   document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//   document.getElementById("smsButt").style.visibility = "hidden";
//   loadXMLDoc();
//   xmlhttp.onreadystatechange = function() {
//      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//         smsSuccessCounter = 0;
//         smsFailCounter = 0;
//         alert('SMS has been sent suceesfully');
//         document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//         document.getElementById("smsButt").style.visibility = "visible";
////       alert(xmlhttp.responseText);
//
//      }
//   };
//
//   xmlhttp.open("GET", "include/php/ollonsms.php?custMobNo=" + custMobNo + "&custName=" + custName + "&templateId=" + templateId + "&userId=" + userId, true);
//   xmlhttp.send();
//   userId = '';
//
//}
//    var selectedArray = new Array();
//    var selObj = document.getElementById('interestList');
//    var count = 0;
//    for (var i = 0; i < selObj.options.length; i++) {
//        if (selObj.options[i].selected) {
//            selectedArray[count] = selObj.options[i].value;
//            count++;
//        }
//    }
//    var intValue = selectedArray;


function sendSMSLoan(counter, smsTemplateId, userType, itemId, itemType, amount1, amount2, amount3, amount4) {
   var smsChk = new Array();
   if (smsTemplateId == '') {
      alert('Please select SMS Template Id!');
   }
   else {
      var counter = parseFloat(document.getElementById('counter').value);
      var chk = 0;
      var chkvar = 'false';
      var cnt = 0;
      for (var i = 1; i <=counter; i++) {
       
        smsChk[i] = document.getElementById('smscheck' + i).checked;
         if (smsChk[i] == false) {
            chk++;
         }
      }
        
      if (chk == counter) {
         alert('Please select customer to send msg');
         document.getElementById("smsButt").style.visibility = "visible";
      }
      else{
         var poststr = "smsTemplateId=" + encodeURIComponent(smsTemplateId)
                 + "&userType=" + encodeURIComponent(userType)
                 + "&itemId=" + encodeURIComponent(itemId)
                 + "&itemType=" + encodeURIComponent(itemType)
                 + "&amount1=" + encodeURIComponent(amount1)
                 + "&amount2=" + encodeURIComponent(amount2)
                 + "&amount3=" + encodeURIComponent(amount3)
                 + "&amount4=" + encodeURIComponent(amount4)
                 + "&userId=" + encodeURIComponent(userId);
// xmlhttp2.open("POST", "include/php/ogitemtg.php?" + poststr, true);
         send_sms_loan('include/php/ollonsms.php', poststr);
      }
   }
}

function send_sms_loan(url, parameters)
{
   loadXMLDoc();

   xmlhttp.onreadystatechange = alertSendSMSLoan;

   xmlhttp.open('POST', url, true);
   xmlhttp.setRequestHeader('Content-Type',
           'application/x-www-form-urlencoded');
   xmlhttp.setRequestHeader("Content-length", parameters.length);
   xmlhttp.setRequestHeader("Connection", "close");
   xmlhttp.send(parameters);
}

function alertSendSMSLoan()
{
   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
             document.getElementById("smsButt").style.visibility = "hidden";
         if (xmlhttp.responseText == 'SUCCESS') {
            alert('SMS Sent Successfully!');
               document.getElementById("smsButt").style.visibility = "visible";
//            document.getElementById("smsSentButtonDiv").innerHTML = "<img src='images/right16.png' title='SMS Sent Successfully!' />";
         } else {
//            document.getElementById("smsSentButtonDiv").innerHTML = xmlhttp.responseText;
            alert(xmlhttp.responseText +'\n'+'SMS Sending Failed!');
            document.getElementById("smsButt").style.visibility = "visible";
         }
      } else {
         document.getElementById("main_ajax_loading_div").style.visibility = "visible";
          
      }
     
   };
}
//
//function validateSms() {
//   var counter = parseFloat(document.getElementById('counter').value);
//   for (var i = 1; i <= counter; i++) {
//      var smsChk = document.getElementById('smscheck' + i).checked;
//      alert(smsChk);
//      if (smsChk == false) {
//         alert('Please select customer to send msg');
//         return false;
//
//      }
//      else {
//         sendSMSLoan(counter, smsTemplateId, userType, itemId, itemType, amount1, amount2, amount3, amount4);
//         
//         return true;
//      }
//   }
//
//}



