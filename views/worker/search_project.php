
                                    <?php 
                                        foreach ($records as $value) {
                                            # code...
                                            ?>
                                            <tr>
                                            <td style="vertical-align:middle;" scope="row"><?php echo $value['project_id']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['project_title']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['min_budget']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['max_budget']; ?></td>
                                            
                                             <td style="vertical-align:middle;"><?php echo $value['project_description']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['creation_time']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['bid_close']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['time_duration']; ?></td>
                                            <td style="vertical-align:middle;"><?php echo $value['required_skills']; ?></td><!-- 
                                            <td style="vertical-align:middle;"><?php //echo $value['status']; ?></td>
                                            <td style="vertical-align:middle;"><?php //echo $value['client_accept']; ?></td>
                                           
-->
                                           
                                            
                                            <td style="vertical-align:middle;"><a href="<?php echo site_url('worker/manage_project/view_details/'.$value['project_id']); ?>"  data-toggle="tooltip" data-placement="top" title data-original-title="More Details">More Details</a></td>

                                            </tr>
                                          
                                        <?php 
                                        }
                                        ?>