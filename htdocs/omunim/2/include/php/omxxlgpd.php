<?php
/*
 * Created on 23-Jan-2011 6:11:18 PM
 *
 * @FileName: omxxlgpd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<!-- *************************** Start Login Div Code *************************** -->
<table border="0" cellpadding="1" cellspacing="1" align="center">
    <tr>
        <td align="center" valign="top" colspan="4"><img src="<?php echo $documentRoot; ?>/images/key128.png"
                                                         alt="" border="0" /></td>
    </tr>
    <tr>
        <td colspan="4"><br />
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <form name="admin_login" id="admin_login" action="javascript:administratorLogin(document.getElementById('admin_login'));" method="post">
                <table border="0" cellpadding="1" cellspacing="1" align="left">
                    <tr>
                        <td align="center"><img src="<?php echo $documentRoot; ?>/images/key.png" /></td>
                        <td>
                            <div class="frm-lbl">User Id:</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="lgnUserId" type="text" class="lgn-txtfield" name="lgnUserId"
                                               maxlength="50" size="50" spellcheck="false" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><br /></td>
                    </tr>
                    <tr>
                        <td align="center"><img src="<?php echo $documentRoot; ?>/images/key.png" /></td>
                        <td>
                            <div class="frm-lbl">Super Key:</div>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="lgnPassword" type="password" class="lgn-txtfield" name="lgnPassword"
                                               maxlength="50" size="50" spellcheck="false" />
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Login"
                                                              class="frm-btn" maxlength="30" size="15" /></td>
                        
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="4"><br /></td>
    </tr>
    <tr>
        <td colspan="4"><br /></td>
    </tr>
</table>