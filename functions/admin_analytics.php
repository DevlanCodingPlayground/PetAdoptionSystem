<?php
/*
 *   Crafted On Sun Oct 02 2022
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

$login_access_level = mysqli_real_escape_string($mysqli, $_SESSION['login_rank']);
$login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);


if ($login_access_level == 'Administrator') {
    /* Pet Owners */
    $query = "SELECT COUNT(*)  FROM pet_owner ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pet_owners);
    $stmt->fetch();
    $stmt->close();


    /* Pet Adopters */
    $query = "SELECT COUNT(*)  FROM pet_adopter ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pet_adopters);
    $stmt->fetch();
    $stmt->close();

    /* Registered Pets */
    $query = "SELECT COUNT(*)  FROM pet ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pets);
    $stmt->fetch();
    $stmt->close();


    /* Successful Adoptions */
    $query = "SELECT COUNT(*)  FROM pet_adoption ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($pet_adoptions);
    $stmt->fetch();
    $stmt->close();


    /* Available Pets */
    $query = "SELECT COUNT(*)  FROM pet WHERE pet_adoption_status = 'Available' ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($available_pets);
    $stmt->fetch();
    $stmt->close();



    /* Total Amount */
    $query = "SELECT SUM(payment_amount)  FROM payment ";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payment_amount);
    $stmt->fetch();
    $stmt->close();
} else if ($login_access_level == 'Owner') {
    /* Load Owner Analytics */
    $ret = "SELECT * FROM login l
    INNER JOIN pet_owner po ON po.pet_owner_login_id  = l.login_id
    WHERE l.login_id = '{$login_id}'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($owner = $res->fetch_object()) {
        /* Load Adopter Analytics */


        /* 1. All pets */
        $query = "SELECT COUNT(*)  FROM pet
        WHERE pet_owner_id = '{$owner->pet_owner_id}'";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($pets);
        $stmt->fetch();
        $stmt->close();


        /* 2. Adopted Pets */
        $query = "SELECT COUNT(*)  FROM pet
        WHERE pet_owner_id = '{$owner->pet_owner_id}' AND pet_adoption_status = 'Adopted'";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($adopted_pets);
        $stmt->fetch();
        $stmt->close();

        /* 3. Available Pets */
        $query = "SELECT COUNT(*)  FROM pet
        WHERE pet_owner_id = '{$owner->pet_owner_id}' AND pet_adoption_status = 'Available'";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($available_pets);
        $stmt->fetch();
        $stmt->close();
    }
} else if ($login_access_level == 'Adopter') {
    $ret = "SELECT * FROM login l
    INNER JOIN pet_adopter pa ON pa.pet_adopter_login_id  = l.login_id
    WHERE l.login_id = '{$login_id}'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($adopter = $res->fetch_object()) {
        /* Load Adopter Analytics */


        /* 1. Available Pets */
        $query = "SELECT COUNT(*)  FROM pet WHERE pet_adoption_status = 'Available' ";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($available_pets);
        $stmt->fetch();
        $stmt->close();


        /* 2. My Adoptions */
        $query = "SELECT COUNT(*)  FROM pet_adoption
        WHERE pet_adoption_pet_adopter_id = '{$adopter->pet_adopter_id}'";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($pet_adoptions);
        $stmt->fetch();
        $stmt->close();


        /* 3. Expenditure */
        $query = "SELECT SUM(payment_amount) FROM payment pay 
        INNER JOIN pet_adoption pa ON pa.pet_adoption_id = pay.payment_pet_adoption_id 
        WHERE pa.pet_adoption_pet_adopter_id = '{$adopter->pet_adopter_id}'";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($pet_adoptions_payments);
        $stmt->fetch();
        $stmt->close();
    }
} else {
    /* Err */
}
