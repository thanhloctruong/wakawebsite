
    <section class="section1">
        <div class="content1">
            <?php
                foreach($docs as $docs){
                    $name = $docs['name'];
                    $link = $docs['links'];
                    $img = $docs['img'];
                    $detail = $docs['detail'];
                    echo '
                    <a href="'.$link.'" class="link_doc">
                        <div class="document">
                            <img src="../upload/'.$img.'" alt="hinh minh hoa" class="doc_img">
                            <div class="titile_doc">
                                <h2>'.$name.'</h2>
                                <p> '.$detail.'</p>

                            </div>
                        </div>
                    </a>
                    ';
                }
            
            ?>
       
</div>
        
    </section>
    