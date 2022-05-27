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
        <?php
    if (isset($data["test"])){
            foreach ($data["test"] as $item){     
         ?>
        <div class="part1">
            <div>
                <div>
                    <label for="title">Title :</label>
                    <p><?php echo $item->title_test;?></p>
                </div>
                <div>
                    <label for="description">Details :</label>
                    <p><?php echo $item->description;?></p>
                </div>
                <ul>
                    <li>Slug : <?php echo $item->slug_test;?> </li>
                    <li>Color prefere : <?php echo $item->color_test;?></li>
                    <li>Genre : <?php echo $item->genre_test;?></li>
                </ul>
                <div class="btn-operation">    
                    <button class="log-out-single"><a href="<?php echo URLROOT; ?>users/log_out">Log Out</a></button>
                </div> 
            </div>
        </div>
<?php }} ?>
        <div class="part2" style="display:none;">
        <form action="<?php echo URLROOT; ?>admins/submit_test" method="post">
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
                    <button class="log-out"><a href="<?php echo URLROOT; ?>users/log_out">Log Out</a></button>
                    <button class="change-test" type="submit" name="test_submit"><a>Submit</a></button>
                </div>
            
            
        </div>
        </form>
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
