 <div class="card">
        <div class="header">
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="<?php echo url('/schedules/view'); ?>" class="btn btn-info waves-effect">Make Bids Now</a>
                </li>
            </ul>
            <h2>
               My Logbook
            </h2>
        </div>
        <div class="body">
          <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <p><?php if(isset($descrip)) { echo $descrip; }?></p>

                    <?php
                        if(!$pireps)
                        {
                            echo '<div class="alert alert-danger">
                        <h4>No Reports Found</h4>
                        <p>Oops, looks like you haven\'t filed any reports yet. <a class="alert-link" href="'.SITE_URL.'/index.php/schedules">Let\'s fix that.</a></p>
                    </div>';
                        } else {
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <center>
                                    <th>Flight Number</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Aircraft</th>
                                    <th>Flight Time</th>
                                    <th>Submitted</th>
                                    <th>Status</th>
                                    <?php
                                        // Only show this column if they're logged in, and the pilot viewing is the
                                        //	owner/submitter of the PIREPs
                                        if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $userinfo->pilotid)
                                        {
                                            echo '<th>Options</th>';
                                        }
                                    ?>
                                </center>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($pireps as $report)
                                {
                            ?>
                            <tr>
                                <td align="center">
                                    <a class="btn btn-mutud waves-effect btn-sm" href="<?php echo url('/pireps/view/'.$report->pirepid);?>"><?php echo $report->code . $report->flightnum; ?></a>
                                </td>
                                <td align="center">
                                    <?php echo $report->depicao; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->arricao; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->aircraft . " ($report->registration)"; ?>
                                </td>
                                <td align="center">
                                    <?php echo $report->flighttime; ?>
                                </td>
                                <td align="center">
                                    <?php echo date(DATE_FORMAT, $report->submitdate); ?>
                                </td>
                                <td align="center">
                                    <?php

                                    if($report->accepted == PIREP_ACCEPTED)
                                        echo '<div id="success" class="label label-success">Accepted</div>';
                                    elseif($report->accepted == PIREP_REJECTED)
                                        echo '<div class="label label-danger">Rejected</div>';
                                    elseif($report->accepted == PIREP_PENDING)
                                        echo '<div class="label label-info">Approval Pending</div>';
                                    elseif($report->accepted == PIREP_INPROGRESS)
                                        echo '<div class="label label-warning">Flight in Progress</div>';

                                    ?>
                                </td>
                                <?php
                                // Only show this column if they're logged in, and the pilot viewing is the
                                //	owner/submitter of the PIREPs
                                if(Auth::LoggedIn() && Auth::$userinfo->pilotid == $report->pilotid)
                                {
                                    ?>
                                <td align="right">
                                    <a class="btn btn-info" href="<?php echo url('/pireps/addcomment?id='.$report->pirepid);?>">Add Comment</a>
                                    <a class="btn btn-danger" href="<?php echo url('/pireps/editpirep?id='.$report->pirepid);?>">Edit PIREP</a>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
        </div>
      </div>
