<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= URLROOT ?>img/D.png">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/hello.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/test.css">
    <title>Document</title>
</head>
<body class="test-page">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="test-content">
    <div class="btn-test">
        <div class="btn-test-content" onclick="switchpart('test')"><p>Test content</p></div>
        <div class="btn-rendered" onclick="switchpart('rendred')"><p>rendered</p></div>
    </div>
    <div class="description">
        <div class="part1">
            <div>
                <div>
                    <label for="title">Title :</label>
                    <p>Design a logo for a company</p>
                </div>
                <div>
                    <label for="description">Details :</label>
                    <p>A computer company wants you to create a logo for it, that's<br/>some details about it .</p>
                </div>
                <ul>
                    <li>Name : Orange </li>
                    <li>Color prefere : (#ff7800) Orange - (#00ff0c) Green</li>
                    <li>Genre : technical</li>
                </ul>
                <div class="btn-operation">    
                    <button class="log-out"><a href="<?php echo URLROOT; ?>pages/home">Log Out</a></button>
                    <button class="change-test"><a href="<?php echo URLROOT; ?>pages/test">Change Test</a></button>
                </div> 
            </div>
        </div>
        <div class="part2" style="display:none;">
        <div class="for-rendu">
            <h2>Add rendering</h2>
            <div class="rendu-content">
                <div class="file-rendu">
                    <p>import a file</p>
                    <p><a><img src="<?php echo URLROOT ?>public/img/addfile.png"></a></p>
                    <input type="file" name="rendu">
                </div>
                <div></div>
                <div class="message">
                    <textarea type="text" name="message" placeholder="Write Something"></textarea>
                </div>
            </div>
                <div class="btn-operation">    
                    <button class="log-out"><a href="<?php echo URLROOT; ?>pages/home">Log Out</a></button>
                    <button class="change-test"><a href="<?php echo URLROOT; ?>pages/review">Submit</a></button>
                </div>
            
        </div>
        </div>
        
    </div>


    </div>
    
</body>

<script>
    function switchpart(part){
        var btn1= document.querySelector('.btn-test-content');
        var btn2= document.querySelector('.btn-rendered');
        if(part == "test"){
            document.getElementsByClassName("part1")[0].style.display = "block";
            document.getElementsByClassName("part2")[0].style.display = "none";
            btn1.style="background-color: #F3A1FF;";
            btn2.style="background-color: #FFF;";
        }else if(part == "rendred"){
            document.getElementsByClassName("part1")[0].style.display = "none";
            document.getElementsByClassName("part2")[0].style.display = "block";
            btn1.style="background-color: #FFF;";
            btn2.style="background-color: #F3A1FF;";
        }
    }
</script>
