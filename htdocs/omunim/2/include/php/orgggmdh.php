<?php
/*
 * **************************************************************************************
 * @tutorial: girviMoneyDepHelpDiv
 * **************************************************************************************
 *
 * Created on Jun 15, 2013 5:58:41 PM
 *
 * @FileName: orgggmdh.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
    <tr>
        <td align="center" width="100%" colspan="2">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr>
        <td align="right">
            <h4>SIMPLY DEPOSIT:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option simply deposit money without any calculation. (यह विकल्प किसी भी गणना के बिना पैसे जमा करता है!)
        </td>
    </tr>
    <tr>
        <td align="right" valign="top">
            <h4>NEW GIRVI DATE CHANGE:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option adjust deposit money in interest and principal amount and create a new loan or girvi date. <br/> 
            (यह विकल्प ब्याज और मूलधन राशि में पैसे जमा करता है, और ऋण या गिरवी की नयी तारीख बनता है!)
            <br/><b>For Example - <span class="brown">Main Principal Amt:</span> <span class="blue">1,00,000</span> and <span class="brown">Girvi Date:</span> <span class="blue">01 JAN 2013</span>
                <br/>Total calculated amount (<span class="brown">Principal:</span><span class="blue">100000.00</span> & <span class="brown">Int: </span><span class="blue">2000.00</span>) till date (<span class="brown">31 JAN 2013</span>): <span class="blue">102000.00</span>
                <br/>Total deposit amount (<span class="brown">Principal:</span><span class="blue">10000</span> & <span class="brown">Int:</span> <span class="blue">2000</span>) deposit on date (31 JAN 2013): <span class="blue">12000.00</span>
                <br/>Total interest from date <span class="blue">01 JAN 2013</span> to <span class="blue">31 JAN 2013</span> (1 MM): <span class="blue">2000.00</span>
                <br/>Amount left after pay interest (<span class="blue">12000.00</span> - <span class="blue">2000.00</span>): <span class="blue">10000.00</span>
                <br/>New Principal Amount (<span class="blue">100000.00</span> - <span class="blue">10000.00</span>): <span class="blue">90000.00</span>
                <br/>New Girvi Date: <span class="blue">01 February 2013</span></b>
        </td>
    </tr>
    <tr>
        <td align="right" valign="top">
            <h4>DEPOSIT FULL INT:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option adjust deposit money in interest and principal amount and loan or girvi date will remain same. <br/> 
            (यह विकल्प ब्याज और मूलधन राशि में पैसे जमा करता है, और ऋण या गिरवी की तारीख नही बदलता है!)
            <br/><b>For Example - <span class="brown">Main Principal Amt:</span> <span class="blue">1,00,000</span> and <span class="brown">Girvi Date:</span> <span class="blue">01 JAN 2013</span>
                <br/>Total calculated amount (<span class="brown">Principal:</span><span class="blue">100000.00</span> & <span class="brown">Int: </span><span class="blue">2000.00</span>) till date (<span class="brown">31 JAN 2013</span>): <span class="blue">102000.00</span>
                <br/>Total deposit amount (<span class="brown">Principal:</span><span class="blue">10000</span> & <span class="brown">Int:</span> <span class="blue">200</span>) deposit on date (31 JAN 2013): <span class="blue">10200.00</span>
                <br/>Total interest from date <span class="blue">01 JAN 2013</span> to <span class="blue">31 JAN 2013</span> (1 MM): <span class="blue">200.00</span>
                <br/>Principal Paid: <span class="blue">10000.00</span> &nbsp;&nbsp;&nbsp;Interest Paid: <span class="blue">200.00</span>
                <br/>Now Principal Amount (<span class="blue">100000.00</span> - <span class="blue">10000.00</span>): <span class="blue">90000.00</span>
                <br/>Girvi Date: <span class="blue">01 JAN 2013</span></b>
        </td>
    </tr>
    <tr>
        <td align="right" valign="top">
            <h4>DEPOSIT INT WITH DIS:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option adjust deposit money in interest and principal amount and loan or girvi date will remain same. <br/> 
            (यह विकल्प ब्याज और मूलधन राशि में पैसे जमा करता है, और ऋण या गिरवी की तारीख नही बदलता है!)
            <br/><b>For Example - <span class="brown">Main Principal Amt:</span> <span class="blue">1,00,000</span> and <span class="brown">Girvi Date:</span> <span class="blue">01 JAN 2013</span>
                <br/>Total calculated amount (<span class="brown">Principal:</span><span class="blue">100000.00</span> & <span class="brown">Int: </span><span class="blue">2000.00</span>) till date (<span class="brown">31 JAN 2013</span>): <span class="blue">102000.00</span>
                <br/>Total deposit amount (<span class="brown">Principal:</span><span class="blue">10000</span> & <span class="brown">Int:</span> <span class="blue">150</span>) deposit on date (31 JAN 2013): <span class="blue">10150.00</span>
                <br/>Total interest from date <span class="blue">01 JAN 2013</span> to <span class="blue">31 JAN 2013</span> (1 MM): <span class="blue">200.00</span>
                <br/>Principal Paid: <span class="blue">10000.00</span> &nbsp;&nbsp;&nbsp;Interest Paid: <span class="blue">150.00</span> &nbsp;&nbsp;&nbsp;Discount: <span class="blue">50.00</span>
                <br/>Now Principal Amount (<span class="blue">100000.00</span> - <span class="blue">10000.00</span>): <span class="blue">90000.00</span>
                <br/>Girvi Date: <span class="blue">01 JAN 2013</span></b>
        </td>
    </tr>
<!--    <tr>
        <td align="right" valign="top">
            <h4>DEPOSIT INT AMT LEFT:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option adjust deposit money in interest and principal amount and loan or girvi date will remain same. <br/> 
            (यह विकल्प ब्याज और मूलधन राशि में पैसे जमा करता है, और ऋण या गिरवी की तारीख नही बदलता है!)
            <br/><b>For Example - <span class="brown">Main Principal Amt:</span> <span class="blue">1,00,000</span> and <span class="brown">Girvi Date:</span> <span class="blue">01 JAN 2013</span>
                <br/>Total calculated amount (<span class="brown">Principal:</span><span class="blue">100000.00</span> & <span class="brown">Int: </span><span class="blue">2000.00</span>) till date (<span class="brown">31 JAN 2013</span>): <span class="blue">102000.00</span>
                <br/>Total deposit amount (<span class="brown">Principal:</span><span class="blue">10000</span> & <span class="brown">Int:</span> <span class="blue">200</span>) deposit on date (31 JAN 2013): <span class="blue">10200.00</span>
                <br/>Total interest from date <span class="blue">01 JAN 2013</span> to <span class="blue">31 JAN 2013</span> (1 MM): <span class="blue">200.00</span>
                <br/>Principal Paid: <span class="blue">10000.00</span> &nbsp;&nbsp;&nbsp;Interest Paid: <span class="blue">150.00</span> &nbsp;&nbsp;&nbsp;Amt. Bal.: <span class="blue">50.00</span>
                <br/>Now Principal Amount (<span class="blue">100000.00</span> - <span class="blue">10000.00</span>): <span class="blue">90000.00</span>
                <br/>Girvi Date: <span class="blue">01 JAN 2013</span></b>
        </td>
    </tr>-->
    <tr>
        <td align="right" valign="top">
            <h4>DEPOSIT INT ADJ IN PRIN:&nbsp;</h4>
        </td>
        <td align="left" valign="top">
            This option adjust deposit money in interest and principal amount and loan or girvi date will remain same. <br/> 
            (यह विकल्प ब्याज और मूलधन राशि में पैसे जमा करता है, और ऋण या गिरवी की तारीख नही बदलता है!)
            <br/><b>For Example - <span class="brown">Main Principal Amt:</span> <span class="blue">1,00,000</span> and <span class="brown">Girvi Date:</span> <span class="blue">01 JAN 2013</span>
                <br/>Total calculated amount (<span class="brown">Principal:</span><span class="blue">100000.00</span> & <span class="brown">Int: </span><span class="blue">2000.00</span>) till date (<span class="brown">31 JAN 2013</span>): <span class="blue">102000.00</span>
                <br/>Total deposit amount (<span class="brown">Principal:</span><span class="blue">10000</span> & <span class="brown">Int:</span> <span class="blue">200</span>) deposit on date (31 JAN 2013): <span class="blue">10200.00</span>
                <br/>Total interest from date <span class="blue">01 JAN 2013</span> to <span class="blue">31 JAN 2013</span> (1 MM): <span class="blue">200.00</span>
                <br/>Principal Paid: <span class="blue">10000.00</span> &nbsp;&nbsp;&nbsp;Interest Paid: <span class="blue">150.00</span> &nbsp;&nbsp;&nbsp;Amt. Adj.: <span class="blue">50.00</span>
                <br/>Now Principal Amount (<span class="blue">100000.00</span> - <span class="blue">10000.00</span> + <span class="blue">50.00</span>): <span class="blue">90050.00</span>
                <br/>Girvi Date: <span class="blue">01 JAN 2013</span></b>
        </td>
    </tr>
</table>