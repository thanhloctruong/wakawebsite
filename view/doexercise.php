
    <section class="section1">
        <div class="right-siderbar">
            <div class="content-header">
                <a class="title" href="">Làm Bài Tập</a>
                
            </div>
            <?php
            $i = 1 ;
            foreach($exercise as $exercise){
                $ques = $exercise['question'];
                $CA = $exercise['CA'];
                $CB = $exercise['CB'];
                $CC = $exercise['CC'];
                $CD = $exercise['CD'];
                echo
                '<h3 class="ques">câu hỏi ' .$i.': '.$ques.'</h3>
                <form >
                    <input type="radio" value="'.$CA.'">
                    <label for="male">'.$CA.'</label><br>
                    <input type="radio" value="'.$CB.'">
                    <label for="female">'.$CB.'</label><br>
                    <input type="radio" ivalue="'.$CC.'">
                    <label for="other">'.$CC.'</label><br>
                    <input type="radio" value="'.$CD.'">
                    <label for="other">'.$CD.'</label>
                    <br>  
                </form>';
                $i++;
            }
            ?>





        </div>
        <div class="right1 ">
            <script>
            // Set the date we're counting down to
            var countDownDate = new Date().getTime() + 15 * 60 * 1000;
            var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("timer").innerHTML =  hours + ":"
            + minutes + ":" + seconds;
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
            }, 1000);
            </script>
            <h1 id="timer"></h1>
            <input type="submit" value="Submit" id="submit1">
        </div>
    </section>
    