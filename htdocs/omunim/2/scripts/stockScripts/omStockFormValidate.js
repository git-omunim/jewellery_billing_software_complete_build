/* 
 * *************************************************************************************************************************************
 * @tutorial: UNIVERSAL FORM VALIDATE JAVASCRIPT FILE @PRIYANKA-28JAN19
 * *************************************************************************************************************************************
 *
 * Created on on 28 JAN, 2019 19:30:00 PM
 * 
 * @FileName: omStockFormValidate.js
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 * Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-28JAN19
 *  REASON: UNIVERSAL FORM VALIDATE JAVASCRIPT FILE
 *  
 */
//********************************************************************************************************
//START FUNCTION TO ADD UNIVERSAL FORM VALIDATIONS AUTHOR : DIKSHA 29JAN2019
//********************************************************************************************************
function stockFormValidate(mainNoOfProd) {

    //alert('sttr_item_pre_id == ' + document.getElementById('sttr_item_pre_id').value);
    //alert('sttr_item_id == ' + document.getElementById('sttr_item_id').value);

    // For Date Field Validation
    if (typeof (document.getElementById('prodDOBDay')) != 'undefined' &&
            document.getElementById('prodDOBDay') != null &&
            typeof (document.getElementById('prodDOBMonth')) != 'undefined' &&
            document.getElementById('prodDOBMonth') != null &&
            typeof (document.getElementById('prodDOBYear')) != 'undefined' &&
            document.getElementById('prodDOBYear') != null) {
        // For Day Field Validation  
        if (validateSelectField(document.getElementById("prodDOBDay").value, "Please select Day!") == false) {
            document.getElementById("prodDOBDay").focus();
            return false;
        }
        // For Month Field Validation  
        else if (validateSelectField(document.getElementById("prodDOBMonth").value, "Please select Month!") == false) {
            document.getElementById("prodDOBMonth").focus();
            return false;
        }
        // For Year Field Validation  
        else if (validateSelectField(document.getElementById("prodDOBYear").value, "Please select Year!") == false) {
            document.getElementById("prodDOBYear").focus();
            return false;
        }
    }

    // For Firm Field Validation   
    if (typeof (document.getElementById('sttr_firm_id')) != 'undefined' &&
            document.getElementById('sttr_firm_id') != null) {
        if (validateSelectField(document.getElementById("sttr_firm_id").value, "Please select Firm!") == false) {
            document.getElementById("sttr_firm_id").focus();
            return false;
        }
    }

    // For Product Type Validation
    if (typeof (document.getElementById('sttr_product_type')) != 'undefined' &&
            document.getElementById('sttr_product_type') != null) {
        if (validateSelectField(document.getElementById("sttr_product_type").value, "Please select Product Type!") == false) {
            document.getElementById("sttr_product_type").focus();
            return false;
        }
    }

    // For Item Pre-id Field Validation
    if (typeof (document.getElementById('sttr_item_pre_id')) != 'undefined' &&
            document.getElementById('sttr_item_pre_id') != null) {
        if (validateSelectField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Pre Id!") == false) {
            document.getElementById("sttr_item_pre_id").focus();
            return false;
        }
    }

    // For Item Id Field Validation
    if (typeof (document.getElementById('sttr_item_id')) != 'undefined' &&
            document.getElementById('sttr_item_id') != null) {
        if (validateSelectField(document.getElementById("sttr_item_id").value, "Please enter Item Id!") == false) {
            document.getElementById("sttr_item_id").focus();
            return false;
        }
    }

    // For Product purchase rate Field Validation
    if (typeof (document.getElementById('sttr_product_purchase_rate')) != 'undefined' &&
            document.getElementById('sttr_product_purchase_rate') != null) {
        if (validateSelectField(document.getElementById("sttr_product_purchase_rate").value, "Please enter Product Purchase Rate!") == false) {
            document.getElementById("sttr_product_purchase_rate").focus();
            return false;
        }
    }

    //alert('mainNoOfProd == ' + mainNoOfProd);

    // ************************************************************************************************************************
    // START LOOP FOR MAIN PRODUCT VALIDATION @PRIYANKA-30JAN19    
    // ************************************************************************************************************************
    for (var mainProdCount = 0; mainProdCount <= mainNoOfProd; mainProdCount++) {

        //alert('mainProdCount == ' + mainProdCount);
        //alert('sttr_firm_id + mainProdCount == ' + document.getElementById('sttr_firm_id' + mainProdCount));

        // For Firm Field Validation @PRIYANKA-30JAN19    
        if (typeof (document.getElementById('sttr_firm_id' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_firm_id' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_firm_id" + mainProdCount).value, "Please select Firm!") == false) {
                document.getElementById("sttr_firm_id" + mainProdCount).focus();
                return false;
            }
        }

        // For Product Type Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_product_type' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_product_type' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_product_type" + mainProdCount).value, "Please select Product Type!") == false) {
                document.getElementById("sttr_product_type" + mainProdCount).focus();
                return false;
            }
        }

        // For Item pre-id Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_item_pre_id' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_item_pre_id' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_pre_id" + mainProdCount).value, "Please enter Item Pre Id!") == false) {
                document.getElementById("sttr_item_pre_id" + mainProdCount).focus();
                return false;
            }
        }

        // For Item Id Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_item_id' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_item_id' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_id" + mainProdCount).value, "Please enter Item Id!") == false) {
                document.getElementById("sttr_item_id" + mainProdCount).focus();
                return false;
            }
        }

        // For Category Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_item_category' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_item_category' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_category" + mainProdCount).value, "Please enter Item Category!") == false) {
                document.getElementById("sttr_item_category" + mainProdCount).focus();
                return false;
            }
        }

        // For Item Name Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_item_name' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_item_name' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_name" + mainProdCount).value, "Please enter Item Name!") == false) {
                document.getElementById("sttr_item_name" + mainProdCount).focus();
                return false;
            }
        }

        // For Gswt Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_gs_weight' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_gs_weight' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_gs_weight" + mainProdCount).value, "Please enter Gross Weight!") == false) {
                document.getElementById("sttr_gs_weight" + mainProdCount).focus();
                return false;
            }
        }

        // For Ntwt Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_nt_weight' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_nt_weight' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_nt_weight" + mainProdCount).value, "Please enter Net Weight!") == false) {
                document.getElementById("sttr_nt_weight" + mainProdCount).focus();
                return false;
            }
        }

        // For Fine wt Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_fine_weight' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_fine_weight' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_fine_weight" + mainProdCount).value, "Please enter Fine Weight!") == false) {
                document.getElementById("sttr_fine_weight" + mainProdCount).focus();
                return false;
            }
        }

        // For Final fine wt Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_final_fine_weight' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_final_fine_weight' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_final_fine_weight" + mainProdCount).value, "Please enter Final Fine Weight!") == false) {
                document.getElementById("sttr_final_fine_weight" + mainProdCount).focus();
                return false;
            }
        }

        // For Purchase Price Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_price' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_price' + mainProdCount) != null) {
            if (validateEmptyField(document.getElementById("sttr_price" + mainProdCount).value, "Please enter Purchase Price!") == false) {
                document.getElementById("sttr_price" + mainProdCount).focus();
                return false;
            }
        }

        // For Product purchase rate Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_product_purchase_rate' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_product_purchase_rate' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_product_purchase_rate" + mainProdCount).value, "Please enter Product Purchase Rate!") == false) {
                document.getElementById("sttr_product_purchase_rate" + mainProdCount).focus();
                return false;
            }
        }

        // For Metal Amount Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_metal_amt' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_metal_amt' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_metal_amt" + mainProdCount).value, "Please enter Metal Amount!") == false) {
                document.getElementById("sttr_metal_amt" + mainProdCount).focus();
                return false;
            }
        }

        // For Final Metal Amount Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_valuation' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_valuation' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_valuation" + mainProdCount).value, "Please enter Final Metal Amount!") == false) {
                document.getElementById("sttr_valuation" + mainProdCount).focus();
                return false;
            }
        }

        // For Purity Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_purity' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_purity' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_purity" + mainProdCount).value, "Please select Item Tunch or Purity!") == false) {
                document.getElementById("sttr_purity" + mainProdCount).focus();
                return false;
            }
        }

        // For Final Purity Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_final_purity' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_final_purity' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_final_purity" + mainProdCount).value, "Please select Item Tunch or Purity!") == false) {
                document.getElementById("sttr_final_purity" + mainProdCount).focus();
                return false;
            }
        }

        // For Final Valuation Field Validation @PRIYANKA-30JAN19
        if (typeof (document.getElementById('sttr_final_valuation' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_final_valuation' + mainProdCount) != null) {
            if (validateEmptyField(document.getElementById("sttr_final_valuation" + mainProdCount).value, "Please enter Final Amount!") == false) {
                document.getElementById("sttr_final_valuation" + mainProdCount).focus();
                return false;
            }
        }

        // ************************************************************************************************************************
        // START CODE TO SHOWING ALERT FOR PURITY, WASTAGE, MAKING CHARGES AND LABOUR CHARGES ACCORDING TO MASTER DATA @AUTHOR-MADHUREE-17JAN2020    
        // ************************************************************************************************************************        
        var sttr_transaction_type = document.getElementById('sttr_transaction_type' + mainProdCount).value;
        // ITEM PURITY @AUTHOR:MADHUREE-23JAN2020
//        alert(document.getElementById('sttr_purity' + mainProdCount).value);
//        alert(document.getElementById('hidden_sttr_purity' + mainProdCount).value);
            
            if (typeof (document.getElementById('sttr_purity' + mainProdCount)) != 'undefined' &&
                (document.getElementById('sttr_purity' + mainProdCount) != null) &&
                typeof (document.getElementById('hidden_sttr_purity' + mainProdCount)) != 'undefined' &&
                (document.getElementById('hidden_sttr_purity' + mainProdCount)).value != '') {
            var sttr_purity = document.getElementById('hidden_sttr_purity' + mainProdCount).value;
            if (document.getElementById('sttr_purity' + mainProdCount).value !== sttr_purity)
            {
                alert("Item Purity is set by Master Stock (" + sttr_purity + ")! Please Enter Correct Value !");
                document.getElementById("sttr_purity" + mainProdCount).focus();
                return false;
            }
        }
        // ITEM WASTAGE @AUTHOR:MADHUREE-23JAN2020
//        alert(document.getElementById('sttr_wastage' + mainProdCount).value);
//        alert(document.getElementById('hidden_sttr_wastage' + mainProdCount).value);
        
        if (typeof (document.getElementById('sttr_wastage' + mainProdCount)) != 'undefined' &&
                (document.getElementById('sttr_wastage' + mainProdCount) != null) &&
                typeof (document.getElementById('hidden_sttr_wastage' + mainProdCount)) != 'undefined' &&
                (document.getElementById('hidden_sttr_wastage' + mainProdCount)).value != '') {
            var sttr_wastage = document.getElementById('hidden_sttr_wastage' + mainProdCount).value;
            if (document.getElementById('sttr_wastage' + mainProdCount).value !== sttr_wastage)
            {
                alert("Item Wastage is set by Master Stock (" + sttr_wastage + ")! Please Enter Correct Value !");
                document.getElementById("sttr_wastage" + mainProdCount).focus();
                return false;
            }
        }
        if (sttr_transaction_type == 'sell') {
            // MAKING CHARGES AND MAKING CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
//            alert(document.getElementById('sttr_mkg_charges' + mainProdCount).value);
//            alert(document.getElementById('hidden_sttr_making_charges' + mainProdCount).value);
        
        if (typeof (document.getElementById('sttr_making_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('sttr_making_charges' + mainProdCount) != null) &&
                    typeof (document.getElementById('hidden_sttr_making_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('hidden_sttr_making_charges' + mainProdCount)).value != '') {
                var sttr_mkg_min = document.getElementById('hidden_sttr_making_charges' + mainProdCount).value;
                if (document.getElementById('sttr_making_charges' + mainProdCount).value < sttr_mkg_min)
                {
                    alert("Making charges are set by Master Stock (" + sttr_mkg_min + ")! Please Enter Correct Value !");
                    document.getElementById("sttr_making_charges" + mainProdCount).focus();
                    return false;
                }
            }
            // MAKING CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
            if (typeof (document.getElementById('sttr_lab_charges_type' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('sttr_lab_charges_type' + mainProdCount) != null) &&
                    typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                document.getElementById('sttr_mkg_charges_type' + mainProdCount).value = 'GM';
                document.getElementById('sttr_mkg_charges_type' + mainProdCount).readOnly = true;
            }
        } else {
            // LABOUR CHARGES AND LABOUR CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
//            alert(document.getElementById('sttr_lab_charges' + mainProdCount).value);
//            alert(document.getElementById('hidden_sttr_lab_charges' + mainProdCount).value);
        
        if (typeof (document.getElementById('sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('sttr_lab_charges' + mainProdCount) != null) &&
                    typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                var sttr_lab_min = document.getElementById('hidden_sttr_lab_charges' + mainProdCount).value;
                if (document.getElementById('sttr_lab_charges' + mainProdCount).value > sttr_lab_min)
                {
                    alert("Labour charges are set by Master Stock (" + sttr_lab_min + ")! Please Enter Correct Value !");
                    document.getElementById("sttr_lab_charges" + mainProdCount).focus();
                    return false;
                }
            }
            // LABOUR CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
            if (typeof (document.getElementById('sttr_lab_charges_type' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('sttr_lab_charges_type' + mainProdCount) != null) &&
                    typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                    (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                document.getElementById('sttr_lab_charges_type' + mainProdCount).value = 'GM';
                document.getElementById('sttr_lab_charges_type' + mainProdCount).readOnly = true;
            }
        }
        // ************************************************************************************************************************
        // END CODE TO SHOWING ALERT FOR MAKING CHARGES OR LABOUR CHARGES ACCORDING TO MASTER DATA @AUTHOR-MADHUREE-17JAN2020    
        // ************************************************************************************************************************        
    }
    // ************************************************************************************************************************
    // END LOOP FOR MAIN PRODUCT VALIDATION @PRIYANKA-30JAN19    
    // ************************************************************************************************************************

    // ************************************************************************************************************************
    // START LOOP FOR SUB PRODUCT VALIDATION @PRIYANKA-30JAN19    
    // ************************************************************************************************************************
    for (var mainProductCount = 0; mainProductCount <= mainNoOfProd; mainProductCount++) {

        // NO OF SUB PRODUCT IN MAIN PRODUCT @PRIYANKA-31JAN19 
        if (typeof (document.getElementById('sttr_noofprod' + mainProductCount)) != 'undefined' &&
                document.getElementById('sttr_noofprod' + mainProductCount) != null) {

            // NO OF SUB PRODUCT IN MAIN PRODUCT @PRIYANKA-31JAN19 
            var subNoOfProd = document.getElementById('sttr_noofprod' + mainProductCount).value;

            //alert('subNoOfProd @@== ' + subNoOfProd);

            for (var subProdCount = 1; subProdCount <= subNoOfProd; subProdCount++) {

                //alert('mainProductCount @@== ' + mainProductCount);
                //alert('subProdCount @@== ' + subProdCount);

                if (mainProductCount == 0) { // IF MAIN PRODUCT COUNT IS ZERO @PRIYANKA-31JAN19  
                    var prodCount = '0' + subProdCount; // SUB PRODUCT COUNT @PRIYANKA-31JAN19                
                } else {
                    var prodCount = mainProductCount + subProdCount; // SUB PRODUCT COUNT @PRIYANKA-31JAN19
                }

                //alert('prodCount @@== ' + prodCount);

                // For Firm Field Validation @PRIYANKA-30JAN19    
                if (typeof (document.getElementById('sttr_firm_id' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_firm_id' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_firm_id" + prodCount).value, "Please select Firm!") == false) {
                        document.getElementById("sttr_firm_id" + prodCount).focus();
                        return false;
                    }
                }

                // For Product Type Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_product_type' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_product_type" + prodCount).value, "Please select Product Type!") == false) {
                        document.getElementById("sttr_product_type" + prodCount).focus();
                        return false;
                    }
                }

                // For Item pre-id Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_item_pre_id' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_pre_id" + prodCount).value, "Please enter Item Pre Id!") == false) {
                        document.getElementById("sttr_item_pre_id" + prodCount).focus();
                        return false;
                    }
                }

                // For Item Id Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_item_id' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_item_id' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_id" + prodCount).value, "Please enter Item Id!") == false) {
                        document.getElementById("sttr_item_id" + prodCount).focus();
                        return false;
                    }
                }

                // For Category Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_item_category' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_item_category' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_category" + prodCount).value, "Please enter Item Category!") == false) {
                        document.getElementById("sttr_item_category" + prodCount).focus();
                        return false;
                    }
                }

                // For Item Name Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_item_name' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_item_name' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_name" + prodCount).value, "Please enter Item Name!") == false) {
                        document.getElementById("sttr_item_name" + prodCount).focus();
                        return false;
                    }
                }

                // For Gswt Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_gs_weight' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_gs_weight" + prodCount).value, "Please enter Gross Weight!") == false) {
                        document.getElementById("sttr_gs_weight" + prodCount).focus();
                        return false;
                    }
                }

                // For Ntwt Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_nt_weight' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_nt_weight" + prodCount).value, "Please enter Net Weight!") == false) {
                        document.getElementById("sttr_nt_weight" + prodCount).focus();
                        return false;
                    }
                }

                // For Fine wt Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_fine_weight' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_fine_weight" + prodCount).value, "Please enter Fine Weight!") == false) {
                        document.getElementById("sttr_fine_weight" + prodCount).focus();
                        return false;
                    }
                }

                // For Final fine wt Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_final_fine_weight' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_final_fine_weight" + prodCount).value, "Please enter Final Fine Weight!") == false) {
                        document.getElementById("sttr_final_fine_weight" + prodCount).focus();
                        return false;
                    }
                }

                // For Purchase Price Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_price' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_price' + prodCount) != null) {
                    if (validateEmptyField(document.getElementById("sttr_price" + prodCount).value, "Please enter Purchase Price!") == false) {
                        document.getElementById("sttr_price" + prodCount).focus();
                        return false;
                    }
                }

                // For Product purchase rate Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_product_purchase_rate' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_product_purchase_rate" + prodCount).value, "Please enter Product Purchase Rate!") == false) {
                        document.getElementById("sttr_product_purchase_rate" + prodCount).focus();
                        return false;
                    }
                }
                // For Metal Amount Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_metal_amt' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_metal_amt" + prodCount).value, "Please enter Metal Amount!") == false) {
                        document.getElementById("sttr_metal_amt" + prodCount).focus();
                        return false;
                    }
                }

                // For Final Metal Amount Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_valuation' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_valuation" + prodCount).value, "Please enter Final Metal Amount!") == false) {
                        document.getElementById("sttr_valuation" + prodCount).focus();
                        return false;
                    }
                }

                // For Purity Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_purity' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_purity" + prodCount).value, "Please select Item Tunch or Purity!") == false) {
                        document.getElementById("sttr_purity" + prodCount).focus();
                        return false;
                    }
                }

                // For Final Purity Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_final_purity' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_final_purity" + prodCount).value, "Please select Item Tunch or Purity!") == false) {
                        document.getElementById("sttr_final_purity" + prodCount).focus();
                        return false;
                    }
                }

                // For Final Valuation Field Validation @PRIYANKA-30JAN19
                if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                        document.getElementById('sttr_final_valuation' + prodCount) != null) {
                    if (validateEmptyField(document.getElementById("sttr_final_valuation" + prodCount).value, "Please enter Final Amount!") == false) {
                        document.getElementById("sttr_final_valuation" + prodCount).focus();
                        return false;
                    }
                }
            }
        }
    }
    // ************************************************************************************************************************
    // END LOOP FOR SUB PRODUCT VALIDATION @PRIYANKA-30JAN19    
    // ************************************************************************************************************************
}
//********************************************************************************************************
//END FUNCTION TO ADD UNIVERSAL FORM VALIDATIONS AUTHOR : DIKSHA 29JAN2019
//********************************************************************************************************
//
//
//
//
//********************************************************************************************************
// START FUNCTION TO ADD REPAIR ITEM FORM VALIDATIONS @AUTHOR:PRIYANKA-01APR2021
//********************************************************************************************************
function repairItemFormValidate(mainNoOfProd) {

    // For Date Field Validation @AUTHOR:PRIYANKA-01APR2021
    if (typeof (document.getElementById('prodDOBDay')) != 'undefined' &&
                document.getElementById('prodDOBDay') != null &&
        typeof (document.getElementById('prodDOBMonth')) != 'undefined' &&
                document.getElementById('prodDOBMonth') != null &&
        typeof (document.getElementById('prodDOBYear')) != 'undefined' &&
                document.getElementById('prodDOBYear') != null) {
        // For Day Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (validateSelectField(document.getElementById("prodDOBDay").value, "Please select Day!") == false) {
            document.getElementById("prodDOBDay").focus();
            return false;
        }
        // For Month Field Validation @AUTHOR:PRIYANKA-01APR2021
        else if (validateSelectField(document.getElementById("prodDOBMonth").value, "Please select Month!") == false) {
            document.getElementById("prodDOBMonth").focus();
            return false;
        }
        // For Year Field Validation @AUTHOR:PRIYANKA-01APR2021
        else if (validateSelectField(document.getElementById("prodDOBYear").value, "Please select Year!") == false) {
            document.getElementById("prodDOBYear").focus();
            return false;
        }
    }

    // For Firm Field Validation @AUTHOR:PRIYANKA-01APR2021
    if (typeof (document.getElementById('sttr_firm_id')) != 'undefined' &&
                document.getElementById('sttr_firm_id') != null) {
        if (validateSelectField(document.getElementById("sttr_firm_id").value, "Please select Firm!") == false) {
            document.getElementById("sttr_firm_id").focus();
            return false;
        }
    }

    // For pre invoice number Field Validation @AUTHOR:PRIYANKA-01APR2021
    if (typeof (document.getElementById('sttr_pre_invoice_no')) != 'undefined' &&
                document.getElementById('sttr_pre_invoice_no') != null) {
        if (validateSelectField(document.getElementById("sttr_pre_invoice_no").value, "Please enter pre invoice number!") == false) {
            document.getElementById("sttr_pre_invoice_no").focus();
            return false;
        }
    }

    // For invoice number Field Validation @AUTHOR:PRIYANKA-01APR2021
    if (typeof (document.getElementById('sttr_invoice_no')) != 'undefined' &&
                document.getElementById('sttr_invoice_no') != null) {
        if (validateSelectField(document.getElementById("sttr_invoice_no").value, "Please enter invoice number!") == false) {
            document.getElementById("sttr_invoice_no").focus();
            return false;
        }
    }

    //alert('mainNoOfProd == ' + mainNoOfProd);

    // ************************************************************************************************************************
    // START LOOP FOR MAIN PRODUCT VALIDATION @AUTHOR:PRIYANKA-01APR2021    
    // ************************************************************************************************************************
    for (var mainProdCount = 0; mainProdCount <= mainNoOfProd; mainProdCount++) {

        //alert('mainProdCount == ' + mainProdCount);
        //alert('sttr_firm_id + mainProdCount == ' + document.getElementById('sttr_firm_id' + mainProdCount));

        // For Firm Field Validation @AUTHOR:PRIYANKA-01APR2021    
        if (typeof (document.getElementById('sttr_firm_id' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_firm_id' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_firm_id" + mainProdCount).value, "Please select Firm!") == false) {
                document.getElementById("sttr_firm_id" + mainProdCount).focus();
                return false;
            }
        }

        // For Product Type Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_product_type' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_product_type' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_product_type" + mainProdCount).value, "Please select Product Type!") == false) {
                document.getElementById("sttr_product_type" + mainProdCount).focus();
                return false;
            }
        }

        // For Category Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_item_category' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_item_category' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_category" + mainProdCount).value, "Please enter Item Category!") == false) {
                document.getElementById("sttr_item_category" + mainProdCount).focus();
                return false;
            }
        }

        // For Item Name Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_item_name' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_item_name' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_item_name" + mainProdCount).value, "Please enter Item Name!") == false) {
                document.getElementById("sttr_item_name" + mainProdCount).focus();
                return false;
            }
        }

        // For Product rate Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_product_sell_rate' + mainProdCount)) != 'undefined' &&
                document.getElementById('sttr_product_sell_rate' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_product_sell_rate" + mainProdCount).value, "Please enter Product Rate!") == false) {
                document.getElementById("sttr_product_sell_rate" + mainProdCount).focus();
                return false;
            }
        }

        // For Metal Amount Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_metal_amt' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_metal_amt' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_metal_amt" + mainProdCount).value, "Please enter Metal Amount!") == false) {
                document.getElementById("sttr_metal_amt" + mainProdCount).focus();
                return false;
            }
        }

        // For Final Metal Amount Field Validation @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_valuation' + mainProdCount)) != 'undefined' &&
                    document.getElementById('sttr_valuation' + mainProdCount) != null) {
            if (validateSelectField(document.getElementById("sttr_valuation" + mainProdCount).value, "Please enter Final Metal Amount!") == false) {
                document.getElementById("sttr_valuation" + mainProdCount).focus();
                return false;
            }
        }

        var sttr_transaction_type = document.getElementById('sttr_transaction_type' + mainProdCount).value;
 
        if (sttr_transaction_type == 'sell') {
        
        if (typeof (document.getElementById('sttr_making_charges' + mainProdCount)) != 'undefined' &&
                   (document.getElementById('sttr_making_charges' + mainProdCount) != null) &&
            typeof (document.getElementById('hidden_sttr_making_charges' + mainProdCount)) != 'undefined' &&
                   (document.getElementById('hidden_sttr_making_charges' + mainProdCount)).value != '') {
                var sttr_mkg_min = document.getElementById('hidden_sttr_making_charges' + mainProdCount).value;
                
                if (document.getElementById('sttr_making_charges' + mainProdCount).value < sttr_mkg_min) {
                    alert("Making charges are set by Master Stock (" + sttr_mkg_min + ")! Please Enter Correct Value !");
                    document.getElementById("sttr_making_charges" + mainProdCount).focus();
                    return false;
                }
            }
            
            // MAKING CHARGES TYPE (BY DEFAULT GM) @AUTHOR:PRIYANKA-01APR2021
            if (typeof (document.getElementById('sttr_lab_charges_type' + mainProdCount)) != 'undefined' &&
                       (document.getElementById('sttr_lab_charges_type' + mainProdCount) != null) &&
                typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                       (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                document.getElementById('sttr_mkg_charges_type' + mainProdCount).value = 'GM';
                document.getElementById('sttr_mkg_charges_type' + mainProdCount).readOnly = true;
            }
            
        } else {
            
        // LABOUR CHARGES AND LABOUR CHARGES TYPE (BY DEFAULT GM) @AUTHOR:PRIYANKA-01APR2021      
        if (typeof (document.getElementById('sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                   (document.getElementById('sttr_lab_charges' + mainProdCount) != null) &&
            typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                   (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                var sttr_lab_min = document.getElementById('hidden_sttr_lab_charges' + mainProdCount).value;
                
                if (document.getElementById('sttr_lab_charges' + mainProdCount).value > sttr_lab_min) {
                    alert("Labour charges are set by Master Stock (" + sttr_lab_min + ")! Please Enter Correct Value !");
                    document.getElementById("sttr_lab_charges" + mainProdCount).focus();
                    return false;
                }
            }
            
            // LABOUR CHARGES TYPE (BY DEFAULT GM) @AUTHOR:PRIYANKA-01APR2021
            if (typeof (document.getElementById('sttr_lab_charges_type' + mainProdCount)) != 'undefined' &&
                       (document.getElementById('sttr_lab_charges_type' + mainProdCount) != null) &&
                typeof (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)) != 'undefined' &&
                       (document.getElementById('hidden_sttr_lab_charges' + mainProdCount)).value != '') {
                document.getElementById('sttr_lab_charges_type' + mainProdCount).value = 'GM';
                document.getElementById('sttr_lab_charges_type' + mainProdCount).readOnly = true;
            }
        }
        // 
        //
    }
    // ************************************************************************************************************************
    // END LOOP FOR MAIN PRODUCT VALIDATION @AUTHOR:PRIYANKA-01APR2021    
    // ************************************************************************************************************************

    // ************************************************************************************************************************
    // START LOOP FOR SUB PRODUCT VALIDATION @AUTHOR:PRIYANKA-01APR2021    
    // ************************************************************************************************************************
    for (var mainProductCount = 0; mainProductCount <= mainNoOfProd; mainProductCount++) {

        // NO OF SUB PRODUCT IN MAIN PRODUCT @AUTHOR:PRIYANKA-01APR2021
        if (typeof (document.getElementById('sttr_noofprod' + mainProductCount)) != 'undefined' &&
                    document.getElementById('sttr_noofprod' + mainProductCount) != null) {

            // NO OF SUB PRODUCT IN MAIN PRODUCT @AUTHOR:PRIYANKA-01APR2021 
            var subNoOfProd = document.getElementById('sttr_noofprod' + mainProductCount).value;

            //alert('subNoOfProd @@== ' + subNoOfProd);

            for (var subProdCount = 1; subProdCount <= subNoOfProd; subProdCount++) {

                //alert('mainProductCount @@== ' + mainProductCount);
                //alert('subProdCount @@== ' + subProdCount);

                if (mainProductCount == 0) { // IF MAIN PRODUCT COUNT IS ZERO @AUTHOR:PRIYANKA-01APR2021
                    var prodCount = '0' + subProdCount; // SUB PRODUCT COUNT @AUTHOR:PRIYANKA-01APR2021                
                } else {
                    var prodCount = mainProductCount + subProdCount; // SUB PRODUCT COUNT @AUTHOR:PRIYANKA-01APR2021
                }

                //alert('prodCount @@== ' + prodCount);

                // For Firm Field Validation @AUTHOR:PRIYANKA-01APR2021    
                if (typeof (document.getElementById('sttr_firm_id' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_firm_id' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_firm_id" + prodCount).value, "Please select Firm!") == false) {
                        document.getElementById("sttr_firm_id" + prodCount).focus();
                        return false;
                    }
                }

                // For Product Type Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_product_type' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_product_type" + prodCount).value, "Please select Product Type!") == false) {
                        document.getElementById("sttr_product_type" + prodCount).focus();
                        return false;
                    }
                }

                
                // For Category Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_item_category' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_item_category' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_category" + prodCount).value, "Please enter Item Category!") == false) {
                        document.getElementById("sttr_item_category" + prodCount).focus();
                        return false;
                    }
                }

                // For Item Name Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_item_name' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_item_name' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_item_name" + prodCount).value, "Please enter Item Name!") == false) {
                        document.getElementById("sttr_item_name" + prodCount).focus();
                        return false;
                    }
                }
            
                // For Product rate Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_product_sell_rate' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_product_sell_rate" + prodCount).value, "Please enter Product Rate!") == false) {
                        document.getElementById("sttr_product_sell_rate" + prodCount).focus();
                        return false;
                    }
                }
                // For Metal Amount Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_metal_amt' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_metal_amt" + prodCount).value, "Please enter Metal Amount!") == false) {
                        document.getElementById("sttr_metal_amt" + prodCount).focus();
                        return false;
                    }
                }

                // For Final Metal Amount Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_valuation' + prodCount) != null) {
                    if (validateSelectField(document.getElementById("sttr_valuation" + prodCount).value, "Please enter Final Metal Amount!") == false) {
                        document.getElementById("sttr_valuation" + prodCount).focus();
                        return false;
                    }
                }
            
                // For Final Valuation Field Validation @AUTHOR:PRIYANKA-01APR2021
                if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                            document.getElementById('sttr_final_valuation' + prodCount) != null) {
                    if (validateEmptyField(document.getElementById("sttr_final_valuation" + prodCount).value, "Please enter Final Amount!") == false) {
                        document.getElementById("sttr_final_valuation" + prodCount).focus();
                        return false;
                    }
                }
            }
        }
    }
    // ************************************************************************************************************************
    // END LOOP FOR SUB PRODUCT VALIDATION @AUTHOR:PRIYANKA-01APR2021  
    // ************************************************************************************************************************
}
//***************************************************************************************************************************
// END FUNCTION TO ADD REPAIR ITEM FORM VALIDATIONS @AUTHOR:PRIYANKA-01APR2021
//***************************************************************************************************************************
//