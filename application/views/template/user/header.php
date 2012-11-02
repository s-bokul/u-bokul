<div id="header">
    <h1 id="logo"><a href="#"><img src="images/logo.jpg" alt=""></a></h1>

    <ul id="usernav">

        <li><a>Welcome <?php echo $data['user_info']['fname'].' '.$data['user_info']['lname']; ?></a></li>
        <li><a class="credit"><?php echo $data['user_info']['balance']; ?> $</a></li>
        <li><a class="purchasebtn" href="/userpanel/purchase">Purchase</a></li>
        <li><a href="/login/logout">Logout</a></li>
    </ul>

</div>

<div id="headnavcontainer">

    <ul id="headnav">
        <li><a href="userpanel.html" class="selected">Campaign</a></li>
        <li><a href="userInbox.html">Inbox</a></li>
        <li><a href="history.html">Transaction History</a></li>
        <li><a href="/userpanel/new-investment">New Investment</a></li>
        <li><a href="/userpanel/account_details">Settings</a></li>
    </ul>

</div>