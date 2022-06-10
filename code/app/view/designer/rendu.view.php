<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div>
    <div class="btn-the-rendu">
        <div class="btn-rendu-content" onclick="changePart('test')"><p>Test content</p></div>
        <div class="btn-rendu" onclick="changePart('rendu')"><p>rendered</p></div>
    </div>
<?php
if (isset($data["job"])){
    foreach ($data["job"] as $item){     
         ?>
    <div class="requestAjob jobCreate">
        <div class="part1">
            <div class="line">
                <label for="owner">Owner :</label>
                <p class="line-content"><?php echo $item->fname;?> <?php echo $item->lname; ?></p>
            </div>  
            <div class="line">
                <label for="type">Type :</label>
                <p class="line-content"><?php echo $item->type_sh;?></p>
            </div>  

            <div class="">
                <label for="Details">Details :</label><br/>
                <p><?php echo $item->description_sh;?></p>
            </div> 

            <div class="line">
                <label for="type">Max time :</label>
                <p class="line-content"><?php echo $item->delay_sh;?></p>
            </div>  
            <div class="">
                <label for="Color">Color :</label>
                <p><?php echo $item->favcolor_sh;?></p>
            </div>
            <div class="line">
                <label for="Price">Price :</label>
                <p class="line-content"><?php echo $item->price_sh;?></p>
            </div>
        </div>


        <div  class="part2">
            <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>jobs/new_rendu" method="post">
            <div class="for-rendu">
                <h2>Add rendering</h2>
                <div class="rendu-content">
                    <div class="file-rendu">
                        <!-- <p>import a file</p>
                        <p><a></a></p> -->
                        <label class="forRendu" for="inputTag" style="color: white;font-size: 13px;">
                            Select File (Format : PDF)
                        <img src="<?php echo URLROOT ?>public/img/addfile.png">
                        <input id="inputTag" type="file" name="rendu" accept="application/pdf">
                        <span id="imageName"></span>
                        <label>
                    </div>
                    <div><input type="hidden" name="id_job" value="<?php echo $item->id_job_sh;?>" required/></div>
                    <div class="message">
                        <textarea type="text" name="message" placeholder="Write Something" required></textarea>
                    </div>
                </div>
                        <button class="change-test" type ="submit" name="rendu_client">Submit</button>
                
            </div>
        </div>
        </form>

    </div>

    <?php }} ?>
</div>
<script>

function changePart(part){
        var btn1= document.querySelector('.btn-rendu-content');
        var btn2= document.querySelector('.btn-rendu');
        if(part == "test"){
            document.getElementsByClassName("part1")[0].style.display = "block";
            document.getElementsByClassName("part2")[0].style.display = "none";
            btn1.style="background-color: #F3A1FF;";
            btn2.style="background-color: #FADBFF;";
        }else if(part == "rendu"){
            document.getElementsByClassName("part1")[0].style.display = "none";
            document.getElementsByClassName("part2")[0].style.display = "block";
            btn1.style="background-color: #FADBFF;";
            btn2.style="background-color: #F3A1FF;";
        }
    }
    let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
</script>