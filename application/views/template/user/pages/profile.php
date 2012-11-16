<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        jQuery.validator.addMethod("names", function(value, element) {
            //var regval = $(element.outerHTML).attr('regex');
            return this.optional(element) || /^[a-zA-Z]+$/.test(value);
        }, "Please Enter Valid Characters");

        $("#profileForm").validate({
            rules: {
                fname: { required:true, maxlength: 32, names:true },
                lname: { required:true, maxlength: 32, names:true }
            }
        });

        $("#changePassword").validate({
            rules: {
                passwd: "required",
                cnf_password: {
                    equalTo: "#passwd"
                }
            }
        });
    });


</script>
<!-- #BeginEditable "body" -->
<ul class="tab">

</ul>
<div style="width: 90%;margin: 0 auto;">
    <?php
    $message = json_decode($this->session->flashdata('msg'), 1);
    if(!empty($message))
        echo '<div class="'.$message['class'].'" >
            <button type="button" class="close" data-dismiss="alert">×</button>
            '.$message['msg'].' </div>';
    ?>
    <?php echo validation_errors('<div class="error">', '</div>'); ?>
    <!--<div class="successbox" > This is a success message Box </div>
    <div class="warningbox" > This is a warning message Box </div>
    <div class="errormsgbox" > This is a Error  message Box </div>-->
</div>
<div style="width:90%;margin:30px auto;">
    <div id="bootStarp">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#profile_info" id="info">Profile Information</a></li>
            <li><a href="#profile" id="pro">Edit Profile</a></li>
            <li><a href="#password" id="pass">Change Password</a></li>
            <li><a href="#change_pin" id="cng_pin">Change Pin</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="profile_info">
                <table class="table table-striped">
                   <tr>
                       <td class="text-info">
                           First Name
                       </td>
                       <td>
                           <?php echo $data['user_info']['fname']; ?>
                       </td>
                   </tr>
                    <tr>
                        <td class="text-info">
                            Last Name
                        </td>
                        <td>
                            <?php echo $data['user_info']['lname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Email
                        </td>
                        <td>
                            <?php echo $data['user_info']['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Mobile
                        </td>
                        <td>
                            <?php echo $data['user_info']['mobile']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Address
                        </td>
                        <td>
                            <?php echo $data['user_info']['address']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            City
                        </td>
                        <td>
                            <?php echo $data['user_info']['city']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Country
                        </td>
                        <td>
                            <?php echo $data['user_info']['country']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="profile">
                <?php echo form_open(site_url('/userpanel/profile-save'),array('name'=>'profileForm','id'=>'profileForm', 'class'=>'signup'));?>
                <table class="table table-striped">
                    <tr>
                        <td class="text-info">
                            First Name
                        </td>
                        <td>
                            <input type="text" id="fname" name="fname" value="<?php echo $data['user_info']['fname']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Last Name
                        </td>
                        <td>
                            <input type="text" id="lname" name="lname" value="<?php echo $data['user_info']['lname']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Mobile
                        </td>
                        <td>
                            <input type="text" id="mobile" name="mobile" value="<?php echo $data['user_info']['mobile']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Address
                        </td>
                        <td>
                            <input type="text" id="address" name="address" value="<?php echo $data['user_info']['address']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            City
                        </td>
                        <td>
                            <input type="text" id="city" name="city" value="<?php echo $data['user_info']['city']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Country
                        </td>
                        <td>
                            <input type="text" id="country" name="country" value="<?php echo $data['user_info']['country']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </td>
                    </tr>
                </table>
                <?php echo form_close();?>
            </div>

            <div class="tab-pane" id="password">
                <?php echo form_open(site_url('/userpanel/change-password'),array('name'=>'changePassword','id'=>'changePassword', 'class'=>'signup'));?>
                <table class="table table-striped">
                    <tr>
                        <td class="text-info">
                            New Password
                        </td>
                        <td>
                            <input type="password" id="passwd" name="passwd">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Retype Password
                        </td>
                        <td>
                            <input type="password" id="cnf_password" name="cnf_password">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-info">
                            Enter Pin
                        </td>
                        <td>
                            <input type="password" id="pin" name="pin">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </td>
                    </tr>
                </table>
                <?php echo form_close();?>
            </div>

            <div class="tab-pane" id="change_pin">
                asdasdsad
            </div>
        </div>
    </div>
</div>




<!-- #EndEditable -->