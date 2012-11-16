<!-- #BeginEditable "body" -->
<ul class="tab">

</ul>
<div style="width:90%;margin:30px auto;">
    <div id="bootStarp">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#profile_info" id="info">Profile Information</a></li>
            <li><a href="#profile" id="pro">Edit Profile</a></li>
            <li><a href="#password" id="pass">Change Password</a></li>
            <li><a href="#change_pin" id="pin">Change Pin</a></li>
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
                asda
            </div>

            <div class="tab-pane" id="password">
                asd
            </div>

            <div class="tab-pane" id="change_pin">
                asdasdsad
            </div>
        </div>
    </div>

    <script>
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    </script>
</div>




<!-- #EndEditable -->