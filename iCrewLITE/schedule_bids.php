<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
    <div class="card">
        <div class="header">
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="<?php echo url('/schedules/view'); ?>" class="btn btn-info waves-effect">Make Bids Now</a>
                </li>
            </ul>
            <h2>
               My Bids <small><?php echo SITE_NAME?> Flight Ops</small>
            </h2>
        </div>
        <div class="body">
            <!-- Main row -->
            
    <?php
                        if(!$bids)
                        {
                            echo '<div class="alert alert-info">
                            <h4>No Bids Found</h4>
                            You have no bids. Add a bid through the flight schedules.
                            </div>';
                        } else {
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Number</th>
                                <th>Route</th>
                                <th>Aircraft</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Distance</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($bids as $bid)
                                {
                            ?>
                            <tr id="bid<?php echo $bid->bidid ?>">
                                <td><?php echo $bid->code . $bid->flightnum; ?></td>
                                <td align="center"><?php echo $bid->depicao; ?> to <?php echo $bid->arricao; ?></td>
                                <td align="center"><?php echo $bid->aircraft; ?> (<?php echo $bid->registration?>)</td>
                                <td><?php echo $bid->deptime;?></td>
                                <td><?php echo $bid->arrtime;?></td>
                                <td><?php echo $bid->distance;?></td>
                                <td><a class="btn btn-info btn-xs" href="<?php echo url('/pireps/filepirep/'.$bid->bidid);?>">File Report</a><br />
                                    <a id="<?php echo $bid->bidid; ?>" class="deleteitem btn btn-danger btn-xs" href="<?php echo url('/schedules/removebid');?>">Remove Bid (Double click)</a><br />
                                    <a class="btn btn-warning btn-xs" href="<?php echo url('/schedules/brief/'.$bid->id);?>">Pilot Brief</a><br />
                                    <a class="btn btn-success btn-xs" href="<?php echo url('/schedules/boardingpass/'.$bid->id);?>" />Boarding Pass</a>
                                </td>
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