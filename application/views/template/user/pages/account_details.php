<!-- #BeginEditable "body" -->

<ul class="tab settingpage">
    <li><a class="selected" href="#">Account Details</a></li>
    <li><a href="changepassword.html">Password</a></li>
    <li><a href="senderid.html">Sender ID's</a></li>
    <li><a href="settinginterface.html">Interface</a></li>
</ul>
<?php echo form_open(site_url('/userpanel/update_details'),array('name'=>'update','id'=>'update', 'class'=>'signup'));?>

<table class="usersettingtable">
    <tr>
        <td>Email Address<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>">
        </td>
    </tr>
    <tr>
        <td>First Name<span class="req">*</span></td>
        <td class="leftalign"><input type="text" name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>">
        </td>
    </tr>
    <tr>
        <td>Last Name<span class="req">*</span></td>
        <td class="leftalign"><input type="text" name="last_name" id="last_name" value="<?php echo $data['last_name']; ?>">
        </td>
    </tr>
    <tr>
        <td>Company<span class="req">*</span></td>
        <td class="leftalign"><input type="text" name="company_name" id="company_name" value="<?php echo $data['company_name']; ?>">
        </td>
    </tr>
    <tr>
        <td>Address 1<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="address_line_1" id="address_line_1" value="<?php echo $data['address_line_1']; ?>">
        </td>
    </tr>
    <tr>
        <td>Address 2</td>
        <td class="leftalign">
            <input type="text" name="address_line_2" id="address_line_2" value="<?php echo $data['address_line_2']; ?>">
        </td>
    </tr>
    <tr>
        <td>Suburb<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="suburb" id="suburb" value="<?php echo $data['suburb']; ?>">
        </td>
    </tr>
    <tr>
        <td>State<span class="req">*</span></td>
        <td class="leftalign">
            <select>
                <option selected="selected" value="159">Australian Capital Territory</option>
                <option value="161">New South Wales</option>
                <option value="162">Northern Territory</option>
                <option value="163">Queensland</option>
                <option value="164">South Australia</option>
                <option value="165">Tasmania</option>
                <option value="166">Victoria</option>
                <option value="167">Western Australia</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Post Code<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="postcode" id="postcode" value="<?php echo $data['suburb']; ?>">
        </td>
    </tr>
    <tr>
        <td>Country<span class="req">*</span></td>
        <td class="leftalign">
            <select>
                <option>Australia</option>
                <option>United States</option>
                <option>United Kingdom</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Time Zone<span class="req">*</span></td>
        <td class="leftalign">
            <select>
                <option>Australia/Melbourne</option>
                <option>Australia/Adelaide</option>
                <option>Australia/Brisbane</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Contact Authorization</td>
        <td class="leftalign"><input type="checkbox"> &nbsp; Receive information regarding SMSHUB specials?</td>
    </tr>
    <tr>
        <td></td>
        <td class="leftalign">
            <button class="tablebtn">Update</button>
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="leftalign"><span class="req">*</span> Required Field</td>
    </tr>
</table>
<?php echo form_close();?>



<!-- #EndEditable -->