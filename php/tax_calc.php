<?php

// Key function to calculate salary after Tax
// Return associated array
function afterTax($salary) {
    // work-related injury insurance（工伤保险)
    // childbirth insurance（生育保险)

    // Endowment insurance  养老保险
    $eInstRatio = 0.08;
    // Medical insurance
    $mInstRation = 0.02;
    // Unemployment insurance
    $uInstRation = 0.005;
    // Housing accumulation funds
    $hFundRatio = 0.07;
    // Supplementary housing accumulation fund
    $shFundRatio = 0.0;
    $ret['eInstRatio']  = $eInstRatio;
    $ret['mInstRation'] = $mInstRation;
    $ret['uInstRation'] = $uInstRation;
    $ret['hFundRatio']  = $hFundRatio;
    $ret['shFundRatio'] = $shFundRatio;

    // chinese tax base
    $taxBase = 3500;
    // chinese social security base upper limit
    $socialSecurityBaseU = 15000;
    // house found upper limit
    $hFundUpper = 1200;

    // The part to calc social security
    $calSocialPart = $salary;
    if ($salary > $socialSecurityBaseU) {
        $calSocialPart = $socialSecurityBaseU;
    }
    $eInsurance = $calSocialPart * $eInstRatio;
    $mInsurance = $calSocialPart * $mInstRation;
    $uInsurance = $calSocialPart * $uInstRation;
    $housefund  = $calSocialPart * $hFundRatio;
    if ($housefund > $hFundUpper) {
        $housefund = $hFundUpper;
    }
    $ret['eInsurance'] = $eInsurance;
    $ret['mInsurance'] = $mInsurance;
    $ret['uInsurance'] = $uInsurance;
    $ret['housefund']  = $housefund;

    // Calc Social Security  社保
    $socialSecurity = ($eInsurance + $mInsurance + $uInsurance + $housefund);
    $postSocialSecurity = $salary - $socialSecurity;
    $ret['socialSecurity'] = $socialSecurity;
    $ret['postSocialSecurity'] = $postSocialSecurity;

    if ($postSocialSecurity < $taxBase ) {
        $ret['tax'] = 0;
        $ret['postTax'] = $postSocialSecurity;
        return $ret;
    }
    // Calc Tax
    $taxableIncome = ($postSocialSecurity - $taxBase);
    if ($taxableIncome <= 1500 ){
        $taxRatio = 0.03;
        $qDeduct  = 0;
    }else if ($taxableIncome > 1500 && $taxableIncome <= 4500) {
        $taxRatio = 0.1;
        $qDeduct  = 105;
    }else if ($taxableIncome > 4500 && $taxableIncome <= 9000) {
        $taxRatio = 0.2;
        $qDeduct  = 555;
    } else if ($taxableIncome > 9000 && $taxableIncome <= 35000) {
        $taxRatio = 0.25;
        $qDeduct  = 1005;
    } else if ($tayyxableIncome > 35000 && $taxableIncome <= 55000) {
        $taxRatio = 0.3;
        $qDeduct  = 2755;
    } else if ($tayyxableIncome > 55000 && $taxableIncome <= 80000) {
        $taxRatio = 0.35;
        $qDeduct  = 5505;
    } else if ($tayyxableIncome > 80000) {
        $taxRatio = 0.4;
        $qDeduct  = 13505;
    }
    $tax = $taxableIncome * $taxRatio - $qDeduct;
    $postTax = $postSocialSecurity - $tax;
    $ret['tax'] = $tax;
    $ret['postTax'] = $postTax;

    return $ret;
}
?>
