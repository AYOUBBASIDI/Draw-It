<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div>
    <div class="btn-the-rendu">
        <div class="btn-rendu-content" onclick="changePart('test')"><p>Test content</p></div>
        <div class="btn-rendu" onclick="changePart('rendu')"><p>rendered</p></div>
    </div>

    <div class="requestAjob jobCreate">
        <div class="part1">
            <div class="line">
                <label for="owner">Owner :</label>
                <p class="line-content">Mr. abdellah</p>
            </div>  
            <div class="line">
                <label for="type">Type :</label>
                <p class="line-content">Create Logo</p>
            </div>  

            <div class="">
                <label for="Details">Details :</label><br/>
                <p>Bla bla blabla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla .</p>
            </div> 

            <div class="line">
                <label for="type">Max time :</label>
                <p class="line-content">2 days</p>
            </div>  
            <div class="">
                <label for="Color">Color :</label>
                <p>Red : #FF0000</p>
                <p>Black : #000000</p>
            </div>  
            <div class="line">
                <label for="Price">Price :</label>
                <p class="line-content">10 $</p>
            </div>
        </div>

        <div  class="part2">
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
                        <button class="change-test"><a href="<?php echo URLROOT; ?>pages/review">Submit</a></button>
                
            </div>
        </div>

    </div>


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
</script>