<?php




// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $inputFirstName = $_POST['inputFirstName'];
    $inputLastName = $_POST['inputLastName'];
    $inputEmail = $_POST['inputEmail'];
    $inputPassword = $_POST['inputPassword'];
    $inputPasswordConfirm = $_POST['inputPasswordConfirm'];

    $createAccBtn = $_POST['createAccBtn'];

    $passSame = false;
    

    // =============== NOTE =========

    // for the checking of details, write it with ajax javascript thing cuz it can update without refreshing the page
    // saving to db, will be the php
    // doing le thing we are aiming for

    // btw me not requiring you to use php, if all of these could be managed by ajax then why not XD


    // i guess le logic for Javascript + php combi is 
        /*
            Prefereably write in Ajax framework + Javascript:
            1. check inputs if empty and correct

            2. show the necessary popups when btn create account is pressed

            3. When every dat is correct (javascript will create the popup message to show it successful)
                then that btn there will have the <button type="submit">  thingy

            4.When submit btn pressed, send data to DB le php part i guess will be the "OK" btn when everything successful 
                The php will just be handling the saving to database part



        */



    // tis be in javascript

    // check if fields are not empty

    // 1. automatically add @adzu.edu.ph in email
            // logic: get the "input from email" +  "@adzu.edu.ph" before save
            // shortcut for em to add email and sure it aint wrong email format 


    // 2. pasword and password confirm is same
    if ($inputPassword == $inputPasswordConfirm){

        $passSame = true;

    }

    


    // checker for the inputs:  
        // 1. make notif / popup if empty / wrong
        // 2. popup has close btn and they will hafta type again

        // 3. make notif when successfully made
        // 4. Save le details in Staff Database (REMEMBER: to add @adzu.edu.ph when saving into Database)

            // 1. saving password
            if($passSame == true){

                // save to DB

            }

            // save Name |  2. First name   3. | Format: Last Name  ->  "Last Name, First Name"
            
            
            // save email |  4. Logic: Email Input + @adzu.edu.ph


        // 5. popup has ok btn
        // NOTE: when pressing le OK btn, this will bring user to next page --> staff manager page


        // Staff Manager Page: shows list of Staff Recorded (show in table)  Staff Name = Last Name, First name
        // Format of table:   Staff Name | Email | + Feature hidden in options menu popup le 3 dots   ...  there will be options Edit / Remove 

    






    


    // Close the connection
    $conn->close();
    


    


}


?>