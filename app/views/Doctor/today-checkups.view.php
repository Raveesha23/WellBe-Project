

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/doc_dashboard.css?v=1.1">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background-color: #E0EBFF;
        }
    </style>
</head>
<body>
    <div class="flex h-full">
       <?php 
        $this -> renderComponent('navbar',$active);
        ?>
    
        <div class="main-content" style="background-color: rgb(255, 255, 255);width: 100%; margin-top: 6%;margin-bottom: 2%;overflow-y: auto;overflow-x: hidden;">
            <?php
            $pageTitle = "Appointments"; // Set the text you want to display
            //include $_SERVER['DOCUMENT_ROOT'] . '/MVC/app/views/Components/Patient/header.php';
            require '../app/views/Components/Doctor/header.php';
            ?>

            <div class="items" style="justify-content: space-between;">
                <div style="margin-top: 25px;">
                    <div class="guide">
                        <div class="status">
                            <p>Available for Check-Up      :  </p>
                            <div style="width: 20px;height: 20px;background-color:#5D93FF;border-radius:20%;"></div>
                        </div>
                        <div class="status">
                            <p>Not Available for Check-Up  :  </p>
                            <div style="width: 20px;height: 20px;background-color: #8aa0cc;border-radius:20%;"></div>
                        </div>
                    </div>
                </div>

                <div class="container2">
                    
                    <div class="statQueue">
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                        </div>
                        <div class="boxQueue" style="background-color: #5D93FF;">
                            <div class="box-itemQueue">
                                <div><img src="http://localhost/test2/public/assets/images/patient.png"></div>
                                <div class="test"><p>MR. Himesh Dharmawansha</p></div>
                            </div>
                            <p>21</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>