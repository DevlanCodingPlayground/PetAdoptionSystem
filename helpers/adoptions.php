<?php
/*
 *   Crafted On Thu Nov 03 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */


/* Update Adoption */
if (isset($_POST['Update_Pet_Adoption'])) {
    $pet_adoption_id = mysqli_real_escape_string($mysqli, $_POST['pet_adoption_id']);
    $pet_adoption_date = mysqli_real_escape_string($mysqli, $_POST['pet_adoption_date']);

    /* Persist */
    $update_sql = "UPDATE pet_adoption SET pet_adoption_date = '{$pet_adoption_date}' WHERE pet_adoption_id = '{$pet_adoption_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Pet adoption date updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Return Pet */
if (isset($_POST['Return_Pet'])) {
    $pet_id = mysqli_real_escape_string($mysqli, $_POST['pet_id']);
    $pet_adoption_id = mysqli_real_escape_string($mysqli, $_POST['pet_adoption_id']);

    /* Persist */
    $return_sql = "UPDATE pet SET pet_adoption_status = 'Available' WHERE pet_id = '{$pet_id}'";
    $adoption_sql = "UPDATE pet_adoption SET pet_adoption_return_status = 'Returned' WHERE pet_adoption_id = '{$pet_adoption_id}'";

    if (mysqli_query($mysqli, $return_sql) && mysqli_query($mysqli, $adoption_sql)) {
        $success = "Pet returned";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Payment */
if (isset($_POST['Add_Payment'])) {
    $payment_pet_adoption_id = mysqli_real_escape_string($mysqli, $_POST['payment_pet_adoption_id']);
    $payment_ref = mysqli_real_escape_string($mysqli, $paycode);
    $payment_amount = mysqli_real_escape_string($mysqli, '500');
    $payment_means  = mysqli_real_escape_string($mysqli, $_POST['payment_means']);

    /* Rave Payment Variables */
    $pet_adopter_name = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_name']);
    $pet_adopter_email = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_email']);

    if ($payment_means == 'Cash') {
        /* Persist */
        $payment_sql = "INSERT INTO payment (payment_pet_adoption_id, payment_ref, payment_amount, payment_means) 
        VALUES('{$payment_pet_adoption_id}', '{$payment_ref}', '{$payment_amount}', '{$payment_means}')";
        $adoption_sql = "UPDATE pet_adoption SET pet_adoption_payment_status = 'Paid' WHERE pet_adoption_id = '{$payment_pet_adoption_id}'";

        if (mysqli_query($mysqli, $payment_sql) && mysqli_query($mysqli, $adoption_sql)) {
            $success = "Cash Payment Ref: $paycode Posted";
        } else {
            $err = "Failed, please try again";
        }
    } else if ($payment_means == 'Credit / Debit Card') {
        /* Handle Credit/Debit Card - To Avoid Messy Codebases Just Include The File Here */
        include('../api/flutterwave/process_payment.php');
    } else {
        /* Handle Mobile Payments - To Avoid Messy Codebases Just Include The File Here */
        $err = "Payment method is not supported";
    }
}

/* Delete Adoption */
if (isset($_POST['Delete_Adoption'])) {
    $pet_id = mysqli_real_escape_string($mysqli, $_POST['pet_id']);
    $pet_adoption_id = mysqli_real_escape_string($mysqli, $_POST['pet_adoption_id']);

    /* Persist */
    $pet_status_sql = "UPDATE pet SET pet_adoption_status = 'Available' WHERE pet_id = '{$pet_id}'";
    $delete_adoption_sql = "DELETE FROM pet_adoption WHERE pet_adoption_id = '{$pet_adoption_id}'";

    if (mysqli_query($mysqli, $pet_status_sql) && mysqli_query($mysqli, $delete_adoption_sql)) {
        $success = "Pet adoption deleted";
    } else {
        $err = "Failed, please try again";
    }
}
