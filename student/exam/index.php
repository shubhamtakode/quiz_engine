<?php
require_once '../../include/bootstrap.php';
require_once '../../include/conf.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quiz Engine</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <?php include 'menu.php'; ?>
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tile question-desc">
               <label>Description about Question</label>
           </div>
           
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tile question">
               <label>Question No: 1</label>
               <br/>This section contents will generate dynamically according to question type
               <br/><br/>
               
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 question-buttons">
                   <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                   <button class="btn btn-default">Previous Question</button>
                   </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                   <button class="btn btn-default">Save Answer</button>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                   <button class="btn btn-default">Next Question</button>
                    </div>
               </div>
           </div>
            
        </div> 
        <!-- /container -->
        <br/><br/>
        <footer class="footer">
            <div class="container">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <p> &COPY; All Rights are Reserved</p>
                </div>
            </div>
        </footer>
    </body>
</html>

