<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>


<div class="card">
       <div class="header">
           <ul class="header-dropdown m-r--5">
               <li class="dropdown">
                   <a href="<?php echo url('/pireps/mine'); ?>" class="btn btn-info waves-effect">Go Back</a>
               </li>
           </ul>
           <h2>
              Add Comment
           </h2>
       </div>
       <div class="body">
         <div class="row">
       <div class="col-md-12">
           <div class="box box-primary">
               <div class="box-body table-responsive">
                 You are adding comments to PIREP <strong>#<?php echo $_GET['id']; ?></strong>, please make sure you only comment information relevant to your PIREP which might help the admins to evaluate your PIREP. <br><br>
                     <?php
                      $existing_comments = PIREPData::getComments($_GET['id']);
                      foreach ($existing_comments as $comment) {
                        ?>
                        <blockquote>
                            <?php echo $comment->comment; ?>
                            <br>
                            <small><?php echo $comment->firstname.' '.$comment->lastname; ?> on <?php echo date(DATE_FORMAT, $comment->postdate); ?></small>
                        </blockquote>
                        <?php
                      }
                      ?>


                 <form class="form" action="<?php echo url('/pireps/viewpireps');?>" method="post">
                 <br /><br />
                 <textarea class="form-control no-resize" name="comment" style="width:90%; height: 150px"></textarea><br />

                 <input type="hidden" name="action" value="addcomment" />
                 <input type="hidden" name="pirepid" value="<?php echo $pirep->pirepid?>" />
                 <input type="submit" class="btn btn-success waves-effect" name="submit" value="Add Comment" />
                 </form>
               </div>
           </div>
       </div>
   </div>
       </div>
     </div>
